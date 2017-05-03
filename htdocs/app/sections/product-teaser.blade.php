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
						<h2 class="pagetitle">{{$title}}</h2>
					</div>
					<div class="product-teaser__inner--subtitle">
						<h2 class="pagesubtitle">{{$subtitle}}</h2>
					</div>
					<div class="product-teaser__inner--description">
						<p class="pagetext">{{$description}}</p>
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