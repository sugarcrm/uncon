var Cylon = require('cylon');
var config = require('./config');
var utils = require('./utils');

/**
 * Robot Code
 *
 * This is the "Hello World" of the IoT world - the blinking LED
 */
var robot = Cylon.robot({
    connections: utils.cylon.getConnection(),

    devices: {
        // Arduino: pin13 is built-in LED pin - labeled "L" on board
        // Raspberry Pi: see pinout reference link in readme for location of pin 13
        led: { driver: 'led', pin: 13 }
    },

    work: function(my) {
        every((1).second(), function() {
            my.led.toggle();
        });
    }
});

robot.start();
