<?php 
	$researchimg = $block->getResearchImg();
?>
<div class="section section--fullwidth section--margin">
	<div class="section__content">
		<div class="margin">
			<div class="advantages">
				<div class="advantages__content">
					<?php 
					$bigimage = $block->getBigImage();
					$title = $block->getTitle();
					$subtitle = $block->getSubtitle();
					$description = $block->getDescription();					
					?>
					<div class="advantages__content__text">
						<h2 class="advantages__content__text__title">{{$title}}</h2>
						<h3 class="advantages__content__text__description">{{$description}}</h3>
					</div>
					<div class="advantages__content__images">
						<div class="advantages__content__images__big">
							<img src="{{$bigimage}}" alt="Forschungsbild groß" class="advantages__content__images__big__inner" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
				