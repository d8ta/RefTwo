<div class="section section--customer-teaser">
	<div class="section__content">
		<div class="customer-teaser">
			<?php
			$title = $block->getTitle();
			$subtitle = $block->getSubtitle();
			$description_left = $block->getDescriptionLeft();
			$description_right = $block->getDescriptionRight();
			?>
			<div class="customer-teaser__inner">
				<h1 class="h1">{{$title}}</h1>
				<h2 class="h2">{{$subtitle}}</h2>
				<div class="customer-teaser__inner__textboxes">
					<div class="customer-teaser__inner__textboxes__box--left">
						<h3 class="h3">{!!$description_left!!}</h3>
					</div>
					<div class="customer-teaser__inner__textboxes__box--right">
						<h3 class="h3">{!!$description_right!!}</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>