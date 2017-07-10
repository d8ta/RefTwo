<div class="section section--batchspray section--margin-xl">
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
				<h2 class="batchspray__text__title">{!!$title!!}</h2>
				<h3 class="batchspray__text__subtitle">{{$subtitle}}</h3>
				<div class="batchspray__text__description editor-content">{!!$description!!}</div>
				<div class="batchspray__text__footer">
					<a class="btn btn--yellow" href="{{$button_url}}">
						{{$buttontext}}
					</a>
					<img src="{{$logo}}" alt="Logo" class="batchspray__text__logo" />
				</div>
			{{-- right --}}
			</div>
			<div class="batchspray__images">
				<img src="{{$image}}" alt="Image" class="batchspray__images__image" />
			</div>

		</div>
	</div>
</div>
