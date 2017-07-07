<?php
$title = __('Siconnex');
$description = __('As a successful manufacturer of systems for the semiconductor industry, we are active worldwide.');
// $description = __('Als erfolgreicher Hersteller von Anlagen für die Halbleiterindustrie sind wir weltweit tätig.');
$linktext = __('Find out more');
$link_page_id = 772;
?>
<div class="nav-content">
	<a class="nav-content__image-box" href="{{get_permalink($link_page_id)}}">
		<div class="nav-content__image-box__image">
			<div class="nav-content__image-box__image__img bg-image" style="background-image: url('assets/images/nav-menu/siconnex.jpg'); border-radius: .5em"></div>
		</div>
		<div class="nav-content__image-box__text">
			<div class="nav-content__image-box__text__headline">{{ $title }}</div>
			<div class="nav-content__image-box__text__description">{{ $description }}</div>
			<div class="nav-content__image-box__text__link">{{ $linktext }}</div>
		</div>
	</a>
</div>
