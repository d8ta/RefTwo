<?php

use A365\Wordpress\Logger;

class A365Customize {


	public function __construct() {

	
		add_action('admin_bar_menu', [$this, 'removeMenuItems'], 999 );
		add_action('wp_before_admin_bar_render', [$this, 'custom_hide_columns'] );
		add_action('admin_enqueue_scripts', [$this, 'load_custom_wp_admin_style']);
		add_action('admin_menu', [$this, 'remove_menus'] );

		add_action('add_meta_boxes', [$this, 'removeMetaBoxes'], 15);
		add_action('admin_init', [$this, 'wpdocs_theme_add_editor_styles']);

		add_filter('wpseo_use_page_analysis', '__return_false' );
		add_filter('post_row_actions',[$this, 'remove_quick_edit'],10,1);
		add_filter('page_row_actions',[$this, 'remove_quick_edit'],10,1);
		add_filter('show_admin_bar', '__return_false');
		add_filter('admin_footer_text', [$this, 'remove_footer_admin']);
		add_filter('pll_copy_post_metas', [$this, 'copy_post_metas']);

		//add_filter('login_headerurl', [$this, 'my_login_url']);
		//add_action('login_enqueue_scripts', [$this, 'my_login_logo']);
		add_filter('default_content', [$this, 'jb_editor_content']);
		add_filter('default_title', [$this, 'jb_editor_title']);
		add_filter('login_errors', [$this, 'login_error_override']);

		add_filter('mce_buttons',[$this, 'myplugin_tinymce_buttons']);
		add_filter('mce_buttons_2', function($b) {
			return array();
		});
		add_action('admin_menu',[$this, 'wphidenag']);
		add_action('admin_head', [$this, 'changePaging']);

		add_action('wp_dashboard_setup', [$this, 'remove_dashboard_widgets'] );

		add_filter( 'contextual_help', [$this, 'wpse50723_remove_help'], 999, 3 );
	}

	public function wphidenag() {
		if (!current_user_can('administrator')) remove_action( 'admin_notices', 'update_nag', 3 );
	}

	public function wpse50723_remove_help($old_help, $screen_id, $screen){
	    $screen->remove_help_tabs();
	    return $old_help;
	}

	public function remove_dashboard_widgets() {
		global $wp_meta_boxes;

		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);

		// unset($wp_meta_boxes['dashboard']['normal']['wpseo-dashboard-overview']);
		remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'normal' );
		remove_action( 'welcome_panel', 'wp_welcome_panel' );
		//remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

	}


	public function changePaging()
	{
		global $per_page;
		$per_page = 100;
	}



	public function myplugin_tinymce_buttons($buttons)
	 {
		//Remove the format dropdown select and text color selector
		$buttons = array( 'bold', 'bullist', 'alignleft', 'aligncenter', 'alignright', 'link', 'unlink', 'formatselect', 'underline', 'pastetext', 'removeformat', 'charmap', 'undo', 'redo', 'wp_fullscreen', 'fullscreen');

		return $buttons;
	 }



	public function wpdocs_theme_add_editor_styles() {
		$stylesheet = '/assets/css/rte.min.css';
		if (file_exists($stylesheet)) {
			$stylesheet_url = esc_url(home_url($stylesheet ));
		    add_editor_style(  $stylesheet_url . "?" . filemtime(ABSPATH . $stylesheet ));
	    }
	}


	// Make sure Polylang copies the content when creating a translation
	public function jb_editor_content( $content ) {
	    // Polylang sets the 'from_post' parameter
	    if ( isset( $_GET['from_post'] ) ) {
	        $my_post = get_post( $_GET['from_post'] );
	        if ( $my_post )
	            return $my_post->post_content;
	    }

	    return $content;
	}


	// Make sure Polylang copies the title when creating a translation
	public function jb_editor_title( $title ) {
	    // Polylang sets the 'from_post' parameter
	    if ( isset( $_GET['from_post'] ) ) {
	        $my_post = get_post( $_GET['from_post'] );
	        if ( $my_post )
	            return $my_post->post_title;
	    }

	    return $title;
	}

	public function removeMetaBoxes() {
 		global $post;
		//remove_meta_box('ml_box', $post->post_type, 'side');
		
		remove_meta_box('revisionsdiv', $post->post_type, 'normal');
		remove_meta_box('postcustom', $post->post_type, 'normal');
		remove_meta_box('commentstatusdiv', $post->post_type, 'normal');
		remove_meta_box('commentsdiv', $post->post_type, 'normal');
		remove_meta_box('slugdiv', $post->post_type, 'normal');
		remove_meta_box('authordiv', $post->post_type, 'normal');
		remove_meta_box('revisionsdiv', $post->post_type, 'normal');
		if (!current_user_can('administrator')) {
			remove_meta_box('wpseo_meta', $post->post_type, 'normal');
		}
 	}


/*
	public function my_login_url() {
	    return get_bloginfo( 'url' );
	}*/

	public function my_login_logo() {

		$logo = Project\Application::getInstance()->getConfig('media.logo');

		?>
	    <style type="text/css">
	        #login h1 a, .login h1 a {
	            background-image: url(<?= $logo; ?>);
	            margin-bottom: 0 !important;
	            background-size: 300px;
	            height: 96px;
	            width: auto;
	        }
	        
	        .login {
	            background-color: #f5f5f5;
	            -webkit-box-shadow: none;
	        }
	        p#nav {
			  display: none;
			}
	        p#backtoblog {
			  display: none;
			}
	    </style>
		<?php
	}

	public function login_error_override()
	{
	    return 'Incorrect login.';
	}



	public function copy_post_metas($metas) {
	     return array_merge($metas, array('image_gallery', 'image'));
	}

	public function remove_footer_admin () {

		echo 'A365 / Neue Kommunikation, Hannakstraße 9, 5023 Salzburg, +43 662 23 07 61, office@a365.at';

	}



	public function remove_menus(){

		remove_menu_page( 'edit.php' );
		remove_menu_page( 'edit-comments.php' );          //Comments

  		if (!current_user_can('administrator')) {
		  //remove_menu_page( 'index.php' );				// Dashboard
		  remove_menu_page( 'themes.php' );                 //Appearance
		  remove_menu_page( 'plugins.php' );                //Plugins
		  remove_menu_page( 'users.php' );                  //Users
		  remove_menu_page( 'profile.php' );                  //Users
		  remove_menu_page( 'tools.php' );                  //Tools
		  remove_menu_page( 'options-general.php' );        //Settings

		  //if( core version ab 1.0 ) {
			//remove_menu_page( 'edit.php?post_type=section' );
		  //}
	        
	    
	  	}



	  	$customize_url_arr = array();
	    $customize_url_arr[] = 'customize.php'; // 3.x
	    $customize_url = add_query_arg( 'return', urlencode( wp_unslash( $_SERVER['REQUEST_URI'] ) ), 'customize.php' );
	    $customize_url_arr[] = $customize_url; // 4.0 & 4.1
	    if ( current_theme_supports( 'custom-header' ) && current_user_can( 'customize') ) {
	        $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'header_image', $customize_url ); // 4.1
	        $customize_url_arr[] = 'custom-header'; // 4.0
	    }
	    if ( current_theme_supports( 'custom-background' ) && current_user_can( 'customize') ) {
	        $customize_url_arr[] = add_query_arg( 'autofocus[control]', 'background_image', $customize_url ); // 4.1
	        $customize_url_arr[] = 'custom-background'; // 4.0
	    }
	    foreach ( $customize_url_arr as $customize_url ) {
	        remove_submenu_page( 'themes.php', $customize_url );
	    }
	  
	}

	public function remove_quick_edit( $actions ) {
		unset($actions['inline hide-if-no-js']);
		return $actions;
	}

	public function custom_hide_columns( $columns ) {
		global $post;
		if ($post) {
			add_filter('manage_edit-' . $post->post_type . '_columns', [$this, 'custom_post_columns'], 101 );
		}
		
		add_filter('manage_media_columns', [$this, 'custom_post_columns'], 101 );
	}

	public function custom_post_columns( $columns ) {
        unset(
	       $columns['comments'],
		   $columns['author'],
		   $columns['date'],
		   $columns['post_type'],
		   $columns['wpseo-title'],
		   $columns['wpseo-metadesc'],
		   $columns['language_en'],
		   $columns['language_de'],
		   $columns['language_fr']
	    );

	    return $columns;
	}

	public function load_custom_wp_admin_style() {
		 wp_register_style( 'custom_wp_admin_css', A365_CUSTOMIZE_URL . 'admin.css');
         wp_enqueue_style( 'custom_wp_admin_css' );

	}

	public function removeMenuItems()
	{
		global $wp_admin_bar;
		$wp_admin_bar->remove_node( 'wp-logo' );
		$wp_admin_bar->remove_node( 'comments' );
		$wp_admin_bar->remove_node( 'new-content' );
		$wp_admin_bar->remove_node( 'wpseo-menu' );
		$wp_admin_bar->remove_node( 'view' );
		

	}

	

}

new A365Customize();