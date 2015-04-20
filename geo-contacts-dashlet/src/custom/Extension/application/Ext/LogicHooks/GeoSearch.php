<?php

$hook_array['before_save'][] = array(
    1,
    'geo',
    'custom/LogicHooks/GoogleGeoApiClient.php',
    'GoogleGeoApiClient',
    'lookupLatLong',
);
