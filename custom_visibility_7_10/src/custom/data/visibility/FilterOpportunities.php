<?php
// Copyright 2017 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

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
     * {@inheritdoc}
     */
    public function addVisibilityWhere(&$query)
    {
        if (!$this->isSecurityApplicable()) {
            return $query;
        }

        $whereClause = sprintf(
            "%s.sales_stage NOT IN (%s)",
            $this->getTableAlias(),
            implode(',', array_map(array($this->bean->db, 'quoted'), $this->filterSalesStages))
        );

        if (!empty($query)) {
            $query .= " AND $whereClause ";
        } else {
            $query = $whereClause;
        }

        return $query;
    }

    /**
     * {@inheritdoc}
     */
    public function addVisibilityWhereQuery(SugarQuery $sugarQuery, $options = array()) {
        $where = null;
        $this->addVisibilityWhere($where, $options);
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
     * {@inheritdoc}
     */
    public function elasticBuildAnalysis(AnalysisBuilder $analysisBuilder, Visibility $provider)
    {
        // no special analyzers needed
    }

    /**
     * {@inheritdoc}
     */
    public function elasticBuildMapping(Mapping $mapping, Visibility $provider)
    {
        $mapping->addNotAnalyzedField('visibility_sales_stage');
    }

    /**
     * {@inheritdoc}
     */
    public function elasticProcessDocumentPreIndex(Document $document, \SugarBean $bean, Visibility $provider)
    {
        // populate the sales_stage into our explicit filter field
        $sales_stage = isset($bean->sales_stage) ? $bean->sales_stage : '';
        $document->setDataField('visibility_sales_stage', $sales_stage);
    }

    /**
     * {@inheritdoc}
     */
    public function elasticGetBeanIndexFields($module, Visibility $provider)
    {
        // make sure to pull sales_stage regardless of search
        return array('sales_stage');
    }

    /**
     * {@inheritdoc}
     */
    public function elasticAddFilters(User $user, Elastica\Query\BoolQuery $filter,
                                      Sugarcrm\Sugarcrm\Elasticsearch\Provider\Visibility\Visibility $provider)
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
