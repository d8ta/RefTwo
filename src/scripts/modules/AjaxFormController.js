function AjaxFormController() {
    return {
        parse: this.parse.bind(this)
    };
}

AjaxFormController.prototype = new Module();
AjaxFormController.prototype.constructor = AjaxFormController;

AjaxFormController.prototype.selectors = {
    form: 'js-ajax-form'
};

AjaxFormController.prototype.parse = function($context) {


    var $forms = $context.find(this.getSelector('form'));
    var self = this;

    if (!$forms.length) {
        return; }

    for (var i = 0, len = $forms.length; i < len; i++) {
        new AjaxForm($forms.eq(i));
    }
};
