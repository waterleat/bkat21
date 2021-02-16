<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package bka2021
 */

get_header(); ?>

<header  class=" entry-header h-20 align-stretch" >
	<h1 class="m-0 text-white text-3xl xs:text-4xl font-normal pl-2 xs:pl-8 py-1 ">Search Results</h1>

</header>

<div class="flex flex-col md:flex-row p-4 bg-white">

	<div id="primary" class="content-area w-full md:w-2/3 p-4">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :
				?>

				<header>
					<h2 class=" page-title">
					<?php
					printf(
						/* translators: %s: Search Term. */
						esc_html__( 'Search Results for: %s', 'bka2021' ),
						'<span>' . get_search_query() . '</span>'
					);
					?>
					</h2>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) :

					the_post();

					get_template_part( 'views/content', 'search' );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'views/content', 'none' );

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="w-full md:w-1/3 px-2 pt-8   bg-white">
		<?php get_sidebar(); ?>
	</div>

</div><!-- .row -->

<?php
get_footer();
