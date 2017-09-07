<?php
// Copyright 2017 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

namespace Sugarcrm\Sugarcrm\custom\Elasticsearch\Provider\GlobalSearch\AsciiFolding;

use Sugarcrm\Sugarcrm\Elasticsearch\Provider\GlobalSearch\Handler\AnalysisHandlerInterface;
use Sugarcrm\Sugarcrm\Elasticsearch\Provider\GlobalSearch\Handler\AbstractHandler;
use Sugarcrm\Sugarcrm\Elasticsearch\Analysis\AnalysisBuilder;
use Sugarcrm\Sugarcrm\custom\Elasticsearch\Analysis\AnalysisBuilderInjector;

/**
 *
 * ASCII Folding Handler
 *
 */
class AsciiFoldingHandler extends AbstractHandler implements AnalysisHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildAnalysis(AnalysisBuilder $builder)
    {
        // define ASCII folding filter
        $builder->addFilter(
            'gs_asciifolding_preserve',
            'asciifolding',
            array('preserve_original' => true)
        );

        // analyzers for which to inject ASCII folding filter
        $analyzers = array(
            'gs_analyzer_string',
            'gs_analyzer_string_ngram',
            'gs_analyzer_text_ngram',
            'gs_analyzer_string_html',
        );

        // use injector to prepend the ASCII folding filter
        $injector = new AnalysisBuilderInjector($builder);
        $injector->prependFilter('gs_asciifolding_preserve', $analyzers);
    }
}
