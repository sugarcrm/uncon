/**
 * Created by ovidiu.g.pop on 3/24/16.
 */

({
    extendsFrom: "FieldsetField",

    events: {
        'click .addButton': 'addRow',
        'click .deleteButton': 'deleteRow',
        'click .addCategory': 'addCategory',
        'click .deleteCategoryButton': 'deleteCategory',
        'change input[name^="label_"]': 'updateLabel',
        'change input[name^="value_"]': 'updateValue',
        'change input[name^="category_"]': 'updateCategory'
    },

    initialize: function (options) {
        this._super('initialize', [options]);
        this.model.on("change:chart_type", this.checkIfGroupedChart, this);

        var inputFieldsArray = this.model.get("inputFieldsArray") || [];
        if (inputFieldsArray.length > 0) {
            this.populateFieldsWithExistingValues();
        } else {
            var category = [
                {
                    show_delete: false,
                    value: "",
                    rows: [
                        {
                            label: "",
                            value: "",
                            display_delete_button: false,
                            parentCategory: 0
                        },
                    ]
                }];
            this.category = category;
        }
        this.hideLastDeleteButton();
        this.checkIfGroupedChartOnInit();
    },

    checkIfGroupedChartOnInit: function () {
        this.groupedChart = false;

        if (this.model.get('chart_type') === 'group by chart' || this.model.get('chart_type') === 'horizontal group by chart') {
            this.groupedChart = true;
        }

        this.render();
    },

    checkIfGroupedChart: function () {
        if (this.model.get('chart_type') === 'group by chart' || this.model.get('chart_type') === 'horizontal group by chart') {
            this.groupedChart = true;
            this.splitFields();
        } else {
            this.groupedChart = false;
            this.savedLabels = [];
            for (var i = 0; i < this.category.length; i++) {
                this.savedLabels.push($('[name="category_' + i + '"]').val());
            }
            this.mergeFields();
        }
        this.render();
    },

    addRow: function (event) {
        var currentCategory = Number(event.currentTarget.dataset.category);
        if (!this.category[currentCategory]) {
            currentCategory = 0;
        }
        this.category[currentCategory].rows.push({
            label: "",
            value: "",
            display_delete_button: true,
            parentCategory: currentCategory
        });
        this.hideLastDeleteButton()
        this.render();
    },

    deleteRow: function (event) {
        var currentRow = Number(this.getCurrentRowNumber(event.currentTarget));
        var currentCategory = Number(event.currentTarget.dataset.category);
        if (!this.category[currentCategory]) {
            currentCategory = 0;
        }
        this.category[currentCategory].rows.splice(currentRow, 1);
        this.hideLastDeleteButton();
        this.render();
    },

    getCurrentRowNumber: function (row) {
        return row.dataset.index;
    },

    hideLastDeleteButton: function () {
        if (this.category.length === 1) {
            this.category[0].show_delete = false;
        } else {
            this.category[0].show_delete = true;
        }
        _.each(this.category, function (category) {
            if (category.rows.length === 1) {
                category.rows[0].display_delete_button = false;
            } else {
                category.rows[0].display_delete_button = true;
            }
        });
    },

    addCategory: function () {
        var newId = this.category.length;
        var newCategory = {
            show_delete: true,
            value: "",
            rows: [
                {
                    label: "",
                    value: "",
                    display_delete_button: false,
                    parentCategory: newId
                },
            ]
        };
        this.category.push(newCategory);
        this.hideLastDeleteButton();
        this.render();
    },

    deleteCategory: function (event) {
        var currentCategory = Number(this.getCurrentRowNumber(event.currentTarget));
        this.category.splice(currentCategory, 1);
        this.hideLastDeleteButton();
        this.render();
    },

    updateLabel: function (event) {
        var currentRow = Number(this.getCurrentRowNumber(event.target));
        var currentCategory = Number(event.currentTarget.dataset.category);
        this.category[currentCategory].rows[currentRow].label = event.target.value;
    },

    updateValue: function (event) {
        var currentRow = Number(this.getCurrentRowNumber(event.target));
        var currentCategory = Number(event.currentTarget.dataset.category);
        this.category[currentCategory].rows[currentRow].value = event.target.value;
    },

    updateCategory: function (event) {
        var currentCategory = Number(this.getCurrentRowNumber(event.target));
        this.category[currentCategory].value = event.currentTarget.value;
    },

    populateFieldsWithExistingValues: function () {
        var self = this;
        var inputFieldsArray = this.model.get("inputFieldsArray") || [];
        this.category = [];
        _.each(inputFieldsArray, function (category, index) {
            var tempRows = [];
            _.each(category.label_value, function (row, j) {
                tempRows.push({
                    label: row.label,
                    value: row.value,
                    display_delete_button: true,
                    parentCategory: index
                });
            })
            var tempCategory = {
                show_delete: true,
                value: category.name,
                rows: tempRows
            };
            self.category.push(tempCategory);
        })
    },

    mergeFields: function () {
        for (var i = 1; i < this.category.length; i++) {
            for (var j = 0; j < this.category[i].rows.length; j++) {
                var temp = this.category[i].rows[j];
                if (this.category[i].rows.length === 1) {
                    temp.display_delete_button = true;
                }
                this.category[0].rows.push(temp);
            }
        }
        this.category = [this.category.shift()];
        this.hideLastDeleteButton();
    },

    splitFields: function () {
        if (this.category.length === 1) {
            var fieldsByCategory = _.groupBy(this.category[0].rows, function (row) {
                return row.parentCategory;
            });
            this.category = [];
            for (var category in fieldsByCategory) {
                category = Number(category);
                var val = "";
                if (this.savedLabels) {
                    val = this.savedLabels[category];
                }
                this.category.push({
                    show_delete: true,
                    value: val,
                    rows: fieldsByCategory[category]
                });
            }
            this.hideLastDeleteButton();
        }
    }
})