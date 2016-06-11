<?php
foreach ($js_groupings as $key => $groupings) {
    foreach ($groupings as $target) {
        if ($target == 'include/javascript/pmse.designer.min.js') {
            // Map the name of your custom JS file to the index here
            // It can be named whatever you want and can be stored wherever you want
            $js_groupings[$key]['custom/include/javascript/pmse/activity.js'] = 'include/javascript/pmse.designer.min.js';
        }
        break;
    }
}
