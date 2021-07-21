<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bka2021
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) :
	return;
endif;
// if ( get_post_type() == 'agmitem'){
// 	$showForm = TRUE;
// // } else {
// // 	$showForm = FALSE;
// // 	$bu = get_user_meta( get_current_user_ID(), 'arts', TRUE );
// // 	// $bu = get_user_meta( get_current_user_ID(), 'arts', FALSE );
// // 	// var_dump($bu);
// // 	$slug = get_page_template_slug($post->ID);
// // 	// var_dump($slug);
// // 	$b = substr($slug, strpos($slug, '/') + 1,-strlen($slug)+strpos($slug, '_'));
// // 	// var_dump($b);
// // 	if ( ! array_key_exists($b, $bu) ) {
// // 		$showForm = TRUE;
// // 	} else {
// // 		if ( $bu[$b] == "1" ) {
// // 		// if ($bu[$b] == "1" ) {
// // 			$showForm = TRUE;
// // 		}
// // 	}
// };

$bu = get_user_meta( get_current_user_ID(), 'arts', TRUE );
// $bu = get_user_meta( get_current_user_ID(), 'arts', FALSE );

$bu = [
	'kendo' => '0',
	'iaido' => '1',
	'jodo' => '1',
];
// var_dump($bu);

// Get a list of categories and extract their names
$post_categories = get_the_terms( $post->ID, 'category' );
if ( ! empty( $post_categories ) && ! is_wp_error( $post_categories ) ) {
	$categories = wp_list_pluck( $post_categories, 'name' );
}
// var_dump($categories);
// check bu membersip with cpt category
if (in_array('BKA', $categories)) {
	// echo "BKA";
	$showForm = TRUE;
} else {
	$showForm = FALSE;
	foreach ($bu as $key => $value) {
		if (!$value) {
			continue;
		}
		// echo "<br>key $key value $value <br>";
		// var_dump(ucwords($key), $value);
		if ( $value == '1'  ) {
			// echo "one";
			if ( in_array(ucwords($key), $categories,FALSE)) {
				// echo "<br>$key in categories";
				$showForm = TRUE;
				// echo "break";
				break;
			}
		};
		// var_dump($showForm);
	};
};
?>

<div id="comments" class="comments-area border-t-2 border-blue-500">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		if (! $showForm ) {
			echo "<p class='bg-yellow-400 px-4'>You are not a member of the $b bu, so you are unable to add a comment</p>";
		}
	?>

		<h2 class="text-2xl font-bold comments-title">
			<?php
				printf(
					/* translators: 1: Comments count. */
					esc_html( _n( '%d Comment.', '%d Comments.', get_comments_number(), 'bka2021' ) ), absint( get_comments_number() ) );
			?>
		</h2><!-- .comments-title -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="text-2xl font-bold screen-reader-text"><?php esc_html_e( 'Comment navigation', 'bka2021' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'bka2021' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'bka2021' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="text-2xl font-bold screen-reader-text"><?php esc_html_e( 'Comment navigation', 'bka2021' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'bka2021' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'bka2021' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bka2021' ); ?></p>
	<?php
	endif;

	// for all args see https://codex.wordpress.org/Function_Reference/comment_form
	$args = array(
		'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
		  '</label><textarea id="comment" name="comment" class="w-full p-4 border-2 border-blue-500" rows="8" aria-required="true">' .
		  '</textarea></p>',
	);

	if ($showForm ) {
		comment_form($args);
	}
	?>

</div><!-- #comments -->
