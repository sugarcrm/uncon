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

// Register a custom action for Meetings module
customization.registerRecordAction({

    // Unique action name
    name: 'create-related-notes',

    // Display for Meetings module only
    modules: ['Meetings'],

    // Display in context menu of the list view and toolbar of the record view
    views: ['list', 'detail'],

    // Action name. Normally, you would specify a label like LBL_CAPTURE_NOTES
    // which should be defined on the server to support i18n. 
    label: 'Capture Notes',

    // Controls the relative position of the button with respect to other actions
    // The higher the rank the closer the button will be displayed to the left side of the toolbar or menu.
    rank: 0,
    
    // Icon key from the default set or custom specified in config/app.json UI section
    iconKey: 'actions.file-text',

    // Handlers to control visibility and whether the action is enabled or not
    stateHandlers: {
        isVisible: function isVisible(view, model) {
            return true;
        },
        
        isEnabled: function(view, model) {
            return true;
        },
    },

    // Put the custom logic into the handler method.
    handler: function(view, model) {
        // Navigate to the related Notes create view.
        app.controller.navigate(app.nomad.buildLinkRoute(
            model.module,
            model.id,
            'notes',
            'create'
        ));
    },


});

