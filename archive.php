<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bka2021
 */

get_header(); ?>

	<header  class=" entry-header h-20 align-stretch" >
		<?php
		the_archive_title( '<h1 class="m-0 text-white text-2xl ys:text-3xl xs:text-4xl font-normal py-2 pl-2 xs:pl-8 page-title">', '</h1>' );
		?>
	</header>

	<div class="flex flex-col md:flex-row p-4 bg-white">

		<div id="primary" class="content-area w-full md:w-2/3 p-4">
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
			<main id="main" class="site-main" role="main">

				<?php
				/* Start the Loop */
				if ( have_posts() ) :

					while ( have_posts() ) :

						the_post();
						get_template_part( 'views/content', get_post_format() );

					endwhile;
					?>
					<div id="paged_nav">
						<?php echo paginate_links(); ?>
					</div>
					<?php
				else :

					get_template_part( 'views/content', 'none' );

				endif;
				?>

				</main><!-- #main -->
			</div><!-- #primary -->


		<div class="w-full md:w-1/3 px-2 pt-8   bg-white">
			<?php get_sidebar(); ?>
		</div><!-- .col- -->

	</div><!-- .row -->


<?php
get_footer();
