<?php

use A365\Wordpress\Logger;

class A365Adminmenu {
	public function __construct() {
		add_action('admin_bar_menu', [$this ,'add_toolbar_items'], 100);
	}

	public function add_toolbar_items($admin_bar){
		$admin_bar->add_menu( array(
			'id'    => 'a365',
			'title' => '<span class="ab-icon"></span><span class="ab-label"> A365',
			'href'  => 'https://a365.at',
			'meta'  => array(
				'title' => __('A365'),
				'target' => '_blank',			
			),
		));
		$admin_bar->add_menu( array(
			'id'    => 'a365-sub-contact',
			'parent' => 'a365',
			'title' => 'Kontakt',
			'href'  => 'https://www.a365.at/#!/Kontakt/',
			'meta'  => array(
				'title' => __('A365 Kontakt'),
				'target' => '_blank',
				'class' => 'a365-contact'
			),
		));		
		$admin_bar->add_menu( array(
			'id'    => 'a365-sub-facebook',
			'parent' => 'a365',
			'title' => 'Facebook',
			'href'  => 'https://www.facebook.com/a365.at/',
			'meta'  => array(
				'title' => __('A365 Facebook'),
				'target' => '_blank',
				'class' => 'a365-facebook'
			),
		));		
		$admin_bar->add_menu( array(
			'id'    => 'a365-sub-instagram',
			'parent' => 'a365',
			'title' => 'Instagram',
			'href'  => 'https://www.instagram.com/a365inside/',
			'meta'  => array(
				'title' => __('A365 Instagram'),
				'target' => '_blank',
				'class' => 'a365-instagram'
			),
		));		
		$admin_bar->add_menu( array(
			'id'    => 'a365-sub-xing',
			'parent' => 'a365',
			'title' => 'Xing',
			'href'  => 'https://www.xing.com/companies/a365%2Fagenturfürneuekommunikationgmbh',
			'meta'  => array(
				'title' => __('A365 Xing'),
				'target' => '_blank',
				'class' => 'a365-xing'
			),
		));		
		$admin_bar->add_menu( array(
			'id'    => 'a365-sub-vimeo',
			'parent' => 'a365',
			'title' => 'Vimeo',
			'href'  => 'https://vimeo.com/channels/a365',
			'meta'  => array(
				'title' => __('A365 Vimeo'),
				'target' => '_blank',
				'class' => 'a365-vimeo'
			),
		));
	}
}

new A365Adminmenu();