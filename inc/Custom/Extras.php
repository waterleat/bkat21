<?php

namespace Bka2021\Custom;

/**
 * Extras.
 */
class Extras
{
	/**
     * register default hooks and actions for WordPress
     * @return
     */
	public function register()
	{
		add_filter( 'body_class', [ $this, 'body_class' ] );

		// Custom Login Logo
		add_action( 'login_enqueue_scripts', [ $this, 'bka_custom_login_logo' ] );
	}

	public function bka_custom_login_logo() {
		?>
		<style type='text/css'>
			body.login div#login {padding-top: 2rem; }
			#login h1 a, .login h1 a {
				background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/assets/dist/images/BKA_logo.png) !important;
				width: 200px !important; height: 150px !important; background-size: 200px 150px;
				background-repeat: no-repeat; }
		</style>
		<?php
	}

	public function body_class( $classes )
	{

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
}
