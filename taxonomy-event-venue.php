<?php
/**
 * The template for displaying the venue page
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
get_header();
?>

<!-- Page header, display venue title. -->
<header class="page-header min-h-20">
	<?php $venue_id = get_queried_object_id(); ?>

	<h1 class="m-0 text-white text-2xl ys:text-3xl xs:text-4xl font-normal pl-2 xs:pl-8 pt-4 page-title">
		<?php printf( __( 'Events at: %s', 'eventorganiser' ), '<span>' . eo_get_venue_name( $venue_id ) . '</span>' ); ?>
	</h1>

	<?php
	$venue_description = eo_get_venue_description( $venue_id );
	if ( $venue_description ) {
		echo '<div class="venue-archive-meta">' . $venue_description . '</div>';
	}
	?>

	<!-- Display the venue map. If you specify a class, ensure that class has height/width dimensions-->
	<?php
	if ( eo_venue_has_latlng( $venue_id ) ) {
		echo eo_get_venue_map( $venue_id, array( 'width' => '100%' ) );
	}
	?>
</header>

<div id="primary" role="main" class="content-area p-4 w-full bg-white">

	<?php eo_get_template_part( 'eo-loop-events' ); // Lists the events. ?>

</div>

<!-- Call template sidebar and footer -->
<div class="w-full  px-2 md:px-8 pt-8   bg-white flex flex-col sm:flex-row">
		<?php get_sidebar(); ?>
</div><!-- .col- -->

<?php
get_footer();
