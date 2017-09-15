const app = SUGAR.App;
const customization = require('%app.core%/customization');
const NomadView = require('%app.views%/nomad-view');

// Extend custom from view from the base view
let MeetingsMapView = customization.extend(NomadView, {
    // Specify view template
    template: 'meetings-map',
    
    // Provide header configuration
    headerConfig: {
        title: app.lang.get('Meetings Locations'),
        buttons: {
            cancel: { label: app.lang.get('Close') },
        }
    },
    
    // Called after view gets rendered
    onAfterRender() {
        this._super();
        
        let div = document.getElementById('map_canvas');
        
        // Initialize the map view
        let map = plugin.google.maps.Map.getMap(div);
        map.setPadding(30);
        map.setOptions({
            zoom: true,
        });
        
        map.addEventListener(plugin.google.maps.event.MAP_READY, () => this.__onMapReady());
        
        this.__map = map;
    },

    // Override to perform custom clean-up
    _dispose() {
        // Always call super
        this._super();
        
        this.__map.remove();
        this.__map = null;
    },
    
    // ---------------------------------
    // Custom instance methods
    // ---------------------------------
    
    __getMeetings() {
        // options.data property keeps whatever we passed when we loaded this view
        // (see map action down below) 
        return this.options.data || [];
    },
    
    __onMapReady() {
        let meetings = this.__getMeetings();
        app.logger.debug(meetings);
        
        let points = meetings.map(meeting => new plugin.google.maps.LatLng(meeting.lat, meeting.lng));
        
        // Zoom in the map into the region which contains all meetings locations
        this.__map.moveCamera({
            target: points,
        }, () =>  this.__addMeetingMarkers());
    },
    
    __addMeetingMarkers() {
        // Add a map marker for each meeting location
        this.__getMeetings().forEach((meeting) => {
            this.__map.addMarker({
                position: { lat: meeting.lat, lng: meeting.lng },
                title: meeting.title,
                snippet: `Checked in on ${meeting.timestamp.toLocaleDateString()} at ${meeting.timestamp.toLocaleTimeString()}`,
                animation: plugin.google.maps.Animation.BOUNCE,
                infoClick: () => {
                    // Navigate to Meetings detail view when the marker's info window is tapped
                    app.controller.navigate(`#Meetings/${meeting.id}`);
                }
            });
            
        });
    },
    
});

// Register custom action
customization.registerRecordAction({
    name: 'map-meetings',           // Uniquely identifies the action
    types: ['right-menu-list'],     // Render the action in the right menu of list views
    modules: ['Meetings'],          // Render the action for Meetings module only
    label: app.lang.get('Map'),     // Displayable label                   
    iconKey: 'actions.map',         // Icon key referenced in SDK app.json configuration file
    rank: 0,

    stateHandlers: {
        isVisible() {   // Show the button on device only
            return app.isNative;
        },
    },

    // Called when the action is selected from the menu
    handler(view) {
        // Pick all meetings with check-in information and build an array of location objects
        let meetings = view.collection.models
            .filter(m => !_.isEmpty(m.get('check_in_time_c')))
            .map(m => {
                return {
                    id: m.get('id'),
                    title: m.get('name'),
                    timestamp: new Date(m.get('check_in_time_c')), 
                    lat: m.get('check_in_latitude_c'),
                    lng: m.get('check_in_longitude_c'),
                };
        });
        
        // Load the custom view dynamically, i.e. without a route
        app.controller.loadScreen({
            isDynamic: true,
            view: MeetingsMapView,
            // Pass meeting locations
            data: meetings, 
        });
        
    },
    
});

module.exports = MeetingsMapView;

