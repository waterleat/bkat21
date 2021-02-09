<?php
/**
 * Theme Customizer - Footer
 *
 * @package bka2021
 */

namespace Bka2021\Api\Customizer;

use WP_Customize_Control;
use WP_Customize_Color_Control;

use Bka2021\Api\Customizer;

/**
 * Customizer class
 */
class Footer
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register( $wp_customize )
	{
		$wp_customize->add_section( 'bka2021_footer_section' , [
			'title' => __( 'Footer', 'bka2021' ),
			'description' => __( 'Customize the Footer' ),
			'priority' => 162
		] );

		$wp_customize->add_setting( 'bka2021_footer_background_color' , [
			'default' => '#ffffff',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		] );

		$wp_customize->add_setting( 'bka2021_footer_copy_text' , [
			'default' => '&copy; 2015-2021 British Kendo Association',
			'transport' => 'postMessage', // or refresh if you want the entire page to reload
		] );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bka2021_footer_background_color', [
			'label' => __( 'Background Color', 'bka2021' ),
			'section' => 'bka2021_footer_section',
			'settings' => 'bka2021_footer_background_color',
		] ) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bka2021_footer_copy_text', [
			'label' => __( 'Copyright Text', 'bka2021' ),
			'section' => 'bka2021_footer_section',
			'settings' => 'bka2021_footer_copy_text',
		] ) );

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'bka2021_footer_background_color', [
				'selector' => '#bka2021-footer-control',
				'render_callback' => [ $this, 'outputCss' ],
				'fallback_refresh' => true
			] );

			$wp_customize->selective_refresh->add_partial( 'bka2021_footer_copy_text', [
				'selector' => '#bka2021-footer-copy-control',
				'render_callback' => [ $this, 'outputText' ],
				'fallback_refresh' => true
			] );
		}
	}

	/**
	 * Generate inline CSS for customizer async reload
	 */
	public function outputCss()
	{
		echo '<style type="text/css">';
			echo Customizer::css( '.site-footer', 'background-color', 'bka2021_footer_background_color' );
		echo '</style>';
	}

	/**
	 * Generate inline text for customizer async reload
	 */
	public function outputText()
	{
		echo Customizer::text( 'bka2021_footer_copy_text' );
	}
}
