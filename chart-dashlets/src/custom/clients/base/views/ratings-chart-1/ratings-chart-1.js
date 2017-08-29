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
 * @class View.Views.Base.RatingsChart1View
 * @alias SUGAR.App.view.views.BaseRatingsChart1View
 * @extends View.View
 */
({
    plugins: ['Dashlet', 'Chart'],
    className: 'ratings-chart-wrapper-1',

    /**
     * @inheritdoc
     */
    initialize: function(options) {
        this._super('initialize', [options]);

        this.chartData = [];

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
    },

    /* Process data loaded from REST endpoint so that d3 chart can consume
     * and set general chart properties
     */
    evaluateResult: function(serverData) {
        var gradeList = app.lang.getAppListStrings('grading_list');
        var records = serverData && serverData.records ? serverData.records : [];

        var gradeData = [];
        var total = 0;

        var colorScale = d3.interpolateRgb(d3.rgb('#0f0'), d3.rgb('#f00'));
        var colorRange = d3.scale.linear()
            .domain([0, 0.5, 1])
            .range([d3.rgb('#0f0'), d3.rgb('#00f'), d3.rgb('#f00')]);
        var colorIndex = 0;

        _.each(gradeList, function(grade, key, values) {
            gradeList[key] = {
                index: colorIndex,
                value: 0,
                key: values[key]
            };
            colorIndex += 1;
        });
        colorIndex -= 1;

        _.each(records, function(record) {
            gradeList[record.ratesg_c].value += 1;
            total += 1;
        });

        _.each(gradeList, function(grade) {
            grade.color = colorRange(grade.index/colorIndex);
            gradeData.push(grade);
        });

        this.total = total;

        this.chartData = {
            data: gradeData,
            properties: {
                title: app.lang.get('LBL_DASHLET_GRADES_CHART_NAME'),
                label: total
            }
        };

        this.renderChart();
    },

    /**
     * @inheritdoc
     */
    loadData: function(options) {
        var url = app.api.buildURL('Accounts', 'filter');
        var filter_args = {
            'fields': 'id,status_c,ratesg_c',
            'order_by': 'ratesg_c',
            'max_num': 10
        };
        var options = {
            success: _.bind(function(serverData) {
                this.evaluateResult(serverData);
            }, this),
            complete: options ? options.complete : null
        };
        app.api.call('create', url, filter_args, options, {context: this});
    }
})
