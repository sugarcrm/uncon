<?php
// Copyright 2016 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

// Register custom data analytics provider
Sugarcrm\Sugarcrm\Elasticsearch\Container::getInstance()->registerProvider(
    'CustomDataAnalytics',
    'Sugarcrm\Sugarcrm\custom\Elasticsearch\Provider\DataAnalytics\DataAnalytics'
);
