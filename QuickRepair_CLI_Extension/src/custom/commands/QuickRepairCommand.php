<?php
// Copyright 2016 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.
use Sugarcrm\Sugarcrm\Console\CommandRegistry\Mode\InstanceModeInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

require_once('modules/Administration/QuickRepairAndRebuild.php');

/**
 *
 * Simple Quick Repair command example
 *
 */
class QuickRepairCommand extends Command implements InstanceModeInterface
{


    protected function repair()
    {
        $repair = new RepairAndClear();
        $repair->repairAndClearAll(array('clearAll'), array(translate('LBL_ALL_MODULES')), true, false, '');
        //remove the js language files
        LanguageManager::removeJSLanguageFiles();
        //remove language cache files
        LanguageManager::clearLanguageCache();
    }

    /**
     * {inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('dev:repair')
            ->setDescription('Run Quick Repair and Rebuild')
        ;
    }

    /**
     * {inheritdoc}
     *
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("<info>Starting Quick Repair...</info>");
        $this->repair();
        $output->writeln("<fg=green;options=bold>Complete.</>");
    }


}

