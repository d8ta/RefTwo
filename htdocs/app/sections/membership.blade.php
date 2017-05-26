<?php 
	$logos = $block->getLogo();
?>
<div class="section section--margin-md">
	<div class="section__content">
		<div class="membership">
			<?php
			$title = $block->getTitle();
			$subtitle = $block->getSubtitle();
			?>
			<h2 class="membership__inner__title">{{$title}}</h2>
			<h3 class="membership__inner__subtitle">{{$subtitle}}</h3>
		</div>

		<div class="membership__logos">
			@foreach ($logos as $logo)
			<?php 
			$logo = $logo['image'];
			?>
			<img src="{{$logo}}" alt="Section Image" class="membership__logos__logo"/>
			@endforeach
		</div>
	</div>
</div>