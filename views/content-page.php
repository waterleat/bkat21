<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bka2021
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	// $style = 'style="background-image: url(';
	if ( has_post_thumbnail() ) {
		echo '<header class=" entry-header min-h-20 align-stretch" style="background-image: url('
			. the_post_thumbnail_url() . '); background-repeat: no-repeat; background-position: center center; background-size: cover; background-attachment: scroll; ">';
	}else{
		echo '<header class=" entry-header min-h-20 align-stretch" style="background-image: url(';
			bloginfo('template_directory') ;
			echo '/assets/dist/images/navy_blue.png ); background-repeat: repeat; background-attachment: scroll; ">';
	}
	?>

		<?php the_title( '<h1 class="text-white font-normal pl-8 entry-title py-4 mb-0">', '</h1>' ); ?>
	</header>

	<div class="container entry-content p-8 bg-white ">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bka2021' ),
				'after'  => '</div>',
			) );
		?>
	</div>

</article>
