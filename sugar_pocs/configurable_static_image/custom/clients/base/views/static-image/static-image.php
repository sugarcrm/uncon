<?php

/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/06_Customer_Center/10_Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */

$viewdefs['base']['view']['static-image'] = array(
    'dashlets' => array(
        array(
            'label' => 'LBL_STATIC_IMAGE',
            'description' => 'LBL_STATIC_IMAGE_DESC',
            'config' => array(
                'static_image' => '',
                'url' => ''
            ),
            'preview' => array(),
            'filter' => array(
            ),
        ),
    ),
    'panels' => array(
        array(
            'name' => 'dashlet_settings',
            'columns' => 2,
            'labelsOnTop' => true,
            'placeholders' => true,
            'fields' => array(
                array(
                    'name' => 'static_image',
                    'label' => 'LBL_STATIC_IMAGE_IMAGE',
                    'type' => 'dashletImage',
                    'width' => '250px',
                    'height' => '250px',
                    'required' => true
                ),
                array(
                    'name' => 'url',
                    'label' => 'LBL_STATIC_IMAGE_URL',
                    'type' => 'url'
                ),
                array(
                    'name' => 'width',
                    'label' => 'LBL_WIDTH',
                    'type' => 'decimal'
                ),
                array(
                    'name' => 'height',
                    'label' => 'LBL_HEIGHT',
                    'type' => 'decimal'
                ),
            ),
        ),
    ),
    'custom_toolbar' => array(
        "buttons" => array(
            array(
                "type" => "dashletaction",
                "css_class" => "dashlet-toggle btn btn-invisible minify",
                "icon" => "fa-chevron-up",
                "action" => "toggleMinify",
                "tooltip" => "LBL_DASHLET_TOGGLE",
            ),
            array(
                "dropdown_buttons" => array(
                    array(
                        "type" => "dashletaction",
                        "action" => "editClicked",
                        "label" => "LBL_DASHLET_CONFIG_EDIT_LABEL",
                    ),
                    array(
                        "type" => "dashletaction",
                        "action" => "refreshClicked",
                        "label" => "LBL_DASHLET_REFRESH_LABEL",
                    ),
                    array(
                        "type" => "dashletaction",
                        "action" => "customRemoveClicked",
                        "label" => "LBL_DASHLET_REMOVE_LABEL",
                    ),
                )
            )
        )
    )
);
