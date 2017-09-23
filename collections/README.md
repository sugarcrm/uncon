# UnCon 2017

## Using and Defining Collections in Sugar

Copyright (C) 2017 SugarCRM Inc.

This package contains the customizations as presented during the Using 
and Defining Collections in Sugar Presentation at UnCon 2017. 

It contains the following functionality:
- New Equipment and Powers modules
- An "Equipment" collection field in the Contacts module which allows the adding and removing of related Equipment records inline in the  Contacts record view.
- A "Powers and Equipment" panel on the Leads record view that displays related Powers and Equipment records mixed in a single Collection. A filter is applied to this collection such that only Equipment with a "Number Availible" higher than 0 will display. 
- An "Events" dashlet which displays Calls, Meetings, and Tasks in a single mixed collection/list

### Requirements
- Sugar v7.9.x or v7.10.x installed

### Installation
1. Login as Administrator into Sugar instance
2. Use Sugar's Module Loader to install the latest release zip from this repository
3. Run a Quck Repair and Rebuild

### Build instructions
Run `pack.php [version]` to generate a Module Loadable Package into the `releases/` directory.

    $ ./pack.php 2.0
