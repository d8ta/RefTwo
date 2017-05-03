<?php 
	$slides = $block->getSlides();
?>
<div class="section--welcome">
	<div class="section section--fullwidth">
		<div class="section__content">
			<div class="margin">
				<div class="welcome-slider @if(count($slides) > 1) js-owl-carousel owl-carousel @endif">
					@foreach ($slides as $slide)
					<?php 
					$title = $slide['title'];
					$pretitle = $slide['pretitle'];
					$description = $slide['description'];
					$buttontext = $slide['button_text'];
					?>
					<div class="welcome-slider__slide">
						<div class="welcome-slider__slide__inner">
							<div class="welcome-slider__slide__inner__image bg-image" style="background-image: url({{$slide['background']}})">
							</div>
							<div class="welcome-slider__slide__inner__text">
								<div class="welcome-slider__slide__inner__text__table">
									<div class="welcome-slider__slide__inner__text__table__td">
										<h1 class="h5 welcome-slider__slide__inner__text__pretitle">{{$pretitle}}</h1>
										<h2 class="h1 welcome-slider__slide__inner__text__title">{{$title}}</h2>
										<h2 class="h2 welcome-slider__slide__inner__text__description">{{$description}}</h2>
										<button class="welcome-slider__slide__inner__text__table__td btn--icon-text" type="button">
											<i class="btn__icon primary-color"></i>
											<span class="btn__text">{{$buttontext}}</span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>							
					@endforeach
				</div>
			</div>
		</div>
	</div>	
</div>