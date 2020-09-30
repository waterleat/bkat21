<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bka2021
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="text-2xl font-bold entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

				<?php if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<?php Bka2021\Core\Tags::posted_on(); ?>
						</div><!-- .entry-meta -->

		<?php endif; ?>
	</header>

	<div class="entry-content">
		<?php
			the_excerpt( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bka2021' ), array(
						'span' => array(
							'class' => array(),
						),
					) ), the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bka2021' ),
				'after'  => '</div>',
			) );
			?>
	</div>

	<footer class="entry-footer">
		<?php Bka2021\core\tags::entry_footer(); ?>
	</footer>
</article>
