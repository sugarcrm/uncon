# SugarLogic Examples

Copyright (C) 2015 SugarCRM Inc.

## Dependency Examples

The follow examples would be put in files  in the follow folder `custom/Extension/modules/<module name>/Ext/Dependencies`

### Panel Visibility Example

```php
$dependencies['Accounts']['account_type_show_hide_panel'] = array(
	'hooks' => array("edit","view"),
	'trigger' => 'true',
    'triggerFields' => array('account_type'),  // what field should this be triggered on
	'onload' => true,
	'actions' => array(
		array(
			'name' => 'SetPanelVisibility',  // the action you want to run
			'params' => array(
				'target' => 'panel_hidden',  // name of the panel, can be found in the vardefs.
				'value' => 'equal($account_type, "Investor")',  // the formula to run to determine if the panel should be hidden or not.
			),
		),
	),
);
```

### SetRequired Example

```php
$dependencies['Accounts']['account_type_set_required'] = array(
	'hooks' => array("edit","view"),
	'trigger' => 'true',
    'triggerFields' => array('account_type'), // what field should this be triggered on
	'onload' => true,
	'actions' => array(
		array(
			'name' => 'SetRequired',  // Action to run
			'params' => array(
				'target' => 'parent_name',  // name of field to set required
				'value' => 'equal($account_type, "Investor")', // formula to determine if field should be required or not.
			)
		)
	),
);
```
