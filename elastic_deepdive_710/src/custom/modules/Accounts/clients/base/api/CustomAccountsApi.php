<?php
// Copyright 2017 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

use Sugarcrm\Sugarcrm\SearchEngine\SearchEngine;

require_once 'modules/Accounts/clients/base/api/AccountsApi.php';

/**
 *
 * Custom REST API endpoints for Data Analytics
 *
 */
class CustomAccountsApi extends AccountsApi
{
    /**
     * Opportunity metrics dashboard
     * @param RestService $api
     * @param array $args
     */
    public function opportunityStats(RestService $api, array $args)
    {
        $analytics = SearchEngine::getInstance()
            ->getEngine()
            ->getContainer()
            ->getProvider('CustomDataAnalytics');

        return $analytics->getOppMetrics($args['record']);
    }
}
