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

$viewdefs['base']['view']['ratings-chart-1'] = array(
    'dashlets' => array(
        array(
            'label' => 'Ratings Distribution Chart 1',
            'description' => 'Uses the Filter Api as datasource',
            'filter' => array(
                'module' => array(
                    'Home',
                ),
                'view' => array(
                    'record',
                )
            ),
            'config' => array(),
            'preview' => array(),
        ),
    ),
);
