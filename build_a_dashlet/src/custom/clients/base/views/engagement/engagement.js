({
    /**
     * The chart
     */
    chart: {},

    /**
     * The chart data (this is a payload structure expected by the nvd3 library)
     */
    chartData: {},

    /**
     * The raw chart data obtained from our custom API endpoint
     * The raw data will be massaged into the structure expected by nvd3
     */
    chartDataRaw: {},

    /**
     * Register plugins
     */
    plugins: ['Dashlet', 'Chart', 'Tooltip'],

    /**
     * Register event listeners
     */
    events: {
        'click .schedule-meeting-button' : 'scheduleMeeting',
        'click .schedule-call-button' : 'scheduleCall'
    },

    /**
     * @inheritdoc
     */
    initialize: function (options) {
        // call the parent's initialize function
        this._super('initialize', [options]);
        this.setupChart();
    },

    /**
     * Helper to set up the chart with some default config
     */
    setupChart: function() {
        var chart = nv.models.multiBarChart();
        chart.margin({left: 15});
        chart.height = 350;
        chart.width = 150;
        chart.xAxis.axisLabel('Type');
        chart.yAxis.axisLabel('Number').tickFormat(d3.format("d"));

        // assign the value of the newly created chart to the chart property
        this.chart = chart;
    },

    /**
     * Load data into chartData property
     * @param options
     */
    loadData: function (options) {
        // question for attendees: why have I assigned the value of this to self?
        var self = this;

        // create the URL to call to retrieve the data for the dashlet
        var apiUrl = app.api.buildURL('engagement-dashlet/get-engagement-dashlet-data');

        // create the request payload, can you see anything wrong with this approach?
        var requestPayload = {
            "OAuth-Token": app.api.getOAuthToken(),
            "account_id": this.model.get("id"),
            "days": 60
        };

        // make API call
        $.ajax({
            url: apiUrl,
            type: "GET",
            dataType: "json",
            data: requestPayload,
            success: function(response) {
                // assign the response to a property so we can reuse it's value later
                self.chartDataRaw = $.parseJSON(response);

                // check if the response has one of the properties we expected
                if (undefined !== self.chartDataRaw.calls) {
                    // we're assuming we have what we need, any thoughts about this?
                    self.chartData = {
                        data: self.getDataFromApiResponse(self.chartDataRaw),
                        properties: self.getPropertiesFromApiResponse(self.chartDataRaw)
                    };

                    // attempt to redraw the dashlet since we're assuming data has been retrieved
                    self.redraw()
                }
            },
        });
    },

    /**
     * Kill the old chart and then redraw it
     */
    redraw: function() {
        var svg = d3.select(".myamazingengagement-dashlet svg");
        svg.selectAll("*").remove();
        this._render();
        this.renderChart();
    },

    /**
     * Helper functional used here to demonstrate the expected payload structure
     * @returns {{title: string, labels: *[], values: *[]}}
     */
    getDataFromApiResponse: function(apiResponse) {
        // Bar chart properties structure
        return [
            {
                key: "Scheduled",
                series: 0,
                total: apiResponse.calls.scheduled + apiResponse.meetings.scheduled,
                type: "bar",
                color: '#7777ff',
                values: [
                    {
                        active: "",
                        series: 1,
                        x: 1,
                        y: apiResponse.calls.scheduled,
                        y0: apiResponse.calls.scheduled
                    },
                    {
                        active: "",
                        series: 1,
                        x: 2,
                        y: apiResponse.meetings.scheduled,
                        y0: apiResponse.meetings.scheduled
                    }
                ]
            },
            {
                key: "Held",
                series: 1,
                total: apiResponse.calls.held + apiResponse.meetings.held,
                type: "bar",
                color: '#2ca02c',
                values: [
                    {
                        active: "",
                        series: 1,
                        x: 1,
                        y: apiResponse.calls.held,
                        y0: apiResponse.calls.held
                    },
                    {
                        active: "",
                        series: 1,
                        x: 2,
                        y: apiResponse.meetings.held,
                        y0: apiResponse.meetings.held
                    }
                ]
            },
            {
                key: "Canceled",
                series: 2,
                total: apiResponse.calls.canceled + apiResponse.meetings.canceled,
                type: "bar",
                color: '#f30c0c',
                values: [
                    {
                        active: "",
                        series: 2,
                        x: 1,
                        y: apiResponse.calls.canceled,
                        y0: apiResponse.calls.canceled
                    },
                    {
                        active: "",
                        series: 2,
                        x: 2,
                        y: apiResponse.meetings.canceled,
                        y0: apiResponse.meetings.canceled
                    }
                ]
            }
        ];
    },

    /**
     * Helper functional used here to demonstrate the expected payload structure
     * @returns {{title: string, labels: *[], values: *[]}}
     */
    getPropertiesFromApiResponse: function(apiResponse) {
        // Bar chart properties structure
        return {
            title: "Test Bar Chart",
            labels: [
                {
                    group: 1,
                    l: "Calls"
                },
                {
                    group: 2,
                    l: "Meetings"
                }
            ],
            values: [
                {
                    group: 1,
                    t: apiResponse.calls.total
                },
                {
                    group: 2,
                    t: apiResponse.meetings.total
                }
            ]
        }
    },

    /**
     * Implementing the renderChart function as required.
     */
    renderChart: function() {
        var chart = this.chart;
        d3.select('.myamazingengagement-dashlet svg')
            .datum(this.chartData)
            .call(chart);

        // Update the chart when window resizes
        nv.utils.windowResize(function() { chart.update() });
    },

    /**
     * Override the render method to inject additional data
     */
    _render: function() {
        // assign extra values to the model
        this.model.engagement_dashlet_extra_view_data = {};

        if (undefined !== this.chartDataRaw.calls) {
            // use value from the raw API response formatted appropriately on the server side
            this.model.engagement_dashlet_extra_view_data.next_call = this.chartDataRaw.next_call;
            this.model.engagement_dashlet_extra_view_data.next_meeting = this.chartDataRaw.next_meeting;
        } else {
            // sensible default value
            this.model.engagement_dashlet_extra_view_data.next_call = "N/A";
            this.model.engagement_dashlet_extra_view_data.next_meeting = "N/A"
        }

        // call the parent render method
        this._super('_render');
    },

    /**
     * Helper to schedule a meeting
     */
    scheduleMeeting: function() {
        // this isn't great experience, we already have a contextual way to create meetings
        //app.router.record('Meetings', 'create');

        // this way is better, we open a quick create drawer in the account context
        this.openQuickCreate('Meetings');
    },

    /**
     * Helper to schedule a call
     */
    scheduleCall: function() {
        // this isn't great experience, we already have a contextual way to create calls
        //app.router.record('Calls', 'create');

        // this way is better, we open a quick create drawer in the account context
        this.openQuickCreate('Calls');
    },

    /**
     * Helper to open a contextual drawer to create a related record
     * @param theModule
     */
    openQuickCreate: function(theModule) {
        var dashletControllerScope = this;
        app.drawer.open(
            {
                layout: 'create',
                context: {
                    create: true,
                    module: theModule,
                    model: app.data.createBean(theModule)
                }
            },
            function(data) {
                // design consideration: making sure new related records are shown once created
                if (dashletControllerScope.newBeanSaved(data)) {
                    // refresh the page so new related records show in subpanels
                    app.router.refresh();
                }
            }
        );
    },

    /**
     * Helper to determine if a new bean was saved when drawer closed
     * @param data
     * @returns {boolean}
     */
    newBeanSaved: function(data) {
        // data.attributes.model.attributes.id will be set if saved
        if (undefined === data.attributes.model.attributes.id) {
            return false;
        }
        return true;
    }

})
