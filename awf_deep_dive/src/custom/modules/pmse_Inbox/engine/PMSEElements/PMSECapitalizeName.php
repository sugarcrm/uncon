<?php

require_once 'modules/pmse_Inbox/engine/PMSEElements/PMSEScriptTask.php';

/**
 * Custom action that capitalizes a name field for a target module
 */
class PMSECapitalizeName extends PMSEScriptTask
{
    /**
     * @inheritDoc
     */
    public function run($flowData, $bean = null, $externalAction = '', $arguments = array())
    {
        $this->capitalizeName($bean);

        $flowAction = $externalAction === 'RESUME_EXECUTION' ? 'UPDATE' : 'CREATE';
        return $this->prepareResponse($flowData, 'ROUTE', $flowAction);
    }

    /**
     * Handles the actual capitalization of the necessary fields
     * @param SugarBean $bean
     */
    protected function capitalizeName(SugarBean $bean)
    {
        if ($bean instanceof SugarBean) {
            foreach ($bean->field_defs as $name => $defs) {
                if ($this->isNameField($defs)) {
                    $fields = $this->getNameFields($defs);
                    foreach ($fields as $field) {
                        $bean->$field = strtoupper($bean->$field);
                    }
                }
            }

            $bean->save();
        }
    }

    /**
     * Gets the field or fields that are name type fields
     * @param array $defs
     * @return array
     */
    protected function getNameFields($defs)
    {
        if (isset($defs['db_concat_fields'])) {
            return $defs['db_concat_fields'];
        }

        if (isset($defs['name'])) {
            return array($defs['name']);
        }

        return array();
    }

    /**
     * Checks to see if a field def is a name type fields
     * @param array $defs
     * @return boolean
     */
    protected function isNameField($defs)
    {
        if (isset($defs['type']) && $defs['type'] === 'name') {
            return true;
        }

        if (isset($defs['type']) && $defs['type'] === 'fullname') {
            return true;
        }

        return false;
    }
}
