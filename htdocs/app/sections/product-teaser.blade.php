<div class="section section--third">
	<div class="section__content">
		<div class="">
			<div class="product-teaser">
				<?php
				$title = $block->getTitle();
				$subtitle = $block->getSubtitle();
				$description = $block->getDescription();
				$button_text = $block->getButtonText();
				$button_url = $block->getButtonUrl();
				?>
				<div class="product-teaser__inner">
					<h2 class="product-teaser__inner__title">{{$title}}</h2>
					<h3 class="product-teaser__inner__subtitle">{{$subtitle}}</h3>
					<div class="product-teaser__inner__description">{{$description}}</div>
					<div class="product-teaser__inner__button">
						<a class="btn btn--yellow" href="#">
							{{$button_text}}
						</a>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>