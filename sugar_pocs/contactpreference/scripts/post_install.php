<?php
if (! defined('sugarEntry') || ! sugarEntry) die('Not A Valid Entry Point');

echo "Once this page is finished loading go back to the Home page and refresh the browser. This will be done automatically in the future.<br/><br/>";

function post_install() {
  $autoexecute = false; //execute the SQL
  $show_output = true; //output to the screen
  require_once("modules/Administration/QuickRepairAndRebuild.php");
  $randc = new RepairAndClear();
  $randc->repairAndClearAll(array('clearAll','clearMetadataAPICache'), array(translate('LBL_ALL_MODULES')), $autoexecute,$show_output);
}
