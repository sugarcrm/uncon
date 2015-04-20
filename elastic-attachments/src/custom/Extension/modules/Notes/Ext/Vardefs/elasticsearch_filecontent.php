<?php
/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/06_Customer_Center/10_Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */

// Enforce async indexing as attachments can take some time
// and we don't want to perform such operations inline
$dictionary['Note']['full_text_search_async'] = true;

// Enable file field
$dictionary['Note']['fields']['filename']['full_text_search'] = array(
    'enabled' => true,
    'searchable' => true,
);

