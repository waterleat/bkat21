<?php
/**
 * The template for displaying a single custom post type
 * for an AGM Item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bka2021
 */

if ( ! is_user_logged_in() ) {
 	wp_redirect(esc_url(home_url('/')), 307);
}

get_header();
/* Start the Loop */
while ( have_posts() ) {
	the_post();

	// show the page title on thumbnail immage or on background.
	if ( has_post_thumbnail() ) {
		?>
		<header class=" entry-header min-h-20 align-stretch" style="background-image: url(<?php the_post_thumbnail_url() ?>); background-repeat: no-repeat; background-position: cover; background-size: 100% auto; background-attachment: scroll; ">
		<?php
	} else {
		?>
		<header class=" entry-header min-h-20 align-stretch" >
		<?php
	}

	the_title( '<h1 class="text-white font-normal pl-8 entry-title pt-4">', '</h1>' );
	?>
	</header><!-- .entry-header -->

	<div class="bg-white">
		<div id="primary" class="content-area w-full p-4">
			<main id="main" class="site-main" role="main">
				<?php
					the_content();
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					};
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .row -->

	<?php
}; // while Loop

get_footer();
