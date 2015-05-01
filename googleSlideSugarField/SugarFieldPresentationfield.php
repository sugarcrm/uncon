<?php

require_once('include/SugarFields/Fields/Base/SugarFieldBase.php');
require_once('data/SugarBean.php');

class SugarFieldPresentationfield extends SugarFieldBase
{
    //this function is called to format the field before saving.  For example we could put code in here
    // to check spelling or to change the case of all the letters
    public function save(&$bean, $params, $field, $properties, $prefix = '')
    {
        $GLOBALS['log']->debug("SugarFieldPresentationfield::save() function called.");
        parent::save($bean, $params, $field, $properties, $prefix);
    }
}
