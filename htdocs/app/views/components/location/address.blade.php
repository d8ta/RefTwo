@if (isset($location))
	<address class="address">
		<div class="address__group">
			<span>{{$location->getTitle()}}</span><br>
			<span>{{$location->getStreet()}}</span><br>
			<span class="address__zip">{{$location->getZip()}}</span> <span>{{$location->getCity()}}</span><br>
			<span>{{$location->getCountry()}}</span><br>
			<span>{{$location->getTel()}}</span><br>
			<a href="mailto:{{$location->getEmail()}}">{{$location->getEmail()}}</a>
		</div>
	</address>
@endif