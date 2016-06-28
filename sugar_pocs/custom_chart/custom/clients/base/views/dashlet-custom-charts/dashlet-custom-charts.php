<?php
/**
 * Created by PhpStorm.
 * User: sergiuprecup
 * Date: 3/14/16
 * Time: 5:38 PM
 */

$viewdefs['base']['view']['dashlet-custom-charts'] = array(
    'dashlets' => array(
        array(
            'label' => 'Custom Charts',
            'description' => 'Create custom charts with user input data',
            'config' => array(
                'chart_type' => 'pie chart'
            ),
            'preview' => array(),
            'filter' => array()
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
                    'name' => 'chart_type',
                    'label' => 'LBL_CHART_CONFIG_CHART_TYPE',
                    'type' => 'enum',
                    'sort_alpha' => true,
                    'ordered' => true,
                    'searchBarThreshold' => -1,
                    'options' => 'd3_chart_types',
                ),
                array(),
                array(
                    'name' => 'custom_field',
                    'type' => 'custom-row-field',
                    'span' => 12,
                ),
            ),
        ),
    ),

    'chart' => array(
        'name' => 'chart',
        'label' => 'LBL_CHART',
        'type' => 'custom-chart-field',
        'view' => 'detail'
    )
);