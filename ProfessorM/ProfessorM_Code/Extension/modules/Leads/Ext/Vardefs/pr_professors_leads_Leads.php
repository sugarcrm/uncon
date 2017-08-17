<?php
// created: 2017-08-08 10:33:48
$dictionary["Lead"]["fields"]["pr_professors_leads"] = array (
  'name' => 'pr_professors_leads',
  'type' => 'link',
  'relationship' => 'pr_professors_leads',
  'source' => 'non-db',
  'module' => 'PR_Professors',
  'bean_name' => false,
  'side' => 'right',
  'vname' => 'LBL_PR_PROFESSORS_LEADS_FROM_LEADS_TITLE',
  'id_name' => 'pr_professors_leadspr_professors_ida',
  'link-type' => 'one',
);
$dictionary["Lead"]["fields"]["pr_professors_leads_name"] = array (
  'name' => 'pr_professors_leads_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PR_PROFESSORS_LEADS_FROM_PR_PROFESSORS_TITLE',
  'save' => true,
  'id_name' => 'pr_professors_leadspr_professors_ida',
  'link' => 'pr_professors_leads',
  'table' => 'pr_professors',
  'module' => 'PR_Professors',
  'rname' => 'full_name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Lead"]["fields"]["pr_professors_leadspr_professors_ida"] = array (
  'name' => 'pr_professors_leadspr_professors_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_PR_PROFESSORS_LEADS_FROM_LEADS_TITLE_ID',
  'id_name' => 'pr_professors_leadspr_professors_ida',
  'link' => 'pr_professors_leads',
  'table' => 'pr_professors',
  'module' => 'PR_Professors',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
