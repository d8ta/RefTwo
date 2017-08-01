<?php
$locations = \Project\Models\Location::allPublished();
$headline = $block->getHeadline();
$subline = $block->getSubline();
?>

<div class="section section--headquarters section--margin">
	<div class="section__content">
		<h2 class="headquarters__headline h1">{{$headline}}</h2>
		<h3 class="headquarters__subline h2">{{$subline}}</h3>
		<div class="headquarters__locations">
			<?php $first = true; ?>
			@foreach($locations as $location)
				@if (isset($location))

					<address class="headquarters__locations__location" data-locationid="{{ $location->getId() }}">
						<div class="headquarters__locations__location__group">
							<span class="headquarters__locations__location__headline h4">{{$location->getTitle()}}</span>
						</div>
						<div class="headquarters__locations__location__group headquarters__locations__location__text editor-content">
							<p>
								@if(strlen($location->getDescription()))<span>{!!$location->getDescription()!!}</span><br>@endif
								<span>{!!$location->getStreet()!!}</span><br>
								<span class="headquarters__locations__location__zip">{{$location->getZip()}}</span> <span>{{$location->getCity()}}</span><br>
								<span>{{$location->getCountry()}}</span>
							</p>
						</div>
						<div class="headquarters__locations__location__group headquarters__locations__location__text editor-content">
							<p>
								<span>T: {{$location->getTel()}}</span><br>
								E: <a href="mailto:{{$location->getEmail()}}">{{$location->getEmail()}}</a>
							</p>
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
