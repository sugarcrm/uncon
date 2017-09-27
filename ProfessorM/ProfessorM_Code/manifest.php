<?php

$manifest = array (
  'built_in_version' => '7.9.0.0',
  'acceptable_sugar_versions' =>
  array (
     '7.9.0.0',
     '7.9.1.0',
     '7.9.0.1',
     '7.9.2.0', // Added at Uncon
     '7.10.0.0',  // Added at Uncon
  ),
  'acceptable_sugar_flavors' =>
  array (
     'PRO',  // Added at Uncon
     'ENT',
     'ULT',
  ),
  'readme' => '',
  'key' => 'SUGR',
  'author' => 'SugarCRM',
  'description' => 'Professor M School for Gifted Coders',
  'icon' => '',
  'is_uninstallable' => true,
  'name' => 'ProfessorM',
  'type' => 'module',
  'version' => 1,
  'remove_tables' => 'prompt',
);


$installdefs = array (
  'id' => 'ProfessorM',
  'beans' =>
  array (

    array (
      'module' => 'PR_Professors',
      'class' => 'PR_Professors',
      'path' => 'modules/PR_Professors/PR_Professors.php',
      'tab' => true,
    ),
  ),
  'relationships' =>
  array (
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/pr_professors_accountsMetaData.php',
    ),
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/pr_professors_leadsMetaData.php',
    ),
    array (
      'meta_data' => '<basepath>/SugarModules/relationships/relationships/pr_professors_contactsMetaData.php',
    ),
  ),
  'layoutdefs' =>
  array (

    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/pr_professors_accounts_Accounts.php',
      'to_module' => 'Accounts',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/pr_professors_accounts_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/pr_professors_leads_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/pr_professors_contacts_Contacts.php',
      'to_module' => 'Contacts',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/layoutdefs/pr_professors_contacts_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),
    array (
      'additional_fields' =>
      array (
        'Leads' => 'pr_professors_leads_name',
      ),
    ),
  ),
  'sidecar' =>
  array (

    array (
      'from' => '<basepath>/SugarModules/clients/base/layouts/subpanels/pr_professors_accounts_Accounts.php',
      'to_module' => 'Accounts',
    ),

    array (
      'from' => '<basepath>/SugarModules/clients/base/layouts/subpanels/pr_professors_accounts_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),

    array (
      'from' => '<basepath>/SugarModules/clients/base/layouts/subpanels/pr_professors_leads_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),

    array (
      'from' => '<basepath>/SugarModules/clients/base/layouts/subpanels/pr_professors_contacts_Contacts.php',
      'to_module' => 'Contacts',
    ),

    array (
      'from' => '<basepath>/SugarModules/clients/base/layouts/subpanels/pr_professors_contacts_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),

    array (
      'from' => '<basepath>/SugarModules/clients/mobile/layouts/subpanels/pr_professors_accounts_Accounts.php',
      'to_module' => 'Accounts',
    ),

    array (
      'from' => '<basepath>/SugarModules/clients/mobile/layouts/subpanels/pr_professors_accounts_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),

    array (
      'from' => '<basepath>/SugarModules/clients/mobile/layouts/subpanels/pr_professors_leads_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),

    array (
      'from' => '<basepath>/SugarModules/clients/mobile/layouts/subpanels/pr_professors_contacts_Contacts.php',
      'to_module' => 'Contacts',
    ),

    array (
      'from' => '<basepath>/SugarModules/clients/mobile/layouts/subpanels/pr_professors_contacts_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),
  ),
  'language' =>
  array (

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Accounts.php',
      'to_module' => 'Accounts',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Leads.php',
      'to_module' => 'Leads',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/PR_Professors.php',
      'to_module' => 'PR_Professors',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/language/Contacts.php',
      'to_module' => 'Contacts',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/language/application/en_us.lang.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),
    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fr_FR.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/cs_CZ.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sk_SK.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/et_EE.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/de_DE.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sk_SK.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_CN.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ko_KR.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sk_SK.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nb_NO.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_TW.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ca_ES.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/th_TH.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fi_FI.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pl_PL.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sv_SE.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ar_SA.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fr_FR.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_ES.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sv_SE.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hu_HU.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/uk_UA.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_PT.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lt_LT.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ja_JP.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/th_TH.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_PT.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fi_FI.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sv_SE.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_us.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ro_RO.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lt_LT.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sq_AL.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/et_EE.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sk_SK.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/tr_TR.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/he_IL.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/it_it.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lv_LV.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ro_RO.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/he_IL.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sq_AL.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ko_KR.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hu_HU.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fr_FR.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_PT.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nb_NO.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lv_LV.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/cs_CZ.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sq_AL.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ru_RU.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/bg_BG.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ru_RU.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fr_FR.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ca_ES.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/it_it.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sv_SE.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ru_RU.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_BR.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/th_TH.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_LA.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/cs_CZ.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/bg_BG.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/el_EL.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_us.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/uk_UA.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/el_EL.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_PT.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ar_SA.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/et_EE.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_UK.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pl_PL.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fr_FR.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ko_KR.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ca_ES.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/tr_TR.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pl_PL.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/el_EL.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_LA.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ja_JP.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_us.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/cs_CZ.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pl_PL.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/da_DK.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/bg_BG.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sq_AL.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/he_IL.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lv_LV.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/et_EE.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/el_EL.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ko_KR.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hr_HR.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sv_SE.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ca_ES.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_LA.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_CN.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_PT.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_us.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/bg_BG.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/tr_TR.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hu_HU.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pl_PL.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ru_RU.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nb_NO.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lt_LT.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/he_IL.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/tr_TR.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ja_JP.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hr_HR.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_PT.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ru_RU.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fi_FI.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/el_EL.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/uk_UA.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_us.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/de_DE.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nb_NO.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/da_DK.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_TW.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/it_it.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ja_JP.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sr_RS.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_ES.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/it_it.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ko_KR.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ro_RO.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sk_SK.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_TW.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/de_DE.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nb_NO.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/et_EE.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sk_SK.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lt_LT.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/de_DE.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ja_JP.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ca_ES.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_BR.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nl_NL.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sr_RS.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sr_RS.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ro_RO.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sr_RS.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ca_ES.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/he_IL.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/et_EE.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nb_NO.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lt_LT.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fi_FI.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_us.Professors.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sk_SK.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lv_LV.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_BR.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hu_HU.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_BR.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/cs_CZ.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/it_it.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/it_it.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/it_it.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ro_RO.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_TW.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fi_FI.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_CN.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_LA.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_TW.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sv_SE.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sr_RS.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hr_HR.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ro_RO.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/da_DK.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fi_FI.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lt_LT.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/uk_UA.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nl_NL.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_BR.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/da_DK.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lv_LV.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/de_DE.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ko_KR.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ru_RU.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_UK.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_LA.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sr_RS.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_TW.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ar_SA.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lv_LV.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ar_SA.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sq_AL.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hr_HR.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/et_EE.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hr_HR.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/bg_BG.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fi_FI.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_us.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/et_EE.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/bg_BG.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ru_RU.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_BR.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nb_NO.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lv_LV.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nl_NL.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_UK.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_UK.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/tr_TR.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/de_DE.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_UK.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/bg_BG.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nb_NO.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_PT.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nl_NL.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ja_JP.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sq_AL.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_CN.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/et_EE.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'et_EE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_TW.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ko_KR.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/da_DK.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ca_ES.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_TW.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hr_HR.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hr_HR.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_LA.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ko_KR.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_UK.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/da_DK.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/da_DK.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hr_HR.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/tr_TR.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/cs_CZ.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/tr_TR.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nl_NL.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ar_SA.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sr_RS.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sq_AL.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/uk_UA.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ca_ES.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_UK.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ja_JP.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/el_EL.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_us.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hu_HU.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sv_SE.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/uk_UA.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/it_it.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_CN.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_us.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/cs_CZ.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pl_PL.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_CN.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pl_PL.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_TW.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_TW',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hu_HU.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sk_SK.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_CN.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fr_FR.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_ES.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ar_SA.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/uk_UA.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sq_AL.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lv_LV.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ro_RO.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/cs_CZ.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fr_FR.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/th_TH.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_LA.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_LA.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/it_it.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'it_it',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_BR.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/el_EL.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ca_ES.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ca_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/da_DK.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ro_RO.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lt_LT.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_PT.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ar_SA.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_ES.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hu_HU.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lv_LV.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lv_LV',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lt_LT.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_ES.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hr_HR.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hr_HR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pl_PL.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_BR.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_CN.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sr_RS.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/bg_BG.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_ES.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/th_TH.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/th_TH.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hu_HU.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fi_FI.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_ES.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ro_RO.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ro_RO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sv_SE.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ru_RU.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ar_SA.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nb_NO.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nb_NO',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/th_TH.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/de_DE.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ru_RU.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ru_RU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fi_FI.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fi_FI',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/cs_CZ.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'cs_CZ',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/he_IL.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/de_DE.sugar_account_status_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/tr_TR.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/hu_HU.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'hu_HU',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_ES.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/de_DE.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'de_DE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/el_EL.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/lt_LT.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'lt_LT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/he_IL.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ja_JP.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_UK.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_UK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pl_PL.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pl_PL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ko_KR.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ko_KR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_LA.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_LA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nl_NL.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sq_AL.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sq_AL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nl_NL.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/th_TH.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sk_SK.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sk_SK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_PT.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_PT',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/zh_CN.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'zh_CN',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/es_ES.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'es_ES',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/tr_TR.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'tr_TR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/he_IL.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nl_NL.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/da_DK.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'da_DK',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fr_FR.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sr_RS.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sr_RS',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/el_EL.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'el_EL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/uk_UA.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/uk_UA.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'uk_UA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/fr_FR.sugar_parent_type_display.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'fr_FR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/pt_BR.sugar_lead_source_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'pt_BR',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ja_JP.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ja_JP',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/ar_SA.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'ar_SA',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/sv_SE.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'sv_SE',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/he_IL.sugar_contact_type_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'he_IL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/th_TH.sugar_grading_list.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'th_TH',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_us.sugar_industry_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_us',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/bg_BG.sugar_account_type_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'bg_BG',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/nl_NL.sugar_record_type_display_notes.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'nl_NL',
    ),

    array (
      'from' => '<basepath>/SugarModules/Extension/application/Ext/Language/en_UK.sugar_lead_status_dom.ProfessorMStudioChanges.php',
      'to_module' => 'application',
      'language' => 'en_UK',
    ),
  ),
  'wireless_subpanels' =>
  array (

    array (
      'from' => '<basepath>/SugarModules/relationships/wirelesslayoutdefs/pr_professors_accounts_Accounts.php',
      'to_module' => 'Accounts',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/wirelesslayoutdefs/pr_professors_accounts_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/wirelesslayoutdefs/pr_professors_leads_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/wirelesslayoutdefs/pr_professors_contacts_Contacts.php',
      'to_module' => 'Contacts',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/wirelesslayoutdefs/pr_professors_contacts_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),
  ),
  'image_dir' => '<basepath>/icons',
  'custom_fields' =>
  array (
    'Accountsratesg_c' =>
    array (
      'id' => 'Accountsratesg_c',
      'name' => 'ratesg_c',
      'label' => 'LBL_RATESG',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Accounts',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '0',
      'default_value' => 'A Plus',
      'date_modified' => '2017-08-08 03:35:04',
      'deleted' => '0',
      'audited' => '0',
      'mass_update' => '1',
      'duplicate_merge' => '1',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'grading_list',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Accountsstatus_c' =>
    array (
      'id' => 'Accountsstatus_c',
      'name' => 'status_c',
      'label' => 'LBL_STATUS',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Accounts',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '1',
      'default_value' => 'Active',
      'date_modified' => '2017-08-08 03:21:32',
      'deleted' => '0',
      'audited' => '0',
      'mass_update' => '1',
      'duplicate_merge' => '1',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'account_status_list',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Contactsalias_c' =>
    array (
      'id' => 'Contactsalias_c',
      'name' => 'alias_c',
      'label' => 'LBL_ALIAS',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Contacts',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2017-08-07 23:15:53',
      'deleted' => '0',
      'audited' => '0',
      'mass_update' => '0',
      'duplicate_merge' => '1',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Contactsstatus_c' =>
    array (
      'id' => 'Contactsstatus_c',
      'name' => 'status_c',
      'label' => 'LBL_STATUS',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Contacts',
      'type' => 'enum',
      'max_size' => '100',
      'require_option' => '1',
      'default_value' => 'Prospective Student',
      'date_modified' => '2017-08-07 23:24:52',
      'deleted' => '0',
      'audited' => '0',
      'mass_update' => '1',
      'duplicate_merge' => '1',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => 'contact_type_list',
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
    'Leadsalias_c' =>
    array (
      'id' => 'Leadsalias_c',
      'name' => 'alias_c',
      'label' => 'LBL_ALIAS',
      'comments' => NULL,
      'help' => NULL,
      'module' => 'Leads',
      'type' => 'varchar',
      'max_size' => '255',
      'require_option' => '0',
      'default_value' => NULL,
      'date_modified' => '2017-08-07 22:50:43',
      'deleted' => '0',
      'audited' => '1',
      'mass_update' => '0',
      'duplicate_merge' => '1',
      'reportable' => '1',
      'importable' => 'true',
      'ext1' => NULL,
      'ext2' => NULL,
      'ext3' => NULL,
      'ext4' => NULL,
    ),
  ),
  'vardefs' =>
  array (

    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/pr_professors_accounts_Accounts.php',
      'to_module' => 'Accounts',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/pr_professors_accounts_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/pr_professors_leads_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/pr_professors_leads_Leads.php',
      'to_module' => 'Leads',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/pr_professors_contacts_Contacts.php',
      'to_module' => 'Contacts',
    ),

    array (
      'from' => '<basepath>/SugarModules/relationships/vardefs/pr_professors_contacts_PR_Professors.php',
      'to_module' => 'PR_Professors',
    ),
  ),
  'copy' =>
  array (
    array (
      'from' => '<basepath>/SugarModules/modules/PR_Professors',
      'to' => 'modules/PR_Professors',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Accounts/clients/base/views/list/list.php',
      'to' => 'custom/modules/Accounts/clients/base/views/list/list.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Accounts/clients/base/views/record/record.php',
      'to' => 'custom/modules/Accounts/clients/base/views/record/record.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Accounts/clients/base/filters/default/default.php',
      'to' => 'custom/modules/Accounts/clients/base/filters/default/default.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Contacts/clients/base/views/list/list.php',
      'to' => 'custom/modules/Contacts/clients/base/views/list/list.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Contacts/clients/base/views/record/record.php',
      'to' => 'custom/modules/Contacts/clients/base/views/record/record.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Contacts/clients/base/filters/default/default.php',
      'to' => 'custom/modules/Contacts/clients/base/filters/default/default.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Leads/clients/base/views/list/list.php',
      'to' => 'custom/modules/Leads/clients/base/views/list/list.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Leads/clients/base/views/record/record.php',
      'to' => 'custom/modules/Leads/clients/base/views/record/record.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Leads/clients/base/filters/default/default.php',
      'to' => 'custom/modules/Leads/clients/base/filters/default/default.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Leads/clients/base/layouts/convert-main/convert-main.php',
      'to' => 'custom/modules/Leads/clients/base/layouts/convert-main/convert-main.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/mobile/views/list/list.php',
      'to' => 'custom/modules/Opportunities/clients/mobile/views/list/list.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/mobile/views/detail/detail.php',
      'to' => 'custom/modules/Opportunities/clients/mobile/views/detail/detail.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/mobile/views/edit/edit.php',
      'to' => 'custom/modules/Opportunities/clients/mobile/views/edit/edit.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-accounts-opportunities/subpanel-for-accounts-opportunities.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-accounts-opportunities/subpanel-for-accounts-opportunities.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/list/list.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/list/list.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-leads-opportunity/subpanel-for-leads-opportunity.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-leads-opportunity/subpanel-for-leads-opportunity.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-tags-opportunities_link/subpanel-for-tags-opportunities_link.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-tags-opportunities_link/subpanel-for-tags-opportunities_link.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/selection-list/selection-list.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/selection-list/selection-list.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-meetings-opportunity/subpanel-for-meetings-opportunity.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-meetings-opportunity/subpanel-for-meetings-opportunity.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-revenuelineitems-opportunities/subpanel-for-revenuelineitems-opportunities.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-revenuelineitems-opportunities/subpanel-for-revenuelineitems-opportunities.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/record/record.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/record/record.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-pmse_bpmprocessdefinition-opportunities_locked_fields_link/subpanel-for-pmse_bpmprocessdefinition-opportunities_locked_fields_link.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-pmse_bpmprocessdefinition-opportunities_locked_fields_link/subpanel-for-pmse_bpmprocessdefinition-opportunities_locked_fields_link.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-calls-opportunities/subpanel-for-calls-opportunities.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-calls-opportunities/subpanel-for-calls-opportunities.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-quotes-opportunities/subpanel-for-quotes-opportunities.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-quotes-opportunities/subpanel-for-quotes-opportunities.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-tasks-opportunities/subpanel-for-tasks-opportunities.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-tasks-opportunities/subpanel-for-tasks-opportunities.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-forecastworksheets-opportunity/subpanel-for-forecastworksheets-opportunity.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-forecastworksheets-opportunity/subpanel-for-forecastworksheets-opportunity.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-contacts-opportunities/subpanel-for-contacts-opportunities.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-contacts-opportunities/subpanel-for-contacts-opportunities.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-activities-opportunities/subpanel-for-activities-opportunities.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-activities-opportunities/subpanel-for-activities-opportunities.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-notes-opportunities/subpanel-for-notes-opportunities.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-notes-opportunities/subpanel-for-notes-opportunities.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/dupecheck-list/dupecheck-list.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/dupecheck-list/dupecheck-list.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/views/subpanel-for-products-opportunities/subpanel-for-products-opportunities.php',
      'to' => 'custom/modules/Opportunities/clients/base/views/subpanel-for-products-opportunities/subpanel-for-products-opportunities.php',
    ),

    array (
      'from' => '<basepath>/SugarModules/modules/Opportunities/clients/base/filters/default/default.php',
      'to' => 'custom/modules/Opportunities/clients/base/filters/default/default.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Bugs/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Bugs/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Products/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Products/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Products/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-products-opportunities.php',
      'to' => 'custom/Extension/modules/Products/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-products-opportunities.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Products/Ext/Vardefs/rli_link_workflow.php',
      'to' => 'custom/Extension/modules/Products/Ext/Vardefs/rli_link_workflow.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Products/Ext/Vardefs/sugarfield_revenuelineitem_name.php',
      'to' => 'custom/Extension/modules/Products/Ext/Vardefs/sugarfield_revenuelineitem_name.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Meetings/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Meetings/Ext/Vardefs/rli_link_workflow.php',
      'to' => 'custom/Extension/modules/Meetings/Ext/Vardefs/rli_link_workflow.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Layoutdefs/pr_professors_contacts_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Layoutdefs/pr_professors_contacts_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Layoutdefs/pr_professors_leads_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Layoutdefs/pr_professors_leads_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Layoutdefs/pr_professors_accounts_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Layoutdefs/pr_professors_accounts_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/pt_BR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/pt_BR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/pt_PT.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/pt_PT.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/pl_PL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/pl_PL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/ca_ES.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/ca_ES.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/en_us.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/en_us.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/es_LA.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/es_LA.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/it_it.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/it_it.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/fi_FI.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/fi_FI.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/ro_RO.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/ro_RO.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/ru_RU.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/ru_RU.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/zh_CN.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/zh_CN.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/sk_SK.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/sk_SK.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/uk_UA.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/uk_UA.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/bg_BG.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/bg_BG.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/fr_FR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/fr_FR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/es_ES.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/es_ES.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/ja_JP.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/ja_JP.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/tr_TR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/tr_TR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/ko_KR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/ko_KR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/sq_AL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/sq_AL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/zh_TW.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/zh_TW.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/da_DK.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/da_DK.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/lv_LV.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/lv_LV.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/et_EE.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/et_EE.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/ar_SA.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/ar_SA.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/el_EL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/el_EL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/th_TH.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/th_TH.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/en_UK.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/en_UK.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/lt_LT.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/lt_LT.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/de_DE.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/de_DE.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/he_IL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/he_IL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/nb_NO.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/nb_NO.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/hr_HR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/hr_HR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/nl_NL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/nl_NL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/sr_RS.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/sr_RS.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/sv_SE.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/sv_SE.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/cs_CZ.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/cs_CZ.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Language/hu_HU.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Language/hu_HU.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/WirelessLayoutdefs/pr_professors_contacts_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/WirelessLayoutdefs/pr_professors_contacts_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/WirelessLayoutdefs/pr_professors_leads_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/WirelessLayoutdefs/pr_professors_leads_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/WirelessLayoutdefs/pr_professors_accounts_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/WirelessLayoutdefs/pr_professors_accounts_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/clients/mobile/layouts/subpanels/pr_professors_contacts_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/clients/mobile/layouts/subpanels/pr_professors_contacts_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/clients/mobile/layouts/subpanels/pr_professors_leads_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/clients/mobile/layouts/subpanels/pr_professors_leads_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/clients/mobile/layouts/subpanels/pr_professors_accounts_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/clients/mobile/layouts/subpanels/pr_professors_accounts_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/clients/base/layouts/subpanels/pr_professors_contacts_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/clients/base/layouts/subpanels/pr_professors_contacts_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/clients/base/layouts/subpanels/pr_professors_leads_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/clients/base/layouts/subpanels/pr_professors_leads_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/clients/base/layouts/subpanels/pr_professors_accounts_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/clients/base/layouts/subpanels/pr_professors_accounts_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Vardefs/pr_professors_contacts_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Vardefs/pr_professors_contacts_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Vardefs/pr_professors_leads_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Vardefs/pr_professors_leads_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/PR_Professors/Ext/Vardefs/pr_professors_accounts_PR_Professors.php',
      'to' => 'custom/Extension/modules/PR_Professors/Ext/Vardefs/pr_professors_accounts_PR_Professors.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/RevenueLineItems/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/RevenueLineItems/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/RevenueLineItems/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-revenuelineitems-opportunities.php',
      'to' => 'custom/Extension/modules/RevenueLineItems/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-revenuelineitems-opportunities.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/RevenueLineItems/Ext/Vardefs/rli_vardef.ext.php',
      'to' => 'custom/Extension/modules/RevenueLineItems/Ext/Vardefs/rli_vardef.ext.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contracts/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contracts/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Layoutdefs/pr_professors_contacts_Contacts.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Layoutdefs/pr_professors_contacts_Contacts.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/pt_BR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/pt_BR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/pt_PT.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/pt_PT.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/pl_PL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/pl_PL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/ca_ES.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/ca_ES.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/en_us.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/en_us.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/es_LA.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/es_LA.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/it_it.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/it_it.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/fi_FI.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/fi_FI.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/ro_RO.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/ro_RO.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/ru_RU.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/ru_RU.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/zh_CN.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/zh_CN.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/sk_SK.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/sk_SK.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/uk_UA.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/uk_UA.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/bg_BG.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/bg_BG.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/fr_FR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/fr_FR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/es_ES.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/es_ES.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/ja_JP.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/ja_JP.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/tr_TR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/tr_TR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/ko_KR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/ko_KR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/sq_AL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/sq_AL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/zh_TW.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/zh_TW.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/da_DK.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/da_DK.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/lv_LV.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/lv_LV.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/et_EE.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/et_EE.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/ar_SA.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/ar_SA.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/el_EL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/el_EL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/th_TH.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/th_TH.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/en_UK.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/en_UK.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/lt_LT.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/lt_LT.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/de_DE.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/de_DE.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/he_IL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/he_IL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/nb_NO.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/nb_NO.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/hr_HR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/hr_HR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/nl_NL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/nl_NL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/sr_RS.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/sr_RS.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/sv_SE.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/sv_SE.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/cs_CZ.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/cs_CZ.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Language/hu_HU.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Language/hu_HU.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/WirelessLayoutdefs/pr_professors_contacts_Contacts.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/WirelessLayoutdefs/pr_professors_contacts_Contacts.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/clients/mobile/layouts/subpanels/pr_professors_contacts_Contacts.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/clients/mobile/layouts/subpanels/pr_professors_contacts_Contacts.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-contacts-opportunities.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-contacts-opportunities.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/clients/base/layouts/subpanels/pr_professors_contacts_Contacts.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/clients/base/layouts/subpanels/pr_professors_contacts_Contacts.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Vardefs/pr_professors_contacts_Contacts.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Vardefs/pr_professors_contacts_Contacts.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Vardefs/sugarfield_description.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Vardefs/sugarfield_description.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Vardefs/sugarfield_alias_c.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Vardefs/sugarfield_alias_c.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Vardefs/sugarfield_status_c.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Vardefs/sugarfield_status_c.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Contacts/Ext/Vardefs/sugarfield_lead_source.php',
      'to' => 'custom/Extension/modules/Contacts/Ext/Vardefs/sugarfield_lead_source.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Project/Ext/Layoutdefs/_overrideProject_subpanel_opportunities.php',
      'to' => 'custom/Extension/modules/Project/Ext/Layoutdefs/_overrideProject_subpanel_opportunities.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Project/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Project/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Project/Ext/Vardefs/rli_link_workflow.php',
      'to' => 'custom/Extension/modules/Project/Ext/Vardefs/rli_link_workflow.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Calls/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Calls/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Calls/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-calls-opportunities.php',
      'to' => 'custom/Extension/modules/Calls/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-calls-opportunities.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Calls/Ext/Vardefs/rli_link_workflow.php',
      'to' => 'custom/Extension/modules/Calls/Ext/Vardefs/rli_link_workflow.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Layoutdefs/pr_professors_accounts_Accounts.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Layoutdefs/pr_professors_accounts_Accounts.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/pt_BR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/pt_BR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/pt_PT.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/pt_PT.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/pl_PL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/pl_PL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/ca_ES.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/ca_ES.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/en_us.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/en_us.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/es_LA.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/es_LA.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/it_it.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/it_it.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/fi_FI.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/fi_FI.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/ro_RO.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/ro_RO.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/ru_RU.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/ru_RU.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/zh_CN.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/zh_CN.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/sk_SK.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/sk_SK.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/uk_UA.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/uk_UA.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/bg_BG.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/bg_BG.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/fr_FR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/fr_FR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/es_ES.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/es_ES.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/ja_JP.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/ja_JP.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/tr_TR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/tr_TR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/ko_KR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/ko_KR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/sq_AL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/sq_AL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/zh_TW.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/zh_TW.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/da_DK.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/da_DK.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/lv_LV.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/lv_LV.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/et_EE.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/et_EE.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/ar_SA.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/ar_SA.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/el_EL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/el_EL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/th_TH.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/th_TH.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/en_UK.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/en_UK.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/lt_LT.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/lt_LT.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/de_DE.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/de_DE.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/he_IL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/he_IL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/nb_NO.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/nb_NO.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/hr_HR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/hr_HR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/nl_NL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/nl_NL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/sr_RS.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/sr_RS.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/sv_SE.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/sv_SE.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/cs_CZ.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/cs_CZ.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Language/hu_HU.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Language/hu_HU.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/WirelessLayoutdefs/pr_professors_accounts_Accounts.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/WirelessLayoutdefs/pr_professors_accounts_Accounts.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/clients/mobile/layouts/subpanels/pr_professors_accounts_Accounts.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/clients/mobile/layouts/subpanels/pr_professors_accounts_Accounts.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-accounts-opportunities.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-accounts-opportunities.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/clients/base/layouts/subpanels/pr_professors_accounts_Accounts.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/clients/base/layouts/subpanels/pr_professors_accounts_Accounts.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_shipping_address_city.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_shipping_address_city.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/rli_link_workflow.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/rli_link_workflow.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_shipping_address_state.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_shipping_address_state.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_shipping_address_postalcode.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_shipping_address_postalcode.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_industry.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_industry.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_status_c.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_status_c.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/pr_professors_accounts_Accounts.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/pr_professors_accounts_Accounts.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_billing_address_city.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_billing_address_city.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_billing_address_country.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_billing_address_country.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_ratesg_c.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_ratesg_c.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_billing_address_postalcode.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_billing_address_postalcode.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_rating.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_rating.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_shipping_address_street.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_shipping_address_street.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_billing_address_state.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_billing_address_state.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_account_type.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_account_type.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_employees.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_employees.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_billing_address_street.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_billing_address_street.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Accounts/Ext/Vardefs/sugarfield_shipping_address_country.php',
      'to' => 'custom/Extension/modules/Accounts/Ext/Vardefs/sugarfield_shipping_address_country.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Documents/Ext/Layoutdefs/_overrideDocument_subpanel_opportunities.php',
      'to' => 'custom/Extension/modules/Documents/Ext/Layoutdefs/_overrideDocument_subpanel_opportunities.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Documents/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Documents/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Documents/Ext/Vardefs/rli_link_workflow.php',
      'to' => 'custom/Extension/modules/Documents/Ext/Vardefs/rli_link_workflow.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Cases/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Cases/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Tasks/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Tasks/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Tasks/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-tasks-opportunities.php',
      'to' => 'custom/Extension/modules/Tasks/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-tasks-opportunities.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Tasks/Ext/Vardefs/rli_link_workflow.php',
      'to' => 'custom/Extension/modules/Tasks/Ext/Vardefs/rli_link_workflow.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_date_closed.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_date_closed.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Vardefs/rli_link_workflow.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/rli_link_workflow.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_amount.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_amount.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_closed_revenue_line_items.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_closed_revenue_line_items.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_total_revenue_line_items.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_total_revenue_line_items.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_probability.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_probability.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_sales_status.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_sales_status.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Vardefs/dupe_check.ext.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/dupe_check.ext.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_commit_stage.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_commit_stage.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_worst_case.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_worst_case.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_sales_stage.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_sales_stage.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_date_closed_timestamp.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_date_closed_timestamp.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_best_case.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Vardefs/sugarfield_best_case.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Opportunities/Ext/Dependencies/opp_disable_dep.ext.php',
      'to' => 'custom/Extension/modules/Opportunities/Ext/Dependencies/opp_disable_dep.ext.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/pt_BR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/pt_BR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/pt_PT.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/pt_PT.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/pl_PL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/pl_PL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/ca_ES.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/ca_ES.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/en_us.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/en_us.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/es_LA.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/es_LA.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/it_it.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/it_it.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/fi_FI.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/fi_FI.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/ro_RO.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/ro_RO.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/ru_RU.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/ru_RU.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/zh_CN.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/zh_CN.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/sk_SK.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/sk_SK.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/uk_UA.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/uk_UA.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/bg_BG.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/bg_BG.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/fr_FR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/fr_FR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/es_ES.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/es_ES.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/ja_JP.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/ja_JP.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/tr_TR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/tr_TR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/ko_KR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/ko_KR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/sq_AL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/sq_AL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/zh_TW.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/zh_TW.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/da_DK.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/da_DK.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/lv_LV.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/lv_LV.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/et_EE.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/et_EE.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/ar_SA.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/ar_SA.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/el_EL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/el_EL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/th_TH.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/th_TH.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/en_UK.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/en_UK.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/lt_LT.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/lt_LT.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/de_DE.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/de_DE.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/he_IL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/he_IL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/nb_NO.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/nb_NO.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/hr_HR.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/hr_HR.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/nl_NL.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/nl_NL.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/sr_RS.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/sr_RS.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/sv_SE.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/sv_SE.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/cs_CZ.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/cs_CZ.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Language/hu_HU.Professors.php.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Language/hu_HU.Professors.php.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Vardefs/sugarfield_status.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Vardefs/sugarfield_status.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Vardefs/sugarfield_description.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Vardefs/sugarfield_description.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Vardefs/sugarfield_alias_c.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Vardefs/sugarfield_alias_c.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Vardefs/sugarfield_lead_source.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Vardefs/sugarfield_lead_source.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Leads/Ext/Vardefs/pr_professors_leads_Leads.php',
      'to' => 'custom/Extension/modules/Leads/Ext/Vardefs/pr_professors_leads_Leads.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Campaigns/Ext/Layoutdefs/_overrideCampaign_subpanel_opportunities.php',
      'to' => 'custom/Extension/modules/Campaigns/Ext/Layoutdefs/_overrideCampaign_subpanel_opportunities.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Campaigns/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Campaigns/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Notes/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Notes/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-notes-opportunities.php',
      'to' => 'custom/Extension/modules/Notes/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-notes-opportunities.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Notes/Ext/Vardefs/rli_link_workflow.php',
      'to' => 'custom/Extension/modules/Notes/Ext/Vardefs/rli_link_workflow.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Quotes/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
      'to' => 'custom/Extension/modules/Quotes/Ext/Language/en_us.ProfessorMStudioChanges.lang.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Quotes/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-quotes-opportunities.php',
      'to' => 'custom/Extension/modules/Quotes/Ext/clients/base/layouts/subpanels/_overridesubpanel-for-quotes-opportunities.php',
    ),

    array (
      'from' => '<basepath>/Extension/modules/Quotes/Ext/Vardefs/rli_link_workflow.php',
      'to' => 'custom/Extension/modules/Quotes/Ext/Vardefs/rli_link_workflow.php',
    ),
  ),
  'roles' =>
  array (
  ),
);
