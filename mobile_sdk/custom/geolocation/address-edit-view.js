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
var app = SUGAR.App;
var customization = require('%app.core%/customization.js');
var geolocation = require('%app.core%/geolocation.es6');
var dialog = require('%app.core%/dialog.es6');
var AddressEditView = require('%app.views%/edit/address-edit-view');

// Declare a custom address edit view
module.exports = customization.registerView({
    type: 'addressEdit',
    parent: AddressEditView,
}, {

    // Standard Backbone events object
    events: {
        'click #location_btn': 'onLocationClick',
    },

    // Invoked when a user clicks location button
    onLocationClick: function() {
        var self = this;

        // Error handler for geolocation errors
        var onError = function(errCode, errMessage) {
            // Displays a native model dialog
            dialog.showAlert(errMessage);
        };

        // Process addresses decoded from GPS cooordinates
        var onPlacemarkDecoded = function(placemarks) {
            if (placemarks.length > 0) {
                var placemark = placemarks[0];

                // Update model with address infromation
                self._updateModel({
                    street: (_.isEmpty(placemark.subThoroughfare) ? '' : placemark.subThoroughfare + ' ') + (placemark.thoroughfare || ''),
                    city: placemark.locality || '',
                    state: placemark.adminArea || '',
                    country: placemark.countryCode || placemark.country || '',
                    postalcode: placemark.postalCode || '',
                });
            }
        };

        // Get location coordinates
        geolocation.getCurrentPosition({
            enableHighAccuracy: true,
            errorCb: onError,
            successCb: function(position) {
                // Perform reverse geocoding
                geolocation.getGeoPlacemarks({
                    latitude: position.coords.latitude,
                    longitude: position.coords.longitude,
                }, {
                    errorCb: onError,
                    successCb: onPlacemarkDecoded,
                });
            }
        });
    },

    // Helper method to set address properties into the model
    _updateModel: function(address) {
        _.each(address, function(value, key) {
            var field = _.find(this.addressFieldsNames, function(item) {
                return item.match(new RegExp(key, 'i'));
            });
    
            if (field) {
                this.model.set(field, value);
            }
            
        }, this);
        
    },

});
