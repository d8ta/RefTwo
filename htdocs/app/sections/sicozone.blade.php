<div class="section section--fullwidth">
	<div class="section__content">
		<div class="margin">
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
						<h2 class="h1 primary-color">{{$title}}</h2>
						<h2 class="h2 subtitle-color">{{$subtitle}}</h2>
							<div class="sicozone__box__text__description">
								<h3 class="sicozone__box__text__description__clamp">{!!$description!!}</h3>
							</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>