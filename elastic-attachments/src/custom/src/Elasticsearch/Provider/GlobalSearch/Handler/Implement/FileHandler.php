<?php
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

namespace Sugarcrm\Sugarcrm\custom\Elasticsearch\Provider\GlobalSearch\Handler\Implement;

use Sugarcrm\Sugarcrm\Elasticsearch\Provider\GlobalSearch\Handler\AbstractHandler;
use Sugarcrm\Sugarcrm\Elasticsearch\Provider\GlobalSearch\Handler\AnalysisHandlerInterface;
use Sugarcrm\Sugarcrm\Elasticsearch\Provider\GlobalSearch\Handler\MappingHandlerInterface;
use Sugarcrm\Sugarcrm\Elasticsearch\Provider\GlobalSearch\Handler\ProcessDocumentHandlerInterface;
use Sugarcrm\Sugarcrm\Elasticsearch\Provider\GlobalSearch\Handler\SearchFieldsHandlerInterface;
use Sugarcrm\Sugarcrm\Elasticsearch\Analysis\AnalysisBuilder;
use Sugarcrm\Sugarcrm\Elasticsearch\Mapping\Mapping;
use Sugarcrm\Sugarcrm\Elasticsearch\Mapping\Property\RawProperty;
use Sugarcrm\Sugarcrm\Elasticsearch\Adapter\Document;
use Sugarcrm\Sugarcrm\Elasticsearch\Provider\GlobalSearch\SearchFields;
use Sugarcrm\Sugarcrm\Elasticsearch\Provider\GlobalSearch\GlobalSearch;
use Sugarcrm\Sugarcrm\Elasticsearch\Mapping\Property\MultiFieldBaseProperty;
use Sugarcrm\Sugarcrm\Elasticsearch\Mapping\Property\MultiFieldProperty;

/**
 *
 * File handler proof of concept:
 *
 *  - Make file content searchable
 *  - Works on field name "filename" with type "file"
 *  - Both full string and wildcard search possible
 *
 */
class FileHandler extends AbstractHandler implements
    AnalysisHandlerInterface,
    MappingHandlerInterface,
    ProcessDocumentHandlerInterface,
    SearchFieldsHandlerInterface
{
    /**
     * Field name to use for file content search
     * @var string
     */
    protected $searchField = 'file_content';

    /**
     * File content mapping for search
     * @var array
     */
    protected $contentMapping = array(
        'file_content_string' => array(
            'type' => 'string',
            'index' => 'analyzed',
            'index_analyzer' => 'gs_analyzer_file_string',
            'search_analyzer' => 'gs_analyzer_file_string',
            'store' => true,
            'term_vector' => 'with_positions_offsets',
        ),
        'file_content_wildcard' => array(
            'type' => 'string',
            'index' => 'analyzed',
            'index_analyzer' => 'gs_analyzer_file_wildcard',
            'search_analyzer' => 'gs_analyzer_file_string',
            'store' => true,
            'term_vector' => 'with_positions_offsets',
        ),
    );

    /**
     * Metadata mapping
     * @var array
     */
    protected $metaDataMapping = array(
        'content_type' => array(
            'store' => false,
        ),
        'content_length' => array(
            'store' => false,
        ),
        'name' =>  array(
            'store' => false,
        ),
        'file' =>  array(
            'store' => false,
        ),
        'title' => array(
            'store' => false,
        ),
        'date' => array(
            'store' => false,
        ),
        'author' => array(
            'store' => false,
        ),
        'keywords' => array(
            'store' => false,
        ),
        'language' => array(
            'store' => false,
        ),
    );

    /**
     * Weighted boost definition
     * @var array
     */
    protected $weightedBoost = array(
        'file_content_string' => 1,
        'file_content_wildcard' => 0.35,
    );

    /**
     * Highlighter field definitions
     * @var array
     */
    protected $highlighterFields = array(
        '*.file_content_string' => array(
            'number_of_frags' => 1,
            'fragment_size' => 80,
        ),
        '*.file_content_wildcard' => array(
            'number_of_frags' => 1,
            'fragment_size' => 80,
        ),
    );

    /**
     * {@inheritdoc}
     */
    public function buildAnalysis(AnalysisBuilder $analysisBuilder)
    {
        $analysisBuilder

            // ngram wildcard filter
            ->addFilter(
                'gs_filter_file_ngram',
                'edgeNGram',
                array(
                    'min_gram' => 3,
                    'max_gram' => 15,
                    'side' => 'front',
                )
            )

            // attachment main analyzer
            ->addCustomAnalyzer(
                'gs_analyzer_file_string',
                'standard',
                array('lowercase')
            )

            // attachment wildcard analyzer
            ->addCustomAnalyzer(
                'gs_analyzer_file_wildcard',
                'standard',
                array('lowercase', 'gs_filter_file_ngram')
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setProvider(GlobalSearch $provider)
    {
        parent::setProvider($provider);
        $provider->addSupportedTypes(array('file'));
        $provider->addHighlighterFields($this->highlighterFields);
        $provider->addWeightedBoosts($this->weightedBoost);
        $provider->addFieldRemap(array($this->searchField => 'filename'));
    }

    /**
     * {@inheritdoc}
     */
    public function buildMapping(Mapping $mapping, $field, array $defs)
    {
        if ($defs['name'] !== 'filename' || $defs['type'] !== 'file') {
            return;
        }

        // File content is passed on the main multi field, lets copy it
        // over to the actual search field.
        $searchField = $this->getSearchField($mapping->getModule());
        $rawMapping = array(
            'type' => 'attachment',
            'fields' => array_merge(
                $this->metaDataMapping,
                array(
                    $field => array(
                        'index' => 'no',
                        'store' => 'no',
                        'copy_to' => array(
                            $searchField,
                        ),
                    ),
                )
            ),
        );

        $property = new RawProperty();
        $property->setMapping($rawMapping);

        $mapping->addRawProperty($field, $property);
        $mapping->excludeFromSource($field);

        // Prepare search multifield to be able to override the default
        // multifield settings as we don't want to store the not analyzed
        // form to save space in our index.
        $fileBaseMapping = array(
            'type' => 'string',
            'index' => 'no',
            'store' => false,
        );
        $file = new MultiFieldBaseProperty();
        $file->setMapping($fileBaseMapping);

        // Add search multi fields
        foreach ($this->contentMapping as $multiField => $mfMapping) {
            $mfProperty = new MultiFieldProperty();
            $mfProperty->setMapping($mfMapping);
            $file->addField($multiField, $mfProperty);
        }

        $mapping->addRawProperty($searchField, $file);
        $mapping->excludeFromSource($searchField);
    }

    /**
     * {@inheritdoc}
     */
    public function processDocumentPreIndex(Document $document, \SugarBean $bean)
    {
        if (!isset($bean->field_defs['filename'])) {
            return;
        }

        // nothing to do anymore if no file found
        if (!$fileId = $this->getFileId($bean)) {
            return;
        }

        $file = 'upload://' . $fileId;
        if (!file_exists($file)) {
            return;
        }

        $content = base64_encode(file_get_contents($file));
        $document->setDataField(
            'filename',
            array(
                '_indexed_chars' => -1,
                '_content' => $content,
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function buildSearchFields(SearchFields $sf, $module, $field, array $defs)
    {
        if ($defs['name'] !== 'filename' || $defs['type'] !== 'file') {
            return;
        }

        $searchField = $this->getSearchField($module);
        foreach ($this->contentMapping as $multiField => $mfDefs) {
            $path = array($searchField, $multiField);
            $sf->addSearchField($module, $path, $defs, $multiField);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getSupportedTypes()
    {
        return array('file');
    }

    /**
     * Get search field
     * @param string $module
     * @return string
     */
    protected function getSearchField($module)
    {
        return $module . SearchFields::PREFIX_SEP . $this->searchField;
    }

    /**
     * Get FTS fields for given module
     * @param string $module
     * @return array
     */
    protected function getFtsFields($module)
    {
        return $this->provider->getContainer()->metaDataHelper->getFtsFields($module);
    }

    /**
     * Get logger object
     * @return \Sugarcrm\Sugarcrm\Elasticsearch\Logger
     */
    protected function getLogger()
    {
        return $this->provider->getContainer()->logger;
    }

    /**
     * Determine file id to use
     * @param \SugarBean $bean
     * @return string|false
     */
    protected function getFileId(\SugarBean $bean)
    {
        $defs = $bean->field_defs['filename'];
        $fileId = false;

        // for modules based on document revisions we have a separate field
        if (isset($defs['fileId'])) {
            $fileIdField = $defs['fileId'];
            if (!empty($bean->$fileIdField)) {
                $fileId = $bean->$fileIdField;
            }
        } else {
            $fileId = $bean->id;
        }
        return $fileId;
    }
}
