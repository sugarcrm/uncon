# UnCon 2016

## Sugar CLI Framework Example

Copyright (C) 2016 SugarCRM Inc.

This package adds support for a simple Quick Repair and Rebuild command that can be run via the command line using the newly introduced Sugar CLI framework.

### Requirements
- Sugar v7.7.1 installed
- PHP installed (for development)

### Installation
1. Login as Administrator into Sugar instance
2. Use Sugar's Module Loader to install the latest release zip from this repository

### Usage
After installation, a new `uncon:repair` command will be registered with the `sugarcrm` command line interface.

Using the command is easy!

    $ bin/sugarcrm uncon:repair

    Starting Quick Repair...
    Complete.

### Build instructions
Run `pack.php [version]` to generate a Module Loadable Package into the `releases/` directory.

    $ ./pack.php 2.0
