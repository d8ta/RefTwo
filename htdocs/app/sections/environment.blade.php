	<div class="section section--fullwidth section--margin">
		<div class="section__content">
			<div class="environment">
				<?php 
				$background = $block->getBackground();
				$title = $block->getTitle();
				$subtitle = $block->getSubtitle();
				$description = $block->getDescription();
				?>
				<div class="environment__image bg-image" style="background-image: url({{$background}})">
				</div>
				<div class="environment__box">
					<div class="environment__box__text">
						<h2 class="environment__box__text__title">{{$title}}</h2>
						<h3 class="environment__box__text__subtitle">{{$subtitle}}</h3>
						<div class="environment__box__text__description">{!!$description!!}</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
