<div class="section section--batchspray section--first">
	<div class="section__content">
		<?php 
		$title = $block->getTitle();
		$subtitle = $block->getSubtitle();
		$description = $block->getDescription();
		$buttontext = $block->getButtonText();
		$button_url = $block->getButtonUrl();

		$logo = $block->getLogo();
		$image = $block->getImage();
		?>
		<div class="batchspray">

			{{-- left --}}
			<div class="batchspray__text">
				<h2 class="batchspray__text__title">{{$title}}</h2>
				<h3 class="batchspray__text__subtitle">{{$subtitle}}</h3>
				<div class="batchspray__text__description editor-content">{!!$description!!}</div>
				<a class="btn btn--icon-text primary-brand-btn" href="{{$button_url}}">
					<i class="btn__icon white-icon"></i>
					<span class="btn__text">{{$buttontext}}</span>
				</a>
			</div>
			{{-- right --}}
			<div class="batchspray__images">	
				<img src="{{$image}}" alt="Image" class="batchspray__images__image" />
			</div>

		</div>
	</div>
</div>