function NestedNavigation() {
    return {
        parse: this.parse.bind(this)
    };
}

NestedNavigation.prototype = new Module();
NestedNavigation.prototype.constructor = NestedNavigation;


NestedNavigation.prototype.selectors = {
    navigation: 'js-nested-navigation'
};

NestedNavigation.prototype.classes = {
    hover: 'hover',
    initialized: 'initialized'
};

NestedNavigation.prototype.config = {
    addClasses: true,
    animate: true,
};

NestedNavigation.prototype.parse = function($context) {

    var $navigations = $context.find(this.getSelector('navigation')).not('.' + this.classes.initialized);

    if (!$navigations.length) {
        return;
    }

    this.addListener($navigations);

    $navigations.addClass(this.classes.initialized);


};

NestedNavigation.prototype.addListener = function($navigations) {
    $navigations.on('click', 'li', { self: this }, this.eventHandler);
};

NestedNavigation.prototype.eventHandler = function(event) {

    /*if (window.innerWidth > 1400) {
        return;
    }*/

    event.stopPropagation();

    var self = event.data.self;
    var $navigation = jQuery(event.delegateTarget);
    var $clicked = jQuery(this);
    var $siblings = $clicked.siblings();
    var $ul = $clicked.find(' > ul');
    var config = jQuery.extend(self.config, $navigation.data());


    if (config.animate) {
        self.closeOpenUls($siblings);
    }

    if (config.addClasses) {
        $clicked.siblings('.' + self.classes.hover).removeClass(self.classes.hover);
        $clicked.siblings().find('.' + self.classes.hover).removeClass(self.classes.hover);
    }

    if ($ul.length && $ul.children().length && !$ul.is(':visible')) {


        event.preventDefault();

        if (config.animate) {
            $ul.velocity('slideDown', 300, 'easeInOutCubic');
        }

        if (config.addClasses) {
            $clicked.addClass(self.classes.hover);
        }
    }
};

NestedNavigation.prototype.closeOpenUls = function($elements) {

    var $element;
    var $ul;

    for (var i = $elements.length - 1; i >= 0; i--) {
        $element = $elements.eq(i);

        $ul = $element.children('ul');

        if (!$ul.length) {
            continue;
        }

        if (!$ul.is(':visible')) {
            continue;
        }

        $ul.velocity('slideUp', 300, 'easeInOutCubic');

    }

};
