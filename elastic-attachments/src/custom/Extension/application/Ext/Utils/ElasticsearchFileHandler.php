<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/06_Customer_Center/10_Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */

// Register file handler
Sugarcrm\Sugarcrm\Elasticsearch\Container::getInstance()->addProviderInit('GlobalSearch', function($provider) {
    $provider->addHandler(new Sugarcrm\Sugarcrm\custom\Elasticsearch\Provider\GlobalSearch\Handler\Implement\FileHandler());
});

