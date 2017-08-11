function LanguageSwitch() {


    return {
        init: this.init.bind(this)
    };
}

LanguageSwitch.prototype = new Module();
LanguageSwitch.prototype.constructor = LanguageSwitch;

LanguageSwitch.prototype.elements = {
    wrap: undefined,
    ul: undefined,
    current_lang: undefined
};

LanguageSwitch.prototype.vars = {};


LanguageSwitch.prototype.init = function() {


    var self = this;

    this.elements.wrap = jQuery(".js-language-switch");
    if (!this.elements.wrap.length) {
        return false;
    }

    this.elements.current_lang = this.elements.wrap.find(".js-language-switch__current");
    this.elements.ul = this.elements.wrap.find("ul");

    this.prepare();
    //this.elements.ul.hide();

    this.elements.wrap.on("click", { self: this }, this.toggle);
    //this.elements.wrap.on("mouseleave", {self: this}, this.close);

    this.elements.wrap.addClass("show");

    return true;


};

LanguageSwitch.prototype.prepare = function() {
    var current_lang = this.elements.ul.find("li.current-lang");
    var current_lang_a = current_lang.children("a");

    //current_lang.prepend(current_lang_a.html());
    this.elements.current_lang.prepend(current_lang_a.html());
    current_lang_a.remove();
};

LanguageSwitch.prototype.toggle = function(e) {
    var self = e.data.self;
    self.elements.wrap.toggleClass("opened");
    self.elements.ul.slideToggle();
};
