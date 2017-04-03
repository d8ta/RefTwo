<?php
$config = [
	"cache" => [
		"enabled" => (bool) getenv('CACHE_ENABLED'),
		'fpc' => [
			'enabled' => (bool) getenv('FPC_ENABLED')
		]
	]
];