var Cylon = require('cylon');
var config = require('../config');
var utils = require('../utils');

/**
 * Robot Code - Read Sensors (using Direct Pin Driver)
 *
 * http://cylonjs.com/documentation/drivers/direct-pin/
 */
var robot = Cylon.robot({
    connections: utils.cylon.getConnection(),

    devices: {
        pin0: { driver: 'direct-pin', pin: 0 },
        pin9: { driver: 'direct-pin', pin: 9 }
    },

    work: function(my) {
        console.log('Reading...');
        my.pin0.analogRead(onAReadCallback);
        my.pin9.digitalRead(onDReadCallback);
    }
});

var onDReadCallback = function() {
    console.log('Digital Read', arguments);
};

var onAReadCallback = function(dontcare, input, pin) {
    var threshold = 0;

    if (input > threshold) {
        console.log('Analog Read', arguments);
    }
};

robot.start();
