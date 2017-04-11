<div class="section section--customers-teaser">
	<div class="section__content">
		<div class="customers-teaser">
			<?php
			$title = $block->getTitle();
			$subtitle = $block->getSubtitle();
			$description_left = $block->getDescriptionLeft();
			$description_right = $block->getDescriptionRight();
			?>
			<div class="customers-teaser__inner">
				<h1 class="h1">{{$title}}</h1>
				<h2 class="h2">{{$subtitle}}</h2>
				<div class="customers-teaser__inner__textboxes">
					<div class="customers-teaser__inner__textboxes__box--left">
						<h3 class="h3">{!!$description_left!!}</h3>
					</div>
					<div class="customers-teaser__inner__textboxes__box--right">
						<h3 class="h3">{!!$description_right!!}</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>