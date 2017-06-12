<div class="section section--news section--margin">
	<div class="section__content">
		<?php 
			$news = $block->getNews();
		?>
		<div class="news">
			<div class="news__headline">{{$news->getPostTitle()}}</div>
			<div class="news__intro">{!!$news->getIntro()!!}</div>
		</div>
	</div>
</div>
