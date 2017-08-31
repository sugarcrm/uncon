# UnCon 2017

## Chart Dashlet Tutorial

Copyright (C) 2017 SugarCRM Inc.

### Requirements
- Sugar v7.9.x or v7.10.x installed
- PHP installed (for development)
- [ProfessorM Module Package installed](https://github.com/sugarcrm/uncon/tree/2017/ProfessorM)

### Installation
1. Login as Administrator into 7.9 or 7.10 Sugar instance (does not need to be locally installed)
2. Go to Administration > Module Loader
3. Use Sugar's Module Loader to install the latest release zip from this repository
4. Click "Install" on your package in the list.
5. Once the package is installed you should see 4 new dashlets available to be place on the Home and Accounts dashboards.

## Usage

This loadable package includes 4 versions of the Ratings Distribution dashlet in different stages of development. You are free to begin the tutorial at any stage.

### Part 1: The basic chart dashlet structure
1. Create HBS template
2. Creae PHP config
3. Create Js controller:
 - initialize: chart model
 - renderChart: boilerplate
 - loadData: filterAPI Top 10 SuperGroups

### Part 2: Switch to using Report API
1. Set up the "Super Groups by Status by Rating" report
2. Add default status selector and input field for Report Id in dashlet config panel
3. Change Js controller:
 - Modify loadData & evaluateResult
 - Enable display of dashlet on Accounts list and record view

### Part 3: Add interactive aggregation tabs
1. Using HBS helper eachOptions and styling
2. Change Js controller:
 - rollupStatusAverages: rollup of report data to create status averages
 - buildStatusCollection: create a status collection based on "account_status_list"

### Part 4: Final formatting and finishing
1. Tooltips and accessibility styling
2. CSS styling for active status tab
3. Custom hole formatter

## Build instructions
Run `pack.php [version]` to generate a Module Loadable Package into the `releases/` directory.

    $ ./pack.php 2.0

