var Cylon = require('cylon');
var keypress = require('keypress');
var config = require('../config');
var utils = require('../utils');

var value = 0;

/**
 * Robot Code - Laser using Digital Sensor Write
 *
 * http://cylonjs.com/documentation/drivers/direct-pin/
 */
var robot = Cylon.robot({
    connections: utils.cylon.getConnection(),

    devices: {
        pin: { driver: 'direct-pin', pin: 9 }
    },

    work: function(my) {
        every((1).second(), function() {
            my.pin.digitalWrite(value);
        });
    }
});

robot.start();

// make `process.stdin` begin emitting "keypress" events
keypress(process.stdin);

// listen for the "keypress" event
process.stdin.on('keypress', function (ch, key) {
    if (key && key.ctrl && key.name == 'c') {
        process.exit(0);
    }

    if (key.name === 'o') {
        value = 1;
        console.log('ON!');
    } else {
        value = 0;
        console.log('OFF!');
    }
});

process.stdin.setRawMode(true);
process.stdin.resume();
console.log('Press o key to turn on and any other key to turn off.');
