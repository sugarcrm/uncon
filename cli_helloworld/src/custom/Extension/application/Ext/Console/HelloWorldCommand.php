<?php
// Copyright 2016 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

// Register HelloWorldCommand
Sugarcrm\Sugarcrm\Console\CommandRegistry\CommandRegistry::getInstance()
    ->addCommand(new Sugarcrm\Sugarcrm\custom\Console\Command\HelloWorldCommand());
