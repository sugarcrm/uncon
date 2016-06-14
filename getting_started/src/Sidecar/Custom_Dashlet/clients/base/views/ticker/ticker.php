<?php

$viewdefs['base']['view']['ticker'] = array(
    'dashlets' => array(
        array(
            'label' => 'LBL_DASHLET_TICKER_NAME',
            'description' => 'LBL_DASHLET_TICKER_DESC',
            'config' => array(
                'limit' => '3',
            ),
            'preview' => array(
                'limit' => '3',
            ),
            'filter' => array(
                'module' => array(
                    'Accounts',
                ),
                'view' => 'record'
            ),
        ),
    ), 
);
?>