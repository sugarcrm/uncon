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

$viewdefs['msgc_Equipment']['base']['view']['checkout-item'] = array(
    'fields' => array(
        array(
            'name' => 'name',
            'label' => 'LBL_NAME',
            'template' => 'detail',
        ),
        array(
            'name' => 'num_available',
            'label' => 'LBL_NUM_AVAILABLE',
            'template' => 'detail',
            'type' => 'int',
        ),
        array(
            'name' => 'quantity',
            'label' => 'LBL_QUANTITY',
            'type' => 'int',
            'template' => 'edit',
        ),
    )
);
