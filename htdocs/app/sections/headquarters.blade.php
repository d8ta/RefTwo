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
			<?php $i = 0; ?>
			@foreach($locations as $location)
				@if (isset($location))

					@if($i == 0)
						<h4 class="headquarters__locations__headline h4"><?php echo __('Siconnex Headquarter'); ?></h4>
					@endif
					@if($i == 1)
						<h4 class="headquarters__locations__headline h4"><?php echo __('Siconnex Offices'); ?></h4>
					@endif

					<address class="headquarters__locations__location" data-locationid="{{ $location->getId() }}">
						<div class="headquarters__locations__location__group">
							<span class="headquarters__locations__location__headline">{{$location->getTitle()}}</span>
						</div>
						<div class="headquarters__locations__location__group headquarters__locations__location__text editor-content">
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
					
					<?php $i++; ?>
				@endif
			@endforeach
		</div>
	</div>
</div>
