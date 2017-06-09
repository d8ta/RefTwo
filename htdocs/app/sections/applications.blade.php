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
				<div class="applications__info__text">
					<h2 class="applications__info__text__title">{{$title}}</h2>
					<div class="applications__info__text__description">{{$description}}</div>
					<img src="{{$image}}" alt="application Image" class="applications__info__text__image" />
					<div class="applications__info__text applications__info__text__editor editor-content">{!!$left!!}</div>		
					<div class="applications__info__text applications__info__text__editor__middle editor-content">{!!$middle!!}</div>
					<div class="applications__info__text applications__info__text__editor editor-content">{!!$right!!}</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>