<?php 
	$links = $block->getLinks();
?>
<div class="section section--margin-md">
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
		<div class="product-teaser__links">
			<div class="product-teaser__links__inner">
				@foreach ($links as $link) 
				<?php 
				$description = $link['description'];
				$image = $link['image'];
				$logo = $link['logo'];
				$link = $link['box_url'];
				?>
				<a class="product-teaser__links__link" href="{{$link}}">
					<div class="product-teaser__links__link__image">
						<img src="{{$image}}" alt="Produkt Link" class="product-teaser__links__link__image__img" />
					</div>
					<div class="product-teaser__links__link__text">
						<img src="{{$logo}}" alt="Batchspray Logo" class="product-teaser__links__link__text__logo" />
						<div class="product-teaser__links__link__text__text">
							{{$description}}
						</div>
					</div>
				</a>
				@endforeach
			</div>
		</div>
	</div>
</div>