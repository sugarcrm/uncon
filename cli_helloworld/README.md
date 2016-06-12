# UnCon 2016

## CLI Hello World Demo

Copyright (C) 2016 SugarCRM Inc.

This package contains a custom CLI "hello world" command.

### Requirements
- Sugar v7.7.1.0 installed
- PHP installed (for development)

### Installation
1. Login as Administrator into Sugar instance
2. Use Sugar's Module Loader to install the latest release zip from this repository

### Usage
- Execute `bin/sugarcrm`
- Observe availability of `uncon:helloworld`
- Execute `bin/sugarcrm uncon:helloworld`

### Build instructions
Run `pack.php [version]` to generate a Module Loadable Package into the `releases/` directory.

    $ ./pack.php 2.0
