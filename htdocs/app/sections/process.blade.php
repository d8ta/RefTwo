<?php
$sections = $block->getSections();
$title = $block->getTitle();
?>
<div class="section section--margin-xl">
	<div class="section__content">
		<div class="process">
			<h2 class="process__info__text__title">{{$title}}</h2>
			@foreach ($sections as $section)
			<?php
            $image = $section['image'];
            $url = $section['url'];
            $left = $section['left'];
            $middle = $section['middle'];
            $right = $section['right'];
            ?>
			<div class="process__info">
				<div class="process__info__text">
					<a href="{{$url}}">
						<img src="{{$image}}" alt="application Image" class="process__info__text__image" />
					</a>
					<div class="process__info__text process__info__text__editor__left editor-content">{!!$left!!}</div>
					<div class="process__info__text process__info__text__editor__middle editor-content">{!!$middle!!}</div>
					<div class="process__info__text process__info__text__editor__right editor-content">{!!$right!!}</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
