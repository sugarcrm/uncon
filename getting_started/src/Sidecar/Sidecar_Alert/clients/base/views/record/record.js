({
    extendsFrom: 'RecordView',
    
    //Sidecar Lab 1
    _renderHtml: function () {
        this._super('_renderHtml');
        this.doShowAlert();
    },
    
    //Sidecar Lab 1
    doShowAlert: function() {
    	
    	var dLastMod = this.model.get('date_modified'); //this.model.get(<field>) is used to retrieve data
    	var dCurrent = app.date.format(new Date(), 'm/d/Y');
    	var dDiff = this.calcAge(dCurrent, dLastMod);
    	
    	if (dDiff !== 'NaN' && dDiff > 30)
    	{
    		app.alert.show('last-modified', {
    			level: 'error', 
    			title: app.lang.get('LBL_TOUCH_ERR', this.module), 
    			messages: dDiff,
    			autoClose: false
    		}); //Standard alert mechanism, level can also be: success, confirm, warning
    	}
    	 
    },
    
    //Sidecar Lab 1
    calcAge: function(dCurrent, dMod){	
        var date1 = new Date(dCurrent);
        var date2 = new Date(dMod);

        var ageDiff = 0;

        if (date1 != 'NaN' && date2 != 'NaN')
        {
            ageDiff = this.getDateDiff(date1, date2);
        }
        return ageDiff;		
	},
	
	//Sidecar Lab 1
	getDateDiff: function(date1, date2){
		var base = 1000 * 60 * 60 * 24;
		
		var utc1 = Date.UTC(date1.getFullYear(), date1.getMonth(), date1.getDate());
  		var utc2 = Date.UTC(date2.getFullYear(), date2.getMonth(), date2.getDate());

  		return Math.floor((utc1 - utc2) / base);
	},
	
	_dispose: function() {
        this._super('_dispose');
    },
})