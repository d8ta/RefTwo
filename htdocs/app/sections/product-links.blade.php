<?php 
	$links = $block->getLinks();
?>
<div class="section section--forth">
	<div class="section__content">
		<div class="product-links">
			<div class="product-links__inner">
				@foreach ($links as $link) 
				<?php 
				$description = $link['description'];
				$image = $link['image'];
				$logo = $link['logo'];
				$link = $link['box_url'];
				?>
				<a class="product-links__link" href="{{$link}}">
					<div class="product-links__link__image">
						<img src="{{$image}}" alt="Produkt Link" class="product-links__link__image__img" />
					</div>
					<div class="product-links__link__text">
						<img src="{{$logo}}" alt="Batchspray Logo" class="product-links__link__text__logo" />
						<div class="product-links__link__text__text">
							{{$description}}
						</div>
					</div>
				</a>
				@endforeach
			</div>
		</div>
	</div>
</div>