<?php
// if (!isset($_SESSION['dojoregion'])) {
//   $_SESSION['dojoregion'] = 0;
//   $_SESSION['dojokendo'] = 0;
//   $_SESSION['dojoiaido'] = 0;
//   $_SESSION['dojojodo'] = 0;
//   $_SESSION['dojofilter'] = '';
// }

$option = get_option( 'bka2019ds_plugin' );

get_header();

$post_id = get_the_id();
// // $stype = get_post_meta($post_id, '__slideshow_type', true);
// $scategory = get_post_meta($post_id, '_slideshow_category', true);
// $number = get_post_meta($post_id, '_slideshow_number', true);
//
// // if ($type == 'slideshow' ){
// //   if($stype == 'revslider'){
//     if(function_exists('putRevSlider')){
//       $rev_id = get_post_meta($post_id, '_slideshow_rev', true);
//       ob_start();
//       putRevSlider($rev_id);
//       $content = ob_get_clean();
//
//       echo '<div id="feature" class="revslider with_shadow">'.$content.'</div>';
//     }
?>
<?php putRevSlider( 'front21' ); ?>
<div class="flex flex-col md:flex-row p-4 bg-white dark:bg-gray-700 dark:text-gray-200">

  <div id="primary" class="content-area w-full md:w-2/3 p-4">
    <main id="main" class="site-main dark:bg-gray-800 dark:text-gray-200" role="main">
      <div class="front-page border-b-2 border-dkblue pb-6 mb-8">
        <?php
        /* Start the Loop */
        while ( have_posts() ) :
          the_post();
          the_content();
        endwhile;
        ?>
      </div>
      <?php // Display blog posts on any page @ https://m0n.co/l
      $paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
      $args = [
        'posts_per_page' => '4',
        'paged' => $paged,
      ];
  		$wp_query = new WP_Query($args);
  		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <article id="post-<?php the_ID(); ?>"  class="mb-20">
          <?php if (has_post_thumbnail( get_the_ID() )) { ?>
            <div class="mt-4 mb-2 h-32 w-full">
              <?php
                // the_post_thumbnail('medium', ['class' => ' md:mr-4 mx-auto mb-4' ]);
                // the_post_thumbnail('full', ['class' => 'w-full overflow-y-hidden h-32' ]);
                the_post_thumbnail( 'full', ['class' => 'h-full  ' ] );
              ?>
            </div>
          <?php } ?>


      		<h2 class="font-normal mt-0 mb-2"><a class="text-grey055 hover:text-ltblue" href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
          <div class="border-b-2 border-dkblue mb-2">
          </div>

      		<?php the_excerpt(); ?>

        </article>
  		<?php endwhile; ?>
      <div id="paged_nav">
        <?php
        // $big = 999999999; // need an unlikely integer

        echo paginate_links(
          array(
          //   'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          // //   // 'format' => '?page=%#%',
          //   'format' => '?paged=%#%',
          // //   'mid_size' => 3,
          //   'current' => max( 1, get_query_var('page') ),
            'total' => $wp_query->max_num_pages
          )
        );
        ?>
      </div>

      <?php wp_reset_postdata(); ?>

    </main><!-- #main -->

  </div><!-- #primary -->

  <div class="w-full md:w-1/3 px-2 md:px-0 pt-8   bg-white">
    <?php  get_sidebar(); ?>
  </div>
</div>




<?php
get_footer();
