<?php
use A365\Wordpress\Helpers\Acf\OptionsHelper;
$optionsHelper = OptionsHelper::getInstance();
?>

<address class="address">
    <div class="address__headline">{{ $optionsHelper->getOption("company_name") }}</div>
    <div class="address__text">
	    <span>{{ $optionsHelper->getOption("company_street") }}</span><br>
	    <span>{{ $optionsHelper->getOption("company_postal_code") }}</span> <span>{{ $optionsHelper->getOption("company_city") }}</span><br>
	    T: <span>{{ $optionsHelper->getOption("company_phone") }}</span><br>
	    F: <span>{{ $optionsHelper->getOption("company_fax") }}</span><br>
	    E: <span><a href="mailto:{{ $optionsHelper->getOption("company_email") }}">{{ $optionsHelper->getOption("company_email") }}</a></span>
    </div>
    
</address>