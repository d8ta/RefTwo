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
						<h2 class="pagetitle">{{$title}}</h2>
					</div>	
					<div class="technology-teaser__inner__subtitle">
						<h2 class="pagesubtitle">{{$subtitle}}</h2>
					</div>				
					<div class="technology-teaser__inner__description">
						<p class="pagetext">{{$description}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>