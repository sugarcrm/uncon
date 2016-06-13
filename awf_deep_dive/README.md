# UnCon 2016

## Advanced Workflow Deep Dive

Copyright (C) 2016 SugarCRM Inc.


### Requirements
- SugarCRM 7.8
- PHP 5.4+

### Installation
- Install SugarCRM
- Use module loader to install the latest release zip from this repository

### Notes
The included CSS file and image are placed in the Module directory inside of the pmse_Inbox/img directory. At this time, there is no way to customize the CSS for Advanced Workflow in an upgrade safe way, and these files are no exception. **THESE ARE NOT UPGRADE SAFE ADDITIONS.**

### Use of included code
After installation of this code, you must run a Repair and Rebild and you must hard refresh your browser so that all changes to the CSS and Javascript are picked up in your instance.