# UnCon 2016

## Back End Sugar Unit Tests

Copyright (C) 2016 SugarCRM Inc.


### Requirements
- SugarCRM 7
 - SugarCRM 7.7+ preferred
- SugarCRM test suite
 - Available on [GitHub](https://github.com/sugarcrm/unit-tests) or [as downloadable packages](https://github.com/sugarcrm/unit-tests/releases)
- PHPUnit 4.3.5+
- PHP 5.3+
- Terminal application with the PHP binary in your terminal user's path

### Installation
- Install SugarCRM
- Use module loader to install the latest release zip from this repository

### Use of included tests
From a terminal, change to your instance test directory

`cd /path/to/sugar/instance/tests`

#### Running the full suite of tests
 `phpunit`

#### Running a single test suite by name
`phpunit --testsuite SuiteNameWithNoSpaces`
`phpunit --testsuite "Suite Name With Spaces"`

#### Running all tests in a single file
`phpunit include/CommissionerTest.php`

#### Running a single test
`phpunit include/CommissionerTest.php --filter testGetCommission`

