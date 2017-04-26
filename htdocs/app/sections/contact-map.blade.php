<?php
	/**
	 * @var \Project\Sections\ContactLocations $block
	 */
	$headline = $block->getHeadline();
	$maps = $block->getMaps();

	// var_dump($maps);

	$markers = array();

	$marker = new stdClass;
	$marker->long = 13.033229;
	$marker->lat = 47.811195;
	$marker->image = '/assets/images/marker.png';
	$marker->clickable = false;
	$marker->scaledSize = new stdClass;
	$marker->scaledSize->width = 32;
	$marker->scaledSize->height = 40;
	
	$marker->origin = new stdClass;
	$marker->origin->x = 1000;
	$marker->origin->y = 1000;

	$markers[] = $marker;

	$marker2 = new stdClass;
	$marker2->long = 12.033229;
	$marker2->lat = 39.811195;
	$marker2->image = '/assets/images/marker.png';
	$marker2->clickable = false;
	$marker2->scaledSize = new stdClass;
	$marker2->scaledSize->width = 32;
	$marker2->scaledSize->height = 40;
	
	$marker2->origin = new stdClass;
	$marker2->origin->x = 1000;
	$marker2->origin->y = 1000;

	$markers[] = $marker2;

	$markers = json_encode($markers);
	
?>

<div class="main-inner js-main-inner">
	<div class="section project-overview section--fullwidth">
		<div class="section__content">

			<h2 class="h1 primary-color centertext">{{$headline}}</h2>

			<div class="project-overview__maps maps">
				<div class='js-google-maps maps__map'
					data-disable-default-ui="false"
					data-scrollwheel='false'
					data-zoomcontrol="true"
					{{-- data-maptype="locations"
					data-ajaxpins="{{ A365\Wordpress\Helpers\AjaxHelper::getInstance()->getUrl('locations') }}"
					data-ajaxinfobox="{{ A365\Wordpress\Helpers\AjaxHelper::getInstance()->getUrl('location') }}"
					data-ajaxinfoboxview="location.infobox-content" --}}
					data-styles='[ { "elementType": "geometry", "stylers": [ { "color": "#e1eaf2" } ] }, { "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "elementType": "labels.text.fill", "stylers": [ { "color": "#616161" } ] }, { "elementType": "labels.text.stroke", "stylers": [ { "color": "#f5f5f5" } ] }, { "featureType": "administrative", "elementType": "geometry", "stylers": [ { "color": "#a2a4b0" }, { "visibility": "on" }, { "weight": 1.5 } ] }, { "featureType": "administrative.country", "elementType": "geometry", "stylers": [ { "color": "#899dc4" }, { "visibility": "on" }, { "weight": 2 } ] }, { "featureType": "administrative.country", "elementType": "geometry.fill", "stylers": [ { "saturation": -5 } ] }, { "featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [ { "color": "#bdbdbd" } ] }, { "featureType": "administrative.province", "elementType": "geometry", "stylers": [ { "visibility": "off" } ] }, { "featureType": "poi", "elementType": "geometry", "stylers": [ { "color": "#c6d6f7" } ] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [ { "color": "#757575" } ] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [ { "color": "#c7d2de" } ] }, { "featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [ { "color": "#9e9e9e" } ] }, { "featureType": "road", "elementType": "geometry", "stylers": [ { "color": "#ffffff" } ] }, { "featureType": "road.arterial", "elementType": "labels.text.fill", "stylers": [ { "color": "#757575" } ] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "color": "#c8d1e7" } ] }, { "featureType": "road.highway", "elementType": "labels.text.fill", "stylers": [ { "color": "#616161" } ] }, { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [ { "color": "#9e9e9e" } ] }, { "featureType": "transit.line", "elementType": "geometry", "stylers": [ { "color": "#dfe2e8" } ] }, { "featureType": "transit.station", "elementType": "geometry", "stylers": [ { "color": "#eeeeee" } ] }, { "featureType": "water", "elementType": "geometry", "stylers": [ { "color": "#c9c9c9" } ] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [ { "color": "#9e9e9e" } ] } ]'
					data-markers= '{{$markers}}' 
					data-scrollwheel='false' 
					data-zoomcontrol="true" 
					data-clickable="true"
					data-zoom="14">
				</div>
				@include("components.location.maps-infobox")
				
			</div>
		</div>
	</div>
</div>