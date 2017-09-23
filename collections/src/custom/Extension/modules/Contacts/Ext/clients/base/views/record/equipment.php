<?php


/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/Resources/Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */

$viewdefs['Contacts']['base']['view']['record']['panels'][1]['fields'][] = array(
    'name' => 'equipment',
    'css_class' => 'equipment',
    'type' => 'equipment',
    'label' => 'Equipment',
    'span' => 12,
    'fields' => array(
        'image',
        'name',
    ),
    'field_display_params' => array(
        'name' => array(),
        'image' => array(
            'height' => 32,
        ),
    ),
);