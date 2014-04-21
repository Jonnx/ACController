ACController (powered by Arduino, Servo, and a Web Service)
===========================================================
The ACController allows you to turn a window airconditioning unit over the internet
using a local Node Script (Windows & UNIX). The controls are hosted on a website
and protected by a basic login. 

Web Client
----------
The web client with the login is built in PHP will run on any PHP capable host.
It requires PHP5 and a single MySQL Database. 

NODE.js Script
--------------
The Node Script controls the Arduino and its Servo (connected on port 9) using the 
johnny-five js library. The Arduino needs to be loaded with the StandardFirmata code.