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
/**
 *
 * @class View.Fields.Base.UnconPriceField
 * @alias SUGAR.App.view.fields.BaseUnconPriceField
 * @extends View.Fields.Base.BaseField
 */
({
    /**
     * Checks if the price is expensive.
     *
     * @return {boolean} `true` is higher than the expensive limit set in the
     * metadata.
     */
    isExpensive: function() {
        return this.value >= this.def.expensive_limit;
    },

    /**
     * Checks if the price is cheap.
     *
     * @return {boolean} `true` is lower than the cheap limit set in the
     * metadata.
     */
    isCheap: function() {
        return this.value <= this.def.cheap_limit;
    },

    /**
     * Decorates the field accordingly to its value.
     */
    decorate: function() {
        if (this.isExpensive()) {
            this.$el.addClass('highlighted-red');
            return;
        }

        if (this.isCheap()) {
            this.$el.addClass('highlighted-green');
            this._addSmiley();
            return;
        }

    },

    /**
     * Adds a smiley next to the field.
     *
     * @private
     */
    _addSmiley: function() {
        this.$el.append('<i class="fa fa-smile-o"></i>');
    },

    /**
     * @inheritdoc
     */
    render: function() {
        this._super('render');
        this.decorate();
    }
})
