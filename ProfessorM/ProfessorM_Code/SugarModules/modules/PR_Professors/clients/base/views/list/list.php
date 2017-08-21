<?php
$module_name = 'PR_Professors';
$viewdefs[$module_name] = 
array (
  'base' => 
  array (
    'view' => 
    array (
      'list' => 
      array (
        'panels' => 
        array (
          0 => 
          array (
            'label' => 'LBL_PANEL_DEFAULT',
            'fields' => 
            array (
              0 => 
              array (
                'name' => 'full_name',
                'type' => 'fullname',
                'fields' => 
                array (
                  0 => 'salutation',
                  1 => 'first_name',
                  2 => 'last_name',
                ),
                'link' => true,
                'label' => 'LBL_LIST_NAME',
                'enabled' => true,
                'default' => true,
              ),
              1 => 
              array (
                'name' => 'alias',
                'label' => 'LBL_ALIAS',
                'enabled' => true,
                'default' => true,
              ),
              2 => 
              array (
                'name' => 'hiredate',
                'label' => 'LBL_HIREDATE',
                'enabled' => true,
                'default' => true,
              ),
              3 => 
              array (
                'name' => 'status',
                'label' => 'LBL_STATUS',
                'enabled' => true,
                'default' => true,
              ),
              4 => 
              array (
                'name' => 'assigned_user_name',
                'label' => 'LBL_ASSIGNED_TO',
                'enabled' => true,
                'id' => 'ASSIGNED_USER_ID',
                'link' => true,
                'default' => true,
              ),
              5 => 
              array (
                'name' => 'date_modified',
                'enabled' => true,
                'default' => true,
              ),
              6 => 
              array (
                'name' => 'date_entered',
                'enabled' => true,
                'default' => true,
              ),
              7 => 
              array (
                'name' => 'email',
                'label' => 'LBL_EMAIL_ADDRESS',
                'link' => true,
                'default' => false,
                'enabled' => true,
              ),
              8 => 
              array (
                'name' => 'phone_work',
                'label' => 'LBL_OFFICE_PHONE',
                'default' => false,
                'enabled' => true,
              ),
              9 => 
              array (
                'name' => 'primary_address_city',
                'label' => 'LBL_PRIMARY_ADDRESS_CITY',
                'default' => false,
                'enabled' => true,
              ),
              10 => 
              array (
                'name' => 'primary_address_state',
                'label' => 'LBL_PRIMARY_ADDRESS_STATE',
                'default' => false,
                'enabled' => true,
              ),
            ),
          ),
        ),
      ),
    ),
  ),
);
