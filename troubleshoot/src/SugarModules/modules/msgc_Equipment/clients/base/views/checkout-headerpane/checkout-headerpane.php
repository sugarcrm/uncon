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

$viewdefs['msgc_Equipment']['base']['view']['checkout-headerpane'] = array(
    'template' => 'list-headerpane',
    'fields' => array(
        array(
            'name' => 'title',
            'type' => 'label',
            'default_value' => 'LBL_CHECKOUT',
        ),
    ),
    'buttons' => array(
        array(
            'name' => 'cancel_checkout_button',
            'type' => 'button',
            'label' => 'LBL_CANCEL_BUTTON_LABEL',
            'css_class' => 'btn-invisible btn-link',
            'events' => array(
                'click' => 'button:cancel_checkout_button:click',
            ),
        ),
        array(
            'name' => 'checkout_button',
            'type' => 'button',
            'events' => array(
                'click' => 'button:checkout_button:click',
            ),
            'label' => 'LBL_CHECKOUT',
            'css_class' => 'btn btn-primary',
            'acl_action' => 'edit',
        ),
    ),
);