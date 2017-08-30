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

const fs = require('fs');
const path = require('path');

const getSdkPath = version => {
    if (!process.env.SUGAR_MOBILE_SDK_HOME) {
        throw new Error('Please specify SUGAR_MOBILE_SDK_HOME environment variable.');
    }

    const SUGAR_MOBILE_SDK_HOME = path.resolve(process.env.SUGAR_MOBILE_SDK_HOME);
    const SDK_PATH = path.resolve(SUGAR_MOBILE_SDK_HOME, version);

    try {
        fs.accessSync(SDK_PATH);
    } catch (error) {
        throw new Error(
            `SugarCRM Mobile SDK '${version}' not found in '${SUGAR_MOBILE_SDK_HOME}' or you don't have access to.`
        );
    }

    return SDK_PATH;
};

const getSdkVersion = () => JSON.parse(
    fs.readFileSync(path.resolve(__dirname, 'package.json')).toString()
).sdkVersion;

module.exports = () => getSdkPath(getSdkVersion());
