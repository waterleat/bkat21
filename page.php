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

	// show the page title on thumbnail immage or on background
	if ( has_post_thumbnail() ) {
		?>
		<header class=" entry-header h-20 align-stretch" style="background-image: url(<?php the_post_thumbnail_url() ?>); background-repeat: no-repeat; background-position: center center; background-size: 100% auto; background-attachment: scroll; ">
			<?php
	} else{ ?>
	<header class=" entry-header min-h-20 align-stretch" >
	<?php }

	the_title( '<h1 class="m-0 text-white text-2xl ys:text-3xl xs:text-4xl font-normal py-2 pl-2 xs:pl-8 entry-title">', '</h1>' );
	?>
	</header><!-- .entry-header -->

	<div class=" bg-white">
	<!-- <div class="flex flex-col md:flex-row bg-white"> -->

			<div id="primary" class="content-area w-full p-6">
			<!-- <div id="primary" class="content-area w-full md:w-2/3"> -->
				<main id="main" class="site-main" role="main">

				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bka2021' ),
					'after'  => '</div>',
				) );

					// /* Start the Loop */
					// while ( have_posts() ) :
					// 	the_post();
					//
					// 	get_template_part( 'views/content', 'page' );
					//
					// 	// If comments are open or we have at least one comment, load up the comment template.
					// 	// if ( comments_open() || get_comments_number() ) :
					// 		?>
					 		<!-- comment area -->
					 		<!-- <div class="bg-green-300 p-4 border-t-2 border-b-2 border-green-500">
					// 			<?php
					// 				// comments_template();
					// 			?>
					// 		</div> -->
					 		<?php
					// 	// endif;

					endwhile;

				?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<!-- <div class="w-full md:w-1/3 px-2 pt-8 md:mt-20  bg-white">
				<?php // get_sidebar(); ?>
			</div> -->

		</div><!-- .row -->


	<?php
		get_footer();
