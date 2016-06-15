
({
    initialize: function(options) {

        this._super('initialize', [options]);

        this.meta = this.meta || {};

        this.color = this.meta.color || this.meta.color_map[this.meta.year];

        console.log('At UnCon %s', this.meta.year);
    },

    _renderHtml: function() {


        this._super('_renderHtml');
    }
})
