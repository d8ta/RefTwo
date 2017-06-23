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

	<h2>Vielen Dank für Ihre Nachricht!</h2>
	<p>Wir bearbeiten sie so rasch wie möglich.</p>
	{{-- <p>Mail wurde gesendet an: {{$sendto}}</p> --}}


	@if($message)
		<p>
			<strong>Ihre Nachricht</strong><br>
			<span style="font-style: italic">{!!nl2br($message)!!}</span>
		</p>
	@endif

	<p>&nbsp;</p>
	<p>Freundliche Grüße,<br>Siconnex customized solutions GmbH</p>
	<!-- <p style="margin: 0"><img src="{{get_site_url()}}/{{$logo}}" alt="{{get_bloginfo()}}"></p> -->
	<p style="margin: 0">
		<address style="font-style: normal">
            <!-- <span>{{ $optionsHelper->getOption("company_name") }}</span><br> -->
            <span>{{ $optionsHelper->getOption("company_street") }}</span>
            <span>{{ $optionsHelper->getOption("company_postal_code") }}</span> <span>{{ $optionsHelper->getOption("company_city") }}</span><span>{{ $optionsHelper->getOption("company_country") }}</span><br>
            <p>Visit us:<a href="http://www.siconnex.com">www.siconnex.com</a></p>
            <p><img src="{{get_site_url()}}/{{$logo}}" alt="{{get_bloginfo()}}"></p>

        </address>
	</p>

</body>
</html>
