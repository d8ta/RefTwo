function SiteController() {
    return {
        init: this.init.bind(this),
        fixSite: this.fixSite.bind(this)
    };
}

SiteController.prototype = new Module();
SiteController.prototype.constructor = SiteController;

SiteController.prototype.classes = {
    siteFixed: 'site-fixed'
};

SiteController.prototype.selectors = {
    site: 'js-site'
};

SiteController.prototype.elements = {
    site: undefined,
    body: undefined,
    header: undefined
};


SiteController.prototype.init = function() {
    this.elements.site = jQuery(this.getSelector('site'));
    this.elements.body = jQuery('body');
    this.elements.header = jQuery('.site > .header');

};

SiteController.prototype.fixSite = function(toggle) {
    var $site = this.getElement('site');
    var $body = this.getElement('body');
    var $header = this.getElement('header');

    // Fix page
    if (toggle) {
        var scrollTop = $body.scrollTop();

        $body.addClass(this.classes.siteFixed);

        $site
            .data('scrollTop', scrollTop)
            .css({ top: scrollTop * -1, });

        $body.scrollTop(0);

        $header
            .css({ top: scrollTop });


    }
    // unfix page
    else {

        $body
            .removeClass(this.classes.siteFixed)
            .scrollTop($site.data('scrollTop'));

        $site
            .removeAttr('style')
            .removeData('scrollTop');

        $header
            .removeAttr('style');
    }

};
