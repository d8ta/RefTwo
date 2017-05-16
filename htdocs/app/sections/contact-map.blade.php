<?php
	/**
	 * @var \Project\Sections\ContactLocations $block
	 */
	$headline = $block->getHeadline();
	$maps = $block->getMaps();
	$branches = $block->getMaps();
?>
<div class="main-inner js-main-inner">
	<div class="section section--fullwidth">
		<div class="section--maps">
			<div class="section__content">
				<h2 class="maps__headline">{{$headline}}</h2>
				<div class="maps">
					<div class="maps__td maps__td--map">
						<div class='maps__map js-google-maps'
							data-disable-default-ui="true"
							data-scrollwheel='false'
							data-zoomcontrol="true"
							data-maptype="locations"
						data-ajaxpins="{{ A365\Wordpress\Helpers\AjaxHelper::getInstance()->getUrl('locations') }}"
						data-ajaxinfobox="{{ A365\Wordpress\Helpers\AjaxHelper::getInstance()->getUrl('maps-infobox') }}"
						data-ajaxinfoboxview="location.infobox-content">
						</div>
					</div>
					<div class="maps__td maps__td--box">
						@include("components.location.maps-infobox")
					</div>
				</div>
			</div>
		</div>
	</div>
</div>