function Alert($element) {

    this.elements = {

    };
    this.config = {
        type: undefined
    };

    this.elements.container = $element;
    this.elements.close = this.elements.container.find(".js-alert-close");

    this.config = jQuery.extend(this.config, this.elements.container.data('config'));

    this.init();

    return {};
}

Alert.prototype = new Module();
Alert.prototype.constructor = Alert;

Alert.prototype.TYPES = {
    cookie: 'cookie',
    outdated_browser: 'outdated_browser',
    incompatible_browser: 'incompatible_browser',
};

Alert.prototype.COOKIES = {
    cookie: 'cookies_accepted',
    outdated_browser: 'outdated_browser_accepted',
    incompatible_browser: 'incompatible_browser_accepted',
};

Alert.prototype.CLASSES = {
    cookie: 'show-cookie-alert',
    outdated_browser: 'show-outdated_browser-alert',
    incompatible_browser: 'show-incompatible_browser-alert',
};

Alert.prototype.BROWSER = {
    modern: { chrome: "18", msie: "9", firefox: "30", safari: "6" },
    compatible: { chrome: "15", msie: "9", firefox: "20", safari: "6" }
};


Alert.prototype.init = function() {

    var self = this;

    // Cookie already set
    if (typeof Cookies.get(this.COOKIES[this.config.type]) !== 'undefined' || this.forceHideAlert()) {
        this.elements.container.remove();
        return;
    }

    this.addListener();

    setTimeout(function() {
        jQuery("html").addClass(self.CLASSES[self.config.type]);
    }, 1000);


};


Alert.prototype.browserIsModern = function() {
    var old_android = bowser.name == "Android" && bowser.version <= 4;
    return !bowser.isUnsupportedBrowser(this.BROWSER.modern) && !old_android;
};

Alert.prototype.browserIsCompatible = function() {
    var old_android = bowser.name == "Android" && bowser.version <= 4;
    return !bowser.isUnsupportedBrowser(this.BROWSER.compatible) && !old_android;
};

Alert.prototype.browserIsOutdated = function() {
    return !this.browserIsModern();
};

Alert.prototype.browserIsIncompatible = function() {
    return !this.browserIsCompatible();
};


Alert.prototype.forceHideAlert = function() {

    if (this.config.type == this.TYPES.cookie) {
        return this.browserIsIncompatible() || this.browserIsIncompatible();
    }
    if (this.config.type == this.TYPES.outdated_browser) {
        return this.browserIsModern() || this.browserIsIncompatible();
    }
    if (this.config.type == this.TYPES.incompatible_browser) {
        return this.browserIsCompatible();
    }

    return false;
};

/**
 * Add listener
 */
Alert.prototype.addListener = function() {
    if (typeof this.elements.close !== "undefined") {
        this.elements.close.one('click', { self: this }, this.onClose);
    }

};

/**
 * Set cookie and hide/remove element
 * @param {JQueryEventObject} event [description]
 */
Alert.prototype.onClose = function(event) {

    var self = event.data.self;

    Cookies.set(self.COOKIES[self.config.type], '1', { expires: 10 * 365, path: '/' });
    jQuery("html").removeClass(self.CLASSES[self.config.type]);

    setTimeout(function() {
        self.elements.container.remove();
    }, 500);
};
