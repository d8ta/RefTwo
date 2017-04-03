<?php

/*
Plugin Name: A365 Backend Customizr
Author: A365
Description: A365 Backend Customization
Bitbucket Plugin URI: https://bitbucket.org/a365/customized-backend
Version: 0.1.7
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // don't access directly
};


define( 'A365_CUSTOMIZE_FILE', __FILE__ ); // this file
define( 'A365_CUSTOMIZE_BASENAME', plugin_basename( A365_CUSTOMIZE_FILE ) ); // plugin name as known by WP
define( 'A365_CUSTOMIZE_DIR', dirname( A365_CUSTOMIZE_FILE ) ); // our directory

define( 'A365_CUSTOMIZE_URL', plugin_dir_url( __FILE__ ));


define( 'A365_CUSTOMIZE_INC', A365_CUSTOMIZE_DIR . '/include' );

define( 'A365_CUSTOMIZE_ASSETS', A365_CUSTOMIZE_DIR , '/assets');

/*
 * sync acf fields
 */
if (defined('POLYLANG_VERSION')) {

    require_once( A365_CUSTOMIZE_INC . '/class-a365-sync.php' );

    define('A365_CUSTOMIZR_ACF_SYNC', true);
    define('A365_CUSTOMIZR_ACF_SYNC_KEY', A365Sync::$KEY_ID);

}



require_once( A365_CUSTOMIZE_INC . '/class-a365-customize.php' );
require_once( A365_CUSTOMIZE_INC . '/class-a365-polylangbar.php' );
require_once( A365_CUSTOMIZE_INC . '/class-a365-rssfeed.php' );
require_once( A365_CUSTOMIZE_INC . '/class-a365-welcomedash.php' );
require_once( A365_CUSTOMIZE_INC . '/class-a365-admincolors.php' );
//require_once( A365_CUSTOMIZE_INC . '/class-a365-adminmenu.php' );
require_once( A365_CUSTOMIZE_INC . '/class-a365-besetup.php' );
