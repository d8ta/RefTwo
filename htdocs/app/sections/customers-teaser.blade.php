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
					<h2 class="customers-teaser__inner__title h1">{{$title}}</h2>
					<h3 class="customers-teaser__inner__subtitle h2">{{$subtitle}}</h3>
					<div class="customers-teaser__inner__textbox">
							<div class="customers-teaser__inner__description editor-content">{!!$description!!}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
