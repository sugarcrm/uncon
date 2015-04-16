var Cylon = require('cylon');
var keypress = require('keypress');
var config = require('../config');
var utils = require('../utils');

var value = 0;

/**
 * Robot Code - Beep
 *
 * http://cylonjs.com/documentation/drivers/direct-pin/
 */
var robot = Cylon.robot({
    connections: utils.cylon.getConnection(),

    devices: {
        pin: { driver: 'direct-pin', pin: 9 }
    },

    work: function(my) {
        console.log('Press o key to fire beep');
        every((1).second(), function() {
            if (value === 1) {
                makeBeep(my.pin, 1000);
                value = 0;
            }
        });
    }
});

var makeBeep = function(pin, length) {
    for (var i = 0; i<length; i++) {
        pin.digitalWrite(1);
    }
};

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
        console.log('Beep!');
    }
});

process.stdin.setRawMode(true);
process.stdin.resume();
