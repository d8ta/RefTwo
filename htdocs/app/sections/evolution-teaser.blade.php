<div class="section section--evolution-teaser">
	<div class="section__content">
		<div class="margin">
			<div class="evolution-teaser">
				<?php
				$title = $block->getTitle();
				$subtitle = $block->getSubtitle();
				$description = $block->getDescription();
				?>
				<div class="evolution-teaser__inner">
					<h2 class="h1 primary-color">{{$title}}</h2>
					<div class="evolution-teaser__inner__textbox margin">
						<h3 class="h3">{!!$description!!}</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>