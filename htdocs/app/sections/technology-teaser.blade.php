<div class="section section--technology-teaser">
	<div class="section__content">
		<div class="technology-teaser">
			<?php
			$title = $block->getTitle();
			$subtitle = $block->getSubtitle();
			$description = $block->getDescription();
			?>
			<div class="technology-teaser__inner">
				<h1 class="h1">{{$title}}</h1>
				<h2 class="h2">{{$subtitle}}</h2>
				<h3 class="h3">{{$description}}</h3>
			</div>
		</div>
	</div>
</div>