<?php
/**
 * The template for displaying an event-category page
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. See http://docs.wp-event-organiser.com/theme-integration for more information
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

//Call the template header
get_header(); ?>

<!-- Page header, display category title-->
<header class="page-header min-h-20">
	<h1 class="m-0 text-white text-2xl ys:text-3xl xs:text-4xl font-normal pl-2 xs:pl-8 pt-4 page-title">
		<?php printf( __( 'Event Category: %s', 'eventorganiser' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
	</h1>

	<!-- If the category has a description display it-->
	<?php
	$category_description = category_description();
	if ( ! empty( $category_description ) ) {
		echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta text-white">' . $category_description . '</div>' );
	}
	?>
</header>

<div class="flex flex-col md:flex-row p-4 bg-white">

	<div id="primary" role="main" class="content-area p-4 w-full md:w-2/3">

		<?php eo_get_template_part( 'eo-loop-events' ); //Lists the events ?>

	</div><!-- #primary -->

	<!-- Call template sidebar and footer -->
	<div class="w-full md:w-1/3 px-2 pt-8   bg-white">
		<?php  get_sidebar(); ?>
	</div><!-- .col- -->

</div><!-- .row -->

<?php get_footer();
