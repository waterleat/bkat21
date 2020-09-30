<?php

namespace Bka2021\Custom;

use WP_Query;

class Shortcodes
{
  /**
   * register default hooks and actions for WordPress
   * @return
   */
  public function register()
  {
    // add_action( 'init', array( $this, 'load_shortcodes'));
    // add_action( 'init', array( $this, 'recent_posts_shortcode'));
    // add_action('wp_loaded', array( $this, 'theme_portfolio_ajax_init'));
    //
    // add_shortcode('portfolio', array( $this,  'theme_shortcode_portfolio'));
    add_shortcode( 'blog', array( $this, 'recent_posts_shortcode' ));

  }

  // Add Shortcode
  public function recent_posts_shortcode( $atts , $content = null ) {

  	// Attributes
  	$atts = shortcode_atts(
  		array(
  			'count' => '5',
  		),
  		$atts,
  		'blog'
  	);

  	// Query
  	$the_query = new WP_Query( array ( 'posts_per_page' => $atts['count'] ) );

  	// Posts
  	// $output = '<ul>';
  	// while ( $the_query->have_posts() ) :
  	// 	$the_query->the_post();
  	// 	$output .= '<li>' . get_the_title() . '</li>';
  	// endwhile;
  	// $output .= '</ul>';

    $output = '<div class="">';
    while ($the_query->have_posts()) : $the_query->the_post();
      $id = get_the_ID();
      $output .= '<article id="post-'.$id.'" class="mb-20">';
      if (has_post_thumbnail( $id )) {
        $output .= '<div class="mt-4 mb-2 h-32 w-full">';
        $output .= get_the_post_thumbnail($id, 'full', ['class' => 'h-32  ' ]);
        $output .= '</div>';
      }
      $output .= '<h2 class="font-normal mt-0 mb-2"><a class="text-grey055 hover:text-ltblue" href="'. get_the_permalink($id) .'" title="Read more">'. get_the_title($id) .'</a></h2>';
      $output .= get_the_excerpt().'</article>';
      $output .= '<div class="border-b-2 border-dkblue mb-2"></div>';
    endwhile;
    $output .= '</div>';
  	// Reset post data
  	wp_reset_postdata();

  	// Return code
  	return $output;

  }

  /**
	 * Register theme's shortcodes.
	 */
	public function load_shortcodes() {
		// require_once (get_template_directory() . '/shortcodes/columns.php');
		// require_once (get_template_directory() . '/shortcodes/typography.php');
		// require_once (get_template_directory() . '/shortcodes/dividers.php');
		// require_once (get_template_directory() . '/shortcodes/tabs.php');
		// require_once (get_template_directory() . '/shortcodes/boxes.php');
		// require_once (get_template_directory() . '/shortcodes/images.php');
		// require_once (get_template_directory() . '/shortcodes/buttons.php');
		require_once (get_template_directory() . '/shortcodes/tables.php');
		require_once (get_template_directory() . '/shortcodes/blog.php');
		// require_once (get_template_directory() . '/shortcodes/portfolios.php');
		// require_once (get_template_directory() . '/shortcodes/slideshow.php');
		// require_once (get_template_directory() . '/shortcodes/widgets.php');
		require_once (get_template_directory() . '/shortcodes/media.php');
		// require_once (get_template_directory() . '/shortcodes/lightbox.php');
		// require_once (get_template_directory() . '/shortcodes/chart.php');
		// require_once (get_template_directory() . '/shortcodes/sitemap.php');
		require_once (get_template_directory() . '/shortcodes/iframe.php');
		// require_once (get_template_directory() . '/shortcodes/gallery.php');
		// require_once (get_template_directory() . '/shortcodes/gmap.php');
		// require_once (get_template_directory() . '/shortcodes/carousel.php');
		// require_once (get_template_directory() . '/shortcodes/masonry.php');
		// require_once (get_template_directory() . '/shortcodes/testimonials.php');
	}
  public function theme_shortcode_portfolio($atts, $content = null, $code) {
  	$opts = shortcode_atts(array(
  		'column' => 4,
  		'layout' => 'full',//sidebar
  		'cat' => '',
  		'max' => -1,
  		'title' => '',
  		'titlelinkable' => 'false',
  		'titlelinktarget' => '_self',
  		'desc' => '',
  		'desc_length' => 'default',
  		'more' => 'default',
  		'moretext' => '',
  		'morebutton' => 'default',
  		'height' => '',
  		"ajax" => 'false',
  		'current' => '',
  		'nopaging' => 'false',
  		'sortable' => 'false',
  		'sortable_all'=> 'true',
  		'sortable_showtext'=> '',
  		'group' => 'true',
  		'lightboxtitle' => 'portfolio', //portfolio,image,imagecaption,imagedesc,none
  		'advancedesc'=>'false',
  		'effect' => 'icon', //icon,grayscale,zoom,blur,rotate,morph,tilt,none
  		'ids' => '',
  		'order'=> 'ASC',
  		'orderby'=> 'menu_order', //none, id, author, title, date, modified, parent, rand, comment_count, menu_order
  		'rel_group' => 'portfolio_'.rand(1,1000),
  		'class' => '',
  	), $atts);

  	extract($opts);
  	switch($column){
  		case 1:
  			$column_class = 'one_column';
  			break;
  		case 2:
  			$column_class = 'two_columns';
  			break;
  		case 3:
  			$column_class = 'three_columns';
  			break;
  		case 5:
  			$column_class = 'five_columns';
  			break;
  		case 6:
  			$column_class = 'six_columns';
  			break;
  		case 7:
  			$column_class = 'seven_columns';
  			break;
  		case 8:
  			$column_class = 'eight_columns';
  			break;
  		case 4:
  		default:
  			$column_class = 'four_columns';
  	}
  	if($class){
  		$class = ' '.$class;
  	}

  	if ($sortable != 'false') {
  		if($sortable_showtext == ''){
  			$sortable_showtext = wpml_t(THEME_NAME , 'Portfolio Sortable Show Text',theme_get_option('portfolio','show_text'));
  		}
  		if(!empty($current)){
  			$ajax = true;
  		}
  		if($nopaging === 'false'){
  			$ajax = true;
  		}
  		//print scripts for sortable
  		wp_print_scripts('jquery-quicksand');
  		wp_print_scripts('jquery-easing');

  		if($ajax == 'true'){
  			$output = '<section class="portfolios sortable'.$class.'" data-options="'.htmlspecialchars(json_encode($opts)).'">';
  		}else{
  			$output = '<section class="portfolios sortable'.$class.'">';
  		}

  		$output .= '<header class="sort_by_cat">';
  		$output .= '<span>'.$sortable_showtext.'</span>';
  		if($sortable_all == 'true'){
  			if(empty($current)){
  				$output .= '<a class="current" data-value="all" href="#">'.__('All','striking-r').'</a>';
  			}else{
  				$output .= '<a data-value="all" href="#">'.__('All','striking-r').'</a>';
  			}
  		}
  		$terms = array();
  		if ($cat != '') {
  			foreach(explode(',', $cat) as $term_slug) {
  				$terms[] = get_term_by('slug', $term_slug, 'portfolio_category');
  			}
  		} else {
  			$terms = get_terms('portfolio_category', 'hide_empty=1');
  		}
  		foreach($terms as $term) {
  			if (is_object($term)) {
  				if($term->slug == $current){
  					$output .= '<a data-value="' . $term->slug . '" href="#" class="current">' . $term->name . '</a>';
  				}else{
  					$output .= '<a data-value="' . $term->slug . '" href="#">' . $term->name . '</a>';
  				}
  			}
  		}

  		$output .= '</header>';
  		$nopaging = 'true';
  	} else {
  		$opts['current'] = '';
  		if($ajax == 'true'){
  			$output = '<section class="portfolios'.$class.'" data-options="'.htmlspecialchars(json_encode($opts)).'">';
  		}else{
  			$output = '<section class="portfolios'.$class.'">';
  		}
  	}
  	// var_dump($output);die;
  	$output .= $this->theme_generator('portfolio_list',$opts);
  	$output .= '</section>';
  	return $output;
  }

  public function theme_generator($slug){
  	do_action( "theme_generator_{$slug}", $slug);
  	$slug = apply_filters("theme_generator_{$slug}",$slug);

  	$template = "{$slug}.php";

  	theme_load_section($template);

  	$args = array_slice( func_get_args(), 1 );

  	$function = "theme_section_{$slug}";

  	return call_user_func_array($function, $args );
  }
  function theme_portfolio_ajax_init(){
  	if ( isset( $_SERVER['REQUEST_METHOD']) && 'POST' != $_SERVER['REQUEST_METHOD'] || !isset( $_POST['portfolioAjax'] ) ){
  		return;
  	}
  	if($_POST['portfolioAjax'] != 'true'){
  		return;
  	}

  	$options = array();
  	if(isset($_POST['portfolioOptions']))
  		$options =  $_POST['portfolioOptions'];

  	if(isset($_POST['category']) && $_POST['category']!='all'){
  		$options['cat'] = $_POST['category'];
  	}
  	if(isset($_POST['portfolioPage'])){
  		$options['paged'] = intval($_POST['portfolioPage']);
  	}

  	if(isset($options['current'])){
  		unset($options['current']);
  	}
  	if ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) {
  		echo apply_filters('the_content',theme_generator('portfolio_list',$options));
  	}
  	exit();
  }


}
