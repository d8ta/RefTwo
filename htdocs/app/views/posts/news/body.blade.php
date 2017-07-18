<div class="section section--news section--margin">
	<div class="section__content">
		<?php 
			$news = $block->getNews();
			$images = $news->getImages();
		?>
		<div class="news">
			<div class="news__text">
				<div class="news__text__headline">{{$news->getPostTitle()}}</div>
				<div class="news__text__subline">{!!$news->getSubline()!!}</div>
				<div class="news__text__content editor-content">{!!$news->getContent()!!}</div>	
			</div>
			<div class="news__images">
				@foreach($images as $img)
					<img src="{{$img['url']}}" alt="{{$news->getPostTitle()}}" class="responsive news__images__img" />	
				@endforeach
			</div>
		</div>
	</div>
</div>
