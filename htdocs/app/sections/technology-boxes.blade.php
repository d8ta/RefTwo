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
			<a href="" class="technology-boxes__box">
				<div class="technology-boxes__box__image bg-image" style="background-image: url({{$techbox['background']}})">
				</div>
				<div class="technology-boxes__box__text">
					<div class="js-matchheight" data-mh="{{ $mh_group }}">
						<h2 class="technology-boxes__box__text__title">{{$title}}</h2>

						<div class="technology-boxes__box__text__description">
							{{$description}}
						</div>
					</div>
					
					<div class="technology-boxes__box__text__link btn--icon-text primary-brand-btn">
						<i class="btn__icon white-icon"></i>
						<span class="btn__text">mehr erfahren</span>
					</div>
				</div>
			</a>
			@endforeach
		</div>
	</div>
</div>
