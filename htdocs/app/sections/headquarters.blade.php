<?php
$locations = \Project\Models\Location::allPublished();
?>

<div class="section section--headquarters section--margin">
	<div class="section__content">
		<h1 class="headquarters__headline">Siconnex Standorte</h1>
		<div class="headquarters__locations">
			@foreach($locations as $location)
					@if (isset($location))

					<address class="headquarters__locations__location" data-locationid="{{ $location->getId() }}">
						<div class="headquarters__locations__location__group">
							<span class="headquarters__locations__location__headline">{{$location->getTitle()}}</span>
						</div>
						<div class="headquarters__locations__location__group headquarters__locations__location__text">
							<span>{!!$location->getStreet()!!}</span><br>
							<span class="headquarters__locations__location__zip">{{$location->getZip()}}</span> <span>{{$location->getCity()}}</span><br>
							<span>{{$location->getCountry()}}</span>
						</div>
						<div class="headquarters__locations__location__group headquarters__locations__location__text">
							<span>T: {{$location->getTel()}}</span><br>
							E: <a href="mailto:{{$location->getEmail()}}">{{$location->getEmail()}}</a>
						</div>
					</address>
					@endif
			@endforeach
		</div>	
	</div>
</div>