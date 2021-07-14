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
while ( have_posts() ) :
	the_post();

	// show the page title on thumbnail immage or on background.
	?>
	<header class=" entry-header min-h-20 align-stretch" >
	<?php

	the_title( '<h1 class="m-0 text-white text-3xl xs:text-4xl font-normal py-2 pl-2 xs:pl-8 entry-title pt-4">', '</h1>' );
	?>
	</header><!-- .entry-header -->

	<div class="flex flex-col md:flex-row bg-white">

		<div id="primary" class="content-area w-full md:w-2/3 p-4">
			<main id="main" class="site-main" role="main">
				<?php
				if (has_post_thumbnail( get_the_ID() )) {
					?>
					<div class="my-4 h-32 w-full">
						<?php
						// get_template_part( 'views/content', get_post_format() );
						the_post_thumbnail( 'full', ['class' => 'h-full  ' ] );
						?>
					</div>
					<?php
				}
				?>
				<div class="w-full">
					<?php
					the_content();
					?>
					<div class="bg-gray-300 p-4">
						<p class="text-center pt-0">Other Posts</p>
						<?php
						// the_post_navigation();
						$args = array(
						    'prev_text' => sprintf( esc_html__( '%s Older - %s', 'wpdocs_blankslate' ), '<span class="meta-nav"> < </span>', '%title' ),
						    'next_text' => sprintf( esc_html__( 'Newer %s - %s', 'wpdocs_blankslate' ), '<span class="meta-nav"> > </span>', '%title' )
						);
						$navigation = get_the_post_navigation( $args );
						if ( $navigation ) :
						    // echo '<h4>View More</h4>';
						    echo $navigation;
						endif;
						?>
					</div>
					<?php




					?>
				</div>

			</main><!-- #main -->
		</div><!-- #primary -->

		<div class="w-full md:w-1/3 px-2 pt-8   bg-white">
			<?php get_sidebar(); ?>
		</div><!-- .col- -->

	</div><!-- .row -->

	<?php
endwhile;

get_footer();
