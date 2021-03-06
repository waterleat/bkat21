<?php

namespace Bka2021\Setup;

/**
 * Enqueue.
 */
class Enqueue
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register()
	{
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_filter( 'excerpt_length', [ $this, 'custom_excerpt_length' ], 999 );

		// add_filter('script_loader_tag', array( $this, 'add_async_defer_attribute'), 10, 2);
	}

	// public function add_async_defer_attribute($tag, $handle) {
	// 	if ( 'googleapis' == $handle ){
	// 		$tag = str_replace( ' src', ' async defer src', $tag );
	// 	}
	// 	return $tag;
	// }

	public function custom_excerpt_length( $length ) {
		return 20;
	}

	/**
	 * Notice the mix() function in wp_enqueue_...
	 * It provides the path to a versioned asset by Laravel Mix using querystring-based
	 * cache-busting (This means, the file name won't change, but the md5. Look here for
	 * more information: https://github.com/JeffreyWay/laravel-mix/issues/920 )
	 */
	public function enqueue_scripts()
	{
		// $google_map_api = 'AIzaSyDXwSOa64GQfK5_EaP9mslaQCyR6haJJsY';
		
		// Deregister the built-in version of jQuery from WordPress
		// this is original code
		// if ( ! is_customize_preview() ) {
		// 	wp_deregister_script( 'jquery' );
		// }
		// attempted new rules for event organiser
		// if ( ! (
		// 	is_page( 'calendar' ) ||
		// 	is_front_page() ||
		// 	is_customize_preview()
		// 	) ) {
		// 	wp_deregister_script( 'jquery' );
		// }

		// CSS
		wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/dist/css/style.css', [], '1.0.0', 'all' );
		wp_enqueue_style( 'dashicons' );
		wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Prompt:wght@900&display=swap', false );

		// JS
		wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/dist/js/app.js', [], '1.0.0', true );


// source: https://codex.wordpress.org/Conditional_Tags#The_Front_Page
		// if ( is_front_page() && is_home() ) {
		//   // Default homepage
		// } elseif ( is_front_page() ) {
		//   // static homepage
		// } elseif ( is_home() ) {
		//   // blog page
		// } else {
		//   //everything else
		// }

		// Activate browser-sync on development environment
		// if ( getenv( 'APP_ENV' ) === 'development' ) :
		// 	wp_enqueue_script( '__bs_script__', getenv('WP_SITEURL') . ':3000/browser-sync/browser-sync-client.js', array(), null, true );
		// endif;

		// Extra
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

}
