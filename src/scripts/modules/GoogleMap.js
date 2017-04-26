function GoogleMap ($element) {
	this.$element = $element;
	this.init();

	return {};
}

GoogleMap.prototype = new Module();
GoogleMap.prototype.constructor = GoogleMap;

GoogleMap.prototype.vars = {
	data: undefined,
	infobox: undefined, 
	map: undefined,
	markers: []
};

GoogleMap.prototype.classes = {
};

GoogleMap.prototype.selectors = {

};

GoogleMap.prototype.elements = {
};

GoogleMap.prototype.init = function() {
	
	this.vars.data = this.$element.data();

	this.initMap();

};

GoogleMap.prototype.setPublicFunctions = function() {
	this.$element.data('googleMap', {
		triggerClick: this.triggerClick.bind(this),
		zoomToMarker: this.zoomToMarker.bind(this)
	});
};

GoogleMap.prototype.initMap = function() {

	var data = this.vars.data;
	var options = this.getMapOptions();



	this.vars.map = new google.maps.Map(this.$element[0], options);

 //console.log(data.markers);
	if (data.markers) {
		this.setMarkers();

		if (data.markers.length > 1) {
			this.centerMapToMarkers();
		} else {
			this.centerMapToMarker();
		}
	};

	this.setPublicFunctions();
};

GoogleMap.prototype.getMapOptions = function() {

	var options = {};
	var data = this.vars.data;
	var value;
	for(var key in data){
		value = data[key];

		key = key.replace('Ui', 'UI');

		options[key] = value;
	}

	if (Modernizr.touchevents) {
		options.draggable = false;
	}
	
	return options;

};

GoogleMap.prototype.setMarkers = function() {

	var loadInfoboxJs = false;
	var map = this.vars.map;
	var markers = this.vars.data.markers;
	var markerData;


	for(var i = 0, len = markers.length; i < len; i++){


		markerData = markers[i];
		var options = {
			clickable: false,
			position: new google.maps.LatLng(markerData.lat,markerData.long),
			origin: new google.maps.LatLng(markerData.origin.x,markerData.origin.y),
		  	map: map
		};

		if (markerData.infobox) {
			loadInfoboxJs = true;
			options.clickable = true;
		};

		if (markerData.image) {
			options.icon = {
				url: markerData.image
			};
		};

		if (markerData.scaledSize) {
			options.icon.scaledSize = new google.maps.Size(markerData.scaledSize.width, markerData.scaledSize.height);
		};


		var marker = new google.maps.Marker(options);

		if (markerData.id) {
			marker.set('id', markerData.id);
		};

		if (markerData.infobox) {
			marker.set('infobox', markerData.infobox);
		};


		// Add click event
		if (options.clickable) {
			marker.set('self', this);
			google.maps.event.addListener(marker, "click", this.markerClicked);
		};

		this.vars.markers.push(marker);
	}


	if (loadInfoboxJs) {
		this.loadDependency('/assets/js/vendor/infobox.min.js');
	};

};

/**
 * Trigger click on a marker
 * this is a public function
 * @param  {int} id
 * @return {void}
 */
GoogleMap.prototype.triggerClick = function(id) {

	var marker = this.findMarker(id);

	if (!marker) {return;};

	new google.maps.event.trigger( marker, 'click' );

};

GoogleMap.prototype.zoomToMarker = function(id) {
	var marker = this.findMarker(id);
	if (!marker) {return;};

	var markers = [marker];

	this.centerMapToMarkers(markers);
};

GoogleMap.prototype.findMarker = function(id) {
	var markers = this.vars.markers;
	var marker;

	for(var i = 0, len = markers.length; i < len; i++){
		marker = markers[i];

		if (marker.id == id) {return marker};
	}

	console.error('Could not find marker');
	return false;
};

GoogleMap.prototype.markerClicked = function(event) {

	var self = this.self;

	if (this.infobox.url) {

		var data = {
			locationId: this.id, 
		};

		jQuery.ajax({
			context: {self: self, marker: this},
			url: this.infobox.url,
			type: "GET",
			data: data
		})
		.done(self.infoboxContentLoaded);
		return;
	};

};

GoogleMap.prototype.infoboxContentLoaded = function(response) {


	if (response.code != 1) {
		console.error('Error');
		return;
	};

	var self = this.self;
	var marker = this.marker;
	var ib = self.getInfobox();

	if (application.getModule('mediaQuery').test('sm', false)) {
		ib.close();
		application.getModule('overlayController').openContent( response.html );
		return;
	};

	ib.setContent(response.html);
	
	ib.open(self.vars.map, marker);
};

GoogleMap.prototype.getInfobox = function() {
	if (!this.vars.infobox) {

		var options = {
			pixelOffset: new google.maps.Size(35, -60),
			closeBoxURL: "/assets/images/map/infobox/close.gif"
		};

		this.vars.infobox = new InfoBox( options );
	};

	return this.vars.infobox;
};

GoogleMap.prototype.centerMapToMarkers = function(markers) {
	var map = this.vars.map;
	var bounds = new google.maps.LatLngBounds();
	var markers = markers || this.vars.markers;

	for(var i = 0, len = markers.length; i < len; i++){
		bounds.extend(markers[i].position);
	}

	map.fitBounds(bounds);

	// zoom out when centering to only one marker
	if (markers.length == 1) {
		this.setZoom(14);
	};

};

GoogleMap.prototype.centerMapToMarker = function() {
	//console.log('Im a marker');
	var map = this.vars.map;
	var markers = this.vars.markers;
	map.setCenter(markers[0].position);
};

GoogleMap.prototype.setZoom = function(zoom) {
	this.vars.map.setZoom(zoom);
};