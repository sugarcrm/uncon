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
$viewdefs[$module_name]['EditView'] = array(
    'templateMeta' => array('maxColumns' => '2', 
                            'useTabs' => true,
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'), 
                                            array('label' => '10', 'field' => '30'),
                                        ),
),
 'panels' =>array (
  'lbl_contact_information' => 
  array (
    
    array (
      array (
        'name' => 'first_name',
        'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}' 
      . '&nbsp;<input name="first_name"  id="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
      ),
      'phone_work',
    ),
    
    array (
      'last_name',
      'phone_mobile',
    ),
    
    array (
		'title',
      	'phone_home',
    ),
    
    array (
		'department',
      	'phone_other',
    ),
    
    array (
		'',
      	'phone_fax',
    ),
    
    array (
      'assigned_user_name',
    	'do_not_call',
    ),

    array (
      array('name'=>'team_name', 'displayParams'=>array('display'=>true)),
      '',
    ),
    array (
    	'description',
  	),

  ),
  'lbl_email_addresses'=>array(
  	array('email1')
  ),
  'lbl_address_information' => 
  array (
    array (
      array (
	      'name' => 'primary_address_street',
          'hideLabel' => true,      
	      'type' => 'address',
	      'displayParams'=>array('key'=>'primary', 'rows'=>2, 'cols'=>30, 'maxlength'=>150),
      ),
      
      array (
	      'name' => 'alt_address_street',
	      'hideLabel'=>true,
	      'type' => 'address',
	      'displayParams'=>array('key'=>'alt', 'copy'=>'primary', 'rows'=>2, 'cols'=>30, 'maxlength'=>150),      
      ),
    ),  
  ),

)


);
