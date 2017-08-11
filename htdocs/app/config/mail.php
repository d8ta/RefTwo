<?php
$config = [
	"mail" => [
		"from" => getenv('MAIL_FROM'),
		"to_service" => getenv('MAIL_TO_SERVICE'),
		"to_sales" => getenv('MAIL_TO_SALES'),
		"to_purchase" => getenv('MAIL_TO_PURCHASE'),
		"to_career" => getenv('MAIL_TO_CAREER'),
		// "to" => getenv(),
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
