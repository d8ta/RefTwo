<div class="section section--corp-info section--margin">
	<div class="section__content">
		<?php 
		$title = $block->getTitle();
		$subtitle = $block->getSubtitle();
		$description = $block->getDescription();
		$logo = $block->getLogo();
		$sectionimg = $block->getSectionimg();
		?>
		<div class="corp-info">

			{{-- left --}}
			<div class="corp-info__text">
				<h2 class="corp-info__text__title">{{$title}}</h2>
				<h3 class="corp-info__text__subtitle">{{$subtitle}}</h3>
				<div class="corp-info__text__description editor-content">{!!$description!!}</div>
				<?php if ($logo) { ?>
					<img src="assets/images/icons/{{$logo}}.svg" class="corp-info__text__logo" alt="{{$logo}}" />
				<?php } ?>

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