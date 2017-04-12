<?php 
	$slides = $block->getSlides();
?>
<div class="section section--fullwidth">
	<div class="section__content">
		<div class="welcome-slider">
			<div class="welcome-slider__inner">
				@foreach ($slides as $slide)
				<?php 
				$title = $slide['title'];
				$pretitle = $slide['pretitle'];
				$description = $slide['description'];
				$buttontext = $slide['button_text'];
				?>
				<div class="welcome-slider__slide">
					<div class="welcome-slider__slide__image bg-image" style="background-image: url({{$slide['background']}})"></div>
					<div class="welcome-slider__slide__text">
						<div class="welcome-slider__slide__text__table">
							<div class="welcome-slider__slide__text__table__td">
								<h5 class="h5">{{$pretitle}}</h5>
								<h1 class="h1">{{$title}}</h1>
								<h2 class="h2">{{$description}}</h2>
								<button class="welcome-slider__slide__text__table__td btn--icon-text" type="button">
									<i class="btn__icon primary-color"></i>
									<span class="btn__text">{{$buttontext}}</span>
								</button>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>