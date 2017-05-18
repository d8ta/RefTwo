<?php
$title = __('Siconnex');
$description = __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id praesentium eum.');
$linktext = __('Mehr erfahren');
$link_page_id = 21;
?>
<div class="nav-content">
	<a class="nav-content__image-box" href="{{get_permalink(pll_get_post($link_page_id))}}">
		<div class="nav-content__image-box__image">
			<div class="nav-content__image-box__image__img bg-image" style="background-image: url('assets/images/nav-menu/siconnex.jpg')"></div>
		</div>
		<div class="nav-content__image-box__text">
			<div class="nav-content__image-box__text__headline">{{ $title }}</div>
			<div class="nav-content__image-box__text__description">{{ $description }}</div>
			<div class="nav-content__image-box__text__link">{{ $linktext }}</div>
		</div>
	</a>
</div>