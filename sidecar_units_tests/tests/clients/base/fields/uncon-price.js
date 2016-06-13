describe('Base.Field.UnconPrice', function() {

    var app, field, fieldDef;

    beforeEach(function() {
        app = SugarTest.app;
        SugarTest.loadComponent('base', 'field', 'base');
        fieldDef = {expensive_limit: 50, cheap_limit: 20};
        field = SugarTest.createField('base', 'price', 'uncon-price', 'edit', fieldDef);
    });

    afterEach(function() {
        sinon.collection.restore();
        app.cache.cutAll();
        Handlebars.templates = {};
    });

    // Simple example
    describe('isExpensive', function() {
        it('should return true if the price exceeds the expensive limit', function () {
            field.def.expensive_limit = 15;
            field.value = 20;

            expect(field.isExpensive()).toBe(true);

            field.def.expensive_limit = 25;

            expect(field.isExpensive()).toBe(false);
        });
    });

    // Using a data-provider
    describe('isCheap', function() {
        using('different values and metadata cheap limit', [
            {
                cheap_limit: 50,
                value: 70,
                expectedIsCheap: false,
            },
            {
                cheap_limit: 50,
                value: 40,
                expectedIsCheap: true,
            },
            {
                cheap_limit: 20,
                value: 20,
                expectedIsCheap: true,
            },
        ], function(data) {
            it('should return true if the value is lower or equal to the cheap limit', function() {
                field.def.cheap_limit = data.cheap_limit;
                field.value = data.value;

                var isCheap = field.isCheap();

                expect(isCheap).toBe(data.expectedIsCheap);
            });
        });
    });

    describe('render', function() {
        it('should decorate the field accordingly to its value', function() {
            sinon.collection.stub(field, 'decorate');
            // var decorateStub = sinon.collection.stub(field, 'decorate');

            field.render();

            expect(field.decorate).toHaveBeenCalledOnce();
            // expect(decorateStub).toHaveBeenCalledOnce();
        });
    });

    describe('decorate', function() {
        using('an expensive price or not', [
            {
                isExpensive: true,
                redExpected: true,
            },
            {
                isExpensive: false,
                redExpected: false,
            },
        ], function(data) {
            it('should highlight the field in red if the price is expensive', function() {
                sinon.collection.stub(field, 'isExpensive').returns(data.isExpensive);

                expect(field.$el.hasClass('highlighted-red')).toBe(false);

                field.decorate();

                expect(field.isExpensive).toHaveBeenCalledOnce();
                expect(field.$el.hasClass('highlighted-red')).toBe(data.redExpected);
            });
        });

        using('a cheap price or not', [
            {
                isCheap: true,
                isExpensive: false,
                greenExpected: true,
                smileyExpected: true
            },
            {
                isCheap: false,
                isExpensive: false,
                greenExpected: false,
                smileyExpected: false
            },
        ], function(data) {
            it('should highlight the field in green if the price is cheap', function() {
                sinon.collection.stub(field, 'isCheap').returns(data.isCheap);

                expect(field.$el.hasClass('highlighted-green')).toBe(false);

                field.decorate();

                expect(field.isCheap).toHaveBeenCalledOnce();
                expect(field.$el.hasClass('highlighted-green')).toBe(data.greenExpected);
            });

            it('should add a happy smiley next to the value if the price is cheap', function() {
                sinon.collection.stub(field, 'isCheap').returns(data.isCheap);
                sinon.collection.spy(field, '_addSmiley');

                expect(field.$('i .fa-smile-o').length).toEqual(0);

                field.decorate();

                expect(field._addSmiley.calledOnce).toBe(data.smileyExpected);
                expect(field.$('i.fa-smile-o').length > 0).toBe(data.smileyExpected);
            });
        });
    });
});
