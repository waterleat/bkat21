<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bka2021
 */

get_header(); ?>

<header class=" entry-header min-h-20 align-stretch" >
<?php
// the_title( '<h1 class="m-0 text-white text-2xl ys:text-3xl xs:text-4xl font-normal pl-2 xs:pl-8 pt-4 entry-title pt-4">', '</h1>' );
?>
</header><!-- .entry-header -->

<div class="flex flex-col md:flex-row bg-white">

	<div id="primary" class="content-area w-full md:w-2/3 p-4">
		<main id="main" class="site-main" role="main">

			<h1 class=""><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bka2021' ); ?></h1>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="w-full md:w-1/3 px-2 pt-8   bg-white">
		<?php get_sidebar(); ?>
	</div><!-- .col- -->

</div><!-- .row -->

<?php
get_footer();
