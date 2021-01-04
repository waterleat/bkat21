<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bka2021
 */

// has to be lowercase for ID name of sidebar --- inc/core/sidebar.php .
if ( ! is_active_sidebar( 'bka2021-sidebar' ) ) :
	return;
endif;
?>

<?php
if ( is_customize_preview() ) {
	echo '<div id="bka2021-sidebar-control"></div>';
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php
	dynamic_sidebar( 'bka2021-sidebar' );
	?>
</aside><!-- #secondary -->
