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
/**
 * @class View.Views.Base.Leads.CreateView
 * @alias SUGAR.App.view.views.LeadsCreateView
 * @extends View.Views.Base.CreateView
 */
({
    action : 'view',

    headerFields: [
        {
            name : "name",
            label: "LBL_NAME"
        },
        {
            name : "tag",
            label: "LBL_TAGS"
        },
    ],

    bindDataChange: function() {
        this._super('bindDataChange');

        this.model.on('sync', function() {
            this.render();
        }, this);
        //Retrieve the collection field from the parent model
        this.collection = this.model.get('equip_powers');
    },

    _render: function() {
        if (this.collection) {
            this.collection.each(function(model) {
                //Ensure the name are links to the items
                model.fields.name.link = true;
                if (model.get('image')) {
                    //Images are retrieved over the API
                    model._image = app.api.buildFileURL({
                        module: model.module,
                        id: model.id,
                        field: 'image'
                    });
                }
            });
        }
        this._super('_render', arguments);
    }
})
