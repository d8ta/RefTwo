<?php
$page_id = 21;
?>
<div class="nav-content">
	<a class="nav-content__image-box" href="{{get_permalink(pll_get_post($page_id))}}">
		<div class="nav-content__image-box__image">
			<div class="nav-content__image-box__image__img bg-image" style="background-image: url('assets/images/nav-menu/siconnex.jpg')"></div>
		</div>
		<div class="nav-content__image-box__text">
			<div class="nav-content__image-box__text__headline"><?php _e('Siconnex'); ?></div>
			<div class="nav-content__image-box__text__description"><?php _e('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id praesentium eum.'); ?></div>
			<div class="nav-content__image-box__text__link"><?php _e('Mehr erfahren'); ?></div>
		</div>
	</a>
</div>