<?php
/**
 * Build Gutenberg Blocks
 *
 * @package bka2021
 */

namespace Bka2021\Api;

/**
 * Customizer class
 */
class Gutenberg
{
	/**
	 * Register default hooks and actions for WordPress
	 *
	 * @return WordPress add_action()
	 */
	public function register()
	{
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		add_action( 'init', array( $this, 'gutenberg_enqueue' ) );

	}

	/**
 * Enqueue front end and editor JavaScript and CSS
 */

	/**
	 * Enqueue scripts and styles of your Gutenberg blocks
	 * @return
	 */
	public function gutenberg_enqueue()
	{

	}


}
