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
    extendsFrom: 'RecordView',

    /**
     * @inheritdoc
     */
    initialize: function(options) {
        this._super('initialize', [options]);
        this.context.on('button:checkout_button:click', this.checkout, this);
        this.context.on('button:cancel_checkout_button:click', this.cancel, this);
    },

    /**
     * Checkout out some equipment
     */
    checkout: function() {
        if (this.$el.find('[name="quantity"]').val() > this.model.get('num_available')) {
            this.alert('too_many', 'warning', 'LBL_TOO_MANY');
            return;
        }

        var url = app.api.buildURL(this.module, null, {id: this.model.id});
        var callbacks = {
            success: function() {
                this.alert('success_checkout', 'success', 'LBL_CHECKED_OUT');
                app.drawer.close();
            },
            error: function() {
                this.alert('server-error', 'error', 'ERR_GENERIC_SERVER_ERROR');
            }
        }
        app.api.call('update', url, {}, callbacks);
    },

    /**
     * Cancel out of the drawer
     */
    cancel: function () {
        app.drawer.close();
    },

    /**
     * Helper function to show alerts
     *
     * @param name Name of the alert
     * @param level Level of the alert like `success`, `warning`, etc
     * @param message Message you want to show in the alert
     */
    alert: function(name, level, message) {
        app.alert.show(name, {
            level: level,
            messages: app.lang.get(message, this.module),
            autoClose: true
        });
    }
})
