/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/Resources/Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */
var app = SUGAR.App;
var customization = require('%app.core%/customization');
var ListContainerDashletView = require('%app.dashlets%/list-container-dashlet-view');

// Declare a custom dashlet
customization.registerDashlet({
    // Extend from the base list dashlet
    parent: ListContainerDashletView,
    // Metadata type defined on the server-side
    type: 'todo',
    // Key to icon CSS class. Use an icon from a standard set or define your own in config/app.json
    iconKey: 'dashlets.todo',

}, {
    initialize: function(options) {
        // Specify dashlet HBS template
        options.listParams = { template: app.template.get('todo-dashlet') };
        this._super(options);
    },

    // Override loadData method to implement custom logic
    loadData: function() {
        // Display Loading... banner
        app.alert.show('ajax_load', {
            level: 'load',
            closeable: false,
            messages: app.lang.get('LBL_LOADING'),
        });

        // Fetch data from an external source
        $.ajax({
            url: 'http://jsonplaceholder.typicode.com/todos',
            success: _.bind(function onAjaxSuccess(data) {

                // Set data into the dashlet's collection
                // This will trigger rendering pipeline
                this.listView.collection.reset(data);

                // Render success banner
                app.alert.show('ajax_load_success', {
                    level: 'success',
                    autoClose: true,
                    messages: 'Data is loaded.',
                });
            }, this),

            error: function onAjaxError() {
                app.alert.show('ajax_load_error', {
                    level: 'error',
                    autoClose: true,
                    messages: 'Error loading data.',
                });
            },

            complete: function onAjaxComplete() {
                app.alert.dismiss('ajax_load');
            },
        });
    },
});
