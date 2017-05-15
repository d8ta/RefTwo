<?php
$config = [
	"mail" => [
		"from" => getenv('MAIL_FROM'),
		"to" => getenv('MAIL_TO'),
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
