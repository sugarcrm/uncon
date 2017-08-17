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

 // $Id: listviewdefs.php 17488 2006-11-06 23:14:29Z wayne $
$module_name = 'PR_Professors';
$listViewDefs[$module_name] = array(
	'NAME' => array(
        'width' => '20',
		'label' => 'LBL_NAME', 
		'link' => true,
		'orderBy' => 'last_name',
        'default' => true,
        'related_fields' => array('first_name', 'last_name', 'salutation'),
		), 
	'TITLE' => array(
        'width' => '15',
		'label' => 'LBL_TITLE',
        'default' => true), 
	'PHONE_WORK' => array(
        'width' => '15',
		'label' => 'LBL_OFFICE_PHONE',
        'default' => true),
	'EMAIL1' => array(
        'width' => '15',
		'label' => 'LBL_EMAIL_ADDRESS',
		'sortable' => false,
		'link' => true,
		'customCode' => '{$EMAIL1_LINK}{$EMAIL1}</a>',
        'default' => true
		),  
    'DO_NOT_CALL' => array(
        'width' => '10', 
        'label' => 'LBL_DO_NOT_CALL'),
    'PHONE_HOME' => array(
        'width' => '10', 
        'label' => 'LBL_HOME_PHONE'),
    'PHONE_MOBILE' => array(
        'width' => '10', 
        'label' => 'LBL_MOBILE_PHONE'),
    'PHONE_OTHER' => array(
        'width' => '10', 
        'label' => 'LBL_WORK_PHONE'),
    'PHONE_FAX' => array(
        'width' => '10', 
        'label' => 'LBL_FAX_PHONE'),
    'ADDRESS_STREET' => array(
        'width' => '10', 
        'label' => 'LBL_PRIMARY_ADDRESS_STREET'),
    'ADDRESS_CITY' => array(
        'width' => '10', 
        'label' => 'LBL_PRIMARY_ADDRESS_CITY'),
    'ADDRESS_STATE' => array(
        'width' => '10', 
        'label' => 'LBL_PRIMARY_ADDRESS_STATE'),
    'ADDRESS_POSTALCODE' => array(
        'width' => '10', 
        'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE'),
    'DATE_ENTERED' => array(
        'width' => '10', 
        'label' => 'LBL_DATE_ENTERED'),
    'CREATED_BY_NAME' => array(
        'width' => '10', 
        'label' => 'LBL_CREATED'),
    'TEAM_NAME' => array(
        'width' => '10', 
        'label' => 'LBL_TEAM',
        'default' => false),
);
