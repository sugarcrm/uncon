<?php

$viewdefs['base']['view']['engagement'] = array(
    'dashlets' => array(
        array(
            // question for attendees: would you do something different for label and description?
            'label' => 'Engagement dashlet (last 60 days)',
            'description' => 'Some awesome description',
            'config' => array(),
            'preview' => array(),
            'filter' => array(
                'module' => array(
                    'Accounts'
                ),
                'view' => array(
                    'record'
                )
            )
        ),
    ),
);

