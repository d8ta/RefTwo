<?php
	
	$news = $block->getNews();

	$image_id = $news->getHeaderImage();
	$image = wp_get_attachment_image_src($image_id, 'full');
	$image_meta = wp_get_attachment_metadata($image_id);


?>

<div>{!!$news->getContent()!!}</div>
<img data-src="{{$image[0]}}" alt="{{$image_meta['image_meta']['caption']}}" class="responsive" />