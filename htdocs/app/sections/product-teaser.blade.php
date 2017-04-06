<?php 
$teaser = $block->getTeaser();
?>
<div class="section section--product-teaser">
	<div class="section__content">
		<div class="product-teaser">
			<?php
 			$title = $teaser['title'];
			$description = $teaser['description'];
			$buttontext = $teaser['button_text'];
			?>
			<div class="product-teaser__inner">
				<h1 class="h1">Titel</h1>
				<br>
				<h2 class="h2">Subtitle</h2>
				<br>
				<h3 class="h3">Description</h3>
				<br>
				<button class="product-teaser btn btn--icon-text" type="button">
				<i class="btn__icon"></i>
				<span class="btn__text">Buttontext</span>
				</button>
			</div>
		</div>
	</div>
</div>