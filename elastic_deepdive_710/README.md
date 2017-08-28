# UnCon 2017

## Elasticsearch Deep Dive Demo

Copyright (C) 2017 SugarCRM Inc.

This package contain the customizations as presented during the Elasticsearch
Deep Dive session at UnCon 2016. It contains the following functionality:
- Add ASCII folding filter for text based fields
- Use Elastic for the Opportunities Metrics dashboard using aggregates

### Requirements
- Sugar v7.10 installed

### Installation
1. Login as Administrator into Sugar instance
2. Use Sugar's Module Loader to install the latest release zip from this repository
3. Run a full reindex using `bin/sugarcrm search:silent-reindex --clearData`

### Usage ASCI Folding
ASCII converts alphabetic, numeric, and symbolic Unicode characters which are
not in the first 127 ASCII characters (the "Basic Latin" Unicode block) into
their ASCII equivalents, if one exists.

For example "Weißkugelhütte" will be both searchable using the special
characters as well as injecting replacements "ss" for "ß" and "u" for "ü".

### Usage Opportunity Metrics Dahsboard
On Accounts record view there exists an OOTB Opportunity Metrics Dashboard
which is collecting its data using SQL queries. This demo replaces the SQL
logic by using Elasticsearch aggretions instead.

### Build instructions
Run `pack.php [version]` to generate a Module Loadable Package into the `releases/` directory.

    $ ./pack.php 2.0
