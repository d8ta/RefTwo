(function(jQuery) {

    /* ======== Extern ======== */
    //= include ../bower_components/js-cookie/src/js.cookie.js
    //= include ../bower_components/bowser/src/bowser.js

    /* ======== Common includes ======== */
    //= include common/Application.js
    //= include common/Module.js
    //= include common/Functions.js

    /* ======== Module includes ======== */
    //= include modules/Alert.js
    //= include modules/AlertController.js


    /* ======== Application Setup ======== */
    var application = new Application();
    application
        .addModule(new AlertController(), 'AlertController')
        .run();


})(jQuery);
