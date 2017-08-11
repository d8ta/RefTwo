<?php
$sections = $block->getSections();
?>
<div class="section">
	<div class="section__content">
		<div class="applications">
			@foreach ($sections as $section)
			<?php
			$image = $section['image'];
			$title = $section['title'];
			$description = $section['description'];
			$left = $section['left'];
			$middle = $section['middle'];
			$right = $section['right'];
			?>
			<div class="applications__info">
				<h2 class="applications__info__title h1">{!!$title!!}</h2>
				<div class="applications__info__description editor-content">{!!$description!!}</div>

				<div class="applications__info__wrapper">
					<div class="applications__info__image">
						<img src="{{$image}}" alt="application Image" class="applications__info__image__img" />
					</div>
					<div class="applications__info__content">
						<div class="applications__info__content__text editor-content">{!!$left!!}</div>
						<div class="applications__info__content__text editor-content">{!!$middle!!}</div>
						<div class="applications__info__content__text editor-content">{!!$right!!}</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
