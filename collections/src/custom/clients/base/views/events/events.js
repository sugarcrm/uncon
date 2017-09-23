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
 * Active tasks dashlet takes advantage of the tabbed dashlet abstraction by
 * using its metadata driven capabilities to configure its tabs in order to
 * display information about tasks module.
 *
 * Besides the metadata properties inherited from Tabbed dashlet, Active tasks
 * dashlet also supports other properties:
 *
 * - {Array} overdue_badge field def to support overdue calculation, and showing
 *   an overdue badge when appropriate.
 *
 * @class View.Views.Base.ActiveTasksView
 * @alias SUGAR.App.view.views.BaseActiveTasksView
 * @extends View.Views.Base.TabbedDashletView
 */
({
    extendsFrom: 'TabbedDashletView',

    /**
     * @inheritdoc
     *
     * @property {Object} _defaultSettings
     * @property {Number} _defaultSettings.limit Maximum number of records to
     *   load per request, defaults to '10'.
     * @property {String} _defaultSettings.visibility Records visibility
     *   regarding current user, supported values are 'user' and 'group',
     *   defaults to 'user'.
     */
    _defaultSettings: {
        limit: 10,
        visibility: 'user'
    },

    /**
     * @inheritdoc
     */
    initialize: function(options) {
        options.meta = options.meta || {};
        options.meta.template = 'tabbed-dashlet';

        this.plugins = _.union(this.plugins, [
            'LinkedModel'
        ]);

        this.tbodyTag = 'ul[data-action="pagination-body"]';

        this._super('initialize', [options]);

        this.getNextPagination = _.wrap(this.getNextPagination, _.bind(function(func, options) {
            options = options || {};
            options.offset = this.collection.offset;
            return func.call(this, options);
        }, this));


        console.log();
    },

    /**
     * @inheritdoc
     */
    _initEvents: function() {
        this._super('_initEvents');
        this.on('active-tasks:close-task:fire', this.closeTask, this);
        this.on('linked-model:create', this.loadData, this);
        this.on('render:rows', this._renderAvatars, this);
        return this;
    },

    /**
     * Update the collection's count on the active tab.
     */
    updateCollectionCount: function(tabIndex) {
        if (typeof tabIndex != "number") {
            tabIndex = this.settings.get('activeTab');
        }
        var tab = this.tabs[tabIndex];
        var count = tab.collection.length;
        var hasMore = _.max(tab.collection.next_offset, function(offset, key) {return offset;}) > 0;

        if(hasMore) {
            count += '+';
        }
        this.$('[data-action=tab-switcher][data-index=' + tabIndex + ']')
            .children('[data-action=count]')
            .text(count);

        if (this.layout.getComponent('list-bottom') && tab.collection == this.collection) {
            this.layout.getComponent('list-bottom')._showMoreLabel = "LBL_SHOW_MORE";
            this.layout.getComponent('list-bottom').template = app.template.getView('events.list-bottom');
            this.layout.getComponent('list-bottom').showMore = hasMore;
        }
    },

    updateCollectionCounts: function() {
        _.each(this.tabs, function(tab, index) {{
            this.updateCollectionCount(index);
        }}, this);
    },

    /**
     * Completes the selected task.
     *
     * Shows a confirmation alert and sets the task as `Completed` on confirm.
     *
     * @param {Data.Bean} model The task to be marked as completed.
     */
    closeTask: function(model){
        var self = this;
        var name = Handlebars.Utils.escapeExpression(app.utils.getRecordName(model)).trim();
        var context = app.lang.getModuleName(model.module).toLowerCase() + ' ' + name;
        app.alert.show('complete_task_confirmation:' + model.get('id'), {
            level: 'confirmation',
            messages: app.utils.formatString(app.lang.get('LBL_ACTIVE_TASKS_DASHLET_CONFIRM_CLOSE'), [context]),
            onConfirm: function() {
                model.save({status: 'Completed'}, {
                    showAlerts: true,
                    success: self._getRemoveModelCompleteCallback()
                });
            }
        });
    },

    /**
     * @inheritdoc
     *
     * FIXME: This should be removed when metadata supports date operators to
     * allow one to define relative dates for date filters.
     */
    _initTabs: function() {
        this._super("_initTabs");

        // FIXME: since there's no way to do this metadata driven (at the
        // moment) and for the sake of simplicity only filters with 'date_due'
        // value 'today' are replaced by today's date
        var today = new Date();
        today.setHours(23, 59, 59);
        today.toISOString();

        _.each(_.pluck(_.pluck(this.tabs, 'filters'), 'date_end'), function(filter) {
            _.each(filter, function(value, operator) {
                if (value === 'today') {
                    filter[operator] = today;
                }
            });
        });
    },

    /**
     * Create new record.
     *
     * @param {Event} event Click event.
     * @param {Object} params
     * @param {String} params.layout Layout name.
     * @param {String} params.module Module name.
     */
    createRecord: function(event, params) {
        if (this.module !== 'Home') {
            this.createRelatedRecord(params.module, params.link);
        } else {
            var self = this;
            app.drawer.open({
                layout: 'create',
                context: {
                    create: true,
                    module: params.module
                }
            }, function(context, model) {
                if (!model) {
                    return;
                }
                self.context.resetLoadFlag();
                self.context.set('skipFetch', false);
                if (_.isFunction(self.loadData)) {
                    self.loadData();
                } else {
                    self.context.loadData();
                }
            });
        }

    },

    /**
     * New model related properties are injected into each model.
     * Update the picture url's property for model's assigned user.
     *
     * @param {Bean} model Appended new model.
     */
    bindCollectionAdd: function(model) {
        var pictureUrl = app.api.buildFileURL({
            module: 'Users',
            id: model.get('assigned_user_id'),
            field: 'picture'
        });
        model.set('picture_url', pictureUrl);
        this._super('bindCollectionAdd', [model]);
    },

    /**
     * @inheritdoc
     *
     * New model related properties are injected into each model:
     *
     * - {Boolean} overdue True if record is prior to now.
     */
    _renderHtml: function() {
        var hasMore = _.max(this.collection.next_offset, function(offset, key) {return offset;}) > 0;
        var listBottom = this.layout.getComponent('list-bottom');
        if (listBottom) {
            listBottom._showMoreLabel = "LBL_SHOW_MORE";
            listBottom.template = app.template.getView('events.list-bottom');
            var render = listBottom.showMore != hasMore;
            listBottom.showMore = hasMore;
            if (render) {
                listBottom.render();
            }
        }

        if (this.meta.config) {
            this._super('_renderHtml');
            return;
        }

        var tab = this.tabs[this.settings.get('activeTab')];

        if (tab.overdue_badge) {
            this.overdueBadge = tab.overdue_badge;
        }

        this._super('_renderHtml');

        this._renderAvatars();

        this.updateCollectionCounts();
    },


    _createCollection: function(tab) {
        console.log(tab);
        var collection = app.data.createMixedBeanCollection([], {
            collectionField:'events',
            fields:['id', 'name'],
            filter:[{'$owner':''}]
        });

        collection.fetch({success:_.bind(this.render,this)})


        var options = {};

        return collection;
    },

    showMore: function() {
        debugger;

    },


    showMoreRecords: function() {
        if (!this.paginationComponent) {
            return;
        }

        var options = {};
        options.success = _.bind(function() {
            this.layout.trigger('list:paginate:success');
            // FIXME: This should trigger on `this.collection` instead of
            // `this.context`. Will be fixed as part of SC-2605.
            this.context.trigger('paginate');
            this.render();
        }, this);

        this.paginationComponent.getNextPagination(options);
        this.render();
    },

    getNextPagination: function(options) {
        debugger;
    }
})
