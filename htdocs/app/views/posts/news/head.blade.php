<div class="section section--news section--margin">
	<div class="section__content">
<?php
	$news = $block->getNews();
	$image_id = $news->getHeaderImage();
	$image = wp_get_attachment_image_src($image_id, 'full');
	$image_meta = wp_get_attachment_metadata($image_id);
?>
	</div>
</div>
