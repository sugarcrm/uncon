<?php
foreach ($js_groupings as $key => $groupings) {
    foreach ($groupings as $target) {
        if ($target == 'include/javascript/pmse.designer.min.js') {
            // Map the name of your custom JS file to the index here
            $js_groupings[$key]['custom/include/javascript/pmse/activity.js'] = $target;
        }

        break;
    }
}
