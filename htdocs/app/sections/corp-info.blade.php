<div class="section section--corp-info">
	<div class="section__content">
		<div class="corp-info">
			<?php 
			$title = $block->getTitle();
			$subtitle = $block->getSubtitle();
			$description = $block->getDescription();
			$sectionimg = $block->getSectionimg();
			?>
			@foreach ($sectionimg as $image)
			<div class="corp-info__info">
				<img src="{{$image['image']}}" alt="Section Image" class="corp-info__info__image" />
			</div>
			@endforeach
				<div class="corp-info__info__text">
					<h2 class="corp-info__info__text__headline h1">{{$title}}</h2>
					<h3 class="corp-info__info__text__subheadline">{{$subtitle}}</h3>
					<h4 class="corp-info__info__text__description">{!!$description!!}</h4>
				</div>
		</div>
	</div>
</div>