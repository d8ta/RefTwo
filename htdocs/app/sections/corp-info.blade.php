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
					<h1 class="corp-info__info__text__headline">{{$title}}</h1>
					<h2 class="corp-info__info__text__subheadline">{{$subtitle}}</h2>
					<br>
					<h3 class="corp-info__info__text__description">{!!$description!!}</h3>
				</div>
		</div>
	</div>
</div>