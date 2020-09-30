<?php
/**
 * Theme Customizer - Sidebar
 *
 * @package bka2021
 */

namespace Bka2021\Api\Customizer;

use WP_Customize_Color_Control;
use Bka2021\Api\Customizer;

/**
 * Customizer class
 */
class Sidebar
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register( $wp_customize )
	{
		$wp_customize->add_section( 'bka2021_sidebar_section' , array(
			'title' => __( 'Sidebar', 'bka2021' ),
			'description' => __( 'Customize the Sidebar' ),
			'priority' => 161
		) );

		$wp_customize->add_setting( 'bka2021_sidebar_background_color' , array(
			'default' => '#ffffff',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bka2021_sidebar_background_color', array(
			'label' => __( 'Background Color', 'bka2021' ),
			'section' => 'bka2021_sidebar_section',
			'settings' => 'bka2021_sidebar_background_color',
		) ) );

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'bka2021_sidebar_background_color', array(
				'selector' => '#bka2021-sidebar-control',
				'render_callback' => array( $this, 'output' ),
				'fallback_refresh' => true
			) );
		}
	}

	/**
	 * Generate inline CSS for customizer async reload
	 */
	public function output()
	{
		echo '<style type="text/css">';
			echo Customizer::css( '#sidebar', 'background-color', 'bka2021_sidebar_background_color' );
		echo '</style>';
	}
}
