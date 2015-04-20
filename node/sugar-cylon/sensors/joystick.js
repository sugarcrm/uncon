var five = require("johnny-five");
var board = new five.Board();

board.on("ready", function() {

    // Create a new `joystick` hardware instance.
    var joystick = new five.Joystick({
        // Joystick pins are an array of pins
        // Pin orders:
        //   [ up, down, left, right ]
        //   [ ud, lr ]
        pins: ["A0", "A1"],
        freq: 100
    });

    // Joystick Event API
    joystick.on("axismove", function(err, timestamp) {
        if (this.fixed.x != .5 || this.fixed.y != .5) {
            if (this.fixed.x < .5) console.log('left');
            if (this.fixed.x > .5) console.log('right');
            if (this.fixed.y < .5) console.log('down');
            if (this.fixed.y > .5) console.log('up');
        }
    });
});