<?php
/**
 * Template part for displaying a custom Admin area
 *
 * @link https://developer.wordpress.org/reference/functions/add_menu_page/
 *
 * @package bka2021
 */

?>

<div class="wrap">
	<h1 class="text-4xl font-bold">AWPS Settings Page</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php settings_fields( 'bka2021_options_group' ); ?>
		<?php do_settings_sections( 'bka2021' ); ?>
		<?php submit_button(); ?>
	</form>
</div>
