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
 * @class View.Views.Base.CustomerJourneyDashletView
 * @alias SUGAR.App.view.views.BaseCustomerJourneyDashletView
 * @extends View.View
 */
({
    plugins: ['Dashlet'],

    initialize: function (options) {
        this._super('initialize', [options]);
        this.on("render", this.checkSettings, this);
        this.layout.before('dashletconfig:save', _.bind(this.saveInputData, this));
    },

    saveInputData: function () {
        var val_array = [];
        var fields = this.fields;
        var valid = true;
        var self = this;

        _.each(fields, function (field) {
            if (field.type === 'custom-row-field') {
                if (self.validateField(field)) {
                    _.each(field.category, function (category) {
                        var label_value = [];
                        _.each(category.rows, function (row) {
                                label_value.push({
                                    label: row.label,
                                    value: row.value,
                                });
                        })

                        val_array.push({
                            name: category.value,
                            label_value: label_value,
                        });
                    });
                }
                else {
                    valid = false;
                }
            }
        });
        if (!valid) {
            return false;
        }

        this.settings.set("inputFieldsArray", val_array);
    },

    validateField: function (field) {
        var valid = true;

        _.each(field.category, function (category) {
            if (field.groupedChart && _.isEmpty(category.value)) {
                valid = false;
            }
            _.each(category.rows, function (row) {
                if (_.isEmpty(row.label) || _.isEmpty(row.value)) {
                    valid = false;
                }
            })
        })

        if (!valid) {
            app.alert.show('message-id', {
                level: 'error',
                messages: 'All fields must be filled in',
                autoClose: false
            });
        }

        return valid;
    },

    checkSettings: function () {
        var self = this;
        if (self.meta.config) {
            if (!self.settings.get('inputFieldsArray')) {
                self.settings.set('inputFieldsArray', []);
            }
        }
    },

    _renderField: function (field) {
        this._super('_renderField', [field]);
        if (this.meta.config) {
            if (!_.isUndefined(field.def.toggle)) {
                var toggle = this.getField(field.def.toggle), dependent = this.getField(field.def.dependent);
                this._toggleDepedent(toggle, dependent);
                this.settings.on('change:' + toggle.name, _.bind(function (event) {
                    this._toggleDepedent(toggle, dependent);
                }, this));
                this.settings.on('change:' + dependent.name, _.bind(function (event) {
                    this._toggleDepedent(toggle, dependent);
                }, this));
            }
        }

        if (_.isUndefined(this.chartField) && field.name === 'chart') {
            this.chartField = field;
        }
    },
})
