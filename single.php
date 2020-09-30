<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bka2021
 */

get_header();
/* Start the Loop */
while ( have_posts() ) : the_post();

// show the page title on thumbnail immage or on background
?>
	<header class=" entry-header min-h-20 align-stretch" >
	<?php

	the_title( '<h1 class="m-0 text-white text-2xl ys:text-3xl xs:text-4xl font-normal py-2 pl-2 xs:pl-8 entry-title pt-4">', '</h1>' );
	?>
	</header><!-- .entry-header -->

	<div class="flex flex-col md:flex-row bg-white">

		<div id="primary" class="content-area w-full md:w-2/3 p-4">
			<main id="main" class="site-main" role="main">

				<?php


					// get_template_part( 'views/content', get_post_format() );
					the_post_thumbnail( 'full' );
					the_content();

					the_post_navigation();


				endwhile;

				?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<div class="w-full md:w-1/3 px-2 pt-8   bg-white">
			<?php get_sidebar(); ?>
		</div><!-- .col- -->

	</div><!-- .row -->


<?php
get_footer();
