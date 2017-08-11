<?php
$blocks = Project\Application::getInstance()->getConfig('posts.news.blocks');
?>
@extends('layouts.master')

@section('content')
	@foreach($blocks as $class)
		<?php
		$block = new $class;
		$block->setNews($news);
		?>
		{!!$block->toHtml()!!}
	@endforeach
@endsection