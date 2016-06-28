({
    extendsFrom: 'ImageField',

    _render: function () {
        this._super('_render');
    },

    selectImage: function (e) {
        var self = this, $input = self.$('input[type=file]');
        self.preview = true;
        self.clearErrorDecoration();
        self.model.uploadFile(self.name, $input, {
            field: self.name, success: function (rsp) {
                var img_url = app.api.buildURL('Home/file/static_image?_hash=' + rsp['static_image']['name']) + "&oauth_token=" + app.api.getOAuthToken();
                var image = $('<img>').addClass('hide').attr('src', img_url).on('load', $.proxy(self.resizeWidget, self));
                self.$('.image_preview').html(image);

                if (self.model.get('static_image')) {
                    self.context.parent.set('fileToDelete',self.model.get('static_image'));
                }

                self.model.set('static_image', rsp['static_image']['name']);
                self.model.trigger("change", "image");
            }, error: function (resp) {
                var errors = errors || {}, fieldName = self.name;
                errors[fieldName] = {};
                switch (resp.error) {
                    case'request_too_large':
                        errors[fieldName].tooBig = true;
                        break;
                    default:
                        errors[fieldName].uploadFailed = true;
                }
                self.model.unset(fieldName + '_guid');
                self.model.trigger('error:validation:' + this.field, errors[fieldName]);
                self.model.trigger('error:validation', errors);
            }
        }, {temp: true});
    },

    'delete': function (e) {
        var self = this;
        if (this.preview === true) {
            self.preview = false;
            self.clearErrorDecoration();
            self.render();
            return;
        }
        if (this._duplicateBeanId) {
            self.model.unset(self.name);
            self.model.set(self.name, null);
            self.render();
            return;
        }
        var confirmMessage = app.lang.get('LBL_IMAGE_DELETE_CONFIRM', self.module);
        if (confirm(confirmMessage)) {
            app.api.call('delete', app.api.buildURL('deleteDashletImage'), {image: self.model.get(self.name)}, {
                success: function (response) {
                    self.model.unset(self.name);
                    self.model.set(self.name, null);
                    if (!self.disposed) {
                        self.render();
                    }
                }, error: function (data) {
                    app.error.handleHttpError(data, {});
                }
            });
        }
    },
})