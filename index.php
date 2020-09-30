<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bka2021
 */

get_header(); ?>

<div class="container mx-auto ">

	<div class="flex flex-col  align-stretch">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="text-4xl font-bold page-title"><?php single_post_title(); ?></h1>
						</header>

					<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'views/content', get_post_format() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'views/content', 'none' );

				endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->



		<!-- <div id="sidebar" class="col-sm-4"> -->
		<div id="sidebar" class="flex px-8">

			<?php // get_sidebar(); ?>

		</div><!-- sidebar area -->

	</div><!-- flex-col -->

</div><!-- .container -->

<?php
get_footer();
