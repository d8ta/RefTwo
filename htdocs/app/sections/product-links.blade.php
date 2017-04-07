<?php 
	$links = $block->getLinks();
?>
<div class="section section">
	<div class="section__content">
		<div class="product-links">
			<div class="product-links__inner">
				@foreach ($links as $link)
				<?php 
				$description = $link['description'];
				// $batchimage = $link['batchimage'];
				// $logo = $link['logo'];
				?>
				<div class="product-links__content">
					<img src="/assets/images/layout/Batch_acid.png" alt="Produkt Link" class="product-links__content__image--batch" />
					<img src="/assets/images/layout/Batch_acid_logo.png" alt="Batchspray Logo" class="product-links__content__image--logo" />
					<h2 class="product-links__content__image__text h2">
						<div class="product-links__content__image__text__clamp">{{$description}}</div>
					</h2>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>