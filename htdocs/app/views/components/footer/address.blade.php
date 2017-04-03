@if (isset($location))
	<address class="address">
		<div class="address__group">
			<div class="address__headline">	
				<span>{{$location->getTitle()}}</span>
			</div>
		</div>
		<div class="address__group">
			<span>{{$location->getStreet()}}</span><br>
			<span class="address__zip">{{$location->getZip()}}</span> <span>{{$location->getCity()}}</span><br>
			<span>{{$location->getCountry()}}</span>
		</div>
		<div class="address__group">
			<span>{{$location->getTel()}}</span><br>
			<a class="bold-link" href="mailto:{{$location->getEmail()}}">{{$location->getEmail()}}</a>
		</div>
	</address>
@endif