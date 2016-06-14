<?php

class UpperLastName {

	function ChangeLastName($bean, $args, $events)
	{
		$last = $bean->last_name;
		$last = strtoupper($last);
		
		$bean->last_name = $last;
	}
}

?>