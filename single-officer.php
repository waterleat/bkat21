<?php
/**
 * The template for displaying a single custom post type
 * for an AGM Item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bka2021
 */

if ( ! is_user_logged_in() ) {
 	wp_redirect(esc_url(home_url('/')), 307);
}

$email = get_post_meta( $post->ID, 'email_1', true);

$elected = get_post_meta( $post->ID, 'elected_post', true);

$holderName = '<strong>Post not filled</strong>';
$holder = get_user_by( 'id', get_post_meta( $post->ID, 'current_holder', true) );
if ($holder) {
	$holderName = $holder->first_name . ' ' . $holder->last_name;
}

$candidates = [];
$options = get_option( 'bkap20_plugin_applicant' );
// var_dump($options);
foreach ($options as $key => $value) {
	if ($value['officer_post'] == $post->ID) {
		$candidates[] = $value;
	}
}


get_header();
/* Start the Loop */
while ( have_posts() ) {
	the_post();

	// show the page title on thumbnail immage or on background.
	if ( has_post_thumbnail() ) {
		?>
		<header class=" entry-header min-h-20 align-stretch" style="background-image: url(<?php the_post_thumbnail_url() ?>); background-repeat: no-repeat; background-position: cover; background-size: 100% auto; background-attachment: scroll; ">
		<?php
	} else {
		?>
		<header class=" entry-header min-h-20 align-stretch" >
		<?php
	}

	the_title( '<h1 class="text-white font-normal pl-8 entry-title pt-4">', '</h1>' );
	?>
	</header><!-- .entry-header -->

	<div class="bg-white">
		<div id="primary" class="content-area w-full p-4">
			<main id="main" class="site-main" role="main">
				<div class="text-right"><a href="mailto:<?php echo $email; ?>" class="btn btn-gray">email current holder</a></div>

				<h3>This is <?php echo ($elected) ? 'an elected' : 'a co-opted'; ?> post</h3>
				<h4>The current holder is <span class="text-xl text-black"><?php echo $holderName;?></span></h4>
				<h4>The applicants are:</h4>
				<div class="p-4 flex flex-wrap">
					<?php
					foreach ($candidates as $individual) {
						echo "<a href='".get_permalink(intval($individual['application_id']))."' class='btn btn-blue mb-6 ml-4'>"
						.get_user_by( 'id', $individual['applicant_user'])->first_name." "
						.get_user_by( 'id', $individual['applicant_user'])->last_name. "</a>";
					}
					?>
				</div>
				<?php
					the_content();
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					};
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .row -->

	<?php
}; // while Loop

get_footer();
