<div class="section section--margin-md">
	<div class="section__content">
		<div class="margin">
			<div class="customers-teaser">
				<?php
                $title = $block->getTitle();
                $subtitle = $block->getSubtitle();
                $description = $block->getDescription();
                ?>
			  <div class="customers-teaser__inner">
					<h2 class="customers-teaser__inner customers-teaser__inner__title">{{$title}}</h2>
					<h3 class="customers-teaser__inner customers-teaser__inner__subtitle">{{$subtitle}}</h3>
					<div class="customers-teaser__inner__textbox">
							<div class="customers-teaser__inner__description">{!!$description!!}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
