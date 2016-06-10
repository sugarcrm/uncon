<?php
// Copyright 2016 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.
require_once('custom/commands/QuickRepairCommand.php');
Sugarcrm\Sugarcrm\Console\CommandRegistry\CommandRegistry::getInstance()->addCommands(array(new QuickRepairCommand()));
