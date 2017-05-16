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