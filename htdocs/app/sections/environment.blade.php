<div class="section section--third">
	<div class="section section--fullwidth">
		<div class="section__content">
			<div class="environment">
				<?php 
				$background = $block->getBackground();
				$title = $block->getTitle();
				$subtitle = $block->getSubtitle();
				$description = $block->getDescription();
				?>

				{{-- background img --}}
				<div class="environment__image bg-image" style="background-image: url({{$background}})">
				</div>

				{{-- textbos --}}
				<div class="environment__box">
					<div class="environment__box__text">
						<h2 class="h1-inner primary-color environment__box__text__title">{{$title}}</h2>
						<h3 class="h2 subtitle environment__box__text__subtitle">{{$subtitle}}</h3>
							
						<div class="environment__box__text__description">
							<p class="environment__box__text__description__clamp h3">{!!$description!!}</p>
						</div>

					</div>	
				</div>

			</div>
		</div>
	</div>
</div>