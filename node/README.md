# Node.js Projects

Copyright (C) 2015 SugarCRM Inc.

Node.js is a great way to quickly prototype applications or integrations.  It allows you to create server-side JavaScript applications.  If you are new to Node, check out https://nodejs.org/about/ to learn more about how Node works.  These projects also make use of Node Package Manager (https://www.npmjs.com/) for dependency management.

**sugarapi-node** is a Node.js module is based upon standard Sugar 7 `sugarapi.js` library used by our Sidecar framework.  It has been modified to allow it to work within a Node environment.  Using this module, you'll be able to easily make Sugar 7 REST API calls from your own Node applications.  Check out the README for more usage details.

**sugar-cylon** is a sample module for a Cylon.js (http://cylonjs.com/) robot that uses sugarapi-node module to quickly and easily prototype IoT solutions to CRM problems.  Check out the README for more details to get started.

## Prerequisites

### Node.js
Both `node` and `npm` commands are included when you install Node.js

**OSX via Homebrew**

````
$ brew install node
````

**Other Operating Systems**

Visit https://nodejs.org/download/ to download an installer.

## Usage
Each of the existing projects here are Node modules.  They include a `package.json` file which (among other things) defines the module's dependencies.  In order to install these dependencies, you need to run `npm install`.

For example,

````
$ cd sugarapi-node/
$ npm install

underscore@1.8.3 node_modules/underscore

local-storage@1.4.1 node_modules/local-storage

xmlhttprequest@1.7.0 node_modules/xmlhttprequest

jquery@2.1.3 node_modules/jquery

domino@1.0.18 node_modules/domino

````

These dependencies are then installed under the `node_modules` folder.

Once the dependencies are installed, you should be able to write and run applications that use these modules.  A sample app is included with each module.  A node application is just a JavaScript file that you run with the `node` command.  Each of the modules here include a sample app called `app.js`.

````
$ node app.js
````

To learn more about each module and their sample applications, view their READMEs.
