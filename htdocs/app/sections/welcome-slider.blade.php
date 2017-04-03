<?php 

	$slides = $block->getSlides();
	// $pretitle = $block->getPretitle();
	// $title = $block->getTitle();
	// $description = $block->getDescription();
	// $links = $block->getImages();
?>

<div class="welcome-slider">
	@foreach ($slides as $slide)
		<div class="welcome-slider__slide">
			<div class="welcome-slider__slide__image">
				<img src="{{$slide['background']}}" alt="" />
			</div>
		</div>
	@endforeach

</div>