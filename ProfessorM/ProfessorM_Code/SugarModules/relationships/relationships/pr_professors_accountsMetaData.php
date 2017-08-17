<?php
// created: 2017-08-17 07:43:22
$dictionary["pr_professors_accounts"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'pr_professors_accounts' => 
    array (
      'lhs_module' => 'PR_Professors',
      'lhs_table' => 'pr_professors',
      'lhs_key' => 'id',
      'rhs_module' => 'Accounts',
      'rhs_table' => 'accounts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'pr_professors_accounts_c',
      'join_key_lhs' => 'pr_professors_accountspr_professors_ida',
      'join_key_rhs' => 'pr_professors_accountsaccounts_idb',
    ),
  ),
  'table' => 'pr_professors_accounts_c',
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'type' => 'id',
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'default' => 0,
    ),
    'pr_professors_accountspr_professors_ida' => 
    array (
      'name' => 'pr_professors_accountspr_professors_ida',
      'type' => 'id',
    ),
    'pr_professors_accountsaccounts_idb' => 
    array (
      'name' => 'pr_professors_accountsaccounts_idb',
      'type' => 'id',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'idx_pr_professors_accounts_pk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_pr_professors_accounts_ida1_deleted',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'pr_professors_accountspr_professors_ida',
        1 => 'deleted',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_pr_professors_accounts_idb2_deleted',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'pr_professors_accountsaccounts_idb',
        1 => 'deleted',
      ),
    ),
    3 => 
    array (
      'name' => 'pr_professors_accounts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'pr_professors_accountspr_professors_ida',
        1 => 'pr_professors_accountsaccounts_idb',
      ),
    ),
  ),
);