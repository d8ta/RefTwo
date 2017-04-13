<div class="section section--fullwidth">
	<div class="section__content">
		<div class="environment">
				<?php 
				$background = $block->getBackground();
				$title = $block->getTitle();
				$subtitle = $block->getSubtitle();
				$description = $block->getDescription();
				?>
				<div class="environment__image bg-image" style="background-image: url({{$background}})"></div>
				<div class="environment__box">
				<div class="environment__box__text">
					<h2 class="h1">{{$title}}</h2>
					<h2 class="h2">{{$subtitle}}</h2>
					<h3 class="h3">{!!$description!!}</h3>
				</div>	
			</div>
		</div>
	</div>
</div>