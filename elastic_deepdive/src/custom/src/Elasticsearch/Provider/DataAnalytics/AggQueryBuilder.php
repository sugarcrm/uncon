<?php
// Copyright 2016 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

namespace Sugarcrm\Sugarcrm\custom\Elasticsearch\Provider\DataAnalytics;

use Sugarcrm\Sugarcrm\Elasticsearch\Query\QueryBuilder;
use Elastica\Aggregation\AbstractAggregation;

/**
 *
 * Aggregation Query Builder wrapping around QueryBuilder to be able to
 * set our own aggregator directly. The aggregation support in QueryBuilder
 * is currently centric around GlobalSearch and will be abstracted out in
 * the near future to have a more generic QueryBuilder instead.
 *
 */
class AggQueryBuilder extends QueryBuilder
{
    /**
     * @var AbstractAggregation
     */
    protected $agg;

    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $query = parent::build();

        if ($this->agg) {
            $query->addAggregation($this->agg);
        }

        return $query;
    }

    /**
     * Add main aggregation
     * @param AbstractAggregation $agg
     */
    public function addAggregation(AbstractAggregation $agg)
    {
        $this->agg = $agg;
    }
}
