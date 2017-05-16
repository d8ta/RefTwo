<div class="section section--product-info section--margin">
	<div class="section__content">
		<div class="margin-more-top">
			<div class="product-info">
				<div class="product-info__images">	
					<?php 
					$title = $block->getTitle();
					$subtitle = $block->getSubtitle();
					$description = $block->getDescription();
					$sectionimg = $block->getSectionimg();
					?>
					@foreach ($sectionimg as $image)
						<div class="product-info__images__img">
							<img src="{{$image['image']}}" alt="Section Image" class="corp-image" />
						</div>
					@endforeach
				</div>
				<div class="product-info__text margin">
					<h2 class="h1 primary-color">{{$title}}</h2>
					<h2 class="h2 subtitle-color">{{$subtitle}}</h2>
					<h3 class="h3 product-info__text--left">{!!$description!!}</h3>
				</div>
			</div>
		</div>
	</div>
</div>