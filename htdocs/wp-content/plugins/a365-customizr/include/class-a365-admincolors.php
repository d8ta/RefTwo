<?php

use A365\Wordpress\Logger;

class A365Admincolors {

	private $colorSchemeId = 'a365';

	public function __construct() {
		add_action('admin_init', [$this, 'additional_admin_color_schemes']);
		add_filter('get_user_option_admin_color', [$this, 'change_admin_color']);
		remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

	}
	public function additional_admin_color_schemes() {
	    //Get the theme directory
	    $theme_dir = get_template_directory_uri();
	    wp_admin_css_color(
	        $this->colorSchemeId,
	        __('A365'),
	        admin_url("../assets/css/admin.min.css"),
	      	array('#000000', '#000000', '#000000', '#000000'),
	        array( 'base' => '#000000', 'focus' => '#000000', 'current' => '#000000' )
	    );
	}

	public function change_admin_color($result) {
		return $this->colorSchemeId;
	}
}

new A365Admincolors();


