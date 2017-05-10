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
						<h2 class="product-teaser__inner--title h1-inner primary-color">{{$title}}</h2>
						<h3 class="product-teaser__inner--subtitle h2 subtitle">{{$subtitle}}</h3>
						<p class="product-teaser__inner--description h2-inner">{{$description}}</p>
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