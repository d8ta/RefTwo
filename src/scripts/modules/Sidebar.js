function Sidebar() {
    return {
        init: this.init.bind(this),
        closeSidebar: this.closeSidebar.bind(this),
        isSidebarOpened: this.isSidebarOpened.bind(this)
    };
}

Sidebar.prototype = new Module();
Sidebar.prototype.constructor = Sidebar;

Sidebar.prototype.classes = {
    sidebarOpen: 'sidebar-open',
    siteFixed: 'site-fixed'
};

Sidebar.prototype.selectors = {
    trigger: 'js-sidebar__trigger',
    navigation: 'js-navigation',
    site: 'js-site'
};

Sidebar.prototype.elements = {
    navigation: undefined,
    site: undefined,
    body: undefined
};


Sidebar.prototype.init = function() {

    this.elements.site = jQuery(this.getSelector('site'));

    this.elements.body = jQuery('body');

    this
        .addListener();


    //this.setupMediaQuery();

};



Sidebar.prototype.setupMediaQuery = function() {

    var $body = this.getElement('body');
    var self = this;

    enquire.register("screen and (min-width: " + application.getVar('breakpoints').md + "px)", {
        match: function() {

            if (!$body.hasClass(self.classes.sidebarOpen)) {
                return; }

            self.toggleSidebar();
        }
    });
};



Sidebar.prototype.addListener = function() {
    this.getElement('body')
        .on('click', this.getSelector('trigger'), { self: this }, this.eventHandler);
};


Sidebar.prototype.toggleListener = function(toggle) {
    var $site = this.getElement('site');

    if (toggle) {
        $site.on('click', { self: this }, this.eventHandler);
    } else {
        $site.off();
    }
};



Sidebar.prototype.toggleSidebar = function() {

    var self = this;
    var $body = this.getElement('body');
    var method;
    var delay = 0;
    var fixSite;

    if ($body.hasClass(this.classes.sidebarOpen)) {
        method = 'removeClass';
        this.toggleListener(false);
        fixSite = false;
        delay = 300;

    } else {
        method = 'addClass';
        this.toggleListener(true);
        fixSite = true;
    }

    if (delay) {
        setTimeout(function() {
            application.getModule('siteController').fixSite(fixSite);
        }, delay);
    } else {
        application.getModule('siteController').fixSite(fixSite);
    }


    $body[method](self.classes.sidebarOpen);
};


Sidebar.prototype.closeSidebar = function() {

    var self = this;
    var $body = this.getElement('body');
    var method;
    var delay = 0;
    var fixSite;

    //if ($body.hasClass(this.classes.sidebarOpen)) {
    method = 'removeClass';
    this.toggleListener(false);
    fixSite = false;
    delay = 300;

    /*} else{
    	method = 'addClass';
    	this.toggleListener(true);
    	fixSite = true;
    };*/

    if (delay) {
        setTimeout(function() {
            application.getModule('siteController').fixSite(fixSite);
        }, delay);
    } else {
        application.getModule('siteController').fixSite(fixSite);
    }


    $body[method](self.classes.sidebarOpen);
};

Sidebar.prototype.isSidebarOpened = function() {
    var $body = this.getElement('body');
    var self = this;
    return ($body.hasClass(self.classes.sidebarOpen));

};

Sidebar.prototype.eventHandler = function(event) {

    event.preventDefault();
    event.stopImmediatePropagation();

    var self = event.data.self;

    self.toggleSidebar();
};
