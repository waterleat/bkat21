<?php
/**
 * The template for displaying a single event
 *
 * Please note that since 1.7, this template is not used by default. You can edit the 'event details'
 * by using the event-meta-event-single.php template.
 *
 * Or you can edit the entire single event template by creating a single-event.php template
 * in your theme. You can use this template as a guide.
 *
 * For a list of available functions (outputting dates, venue details etc) see http://codex.wp-event-organiser.com/
 *
 * **************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. See http://docs.wp-event-organiser.com/theme-integration for more information
 *
 * WordPress will automatically prioritise the template in your theme directory.
 * **************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

// Call the template header.
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<header class="entry-header min-h-20">
		<!-- Display event title -->
		<h1 class="m-0 text-white text-3xl xs:text-4xl font-normal pl-2 xs:pl-8 py-1 page-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="flex flex-col md:flex-row bg-white">

		<div id="primary" class="content-area w-full md:w-2/3 p-4">
			<main id="main" class="site-main" role="main">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
						<!-- Get event information, see template: event-meta-event-single.php -->
						<?php eo_get_template_part( 'event-meta', 'event-single' ); ?>

						<!-- The content or the description of the event-->
						<?php the_content(); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
					<?php
					// Events have their own 'event-category' taxonomy. Get list of categories this event is in.
					$categories_list = get_the_term_list( get_the_ID(), 'event-category', '', ', ', '' );

					if ( '' !== $categories_list ) {
						$utility_text = __( 'This event was posted in %1$s by <a href="%3$s">%2$s</a>.', 'eventorganiser' );
					} else {
						$utility_text = __( 'This event was posted by <a href="%3$s">%2$s</a>.', 'eventorganiser' );
					}
					printf(
						$utility_text,
						$categories_list,
						get_the_author(),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
					);
					?>

					<?php edit_post_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->

				</article>

			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<div class="w-full md:w-1/3 px-2 pt-8   bg-white">
			<?php get_sidebar(); ?>
		</div><!-- .col- -->

	</div><!-- .row -->
<?php
get_footer();
