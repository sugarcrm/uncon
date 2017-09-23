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
 * Button to launch an external meeting
 *
 * @class View.Fields.Base.Contacts.Equipment
 * @alias SUGAR.App.view.fields.BaseContactsEquipmentField
 * @extends View.Fields.Base.Base
 */
({
    extendsFrom: 'RelateField',

    events: {
        'click  .removeEquipment': 'removeItem',
        'click  .addEquipment': 'addItem',
    },

    /**
     * @inheritdoc
     */
    initialize: function(options) {
        this._super('initialize', [options]);
        // Undo any metadata manipulation done by the base metadata manager
        // that assumed these fields belonged to the parent module.
        this.def.fields = _.map(this.def.fields, function(field) {
            return field.name ? field.name : field;
        });
    },

    format: function(collection) {
        if (collection instanceof app.data.beanCollection) {
            var value = _.map(collection.models, function(model) {
                var id = model.get('id');
                var href = "";
                if (app.acl.hasAccess('view', model.module, {acls: model._acl})) {
                    href = '#' + app.router.buildRoute(model.module, id);
                }
                //These values will be used by the template to render the items in the collection
                return {
                    id: id,
                    module: model.module,
                    href: href,
                    image: app.api.buildFileURL({
                        module: model.module,
                        id: id,
                        field: 'image'
                    }),
                    name: model.get('name')
                }
            }, this);
            //Show an empty item if we are in "adding mode" or if the collection is empty
            if (collection.isEmpty() || this.adding) {
                value.push({id:"", name:""});
            }
            return value;
        }

        return null;
    },

    /**
     * This function is called whenever the user selects or removes an item from the dropdown
     */
    _onSelect2Change: function(e) {
        var collection = this.model.get(this.name);
        var link = this.def.links && this.def.links[0];

        if (_.isEmpty(e.val) || !link) {
            return;
        }
        this._changing = true;

        if (e.removed) {
            var removedBean = collection.get(e.removed);
            collection.remove(removedBean);
        }
        if (e.added && !collection.get(e.added)) {
            this.adding = false;
            var addedBean = app.data.createRelatedBean(this.model, null, link, {
                id: e.added.id,
                name: e.added.text,
                //This is critical for tracking mixed bean collection changes
                _link: link
            });
            collection.add(addedBean);
        }
        this._changing = false;

        this.render();
    },

    bindDataChange: function() {
        if (this.model) {
            this.model.on('change:' + this.name, function(){
                if (!this._changing) {
                    this.render();
                }
            }, this);
        }
    },

    addItem: function() {
        this.adding = true;
        this.render();
    },

    removeItem: function(e) {
        var id = $(e.target).closest('a').data('id');
        var collection = this.model.get(this.name);
        if (id) {
            var model = collection.get(id);
            collection.remove(model);
            this.render();
        }
    }
})
