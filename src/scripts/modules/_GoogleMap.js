function GoogleMap($element) {
    this.$element = $element;
    this.init();


    return {};
}

GoogleMap.prototype = new Module();
GoogleMap.prototype.constructor = GoogleMap;

GoogleMap.prototype.vars = {
    map: undefined,
    data: undefined,
    markers: [],
    markers_data: [],
    locations_select: undefined
};

GoogleMap.prototype.classes = {};

GoogleMap.prototype.selectors = {

};

GoogleMap.prototype.elements = {
    infobox: undefined,
    icons: undefined,
    locations: undefined,
    close: undefined,
    locations_select: undefined,
};

GoogleMap.prototype.init = function() {

    var self = this;

    this.vars.data = this.$element.data();
    this.elements.infobox = jQuery(".js-google-maps-infobox");
    this.elements.close = this.elements.infobox.find(".js-google-maps-infobox-close");

    var defaultIcon = {
        url: "/assets/images/layout/maps-marker.png",
        size: new google.maps.Size(20, 20),
        scaledSize: new google.maps.Size(10, 10),
        anchor: new google.maps.Point(5, 5),
    };

    var activeIcon = {
        url: "/assets/images/layout/maps-marker.png",
        size: new google.maps.Size(20, 20),
        //scaledSize: new google.maps.Size(20, 20),
        anchor: new google.maps.Point(10, 10),
    };

    this.elements.close.on("click", function() {
        self.closeInfobox();
    });

    this.elements.icon = { default: defaultIcon, active: activeIcon };


    if (this.vars.data.maptype == "locations") {
        this.elements.locations = this.elements.infobox.find(".js-google-maps-locations-item");

        // this.elements.locations_select = this.elements.infobox.find(".js-google-maps-locations-select").selectize({
        //     create: false
        // });

        this.vars.locations_select = this.elements.locations_select[0].selectize;
        this.vars.locations_select.on("change", function(location_id) {
            self.activateLocation(location_id);

            for (var marker_k in self.vars.markers) {

                if (self.vars.markers[marker_k].marker_id == location_id) {
                    self.vars.map.setCenter(self.vars.markers[marker_k].position);
                }
            }
            
        });

    }

    this.initMap();

    
};

GoogleMap.prototype.initMap = function() {

    var self = this;
    var data = this.vars.data;
    var options = this.getMapOptions();

    var myPosition = application.getModule("Location").getLatLng();
    if (myPosition) {
        options.center = new google.maps.LatLng(myPosition.lat, myPosition.lng);
    }
    options.zoom = 9;

    options.styles = [{ "featureType": "all", "elementType": "all", "stylers": [{ "visibility": "simplified" }, { "saturation": -100 }, { "lightness": 73 }, { "gamma": 0.75 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "weight": 1.98 }, { "lightness": 10 }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "saturation": -51 }, { "lightness": 17 }] }, { "featureType": "road.arterial", "elementType": "labels", "stylers": [{ "visibility": "on" }, { "color": "#b5a7b5" }] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.arterial", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway", "elementType": "labels.text", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }] }, { "featureType": "road.highway", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.highway", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.locality", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.locality", "elementType": "labels.text", "stylers": [{ "color": "#000000" }] }, { "featureType": "administrative.locality", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "labels", "stylers": [{ "visibility": "off" }, { "lightness": 54 }] }, { "featureType": "poi", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "weight": 0.69 }, { "lightness": 14 }] }, { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [{ "visibility": "on" }, { "lightness": 37 }] }, { "featureType": "road.local", "elementType": "labels.text.stroke", "stylers": [{ "visibility": "off" }, { "weight": 6.26 }] }, { "featureType": "poi.attraction", "elementType": "all", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.country", "elementType": "all", "stylers": [{ "visibility": "off" }, { "color": "#ffffff" }] }, { "featureType": "water", "elementType": "geometry.fill", "stylers": [{ "color": "#f3e564" }] }, { "featureType": "administrative.country", "elementType": "geometry.stroke", "stylers": [{ "visibility": "on" }, { "color": "#8a8a8a" }, { "weight": 0.86 }] }, { "featureType": "administrative.province", "elementType": "geometry.stroke", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }, { "weight": 0.79 }] }, { "featureType": "administrative.locality", "elementType": "labels.text", "stylers": [{ "visibility": "off" }, { "color": "#c7c7c7" }] }, { "featureType": "poi", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [{ "color": "#8a8a8a" }] }, { "featureType": "water", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "administrative.province", "elementType": "labels", "stylers": [{ "visibility": "off" }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "visibility": "off" }] }];

    this.vars.map = new google.maps.Map(this.$element[0], options);

    this.vars.map.addListener('click', function() {
        if (!Modernizr.touchevents) {
            self.closeInfobox();
        }
    });

    this.updateMarkers();

};


GoogleMap.prototype.closeInfobox = function() {
    for (var j = 0; j < this.vars.markers.length; j++) {
        this.vars.markers[j].setIcon(this.elements.icon.default);
    }
    this.elements.infobox.removeClass("show");
    this.elements.infobox.find(".js-google-maps-infobox-content").html("");
};


GoogleMap.prototype.getMapOptions = function() {

    var options = {};
    var data = this.vars.data;
    var value;
    var allowedOptions = ['disableDefaultUI'];

    for (var key in data) {
        value = data[key];

        key = key.replace('Ui', 'UI');
        key = key.replace('control', 'Control');
        key = key.replace('view', 'View');
        key = key.replace('type', 'Type');

        options[key] = value;
    }

    return options;

};

GoogleMap.prototype.activateLocation = function(location_id) {

    this.elements.locations
        .removeClass("active")
        .filter(function() {
            return jQuery(this).data("locationid") == location_id;
        })
        .eq(0)
        .addClass("active");


    this.vars.locations_select.setValue(location_id, true);
    this.activateMarker(location_id);
};

GoogleMap.prototype.updateMarkers = function() {
    var self = this;
    this.fetchMarkers().then(function(markers) {
        self.refreshMarkers(markers);

        if (self.vars.data.maptype == "locations") {
            var location_id = Cookies.get("nearestLocationID_geo");
            if (!location_id) {
                location_id = Cookies.get("nearestLocationID_ip");
            }
            if (location_id) {
                self.showInfobox();
                self.activateLocation(location_id);
            }
        }
    });
};

GoogleMap.prototype.fetchMarkers = function() {

    var myPosition = application.getModule("Location").getLatLng();

    return jQuery.ajax({
        url: this.vars.data.ajaxpins
    });

};

GoogleMap.prototype.refreshMarkers = function(markers) {

    this.vars.markers_data = markers;

    if (this.vars.markers_data) {
        this.setMarkers();

        if (this.vars.markers.length > 1) {
            this.centerMapToMarkers();
        } else if (this.vars.markers.length > 0) {
            this.centerMapToMarker();
        }
    }
};


GoogleMap.prototype.setMarkers = function() {
    var self = this;
    var map = this.vars.map;
    var markers = this.vars.markers_data;
    var markerData;

    //var infowindow = new google.maps.InfoWindow();

    for (var i = 0, len = markers.length; i < len; i++) {

        markerData = markers[i].location;

        var options = {
            position: new google.maps.LatLng(markerData.lat, markerData.lng),
            map: map,
            icon: self.elements.icon.default,
            marker_id: markers[i].id
        };

        var marker = new google.maps.Marker(options);

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                if (self.vars.data.maptype != "locations") { // locations markers will be activated in activateLocation
                    self.activateMarker(marker.marker_id);
                }

                self.updateInfobox(self.vars.markers_data[i]);
            };
        })(marker, i));

        this.vars.markers.push(marker);
    }


};

GoogleMap.prototype.activateMarker = function(marker_id) {

    for (var j = 0; j < this.vars.markers.length; j++) {
        if (marker_id == this.vars.markers[j].marker_id) {
            this.vars.markers[j].setIcon(this.elements.icon.active);
        } else {
            this.vars.markers[j].setIcon(this.elements.icon.default);
        }
    }
};


/*
GoogleMap.prototype.clickMarker = function(marker, i) {

};

*/

GoogleMap.prototype.showInfobox = function() {
    this.elements.infobox.addClass("show");
};

GoogleMap.prototype.updateInfobox = function(marker) {
    var self = this;
    this.showInfobox();

    if (this.vars.data.maptype == "projects") {
        this.elements.infobox.addClass("loading");
        this.fetchInfobox(marker.id).then(function(infobox) {
            self.refreshInfobox(infobox);
        });
    } else if (this.vars.data.maptype == "locations") {
        this.activateLocation(marker.id);
    }

};

GoogleMap.prototype.fetchInfobox = function(marker_id) {

    return jQuery.ajax({
        url: this.vars.data.ajaxinfobox,
        data: {
            id: marker_id,
            view: this.vars.data.ajaxinfoboxview
        }
    });
};

GoogleMap.prototype.refreshInfobox = function(infobox_html) {
    this.elements.infobox.find(".js-google-maps-infobox-content").html(infobox_html);
    this.elements.infobox.removeClass("loading");
};

GoogleMap.prototype.centerMapToMarkers = function() {
    var map = this.vars.map;
    var bounds = new google.maps.LatLngBounds();
    var markers = this.vars.markers;

    for (var i = 0, len = markers.length; i < len; i++) {
        bounds.extend(markers[i].position);
    }
    map.fitBounds(bounds);

};


GoogleMap.prototype.centerMapToMarker = function() {
    var map = this.vars.map;
    var markers = this.vars.markers;
    map.setCenter(markers[0].position);
};
