<?php
/* Template name: Post by Category */

get_header(); ?>

<div class="container mx-auto ">

	<div class="flex flex-col align-stretch">

		<!-- <div class="sm:w-3/4 px-2"> -->
		<div class=" p-4">

			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<!-- list of cats and posts in them as per wes bos -->
					<?php
					// $cats = get_categories(  );
					// foreach ($cats as $cat) {
					// 	$cat_id = $cat->term_id;
					// 	echo '<h2>'.$cat->name.' - ' .$cat_id.'</h2>';
					// 	query_posts( "cat=$cat_id&posts_per_page=100" );
					// 	/* Start the Loop */
					// 	if ( have_posts() ) :
					// 		while ( have_posts() ) : the_post(); -->
									?>
								<!-- <a href="<?php //the_permalink()?>"> -->
					 			<?php //the_title( $before = '', $after = '', $echo = true );?>
					 			<!-- </br></a> -->
					 			<?php
					// 		endwhile;
					// 	endif;
					// }
					?>


<?php

$oldpostsbu=get_query_var( 'oldpostsbu');
echo $oldpostsbu, ' received';
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => $oldpostsbu,
    // 'posts_per_page' => 5,
);
$arr_posts = new WP_Query( $args );

if ( $arr_posts->have_posts() ) :

    while ( $arr_posts->have_posts() ) :
        $arr_posts->the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
            if ( has_post_thumbnail() ) :
                the_post_thumbnail();
            endif;
            ?>
            <header class="entry-header">
                <h1 class="text-4xl font-bold entry-title"><?php the_title(); ?></h1>
            </header>
            <div class="entry-content">
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">Read More</a>
            </div>
        </article>
        <?php
    endwhile;
endif;
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

		</div><!-- .col- -->
<!-- disabled sidebar oct 2018 -->
		<div class=" p-4">
			<?php get_sidebar(); ?>
		</div>

	</div><!-- .row -->

</div><!-- .container -->

<?php
get_footer();
