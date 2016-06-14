({
    extendsFrom: 'CreateView',
    
    initialize: function (options) {
        this._super('initialize', [options]);
        //Sidecar Lab 3 - adding custom validation task
    	this.model.addValidationTask('class_validate', _.bind(this._doValidateClass, this));
        
    },
    
    //Sidecar Lab 3 - custom function that executes and checks if conditions are valid, invoked upon "Save" being clicked
    _doValidateClass: function(fields, errors, callback) {
    	
    	var sic_code = this.model.get('sic_code');
    	var ownership = this.model.get('ownership');
    	var rating = this.model.get('rating');
    	
    	if (!_.isEmpty(sic_code) && (_.isEmpty(ownership) || _.isEmpty(rating)))
    	{
    		this.model.trigger('error:class_validate:ownership'); //Tells Sidecar there is an error, note the shared name "error:class_validate" followed by the fieldname
    		this.model.trigger('error:class_validate:rating');
    		
    		errors['ownership'] = {}; //if this array is blank, the Save process assumes there aren't any validation errors on record, so we have to populate the array to demonstrate a problem
    		errors['ownership']['ERROR_FIELD_REQUIRED'] = false;
    		
    		errors['rating'] = {};
    		errors['rating']['ERROR_FIELD_REQUIRED'] = false;
    	
    		callback(null, fields, errors);
    	
    		app.alert.show('class_validate', {
                    level: 'error',
                    messages: 'Field Cannot Be Blank',
                    autoClose: false
            	});
    	}
    	else
    	{
    		//if conditions do not need to be validated, proceed with normal Save process. Other validations may still kick in
    		callback(null, fields, errors);
    	}
    },
    
    _dispose: function() {
        this._super('_dispose');
    },
})