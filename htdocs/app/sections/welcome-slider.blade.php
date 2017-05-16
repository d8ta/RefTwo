<?php 
	$slides = $block->getSlides();
?>
<div class="section section--fullwidth">
	<div class="section__content">
		<div class="welcome-slider @if(count($slides) > 1) js-owl-carousel owl-carousel @endif">
			@foreach ($slides as $slide)
				<?php 
				$title = $slide['title'];
				$pretitle = $slide['pretitle'];
				$description = $slide['description'];
				$buttontext = $slide['button_text'];
				$button_url = $slide['button_url'];
				?>
				<div class="welcome-slider__slide">
					<div class="welcome-slider__slide__image bg-image" style="background-image: url({{$slide['background']}})">
					</div>
					<div class="welcome-slider__slide__inner">
						<div class="welcome-slider__slide__text">
							<div class="welcome-slider__slide__text__table">
								<div class="welcome-slider__slide__text__td">
									<div class="welcome-slider__slide__text__inner">
										<h1 class="welcome-slider__slide__text__pretitle">{{$pretitle}}</h1>
										<h2 class="welcome-slider__slide__text__title">{{$title}}</h2>
										<p class="welcome-slider__slide__text__description">{{$description}}</p>
									</div>
									<a class="btn" href="{{$button_url}}">
										{{$buttontext}}
									</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>							
			@endforeach
		</div>
	</div>
</div>