<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('custom/modules/DynamicFields/templates/Fields/TemplateDo_not_call_image.php');

/**
 * Implement get_body function to correctly populate the template for the ModuleBuilder/Studio
 * Add field page.
 *
 * @param Sugar_Smarty $ss
 * @param array $vardef
 *
 */
function get_body(&$ss, $vardef)
{
    global $app_list_strings, $mod_strings;
    $vars = $ss->get_template_vars();
    $fields = $vars['module']->mbvardefs->vardefs['fields'];
    $fieldOptions = array();
    foreach ($fields as $id => $def) {
        $fieldOptions[$id] = $def['name'];
    }
    $ss->assign('fieldOpts', $fieldOptions);

    //If there are no colors defined, use black text on
    // a white background
   /* if (isset($vardef['boolattr'])) {
        $boolattr = $vardef['boolattr'];
    } else {
        $boolattr = 'do_not_call';
    }
    $ss->assign('BOOLATTR', $boolattr);
*/
    //$boolsArray = $app_list_strings['boolattrs'];
    //asort($boolsArray);

    //$ss->assign('boolattrs', $boolsrArray);

    //$ss->assign('BOOLATTR', $app_list_strings['boolattrs'][$boolattr]);

    return $ss->fetch('custom/modules/DynamicFields/templates/Fields/Forms/do_not_call_image.tpl');
}

?>