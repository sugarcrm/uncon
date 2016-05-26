# UnCon 2016

## Customizing Sugar Visibility

Copyright (C) 2016 SugarCRM Inc.


### Requirements
- SugarCRM 7.7.0 and up

### Installation
- Install SugarCRM
- Use module loader to install the latest release zip from this repository
- Perform a full reindex (admin -> search) using "delete existing data" option
- Execute cron to process all queued records into Elasticsearch
- Add "sales stage" field to the record view for Opportunity module using Studio

### Usage
- Create a new role with for example name 'Demo Visibility'
- Assign a (demo) user to this new role
- Configure your instance to filter opportunities for a given sales stages for this role
```php
$sugar_config['custom']['visibility']['opportunities']['target_role'] = 'Demo Visibility';
$sugar_config['custom']['visibility']['opportunities']['filter_sales_stages'] = array('Closed Won', 'Closed Lost');
```
- Login as the (demo) user
- Observe that opportunities of sales stages "Closed Won" and "Closed Lost" will no longer be accessible

