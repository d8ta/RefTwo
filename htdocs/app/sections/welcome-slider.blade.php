<?php 

	$slides = $block->getSlides();
	$pretitle = $block->getPretitle();
	$title = $block->getTitle();
	$description = $block->getDescription();
	$links = $block->getImages();
?>

<div class="welcome-slider">
	<div class="welcome-slider__inner">
		@foreach ($slides as $slide)
			<div class="welcome-slider__slide">
				<div class="welcome-slider__slide__image bg-image" style="background-image: url({{$slide['background']}})">
					
				</div>
				<div class="welcome-slider__slide__text">
					<div class="welcome-slider__slide__text__table">
						<div class="welcome-slider__slide__text__table__td">
							<h5 class="h5">Siconnex Halbleiter</h5>
							<br>
							<h1 class="h1">Willkommen in der Zukunft.</h1>
							<br>
							<h2 class="h2">Lorem ipsum dolor sit amet, consectetur adipisicing elit Hic.</h2>
							<br>
							<button class="welcome-slider__slide__text__inner__button" type="button">Lernen Sie uns kennen!</button>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>