/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

({
    extendsFrom: 'RowactionField',

    initialize: function (options) {
        app.view.invokeParent(this, {type: 'field', name: 'rowaction', method:'initialize', args:[options]});
        this.type = 'rowaction';
    },

    /**
     * Event to trigger Zip code validation
     */
    rowActionSelect: function() {
        this.confirm_zip();
    },

	//Sidecar Lab 2a
    confirm_zip: function() {
    	
    	//another example of getting data from current record using this.model.get(<field>)
    	var currentCity = this.model.get('billing_address_city'); 
    	var currentZip = this.model.get('billing_address_postalcode');
    	
    	//Here we leverage jQuery AJAX functionality to call the Zippopotamus REST API
    	$.ajax({
    		url: 'http://api.zippopotam.us/us/' + currentZip, 
    		success: function(data) {
    			this.zipJSON = data;
    			var city = this.zipJSON.places[0]['place name'];
    	
    			if (city === currentCity)
    			{
    				app.alert.show('address-ok', {
    					level: 'success',
    					messages: 'City and Zip match.',
    					autoClose: true
    				});
    			}
    			else
    			{
    				app.alert.show('address-ok', {
    					level: 'error',
    					messages: 'City and Zip DO NOT MATCH',
    					autoClose: false
    				});
    			}
    		}
    	});
    },

})
