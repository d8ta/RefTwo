function FastclickController() {
    return {
        init: this.init.bind(this)
    };
}

FastclickController.prototype = new Module();
FastclickController.prototype.constructor = FastclickController;

FastclickController.prototype.init = function() {

    if (!Modernizr.touchevents) {
        return;
    }

    this.loadDependency("/assets/js/vendor/fastclick.js", this.loaded);
};

FastclickController.prototype.loaded = function() {
    FastClick.attach(document.body);
};
