<?php
$manifest = array (
    'built_in_version' => '7.*',
    'acceptable_sugar_versions' =>
    array (
        0 => '',
    ),
    'acceptable_sugar_flavors' =>  array (  
		'ULT', 'ENT'
    ),
    'author' => '',
    'description' => 'Provides ability to visually see contact preference of a record',
    'icon' => '',
    'is_uninstallable' => 'true',
    'name' => 'Contact Preference Package',
    'published_date' => '2016-05-14 07:20:56',
    'type' => 'module',
    'version' => '5',
);

$installdefs = array (
    'id' => 'dnc_image',
    'copy' => array (
        0 =>
            array (
                'from' => '<basepath>/custom',
                'to' => 'custom',
            ),
    ),
    'language' => array(
        array(
            'from' => '<basepath>/Language/Contacts/en_us.custfields.php',
            'to_module' => 'Contacts',
            'language' => 'en_us'
        ),
    ),'custom_fields' => array(
        //DNC Image
        array(
            'name' => 'dnc_image_c',
            'label' => 'LBL_DNC_IMAGE',
            'type' => 'do_not_call_image',
            'module' => 'Contacts',
            'default' => NULL,
            'required' => false, // true or false
            'reportable' => false, // true or false
            'audited' => false, // true or false
            'importable' => 'true', // 'true', 'false', 'required'
            'duplicate_merge' => false, // true or false
        ),
        //DropDown
        array(
            'name' => 'pref_c',
            'label' => 'LBL_PREF',
            'type' => 'enum',
            'module' => 'Contacts',
            'ext1' => 'contact_methods_list', //maps to options - specify list name
            'default_value' => 'PHONE', //key of entry in specified list
            'mass_update' => false, // true or false
            'required' => false, // true or false
            'reportable' => false, // true or false
            'audited' => false, // true or false
            'importable' => 'true', // 'true', 'false' or 'required'
            'duplicate_merge' => false, // true or false
        ),
    ),
);
?>