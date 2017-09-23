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

$viewdefs['base']['view']['events'] = array(
    'dashlets' => array(
        array(
            'label' => 'Events',
            'description' => 'Active and Past Events',
            'config' => array(
                'limit' => 10,
                'visibility' => 'user',
            ),
            'preview' => array(
                'limit' => 10,
                'visibility' => 'user',
            ),
            'filter' => array(
                'module' => array(
                    'Accounts',
                    'Bugs',
                    'Cases',
                    'Contacts',
                    'Home',
                    'Leads',
                    'Opportunities',
                    'Prospects',
                    'RevenueLineItems',
                ),
                'view' => 'record',
            ),
        ),
    ),
    'custom_toolbar' => array(
        'buttons' => array(
            array(
                'type' => 'actiondropdown',
                'no_default_action' => true,
                'icon' => 'fa-plus',
                'buttons' => array(
                    array(
                        'type' => 'dashletaction',
                        'action' => 'createRecord',
                        'params' => array(
                            'module' => 'Tasks',
                            'link' => 'tasks',
                        ),
                        'label' => 'LBL_CREATE_TASK',
                        'acl_action' => 'create',
                        'acl_module' => 'Tasks',
                    ),
                ),
            ),
            array(
                'dropdown_buttons' => array(
                    array(
                        'type' => 'dashletaction',
                        'action' => 'editClicked',
                        'label' => 'LBL_DASHLET_CONFIG_EDIT_LABEL',
                    ),
                    array(
                        'type' => 'dashletaction',
                        'action' => 'refreshClicked',
                        'label' => 'LBL_DASHLET_REFRESH_LABEL',
                    ),
                    array(
                        'type' => 'dashletaction',
                        'action' => 'toggleClicked',
                        'label' => 'LBL_DASHLET_MINIMIZE',
                        'event' => 'minimize',
                    ),
                    array(
                        'type' => 'dashletaction',
                        'action' => 'removeClicked',
                        'label' => 'LBL_DASHLET_REMOVE_LABEL',
                    ),
                ),
            ),
        ),
    ),
    'panels' => array(
        array(
            'name' => 'panel_body',
            'columns' => 2,
            'labelsOnTop' => true,
            'placeholders' => true,
            'fields' => array(
                array(
                    'name' => 'visibility',
                    'label' => 'LBL_DASHLET_CONFIGURE_MY_ITEMS_ONLY',
                    'type' => 'enum',
                    'options' => 'tasks_visibility_options',
                ),
                array(
                    'name' => 'limit',
                    'label' => 'LBL_DASHLET_CONFIGURE_DISPLAY_ROWS',
                    'type' => 'enum',
                    'options' => 'tasks_limit_options',
                ),
            ),
        ),
    ),
    'tabs' => array(
        array(
            'active' => true,
            'filters' => array(
                'status' => array(
                    '$not_in' => array(
                        'Completed',
                        'Deferred',
                    ),
                ),
                'date_end' => array('$lte' => 'today'),
            ),
            'label' => 'LBL_ACTIVE_TASKS_DASHLET_DUE_NOW',
            'order_by' => 'date_end:asc',
            'record_date' => 'date_end',
            'overdue_badge' => array(
                'name' => 'date_due',
                'type' => 'overdue-badge',
                'css_class' => 'pull-right',
            ),
            'fields' => array(
                'name',
                'assigned_user_name',
                'assigned_user_id',
                'date_due',
                'date_end',
            ),
        ),
        array(
            'filters' => array(
                'status' => array(
                    '$not_in' => array(
                        'Completed',
                        'Deferred',
                    ),
                ),
                'date_end' => array('$gt' => 'today'),
            ),
            'label' => 'LBL_ACTIVE_TASKS_DASHLET_UPCOMING',
            'link' => 'tasks',
            'module' => 'Tasks',
            'order_by' => 'date_end:asc',
            'record_date' => 'date_end',
            'overdue_badge' => array(
                'name' => 'date_due',
                'type' => 'overdue-badge',
                'css_class' => 'pull-right',
            ),
            'fields' => array(
                'name',
                'assigned_user_name',
                'assigned_user_id',
                'date_due',
                'date_end',
            ),
        ),
    ),
    'visibility_labels' => array(
        'user' => 'LBL_ACTIVE_TASKS_DASHLET_USER_BUTTON_LABEL',
        'group' => 'LBL_ACTIVE_TASKS_DASHLET_GROUP_BUTTON_LABEL',
    ),
);
