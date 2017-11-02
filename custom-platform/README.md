# UnCon 2017

## How to register a custom platform

Copyright (C) 2017 SugarCRM Inc.

### Requirements
- Sugar v7.9 installed
- PHP installed (for development)

### Installation
1. Login as Administrator into Sugar instance
2. Use Sugar's Module Loader to install the latest release zip from this repository

### Usage
SugarCRM will change its behavior out of the box to disallow unknown platform for 7.11. Therefore
any customizations or integrations which rely on a custom platform need to register those up
front.

This package shows how to use the extension framework to do so. More information can be found
[here](http://support.sugarcrm.com/Documentation/Sugar_Developer/Sugar_Developer_Guide_7.9/Architecture/Extensions/Platforms/).

### Build instructions
Run `pack.php [version]` to generate a Module Loadable Package into the `releases/` directory.

    $ ./pack.php 2.0
