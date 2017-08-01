<?php
	/**
	 * @var \Project\Sections\ProductsOverview $block
	 */
	$products = $block->getProducts();
	use A365\Wordpress\Helpers\ImageHelper;
	$imageHelper = ImageHelper::getInstance();
	$mh_group = "products-overview-" . rand();

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
				<h2 class="products-overview__text__title h1">{{$title}}</h2>
				<h3 class="products-overview__text__subtitle h2">{{$subtitle}}</h3>
				<div class="products-overview__text__text editor-content">{{$text}}</div>
			</div>

			<div class="products-overview__listing">
				@foreach($products as $product)
					<div class="products-overview__listing__elem">
						<a href="{{$product['link']}}" class="products-overview__listing__content">
							<div class="products-overview__listing__content__all products-overview__listing__content__image bg-image" style="background-image:url('{!!$imageHelper->getImageUrl($product["image"], "")!!}')">
							</div>
							<div class="products-overview__listing__content__all products-overview__listing__content__info">
								<img class="products-overview__listing__content__info__logo" src="{!!$imageHelper->getImageUrl($product['logo'], '')!!}" alt="Produkt Logo">
								<div class="products-overview__listing__content__info__description js-matchheight" data-mh="{{ $mh_group }}">
									<div class="editor-content">{!!$product['description']!!}</div>
								</div>
								<div class="products-overview__listing__content__info__link btn btn--yellow">{{$product['linktext']}}</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
