<?php
	$techboxes = $block->getBox();
	$mh_group = "technology-boxes-" . rand();
	global $wp;
	$site_url = home_url(add_query_arg(array(),$wp->request)) . '/' . '?p=25/#'; //page id of technologies
?>
<div class="section section--margin-md">
	<div class="section__content">
		<div class="technology-teaser">
			<?php
			$title = $block->getTitle();
			$subtitle = $block->getSubtitle();
			$description = $block->getDescription();
			?>
			<h2 class="technology-teaser__inner__title">{{$title}}</h2>
			<h3 class="technology-teaser__inner__subtitle">{{$subtitle}}</h3>
			<div class="technology-teaser__inner__description">{{$description}}</div>
		</div>

		<div class="technology-teaser__boxes">
			@foreach ($techboxes as $techbox)
			<?php
			$title = $techbox['title'];
			$description = $techbox['description'];
			$link = $techbox['link'];
			$text = $techbox['text'];
			?>
			<a href="{{$site_url}}{{$link}}" class="technology-teaser__boxes__box">
				<div class="technology-teaser__boxes__box__image bg-image" style="background-image: url({{$techbox['background']}})">
				</div>
				<div class="technology-teaser__boxes__box__text">
					<div class="js-matchheight" data-mh="{{ $mh_group }}">
						<h2 class="technology-teaser__boxes__box__text__title">{{$title}}</h2>

						<div class="technology-teaser__boxes__box__text__description">
							{{$description}}
						</div>
					</div>
				</div>
				<div class="technology-teaser__boxes__box__text__link btn btn--yellow">
					<i class="btn__icon white-icon"></i>
					<span class="btn__text">{{$text}}</span>
				</div>
			</a>
			@endforeach
		</div>
	</div>
</div>
