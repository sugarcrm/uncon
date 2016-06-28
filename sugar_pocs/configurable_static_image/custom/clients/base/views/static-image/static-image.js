({
    plugins: ['Dashlet'],

    _defaultOptions: {auto_refresh: 0},
    fileToDelete: '',

    render: function() {
        this._super('render');


        if (this.context.get('fileToDelete')) {
            app.api.call('delete', app.api.buildURL('deleteDashletImage'), {image: this.context.get('fileToDelete')}, {
                success: function (data) {
                }
            });

            this.context.set('fileToDelete','');
        }
    },

    initialize: function (options) {
        this._super('initialize', [options]);
    },

    initDashlet: function (view) {
        var self = this;
        this.viewName = view;
        this.token = app.api.getOAuthToken();
        var settings = _.extend({}, this._defaultOptions, this.settings.attributes);
    },

    customRemoveClicked: function (evt) {
        var image = this.settings.attributes.static_image;
        app.alert.show('delete_confirmation', {
            level: 'confirmation',
            messages: app.lang.get('LBL_REMOVE_DASHLET_CONFIRM', this.module),
            onConfirm: _.bind(function () {
                if (image) {
                    app.api.call('delete', app.api.buildURL('deleteDashletImage'), {image: image}, {
                        success: function (data) {
                        }
                    });
                }
                this.layout.removeDashlet();
            }, this)
        });
    },
})