@if (isset($location))
	<address class="address">
		<div class="address__group">
			<span class="h2 address__headline">{{$location->getTitle()}}</span>
		</div>
		<div class="address__group address__text">
			<span>{{$location->getStreet()}}</span><br>
			<span class="address__zip">{{$location->getZip()}}</span> <span>{{$location->getCity()}}</span><br>
			<span>{{$location->getCountry()}}</span>
		</div>
		<div class="address__group address__text">
			<span>T: {{$location->getTel()}}</span><br>
			E: <a href="mailto:{{$location->getEmail()}}">{{$location->getEmail()}}</a>
		</div>
	</address>
@endif