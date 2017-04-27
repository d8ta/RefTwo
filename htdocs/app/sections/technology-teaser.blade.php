<div class="section section--technology-teaser">
	<div class="section__content">
		<div class="margin-teaser">	
			<div class="technology-teaser">
				<?php
				$title = $block->getTitle();
				$subtitle = $block->getSubtitle();
				$description = $block->getDescription();
				?>
				<div class="technology-teaser__inner">
					<div class="technology-teaser__inner__title">
						<h2 class="h1 primary-color">{{$title}}</h2>
					</div>	
					<div class="technology-teaser__inner__subtitle">
						<h2 class="h2 subtitle-color">{{$subtitle}}</h2>
					</div>				
					<div class="technology-teaser__inner__description">
						<h3 class="h3">{{$description}}</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>