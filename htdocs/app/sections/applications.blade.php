<?php 
$image = $block->getImage();
$title = $block->getTitle();
$description = $block->getDescription();
$left = $block->getLeft();
$middle = $block->getMiddle();
$right = $block->getRight();
?>
<div class="section section--margin-xl">
	<div class="section__content">
		<div class="applications">
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
		</div>
	</div>
</div>