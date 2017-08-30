# UnCon 2017 - New Quotes Module Customization Bonanza

## Sugar Module Loadable Package template

Copyright (C) 2017 SugarCRM Inc.

### Purpose
This customization allows Professor M's School a way to properly estimate and Quote jobs the Team may be going on.
Users can use the Quotes module to estimate Hero and Villain Labor costs, as well as estimate how much City and Private
Property may be destroyed during a mission.

This Module Loadable Package adds custom fields and layouts to the Quote Data section of the new Quotes Module.
This package demonstrates a way to customize the Quote Data layout with new custom fields (and a new custom field type)
to add new functionality in an upgrade-safe way.

### Requirements
- Sugar v7.x.x installed
- PHP installed (for development)
- 110% Winning Attitude

### Installation
1. Login as Administrator into Sugar instance
2. Use Sugar's Module Loader to install the latest release zip from this repository

### Files Overriden in the custom/ directory
- `modules/Quotes/clients/base/views/quote-data-grand-totals-header/quote-data-grand-totals-header.php`

### New Files Added to the custom/ directory
- `modules/Quotes/clients/base/fields/percent/percent.js`
- `modules/Quotes/clients/base/fields/percent/quote-data-grand-totals-header.hbs`

### Custom Fields Added
- Product Bundles
  - `total_damage_amount_c` - Sums up Quoted Line Items `discount_amount` field when the QLI has a ProductType "Property"
  - `total_labor_amount_c` - Sums up Quoted Line Items `discount_amount` field when the QLI has a ProductType "Labor"
- Quotes
  - `total_damage_amount_c` - Sums up all Product Bundles `total_damage_amount_c` amount to the Quote level
  - `total_damage_percent_c` - Divides Quote `total_damage_amount_c` by the Quote `total` amount to give Damage values as a percent of the total Quote amount
  - `total_labor_amount_c` - Sums up all Product Bundles `total_labor_amount_c` amount to the Quote level
  - `total_labor_percent_c` - Divides Quote `total_labor_amount_c` by the Quote `total` amount to give Labor values as a percent of the total Quote amount

### Usage
After installing this Module Loadable Package, simply go to the Quotes Module and create a new Quote.
1. Enter required fields (Name, Valid Until Date, Account, etc)
2. Add a new Quoted Line Item
3. Click the Line Item name dropdown
4. Click "Search and Select..."
5. Search for an entry in the Product Catalog with a "Type" set to "Labor" and add it to the Quote
6. Repeat steps 2 thru 4 and select an entry from the Product Catalog with a "Type" set to "Property" and add it to the Quote
7. Play around with Quantities; how many Hours will your Heroes be on-site? How many Buildings or Vehicles might they destroy?

### Extra Credit
Follow the process but for quote-data-grand-totals-footer to add the total breakdowns to the Quote Totals Footer

### Build instructions
Run `pack.php [version]` to generate a Module Loadable Package into the `releases/` directory.

    $ ./pack.php 2.0
