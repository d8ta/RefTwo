function NestedNavigationBig () {
	return {
		parse: this.parse.bind(this)
	}
}

NestedNavigationBig.prototype = new Module();
NestedNavigationBig.prototype.constructor = NestedNavigationBig;


NestedNavigationBig.prototype.selectors = {
	navigation: 'js-nested-navigation-big' 
};

NestedNavigationBig.prototype.classes = {
	hover: 'hover', 
	initialized: 'initialized'
};

NestedNavigationBig.prototype.config = {
	addClasses: true,
	animate: false, 
};

NestedNavigationBig.prototype.parse = function($context) {

	if (!Modernizr.touchevents) return;


	var $navigations = $context.find(this.getSelector('navigation')).not('.' + this.classes.initialized);

	if (!$navigations.length) {return;};

	this.addListener($navigations);

	$navigations.addClass(this.classes.initialized);
};

NestedNavigationBig.prototype.addListener = function($navigations) {
	$navigations.on('click', 'li', {self:this}, this.eventHandler);
};

NestedNavigationBig.prototype.eventHandler = function(event) {



	event.stopPropagation();

	var self = event.data.self;
	var $navigation = jQuery(event.delegateTarget);
	var $clicked = jQuery(this);
	var $siblings = $clicked.siblings();
	var $sub = $clicked.find('ul').children();
	var config = jQuery.extend(self.config, $navigation.data());



	if (config.addClasses) {
		$clicked.siblings('.' + self.classes.hover).removeClass(self.classes.hover);
		$clicked.siblings().find('.' + self.classes.hover).removeClass(self.classes.hover);
	};

	if (!$clicked.hasClass(self.classes.hover) && $sub.length) {


		event.preventDefault();

		if (config.addClasses) {
			$clicked.addClass(self.classes.hover);
		};
	};
};
