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

$manifest = array (
  'built_in_version' => '7.5.2.0',
  'acceptable_sugar_versions' => array(
    'regex_matches' => array (
	  '7\.[56]*',
	),
  ),
  'acceptable_sugar_flavors' => 
  array ('ENT','ULT'),
  'readme' => 'NOTE: Please run a full search re-index (delete existing data).',
  'key' => '',
  'author' => '',
  'description' => 'Adds a Contacts Near Me dashlet used to locate nearby contacts',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'Geo Contacts',
  'published_date' => '2015-04-20 04:41:29',
  'type' => 'module',
  'version' => 1429504891,
  'remove_tables' => 'prompt',
);


$installdefs = array (
    'id' => 'geo_contacts',
    'custom_fields' => array(
        'Contactslat_long_c' => array(
            'id' => 'Contactslat_long_c',
            'name' => 'lat_long_c',
            'label' => 'LBL_LAT_LONG_C',
            'comments' => '',
            'help' => '',
            'module' => 'Contacts',
            'type' => 'varchar',
            'max_size' => '255',
            'require_option' => '0',
            'default_value' => '',
            'date_modified' => '2015-04-17 22:49:15',
            'deleted' => '0',
            'audited' => '0',
            'mass_update' => '0',
            'duplicate_merge' => '1',
            'reportable' => '1',
            'importable' => 'true',
            'ext1' => '',
            'ext2' => '',
            'ext3' => '',
            'ext4' => '',
        ),
        'Accountslat_long_c' => array(
            'id' => 'Accountslat_long_c',
            'name' => 'lat_long_c',
            'label' => 'LBL_LAT_LONG_C',
            'comments' => '',
            'help' => '',
            'module' => 'Accounts',
            'type' => 'varchar',
            'max_size' => '255',
            'require_option' => '0',
            'default_value' => '',
            'date_modified' => '2015-04-17 22:49:15',
            'deleted' => '0',
            'audited' => '0',
            'mass_update' => '0',
            'duplicate_merge' => '1',
            'reportable' => '1',
            'importable' => 'true',
            'ext1' => '',
            'ext2' => '',
            'ext3' => '',
            'ext4' => '',
        ),
    ),
    'copy' => array(
        array(
            'from' => '<basepath>/custom/Extension/modules/Contacts/Ext/Vardefs/sugarfield_lat_long_c.php',
            'to' => 'custom/Extension/modules/Contacts/Ext/Vardefs/sugarfield_lat_long_c.php',
        ),
        array(
            'from' => '<basepath>/custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_lat_long_c.php',
            'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_lat_long_c.php',
        ),
        array(
            'from' => '<basepath>/custom/clients/base/api/GeoApi.php',
            'to' => 'custom/clients/base/api/GeoApi.php',
        ),
        array(
            'from' => '<basepath>/custom/clients/base/views/geo-dashlet/geo-dashlet.hbs',
            'to' => 'custom/clients/base/views/geo-dashlet/geo-dashlet.hbs',
        ),
        array(
            'from' => '<basepath>/custom/clients/base/views/geo-dashlet/geo-dashlet.js',
            'to' => 'custom/clients/base/views/geo-dashlet/geo-dashlet.js',
        ),
        array(
            'from' => '<basepath>/custom/clients/base/views/geo-dashlet/geo-dashlet.php',
            'to' => 'custom/clients/base/views/geo-dashlet/geo-dashlet.php',
        ),
        array(
            'from' => '<basepath>/custom/clients/base/views/geo-dashlet/popup.hbs',
            'to' => 'custom/clients/base/views/geo-dashlet/popup.hbs',
        ),
        array(
            'from' => '<basepath>/custom/Extension/application/Ext/LogicHooks/GeoSearch.php',
            'to' => 'custom/Extension/application/Ext/LogicHooks/GeoSearch.php',
        ),
        array(
            'from' => '<basepath>/custom/include/SugarSearchEngine/Elastic/SugarSearchEngineElasticMapping.php',
            'to' => 'custom/include/SugarSearchEngine/Elastic/SugarSearchEngineElasticMapping.php',
        ),
        array(
            'from' => '<basepath>/custom/LogicHooks/GoogleGeoApiClient.php',
            'to' => 'custom/LogicHooks/GoogleGeoApiClient.php',
        ),
    ),
);
