<?php
/**
 * A single event in a events loop. Used by eo-loop-single-event.php
 *
 ***************** NOTICE: *****************
 *
 * This file is in my template directory.
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 3.0.0
 */
 $bu = get_query_var('bu');

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Event">
	<div class="flex flex-col xs:flex-row  pt-4 lg:px-8">
		<div class="w-full xs:w-1/2">
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

			<!-- Show Event text as 'the_excerpt' or 'the_content' -->
			<!-- <div class="eo-event-content" itemprop="description"><?php// the_excerpt(); ?></div> -->

			<!-- <div style="clear:both;"></div> -->
		</div>
		<div class="w-full xs:w-1/2 flex flex-col text-center ">
      <!-- <h3 class="text-xl font-bold ">Eventcode: <?php // echo $bu , eo_get_the_start( 'ymd', $post->ID, $post->occurrence_id ); ?></h3> -->
      <div class="flex flex-col  md:flex-row justify-around">
      <!-- this next line works but is fixed -->
				<!-- <a href="<?php // echo site_url( ) ?>/index.php?p=6284" class="btn btn-blue"  >Read Review</a> -->
        <div class="w-full md:w-1/2 mb-4">
          <?php
          global $post;
          $rid = get_post_meta($post->ID, '_review', true);
          if (!$rid) {
            ?><p class="">No review for this event has been created.</p><?php
          }
          elseif ( get_post_status ( $rid ) == 'publish' ) {
            ?> <p><a href="<?php echo get_permalink( $rid ); ?>" class="btn btn-blue "  >Read Review</a></p> <?php
          } else {
            echo '<p class="">The review for this event has not been published.</p>';
          }
          ?>
        </div>
        <div class="w-full md:w-1/2 mb-4">
          <!-- <a href="<?php // echo site_url( ) ?>/index.php?p=512" class="btn btn-blue "  >expenses claim</a>  -->
          <!-- <p><a href="<?php // echo site_url( ) ?>/expenses-claim-form/" class="btn btn-blue "  >expenses claim</a></p> -->

        </div>
      </div>
		</div>
	</div>
</article>
