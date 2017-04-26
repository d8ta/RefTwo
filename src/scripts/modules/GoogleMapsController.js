function GoogleMapsController () {
	return {
		parse: this.parse.bind(this)
	}
}

GoogleMapsController.prototype = new Module();
GoogleMapsController.prototype.constructor = GoogleMapsController;

GoogleMapsController.prototype.classes = {
};

GoogleMapsController.prototype.selectors = {
	maps: 'js-google-maps'
};

GoogleMapsController.prototype.elements = {
	maps: undefined 
};


GoogleMapsController.prototype.parse = function($context) {


	if (!this.initElements($context)) {return};

	this.loadLibrary();

};

GoogleMapsController.prototype.initElements = function($context) {
	var $maps = $context.find(this.getSelector('maps'));

	if (!$maps.length) {return false;};

	this.elements.maps = $maps;

	return true;
};

GoogleMapsController.prototype.loadLibrary = function() {

	window.libraryCallback = this.libraryCallback.bind(this);

	
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&language=de&callback=libraryCallback&key=AIzaSyBkKl8VsPSJFcfqLGHm_pLCMmtVV5QB5lc';
	//script.src= "https://maps.googleapis.com/maps/api/js?key=AIzaSyBkKl8VsPSJFcfqLGHm_pLCMmtVV5QB5lc&callback=initMap"

	document.body.appendChild(script);
};

GoogleMapsController.prototype.libraryCallback = function() {
	this.initMaps();
};

GoogleMapsController.prototype.initMaps = function() {
	var $maps = this.getElement('maps');

	for (var i = $maps.length - 1; i >= 0; i--) {
		new GoogleMap($maps.eq(i));
	};

};