<?php
// created: 2017-09-07 01:55:14
$dictionary["msgc_equipment_contacts"] = array (
  'true_relationship_type' => 'many-to-many',
  'relationships' => 
  array (
    'msgc_equipment_contacts' => 
    array (
      'lhs_module' => 'msgc_Equipment',
      'lhs_table' => 'msgc_equipment',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'msgc_equipment_contacts_c',
      'join_key_lhs' => 'msgc_equipment_contactsmsgc_equipment_ida',
      'join_key_rhs' => 'msgc_equipment_contactscontacts_idb',
    ),
  ),
  'table' => 'msgc_equipment_contacts_c',
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
    'msgc_equipment_contactsmsgc_equipment_ida' => 
    array (
      'name' => 'msgc_equipment_contactsmsgc_equipment_ida',
      'type' => 'id',
    ),
    'msgc_equipment_contactscontacts_idb' => 
    array (
      'name' => 'msgc_equipment_contactscontacts_idb',
      'type' => 'id',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'idx_msgc_equipment_contacts_pk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'idx_msgc_equipment_contacts_ida1_deleted',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'msgc_equipment_contactsmsgc_equipment_ida',
        1 => 'deleted',
      ),
    ),
    2 => 
    array (
      'name' => 'idx_msgc_equipment_contacts_idb2_deleted',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'msgc_equipment_contactscontacts_idb',
        1 => 'deleted',
      ),
    ),
    3 => 
    array (
      'name' => 'msgc_equipment_contacts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'msgc_equipment_contactsmsgc_equipment_ida',
        1 => 'msgc_equipment_contactscontacts_idb',
      ),
    ),
  ),
);