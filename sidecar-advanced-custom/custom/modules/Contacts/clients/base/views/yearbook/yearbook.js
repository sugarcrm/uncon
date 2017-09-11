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
