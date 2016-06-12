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

'use strict';
let argv = process.argv.slice(2);

const spawnProcess = require('child_process').spawn;
const _ = require('lodash');
const path = require('path');
const fs = require('fs');
const stripJsonComments = require('strip-json-comments');
const versionKey = 'sdkVersion';
const APP_CONFIG_PATH = path.resolve('config', 'app.json');

let sdkVersion;
let helpArgs = ['h', '-h', '/h', '--help', 'help'];

let getSDKPath = () => {
    const version = getSDKVersion();
    if (!process.env.SUGAR_MOBILE_SDK_HOME) {
        console.log(`Specify SUGAR_MOBILE_SDK_HOME env var`);
        process.exit(1);
    } else {
        return path.resolve(process.env.SUGAR_MOBILE_SDK_HOME, version);
    }
};

let getSDKVersion = () => {
    let config = {};

    try {
        config = JSON.parse(stripJsonComments(
            fs.readFileSync(APP_CONFIG_PATH).toString()
        ));
    } catch (error) {
        console.log(`Parse config error ${APP_CONFIG_PATH}`);
        process.exit(1);
    }

    return _.get(config, `defaults.jsConfig.${versionKey}`);
};

if (argv.length && !_.includes(helpArgs, argv[0])) {
    argv = argv.concat(['--app-path', __dirname]);
} else {
    argv = _.chain(argv)
        .difference(helpArgs)
        .union(['--sdk-help'])
        .value();
}

spawnProcess(`./node_modules/.bin/gulp`, argv, {
    cwd: getSDKPath(sdkVersion),
    stdio: 'inherit',
});

