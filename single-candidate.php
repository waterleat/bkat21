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
				<?php
				// echo get_post()->ID;

				// $post_type = get_post_type(get_the_ID());
		    // $taxonomies = get_object_taxonomies($post_type);
		    // $taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names"));
				// if(!empty($taxonomy_names)) {
				// 	 foreach($taxonomy_names as $tax_name) {
				// 			echo "<p> $tax_name </p>";
				// 	 }
				// }

				// $taxonomy_objects = get_the_terms( get_post()->ID, 'Tags' );
		    // var_dump( $taxonomy_objects);
					$options = get_option( 'bkap20_plugin_applicant' );

					$applicant = get_userdata( $options[get_post()->ID]['applicant_user'] );
					$applicantName = $applicant->display_name;

					$office = get_post( $options[get_post()->ID]['officer_post'] );
					$officeTitle = $office->post_title;
					?>
					<div >
						<div class="flex">
							<h4 class="w-36 xs:w-1/3  text-right pr-4 my-4">Application for post of</h4>
							<?php echo "<h2>",$officeTitle,"</h2>"; ?>
						</div>
						<div class="flex">
							<h4 class="w-36 xs:w-1/3  text-right pr-4 my-4">by member</h4>
							<h2><?php echo $applicantName; ?></h2>
						</div>
						<div class="mt-8">
							Candidate's Statement
						</div>
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
