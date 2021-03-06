<?php
namespace Project;

use A365\Wordpress\Application as BaseApplication;

class Application extends BaseApplication
{

	protected function always() 
	{
		parent::always();

		add_action('after_setup_theme', [$this, 'loadTextdomain']);
		add_filter('wp_get_attachment_url', [$this, 'ssl_post_thumbnail_urls'], 10, 2);
		remove_action('wp_head', 'wp_generator');
		
	}

	protected function frontend()
	{
		parent::frontend();
		
	}

	protected function backend()
	{
		parent::backend();

		add_filter('acf/settings/google_api_key', [$this, 'googleApiKey']);
		add_filter('acf/fields/google_map/api', [$this, 'googleApiKey']);
		add_filter('upload_mimes', [$this, 'cc_mime_types']);

	}

	public function cc_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}

	/**
	 * Fill in the google api key
	 * @param  array $api
	 * @return array
	 */
	public function googleApiKey($api)
	{
		$api['key'] = $this->getConfig('google.api.key');

		return $api;
	}

	public function loadTextdomain()
	{
		load_theme_textdomain('default', ABSPATH . 'app/langs');
	}

	//Fix SSL on Post Thumbnail URLs
   public function ssl_post_thumbnail_urls($url, $post_id) {
		//Skip file attachments
		if( !wp_attachment_is_image($post_id) )
		     return $url;

		//Correct protocol for https connections
		list($protocol, $uri) = explode('://', $url, 2);
		if( is_ssl() ) {
	        if( 'http' == $protocol )
	                $protocol = 'https';
		} else {
	        if( 'https' == $protocol )
	                $protocol = 'http';
		}
		return $protocol.'://'.$uri;
    }


	public function acf_generate_shortlink($value, $post_id, $field) {
		$shortlinkid = sprintf("%05d", $post_id);
		return $shortlinkid;
	}

	function require_unique($valid, $value, $field, $input) {

		// if (!$valid) {
		// 	return $valid;
		// }
		// // get the post id
		// // using field key of post id field
		// $post_id = $_POST['acf']['field_58738b2f11ddb'];
		// // query existing posts for matching value
		// $args = array(
		// 	'post_type' => 'project-settings',
		// 	'posts_per_page' => 1, // only need to see if there is 1
		// 	'post_status' => 'publish, draft, trash',
		// 	// don't include the current post
		// 	'post__not_in' => array($post_id),
		// 	'meta_query' => array(
		// 	  array(
		// 	    'key' => $field['name'],
		// 	    'value' => $value
		// 	  )
		// 	)
		// );

		// $query = new WP_Query($args);
		// if (count($query->posts)){
		// 	$valid = 'This Value is not Unique';
		// }

		return $valid;
	}
}


