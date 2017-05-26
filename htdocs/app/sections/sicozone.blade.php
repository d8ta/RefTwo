	<div class="section section--margin">
		<div class="section__content">
			<div class="sicozone">
				<?php 
				$title = $block->getTitle();
				$subtitle = $block->getSubtitle();
				$description = $block->getDescription();
				?>
				<div class="sicozone__text">
					<h2 class="sicozone__text__title">{{$title}}</h2>
					<h3 class="sicozone__text__subtitle">{{$subtitle}}</h3>
					<div class="sicozone__text__description editor-content">{!!$description!!}</div>
				</div>	
			</div>
		</div>
	</div>
