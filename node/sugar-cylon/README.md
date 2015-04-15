# SugarCRM Robotics
This is a sample module for a Cylon.js (http://cylonjs.com/) robot that uses sugarapi-node module to quickly and easily prototype IoT solutions to CRM problems.

## Prerequisites

See parent directory for info on the Node.js prerequisite - that applies to this project as well.

### Hardware
You will need either an Arduino Uno or a Raspberry Pi to run this project - examples for both platforms are included.

### Useful Tools

*Gort* (http://gort.io/) is a helpful tool to scan your local system for serial devices (like the Arduino).

## Setup
Included is a `package.json` file which (among other things) defines this module's dependencies.

To pull in these dependencies, run the following

````
$ npm link ../sugarapi-node

$ npm install

````

These dependencies are then installed under the `node_modules` folder.

You will then want to open `config.js` and tweak the settings to your own environment.

Once the dependencies are installed and config is set, you should be able to write and run applications that use this module.

````
$ node app.js
````

## Raspberry Pi Specific

You will need to know the IP address of the Raspberry Pi to be able to ssh in and run node from there.

You will probably find it easier to do your development locally and then push changes to the Raspberry Pi. To do this you can use rsync - run the following command from this directory.

````
$ rsync -avz -e ssh ../../node pi@192.168.0.112:~/uncon
````
Note: Default password for Raspberry Pi is `raspberry`.

Once your files are synced over you can ssh in:

````
$ ssh pi@192.168.0.112
$ cd ~/uncon/node/sugar-cylon
$ node app.js
````
