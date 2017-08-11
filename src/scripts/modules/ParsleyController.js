function ParsleyController() {
    return {
        parse: this.parse.bind(this)
    };
}

ParsleyController.prototype = new Module();
ParsleyController.prototype.constructor = ParsleyController;

ParsleyController.prototype.selectors = {
    form: 'js-validate',
};

ParsleyController.prototype.parse = function($context) {

    var self = this;
    var $forms = $context.find(this.getSelector('form'));

    if (!$forms.length) {
        return;
    }

    var lang = jQuery("html").attr("lang").split("-")[0];

    if (typeof jQuery.fn.parsley === 'undefined') {

        self.loadDependency("/assets/js/vendor/parsley.min.js", function() {
            self.loadDependency("/assets/js/vendor/" + lang + ".js", function() {
                ParsleyConfig.errorClass = 'has-error';
                ParsleyConfig.classHandler = self.classHandler;
                ParsleyConfig.errorsContainer = self.errorsContainer;

                self.defineMessages();
                $forms.parsley();
            });

        });

    } else {
        $forms.parsley();
    }

};


ParsleyController.prototype.classHandler = function(field) {
    return field.$element.closest('.form__fields__row__input');
};

ParsleyController.prototype.errorsContainer = function(field) {
    return field.$element.closest('.form__fields__row__input');
};

ParsleyController.prototype.defineMessages = function() {

    // Define then the messages
    /*window.ParsleyConfig.i18n.de = jQuery.extend(window.ParsleyConfig.i18n.de || {}, {
      defaultMessage: "Die Eingabe scheint nicht korrekt zu sein.",
      type: {
        email:        "Die Eingabe muss eine gültige E-Mail-Adresse sein.",
        url:          "Die Eingabe muss eine gültige URL sein.",
        number:       "Die Eingabe muss eine Zahl sein.",
        integer:      "Die Eingabe muss eine Zahl sein.",
        digits:       "Die Eingabe darf nur Ziffern enthalten.",
        alphanum:     "Die Eingabe muss alphanumerisch sein."
      },
      notblank:       "Die Eingabe darf nicht leer sein.",
      required:       "Dies ist ein Pflichtfeld.",
      pattern:        "Die Eingabe scheint ungültig zu sein.",
      min:            "Die Eingabe muss größer oder gleich %s sein.",
      max:            "Die Eingabe muss kleiner oder gleich %s sein.",
      range:          "Die Eingabe muss zwischen %s und %s liegen.",
      minlength:      "Die Eingabe ist zu kurz. Es müssen mindestens %s Zeichen eingegeben werden.",
      maxlength:      "Die Eingabe ist zu lang. Es dürfen höchstens %s Zeichen eingegeben werden.",
      length:         "Die Länge der Eingabe ist ungültig. Es müssen zwischen %s und %s Zeichen eingegeben werden.",
      mincheck:       "Wählen Sie mindestens %s Angaben aus.",
      maxcheck:       "Wählen Sie maximal %s Angaben aus.",
      check:          "Wählen Sie zwischen %s und %s Angaben.",
      equalto:        "Dieses Feld muss dem anderen entsprechen."
    });

    window.ParsleyValidator.setLocale('de');*/
};
