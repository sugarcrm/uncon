({
    plugins: ['Dashlet'],
    
    initDashlet: function (){
        this.model.on('change:ticker_symbol', this.loadData, this);
    },
    
    loadData: function (options) { 
        if(_.isUndefined(this.model)){
            return;
        }
        var ticker = this.model.get("ticker_symbol");
        
        //console.log(this.model);
        //console.log(this.model.fields);
        //console.log(this.model.get("ticker_symbol"));
        
        if (_.isEmpty(ticker)) {
            return;
        }
        
        var baseURL = "https://www.google.com/finance/info?client=ig&q=" + ticker;
        
        $.ajax({
            url: baseURL,
            dataType: 'jsonp',
            success: function (data) { 
                if (this.disposed) {
                    return;
                }
                
                data = data[0];
				
                _.extend(this, data);
                this.render();
            },
            context: this,
            complete: options ? options.complete : null
        });
    }
})