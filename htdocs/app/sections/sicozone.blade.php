	<div class="section section--fullwidth section--margin">
		<div class="section__content">
			<div class="sicozone">
				<?php 
				$background = $block->getBackground();
				$title = $block->getTitle();
				$subtitle = $block->getSubtitle();
				$description = $block->getDescription();
				?>
				<div class="sicozone__image bg-image" style="background-image: url({{$background}})">
				</div>
				<div class="sicozone__box">
					<div class="sicozone__box__text">
						<h2 class="sicozone__box__text__title">{{$title}}</h2>
						<h3 class="sicozone__box__text__subtitle">{{$subtitle}}</h3>
						<div class="sicozone__box__text__description">{!!$description!!}</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
