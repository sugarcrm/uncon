const app = SUGAR.App;
const customization = require('%app.core%/customization');
const NomadView = require('%app.views%/nomad-view');

// Extend custom Hello World from the base view 
let HelloWorldView = customization.extend(NomadView, {
    // Specify the name of HBS template
    template: 'hello-world',
    
    // Configure the header
    headerConfig: {
        title: 'Hello, World!',
        buttons: {
            mainMenu: true,
        }
    },
    
});

// Register custom route "hello"
customization.registerRoutes([{
    name: 'hello',      // Uniquely identifies the route
    steps: 'hello',     // Route hash fragment: '#hello'
    
    handler() {
        // Load HelloWorld view when the route is navigated to.
        app.controller.loadScreen(HelloWorldView);
    }
}]);

// Register a new action in the main menu
customization.registerMainMenuItem({

    label: app.lang.get('Hello, world!'),   // Displayable label
    iconKey: 'actions.hello',               // Icon key from config/app.json
    route: 'hello',                         // Name of the route to navigate to when the action is selected
    rank: 0,                                // Identifies the position of the action in the menu
    
});

module.exports = HelloWorldView;
