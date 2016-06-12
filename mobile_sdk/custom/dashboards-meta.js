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

//-------------------------------------------------------------------------
// Metadata hacks. For samples only.
// Normally, dashlet metadata is defined on the server-side
// For the sake of simplicity we are hacking metadata on the client-side
// in order to avoid server-side customizations.
// Do not try this at home or in production!!!
//-------------------------------------------------------------------------

var sampleDashboards = [{
    id: '6b19026e-518b-a2eb-9df3-56eaa898866f-sample-1',
    name: 'Sample Home Dashboard',
    dashboard_module: 'Home',
    metadata: {
        components: [
            {
                rows: [
                    [
                        {
                            view: {
                                type: 'todo',
                                label: 'Todo',
                                display_columns: [],
                                limit: 15,
                            },
                        },
                    ]
                ],
            },
        ],
    },
},
];

var app = SUGAR.App;
var dashboards = require('%app.core%/dashboards.js');
var processFetchResults = dashboards._processFetchResults;

dashboards._processFetchResults = function(data) {
    data.push.apply(data, sampleDashboards);
    processFetchResults.apply(dashboards, arguments);
};

_.extend(app.baseMetadata.modules.Home.views, {
    todo: {
        meta: {
            dashlets: [{}],
            panels: [{}],
        },
    },
});
