<?php
$title = __('Career at Siconnex');
$description = __('Leave abandoned paths and go new ways with us!');
// $description = __('Verlassen Sie ausgetretene Pfade und gehen Sie mit uns neue Wege!');
$linktext = __('Apply now');
$link_page_id = 774;
?>
<div class="nav-content">
	<a class="nav-content__image-box" href="{{get_permalink(pll_get_post($link_page_id))}}">
		<div class="nav-content__image-box__image">
			<div class="nav-content__image-box__image__img bg-image" style="background-image: url('assets/images/nav-menu/neu.jpg'); border-radius: .5em"></div>
		</div>
		<div class="nav-content__image-box__text">
			<div class="nav-content__image-box__text__headline">{{ $title }}</div>
			<div class="nav-content__image-box__text__description">{{ $description }}</div>
			<div class="nav-content__image-box__text__link">{{ $linktext }}</div>
		</div>
	</a>
</div>
