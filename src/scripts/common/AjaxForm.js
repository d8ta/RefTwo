function AjaxForm($element) {
    this.$element = $element;

    this.init();
}

AjaxForm.prototype = new Module();
AjaxForm.prototype.constructor = AjaxForm;

AjaxForm.prototype.config = {};
AjaxForm.prototype.classes = {
    sent: 'form--sent',
    inProgress: 'form--in-progress',
};

AjaxForm.prototype.init = function() {

    var $element = this.$element;
    var config = jQuery.extend(this.config, $element.data());

    this.addListener();

};

AjaxForm.prototype.addListener = function() {
    this.$element.on('submit', { self: this }, this.submitHandler);
};

AjaxForm.prototype.submitHandler = function(event) {

    event.preventDefault();

    var self = event.data.self;
    var $form = self.$element;

    if (!self.isValid()) {
        console.error('Form is not valid.');
        return;
    }

    var options = {
        context: self,
        url: $form.attr('action'),
        type: $form.attr('method'),
        data: $form.serialize()
    };

    if ($form.hasClass(self.classes.inProgress)) {
        console.warn('Form already in progress');
        return;
    }

    $form.addClass(self.classes.inProgress);

    jQuery
        .ajax(options)
        .always(self.requestAlways)
        .done(self.requestDone);
};

AjaxForm.prototype.isValid = function() {
    var $form = this.$element;
    var parsley = $form.data('Parsley');

    if (!parsley ||  typeof jQuery.fn.parsley === 'undefined') {
        return true; }

    return $form.parsley().isValid();

};

AjaxForm.prototype.requestAlways = function(response) {

    var $form = this.$element;
    $form.removeClass(this.classes.inProgress);

    if (response.code && response.code == 1) {
        $form.addClass(this.classes.sent);

        if (typeof ga === 'function') {
            ga('send', 'event', 'Kontaktformular', 'gesendet', $form.data('name'));
        }
    }
};

AjaxForm.prototype.requestDone = function(response) {};
