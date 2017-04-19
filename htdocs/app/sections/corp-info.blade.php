<div class="section section--corp-info">
	<div class="section__content">
		<div class="margin-more-top">
			<div class="corp-info">
			<?php 
			$title = $block->getTitle();
			$subtitle = $block->getSubtitle();
			$description = $block->getDescription();
			$sectionimg = $block->getSectionimg();
			?>
			@foreach ($sectionimg as $image)
			<div class="corp-info--img">
				<img src="{{$image['image']}}" alt="Section Image" class="corp-image" />
			</div>
			@endforeach
				<div class="corp-info--text">
					<h2 class="h1 primary-color">{{$title}}</h2>
					<h2 class="h2 subtitle-color">{{$subtitle}}</h2>
					<h3 class="h3 description-left">{!!$description!!}</h3>
				</div>
			</div>
		</div>
	</div>
</div>