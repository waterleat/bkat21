<?php
/**
 * A single event in a events loop. Used by eo-loop-single-event.php
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory.
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 3.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Event">
  <div class="flex flex-col xs:flex-row pt-4 lg:px-8">
  	<div class="xs:w-2/3 sm:W-3/4 md:w-2/3">
			<header class="eo-event-header entry-header">

				<h2 class="text-2xl font-bold eo-event-title entry-title">
					<a href="<?php echo eo_get_permalink(); ?>" itemprop="url">
						<span itemprop="summary"><?php the_title() ?></span>
					</a>
				</h2>

				<div class="eo-event-date">
					<?php
						//Formats the start & end date of the event
						echo eo_format_event_occurrence();
					?>
				</div>

			</header><!-- .entry-header -->

			<div class="eo-event-details event-entry-meta">

				<?php
				//If it has one, display the thumbnail
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'thumbnail', array( 'class' => 'attachment-thumbnail eo-event-thumbnail' ) );
				}

				//A list of event details: venue, categories, tags.
				echo eo_get_event_meta_list();
				?>

			</div><!-- .event-entry-meta -->


			<!-- <div style="clear:both;"></div> -->
		</div>
		<div class="xs:w-1/3 sm:w-1/4 md:w-1/3 flex xs:flex-col justify-around items-center text-center">

			<a href="<?php echo esc_url( 'https://membership.britishkendoassociation.com/html/book_events.php' ) ?>" class="btn btn-blue" >Book Now</a>
			<a  class="btn btn-blue" href="<?php echo eo_get_permalink(); ?>" itemprop="url">Event Details</a>

		</div>
	</div>
  <!-- Show Event text as 'the_excerpt' or 'the_content' -->
  <div class="eo-event-content lg:px-8" itemprop="description"><?php the_excerpt(); ?></div>
</article>
