/**
 * @class View.Views.Base.Contacts.YearbookView
 * @alias SUGAR.App.view.views.BaseContactsYearbookView
 */
({
    /**
     * The state of the panel.
     * @type {Boolean}
     */
    _hidden: true,

    events: {
        'click button[data-action=close]': '_hidePanel'
    },

    /**
     * @inheritdoc
     */
    initialize: function(options) {
        this._super('initialize', [options]);
        this.context.on('button:yearbook_button:click', this.toggle, this);
    },

    /**
     * Toggles the panel.
     * @param {Data.Bean} model The model of which we want to show the yearbook.
     */
    toggle: function(model) {
        if (this._hidden) {
            this._showPanel();
        } else {
            this._hidePanel();
        }
    },

    /**
     * Shows the panel.
     */
    _showPanel: function() {
        var defaultLayout = this.closestComponent('sidebar');
        defaultLayout.$el.find('.dashboard-pane').hide();
        defaultLayout.$el.find('.preview-pane').removeClass('active');
        defaultLayout.$el.find('.yearbook-pane').show();

        if (defaultLayout) {
            defaultLayout.trigger('sidebar:toggle', true);
        }

        this._hidden = false;

        var tag = this.model.get('tag') && this.model.get('tag')[0];
        var notes = app.data.createBeanCollection('Notes');
        var self = this;
        if (this.imgUrl || !tag) {
            return;
        }

        notes.fetch(
            {
                fields: [
                    'file_mime_type', 'file_ext','filename'
                ],
                params:
                    {
                        filter:[{'tag': {'$in': [tag.name]}}]
                },
                success: function(collection) {
                    var id = collection.at(0) ? collection.at(0).get('id') : void 0;
                    self.imgUrl = app.api.buildFileURL({module:'Notes', id: id, field: 'filename'});
                    self.render();
                }
            }
        );
    },

    /**
     * Hides the panel.
     */
    _hidePanel: function() {
        var defaultLayout = this.closestComponent('sidebar');
        defaultLayout.$el.find('.yearbook-pane').hide();
        defaultLayout.$el.find('.dashboard-pane').show();
        defaultLayout.$el.find('.preview-pane').removeClass('active');

        this._hidden = true;
    }
})

