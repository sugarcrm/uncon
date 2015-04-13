var _ = require('underscore');

/** Sugar API Server credentials **/

var api = require('./sugarapi-node').getInstance({
    serverUrl: "http://localhost/~mmarum/sugarcrm/rest/v10",
    platform: "base",
    timeout: 30,
});


/**
 * Sample App that logs in and polls the Sugar v10 REST API
 **/
var app = {
    /**
     * Default API request callbacks
     */
    defaultCallbacks : {
        /**
        * Default error callback logs error to console and exits process
        */
        error : function(errors, request){
            console.log("API Error!");
            console.log(request);
            console.log(errors);
            // End the node process to avoid trashing anything further
            process.exit(1); 
        },
        /**
        * Default complete callback, makes sure that next clock tick is setup
        */
        complete : function(request){
            console.log("completed: " + (_.isEmpty(request) ? "undefined" : request.params.url));
            app.next();
        },
    },

    /**
     * Entry point to this Node app, run only once
     */
    start: function(){
        var self = this;
        api.login({
            username : "admin",
            password : "admin"
        }, null, {
            success : function(data){
                console.log("OAuth-Token : " + api.getOAuthToken());
                self.next();
            }
        });
    },
    /**
    * Sets up next clock tick, should not need to call directly if you are using default callbacks
    */
    next: _.throttle(function(){
            this.tick();
        }, 5000),
    /**
     * tick() is called continuously after app has started.  
     * Will be called no more often than once every 5 seconds by default.
     **/
    tick : function (){
        var self = this;
        api.me('read', null, null, _.extend({
            success: function(data){
                console.log("Current User's Full name: " + data.current_user.full_name);
            }
        }, this.defaultCallbacks));
    }
}

app.start();


/** Log out and shutdown on CTRL-C **/
process.on('SIGINT', function(){
  console.log("logging out");
  api.logout({
    complete: function(){
        process.exit(0);
    }
  });
});


