<?php
	$slides = $block->getSlides();
?>
<div class="section section--fullwidth section--margin">
	<div class="section__content">
		<div class="environment @if(count($slides) > 1) js-owl-carousel owl-carousel @endif">
			@foreach ($slides as $slide)
				<?php
					$background = $slide['background'];
					$title = $slide['title'];
					$subtitle = $slide['subtitle'];
					$description = $slide['description'];
					$textright = $slide['textright'];
					?>
				<div class="environment__slide @if($textright) environment__slide--text-right @endif">
					<div class="environment__image bg-image" style="background-image: url({{$background}})">
					</div>
					<div class="environment__box">
						<div class="table table--fullheight">
							<div class="table__td">
								<div class="environment__box__text">
									<h2 class="environment__box__text__title">{!!$title!!}</h2>
									<h3 class="environment__box__text__subtitle">{{$subtitle}}</h3>
									<div class="environment__box__text__description">{!!$description!!}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
