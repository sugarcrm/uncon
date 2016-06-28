({
    fieldTag: 'textarea',
    _defaultSettings: {max_display_chars: 450, collapsed: true},
    collapsed: undefined,
    _settings: {},
    plugins: ['EllipsisInline'],
    events: {'click [data-action=toggle]': 'toggleCollapsed', 'click a[data-action=custom_email]' : 'sendEmail'},
    initialize: function (options) {
        this._super('initialize', [options]);
        this._initSettings();
        this.collapsed = this._settings.collapsed;

        this.model.on('change:pref_c', this.render, this);
    },
    _initSettings: function () {
        this._settings = _.extend({}, this._defaultSettings, this.def && this.def.settings || {});
        return this;
    },
    setMode: function (name) {
        var isList = (this.tplName === 'list') && _.contains(['edit', 'disabled'], name), mode = isList && this.view.name !== 'merge-duplicates' ? this.tplName : name;
        this._super('setMode', [mode]);
    },
    format: function (value) {
        //if it is shown in a list view we hide the last 3 columns, because those are there only for the fields functionality
        if ($("th[data-fieldname=do_not_call]").length) {
            var columnNr = $("th[data-fieldname=do_not_call]").parent().find("th").length;
            var table = $("th[data-fieldname=do_not_call]").parent().parent().parent();
            _.each($(table).find("tr").find('td:eq(' + (columnNr-1) +'),th:eq(' + (columnNr-1) +'),' +
                'td:eq(' + (columnNr-2) +'),th:eq(' + (columnNr-2) +'),' +
                'td:eq(' + (columnNr-3) +'),th:eq(' + (columnNr-3) +')'), function(el){
                $(el).hide();
            });
        }

        if (this.tplName !== 'edit') {
            var max = this._settings.max_display_chars;
            value = {long: value};
            if (value.long && value.long.length > max) {
                value.short = value.long.substr(0, max).trim();
            }
        }

        //DNC IMG Code
        var field_val = false;

        //IMG COLOR based on DNC
        if (this.model.has("do_not_call")) {
            field_val = this.model.get("do_not_call");
        } else if (this.model.has("do_not_call_c")) {
            field_val = this.model.get("do_not_call_c");
        } else {
            field_val = null;
        }

        this.def.email = '';
        this.def.name = '';

        if (this.model.has("email")){
            var email = this.model.get('email');
            if (!_.isUndefined(email[0])) {
                this.def.email = email[0].email_address;
            }
        }

        if (this.model.has("name")){
            this.def.name = this.model.get('name');
        }

        this.def.dnc = false;
        this.def.color = "#000000";
        if(field_val !== null) {
            if (field_val) {
                this.def.color = "#FF0101";
                this.def.dnc = true;
            } else if (!field_val) {
                this.def.color = "#106610";
            }
        }
        //End IMG COLOR based on DNC

        //IMG IMG based on pref
        this.def.icon = "fa-phone-square";
        if (this.model.has("pref_c")) {
            field_val = this.model.get("pref_c");
        } else {
            field_val = null;
        }
        if(field_val !== null) {
            switch (field_val) {
                case "PHONE":
                    this.def.icon = "fa-phone";
                    break;
                case "MOBILE":
                    this.def.icon = "fa-mobile";
                    break;
                case "EMAIL":
                    this.def.icon = "fa-envelope";
                    break;
                case "OFFICE":
                    this.def.icon = "fa-building";
                    break;
                case "FAX":
                    this.def.icon = "fa-fax";
                    break;
                case "SMS":
                    this.def.icon = "fa-comments";
                    break;
                case "GOOGLE":
                    this.def.icon = "fa-google";
                    break;
                case "SKYPE":
                    this.def.icon = "fa-skype";
                    break;
                default:
                    this.def.icon = "fa-phone"; //"fa-question-circle";
                    break;
            }
        }
        //End IMG based on pref
        //End DNC Img Code

        return value;
    },
    toggleCollapsed: function () {
        this.collapsed = !this.collapsed;
        this.render();
    },
    unformat: function (value) {
        return value;
    },
    sendEmail: function(event) {
        app.drawer.open({
            layout:'compose',
            context:{
                create: true,
                module:'Emails',
                prepopulate: {
                    to_addresses: [{
                        "email": $(event.target).parent().attr('data-email-to'),
                        "module": "Accounts",
                        "name": $(event.target).parent().attr('data-email-name')
                    }]
                }
            }
        })
    }
})