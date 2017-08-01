@if (isset($location))
	<address class="location-address">
		<div class="location-address__group">
			<span class="location-address__headline h3">{{$location->getTitle()}}</span>
		</div>
		<div class="location-address__group location-address__text editor-content">
			<p>
				@if(strlen($location->getDescription()))<span>{!!$location->getDescription()!!}</span><br>@endif
				<span>{!!$location->getStreet()!!}</span><br>
				<span class="location-address__zip">{{$location->getZip()}}</span> <span>{{$location->getCity()}}</span><br>
				<span>{{$location->getCountry()}}</span>
			</p>
		</div>
		<div class="location-address__group location-address__text editor-content">
			<p>
				<span>T: {{$location->getTel()}}</span><br>
				E: <a href="mailto:{{$location->getEmail()}}">{{$location->getEmail()}}</a>
			</p>
		</div>
	</address>
@endif