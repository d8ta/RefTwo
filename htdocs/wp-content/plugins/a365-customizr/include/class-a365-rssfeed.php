<?php

use A365\Wordpress\Logger;

class A365Rssfeed {


	public function __construct() {

		add_action('wp_dashboard_setup', [$this, 'a365_register_widgets']);

	}


	public function a365_register_widgets() {
		global $wp_meta_boxes;
    	wp_add_dashboard_widget('a365_rsswidget', __('A365Inside', 'a365'), [$this, 'a365_rss_box']);
	}

	public function a365_rss_box() {
    
	    include_once(ABSPATH . WPINC . '/feed.php');
	    
	    // Array of RSS Feed URLs, may add more - separated with commas
	    $my_feeds = array( 
	        'https://rss.a365.at/index.php', 
	    );
	    
	    foreach ( $my_feeds as $feed) :
	    
	        $rss = fetch_feed( $feed );

	        if (!is_wp_error( $rss ) ) : 
	        	// Set Max Item to ... 
	            $maxitems = $rss->get_item_quantity( 3 ); 
	            $rss_items = $rss->get_items( 0, $maxitems ); 
	    
	            $rss_title = '<a href="'.$rss->get_permalink().'" target="_blank">'.strtoupper( $rss->get_title() ).'</a>'; 
	        endif;
	    	
	    	// Create Wrapper Div
	        echo '<div class="rss-widget">';
	        echo '<ul>';
	        
	        // Check items
	        if ( $maxitems == 0 ) {
	            echo '<li>'.__( 'No item', 'rc_mdm').'.</li>';
	        } else {
	            foreach ( $rss_items as $item ) :
	                // Get human date (comment if you want to use non human date)
	                $item_date = 'vor ' . human_time_diff( $item->get_date('U'), current_time('timestamp'));
	                // Start displaying item content within a <li> tag
	                echo '<li>';
	                // create item link
                  	echo '<div style="float: left; width: 35%; padding-right: 5%">';
		                if ($enclosure = $item->get_enclosure()) {
		                    echo '<a target="_blank" href="'.esc_html( $item->get_link()).'"><img style="width: 100%; height: auto" src="' . $enclosure->get_link() . '\"></a><br>';
		                }
		            echo '</div>';
		            echo '<div style="float: left; width: 60%;">';
		                // Get item title

		                echo '</a>';
		                $content = $item->get_content();
		                //Crop Content
		                $content = wp_html_excerpt($content, 180) . ' [...]';
		                echo $content . '<br>';
		                echo ' <span class="rss-date">'.$item_date.'</span>';
		            echo '</div>';
		            echo '<div style="clear: both"></div>';
	                echo '<hr style="border: 0; background-color: #DFDFDF; height: 1px;">';
	                echo '</li>';

	            endforeach;
	        }
	        // End <ul> tag
	        echo '</ul></div>';

	    endforeach; // End foreach feed
	}

}

new A365Rssfeed();