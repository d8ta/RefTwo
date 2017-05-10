<div class="section section--seventh-corp">
	<div class="section__content">
		<div class="margin">
			<div class="customers-teaser">
				<?php
				$title = $block->getTitle();
				$subtitle = $block->getSubtitle();
				$description_left = $block->getDescriptionLeft();
				$description_right = $block->getDescriptionRight();
				?>
				<div class="customers-teaser__inner">
					<h2 class="h1-inner primary-color customers-teaser__inner customers-teaser__inner--title">{{$title}}</h2>
					<h3 class="h2 subtitle customers-teaser__inner customers-teaser__inner--subtitle">{{$subtitle}}</h3>
					<div class="customers-teaser__inner__textbox">
						<div class="customers-teaser__inner__textbox__left">
							<p class="h2-inner">{!!$description_left!!}</p>
						</div>
						<div class="customers-teaser__inner__textbox__right">
							<p class="h2-inner">{!!$description_right!!}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>