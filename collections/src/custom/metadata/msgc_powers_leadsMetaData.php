<?php
// created: 2017-09-07 19:31:07
$dictionary["msgc_powers_leads"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'msgc_powers_leads' => 
    array (
      'lhs_module' => 'msgc_Powers',
      'lhs_table' => 'msgc_powers',
      'lhs_key' => 'id',
      'rhs_module' => 'Leads',
      'rhs_table' => 'leads',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'msgc_powers_leads_c',
      'join_key_lhs' => 'msgc_powers_leadsmsgc_powers_ida',
      'join_key_rhs' => 'msgc_powers_leadsleads_idb',
    ),
  ),
  'table' => 'msgc_powers_leads_c',
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
    'msgc_powers_leadsmsgc_powers_ida' => 
    array (
      'name' => 'msgc_powers_leadsmsgc_powers_ida',
      'type' => 'id',
    ),
    'msgc_powers_leadsleads_idb' => 
    array (
      'name' => 'msgc_powers_leadsleads_idb',
      'type' => 'id',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'idx_msgc_powers_leads_pk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_msgc_powers_leads_ida1_deleted',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'msgc_powers_leadsmsgc_powers_ida',
        1 => 'deleted',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_msgc_powers_leads_idb2_deleted',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'msgc_powers_leadsleads_idb',
        1 => 'deleted',
      ),
    ),
    3 => 
    array (
      'name' => 'msgc_powers_leads_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'msgc_powers_leadsmsgc_powers_ida',
        1 => 'msgc_powers_leadsleads_idb',
      ),
    ),
  ),
);