<?php
/**
 * The template for displaying lists of events
 *
 * Queries to do with events will default to this template if a more appropriate template cannot be found
 *
 * **************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory.
 *
 * WordPress will automatically prioritise the template in your theme directory.
 * **************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

// Call the template header.
get_header(); ?>

<!-- Page header-->
<header class="page-header min-h-20">
	<h1 class="m-0 text-white text-3xl xs:text-4xl font-normal pl-2 xs:pl-8 py-1 page-title">
		<?php
		if ( eo_is_event_archive( 'day' ) ) {
			// Viewing date archive.
			echo __( 'Events: ', 'eventorganiser' ) . ' ' . eo_get_event_archive_date( 'jS F Y' );
		} elseif ( eo_is_event_archive( 'month' ) ) {
			// Viewing month archive.
			echo __( 'Events: ', 'eventorganiser' ) . ' ' . eo_get_event_archive_date( 'F Y' );
		} elseif ( eo_is_event_archive( 'year' ) ) {
			// Viewing year archive.
			echo __( 'Events: ', 'eventorganiser' ) . ' ' . eo_get_event_archive_date( 'Y' );
		} else {
			_e( 'Events', 'eventorganiser' );
		}
		?>
	</h1>
</header>

<div class="flex flex-col md:flex-row p-4 bg-white">

	<div id="primary" role="main" class="content-area p-4 bg-white w-full md:w-2/3">

		<?php eo_get_template_part( 'eo-loop-events' ); // Lists the events. ?>

	</div><!-- #primary -->

	<div class="w-full md:w-1/3 px-2 pt-8   bg-white">
		<?php get_sidebar(); ?>
	</div><!-- .col- -->

</div><!-- .row -->

<?php
get_footer();
