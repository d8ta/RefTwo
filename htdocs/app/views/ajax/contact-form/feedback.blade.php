<?php

$logo = Project\Application::getInstance()->getConfig('media.logo');
$client = Project\Application::getInstance()->getConfig('client');

use A365\Wordpress\Helpers\Acf\OptionsHelper;
$optionsHelper = OptionsHelper::getInstance();

$label_message = __('Your Message');
$label_thank = __('Thank you for your message');
$label_soon = __('We will respond as soon as possible.');
$label_greets = __('Best regards,');

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h2>{{$label_thank}}</h2>	
	<p>{{$label_soon}}</p>


	@if($message)
		<p>
			<strong>{{$label_message}}</strong><br>
			<span style="font-style: italic">{!!nl2br($message)!!}</span>
		</p>
	@endif

	<p>&nbsp;</p>
	<p>{{$label_greets}}<br>Siconnex customized solutions GmbH</p>
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
