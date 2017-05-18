<?php
$locations = \Project\Models\Location::allPublished();
?>

<div class="section section--headquarters section--margin">
	<div class="section__content">
		<h1 class="headquarters__headline">Siconnex Standorte</h1>
		<div class="headquarters__locations">
			@foreach($locations as $location)
				<div class="headquarters__locations__location" data-locationid="{{ $location->getId() }}">
				
					{{-- @include("components.location.address") --}}

					@if (isset($location))
					<address class="location-address">
						<div class="location-address__group">
							<span class="h2 location-address__headline">{{$location->getTitle()}}</span>
						</div>
						<div class="location-address__group location-address__text">
							<span>{!!$location->getStreet()!!}</span><br>
							<span class="location-address__zip">{{$location->getZip()}}</span> <span>{{$location->getCity()}}</span><br>
							<span>{{$location->getCountry()}}</span>
						</div>
						<div class="location-address__group location-address__text">
							<span>T: {{$location->getTel()}}</span><br>
							E: <a href="mailto:{{$location->getEmail()}}">{{$location->getEmail()}}</a>
						</div>
					</address>
					@endif

				</div>
			@endforeach
		</div>
				
	</div>
</div>