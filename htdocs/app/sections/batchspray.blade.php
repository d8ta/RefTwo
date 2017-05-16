<div class="section section--batchspray section--first-corp">
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
				<h2 class="primary-color batchspray__text--title h1-inner">{{$title}}</h2>
				<h3 class="batchspray__text--subtitle h2 subtitle">{{$subtitle}}</h3>
				<p class="batchspray__text batchspray__text--left batchspray__text--description h2-inner">{!!$description!!}</p>
				<a class="btn btn--icon-text primary-brand-btn" href="{{$button_url}}">
					<i class="btn__icon white-icon"></i>
					<span class="btn__text">{{$buttontext}}</span>
				</a>
			</div>
			{{-- right --}}
			<div class="batchspray__images">	
				<img src="{{$image}}" alt="Image" class="batchspray__images--image" />
			</div>

		</div>
	</div>
</div>