<?php
// Copyright 2017 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

namespace Sugarcrm\Sugarcrm\custom\Elasticsearch\Analysis;

use Sugarcrm\Sugarcrm\Elasticsearch\Analysis\AnalysisBuilder;
use ReflectionObject;

/**
 *
 * AnalysisBuilder Injector
 *
 * Currently AnalysisBuilder lacks the support to replace existing analyzers
 * and/or inject specific filters. The feature request to make the Analysis
 * Builder more flexible is currently under development.
 *
 * Until then we can use reflection directly on AnalysisBuilder to orchestrate
 * the filter injection ourselves in custom code.
 *
 */
class AnalysisBuilderInjector
{
    /**
     * @var AnalysisBuilder
     */
    private $builder;

    /**
     * Ctor
     * @param AnalysisBuilder $builder
     */
    public function __construct(AnalysisBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Inject filter for given analyzers
     * @param string $filterName
     * @param array $analyzers
     */
    public function prependFilter($filterName, array $analyzers)
    {
        // load current analysis settings
        $analysis = $this->loadAnalysis();

        // prepend the ASCII filter
        foreach ($analyzers as $analyzer) {

            // check if given analyzer exists
            if (!isset($analysis[AnalysisBuilder::ANALYZER][$analyzer])) {
                continue;
            }

            // ensure a filter array is available
            $filters = array();
            if (isset($analysis[AnalysisBuilder::ANALYZER][$analyzer][AnalysisBuilder::TOKENFILTER])) {
                $filters = $analysis[AnalysisBuilder::ANALYZER][$analyzer][AnalysisBuilder::TOKENFILTER];
            }

            // prepend the filter
            array_unshift($filters, $filterName);

            // attach changed filters list
            $analysis[AnalysisBuilder::ANALYZER][$analyzer][AnalysisBuilder::TOKENFILTER] = $filters;
        }

        // commit changes
        $this->commitAnalysis($analysis);
    }

    /**
     * Get current raw analyzer settings
     * @return array
     */
    private function loadAnalysis()
    {
        $ro = new ReflectionObject($this->builder);
        $rp = $ro->getProperty('analysis');
        $rp->setAccessible(true);
        return $rp->getValue($this->builder);
    }

    /**
     * Commit raw analysis settings
     * @param array $analysis
     */
    private function commitAnalysis(array $analysis)
    {
        $ro = new ReflectionObject($this->builder);
        $rp = $ro->getProperty('analysis');
        $rp->setAccessible(true);
        $rp->setValue($this->builder, $analysis);
    }
}
