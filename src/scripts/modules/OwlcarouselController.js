function OwlcarouselController() {

    this.initElements();
    this.initOwl();

}

OwlcarouselController.prototype = new Module();
OwlcarouselController.prototype.constructor = OwlcarouselController;

OwlcarouselController.prototype.classes = {};

OwlcarouselController.prototype.selectors = {
    owl: 'js-owl-carousel'
};

OwlcarouselController.prototype.elements = {
    owl: undefined
};

OwlcarouselController.prototype.init = function() {

};

OwlcarouselController.prototype.initElements = function() {
    var $owl = jQuery(this.getSelector('owl'));
    if (!$owl.length) {
        return false;
    }

    this.elements.owl = $owl;

    return true;
};

OwlcarouselController.prototype.initOwl = function() {
    var $owl = this.getElement('owl');

    if (typeof $owl !== "undefined" && $owl) {
        for (var i = 0, len = $owl.length; i < len; i++) {
            new Owlcarousel($owl.eq(i));
        }
    }

};
