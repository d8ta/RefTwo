<?php
	$news = $block->getNews();
?>

<div>{{$news->getPostTitle()}}</div>
<div>{!!$news->getIntro()!!}</div>
