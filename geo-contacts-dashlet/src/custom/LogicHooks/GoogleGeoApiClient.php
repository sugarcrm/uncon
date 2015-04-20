<?php

class GoogleGeoApiClient
{
    protected static $prefixes = array(
        'Company' => 'billing_address',
        'Person' => 'primary_address_'
    );

    protected static $address_fields = array('street', 'city', 'state', 'postalcode', 'country');

    protected static $api_key = '';

    protected static $apiURL = 'https://maps.googleapis.com/maps/api/geocode/json';

    /**
     * @param SugarBean $bean
     * @param           $event
     * @param           $args
     */
    public function lookupLatLong(SugarBean $bean, $event, $args)
    {
        if (empty($bean->field_defs['lat_long_c'])) {
            return;
        }
        $address = $this->getAddress($bean);
        if (!empty($address)) {
            if ($this->hasAddressChanged($bean, $address)) {
                $bean->lat_long_c = $this->getLatLong($address);
            } 
        } else {
            $bean->lat_long_c = "";
        }
    }

    protected function getAddress($bean, $getFetched = false)
    {
        $ret = array();
        $prefix = '';
        foreach (static::$prefixes as $klass => $kPrefix) {
            if ($bean instanceof $klass) {
                $prefix = $kPrefix;
                break;
            }
        }
        foreach (static::$address_fields as $field) {
            $bField = $prefix . $field;
            if ($getFetched) {
                if (isset($bean->fetched_row[$bField])) {
                    $ret[$field] = $bean->fetched_row[$bField];
                }
            } else {
                if (isset($bean->$bField)) {
                    $ret[$field] = $bean->$bField;
                }
            }
        }

        return $ret;
    }

    protected function hasAddressChanged($bean, $newAddress)
    {
        if (empty($bean->id) || !empty($bean->new_with_id)) {
            return true;
        }
        if (!empty($bean->field_defs['lat_long_c']) && empty($bean->lat_long_c)) {
            return true;
        }

        $oldAddress = $this->getAddress($bean, true);
        foreach ($newAddress as $key => $value) {
            if (!isset($oldAddress[$key]) || strcasecmp($newAddress[$key], $oldAddress[$key]) != 0) {
                return true;
            }
        }

        return false;
    }

    protected function getLatLong($address)
    {
        global $sugar_config;
        $address = array_map("urlencode", array_filter($address, function ($value) {
            return !empty($value);
        }));

        $addrString = implode(',', $address);

        if (!empty($sugar_config['google_api_key'])) {
            $api_key = $sugar_config['google_api_key'];
        } else {
            $api_key = static::$api_key;
        }

        $url = static::$apiURL . "?address=$addrString&sensor=false&key=" . $api_key;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        $resp = curl_exec($curl);
        curl_close($curl);
        $data = @json_decode($resp, true);
        if (!empty($data['results'][0]['geometry']['location'])) {
            return $data['results'][0]['geometry']['location']['lat'] . ', ' . $data['results'][0]['geometry']['location']['lng'];
        }

        return '';
    }
}
