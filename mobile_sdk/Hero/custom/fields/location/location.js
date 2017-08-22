const app = SUGAR.App;
const customization = require('%app.core%/customization.js');
const device = require('%app.core%/device');
const TextField = require('%app.fields%/text-field');

// Extend custom location field the base text field
let LocationField = customization.extend(TextField, {
    
    events: {
        click: '__onTap',
    },
    
    initialize(options) {
        this._super(options);
        // Re-render the field view when check-in time changes
        this.listenTo(this.model, 'change:check_in_time_c', this.render);
    },

    // Override to implement custom formatting of the field value
    format() {
        // Display location address if it's available, otherwise N/A
        let address = (this.model.get('check_in_address_c') || '').trim();
        address = _.isEmpty(address) ? 'N/A' : address;
        
        // Store address value on the field instance to access it in HBS template
        this.__address = address;
        
        return !_.isEmpty(this.model.get('check_in_time_c')) ? address : null;
    },
    
    // ---------------------------------
    // Custom instance methods
    // ---------------------------------
    
    
    __onTap(e) {
        e.stopPropagation();
        e.preventDefault();

        // Opens up the location in an external map application
        device.openAddress({
            location: {
                latitude: this.model.get('check_in_latitude_c'),
                longitude: this.model.get('check_in_longitude_c'),
            }
        });
    },
    
});

// Register location field class as location-type field
customization.register(LocationField, { metadataType: 'location' });

module.exports = LocationField;
