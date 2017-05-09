<div class="section section--corp-info section--margin">
	<div class="section__content">
		<?php 
		$title = $block->getTitle();
		$subtitle = $block->getSubtitle();
		$description = $block->getDescription();
		$sectionimg = $block->getSectionimg();
		?>
		<div class="corp-info">
			<div class="corp-info__text">
				<h2 class="h1-inner primary-color">{{$title}}</h2>
				<h3 class="h2 subtitle">{{$subtitle}}</h3>
				<p class="h2-inner corp-info__text corp-info__text--left ">{!!$description!!}</p>
			</div>
			<div class="corp-info__images">	
				@foreach ($sectionimg as $image)
					<div class="corp-info__images--image">
						<img src="{{$image['image']}}" alt="Section Image" class="corp-image" />
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>