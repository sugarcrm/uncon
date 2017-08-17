<?php
if (isset($dependencies['Opportunities'])) {
    foreach(
        array('commit_stage_readonly_set_value','best_worst_sales_stage_read_only','likely_case_copy_when_closed')
        as $dep
    ) {
        if (isset($dependencies['Opportunities'][$dep])) {
            unset($dependencies['Opportunities'][$dep]);
        }
    }

    // the `set_base_rate` dependency needs to use 'sales_status' here
    if (isset($dependencies['Opportunities']['set_base_rate'])) {
        $dependencies['Opportunities']['set_base_rate']['triggerFields'] = array('sales_status');
        $dependencies['Opportunities']['set_base_rate']['actions'][0]['params']['value'] =
            'ifElse(isForecastClosed($sales_status), $base_rate, currencyRate($currency_id))';
    }
}