<?php

use A365\Wordpress\Logger;

class A365PolylangBar {

	const KEY_ADMIN_BAR = 'a365-admin-bar';

	public function __construct() {
		add_action('wp_before_admin_bar_render', [$this, 'admin_bar_menu']);
	}

	public function admin_bar_menu() {

		if ( !defined( 'POLYLANG_VERSION' ) ) return;
		/**
		 * @var \WP_Screen $screen
		 * @var \WP_Post $post
		 */
		global $wp_admin_bar;
		global $post;

		$all_langs = PLL()->model->get_languages_list();
		$post_lang = null;

		$screen = get_current_screen();

		if($screen->base !== 'post') {
			return;
		}

		$wp_admin_bar->remove_node('languages');

		$post_lang_slug = pll_get_post_language($post->ID);
		foreach ($all_langs as $lang ) {
			if ( $post_lang_slug === $lang->slug ) {
				$post_lang = $lang;
			}
		}
		if (!$post_lang) return;



		$title = sprintf(
			'<span class="ab-label"%s>%s</span>',
			'all' === $post_lang->slug ? '' : sprintf( ' lang="%s"', esc_attr( $post_lang->get_locale( 'display' ) ) ),
			esc_html( $post_lang->name )
		);

		$wp_admin_bar->add_menu( array(
			'id'     => self::KEY_ADMIN_BAR,
			'title'  => $post_lang->flag . "&nbsp;&nbsp;" . $title,
		) );

		foreach ($all_langs as $lang ) {
			
			if ( $post_lang->slug === $lang->slug ) {
				continue;
			}

			$transId = intval(pll_get_post($post->ID, $lang->slug));

			if ($transId) {
				$href = get_edit_post_link($transId);

			} else {
				$href = admin_url("post-new.php?post_type={$post->post_type}&from_post={$post->ID}&new_lang={$lang->slug}");
			}

			$href .= "&lang={$lang->slug}";
			

			$wp_admin_bar->add_menu( array(
				'parent' => self::KEY_ADMIN_BAR,
				'id'     => $lang->slug,
				'title'  => $lang->flag . "&nbsp;&nbsp;" . esc_html( $lang->name ),
				'href'   => $href,
				'meta'   => array( 'lang' => esc_attr( $lang->get_locale( 'display' ) ) ),
			) );
		}
	}
}

new A365PolylangBar();