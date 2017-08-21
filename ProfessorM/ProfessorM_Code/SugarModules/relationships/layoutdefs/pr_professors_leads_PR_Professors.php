<?php
 // created: 2017-08-17 07:43:22
$layout_defs["PR_Professors"]["subpanel_setup"]['pr_professors_leads'] = array (
  'order' => 100,
  'module' => 'Leads',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PR_PROFESSORS_LEADS_FROM_LEADS_TITLE',
  'get_subpanel_data' => 'pr_professors_leads',
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
