<div class="section section--corp-info section--first">
	<div class="section__content">
		<?php 
		$title = $block->getTitle();
		$subtitle = $block->getSubtitle();
		$description = $block->getDescription();
		$sectionimg = $block->getSectionimg();
		?>
		<div class="corp-info">

			{{-- left --}}
			<div class="corp-info__text">
				<h2 class="primary-color corp-info__text--title h1-inner">{{$title}}</h2>
				<h3 class="corp-info__text--subtitle h2 subtitle">{{$subtitle}}</h3>
				<p class="corp-info__text corp-info__text--left corp-info__text--description h2-inner">{!!$description!!}</p>
			</div>

			{{-- right --}}
			<div class="corp-info__images">	
				@foreach ($sectionimg as $image)
					<div class="corp-info__images--image">
						<img src="{{$image['image']}}" alt="Section Image" class="corp-info__images--image" />
					</div>
				@endforeach
			</div>

		</div>
	</div>
</div>