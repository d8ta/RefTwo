@if (isset($location))
	<address class="location-address">
		<div class="location-address__group">
			<span class="h2 location-address__headline">{{$location->getTitle()}}</span>
		</div>
		<div class="location-address__group location-address__text">
			@if(strlen($location->getDescription()))<span>{!!$location->getDescription()!!}</span><br>@endif
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