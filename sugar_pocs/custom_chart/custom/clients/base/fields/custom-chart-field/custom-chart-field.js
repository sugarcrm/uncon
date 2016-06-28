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
 * @class View.Fields.Base.ChartField
 * @alias SUGAR.App.view.fields.BaseChartField
 * @extends View.Fields.Base.BaseField
 */
({
    /**
     * Contains the actual chart being displayed
     */
    chart_loaded: false,
    chart: null,
    chartType: '',

    initialize: function (options) {
        this._super('initialize', [options]);
        this.on("render", this.generateD3Chart, this);
    },

    overflowHandler: function (distance) {
        var b = this.view.$el.parents().filter(function () {
            return $(this).css('overflow-y') === 'auto' || $(this).css('overflow-y') === 'scroll';
        }).first();

        b.scrollTop(b.scrollTop() + distance);
    },

    /**
     * Generate the D3 Chart Object
     */
    generateD3Chart: function () {

        this.view.$el.find("#" + this.def.name).text(app.lang.get(this.def.label, this.module));

        var self = this,
            chart,
            chartId = this.cid,
            chartData = this.loadData(),
            chartParams = {
                allowScroll: true,
                auto_refresh: 0,
                show_legend: true,
                show_title: false,
                show_x_label: false,
                show_y_label: false,
                //skipFetch: true,
                stacked: true,
                staggerTicks: true,
                wrapTicks: true,
                ////x_axis_label: "Date Created",
                ////y_axis_label: "Count"
            },
            chartConfig = this.getChartConfig(chartData),
            params = {
                contentEl: chartId,
                minColumnWidth: 120,
                margin: {top: 0, right: 10, bottom: 10, left: 10},
                allowScroll: true,
                overflowHandler: _.bind(this.overflowHandler, this),
            };
        if (!_.isEmpty(chartParams)) {
            params = _.extend(params, chartParams);
            chartConfig = this.getChartConfig(chartData);
        }
        chartConfig['direction'] = app.lang.direction;

        chart = new loadSugarChart(chartId, chartData, [], chartConfig, params, _.bind(function (chart) {
            self.chart = chart;
            self.chart_loaded = _.isFunction(this.chart.update);
        }, this));
        // This event fires when a preview is closed.
        // We listen to this event to call the chart resize method
        // in case the window was resized while the preview was open.
        app.events.on('preview:close', function () {
            if (_.isUndefined(app.drawer) || app.drawer.isActive(this.$el)) {
                this.resize();
            }
        }, this);
        // This event fires when the dashlet is collapsed or opened.
        // We listen to this event to call the chart resize method
        // in case the window was resized while the dashlet was closed.
        this.view.layout.on('dashlet:collapse', function (collapse) {
            if (!collapse) {
                this.resize();
            }
        }, this);
        // This event fires when the dashlet is dragged and dropped.
        // We listen to this event to call the chart resize method
        // because the size of the dashlet can change in the dashboard.
        this.view.layout.context.on('dashlet:draggable:stop', function () {
            this.resize();
        }, this);
        // Resize chart on window resize.
        // This event also fires when the sidebar is collapsed or opened.
        // We listen to this event to call the chart resize method
        // in case the window was resized while the sidebar was closed.
        $(window).on('resize.' + this.sfId, _.debounce(_.bind(this.resize, this), 100));
        // Resize chart on print.
        this.handlePrinting('on');

        // This on click event is required to dismiss the dropdown legend
        this.$('.nv-chart').on('click', _.bind(function (e) {
            this.chart.dispatch.chartClick();
        }, this));
    },

    /**
     * Builds the chart config based on the type of chart
     * @return {Mixed}
     */
    getChartConfig: function (chartData) {
        var chartConfig;
        switch (chartData.properties[0].type) {
            case 'pie chart':
                chartConfig = {
                    pieType: 'basic',
                    chartType: 'pieChart',
                };
                break;

            case 'line chart':
                chartConfig = {
                    lineType: 'basic',
                    chartType: 'lineChart'
                };
                break;

            case 'funnel chart':
            case 'funnel chart 3D':
                chartConfig = {
                    funnelType: 'basic',
                    chartType: 'funnelChart'
                };
                break;

            case 'gauge chart':
                chartConfig = {
                    gaugeType: 'basic',
                    chartType: 'gaugeChart'
                };
                break;

            case 'stacked group by chart':
                chartConfig = {
                    orientation: 'vertical',
                    barType: 'stacked',
                    chartType: 'barChart'
                };
                break;

            case 'group by chart':
                chartConfig = {
                    orientation: 'vertical',
                    barType: 'grouped',
                    chartType: 'barChart'
                };
                break;

            case 'bar chart':
                chartConfig = {
                    orientation: 'vertical',
                    barType: 'basic',
                    chartType: 'barChart'
                };
                break;

            case 'horizontal group by chart':
                chartConfig = {
                    orientation: 'horizontal',
                    barType: 'stacked',
                    chartType: 'barChart'
                };
                break;

            case 'horizontal bar chart':
            case 'horizontal':
                chartConfig = {
                    orientation: 'horizontal',
                    barType: 'basic',
                    chartType: 'barChart'
                };
                break;

            default:
                chartConfig = {
                    orientation: 'vertical',
                    barType: 'stacked',
                    chartType: 'barChart'
                };
                break;
        }

        this.chartType = chartConfig.chartType;

        return chartConfig;
    },

    /**
     * Checks to see if the chart is available and is displayed before resizing
     */
    resize: function () {
        // If (this.chart_loaded && !this.sidebar_closed && !this.preview_open && !this.dashlet_collapsed) {
        if (!this.chart_loaded) {
            return;
        }
        // This handles the case of preview open and dashlet collapsed.
        // We don't need to handle the case of collapsed sidepane
        // because charts can resize when inside an invisible container.
        // It is being inside a display:none container that causes problems.
        if (!this.view.$el || !this.view.$el.is(':visible')) {
            return;
        }
        this.chart.update();
    },

    /**
     * Attach and detach a resize method to the print event
     * @param {string} The state of print handling.
     */
    handlePrinting: function (state) {
        var self = this,
            mediaQueryList = window.matchMedia && window.matchMedia('print'),
            pausecomp = function (millis) {
                // www.sean.co.uk
                var date = new Date(),
                    curDate = null;
                do {
                    curDate = new Date();
                } while (curDate - date < millis);
            },
            printResize = function (mql) {
                if (mql.matches) {
                    if (!_.isUndefined(self.chart.legend) && _.isFunction(self.chart.legend.showAll)) {
                        self.chart.legend.showAll(true);
                    }
                    self.chart.width(640).height(320).update();
                    pausecomp(200);
                } else {
                    browserResize();
                }
            },
            browserResize = function () {
                if (!_.isUndefined(self.chart.legend) && _.isFunction(self.chart.legend.showAll)) {
                    self.chart.legend.showAll(false);
                }
                self.chart.width(null).height(null).update();
            };

        if (state === 'on') {
            if (window.matchMedia) {
                mediaQueryList.addListener(printResize);
            } else if (window.attachEvent) {
                window.attachEvent('onbeforeprint', printResize);
                window.attachEvent('onafterprint', browserResize);
            } else {
                window.onbeforeprint = printResize;
                window.onafterprint = browserResize;
            }
        } else {
            if (window.matchMedia) {
                mediaQueryList.removeListener(printResize);
            } else if (window.detachEvent) {
                window.detachEvent('onbeforeprint', printResize);
                window.detachEvent('onafterprint', browserResize);
            } else {
                window.onbeforeprint = null;
                window.onafterprint = null;
            }
        }
    },

    /**
     * Toggle display of dashlet content and NoData message
     * @param {boolean} state The visibility state of the dashlet content.
     */
    displayNoData: function (state) {
        this.$('[data-content="chart"]').toggleClass('hide', state);
        this.$('[data-content="nodata"]').toggleClass('hide', !state);
    },

    /**
     * @inheritdoc
     */
    _dispose: function () {
        if (this.view && this.view.layout) {
            this.view.layout.off(null, null, this);
        }
        if (this.view && this.view.layout) {
            this.view.layout.context.off(null, null, this);
        }
        this.$('.nv-chart').off('click');
        $(window).off('resize.' + this.sfId);
        this.handlePrinting('off');

        app.view.Field.prototype._dispose.call(this);
    },

    loadData: function () {
        var values = [];
        var values_array = this.model.get("inputFieldsArray");
        if(this.model.get('chart_type') === 'horizontal group by chart' || this.model.get('chart_type') === 'group by chart') {
            var labels = [];
            for (var i = 0; i < values_array.length; i++)
            {
                for(var j = 0; j < values_array[i].label_value.length; j++)
                {
                    labels.push(values_array[i].label_value[j].label)
                }
            }
            for (var i = 0; i < values_array.length; i++) {
                var valueLabels = [];
                var valueArray = [];

                for(var j = 0; j < labels.length; j++) {
                    valueArray[j] = 0;
                    valueLabels[j] = "";
                }
                for(var j = 0; j < values_array[i].label_value.length; j++) {
                    var position = labels.indexOf(values_array[i].label_value[j].label);
                    if(position > -1) {
                        valueArray[position] = Number(values_array[i].label_value[j].value);
                        valueLabels[position] = "" + values_array[i].label_value[j].value;
                    }
                }

                values.push({
                    "label": values_array[i].name,
                    "values": valueArray,
                    "valueLabels": valueLabels,
                    "links": [],
                });
            }

            return {
                "properties": [
                    {
                        "type": this.model.get('chart_type'),
                        "legend": "on",
                    }
                ],
                "label":labels,
                "color":[
                    "#8c2b2b",
                    "#468c2b",
                    "#2b5d8c",
                    "#cd5200",
                    "#e6bf00",
                    "#7f3acd",
                    "#00a9b8",
                    "#572323",
                    "#004d00",
                    "#000087",
                    "#e48d30",
                    "#9fba09",
                    "#560066",
                    "#009f92",
                    "#b36262",
                    "#38795c",
                    "#3D3D99",
                    "#99623d",
                    "#998a3d",
                    "#994e78",
                    "#3d6899",
                    "#CC0000",
                    "#00CC00",
                    "#0000CC",
                    "#cc5200",
                    "#ccaa00",
                    "#6600cc",
                    "#005fcc"
                ],
                "values": values
            }
        } else {
            for (var i = 0; i < values_array.length; i++) {
                for (var j = 0; j < values_array[i].label_value.length; j++)
                {
                    values.push({
                        "label": [values_array[i].label_value[j].label],
                        "values": [values_array[i].label_value[j].value],
                        "valuelabels": [values_array[i].label_value[j].value + '%'],
                        "links": []
                    });
                }
            }
            return {
                "properties": [
                    {
                        "type": this.model.get('chart_type'),
                        "legend": "on",
                    }
                ],
                "label": [],
                "color": [
                    "#8c2b2b",
                    "#468c2b",
                    "#2b5d8c",
                    "#cd5200",
                    "#e6bf00",
                    "#7f3acd",
                    "#00a9b8",
                    "#572323",
                    "#004d00",
                    "#000087",
                    "#e48d30",
                    "#9fba09",
                    "#560066",
                    "#009f92",
                    "#b36262",
                    "#38795c",
                    "#3D3D99",
                    "#99623d",
                    "#998a3d",
                    "#994e78",
                    "#3d6899",
                    "#CC0000",
                    "#00CC00",
                    "#0000CC",
                    "#cc5200",
                    "#ccaa00",
                    "#6600cc",
                    "#005fcc"
                ],
                "values": values,
            };
        }
    },
})

