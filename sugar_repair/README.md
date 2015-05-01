# SugarRepair CLI

Running Repair and Rebuild from Command Line

Copyright (C) 2015 SugarCRM Inc.

## Setup

1. Download the `sugar_repiar` script
2. add it to your $PATH variable (eg: ~/bin or /usr/local/bin)
3. run `chmod +x /path/to/sugar_repair`
4. goto your Sugar Install and run `sugar_repair .`

## Issues
If your php version is not in the $PATH variable, you'll have to modify the top line of the script to and change `#!/usr/bin/env php` to be `#!/path/to/your/php/executable`
