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
				$elections = get_page_by_title( 'Officer Nominations', '', 'agmitem' );
				// echo $elections->ID;
				// echo $post->ID;
				if ($post->ID == $elections->ID) {

					$taxonomies = get_object_taxonomies('officer');
					// var_dump($taxonomies);
					$list = [];
					$options = get_option( 'bkap20_plugin_applicant' ) ?: array();
					foreach ($options as $key => $value) {
						// var_dump($key);
						$taxonomy_names = wp_get_object_terms($key, $taxonomies,  array("fields" => "names"));
						// var_dump($taxonomy_names);
						if (in_array(date('Y'),$taxonomy_names)) {
							$list[$key] = $value;
						}
					}
					echo '<table class="thead-tr-th-p-2 tbody-tr-td-p-2"><tr><th>Applicant</th><th>Office</th><th class="text-center">Statement</th></tr>';
					foreach ($list as $option) {
						$user = get_userdata($option['applicant_user']);
						$name = $user->last_name .', ' . $user->first_name;
						$officer_post = get_post($option['officer_post']);
						$officer_title = $officer_post->post_title;

						echo "<tr><td>{$name}</td><td>{$officer_title}</td><td><a href='{$option['media_upload']}' class='btn-gray btn-small'>view</a></td></tr>";
					}

					echo '</table>';

				} else {

					the_content();
					// If post has these tags dissalllow questions.
					$post_tags = get_the_tags(get_the_ID());
					$tag_names = [];
					$allowQuestions = TRUE;
					if ($post_tags) {
						foreach ($post_tags as $key => $value) {
							if ($value->name == 'agenda'
							|| $value->name == 'election'
							|| $value->name == 'bu') {
								$allowQuestions = FALSE;
								break;
							};
						}
					}
					if ($allowQuestions) {
						// $code_text = '[question-form]';
						if ($allowQuestions ) {
							echo '<div class="md:p-4	">';
							echo do_shortcode('[question-form]');
							echo "</div>";

							echo '<div class="md:p-4">';
							echo do_shortcode('[question-slideshow]');
							echo "</div>";
						}
					}

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					};
				}
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .row -->

	<?php
}; // while Loop

get_footer();
