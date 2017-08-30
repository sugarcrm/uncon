const app = SUGAR.App;
const customization = require('%app.core%/customization');
const dialog = require('%app.core%/dialog');
const geolocation = require('%app.core%/geolocation');

// Register custom Check-In action
customization.registerRecordAction({
    
    name: 'checkin',                 // Uniquely identifies the action
    types: ['toolbar'],              // Render action on the toolbar of record detail view
    modules: ['Meetings'],           // Render action for Meetings module only
    label: app.lang.get('Check-In'), // Displayable label. 
    iconKey: 'actions.location',     // Action icon key referenced in SDK's config_template/app.json or custom/app.json
    rank: 0,                         // Action position priority
    
    stateHandlers: {
        isVisible(view, model) {
            // Do not display the action if already checked in
            return _.isEmpty(model.get('check_in_time_c'));
        },
    },
    
    // Called when a user clicks the action button
    handler(view, model) {
        
        // Inform user about an operation in progress
        app.alert.show('check_in', {
            level: 'info',
            messages: 'Checking in...',
            autoClose: false,
            closeable: false,
        });
        
        let updateModel = (address) => {
            model.save({
                check_in_address_c: address,
            }, {
                // Pass a list of fields to be sent to the server
                fields: [
                    'check_in_latitude_c',
                    'check_in_longitude_c',
                    'check_in_time_c',
                    'check_in_address_c',
                ],
                complete: () => {
                    // Close the alert when save operation completes
                    app.alert.dismiss('check_in');
                }
            });
            
        };
        
        // Called when reverse geocoding completes
        let placemarksObtained = placemarks => {
            let address = placemarks[0];
            address = (address.formattedAddressLines || []).join(' ').trim();
            app.logger.debug(`Placemark: ${address}`);
            updateModel(address);
        };

        // Called when the current location is obtained
        let locationObtained = position => {
            app.logger.debug(`Latitude: ${position.coords.latitude}, longitude: ${position.coords.longitude}`);
            
            model.set({
                check_in_time_c: (new Date()).toISOString(),
                check_in_latitude_c:  position.coords.latitude,
                check_in_longitude_c: position.coords.longitude,
            }, { silent: true });
            
            // Perform reverse geocoding: get physical address from coordinates
            geolocation.getGeoPlacemarks({
                latitude: position.coords.latitude,
                longitude: position.coords.longitude,
            }, {
                successCb: placemarksObtained,
                errorCb: (errCode, errMessage) => {
                    app.logger.debug(`Placemark info is not available: ${errCode} - ${errMessage}`);
                    updateModel();
                },
            });
            
        };

        geolocation.getCurrentPosition({
            enableHighAccuracy: true,
            successCb: locationObtained,
            errorCb: (errCode, errMessage) => {
                app.logger.debug(`Location is not available: ${errCode} - ${errMessage}`);
                app.alert.dismiss('check_in');
                dialog.showAlert(errMessage);
            },
        });
    },
    
});

