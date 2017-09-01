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
 * @class View.Views.Base.RatingsChart4View
 * @alias SUGAR.App.view.views.BaseRatingsChart4View
 * @extends View.View
 */
({
    plugins: ['Dashlet', 'Chart'],
    className: 'ratings-chart-wrapper-4',

    events: {
        'click [data-status]': 'changeStatus',
        'keyup [data-status]': 'changeStatus'
    },

    /**
     * @inheritdoc
     */
    initialize: function(options) {
        this._super('initialize', [options]);

        this.chartData = [];
        this.statusWidth = '25%';

        this.chart = nv.models.pieChart()
                .margin({top: 0, right: 0, bottom: 0, left: 0})
                .donut(true)
                .donutLabelsOutside(true)
                .donutRatio(0.447)
                .rotateDegrees(0)
                .arcDegrees(360)
                .maxRadius(120)
                .showTitle(false)
                .tooltips(true)
                .holeFormat(_.bind(function(wrap, data) {
                    var wrapEnter = wrap.selectAll('text').data([null]).enter().append('g')
                        .attr('transform', 'translate(0,5)');
                    wrapEnter.append('text')
                        .text(this.chart.hole())
                        .attr('class', 'nv-pie-hole-value')
                        .attr('style', 'font-size: 3em');
                    wrapEnter.append('text')
                        .text(this.statusState)
                        .attr('class', 'nv-pie-hole-label')
                        .attr('dy', '1.5em')
                        .attr('style', 'font-size: 1em');
                }, this))
                .showLegend(true)
                .colorData('data')
                .direction(app.lang.direction)
                .tooltipContent(function(key, x, y, e, graph) {
                    return '<p><b>Grade: ' + key + '</b><br>Count: ' + parseInt(y, 10) + '</b></p>';
                })
                .strings({
                    noData: app.lang.get('LBL_CHART_NO_DATA')
                });
    },

    /**
     * @inheritdoc
     */
    initDashlet: function() {
        this._super('initDashlet');
        if (this.meta.config) {
            return;
        }
        var status = this.settings.get('status');
        var reportId = this.settings.get('report_id');
        this.statusState = _.isEmpty(status) ? 'Active' : status;
        this.reportId = _.isEmpty(reportId) ? '' : reportId;
    },

    /**
     * @inheritdoc
     */
    bindDataChange: function() {
        if (!this.meta.config) {
            return;
        }
        this.settings.on('change:status', function(model) {
            var status = this.model.get('status');
            this.statusState = _.isEmpty(status) ? 'Active' : status;
        }, this);
        this.settings.on('change:report_id', function(model) {
            var reportId = this.model.get('report_id');
            this.reportId = _.isEmpty(reportId) ? '' : reportId;
        }, this);
    },

    /**
     * Event handler for toggling the active data series for the pie chart
     *
     * @inheritdoc
     */
    changeStatus: function(evt) {
        var state = $(evt.currentTarget).data('status');
        if (state && (evt.type === 'click' || evt.keyCode === 13 || evt.keyCode === 32)) {
            d3.select(this.el)
                .select('svg#' + this.cid + ' .nv-pie-hole-label')
                .text('Loading...');
            this.statusState = state;
            this.loadData();
        }
    },

    /**
     * Generate an average for each status in the chart data
     */
    rollupStatusAverages: function(chartData, gradeScale) {
        var rollup = {};

        chartData.values.map(function(value) {
            var count = d3.sum(value.values);
            var average = Math.round(d3.sum(value.values, function(v, i) {
                    var key = chartData.label[i]; // A-
                    var gradeIndex = gradeScale[key].index; // 2
                    return v * gradeIndex / count;
                }));
            var grade = _.find(gradeScale, function(grade) {
                    return grade.index === average;
                });
            var status = {
                key: value.label,
                count: count,
                grade: grade.key,
                color: grade.color
            };

            rollup[value.label] = status;
        });

        return rollup;
    },

    /**
     * Create a collection from each status in account status list dom
     */
    buildStatusCollection: function(chartData, gradeScale) {
        var statusList = app.lang.getAppListStrings('account_status_list');
        var statusCollection = [];
        var rollup = this.rollupStatusAverages(chartData, gradeScale);
        var total = d3.sum(rollup, function(d) { return d.value; });

        // build the status collection from status list
        // with values from the chart data rollup
        _.each(statusList, _.bind(function(status, key) {
            var r = rollup[key];
            var s = {
                key: key,
                label: status,
                count: r ? r.count : 0,
                grade: r ? r.grade : '',
                color: r ? r.color : 'white',
                active: key === this.statusState ? true : false
            };

            statusCollection.push(s);
        }, this));

        this.statusCollection = statusCollection;
        this.statusWidth = 100 / statusCollection.length + '%';

        this._renderHtml();
    },

    /**
     * @inheritdoc
     */
    loadData: function(options) {
        if (this.meta.config || _.isEmpty(this.reportId)) {
            return;
        }
        var url = app.api.buildURL('Reports/chart/' + this.reportId);
        var api_args = {
            'ignore_datacheck': true
        };
        var options = {
            success: _.bind(function(serverData) {
                this.evaluateResult(serverData);
            }, this),
            complete: options ? options.complete : null
        };
        app.api.call('create', url, api_args, options, {context: this});
    },

    /* Process data loaded from REST endpoint so that d3 chart can consume
     * and set general chart properties
     */
    evaluateResult: function(serverData) {
        var gradeList = app.lang.getAppListStrings('grading_list');
        var chartData = serverData && serverData.chartData ? serverData.chartData : [];

        var gradeData = [];
        var total = 0;
        var reportStatusValues = [];
        var gradeScale = {};

        var gradeSize = _.size(gradeList) - 1;
        var colorRange = d3.scale.linear()
            .domain([0, gradeSize / 2, gradeSize])
            .range([d3.rgb('#0f0'), d3.rgb('#00f'), d3.rgb('#f00')]);
        var colorIndex = 0;

        _.each(gradeList, function(grade, key, values) {
            gradeScale[grade] = {
                index: colorIndex,
                value: 0,
                key: grade,
                color: colorRange(colorIndex)
            };
            colorIndex += 1;
        });

        if (chartData.values && chartData.values.length) {

            reportStatusValues = chartData.values
                .filter(_.bind(function(value) {
                    return value.label === this.statusState;
                }, this));

            if (reportStatusValues.length) {

                reportStatusValues[0].values
                    .forEach(function(value, i) {
                        var key = chartData.label[i];
                        gradeScale[key].value += value;
                        total += value;
                    });

                _.each(gradeScale, function(grade) {
                    gradeData.push(grade);
                });
            }

            this.buildStatusCollection(chartData, gradeScale);
        }

        this.total = d3.sum(gradeData, function(g) { return g.value; });

        this.chartData = {
            data: gradeData,
            properties: {
                title: app.lang.get('LBL_DASHLET_GRADES_CHART_NAME'),
                total: total
            }
        };

        this.renderChart();
    },

    /**
     * Generic method to render chart with check for visibility and data.
     */
    renderChart: function() {
        if (!this.isChartReady()) {
            return;
        }

        // Set value of label inside donut chart
        this.chart.hole(this.total);

        d3.select(this.el).select('svg#' + this.cid)
            .datum(this.chartData)
            .call(this.chart);

        this.chart_loaded = _.isFunction(this.chart.update);
        this.displayNoData(!this.chart_loaded);
    }
})
