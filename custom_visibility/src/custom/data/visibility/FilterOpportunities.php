<?php
// Copyright 2016 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

use Sugarcrm\Sugarcrm\Elasticsearch\Provider\Visibility\StrategyInterface as ElasticStrategyInterface;
use Sugarcrm\Sugarcrm\Elasticsearch\Provider\Visibility\Visibility;
use Sugarcrm\Sugarcrm\Elasticsearch\Analysis\AnalysisBuilder;
use Sugarcrm\Sugarcrm\Elasticsearch\Mapping\Mapping;
use Sugarcrm\Sugarcrm\Elasticsearch\Adapter\Document;

/**
 *
 * Custom visibility class for Opportunities module:
 *
 * This demo allows to restrict access to opportunity records based on the
 * user's role and configured filtered sales stages.
 *
 * The following $sugar_config parameters are available:
 *
 * $sugar_config['custom']['visibility']['opportunities']['target_role']
 *  This parameter takes a string containing the role name for which
 *  the filtering should apply.
 *
 * $sugar_config['custom']['visibility']['opportunities']['filter_sales_stages']
 *  This parameters takes an array of filtered sales stages. If current user is
 *  member of the above configured role, then the opportunities with the sale
 *  stages as configured in this array will be inaccessible.
 *
 *
 * Example configuration given that 'Demo Visibility' role exists (config_override.php):
 *
 * $sugar_config['custom']['visibility']['opportunities']['target_role'] = 'Demo Visibility';
 * $sugar_config['custom']['visibility']['opportunities']['filter_sales_stages'] = array('Closed Won', 'Closed Lost');
 *
 */
class FilterOpportunities extends SugarVisibility implements ElasticStrategyInterface
{
    /**
     * The target role name
     * @var string
     */
    protected $targetRole = '';

    /**
     * Filtered sales stages
     * @var array
     */
    protected $filterSalesStages = array();

    /**
     * {@inheritdoc}
     */
    public function __construct(SugarBean $bean, $params = null)
    {
        parent::__construct($bean, $params);

        $config = SugarConfig::getInstance();
        $this->targetRole = $config->get(
            'custom.visibility.opportunities.target_role',
            $this->targetRole
        );
        $this->filterSalesStages = $config->get(
            'custom.visibility.opportunities.filter_sales_stages',
            $this->filterSalesStages
        );
    }

    /**
     * Overwrite parent method, SugarVisibility::addVisibilityWhere
     *
     * Add visibility, i.e. condition, clauses to the WHERE part of the query
     *
     * This demo function adds new condition to where clause when sales_stage is NOT IN the list of $this->filterSalesStages
     *
     * @param string $query
     * @return string, the updated $query with visibility where clause
     */
    public function addVisibilityWhere(&$query)
    {
        // check if visibility is applicable
        if (!$this->isSecurityApplicable()) {
            return $query;
        }

        // create where clause for sales_stage
        $whereClause = sprintf(
            "%s.sales_stage NOT IN (%s)",
            $this->getTableAlias(),
            implode(',', array_map(array($this->bean->db, 'quoted'), $this->filterSalesStages))
        );

        // add to query
        if (!empty($query)) {
            $query .= " AND $whereClause ";
        } else {
            $query = $whereClause;
        }

        return $query;
    }

    /**
     * Overwrite parent method, SugarVisibility::addVisibilityWhereQuery
     *
     * Add visibility, i.e. condition, clauses to the WHERE part of SugarQuery
     *
     * @param SugarQuery $query
     * @param array $options
     * @return SugarQuery, the updated $sugarQuery with visibility where clause
     */
    public function addVisibilityWhereQuery(SugarQuery $sugarQuery, $options = array()) {
        // create where clause
        $where = null;
        $this->addVisibilityWhere($where, $options);

        // add the where clause to $sugarQuery's where part
        // there is nothing to add if $where is empty
        if (!empty($where)) {
            $sugarQuery->where()->addRaw($where);
        }

        return $sugarQuery;
    }

    /**
     * Check if we can apply our security model
     * @param User $user
     * @return false|User
     */
    protected function isSecurityApplicable(User $user = null)
    {
        $user = $user ?: $this->getCurrentUser();

        if (!$user) {
            return false;
        }

        if (empty($this->targetRole) || empty($this->filterSalesStages)) {
            return false;
        }

        if (!is_string($this->targetRole) || !is_array($this->filterSalesStages)) {
            return false;
        }

        if (!$this->isUserMemberOfRole($this->targetRole, $user)) {
            return false;
        }

        if ($user->isAdminForModule("Opportunities")) {
            return false;
        }

        return $user;
    }

    /**
     * Get current user
     * @return false|User
     */
    protected function getCurrentUser()
    {
        return empty($GLOBALS['current_user']) ? false : $GLOBALS['current_user'];
    }

    /**
     * Check if given user has a given role assigned
     * @param string $targetRole Name of the role
     * @param User $user
     * @return boolean
     */
    protected function isUserMemberOfRole($targetRole, User $user)
    {
        $roles = ACLRole::getUserRoleNames($user->id);
        return in_array($targetRole, $roles) ? true : false;
    }

    /**
     * Get table alias
     * @return string
     */
    protected function getTableAlias()
    {
        $tableAlias = $this->getOption('table_alias');
        if (empty($tableAlias)) {
            $tableAlias = $this->bean->table_name;
        }
        return $tableAlias;
    }

    /**
     * Implementation of ElasticStrategyInterface interface
     *
     * Create elastic analyzer for the field, 'visibility_sales_stage', which is introduced $this->elasticBuildMapping().
     * Leave the function empty if you don't need special analyzer.
     *
     * For more information about elastic analyzer, please visit https://www.elastic.co/guide/en/elasticsearch/guide/current/analysis-intro.html
     *
     * @param Sugarcrm\Sugarcrm\Elasticsearch\Analysis\AnalysisBuilder $analysisBuilder, analysis builder
     * @param Sugarcrm\Sugarcrm\Elasticsearch\Provider\Visibility\Visibility $provider, Elasticsearch Visibility Provider
     */
    public function elasticBuildAnalysis(AnalysisBuilder $analysisBuilder, Visibility $provider)
    {
        // no special analyzers needed
    }

    /**
     * Implementation of ElasticStrategyInterface interface
     *
     * Build Elasticsearch mapping, which defines how a document's fields are stored and indexed in Elastic engine
     *
     * This demo function adds a new not-analyzed field, 'visibility_sales_stage', to Elastic engine
     *
     * @param Sugarcrm\Sugarcrm\Elasticsearch\Mapping\Mapping $mapping
     * @param Sugarcrm\Sugarcrm\Elasticsearch\Provider\Visibility\Visibility $provider, Elasticsearch Visibility Provider
     */
    public function elasticBuildMapping(Mapping $mapping, Visibility $provider)
    {
        $mapping->addNotAnalyzedField('visibility_sales_stage');
    }

    /**
     * Implementation of ElasticStrategyInterface interface
     *
     * Process document before it has been indexed,
     * it populates the document data fields with corresponding SugarBean fields
     *
     * This demo function populates the sales_stage into our explicit filter field 'visibility_sales_stage'
     *
     * @param Sugarcrm\Sugarcrm\Elasticsearch\Adapter\Document $document
     * @param SugarBean $bean
     * @param Sugarcrm\Sugarcrm\Elasticsearch\Provider\Visibility\Visibility $provider, Elasticsearch Visibility Provider
     */
    public function elasticProcessDocumentPreIndex(Document $document, \SugarBean $bean, Visibility $provider)
    {
        // populate the sales_stage into our explicit filter field
        $sales_stage = isset($bean->sales_stage) ? $bean->sales_stage : '';
        $document->setDataField('visibility_sales_stage', $sales_stage);
    }

    /**
     * Implementation of ElasticStrategyInterface interface
     *
     * Get Bean index fields to be indexed
     *
     * This demo function adds field, 'sales_stage', to be indexed
     *
     * @param string $module, Sugar module name
     * @param Sugarcrm\Sugarcrm\Elasticsearch\Provider\Visibility\Visibility $provider, Elasticsearch Visibility Provider
     * @return array, array of bean fields to be indexed
     */
    public function elasticGetBeanIndexFields($module, Visibility $provider)
    {
        // make sure to pull sales_stage regardless of search
        return array('sales_stage');
    }

    /**
     * Implementation of ElasticStrategyInterface interface
     *
     * Add visibility filters
     *
     * This demo function adds elastic filter with condition 'filter_sales_stages' NOT IN $this->filterSalesStages
     *
     * @param User $user, the user who requests data
     * @param \Elastica\Filter\Bool $filter, elastic bool filter
     * @param Sugarcrm\Sugarcrm\Elasticsearch\Provider\Visibility\Visibility $provider, Elasticsearch Visibility Provider
     */
    public function elasticAddFilters(User $user, \Elastica\Filter\Bool $filter, Visibility $provider)
    {
        if (!$this->isSecurityApplicable($user)) {
            return;
        }

        // apply elastic filter to exclude the given sales stages
        $filter->addMustNot($provider->createFilter(
            'OpportunitySalesStages',
            array(
                'filter_sales_stages' => $this->filterSalesStages,
            )
        ));
    }
}
