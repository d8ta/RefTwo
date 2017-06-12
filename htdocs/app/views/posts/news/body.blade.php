<div class="section section--news section--margin">
	<div class="section__content">
		<?php 
			$news = $block->getNews();
			$image_id = $news->getHeaderImage();
			$image = wp_get_attachment_image_src($image_id, 'full');
			$image_meta = wp_get_attachment_metadata($image_id);
		?>
		<div class="news">
			<div class="news__text">
				<div class="news__text__headline">{{$news->getPostTitle()}}</div>
				<div class="news__text__subline">{{$news->getSubline()}}</div>
				<div class="news__text__content editor-content">{!!$news->getContent()!!}</div>	
			</div>
			<div class="news__images">
				<img data-src="{{$image[0]}}" alt="{{$imagge_meta['image_meta']['caption']}}" class="responsive news__images__img" />	
				<img data-src="{{$image[0]}}" alt="{{$imagge_meta['image_meta']['caption']}}" class="responsive news__images__img" />	
				<img data-src="{{$image[0]}}" alt="{{$imagge_meta['image_meta']['caption']}}" class="responsive news__images__img" />	
			</div>
		</div>
	</div>
</div>
