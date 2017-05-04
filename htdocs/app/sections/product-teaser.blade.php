<div class="section section--product-teaser">
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
					<div class="product-teaser__inner--title">
						<h2 class="h1 primary-color">{{$title}}</h2>
					</div>
					<div class="product-teaser__inner--subtitle">
						<h3 class="h2 subtitle">{{$subtitle}}</h3>
					</div>
					<div class="product-teaser__inner--description">
						<p class="h2">{{$description}}</p>
					</div>	
					<div class="product-teaser__inner--button">
						<button class="btn--icon-text primary-brand-btn" type="button">
						<i class="btn__icon white-icon"></i>
						<span class="btn__text">{{$button_text}}</span>
						</button>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>