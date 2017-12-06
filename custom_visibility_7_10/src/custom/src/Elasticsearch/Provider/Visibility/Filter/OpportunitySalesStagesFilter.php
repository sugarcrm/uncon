<?php
// Copyright 2017 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

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
     * @var Visibility
     */
    protected $provider;

    /**
     * {@inheritdoc}
     */
    public function setProvider(Visibility $provider)
    {
        $this->provider = $provider;
    }

    /**
     * {@inheritdoc}
     */
    public function buildFilter(array $options = array())
    {
        return new \Elastica\Filter\Terms(
            'visibility_sales_stage',
            $options['filter_sales_stages']
        );
    }
}
