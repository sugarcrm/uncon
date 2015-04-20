<?php
require_once('include/SugarSearchEngine/Elastic/SugarSearchEngineElasticMapping.php');

/**
 *
 * Custom type mapper for Elastic Index Mapping types
 *
 */
class CustomSugarSearchEngineElasticMapping extends SugarSearchEngineElasticMapping
{
    public function getFtsTypeFromDef($fieldDef)
    {
        if ($fieldDef['name'] == 'lat_long_c') {
            return array('type' => 'geo_point');
        }

        return parent::getFtsTypeFromDef($fieldDef);
    }
}
