<?php
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

class msgc_EquipmentModuleApi extends ModuleApi
{
    public function registerApiRest()
    {
        return array(
            'create' => array(
                'reqType' => 'POST',
                'path' => array('msgc_Equipment'),
                'pathVars' => array(''),
                'method' => 'createEquipmentRecord',
                'shortHelp' => 'This method creates a new record of equipment',
                'longHelp' => 'include/api/help/module_post_help.html',
            ),
            'update' => array(
                'reqType' => 'PUT',
                'path' => array('msgc_Equipment','?'),
                'pathVars' => array('','record'),
                'method' => 'updateEquipmentRecord',
                'shortHelp' => 'This method updates a record of equipment',
                'longHelp' => 'include/api/help/module_record_put_help.html',
            ),
        );
    }

    /**
     * To create an equipment record, setting the intial value of num)available.
     *
     * @param ServiceBase $api
     * @param array $args
     * @return array
     */
    public function createEquipmentRecord(ServiceBase $api, array $args)
    {
        $args['module'] = 'msgc_Equipment';
        if (!isset($args['num_available']) || $args['num_available'] == '') {
            $args['num_available'] = $args['total'];
        }
        $bean = $this->createBean($api, $args);
        $data = $this->formatBeanAfterSave($api, $args, $bean);

        return $data;
    }

    /**
     * To check if the requested equipment quantity is available
     * @param SugarBean $bean
     * @param array $args
     * @return bool
     * @throws SugarApiExceptionInvalidParameter
     */
    protected function checkAvailabilty(SugarBean $bean, array $args)
    {
        // anything wrong?
        if ($bean->num_available > $args['quantity']) {
            return true;
        } else {
            throw new SugarApiExceptionInvalidParameter('Requested quantity not available');
        }
    }

    /**
     * Override the parent function to habdle requested quantity
     * @param SugarBean $bean
     * @param ServiceBase $api
     * @param array $args
     * @return string
     */
    protected function updateBean(SugarBean $bean, ServiceBase $api, array $args)
    {
        $this->populateBean($bean, $api, $args);
        if ($this->checkAvailabilty($bean, $args)) {
            $bean->num_available -= $args['quantity'];
        }
        $this->saveBean($bean, $api, $args);

        return $bean->id;
    }

    /**
     * Update the record
     * @param ServiceBase $api
     * @param array $args
     * @return array
     */
    public function updateEquipmentRecord(ServiceBase $api, array $args)
    {
        $args['module'] = 'msgc_Equipment';
        return parent::updateRecord($api, $args);
    }
}
