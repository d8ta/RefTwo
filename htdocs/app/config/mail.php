<?php
$config = [
	"mail" => [
		"from" => getenv('MAIL_FROM')?:'selber@kontexten.org',
		"to" => getenv('MAIL_TO')?:'selber@kontexten.org',
		"transport" => getenv('MAIL_TRANSPORT')?:'smtp',
		'smtp' => [
			'host' => getenv('SMTP_HOST'),
			'port' => getenv('SMTP_PORT'),
			'user' => getenv('SMTP_USER'),
			'password' => getenv('SMTP_PASSWORD'),
		],
		'sendmail' => [
			'path' => ini_get('sendmail_path')
		]
	]
];
