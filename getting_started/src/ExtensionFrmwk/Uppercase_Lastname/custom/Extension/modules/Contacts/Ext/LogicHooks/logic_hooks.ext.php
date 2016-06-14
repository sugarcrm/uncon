<?php

	$hook_version = 1; 
	$hook_array = array(); 

	$hook_array['before_save'] = array();
	$hook_array['before_save'][] = array(1, 'Uppercase the Last Name', 'custom/modules/Contacts/UpperLastName.php', 'UpperLastName', 'ChangeLastName');
 
?>