<?php
/**
 * Callbacks for Settings API
 *
 * @package bka2021
 */

namespace Bka2021\Api\Callbacks;

/**
 * Settings API Callbacks Class
 */
class SettingsCallback
{
	public function admin_index()
	{
		return require_once( get_template_directory() . '/views/admin/index.php' );
	}

	public function admin_faq()
	{
		echo '<div class="wrap"><h1 class="text-4xl font-bold">FAQ Page</h1></div>';
	}

	public function bka2021_options_group( $input )
	{
		return $input;
	}

	public function bka2021_admin_index()
	{
		echo 'Customize this Theme Settings section and add description and instructions
		<br>Not much here really';
	}

	public function first_name()
	{
		$first_name = esc_attr( get_option( 'first_name' ) );
		echo '<input type="text" class="regular-text" name="first_name" value="'.$first_name.'" placeholder="First Name" />';
	}
	public function last_name()
	{
		$last_name = esc_attr( get_option( 'last_name' ) );
		echo '<input type="text" class="regular-text" name="last_name" value="'.$last_name.'" placeholder="Last Name" />';
	}
}
