<?php 
$sections = $block->getSections();
$title = $block->getTitle();
?>
<div class="section section--margin-xl">
	<div class="section__content">
		<div class="process">
			@foreach ($sections as $section)
			<?php 
			$image = $section['image'];
			$left = $section['left'];
			$middle = $section['middle'];
			$right = $section['right'];
			?>
			<div class="process__info">
				<div class="process__info__text">
					<h2 class="process__info__text__title">{{$title}}</h2>
					<img src="{{$image}}" alt="application Image" class="process__info__text__image" />
					<div class="process__info__text process__info__text__editor editor-content">{!!$left!!}</div>		
					<div class="process__info__text process__info__text__editor__middle editor-content">{!!$middle!!}</div>
					<div class="process__info__text process__info__text__editor editor-content">{!!$right!!}</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>