<?php
// Copyright 2016 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

namespace Sugarcrm\Sugarcrm\custom\Elasticsearch\Provider\Visibility\Filter;

use Sugarcrm\Sugarcrm\Elasticsearch\Provider\Visibility\Filter\FilterInterface;
use Sugarcrm\Sugarcrm\Elasticsearch\Provider\Visibility\Visibility;

/**
 *
 * Custom opportunity filter by sales_stage
 *
 * This logic can exist directly in the FilterOpportunities visibility class.
 * However by abstracting the (custom) filters makes it possible to re-use
 * them in other places as well.
 */
class OpportunitySalesStagesFilter implements FilterInterface
{
    /**
     * Elasticsearch Visibility Provider
     * @var Sugarcrm\Sugarcrm\Elasticsearch\Provider\Visibility\Visibility
     */
    protected $provider;

    /**
     * Implementation FilterInterface::setProvider
     *
     * Set visibility provider, implementation of the interface method
     * @param Sugarcrm\Sugarcrm\Elasticsearch\Provider\Visibility\Visibility $provider, Elasticsearch Visibility Provider
     */
    public function setProvider(Visibility $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Implementation FilterInterface::buildFilter
     *
     * to build elastic Terms filter, http://elastica.io/api/3.2.2/classes/Elastica.Filter.Terms.html
     *
     * This demo function adds condition that 'visibility_sales_stage' must be IN $options['filter_sales_stages']
     *
     * @param array $options
     * @return \Elastica\Query\AbstractQuery
     */
    public function buildFilter(array $options = array())
    {
        return new \Elastica\Filter\Terms(
            'visibility_sales_stage',
            $options['filter_sales_stages']
        );
    }
}
