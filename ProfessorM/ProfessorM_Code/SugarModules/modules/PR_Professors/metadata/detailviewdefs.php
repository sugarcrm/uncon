<?php
/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/Resources/Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */
$module_name = 'PR_Professors';
$viewdefs[$module_name]['DetailView'] = array(
'templateMeta' => array('form' => array('buttons'=>array('EDIT', 'DUPLICATE', 'DELETE', 'FIND_DUPLICATES', 
                                                        ),
                                       ),
                        'useTabs' => true,
                        'maxColumns' => '2', 
                        'widths' => array(
                                        array('label' => '10', 'field' => '30'), 
                                        array('label' => '10', 'field' => '30')
                                        ),
                        ),
'panels' =>array (
  
  array (
    
    array (
      'name' => 'full_name',
	  'label' => 'LBL_NAME',
    ),
    
    //'full_name',
    array (
      'name' => 'phone_work',
    ),
  ),
  
  array (
    'title',
    
    array (
      'name' => 'phone_mobile',
    ),
  ),
  
  array (
	'department',
    
    array (
      'name' => 'phone_home',
      'label' => 'LBL_HOME_PHONE',
    ),
  ),
  
  array (
	NULL,
    array (
      'name' => 'phone_other',
      'label' => 'LBL_OTHER_PHONE',
    ),
  ),

  array (
	array (
      'name' => 'date_entered',
      'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
      'label' => 'LBL_DATE_ENTERED',
    ),
    array (
      'name' => 'phone_fax',
      'label' => 'LBL_FAX_PHONE',
    ),
  ),

  array (
     array (
      'name' => 'date_modified',
      'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
      'label' => 'LBL_DATE_MODIFIED',
    ),
    'do_not_call',
  ),
  array('assigned_user_name', ''),
  
  array( 
    'team_name',
    'email1'),

  array (
      array (
	      'name' => 'primary_address_street',
	      'label'=> 'LBL_PRIMARY_ADDRESS',
	      'type' => 'address',
	      'displayParams'=>array('key'=>'primary'),
      ),
      array (
	      'name' => 'alt_address_street',
	      'label'=> 'LBL_ALT_ADDRESS',
	      'type' => 'address',
	      'displayParams'=>array('key'=>'alt'),
      ),
  ),
  
  array (
    'description',
  ),

)
 
);
?>