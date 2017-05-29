(function(jQuery) {



    /* ======== Extern ======== */
    //= include ../bower_components/lazyloadxt/dist/jquery.lazyloadxt.min.js
    //= include ../bower_components/owl.carousel/dist/owl.carousel.min.js
    //= include ../bower_components/velocity/velocity.min.js
    //= include ../bower_components/js-cookie/src/js.cookie.js
    //= include ../bower_components/matchHeight/dist/jquery.matchHeight-min.js
    //= include ../bower_components/selectize/dist/js/standalone/selectize.js
    //= include ../bower_components/bowser/src/bowser.js



    //= include vendor/jquery.lazyloadxt.js

    /* ======== Common includes ======== */
    //= include common/AjaxForm.js
    //= include common/Application.js
    //= include common/Module.js

    /* ======== Module includes ======== */
    //= include modules/AjaxFormController.js
    //= include modules/Alert.js
    //= include modules/AlertController.js
    //= include modules/LanguageSwitch.js
    //= include modules/Page.js
    //= include modules/NestedNavigation.js
    //= include modules/FastclickController.js
    //= include modules/Sidebar.js
    //= include modules/SiteController.js
    //= include modules/ParsleyController.js
    //= include modules/Scroll.js
    //= include modules/ScrollController.js
    //= include modules/OwlcarouselController.js
    //= include modules/Owlcarousel.js
    //= include modules/MatchHeightController.js
    //= include modules/GoogleMap.js
    //= include modules/GoogleMapsController.js
    //= include modules/Location.js
    //= include modules/Timeline.js



    /* ======== Application Setup ======== */
    var application = new Application();
    application
        .addModule(new AjaxFormController(), 'ajaxFormController')
        .addModule(new AlertController(), 'AlertController')
        .addModule(new LanguageSwitch(), 'LanguageSwitch')
        .addModule(new Page(), 'Page')
        .addModule(new NestedNavigation(), 'nestedNavigation')
        .addModule(new Sidebar(), 'sidebar')
        .addModule(new FastclickController(), 'fastclickController')
        .addModule(new SiteController(), 'siteController')
        .addModule(new ParsleyController(), 'parsleyController')
        .addModule(new Scroll(), 'scroll')
        .addModule(new ScrollController(), 'scrollcontroller')
        .addModule(new OwlcarouselController(), 'owlcarouselcontroller')
        .addModule(new MatchHeightController(), 'MatchHeightController')
        .addModule(new GoogleMapsController(), 'googleMapsController')
        .addModule(new Location(), 'Location')
        .addModule(new Timeline(), 'Timeline')
        .run();


})(jQuery);
