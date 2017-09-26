<?php
/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/Resources/Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM ficheckout-headerpanele.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */

$viewdefs['msgc_Equipment']['base']['layout']['checkout-item'] = array(
    'components' => array(
        array(
            'layout' => array(
                'type' => 'default',
                'name' => 'sidebar',
                'components' => array(
                    array(
                        'layout' => array(
                            'type' => 'base',
                            'name' => 'main-pane',
                            'css_class' => 'main-pane span8',
                            'components' => array(
                                array(
                                    'view' => 'checkout-headerpane',
                                ),
                                array(
                                    'view' => 'checkout-item',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
