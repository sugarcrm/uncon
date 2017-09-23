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

$dictionary["Lead"]["fields"]["equip_powers"] = array(
    'name' => 'equip_powers',
    'type' => 'collection',
    'vname' => 'Equipment and Powers',
    'links' => array(
        'msgc_powers_leads',
        [
            'name' => 'leads_msgc_equipment_1',
            'filter' => [
                ['num_availible' => ['$gt' => 0]],
            ],
            'field_map' => array(
                'date_end' => 'date_due',
            ),
        ],
    ),
    'filters' => [
        [
            'id' => 'super_powers',
            'filter_definition' => [['tag' => ['$in' => ['Super']]]],
        ],
    ],
    'fields' => array(
        'name',
        'description',
    ),
    'source' => 'non-db',
);