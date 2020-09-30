<?php
/* Template Name: page list */


get_header(); ?>

<div class="container mx-auto ">

	<div class="flex flex-col align-stretch">

		<!-- <div class="sm:w-3/4 px-2"> -->
		<div class=" p-4">

			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php
					$args = array(
					    'post_type' => 'page',
					    'post_status' => 'publish',
						);
						$arr_posts = new WP_Query( $args );
						if ( $arr_posts->have_posts() ) :
							?><ul class="list-disc pl-6  "><?php

						    while ( $arr_posts->have_posts() ) :
						        $arr_posts->the_post();
					?>        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<li class="entry-title"><?php the_ID(); ?> - <?php the_title(); ?></li>

				    </ul><?php

								endwhile;
						endif;




					/* Start the Loop */
					// while ( have_posts() ) :
					// 	the_post();
					//
					// 	get_template_part( 'views/content', 'page' );
					//
					// 	// If comments are open or we have at least one comment, load up the comment template.
					// 	if ( comments_open() || get_comments_number() ) :
					// 		?>
					// 		<!-- comment area -->
					<!-- // 		<div class="bg-green-lighter p-4 border-t-2 border-b-2 border-green"> -->
					// 			<?php
					// 				comments_template();
					// 			?>
					<!-- // 		</div> -->
					// 		<?php
					// 	endif;
					//
					// endwhile;

					?>

				</main><!-- #main -->
			</div><!-- #primary -->

		</div><!-- .col- -->
<!-- disabled sidebar oct 2018 -->
		<div class=" p-4">
			<?php // get_sidebar(); ?>
		</div>

	</div><!-- .row -->

</div><!-- .container -->

<?php
get_footer();
