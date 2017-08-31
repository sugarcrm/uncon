const app = SUGAR.App;
const customization = require('%app.core%/customization');
const NomadView = require('%app.views%/nomad-view');
const DetailView = require('%app.views.detail%/detail-view');
const Context = require('core/context');
const Promise = require('%vendor%/bluebird');
const headerHandler = require('%app.core%/header-handler');

// Extend custom from view from the base view
let MeetingsMapView = customization.extend(NomadView, {
    // Specify view template
    template: 'meetings-map',

    // Provide header configuration
    headerConfig: {
        title: app.lang.get('Meetings Locations'),
        buttons: {
            back: true,
        },
    },

    // Called after view gets rendered
    onAfterRender() {
        // Always call super
        this._super();

        this.__initMap();
    },

    // Override to perform custom clean-up
    _dispose() {
        // Always call super
        this._super();

        this.__clearMap();
    },

    // ---------------------------------
    // Custom instance methods
    // ---------------------------------

    __getMeetings() {
        // options.data property keeps whatever we passed when we loaded this view
        // (see map action down below)
        return this.options.data.meetings;
    },

    __initMap() {
        // google maps plugin is singleton, need to clear previous instance before initializing a new one.
        return this.__clearMap().then(() => {
            let div = _.first(this.$('#map_canvas'));

            // Initialize the map view
            let map = plugin.google.maps.Map.getMap(div);
            map.setPadding(30);
            map.setOptions({
                zoom: true,
            });

            map.one(plugin.google.maps.event.MAP_READY, () => this.__onMapReady());

            this.__map = map;
        });
    },

    __clearMap() {
        this.__map = null;

        return new Promise((resolve) => {
            let map = plugin.google.maps.Map.getMap();
            map.one(plugin.google.maps.event.MAP_READY, () => map.remove(resolve));
        });
    },

    __onMapReady() {
        let meetings = this.__getMeetings();
        let meetingId = this.options.data.meetingId;
        let points;

        if (meetingId) {
            let meeting = _.findWhere(meetings, { id : meetingId });
            points = [new plugin.google.maps.LatLng(meeting.lat, meeting.lng)];
        } else {
            points = meetings.map(meeting => new plugin.google.maps.LatLng(meeting.lat, meeting.lng));
        }

        app.logger.debug(meetings);

        // Zoom in the map into the region which contains all meetings locations
        this.__map.moveCamera(
            { target: points },
            () =>  this.__addMeetingMarkers({ meetingId })
        );
    },

    __addMeetingMarkers({ meetingId } = {}) {
        // Add a map marker for each meeting location and select clicked meeting
        this.__getMeetings().forEach((meeting) => {
            let isMeetingSelected = meeting.id === meetingId;

            this.__map.addMarker({
                position: { lat: meeting.lat, lng: meeting.lng },
                title: meeting.title,
                snippet: `Checked in on ${meeting.timestamp.toLocaleDateString()} at ${meeting.timestamp.toLocaleTimeString()}`,
                animation: plugin.google.maps.Animation.BOUNCE,
                infoClick: () => {
                    // Navigate to Meetings detail view when the marker's info window is tapped
                    app.controller.navigate({
                        url: `#meetings-map/${meeting.id}`,
                        data: {
                            meetings: this.__getMeetings(),
                            meetingId: meeting.id,
                        },
                    });
                }
            }, (marker) => {
                if (isMeetingSelected) {
                    marker.showInfoWindow();
                }
            });
        });
    },

});

customization.registerRoutes([{
    name: 'meetings-map',
    steps: [{
        name: 'meetings-map',   // handles url "#meetings-map". Shows google map on primary screen.
        url: 'meetings-map',
    }, {
        name: 'meetings-detail',// handles url "meetings-map/123". Shows record detail view primary screen (on the right) and google maps on secondary screen (onthe left)
        url: '(/:meetingId)',
    }],

    getScreenOptions(meetingId) {
        return { meetingId };   // converts url params to screen options object. Eg: "#meetings-map/123" => { meetingId: 123 }
    },

    handler({ meetingId, data } = {}) {
        if (!data) {
            app.controller.navigate('Meetings');    // sample relies that meetings list is passed from list view. If not - navigates user to Meeting list.
            return;
        }

        let module = 'Meetings';
        let screenCfg;

        if (meetingId) {    // if meetingId is provided then show google map view on the left (secondary) and meeting detail view on the right (primary).
            let ctx = new Context({
                module,
                modelId: meetingId,
            }).prepare();

            screenCfg = {
                primary: {
                    view: DetailView,
                    initOptions: {
                        context: ctx,
                    },
                    headerConfig: headerHandler.get({
                        baseType: 'detail',
                        module,
                    }),
                },
                secondary: {
                    view: MeetingsMapView,
                    data,
                },
            }
        } else {    // no meetingId - show google map as primary screen.
            screenCfg = {
                view: MeetingsMapView,
                data,
            };
        }

        app.controller.loadScreen(screenCfg);
    }
}]);

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

        app.controller.navigate({
            url: 'meetings-map',
            data: { meetings },
        });
    },

});

module.exports = MeetingsMapView;
