({
    extendsFrom: 'RecordView', 
    zipJSON: {},
    
    //Sidecar Lab 2
    delegateButtonEvents: function() {
    	app.view.invokeParent(this, {type: 'view', name: 'record', method: 'delegateButtonEvents', args: []});
    	
        this.context.on('button:confirm_zip:click', this.confirm_zip, this);
    },
    
    //Sidecar Lab 2
    confirm_zip: function() {
    	
    	var AcctID = this.model.get('id'); //another example of getting data from current record using this.model.get(<field>)
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
    
    _dispose: function() {
        this._super('_dispose');
    },
})