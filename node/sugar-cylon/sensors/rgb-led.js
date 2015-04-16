var Cylon = require('cylon');
var config = require('../config');
var utils = require('../utils');

/**
 * Robot Code - RGB LED
 *
 * http://cylonjs.com/documentation/drivers/rgb-led/
 */
var robot = Cylon.robot({
    connections: utils.cylon.getConnection(),

    devices: {
        leds: { driver: 'rgb-led', redPin: 3, greenPin: 5, bluePin: 6 }
    },

    work: function(my) {
        var color;
        every((1).second(), function() {
            if (color == "ff0000") {
                color = "0000ff";
            } else {
                color = "ff0000";
            }
            my.leds.setRGB(color);
        });
    }
});

robot.start();
