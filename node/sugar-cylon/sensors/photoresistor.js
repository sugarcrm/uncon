var five = require("johnny-five"),
    board, photoresistor;

board = new five.Board();

//https://github.com/rwaldron/johnny-five/blob/master/docs/photoresistor.md
board.on("ready", function() {

    // Create a new `photoresistor` hardware instance.
    photoresistor = new five.Sensor({
        pin: "A2",
        freq: 250
    });

    // Inject the `sensor` hardware into
    // the Repl instance's context;
    // allows direct command line access
    board.repl.inject({
        pot: photoresistor
    });

    // "data" get the current reading from the photoresistor
    photoresistor.on("data", function() {
        console.log(this.value);
    });
});