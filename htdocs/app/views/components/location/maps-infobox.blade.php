<?php
$locations = \Project\Models\Location::allPublished();
$contact_form_id = Project\Application::getInstance()->getConfig('pages.contact-page.id');
?>

<div class="maps__infobox js-google-maps-infobox maps__infobox--locations">
	<div class="maps__infobox__inner">
		<select class="selectbox js-google-maps-locations-select maps__infobox__select">
			@foreach($locations as $location)
				<option value="{{ $location->getId() }}">{{ get_field('country_select', $location->getId()) }}</option>
			@endforeach
		</select>

		<div class="maps__infobox__locations-area">
			<div class="maps__infobox__locations">
				@foreach($locations as $location)
					<div class="maps__infobox__locations__location js-google-maps-locations-item" data-locationid="{{ $location->getId() }}">
						@include("components.location.address")
					</div>
				@endforeach
			</div>
		</div>

		<div class="maps__infobox__button">
			<a class="btn btn--yellow" href="{{get_permalink(pll_get_post($contact_form_id))}}">
				<?php _e('Kontaktformular'); ?>
			</a>
		</div>

	</div>
</div>