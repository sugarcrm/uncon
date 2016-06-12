<?php
// Copyright 2016 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

// Register CLI repair and rebuild command
Sugarcrm\Sugarcrm\Console\CommandRegistry\CommandRegistry::getInstance()
    ->addCommands(array(new Sugarcrm\Sugarcrm\custom\Console\Command\QuickRepairCommand()));
