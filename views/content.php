<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bka2021
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header text-center md:text-left">
		<?php
		if ( is_single() ) {
			the_title( '<h1 class="text-4xl font-bold entry-title pt-2">', '</h1>' );
			if ( 'post' === get_post_type() ) {
				?>
				<div class="entry-meta mb-4">
					<?php
					Bka2021\Core\Tags::posted_on();
					?>
				</div><!-- .entry-meta -->
				<?php
			}
		}
 		?>
	</header>

	<?php
	if ( is_singular() ) {
		?>
		<div class="entry-content ">
			<div class=" flex flex-col ">
				<?php the_post_thumbnail('medium', ['class' => 'mb-4  mx-auto ' ]); ?>
			</div>
			<?php
			the_content(
				sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bka2021' ),
						array(
							'span' => array( 'class' => array(), ),
						)
					),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bka2021' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
		<?php
	} else {
		?>
		<!-- <div class="entry-content flex flex-col md:flex-row"> -->
		<div id="post-<?php the_ID(); ?>"  class="mb-20">
			<?php
			if (has_post_thumbnail( get_the_ID() )) {
				?>
				<div class="mt-4 mb-2 h-32 w-full">
					<?php the_post_thumbnail('full', ['class' => 'h-full  ' ]); ?>
				</div>
				<?php
			}
			?>

			<h2 class="font-normal mt-0 mb-2"><a class="text-grey055 hover:text-ltblue" href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
			<div class="border-t-2 border-dkblue mb-2">
			</div>
			<?php
				the_excerpt();

			// wp_link_pages( array(
			// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bka2021' ),
			// 	'after' => '</div>',
			// ) );
			?>
		</div>
		<?php
	}
	?>

	<footer class="entry-footer mt-4 mb-8 flex justify-between">
		<?php // Bka2021\Core\Tags::entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
