var dom = require('domino'),
    _ = require('underscore'),
    ls = require('local-storage');

//Adapting environment so jQuery XHRs work in Node.js    
var window = dom.createWindow();
var $ = require('jquery')(window),
    XMLHttpRequest = require('xmlhttprequest').XMLHttpRequest;
$.support.cors = true;
$.ajaxSettings.xhr = function(){
    return new XMLHttpRequest();
};

//START SUGARAPI.JS

/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/06_Customer_Center/10_Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */
/*;
 * SugarCRM Javascript API
 */

//create the SUGAR namespace if one does not exist already
var SUGAR = SUGAR || {};

/**
 * SugarCRM Javascript API allows users to interact with SugarCRM instance via its REST interface.
 *
 * Use {@link SUGAR.Api#getInstance} method to create instances of Sugar API.
 * This method accepts arguments object with the following properties:
 * <pre>
 * {
 *   serverUrl: Sugar REST URL end-point
 *   platform: platform name ("portal", "mobile", etc.)
 *   keyValueStore: reference to key/value store provider used to read/save auth token from/to
 *   timeout: request timeout in seconds
 * }
 * </pre>
 *
 * The key/value store provider must implement three methods:
 * <pre><code>
 *   set: void function(String key, String value)
 *   get: String function(key)
 *   cut: void function(String key)
 * </code></pre>
 * The authentication tokens are kept in memory if the key/value store is not specified.
 *
 * Most of Sugar API methods accept `callbacks` object:
 * <pre>
 * {
 *   success: function(data) { },
 *   error: function(error) { },
 *   complete: function() { },
 * }
 * </pre>
 *
 * @class SUGAR.Api
 * @singleton
 */
SUGAR.Api = (function() {
    var _instance;
    var _methodsToRequest = {
            "read": "GET",
            "update": "PUT",
            "create": "POST",
            "delete": "DELETE"
        };
    var _baseActions = ["read", "update", "create", "delete"];
    var _numCallsInProgress = 0;
    var _refreshTokenSuccess = function(c){c();};
    var _bulkQueues = { };
    var _state = { };

    var HttpError = function(request, textStatus, errorThrown) {

        request = request || {};
        request.xhr = request.xhr || {};

        /**
         * AJAX request that caused the error.
         * @property {SUGAR.HttpRequest}
         * @member SUGAR.HttpError
         */
        this.request = request;

        /**
         * XHR status code.
         * @property {String/Number}
         * @member SUGAR.HttpError
         */
        this.status = request.xhr.status;

        /**
         * XHR response text.
         * @property {String}
         * @member SUGAR.HttpError
         */
        this.responseText = request.xhr.responseText;

        /**
         * String describing the type of error that occurred.
         *
         * Possible values (besides null) are `"timeout"`, `"error"`, `"abort"`, and `"parsererror"`.
         * @property {String}
         * @member SUGAR.HttpError
         */
        this.textStatus = textStatus;

        /**
         * Textual portion of the HTTP status when HTTP error occurs.
         *
         * For example, `"Not Found"` or `"Internal Server Error"`.
         * @property {String}
         * @member SUGAR.HttpError
         */
        this.errorThrown = errorThrown;

        // The response will not be always a JSON string

        if (typeof(this.responseText) === "string" && this.responseText.length > 0) {
            try {
                var contentType = this.request.xhr.getResponseHeader("Content-Type");
                if (contentType && (contentType.indexOf("application/json") === 0)) {
                    this.payload = JSON.parse(this.responseText);
                    /**
                     * Error code.
                     *
                     * Additional failure information. See SugarCRM REST API documentation for a full list of error codes.
                     * @property {String}
                     * @member SUGAR.HttpError
                     */
                    this.code = this.payload.error;

                    /**
                     * Error message.
                     *
                     * Localized message appropriate for display to end user.
                     * @property {String}
                     * @member SUGAR.HttpError
                     */
                    this.message = this.payload.error_message;
                }
            }
            catch(e) {
                // Ignore this error
            }
        }
    };

    /**
     * Represents AJAX error.
     *
     * See Jquery/Zepto documentation for details.
     *
     * - http://api.jquery.com/jQuery.ajax/
     * - http://zeptojs.com/#$.ajax
     *
     * @class SUGAR.HttpError
     */
    _.extend(HttpError.prototype, {

        /**
         * Returns string representation of HTTP error.
         * @return {String} HTTP error as a string.
         * @member SUGAR.HttpError
         */
        toString: function() {
            return "HTTP error: " + this.status +
                "\ntype: " + this.textStatus +
                "\nerror: " + this.errorThrown +
                "\nresponse: " + this.responseText +
                "\ncode: " + this.code +
                "\nmessage: " + this.message;
        }

    });

    var HttpRequest = function(params, debug) {
        /**
         * Request parameters.
         *
         * See Jquery/Zepto documentation for details.
         *
         * - http://api.jquery.com/jQuery.ajax/
         * - http://zeptojs.com/#$.ajax
         *
         * @property {Object}
         * @member SUGAR.HttpRequest
         */
        this.params = params; // TODO: Consider cloning

        /**
         * Flag indicating that a request must output debug information.
         * @property {Boolean}
         * @member SUGAR.HttpRequest
         */
        this.debug = debug;

        /**
         * Number of times this request was executed.
         * @property {Number}
         * @member SUGAR.HttpRequest
         */
        this.numExecuted = 0;

        /**
         * The state object is used to store global enviroment conditions that may be relevent
         * when processing this request but would not be passed to the server.
         *
         * @property {Object}
         * @member SUGAR.HttpRequest
         */
        this.state = {};
    };

    /**
     * Represents AJAX request.
     *
     * Encapsulates XHR object and AJAX parameters.
     * @class SUGAR.HttpRequest
     *
     */
    _.extend(HttpRequest.prototype, {

        /**
         * Executes AJAX request.
         * @param {String=} token OAuth token. Must not be supplied for login type requests.
         * @param {String=} mdHash current private metadata hash, used to validate the client metadata against the server.
         * @param {String=} upHash Current User preferences hash, used to validate the client user pref data against the server.
         */
        execute: function(token, mdHash, upHash) {
            if (token) {
                this.params.headers = this.params.headers || {};
                this.params.headers["OAuth-Token"] = token;
            }
            if (mdHash) {
                this.params.headers = this.params.headers || {};
                this.params.headers["X-Metadata-Hash"] = mdHash;
            }
            if (upHash) {
                this.params.headers = this.params.headers || {};
                this.params.headers["X-Userpref-Hash"] = upHash;
            }

            //The state object is used to store global enviroment conditions that may be relevent
            //when processing this request but would not be passed to the server.
            this.state = _.extend(this.state, _state);

            if (this.debug) {
                console.log("====== Ajax Request Begin ======");
                console.log(this.params.type + " " + this.params.url);
                var parsedData = this.params.data ? JSON.parse(this.params.data) : null;
                if (parsedData && parsedData.password) parsedData.password = "***";
                console.log("Payload: ",  this.params.data ? parsedData : "N/A");
                var p = $.extend({}, this.params);
                delete p.data;
                console.log("params: ", p);
                console.log("====== Request End ======");
            }
            //In order to keep track of the number of ajax call in the air, we will add
            //a complete callback.
            // Do it only on the first run. No need to set this logic on subsequent execute calls.
            if (this.numExecuted == 0) {
                var origCallback = this.params.complete;
                this.params.complete = function() {
                    _numCallsInProgress--;
                    if (_.isFunction(origCallback))
                        origCallback.apply(this, arguments);
                };
            }

            /**
             * XmlHttpRequest object.
             * @property {Object}
             * @member SUGAR.HttpRequest
             */
            this.xhr = $.ajax(this.params);

            _numCallsInProgress++;
            this.numExecuted++;
        }

    });

    /**
     * Fake jqXHR object because bulk calls do not have their own individual XHR requests
     * @param {object} result object returned from the BulkAPI
     * @param {string|number} [result.status=200] The response status.
     * @param {Object} [result.status=200] The response headers.
     * @param {Object} [result.contents={}] The response contents.
     * @param {SUGAR.HttpRequest} parentReq bulk API request that this request is a part of.
     */
    var bulkXHR = function(result, parentReq) {
        var contents = result.contents || {};

        this.status = result.status || 200;
        this.statusText = result.status_text || '';
        this.responseText = _.isObject(contents) ? JSON.stringify(contents) : contents;
        this.readyState = 4;
        this._parent = parentReq.xhr;
        this.headers = result.headers;
    };

    _.extend(bulkXHR.prototype, {
        isResolved : function(){
            return this._parent.isResolved();
        },
        getResponseHeader: function(h) {
            return this.headers[h];
        },
        getAllResponseHeaders: function() {
            return _.reduce(this.headers, function(str, value, key){
                return str.concat(key + ": " + value + "\n");
            }, "");
        }
    });

    function SugarApi(args) {
        var _serverUrl,
            _platform,
            _keyValueStore,
            _clientID,
            _timeout,
            _refreshingToken,
            _defaultErrorHandler,
            _externalLogin,
            _allowBulk,
            _externalLoginUICallback = window.open,
            _accessToken = null,
            _refreshToken = null,
            _downloadToken = null,
            // request queue
            // used to support multiple request while in refresh token loop
            _rqueue = [],
            // dictionary of currently executed requests (keys are IDs)
            _requests = {},
            // request unique ID (counter)
            _ruid = 0;

        // if no key/value store is provided, the auth token is kept in memory
        _keyValueStore = args && args.keyValueStore;
        _serverUrl = (args && args.serverUrl) || "/rest/v10";
        // there will only be a fallback default error handler if provided here
        _defaultErrorHandler = (args && args.defaultErrorHandler) || null;
        _platform = (args && args.platform) || "";
        _clientID = (args && args.clientID) || "sugar";
        _timeout = ((args && args.timeout) || 30) * 1000;
        _externalLogin = false;
        _allowBulk = !(args && args.disableBulkApi);

        if (args && args.externalLoginUICallback && _.isFunction(args.externalLoginUICallback)) {
            _externalLoginUICallback = args.externalLoginUICallback;
        }

        if (_keyValueStore) {
            if (!$.isFunction(_keyValueStore.set) ||
                !$.isFunction(_keyValueStore.get) ||
                !$.isFunction(_keyValueStore.cut))
            {
                throw new Error("Failed to initialize Sugar API: key/value store provider is invalid");
            }
            _accessToken = _keyValueStore.get("AuthAccessToken");
            _refreshToken = _keyValueStore.get("AuthRefreshToken");
            _downloadToken = _keyValueStore.get("DownloadToken");
            if ($.isFunction(_keyValueStore.on)) {
                _keyValueStore.on("cache:clean", function(callback){
                    callback(["AuthAccessToken", "AuthRefreshToken", "DownloadToken"]);
                });
            }
        }

        _refreshingToken = false;

        if (args && args.reset) _numCallsInProgress = 0;

        var _resetAuth = function(data) {
            // data is the response from the server
            if (data) {
                _accessToken = data.access_token;
                _refreshToken = data.refresh_token;
                _downloadToken = data.download_token;
                if (_keyValueStore) {
                    _keyValueStore.set("AuthAccessToken", _accessToken);
                    _keyValueStore.set("AuthRefreshToken", _refreshToken);
                    _keyValueStore.set("DownloadToken", _downloadToken);
                }
            }
            else {
                _accessToken = null;
                _refreshToken = null;
                _downloadToken = null;
                if (_keyValueStore) {
                    _keyValueStore.cut("AuthAccessToken");
                    _keyValueStore.cut("AuthRefreshToken");
                    _keyValueStore.cut("DownloadToken");
                }
            }
        };

        var _handleErrorAndRefreshToken = function(self, request, callbacks){
            return function(xhr, textStatus, errorThrown) {
                var error = new HttpError(request, textStatus, errorThrown);
                var onError = function() {
                    // Either regular request failed or token refresh failed
                    // Call original error callback
                    if (_rqueue.length == 0 || self.refreshingToken(request.params.url)) {
                        if (callbacks.error) {
                            callbacks.error(error);
                        }
                        else if ($.isFunction(self.defaultErrorHandler)) {
                            self.defaultErrorHandler(error);
                        }
                    }
                    else {
                        // Token refresh failed
                        // Call original error callback for all queued requests
                        for(var i = 0; i < _rqueue.length; ++i) {
                            if (_rqueue[i]._oerror) _rqueue[i]._oerror(error);
                        }
                    }
                    self.setRefreshingToken(false);
                };

                var r, refreshFailed = true;
                if (self.needRefreshAuthToken(request.params.url, error.code)) {
                    //If we were unloading the queue when we got another 401, we should stop before we get into a loop
                    if (request._dequeuing) {
                        if (request._oerror) request._oerror(error);
                        //The tokens we have are bad, nuke them.
                        self.resetAuth();
                        return;
                    }
                    _rqueue.push(request);
                    self.setRefreshingToken(true);
                    self.login(null, { refresh: true }, {
                        complete: function() {
                            // Call original complete callback for all queued requests
                            // only if token refresh failed
                            // In case of requests succeed, complete callback is called by ajax lib
                            if (refreshFailed) {
                                while (r = _rqueue.shift()) {
                                    if (r._ocomplete) r._ocomplete.call(this, r);
                                }
                            }
                        },
                        success: function() {
                            refreshFailed = false;
                            self.setRefreshingToken(false);
                            _refreshTokenSuccess(
                                function(){
                                    // Repeat original requests
                                    while (r = _rqueue.shift()) {
                                        r._dequeuing = true;
                                        r.execute(self.getOAuthToken());
                                    }
                                }
                            );
                        },
                        error: onError
                    });
                }
                else if (self.needQueue(request.params.url)) {
                    // Queue subsequent request to execute it after token refresh completes
                    _rqueue.push(request);
                }
                else if(_externalLogin && error.status == 401 && error.payload && error.payload.url) {
                    if(!self.isLoginRequest(request.params.url)) {
                        _rqueue.push(request);
                    }
                    // don't try to reauth again from here
                    self.setRefreshingToken(true);
                    $(window).on("message", function(event) {
                        if(!event.originalEvent.origin || event.originalEvent.origin != window.location.origin) {
                            // this is not our message, ignore it
                            return;
                        }
                        $(window).on("message", null);
                        authData = $.parseJSON(event.originalEvent.data);
                        if(!authData || !authData.access_token) {
                            onError();
                        }
                        self.setRefreshingToken(false);
                        _resetAuth(authData);
                        _refreshTokenSuccess(
                            function(){
                                // Repeat original requests
                                while (r = _rqueue.shift()) {
                                    r.execute(self.getOAuthToken());
                                }
                            }
                        );
                    });
                    _externalLoginUICallback(error.payload.url, '_blank', "width=600,height=400,centerscreen=1,resizable=1");
                }
                else {
                    onError();
                }
            };
        };


        return {
            /**
             * Client Id for oAuth
             * @property {String}
             * @member SUGAR.Api
             */
            clientID: _clientID,

            /**
             * URL of Sugar REST end-point.
             * @property {String}
             * @member SUGAR.Api
             */
            serverUrl: _serverUrl,

            /**
             * Default fallback HTTP error handler. Used when api.call
             * is not supplied with an error: function in callbacks parameter.
             * @property {Function}
             * @member SUGAR.Api
             */
            defaultErrorHandler: _defaultErrorHandler,

            /**
             * Request timeout (in milliseconds).
             * @property {Number}
             * @member SUGAR.Api
             */
            timeout: _timeout,

            /**
             * Flag indicating if API should run in debug mode (console debugging of API calls).
             * @property {Boolean}
             * @member SUGAR.Api
             */
            debug: false,

            /**
             * Aborts a request by ID
             * @param {String} id Request ID
             */
            abortRequest: function(id) {
                var request = _requests[id];

                if (request) {
                    request.aborted = true;
                    if (request.xhr) {
                        request.xhr.abort();
                    }
                }
            },

            /**
             * Gets request by ID
             * @param {String} id Request ID
             */
            getRequest: function(id) {
                return _requests[id];
            },

            /**
             * Sets the callback to be triggered after a token refresh occurs
             * @param callback function to be called
             */
            setRefreshTokenSuccessCallback : function(callback) {
                if (_.isFunction(callback))
                    _refreshTokenSuccess = callback;
            },

            /**
             * Makes AJAX call via jquery/zepto AJAX API.
             *
             * @param  {String} method CRUD action to make (read, create, update, delete) are mapped to corresponding HTTP verb: GET, POST, PUT, DELETE.
             * @param  {String} url resource URL.
             * @param  {Object} data(optional) data will be stringified into JSON and set to request body.
             * @param  {Object} callbacks(optional) callbacks object.
             * @param  {Object} options(optional) options for request that map directly to the jquery/zepto Ajax options.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @private
             * @member SUGAR.Api
             */
            call: function(method, url, data, callbacks, options) {
                var request,
                    args,
                    type = _methodsToRequest[method],
                    self = this,
                    token = this.getOAuthToken();

                // by default use json headers
                var params = {
                    type: type,
                    dataType: 'json',
                    headers: {},
                    timeout: this.timeout,
                    contentType: 'application/json'
                };

                options = options || {};
                callbacks = callbacks || {};

                // if we dont have a url from options take arg url
                if (!options.url) {
                    params.url = url;
                }

                if (callbacks.success) {
                    params.success = function(data, status) {
                        /**
                         * XHR status code.
                         * @property {String/Number}
                         * @member SUGAR.HttpRequest
                         */
                        request.status = (data && data.status) ? data.status : status;
                        callbacks.success(data, request);
                    };
                }

                params.complete = function() {

                    delete _requests[request.uid];

                    // Do not call complete callback if we are in token refresh loop
                    // We'll call complete callback once the refresh completes
                    if (!_refreshingToken && callbacks.complete) {
                        callbacks.complete(request);
                    }
                };

                //Process the iframe transport request
                if (options.iframe === true) {
                    if (token) {
                        data = data || {};
                        data['OAuth-Token'] = token;
                        params.data = data;
                    }
                } else {
                    // set data for create, update, and delete
                    if (data && (method == 'create' || method == 'update' || method == 'delete')) {
                        params.data = JSON.stringify(data);
                    }
                }

                // Don't process data on a non-GET request.
                if (params.type !== 'GET') {
                    params.processData = false;
                }

                // Clients may override any of AJAX options.
                request = new HttpRequest(_.extend(params, options), this.debug);
                params.error = _handleErrorAndRefreshToken(self, request, callbacks);
                // Keep original error and complete callback for token refresh loop
                request._oerror = callbacks.error;
                request._ocomplete = callbacks.complete;

                //add request to requests hash
                request.uid = _ruid++;
                _requests[request.uid] = request;

                args = [
                    token,
                    options.skipMetadataHash ? null : this.getMetadataHash(),
                    options.skipMetadataHash ? null: this.getUserprefHash()
                ];
                // Login request doesn't need auth token
                if (this.isLoginRequest(url)) {
                    request.execute();
                } else if (this.isAuthRequest(url)) {
                    request.execute(token);
                } else if (params.bulk && _allowBulk) {
                    var bulkQueue = _bulkQueues[params.bulk] || [];
                    if (!_bulkQueues[params.bulk]){
                        _bulkQueues[params.bulk] = bulkQueue;
                    }
                    bulkQueue.push({
                        request: request,
                        args: args
                    });
                } else {
                    request.execute.apply(request, args);
                }

                return request;
            },

            /**
             * Begins a BulkAPI request. Previous uses of call() should have options.bulk set to an ID.
             * Calling triggerBulkCall with the same ID will combine all the previously queued requests into a single bulk call.
             * @param {Integer|String} bulkId
             * @member SUGAR.Api
             */
            triggerBulkCall: function(bulkId) {
                if (!_allowBulk) {
                    return;
                }

                bulkId = bulkId || true;
                var queue = _bulkQueues[bulkId],
                    requests = [],
                    version = _.last(this.serverUrl.split('/'));

                if (!queue) {
                    //TODO log an error here
                    return;
                }
                _.each(queue, function(r) {
                    var params = r.request.params,
                        args = r.args,
                        token = args[0],
                        mdHash = args[1],
                        upHash = args[2];

                    if (token) {
                        params.headers = params.headers || {};
                        params.headers['OAuth-Token'] = token;
                    }
                    if (mdHash) {
                        params.headers = params.headers || {};
                        params.headers['X-Metadata-Hash'] = mdHash;
                    }
                    if (upHash) {
                        params.headers = params.headers || {};
                        params.headers['X-Userpref-Hash'] = upHash;
                    }
                    //Url needs to be trimmed down to the version number.
                    if (params.url != '') {
                        params.url = version + params.url.substring(this.serverUrl.length);
                    }

                    requests.push(params);
                }, this);
                this.call('create', this.buildURL('bulk'), {requests:requests}, {
                    success: function(o, parentReq) {
                        _.each(queue, function(r, i) {
                            var request = r.request,
                                result = o[i],
                                contents = result.contents || {},
                                xhr = new bulkXHR(result, parentReq),
                                error;
                            request.xhr = xhr;

                            if (request.aborted === true || contents.error) {
                                request.status = "error";
                                if (_.isFunction(request.params.error)) {
                                    request.params.error.call(request.params, request, "error", xhr.statusText);
                                }
                            }
                            else {
                                if (_.isFunction(request.params.success)) {
                                    request.params.success.call(request.params, contents, "success");
                                }
                            }
                            if (_.isFunction(request.params.complete)) {
                                request.params.complete.call(request.params, request);
                            }
                        });
                    }
                });
                _bulkQueues[bulkId] = null;
            },

            clearBulkQueue: function(){
                _bulkQueues = {};
            },

            /**
             * Builds URL based on module name action and attributes of the format rooturl/module/id/action.
             *
             * The `attributes` hash must contain `id` of the resource being actioned upon
             * for record CRUD and `relatedId` if the URL is build for relationship CRUD.
             *
             * @param  {String} module module name.
             * @param  {String} action CRUD method.
             * @param  {Object} attributes(optional) object of resource being actioned upon, e.g. `{name: "bob", id:"123"}`.
             * @param  {Object} params(optional) URL parameters.
             * @return {String} URL for specified resource.
             * @private
             * @member SUGAR.Api
             */
            buildURL: function(module, action, attributes, params) {
                params = params || {};
                var parts = [];
                var url;
                parts.push(this.serverUrl);

                if (module) {
                    parts.push(module);
                }

                if ((action != "create") && attributes && attributes.id) {
                    parts.push(attributes.id);
                }

                if (attributes && attributes.link && action != "file") {
                    parts.push('link');
                }

                if (action && $.inArray(action, _baseActions) === -1) {
                    parts.push(action);
                }

                if (attributes && attributes.relatedId) {
                    parts.push(attributes.relatedId);
                }

                if (attributes && action == 'file' && attributes.field) {
                    parts.push(attributes.field);
                    if (attributes.fileId)
                        parts.push(attributes.fileId);
                }

                if (params.filter && action !== 'export') {
                    parts.push('filter');
                }

                url = parts.join("/");

                // URL parameters
                // remove nullish params
                _.each(params, function(value,key) {
                    if (value === null || value === undefined) {
                        delete params[key];
                    }
                });

                params = $.param(params);
                if (params.length > 0) {
                    url += "?" + params;
                }

                return url;
            },

            /**
             * Builds a file resource URL.
             *
             * The `attributes` hash must contain the following properties:
             *
             *     {
             *         module: module name
             *         id: record id
             *         field: Name of the file field in the given module (optional).
             *     }
             *
             * Example 1:
             *
             *     var url = app.api.buildFileURL({
             *        module: 'Contacts',
             *        id: '123',
             *        field: 'picture'
             *     });
             *
             *     // Returns:
             *     'http://localhost:8888/sugarcrm/rest/v10/Contacts/123/file/picture?format=sugar-html-json&platform=base'
             *
             * The `field` property is optional. If omitted the method returns a
             * URL for a list of file resources.
             *
             * Example 2:
             *
             *     var url = app.api.buildFileURL({
             *        module: 'Contacts',
             *        id: '123'
             *     });
             *
             *     // Returns:
             *     'http://localhost:8888/sugarcrm/rest/v10/Contacts/123/file?platform=base'
             *
             * @param {Object} attributes Hash with file information.
             * @param {Object} [options] URL options hash.
             * @param {boolean} [options.htmlJsonFormat] Flag indicating if
             *   `sugar-html-json` format must be used (`true` by default if
             *   `field` property is specified).
             * @param {boolean} [options.passDownloadToken] Flag indicating if
             *   download token must be passed in the URL (`false` by default).
             * @param {boolean} [options.deleteIfFails] Flag indicating if
             *   related record should be marked deleted:1 if file operation
             *   unsuccessful.
             * @param {boolean} [options.keep] Flag indicating if the temporary
             *   file should be kept when issuing a `GET` request to the
             *   `FileTempApi` (it is cleaned up by default).
             * @return {string} URL for the file resource.
             * @member SUGAR.Api
             */
            buildFileURL: function(attributes, options) {
                var params = {};
                options = options || {};
                // We only concerned about the format if build URL for an actual file resource
                if (attributes.field && (options.htmlJsonFormat !== false))  {
                    params.format = "sugar-html-json";
                }

                if (options.deleteIfFails === true) {
                    params.delete_if_fails = true;
                }

                // This is for BWC only. Don't document it and remove as soon as 6.7 is decommissioned.
                if (options.passOAuthToken) {
                    params.oauth_token = this.getOAuthToken();
                }

                if (options.passDownloadToken) {
                    params.download_token = this.getDownloadToken();
                }

                if (!_.isUndefined(options.forceDownload)) {
                    params.force_download = (options.forceDownload) ? 1 : 0;
                }

                if (options.cleanCache === true) {
                    params[(new Date()).getTime()] = 1;
                }

                if (options.platform !== undefined) {
                    params.platform = options.platform;
                } else if (_platform) {
                    params.platform = _platform;
                }

                if (options.keep === true) {
                    params.keep = 1;
                }

                return this.buildURL(attributes.module, "file", attributes, params);
            },

            /**
             * Returns the current access token
             */
            getOAuthToken: function() {
                return _keyValueStore ? _keyValueStore.get("AuthAccessToken") || _accessToken : _accessToken;
            },

            /**
             * Returns the current refresh token
             */
            getRefreshToken: function() {
                return _keyValueStore ? _keyValueStore.get("AuthRefreshToken") || _refreshToken : _refreshToken;
            },

            /**
             * Returns the current download token.
             */
            getDownloadToken: function() {
                return _keyValueStore ? _keyValueStore.get("DownloadToken") || _downloadToken : _downloadToken;
            },


            getMetadataHash: function() {
                return _keyValueStore ? _keyValueStore.get("meta:hash") : null;
            },

            /**
             * Gets the user preference hash for use in checking state of change
             *
             * @return {String} The user preference hash set from a /me response
             */
            getUserprefHash: function() {
                return _keyValueStore ? _keyValueStore.get("userpref:hash") : null;
            },

            /**
             * Fetches metadata.
             *
             * @param  {String} hash Hash of the current metadata. Used to determine if the metadata is out of date or not.
             * @param  {Array} types(optional) array of metadata types, e.g. `['vardefs','detailviewdefs']`.
             * @param  {Array} modules(optional) array of module names, e.g. `['accounts','contacts']`.
             * @param  {Object} callbacks(optional) callback object.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            getMetadata: function(hash, types, modules, callbacks, options) {
                options = options || {};
                var params = options.params || {}, method, url;

                if (types) {
                    params.type_filter = types.join(",");
                }

                if (modules) {
                    params.module_filter = modules.join(",");
                }

                if (_platform) {
                    params.platform = _platform;
                }

                method = 'read';

                if (options && options.getPublic) {
                    method = 'public';
                }

                url = this.buildURL("metadata", method, null, params);

                return this.call(method, url, null, callbacks);
            },

            /**
             * Executes CRUD on records.
             *
             * @param {String} method operation type: create, read, update, or delete.
             * @param {String} module module name.
             * @param {Object} data request object. If it contains id, action, link, etc., URI will be adjusted accordingly.
             * If methods parameter is 'create' or 'update', the data object will be put in the request body payload.
             * @param {Object} params(optional) URL parameters.
             * @param {Object} callbacks(optional) callback object.
             * @param {Object} options(optional) request options.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            records: function(method, module, data, params, callbacks, options) {
                var url = this.buildURL(module, method, data, params);
                return this.call(method, url, data, callbacks, options);
            },

            /**
             * Executes CRUD on relationships.
             *
             * The data paramerer represents relationship information:
             * <pre>
             * {
             *    id: record ID
             *    link: relationship link name
             *    relatedId: ID of the related record
             *    related: object that contains request payload (related record or relationship fields)
             * }
             * </pre>
             *
             * @param {String} method operation type: create, read, update, or delete.
             * @param {String} module module name.
             * @param {Object} data object with relationship information.
             * @param {Object} params(optional) URL parameters.
             * @param {Object} callbacks(optional) callback object.
             * @param {Object} options(optional) request options.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            relationships: function(method, module, data, params, callbacks, options) {
                var url = this.buildURL(module, data.link, data, params);
                return this.call(method, url, data.related, callbacks, options);
            },

            /**
             * Marks/unmarks a record as favorite.
             * @param {String} module Module name.
             * @param {String} id Record ID.
             * @param {Boolean} favorite Flag inditicating if the record must be marked as favorite.
             * @param {Object} callbacks(optional) Callback object.
             * @param {Object} options(optional) request options.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            favorite: function(module, id, favorite, callbacks, options) {
                var action = favorite ? "favorite" : "unfavorite";
                var url = this.buildURL(module, action, { id: id });
                return this.call('update', url, null, callbacks, options);
            },

            /**
             * Subscribe/unsubscribe a record changes.
             * @param {String} module Module name.
             * @param {String} id Record ID.
             * @param {Boolean} followed Flag indicates if wants to subscribe
             * the record changes.
             * @param {Object} callbacks(optional) Callback object.
             * @param {Object} options(optional) request options.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            follow: function(module, id, followed, callbacks, options) {
                callbacks = callbacks || {};
                options = options || {};
                var method = followed ? 'create' : 'delete',
                    action = followed ? 'subscribe' : 'unsubscribe',
                    url = this.buildURL(module, action, { id: id });
                return this.call(method, url, null, callbacks, options);
            },

            /**
             * Loads an enum field's options using the enum API
             * @param {String} module Module name.
             * @param {String} field Name of enum field.
             * @param {Object} callbacks
             * @param {Object} options Options object (optional)
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            enumOptions: function(module, field, callbacks, options){
                var url = this.buildURL(module+"/enum/"+field);
                return this.call('read', url, null, callbacks, options);
            },


            /**
             * Given a url, attempt to download a file
             * @param url {String} url to call
             * @param {Object} callbacks(optional) Callback object
             * @param {Object} options(optional)
             *  - iframe: jquery element upon which to attach the iframe for download
             *    if not specified we must fall back to window.location.href
             */
            fileDownload: function(url, callbacks, options) {
                options = options || {};
                var internalCallbacks = {};

                internalCallbacks.success = function(data) {
                    // start the download with the "iframe" hack
                    if (options.iframe) {
                        options.iframe.prepend('<iframe class="hide" src="' + url + '"></iframe>');
                    }
                    else {
                        window.location.href = url;
                    }
                    if (_.isFunction(callbacks.success)) {
                        callbacks.success.apply(arguments);
                    }
                };

                if (_.isFunction(callbacks.error)) {
                    internalCallbacks.error = callbacks.error;
                }

                if (_.isFunction(callbacks.complete)) {
                    internalCallbacks.complete = callbacks.complete;
                }

                // ping to make sure we have our token, then make an iframe and download away
                return this.call('read', this.buildURL('ping'), {}, internalCallbacks, {processData: false});
            },

            /**
             * Executes CRUD on a file resource.
             *
             * @param {String} method operation type: create, read, update, or delete.
             * @param {Object} data object with file information.
             * <pre>
             * {
             *   module: module name
             *   id: model id
             *   field: Name of the file-type field.
             * }
             * </pre>
             * The `field` property is optional. If not specified, the API fetches the file list.
             * @param {Object} $files(optional) jQuery/Zepto DOM elements that carry the files to upload.
             * @param {Object} callbacks(optional) callback object.
             * @param {Object} options(optional) Request options hash.
             *
             * - htmlJsonFormat: Boolean flag indicating if `sugar-html-json` format must be used (`true` by default)
             * - iframe: Boolean flag indicating if iframe transport is used (`true` by default)
             * See {@link SUGAR.Api#buildFileURL} function for other options.
             *
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            file: function(method, data, $files, callbacks, options) {
                var ajaxParams = {
                    files: $files,
                    processData: false
                };

                //delete method doesn't need to go through the iframe transport
                if (method === 'delete') {
                    ajaxParams.iframe = false;
                } else if (!options || options.iframe !== false) {
                    ajaxParams.iframe = true;

                    // pass OAuth token as GET-parameter during file upload.
                    // otherwise, in case if file is too large, the whole request body may be
                    // ignored by interpreter together with the token
                    options = options || {};
                    options.passOAuthToken = true;
                }

                if (!options || options.deleteIfFails !== false) {
                    options = options || {};
                    options.deleteIfFails = true;
                }

                callbacks.success = _.wrap(callbacks.success, function(success, data, request) {
                    if (data.error && _.isFunction(callbacks.error)) {
                        callbacks.error(data);
                    } else if (_.isFunction(success)) {
                        success(data);
                    }
                });

                return this.call(method, this.buildFileURL(data, options),
                    null, callbacks, ajaxParams);
            },

            /**
             * Triggers a file download of the exported records.
             *
             * @param {Object} params - list of params
             * <pre>
             * {
             *      module: Module name
             *      uid : an array of record ids to request export
             * }
             * </pre>
             * @param $el JQuery selector to element (needed for attaching iframe)
             * @param {Object} callbacks(optional) list of callbacks {success:, error:, complete:}
             * @param {Object} options(optional) Request options hash
             *
             * - passOAuthToken: Boolean flag indicating if OAuth token must be passed in the URL (`true` by default)
             *
             * @see FilterAPI
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            exportRecords: function(params, $el, callbacks, options) {
                var self = this,
                    recordListUrl = this.buildURL(params.module, 'record_list');

                options = options || {};

                return this.call(
                    'create',
                    recordListUrl,
                    {'records': params.uid},
                    {
                        success: function(response) {
                            params = _.omit(params, ['uid', 'module']);
                            if (options.platform !== undefined) {
                                params.platform = options.platform;
                            } else if (_platform) {
                                params.platform = _platform;
                            }

                            self.fileDownload(
                                self.buildURL(response.module_name, 'export', {relatedId: response.id}, params),
                                callbacks,
                                { iframe: $el }
                            );
                        }
                    }
                );
            },

            /**
             * Searches for specified query.
             * @param {Object} params properties: q, module_list, fields, max_num, offset. The query property is required.
             * { q: query, module_list: commaDelitedModuleList, fields: commaDelimitedFields, max_num: 20 },
             * @param {Object} callbacks hash with with callbacks of the format {success: function(data){}, error: function(data){}}
             * @param {Object} options(optional) request options.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            search: function(params, callbacks, options) {
                var url = this.buildURL(null, "search", null, params);
                return this.call('read', url, null, callbacks, options);
            },

            /**
             * Performs login.
             *
             * Credentials:
             * <pre>
             *     username: user's login name or email,
             *     password: user's password in clear text
             * </pre>
             *
             * @param  {Object} credentials user credentials.
             * @param  {Object} data(optional) extra data to be passed in login request such as client user agent, etc.
             * @param  {Object} callbacks(optional) callback object.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            login: function(credentials, data, callbacks) {
                var payload, success, error, method, url;

                credentials = credentials || {};
                callbacks = callbacks || {};

                success = function(data) {
                    _resetAuth(data);
                    if (callbacks.success) callbacks.success(data);
                };

                error = function(error) {
                    _resetAuth();
                    if (callbacks.error) callbacks.error(error);
                };

                if(data && data.refresh) {
                    payload = _.extend({
                        grant_type:"refresh_token",
                        client_id: this.clientID,
                        client_secret:"",
                        refresh_token: this.getRefreshToken(),
                        platform: _platform ? _platform : 'base'
                    }, data);
                } else {
                    payload = _.extend({
                        grant_type:"password",
                        username: credentials.username,
                        password: credentials.password,
                        client_id: this.clientID,
                        platform: _platform ? _platform : 'base',
                        client_secret:""
                    }, data);
                    payload.client_info = data;
                }

                method = 'create';
                url = this.buildURL("oauth2", "token", payload);
                return this.call(method, url, payload, {
                    success: success,
                    error: error,
                    complete: callbacks.complete
                });
            },

            /**
             * Executes CRUD on user profile.
             *
             * @param {String} method operation type: read or update (reserved for the future use).
             * @param {Object} data(optional) user profile object.
             * @param {Object} params(optional) URL parameters.
             * @param {Object} callbacks(optional) callback object.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            me: function(method, data, params, callbacks) {
                var url = this.buildURL("me", method, data, params);
                return this.call(method, url, data, callbacks);
            },

            /**
             * Makes a call to the CSS Api
             *
             * @param {String} platform
             * @param {Object} themeName
             * @param {Object} callbacks(optional) callback object.
             * @return {SUGAR.HttpRequest} AJAX request.
             */
            css: function(platform, themeName, callbacks) {
                var params = {
                    platform : platform,
                    themeName : themeName
                };
                var url = this.buildURL("css", "read", {}, params);
                return this.call("read", url, {}, callbacks);
            },

            /**
             * Performs logout.
             *
             * @param {Object} callbacks(optional) callback object.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            logout: function(callbacks) {
                callbacks = callbacks || {};
                var payload = { "token": this.getOAuthToken(), "refresh_token": this.getRefreshToken()  };
                var url = this.buildURL("oauth2", "logout", payload);

                var originalComplete = callbacks.complete;
                callbacks.complete = function() {
                    _resetAuth();
                    if (originalComplete) originalComplete();
                };

                return this.call('create', url, payload, callbacks);
            },

            /**
             * Pings the server.
             *
             * The request doesn't send metadata hash by default.
             * Pass `false` for "skipMetadataHash" option to override this behavior.
             * @param {String} action(optional) Optional ping operation.
             * Currently, Sugar REST API supports "whattimeisit" only.
             * @param {Object} callbacks(optional) callback object.
             * @param {Object} options(optional) request options.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            ping: function(action, callbacks, options) {
                return this.call(
                    'read',
                    this.buildURL('ping', action, null, {
                        platform: _platform
                    }),
                    null,
                    callbacks,
                    _.extend({
                        skipMetadataHash: true
                    }, options || {})
                );
            },

            /**
             * Performs signup.
             *
             * TODO: The signup action needs another endpoint to allow a guest to signup
             *
             * @param  {Object} contactData user profile.
             * @param  {Object} data(optional) extra data to be passed in login request such as client user agent, etc.
             * @param  {Object} callbacks(optional) callback object.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            signup: function(contactData, data, callbacks) {
                var payload = contactData;
                payload.client_info = data;

                var method = 'create';
                var url = this.buildURL("Leads", "register", payload);
                return this.call(method, url, payload, callbacks);
            },


            /**
             * Verify password
             *
             * @param  {Object} password the password to verify
             * @param  {Object} callbacks(optional) callback object.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            verifyPassword: function(password, callbacks) {
                var payload = {
                    password_to_verify: password
                };
                var method = 'create'; //POST so we don't require query params
                var url = this.buildURL("me/password", method);
                return this.call(method, url, payload, callbacks);
            },

            /**
             * Update password
             *
             * @param  {Object} password the new password
             * @param  {Object} password the new password
             * @param  {Object} callbacks(optional) callback object.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            updatePassword: function(oldPassword, newPasword, callbacks) {
                var payload = {
                    new_password: newPasword,
                    old_password: oldPassword
                };
                var method = 'update';
                var url = this.buildURL("me/password", method);
                return this.call(method, url, payload, callbacks);
            },

            /**
             * Fetches server information.
             * @param {Object} callbacks(optional) callback object.
             * @return {SUGAR.HttpRequest} AJAX request.
             * @member SUGAR.Api
             */
            info: function(callbacks) {
                var url = this.buildURL("ServerInfo");
                return this.call("read", url, null, callbacks);
            },

            /**
             * Checks if API instance is currently authenticated.
             *
             * @return {Boolean} true if authenticated, false otherwise.
             * @member SUGAR.Api
             */
            isAuthenticated: function() {
                return typeof(this.getOAuthToken()) === "string" && this.getOAuthToken().length > 0;
            },

            /**
             * Clears authentication tokens.
             */
            resetAuth: function() {
                _resetAuth();
            },

            /**
             * Checks if authentication token can and needs to be refreshed.
             * @param {String} url URL of the failed request.
             * @param {String} errorCode Failure code.
             * @return {Boolean} `true` if the OAuth2 access token can be refreshed, `false` otherwise.
             * @member SUGAR.Api
             * @private
             */
            needRefreshAuthToken: function(url, errorCode) {
                return (!_refreshingToken) &&
                    (typeof(this.getRefreshToken()) === "string" && this.getRefreshToken().length > 0) &&
                    (!this.isAuthRequest(url)) &&    // must not be auth request
                    (errorCode === "invalid_grant");    // means access token got expired or invalid
            },

            /**
             * Checks if we need to queue a request while token refresh is in progress
             * @param url
             * @private
             */
            needQueue: function(url) {
                return _refreshingToken && !this.isAuthRequest(url);    // must not be auth request
            },

            /**
             * Checks if the request is authentication request.
             *
             * It could be either login (including token refresh) our logout request.
             * @param url
             */
            isAuthRequest: function(url) {
                return new RegExp('\/oauth2\/').test(url);
            },

            /**
             * Checks if request is a login request.
             * @param url
             */
            isLoginRequest: function(url) {
                return new RegExp('\/oauth2\/token').test(url);
            },

            /**
             * Checks if the request is the refresh token request
             * @param url
             * @private
             */
            refreshingToken: function(url) {
                return _refreshingToken && this.isAuthRequest(url);    // must be auth request
            },

            /**
             * Sets a flag indicating that this API instance is in the process of authentication token refresh.
             * @param {Boolean} flag Flag indicating if token refresh is in progess (`true`).
             * @member SUGAR.Api
             * @private
             */
            setRefreshingToken: function(flag) {
                _refreshingToken = flag;
            },

            /**
             * Sets a flag indicating that external login prodecure is used.
             * This means that 401 errors would contain external URL that we should use for authentication.
             * @param {Boolean} flag Flag indicating if external login is in effect
             * @member SUGAR.Api
             * @public
             */
            setExternalLogin: function(flag) {
                _externalLogin = flag;
            },

            /**
             * Retrieve a property from the current state.
             *
             * @param {String} key
             * @returns {*}
             */
            getStateProperty: function(key) {
                return _state[key];
            },

            /**
             * Set a property of the current state. The current state will be attached to all
             * api request objects when they are sent. Modifications to the state after the request is sent
             * but before the request completes will not affect that requests state.
             *
             * States should be used to track conditions or parameters that should be applied to all requests made
             * regardless of their source.
             *
             * @param {String} key
             * @param {*} value
             */
            setStateProperty: function(key, value) {
                _state[key] = value;
            },

            /**
             * Removes the given key from the current state
             * @param key
             */
            clearStateProperty: function(key) {
                delete _state[key];
            },

            /**
             * Clears the current API request state object.
             */
            resetState: function(){
                _state = {};
            }
        };
    }

    return {
        /**
         * Gets an instance of Sugar API class.
         * @param args
         * @return {SUGAR.Api} an instance of Sugar API class.
         * @member SUGAR.Api
         * @static
         */
        getInstance: function(args) {
            return _instance || this.createInstance(args);
        },

        /**
         * Creates a new instance of Sugar API class.
         * @param args
         * @return {SUGAR.Api} a new instance of Sugar API class.
         * @member SUGAR.Api
         * @static
         */
        createInstance: function(args) {
            _instance = new SugarApi(args);
            return _instance;
        },

        getCallsInProgressCount:function(){
            return _numCallsInProgress;
        },

        HttpError: HttpError,
        HttpRequest: HttpRequest
    };

})();

//END SUGARAPI.JS

ls.cut = function(key) { 
    return ls.remove(key);
};

// Binding a Node.js based keyValueStore by default
var _createInstance = SUGAR.Api.createInstance;
SUGAR.Api.createInstance = function(args){
    args = _.extend({keyValueStore: ls}, args);
    return _createInstance(args);
};

module.exports = SUGAR.Api;

