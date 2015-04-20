var Cylon = require('cylon');
var config = require('../config');
var utils = require('../utils');

/**
 * Robot Code - Tilt Switch (using Direct Pin Driver)
 *
 * http://cylonjs.com/documentation/drivers/direct-pin/
 */
var robot = Cylon.robot({
    connections: utils.cylon.getConnection(),

    devices: {
        pin7: { driver: 'direct-pin', pin: 7 }
    },

    work: function(my) {
        console.log('Reading...');
        my.pin7.digitalRead(onDReadCallback);
    }
});

var value = 0;

var onDReadCallback = function(nothing, newValue) {
    if (newValue !== value) {
        console.log('TILT');
        value = newValue;
    }
};

var onAReadCallback = function(dontcare, input, pin) {
    var threshold = 0;

    if (input > threshold) {
        console.log('Analog Read', arguments);
    }
};

robot.start();
