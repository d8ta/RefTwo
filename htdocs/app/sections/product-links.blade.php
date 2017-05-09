<?php 
	$links = $block->getLinks();
?>
<div class="section section--product-links">
	<div class="section__content">
		<div class="product-links">
			<div class="product-links__inner">
				@foreach ($links as $link)
				<?php 
				$description = $link['description'];
				$batchimage = $link['image'];
				$logo = $link['logo'];
				$link = $link['box_url'];
				?>
				<a class="product-links__content" href="{{$link}}">
					<img src="{{$batchimage}}" alt="Produkt Link" class="product-links__content__image--batch" />
					<div class="product-links__content__image--logogroup">
						<img src="{{$logo}}" alt="Batchspray Logo" class="product-links__content__image--logo" />
						<h3 class="product-links__content__image__text h3>">
							<div class="product-links__content__image__text__clamp">{{$description}}</div>
						</h3>
					</div>
				</a>
				@endforeach
			</div>
		</div>
	</div>
</div>