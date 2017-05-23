<?php
$config = [
	'posts' => [
		'project' => [
			'view' => 'project.index',
			'model' => '\Project\Models\Project'
		],
		'news' => [
			'view' => 'posts.news',
			'model' => '\Project\Models\News',
			'blocks' => [
				'Project\Blocks\News\NewsHead',
				'Project\Blocks\News\NewsBody',
			]
		]
	]
];
