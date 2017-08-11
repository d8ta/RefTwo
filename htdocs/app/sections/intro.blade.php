<?php 
$title = $block->getHeadline();
$text = $block->getText();
$align = $block->getAlign();
$fontsize = $block->getFontsize();
?>
<div class="section section--margin">
	<div class="section__content">
		<div class="intro intro--{{$align}} intro--font-{{$fontsize}}">
			<div class="intro__wrapper">
				<h2 class="intro__headline">{{$title}}</h2>
				<div class="editor-content">{!!$text!!}</div>
			</div>
		</div>
	</div>
</div>