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

({
    extendsFrom: 'RecordListView',

    /**
     * @inheritdoc
     */
    initialize: function(options) {
        this.contextEvents = _.extend({}, this.contextEvents, {
            'list:checkout:fire': 'checkoutItem'
        });
        this._super('initialize', [options]);
    },

    /**
     * Open the drawer to checkout item
     *
     * @param model The record we are checking out
     */
    checkoutItem: function(model) {
        var def = {
            layout: 'checkout-item',
            context: {
                model: model,
                module: this.module
            }
        }

        // Re-fetch the latest data and update the listview
        var onClose = function() {
            model.fetch();
        }

        app.drawer.open(def, onClose);
    }
})