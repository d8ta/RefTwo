<?php
	/**
	 * @var \Project\Sections\ContactLocations $block
	 */
	$headline = $block->getHeadline();
	
?>

<div class="main-inner js-main-inner">
	<div class="section project-overview section--fullwidth">
		<div class="section__content">

			<h2 class="h-upper-bold center">{{$headline}}</h2>

			{{-- <div class="project-overview__maps maps">
				<div class='js-google-maps maps__map'
					data-disable-default-ui="true"
					data-scrollwheel='false'
					data-zoomcontrol="true"
					data-maptype="locations"
					data-ajaxpins="{{ A365\Wordpress\Helpers\AjaxHelper::getInstance()->getUrl('locations') }}"
					data-ajaxinfobox="{{ A365\Wordpress\Helpers\AjaxHelper::getInstance()->getUrl('location') }}"
					data-ajaxinfoboxview="location.infobox-content"
					>
				</div>
				@include("components.location.maps-infobox")
				
			</div> --}}
		</div>
	</div>
</div>