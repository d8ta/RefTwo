<?php
$blocks = Project\Application::getInstance()->getConfig('posts.news.blocks');
?>
@extends('layouts.master')

@section('content')
	<div class="theme--product">
		@foreach($blocks as $class)
			<?php
			$block = new $class;
			$block->setNews($news);
			?>
			{!!$block->toHtml()!!}
		@endforeach
	</div>
@endsection