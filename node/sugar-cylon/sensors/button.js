var Cylon = require('cylon');
var config = require('../config');
var utils = require('../utils');

/**
 * Robot Code - Using Button
 * On button push - create a task
 *
 * http://cylonjs.com/documentation/drivers/button/
 */
var robot = Cylon.robot({
    connections: utils.cylon.getConnection(),

    devices: {
        button: { driver: 'button', pin: 11 }
    },

    work: function(my) {
        var numTimes = 0;

        my.button.on('push', function() {
            console.log("Button pushed!");

            numTimes++;

            api.records('create', 'Tasks', {
                'name': 'Button Push ' + numTimes,
                'assigned_user_id': 'seed_jim_id'
            }, null, {
                error: function() {
                    console.log(arguments);
                },
                success: function(data) {
                    console.log('Task Created', data);
                }
            })
        });
    }
});

var api = require('sugarapi-node').getInstance(config.instance);
utils.login(api, 'jim', function() {
    robot.start();
});
