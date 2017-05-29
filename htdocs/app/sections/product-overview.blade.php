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
			<div class="product-overview__text">
				<?php
				$title = $block->getTitle();
				$subtitle = $block->getSubtitle();
				$text = $block->getText();
				?>
				<h2 class="products-overview__text__title">{{$title}}</h2>
				<h3 class="products-overview__text__subtitle">{{$subtitle}}</h3>
				<div class="products-overview__text__text">{{$text}}</div>
			</div>
			<div class="products-overview__listing">
				@foreach($products as $product)
					<div class="products-overview__listing__elem">
						<div class="products-overview__listing__content">
							<div class="products-overview__listing__content__all products-overview__listing__content__image bg-image js-matchheight" style="background-image:url('{!!$imageHelper->getImageUrl($product["image"], "")!!}')">	
							</div>
							<a href="{{$product['link']}}">
							<div class="products-overview__listing__content__all products-overview__listing__content__info js-matchheight">
								<div class="products-overview__listing__content__info__logo">
									<img src="{!!$imageHelper->getImageUrl($product['logo'], '')!!}" alt="">
								</div>
								<div class="products-overview__listing__content__info__description">
									<div>{{$product['description']}}</div>
								</div>
								<a class="products-overview__listing__content__info__link btn btn--yellow" href="{{$product['link']}}">{{$product['linktext']}}</a>
							</div>
							</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>