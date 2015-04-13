var Cylon = require('cylon');
var _ = require('underscore');

/**
 * Initalize Sugar API singleton
 *
 * Set your own server URL
 */
var api = require('sugarapi-node').getInstance({
    serverUrl: "http://localhost/~mmarum/sugarcrm/rest/v10",
    platform: "mobile",
    timeout: 30,
});

var ledStatus = 0;

/**
 * Arduino Robot 
 */
var arduino = Cylon.robot({
    connections: {
        //Change port to match the serial connection to your Arduino,
        // discover this using the command `gort scan serial`
        arduino: { adaptor: 'firmata', port: '/dev/tty.usbmodem1411' }
    },

    devices: {
        //pin13 is built-in LED pin on Arduino UNO - labeled "L" on board
        led: { driver: 'led', pin: 13 }  
    },

    work: function(my) {
        callApi();  //Called once from here

        // Refresh output every second
        every((1).second(), function(){
            if(ledStatus == 0){
                my.led.turnOff();
            } else {
                my.led.turnOn();
            }
        });
    }
});

/**
 * This function is used to poll Sugar API, throttled to prevent excessive
 * hammering of the Sugar server. (No more than 1 API call every 3 seconds.)
 */
var callApi = _.throttle(function(){

    /**
    * Example: 
    *   If there are any unfinished Tasks assigned to the current user,
    *       Turn LED ON
    *   else 
    *       Turn LED OFF
    */
        api.records('read', 'Tasks', null, {
            filter: [
                {
                    status: {"$in":["Not Started","In Progress"]}
                },
                {   
                    "$owner": ""  //predefined filter
                }
            ]
        }, {
            error: function(){
                console.log(arguments);
            },
            success: function(data){
                var numOpenAssignedTasks = _.size(data.records);
                if (numOpenAssignedTasks > 0) {
                    ledStatus = 1;
                } else {
                    ledStatus = 0;
                }
            },
            complete: function(){
                callApi(); //After each call is complete, queue up next call
            }
        })
    }, 3000);

/**
 * Call login with given username/password, if successful - start the Arduino robot
 */
api.login({
    username : "admin",
    password : "admin"
}, null, {
    success : function(data){
        console.log("OAuth-Token : " + api.getOAuthToken());
        arduino.start();
    }
});

