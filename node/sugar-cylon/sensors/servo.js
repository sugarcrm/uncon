var Cylon = require('cylon');
var _ = require('underscore');
var config = require('../config');
var utils = require('../utils');

var max = 10,
    angle = 180;

/**
 * Robot Code - Using Servo
 *
 *
 * http://cylonjs.com/documentation/drivers/servo/
 */
var robot = Cylon.robot({
    connections: utils.cylon.getConnection(),

    devices: {
        servo: { driver: 'servo', pin: 11 }
    },

    work: function(my) {
        callApi();  //Called once from here

        my.servo.angle(angle);
        every((1).second(), function() {
            my.servo.angle(angle);
        });
    }
});

var setNewAngle = function(numOpenTasks) {
    console.log('Number Tasks: ', numOpenTasks);
    var percent = numOpenTasks / max;

    if (percent > 1) {
        percent = 1;
    }

    angle = Math.floor(180 * percent);
    console.log('New Angle: ', angle);
};

/**
 * This function is used to poll Sugar API, throttled to prevent excessive
 * hammering of the Sugar server. (No more than 1 API call every 3 seconds.)
 */
var callApi = _.throttle(function() {
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
            setNewAngle(numOpenAssignedTasks);
        },
        complete: function(){
            callApi(); //After each call is complete, queue up next call
        }
    })
}, 3000);

var api = require('sugarapi-node').getInstance(config.instance);
utils.login(api, 'jim', function() {
    robot.start();
});
