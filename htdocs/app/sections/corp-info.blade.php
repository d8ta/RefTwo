<div class="section section--corp-info section--first-corp">
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
				<h2 class="primary-color corp-info__text__title">{{$title}}</h2>
				<h3 class="corp-info__text__subtitle">{{$subtitle}}</h3>
				<div class="corp-info__text corp-info__text--left corp-info__text__description">{!!$description!!}</div>
			</div>

			{{-- right --}}
			<div class="corp-info__images">	
				@foreach ($sectionimg as $image)
					<div class="corp-info__images__image">
						<img src="{{$image['image']}}" alt="Section Image" class="corp-info__images__image" />
					</div>
				@endforeach
			</div>

		</div>
	</div>
</div>