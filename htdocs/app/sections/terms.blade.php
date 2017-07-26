<?php 
$title = $block->getTitle();
$left = $block->getLeft();
$right = $block->getRight();
?>
<div class="section section--margin-xxxl">
	<div class="section__content">
		<div class="terms">
			<div class="terms__info">
				<h2 class="terms__info__text__headline">{{$title}}</h2>
				<div class="terms__info__text">
					<div class="terms__info__text terms__info__text__editor editor-content">{!!$left!!}</div>
					<div class="terms__info__text terms__info__text__editor editor-content">{!!$right!!}</div>
				</div>
			</div>
		</div>
	</div>
</div>