<?php

use A365\Wordpress\Logger;

class A365Welcomedash {
	public function __construct() {
		add_action( 'wp_dashboard_setup', [$this, 'a365_register_widgets'] );
	}

	public function a365_register_widgets() { 
		wp_add_dashboard_widget( 'a365_dashboard_welcome', 'A365 - Willkommen', [$this, 'a365_add_welcome_widget'] );
	}

	public function a365_add_welcome_widget() { 
		echo '
			<!--<img style="width: 100%; max-width: 20em; height: auto;"src="'. site_url('/assets/images/be-logos/logo.jpg') .'">-->
			<h1>Willkommen im CMS von '.get_bloginfo( 'name' ).'.</h1>
		    <p> Die meisten Funktionen sollten selbsterklärend sein, sollten Sie dennoch Fragen zum CMS oder zur Website haben können Sie uns gerne unter <a href="tel:0043662230761">+43 662 23 07 61</a> bzw. unter <a href="mailto:office@a365.at">office@a365.at</a> kontaktieren.</p>
		    <p> Bitte vergessen Sie nicht sich vom System auszuloggen, sollten Sie derzeit auf einem öffentlichen Computer arbeiten.</p> 

		    <p><strong>Ihr A365 Team</strong></p>
		    <a href="https://www.a365.at" target="_blank"><img style="width: 100%; max-width: 20em; height: auto;"src="'.plugin_dir_url(__DIR__).'assets/images/a365-welcome-logo.png"></a>
		';
   }
}

new A365Welcomedash();