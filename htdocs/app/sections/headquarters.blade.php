<?php
$locations = \Project\Models\Location::allPublished();
$headline = $block->getHeadline();
$subline = $block->getSubline();
?>

<div class="section section--headquarters section--margin">
	<div class="section__content">
		<h2 class="headquarters__headline">{{$headline}}</h2>
		<h2 class="headquarters__subline">{{$subline}}</h2>
		<div class="headquarters__locations">
			<?php $first = true; ?>
			@foreach($locations as $location)
				@if (isset($location))

					<address class="headquarters__locations__location" data-locationid="{{ $location->getId() }}">
						<div class="headquarters__locations__location__group">
							<span class="headquarters__locations__location__headline">{{$location->getTitle()}}</span>
						</div>
						<div class="headquarters__locations__location__group headquarters__locations__location__text">
							@if(strlen($location->getDescription()))<span>{!!$location->getDescription()!!}</span><br>@endif
							<span>{!!$location->getStreet()!!}</span><br>
							<span class="headquarters__locations__location__zip">{{$location->getZip()}}</span> <span>{{$location->getCity()}}</span><br>
							<span>{{$location->getCountry()}}</span>
						</div>
						<div class="headquarters__locations__location__group headquarters__locations__location__text">
							<span>T: {{$location->getTel()}}</span><br>
							E: <a href="mailto:{{$location->getEmail()}}">{{$location->getEmail()}}</a>
						</div>
					</address>
					@if($first)
						</div><div class="headquarters__locations">
					@endif
					<?php $first = false; ?>
				@endif
			@endforeach
		</div>
	</div>
</div>
