function CookieAlert() {


    return {
        init: this.init.bind(this)
    };
}

CookieAlert.prototype = new Module();
CookieAlert.prototype.constructor = CookieAlert;

CookieAlert.prototype.vars = {
    cookie_name: 'cookie_alert',
    hide_class: 'hide',
    body_class: 'show-cookie-alert'
};



CookieAlert.prototype.init = function() {
    var self = this;
    if (Cookies.get(self.vars.cookie_name) != self.vars.hide_class) {
        jQuery("body").addClass(self.vars.body_class);
    }

    jQuery(".js-cookie-alert-btn").on("click", function() {
        jQuery("body").removeClass(self.vars.body_class);
        Cookies.set(self.vars.cookie_name, self.vars.hide_class, { expires: 10 * 365 });
    });

    return true;

};
