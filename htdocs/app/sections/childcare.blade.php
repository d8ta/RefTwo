<?php 
	$slides = $block->getSlides();
?>
<div class="section section--margin">
	<div class="section section--fullwidth">
		<div class="section__content">	
 			<div class="childcare @if(count($slides) > 1) js-owl-carousel owl-carousel @endif">
				@foreach ($slides as $slide)
				<?php 
				$background = $slide['background'];
				$title = $slide['title'];
				$subtitle = $slide['subtitle'];
				$description = $slide['description'];
				?>
				<div>
					<div class="childcare__image bg-image" style="background-image: url({{$background}})">
					</div>
					<div class="childcare__box">
						<div class="childcare__box__text">
							<h2 class="childcare__box__text__title">{{$title}}</h2>
							<h3 class="childcare__box__text__subtitle">{{$subtitle}}</h3>
							<div class="childcare__box__text__description">{!!$description!!}</div>

						</div>	
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>