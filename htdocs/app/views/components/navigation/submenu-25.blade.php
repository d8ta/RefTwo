<?php
$title = __('Technology Infobox Title');
$description = __('Technology Infobox Text');
$linktext = __('Find out more');
$link_page_id = 25;
?>
<div class="nav-content">
	<a class="nav-content__image-box" href="{{get_permalink(pll_get_post($link_page_id))}}">
		<div class="nav-content__image-box__image">
			<div class="nav-content__image-box__image__img bg-image" style="background-image: url('assets/images/nav-menu/menue_technologie.png'); border-radius: .5em"></div>
		</div>
		<div class="nav-content__image-box__text">
			<div class="nav-content__image-box__text__headline">{{ $title }}</div>
			<div class="nav-content__image-box__text__description">{{ $description }}</div>
			<div class="nav-content__image-box__text__link">{{ $linktext }}</div>
		</div>
	</a>
</div>
