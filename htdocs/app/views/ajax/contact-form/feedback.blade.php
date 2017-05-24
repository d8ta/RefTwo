<?php

$logo = Project\Application::getInstance()->getConfig('media.logo');
$client = Project\Application::getInstance()->getConfig('client');

use A365\Wordpress\Helpers\Acf\OptionsHelper;
$optionsHelper = OptionsHelper::getInstance();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>Danke für Ihre Nachricht</h2>
	<p>Wir werden Sie in Kürze kontaktieren.</p>


	@if($message)
		<p>
			<strong>Ihre Nachricht</strong><br>
			<span style="font-style: italic">{!!nl2br($message)!!}</span>
		</p>
	@endif

	<p>&nbsp;</p>
	<p>Freundliche Grüße<br>Siconnex</p>
	<p style="margin: 0"><img src="{{get_site_url()}}/{{$logo}}" alt="{{get_bloginfo()}}"></p>
	<p style="margin: 0">
		<address style="font-style: normal">
            <span>{{ $optionsHelper->getOption("company_name") }}</span><br>
            <span>{{ $optionsHelper->getOption("company_street") }}</span> /
            <span>{{ $optionsHelper->getOption("company_postal_code") }}</span> <span>{{ $optionsHelper->getOption("company_city") }}</span> / <span>{{ $optionsHelper->getOption("company_country") }}</span><br>
            T <span>{{ $optionsHelper->getOption("company_phone") }}</span> / <span><a href="mailto:{{ $optionsHelper->getOption("company_email") }}">{{ $optionsHelper->getOption("company_email") }}</a></span>

        </address>
	</p>

</body>
</html>