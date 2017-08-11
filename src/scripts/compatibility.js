(function(jQuery) {

    /* ======== Extern ======== */
    //= include ../bower_components/js-cookie/src/js.cookie.js
    //= include ../bower_components/bowser/src/bowser.js

    /* ======== Common includes ======== */
    //= include common/Application.js
    //= include common/Module.js

    /* ======== Module includes ======== */
    //= include modules/Alert.js
    //= include modules/AlertController.js


    /* ======== Application Setup ======== */
    var comp_application = new Application();
    comp_application
        .addModule(new AlertController(), 'AlertController')
        .run();

})(jQuery);
