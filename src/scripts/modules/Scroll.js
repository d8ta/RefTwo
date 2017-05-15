function Scroll() {

    return {
        init: this.init.bind(this),
        scrollToHash: this.scrollToHash.bind(this),
        scrollDown: this.scrollDown.bind(this)
    };

}

Scroll.prototype = new Module();
Scroll.prototype.constructor = Scroll;

Scroll.prototype.selectors = {
    target: 'js-scroll--target'
};

Scroll.prototype.elements = {
    wrap: undefined
};

Scroll.prototype.init = function() {
    this.elements.wrap = jQuery('html,body');
};

Scroll.prototype.scrollToHash = function() {

    this.elements.wrap.velocity("scroll", {
        offset: jQuery(window.location.hash + "-anchor").offset().top - 120,
        easing: "easeInOutCubic",
        duration: 1000
    });

};

Scroll.prototype.scrollDown = function() {

    this.elements.wrap.velocity("scroll", {
        offset: jQuery("#news-anchor").offset().top - 20,
        easing: "easeInOutCubic",
        duration: 1000
    });

};
