<div class="section section--batchspray-detail section--margin">
	<div class="section__content">
		<div class="margin">
			<div class="batchspray-detail">
				<div class="batchspray-detail__image">	
					<?php 
					$title = $block->getTitle();
					$subtitle = $block->getSubtitle();
					$descriptionleft = $block->getDescriptionLeft();
					$descriptionmiddle = $block->getDescriptionMiddle();
					$descriptionright = $block->getDescriptionRight();
					$sectionimg = $block->getImage();
					?>
					<div>
						<img src="{{$sectionimg}}" alt="Section Image" class="batchspray-image" />
					</div>
				</div>
				<div class="batchspray-detail__text">
					<h2 class="h2">{{$title}}</h2>
					<h3 class="">{{$subtitle}}</h3>
					<div class="batchspray-detail__text__enumerate">
						<h3 class="batchspray-detail__text__enumerate--left">{!!$descriptionleft!!}</h3>
						<h3 class="batchspray-detail__text__enumerate--middle">{!!$descriptionmiddle!!}</h3>
						<h3 class="batchspray-detail__text__enumerate--right">{!!$descriptionright!!}</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>