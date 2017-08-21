<?php
// created: 2017-08-08 10:35:57
$viewdefs = array (
  'Leads' => 
  array (
    'base' => 
    array (
      'layout' => 
      array (
        'convert-main' => 
        array (
          'modules' => 
          array (
            0 => 
            array (
              'copyData' => true,
              'required' => true,
              'moduleName' => 'Students',
              'module' => 'Contacts',
              'duplicateCheckOnStart' => true,
              'fieldMapping' => 
              array (
              ),
              'hiddenFields' => 
              array (
                'account_name' => 'Accounts',
              ),
            ),
            1 => 
            array (
              'copyData' => true,
              'required' => true,
              'moduleName' => 'Super Groups',
              'module' => 'Accounts',
              'duplicateCheckOnStart' => true,
              'duplicateCheckRequiredFields' => 
              array (
                0 => 'name',
              ),
              'contactRelateField' => 'account_name',
              'fieldMapping' => 
              array (
                'name' => 'account_name',
                'billing_address_street' => 'primary_address_street',
                'billing_address_city' => 'primary_address_city',
                'billing_address_state' => 'primary_address_state',
                'billing_address_postalcode' => 'primary_address_postalcode',
                'billing_address_country' => 'primary_address_country',
                'shipping_address_street' => 'primary_address_street',
                'shipping_address_city' => 'primary_address_city',
                'shipping_address_state' => 'primary_address_state',
                'shipping_address_postalcode' => 'primary_address_postalcode',
                'shipping_address_country' => 'primary_address_country',
                'phone_office' => 'phone_work',
              ),
            ),
            2 => 
            array (
              'module' => 'PR_Professors',
              'required' => false,
              'copyData' => true,
              'duplicateCheckOnStart' => true,
              'moduleName' => 'Professors',
            ),
            3 => 
            array (
              'copyData' => true,
              'required' => false,
              'moduleName' => 'Donations',
              'module' => 'Opportunities',
              'duplicateCheckOnStart' => false,
              'duplicateCheckRequiredFields' => 
              array (
                0 => 'account_id',
              ),
              'fieldMapping' => 
              array (
                'name' => 'opportunity_name',
                'phone_work' => 'phone_office',
              ),
              'dependentModules' => 
              array (
                'Accounts' => 
                array (
                  'fieldMapping' => 
                  array (
                    'account_id' => 'id',
                  ),
                ),
              ),
              'hiddenFields' => 
              array (
                'account_name' => 'Accounts',
              ),
            ),
          ),
        ),
      ),
    ),
  ),
);