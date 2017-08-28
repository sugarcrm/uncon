<?php
// Copyright 2017 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

// Register ascii folding handler
Sugarcrm\Sugarcrm\Elasticsearch\Container::getInstance()->addProviderInit('GlobalSearch', function($provider) {
    $provider->addHandler(new Sugarcrm\Sugarcrm\custom\Elasticsearch\Provider\GlobalSearch\AsciiFolding\AsciiFoldingHandler());
});
