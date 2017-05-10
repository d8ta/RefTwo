<?php 
	$techboxes = $block->getBox();
	$mh_group = "technology-boxes-" . rand();
?>
<div class="section section--seventh">
	<div class="section__content">
		<div class="technology-boxes">
			@foreach ($techboxes as $techbox)
			<?php 
			$title = $techbox['title'];
			$description = $techbox['description'];
			?>
			<div class="technology-boxes__box">
				<a href="" class="technology-boxes__box__inner">
					<div class="technology-boxes__box__image bg-image" style="background-image: url({{$techbox['background']}})">
					</div>
					<div class="technology-boxes__box__text js-matchheight" data-mh="{{ $mh_group }}">
						<div class="technology-boxes__box__text--title">
							<h2 class="h4 primary-color">{{$title}}</h2>
						</div>

						<div class="technology-boxes__box__text--description">
							<p class="technology-boxes__box__text--description__clamp h3">{{$description}}</p>
						</div>
						
						<div class="technology-boxes__box__text--link btn--icon-text primary-brand-btn">
							<i class="btn__icon white-icon"></i>
							<span class="btn__text">mehr erfahren</span>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</div>
