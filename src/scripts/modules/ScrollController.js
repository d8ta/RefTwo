function ScrollController() {
    return {
        init: this.init.bind(this)
    };
}

ScrollController.prototype = new Module();
ScrollController.prototype.constructor = ScrollController;




ScrollController.prototype.init = function($context) {

    if ("onhashchange" in window) {
        jQuery(window).bind('hashchange', function() {
            var sidebarOpened = application.getModule('sidebar').isSidebarOpened();

            if (sidebarOpened) {
                application.getModule('sidebar').closeSidebar();
                setTimeout(function() {
                    application.getModule('scroll').scrollToHash();
                }, 500);
            } else {

                application.getModule('scroll').scrollToHash();
            }

        });
    }


    if (window.location.hash) {
        setTimeout(function() {
            application.getModule('scroll').scrollToHash();

        }, 500);
    }

    jQuery(".js-scrolldown").on("click", function() {
        application.getModule('scroll').scrollDown();
    });


};
