	<div class="section section--margin">
		<div class="section__content">
			<div class="sicozone">
				<?php
                $title = $block->getTitle();
                $subtitle = $block->getSubtitle();
                $description = $block->getDescription();
                ?>
				<div class="sicozone__text">
					<!-- left -->
					<div class="sicozone__text__left">
						<h2 class="sicozone__text__left__title">{{$title}}</h2>
						<h3 class="sicozone__text__left__subtitle">{{$subtitle}}</h3>
					</div>
					<!-- right -->
					<div class="sicozone__text__right">
						<div class="sicozone__text__right__description editor-content">{!!$description!!}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
