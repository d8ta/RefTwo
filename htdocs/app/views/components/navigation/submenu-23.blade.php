<?php
$products = array();

$products[] = array(
    "text" => __("BATCHSPRAY<span class='symbols'>®</span> Acid"),
    "page-id" => 344,
    "image" => "batch_acid.jpg"
);

$products[] = array(
    "text" => __("BATCHSPRAY<span class='symbols'>®</span> Solvent"),
    "page-id" => 346,
    "image" => "batch_solvent.jpg"
);

$products[] = array(
    "text" => __("BATCHSPRAY<span class='symbols'>®</span> Autoload"),
    "page-id" => 348,
    "image" => "batch_auto.jpg"
);

?>
<div class="nav-content">
	<div class="nav-content__side-boxes">
		@foreach($products as $product)
			<a class="nav-content__side-boxes__box" href="{{get_permalink(pll_get_post($product['page-id']))}}">
				<div class="nav-content__side-boxes__box__image">
					<div class="nav-content__side-boxes__box__image__img bg-image" style="background-image: url('assets/images/nav-menu/{{$product['image']}}')"></div>
				</div>
				<div class="nav-content__side-boxes__box__text">
					{!!$product['text']!!}
				</div>
			</a>
		@endforeach
	</div>
</div>
