<?php
/*
Template Name: Full-width layout
Template Post Type: post, page, event
*/
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

get_header(); ?>

<div class="container mx-auto bg-white">

	<div class="flex flex-col sm:flex-row align-stretch">

		<!-- <div class="sm:w-3/4 px-2"> -->
		<div class=" px-2">

			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						get_template_part( 'views/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile;

					?>

				</main><!-- #main -->
			</div><!-- #primary -->

		</div><!-- .col- -->
<!-- disabled sidebar oct 2018 -->
		<!-- <div class="sm:w-1/4 px-2">
			<?php // get_sidebar(); ?>
		</div> -->

	</div><!-- .row -->

</div><!-- .container -->

<?php
get_footer();
