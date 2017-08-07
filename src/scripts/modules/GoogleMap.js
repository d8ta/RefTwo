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
    icon: undefined,
    locations: undefined,
    locations_select: undefined,
};

GoogleMap.prototype.init = function() {

    var self = this;

    this.vars.data = this.$element.data();
    this.elements.infobox = jQuery(".js-google-maps-infobox");

    var defaultIcon = {
        url: "/assets/images/layout/pin.png",
        size: new google.maps.Size(72, 72),
        scaledSize: new google.maps.Size(22, 22),
        anchor: new google.maps.Point(11, 11),
    };

    var activeIcon = {
        url: "/assets/images/layout/pin.png",
        size: new google.maps.Size(72, 72),
        scaledSize: new google.maps.Size(36, 36),
        anchor: new google.maps.Point(18, 18),
    };

    this.elements.icon = {
        defaultIcon: defaultIcon,
        activeIcon: activeIcon
    };


    if (this.vars.data.maptype == "locations") {
        this.elements.locations = this.elements.infobox.find(".js-google-maps-locations-item");

        this.elements.locations_select = this.elements.infobox.find(".js-google-maps-locations-select").selectize({
            create: false
        });

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

    options.styles = [{ "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "elementType": "labels.text.fill", "stylers": [{ "color": "#616161" }] }, { "elementType": "labels.text.stroke", "stylers": [{ "color": "#f5f5f5" }] }, { "featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [{ "color": "#bdbdbd" }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#eeeeee" }] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [{ "color": "#757575" }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#e5e5e5" }] }, { "featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [{ "color": "#9e9e9e" }] }, { "featureType": "road", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }] }, { "featureType": "road.arterial", "elementType": "labels.text.fill", "stylers": [{ "color": "#757575" }] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#dadada" }] }, { "featureType": "road.highway", "elementType": "labels.text.fill", "stylers": [{ "color": "#616161" }] }, { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [{ "color": "#9e9e9e" }] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [{ "color": "#e5e5e5" }] }, { "featureType": "transit.station", "elementType": "geometry", "stylers": [{ "color": "#eeeeee" }] }, { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#c9c9c9" }] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [{ "color": "#9e9e9e" }] }];

    this.vars.map = new google.maps.Map(this.$element[0], options);


    this.updateMarkers();

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
            icon: self.elements.icon.defaultIcon,
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
            this.vars.markers[j].setIcon(this.elements.icon.activeIcon);
        } else {
            this.vars.markers[j].setIcon(this.elements.icon.defaultIcon);
        }
    }
};


/*
GoogleMap.prototype.clickMarker = function(marker, i) {

};

*/



GoogleMap.prototype.updateInfobox = function(marker) {
    var self = this;

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
