<?php
	/**
	 * @var \Project\Sections\ProductsOverview $block
	 */
	$products = $block->getProducts();
	use A365\Wordpress\Helpers\ImageHelper;
	$imageHelper = ImageHelper::getInstance();
?>
	
<section class="section section--margin-md">
	<div class="section__content">
		<div class="products-overview">
			<div class="products-overview__listing">
			@foreach($products as $product)
				<div class="products-overview__listing__elem">
					<div class="products-overview__listing__content">
						<div class="products-overview__listing__content__image bg-image" style="background:url('{!!$imageHelper->getImageUrl($product["image"], "")!!}')"></div>
						<div class="products-overview__listing__content__info">
							<div class="products-overview__listing__content__info__logo">
								<img src="{!!$imageHelper->getImageUrl($product['logo'], '')!!}" alt="">
							</div>
							<div class="products-overview__listing__content__info__description js-matchheight">
								<p>{{$product['description']}}</p>
							</div>
							<div class="products-overview__listing__content__info__link btn btn--yellow">{{$product['linktext']}}</div>
						</div>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div>
</section>