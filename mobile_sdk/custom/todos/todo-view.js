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

// Register a custom main menu item
customization.registerMainMenuItem({

        // Item title. Normally, it would be a label like LBL_TODO defined on the server-side to support i18n.
        label: 'Todo',

        // Navigation route. Translates to URL hash "#todo"
        route: 'todo',

        // Control item visibility
        isVisible: function() { return true; },

        // Control item position
        rank: 1,

        // Invoked when a user chooses the item in the menu
        onItemSelect: function() {
            app.controller.loadScreen({
                layouts: [ TodoLayout ]
            });
        },
    }
);

// Define custom Todo view
var TodoView = customization.registerView({
    type: 'todoList',
}, {

    // Specify view HBS template
    template: 'todo-view',
    
    initialize: function(options) {
        this._super(options);

        // Render the view when the collection is modified
        this.listenTo(this.collection, 'reset', this.render);
    },
    
    // Override loadData method to provide custom logic
    loadData: function() {

        // Fetch data from an external source
        $.ajax({
            url: 'http://jsonplaceholder.typicode.com/todos',
            success: _.bind(function onAjaxSuccess(data) {

                // Update collection with the data
                this.collection.reset(data);

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
                app.alert.dismiss('DATA_SYNCING');
            },
        });
    },
    
});

// Register custom Todo layout
var TodoLayout = customization.registerLayout({
    name: 'TodoLayout',
    module: 'Todo',

    // Todo layout contains just one view: TodoView
    views: [TodoView],

    // Configure header's look-and-feel: title and visibility of buttons
    header: {
        enabled: true,
        title: 'Todo',
        buttons: {
            menu: true,
        },

    },

});
