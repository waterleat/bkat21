<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bka2021
 */

?>
<?php
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	// show the page title on thumbnail immage or on background.
	if ( has_post_thumbnail() ) {
		?>
		<header class=" entry-header min-h-20 align-stretch" style="background-image: url( <?php the_post_thumbnail_url(); ?> );
		background-repeat: no-repeat; background-position: center center; background-size: cover; background-attachment: scroll;
		">
			<?php
	} else {
		?>
		<header class=" entry-header min-h-20 align-stretch" >
		<?php
	}

	the_title( '<h1 class="m-0 text-white text-3xl xs:text-4xl font-normal pl-2 xs:pl-8 py-1 entry-title">', '</h1>' );
	?>
	</header>

	<div class=" bg-white">

		<div id="primary" class="content-area w-full p-6">
			<main id="main" class="site-main" role="main">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bka2021' ),
					'after'  => '</div>',
				)
			);
			?>

			</main>
		</div>

	</div>

	<?php
endwhile;

get_footer();
