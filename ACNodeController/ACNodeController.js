///////////////////////////////////////////////////////////////
// CONFIG
///////////////////////////////////////////////////////////////
var statusURL = "http://mycontrollerurl.com/status"
var request = require('request');
var j5 = require("johnny-five");
// CONFIGURATION FOR UNIX SYSTEMS
var board = new j5.Board();
  // CONFIGURATION FOR WINDOWS
  // replace [COMX] with the port the arduino is connected to
  //var board = new j5.Board({port: "COMX"});

///////////////////////////////////////////////////////////////
var servo;
var LEDPIN = 13;
var OUTPUT = 1;
var status = 0;
var newstatus = null;
var max = false;

/** 
 * hit power button on the ac unit
 * @param servo the servo to hit the power button
 */
function hitPowerButton(servo) {
	servo.max();
	setTimeout(function() { servo.min(); }, 200);
}

board.on("ready", function(){

  // ENABLE HARDWARE COMPONENTS
  this.pinMode(LEDPIN, OUTPUT);
  servo = j5.Servo({
  	pin: 9,
  	range: [20,50]
  });
  board.repl.inject({servo:servo});
  
  // INITIALIZE CONTROLLER STATUS
  servo.min();
  this.digitalWrite(LEDPIN, 1);
  console.log("Arduino AC CONTROLLER");
  console.log("---------------------");
  console.log("AC: Off");

  // CHECK LOOP
  this.loop(10000, function() {
  	// PERFORM ASYNC WEB REQUEST
   request(statusURL, function (error, response, body) {
    if (!error && response.statusCode == 200) {
      newstatus = body;
      if(newstatus != status) {
        hitPowerButton(servo);
        status = newstatus;
        if(status == 1) {
          console.log("AC: On");
        }
        else {
          console.log("AC: Off");
        }
      }
    }
  });

  	// TOGGLE LED TO WEB STATUS
    /*
  	}*/
  });
});