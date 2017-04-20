<div class="section section--customers-teaser">
	<div class="section__content">
		<div class="margin">
			<div class="customers-teaser">
				<?php
				$title = $block->getTitle();
				$subtitle = $block->getSubtitle();
				$description = $block->getDescription();
				?>
				<div class="customers-teaser__inner">
					<h2 class="h1 primary-color">{{$title}}</h2>
					<h3 class="h2 subtitle-color">{{$subtitle}}</h3>
					<div class="customers-teaser__inner__textbox">
						<h3 class="h3">{!!$description!!}</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>