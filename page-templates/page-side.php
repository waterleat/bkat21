<?php
/**
 * Template Name: Sidebar layout
 * Template Post Type: post, page, event
 *
 * The template for displaying responsive sidebar
 * and feature area for page name
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bka2021
 */

get_header();

// Start the Loop.
while ( have_posts() ) :
	the_post();

	// show the page title on thumbnail immage or on background
	if ( has_post_thumbnail() ) {
		?>
		<header class=" entry-header min-h-20 align-stretch" style="background-image: url(<?php the_post_thumbnail_url() ?>); background-repeat: no-repeat; background-position: center center; background-size: cover; background-attachment: scroll; ">
		<?php
	} else {
		?>
		<header class=" entry-header h-20 align-stretch" >
		<?php
	}

	the_title( '<h1 class="text-white font-normal pl-8 entry-title py-4 mb-0">', '</h1>' );
	?>
	</header><!-- .entry-header -->
	<!-- <div class="container mx-auto bg-white"> -->

	<!-- <div class="flex flex-col sm:flex-row align-stretch"> -->
	<div class="flex flex-col md:flex-row bg-white">

		<!-- <div class="sm:w-3/4 px-2"> -->
		<!-- <div class=" px-2"> -->

		<div id="primary" class="content-area w-full md:w-2/3 p-4">
			<main id="main" class="site-main" role="main">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bka2021' ),
						'after'  => '</div>',
					)
				);

				// get_template_part( 'views/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;


			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<div class="w-full md:w-1/3 px-2 pt-8   bg-white">
			<?php  get_sidebar(); ?>
		</div>

	</div><!-- .row -->

	<?php

endwhile;
get_footer();
