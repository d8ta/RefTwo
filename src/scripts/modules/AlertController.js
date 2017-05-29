function AlertController() {

	this.initElements();
	this.initAlerts();

}

AlertController.prototype = new Module();
AlertController.prototype.constructor = AlertController;

AlertController.prototype.classes = {
};

AlertController.prototype.selectors = {
	alert: 'js-alert'
}; 

AlertController.prototype.elements = {
	alert: undefined 
};

AlertController.prototype.init = function() {

};

AlertController.prototype.initElements = function() {
	var $alert = jQuery(this.getSelector('alert'));

	if (!$alert.length) {
		return false;
	}
	
	this.elements.alert = $alert;

	return true;
};

AlertController.prototype.initAlerts = function() {
	var $alert = this.getElement('alert');
	
	if (typeof $alert !== "undefined" && $alert) {
		for(var i = 0, len = $alert.length; i < len; i++) {
			new Alert($alert.eq(i));
		}
	}

};
