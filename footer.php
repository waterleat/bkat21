<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bka2021
 */

?>

	</div><!-- #content -->

	<?php
	if ( is_customize_preview() ) {
		echo '<div id="bka2021-footer-control" style="margin-top:-30px;position:absolute;"></div>';
	}
	?>

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">

		<div class="inner py-8 bg-gray-300 flex flex-col md:flex-row">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("AboveFooter") ) : ?>
			<?php endif;?>
		</div>

		<p class="site-info p-4 bg-white w-full" <?php if ( is_customize_preview() ) echo 'id="bka2021-footer-copy-control"'; ?>>
			<?php

				echo Bka2021\Api\Customizer::text( 'bka2021_footer_copy_text' );
			?>
		</p>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
