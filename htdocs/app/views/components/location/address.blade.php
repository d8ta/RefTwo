@if (isset($location))
	<address class="location-address">
		<div class="location-address__group">
			<span class="location-address__headline h3">{{$location->getTitle()}}</span>
		</div>
		<div class="location-address__group location-address__text editor-content">
			<p>
				@if(strlen($location->getDescription()))<span>{!!$location->getDescription()!!}</span><br>@endif
				<span>{!!$location->getStreet()!!}</span><br>
				<span class="headquarters__locations__location__zip">{{$location->getZip()}}</span> <span>{{$location->getCity()}}</span><br>
				<span><?php echo __('Tel'); ?>: {{$location->getTel()}}</span><br>
				@if($location->getFax() && strlen($location->getFax()))<span><?php echo __('Fax'); ?>: {{$location->getFax()}}</span><br>@endif
				<?php echo __('E-Mail'); ?>: <a href="mailto:{{$location->getEmail()}}">{{$location->getEmail()}}</a>
			</p>
		</div>
	</address>
@endif