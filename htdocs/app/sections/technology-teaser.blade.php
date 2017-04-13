<div class="section section--technology-teaser">
	<div class="section__content">
		<div class="technology-teaser">
			<?php
			$title = $block->getTitle();
			$subtitle = $block->getSubtitle();
			$description = $block->getDescription();
			?>
			<div class="technology-teaser__inner">
				<h2 class="h1 primary-color">{{$title}}</h2>
				<h2 class="h2 subtitle-color">{{$subtitle}}</h2>
				<h3 class="h3">{{$description}}</h3>
			</div>
		</div>
	</div>
</div>