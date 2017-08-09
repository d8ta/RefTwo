function Location() {
    return {
        init: this.init.bind(this),
        getLatLng: this.getLatLng.bind(this),
    };
}

Location.prototype = new Module();
Location.prototype.constructor = Location;

Location.prototype.elements = {};

Location.prototype.vars = {};

Location.prototype.init = function() {

};

Location.prototype.getLatLng = function() {

    if (Cookies.get("lat_geo") && Cookies.get("lng_geo")) {
        return { "lat": Cookies.get("lat_geo"), "lng": Cookies.get("lng_geo") };
    } else if (Cookies.get("lat_ip") && Cookies.get("lng_ip")) {
        return { "lat": Cookies.get("lat_ip"), "lng": Cookies.get("lng_ip") };
    } else {
        return false;
    }
};
