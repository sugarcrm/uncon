<?php
 // created: 2017-08-08 10:33:48
$layout_defs["PR_Professors"]["subpanel_setup"]['pr_professors_accounts'] = array (
  'order' => 100,
  'module' => 'Accounts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PR_PROFESSORS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'get_subpanel_data' => 'pr_professors_accounts',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
