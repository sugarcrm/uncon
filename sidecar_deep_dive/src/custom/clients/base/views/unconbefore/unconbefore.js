
({
    initialize: function(options) {

        this._super('initialize', [options]);

        this.meta = this.meta || {};

        console.log('At UnCon %s', this.meta.year);
    },

    _renderHtml: function() {
        this.color = this.meta.color;

        this._super('_renderHtml');
    }
})
