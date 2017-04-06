<div class="section section--product-teaser">
	<div class="section__content">
		<div class="product-teaser">
			<?php
			$title = $block->getTitle();
			$subtitle = $block->getSubtitle();
			$description = $block->getDescription();
			$button_text = $block->getButtonText();
			$button_url = $block->getButtonUrl();
			?>
			<div class="product-teaser__inner">
				<h1 class="h1">{{$title}}</h1>
				<br>
				<h2 class="h2">{{$subtitle}}</h2>
				<br>
				<h3 class="h3">{{$description}}</h3>
				<br>
				<button class="product-teaser btn btn--icon-text" type="button">
				<i class="btn__icon"></i>
				<span class="btn__text">{{$button_text}}</span>
				</button>
			</div>
		</div>
	</div>
</div>