# UnCon 2017

## Customizing Sugar Visibility

Copyright (C) 2016 SugarCRM Inc.


### Requirements
- SugarCRM 7.9.x

### Installation
- Install SugarCRM and login as an admin.
- Use module loader to install the latest release zip from this repository.
- Perform a full reindex (admin -> search) using "delete existing data" option. 
- Execute cron to process all queued records into Elasticsearch. (From your Sugar directory, you can execute 
`bin/sugarcrm elastic:queue` to check if the reindex has completed and `php cron.php` to consume the queue until the 
reindex finishes. You may need to execute `chmod +x bin/sugarcrm` in order to be able to execute these commands.)
- Ensure you are NOT using Revenue Line Items. (Navigate to Administration -> Opportunities and ensure
the **Opportunities** radio button is selected.)

### Usage
- Create a new role named 'Demo Visibility'
- Assign a (demo) user to this new role.  Note: if you are using the sample data, do NOT use Jim as he has admin 
permission on the Opportunities module and will be able to view all records.  We recommend using Max.
- Configure your instance to filter opportunities for a given sales stages for this role by adding the following to 
config_override.php:
```php
<?php

$sugar_config['custom']['visibility']['opportunities']['target_role'] = 'Demo Visibility';
$sugar_config['custom']['visibility']['opportunities']['filter_sales_stages'] = array('Closed Won', 'Closed Lost');
```
- Login as the (demo) user
- Observe that opportunities of sales stages "Closed Won" and "Closed Lost" will no longer be accessible

