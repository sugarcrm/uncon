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

({
    //extendsFrom: 'TabbedDashletView',
    plugins: ['Dashlet', 'ToggleVisibility'],
    events: {
        'click [data-action=tab-switcher]': 'tabSwitcher'
    },
    requestFields: [
        "name",
        "lat_long_c",
        "primary_address_street",
        "primary_address_city",
        "primary_address_state",
        "primary_address_postalcode",
        "primary_address_country",
        "billing_address_street",
        "billing_address_city",
        "billing_address_state",
        "billing_address_postalcode",
        "billing_address_country"
    ],
    displayColumns: [
        {
            'name': 'name',
            'label': 'LBL_NAME'
        },
        {
            'name': '_distance',
            'label': 'Distance'
        }
    ],
    tabs: [
        {
            "label": "List"
        },
        {
            "label": "Map"
        }
    ],
    addressFields : {
        'Contacts' : [
            "primary_address_street",
            "primary_address_city",
            "primary_address_state",
            "primary_address_postalcode",
            "primary_address_country"
        ],
        'Accounts' : [
            "billing_address_street",
            "billing_address_city",
            "billing_address_state",
            "billing_address_postalcode",
            "billing_address_country"
        ]
    }
    ,
    data : false,

    initialize: function(options) {
        this._super('initialize', arguments);
        this.getLocation(true);
        this.popupTemplate = app.template.getView('geo-dashlet.popup');
    },

    initDashlet: function() {
        if (this.meta.config) {
            var limit = this.settings.get("limit") || "5";
            this.settings.set("limit", limit);
        }
    },

    loadData: function(options) {
        var self = this;
        console.log("loading data for geo search");
        if (this.location) {
            this.loading = true;
            var latLong = this.location.coords.latitude + "," + this.location.coords.longitude,
                module = this.module == "Home" ? "" : this.module,
                url = app.api.buildURL(module, 'near/' + latLong, null, {
                    lat_long: true,
                    fields : this.requestFields
                });
            app.api.call('read', url, null, {
                success: function(result) {
                    self.data = result;
                    _.each(self.data, function(item) {
                        item.distance = app.utils.formatNumberLocale(item._distance) + item._distance_unit;
                        if (_.isEmpty(item.name)) {
                            item.name = app.utils.formatNameLocale(item);
                        }
                    });
                    self.render();
                    console.log(result);
                    self.loading = false;
                }
            });
        } else if (!this.loading) {
            this.getLocation();
        }
    },

    _render: function() {
        var self = this;
        if (!this.settings.get('activeTab')) {
            this.settings.set('activeTab', 0);
        }
        L = typeof L == "undefined" ? null : L;
        if (L && this.map) {
            this.map.remove();
            this.map = false;
        }
        this._super('_render', arguments);
        var ll = this.getLatLong();
        if (L && ll && this.settings.get('activeTab') == 1 && this.$(".lmap").length > 0) {
            var mapEl = this.$(".lmap"),
                map = this.map = L.map(mapEl[0], {
                    center: [ll.lat, ll.long],
                    zoom: 11
                });
            mapEl.height("300px");
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            _.each(this.data, function(item) {
                var itemLL = _.map(item.lat_long_c.split(","), $.trim);
                L.marker([itemLL[0], itemLL[1]]).addTo(map)
                    .bindPopup(self.getPopup(item));
            });
        }
    },

    getLocation: function(force) {
        var self = this;
        if (!this.location || force) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(loc) {
                    self.location = loc;
                    self.loadData({});
                })
            }
        }
    },
    getLatLong: function() {
        if (this.location) {
            return {
                lat: this.location.coords.latitude,
                long: this.location.coords.longitude
            }
        }
    },

    getPopup: function(item) {
        item.addressFields = [];
        _.each(this.addressFields[item._module], function(field){
            if (!_.isEmpty(item[field])) {
                item.addressFields.push(item[field]);
            }
        })
        this.result = item;
        return this.popupTemplate(this);
    },

    tabSwitcher: function(event) {
        var index = this.$(event.currentTarget).data('index');
        if (index === this.settings.get('activeTab')) {
            return;
        }

        this.settings.set('activeTab', index);
        this.render();
    }

})
