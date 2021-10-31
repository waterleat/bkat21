<?php
/**
 * The template for displaying the contact us page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bka2021, bkap20
 */
function contactUsTable($buList, $options)
{
	echo "<table class='thead-tr-th-p-2 tcontact grey-table'><thead><tr><th>Post</th><th>Current Holder</th><th>Email</th></tr></thead><tbody>";
	foreach ($buList as $key => $value) {
		$holderName = '<strong>Post not filled</strong>';
		$email = '';
		if (array_key_exists($value, $options)) {
			$holder = get_user_by( 'id', $options[$value]['current_holder'] );
			if ($holder) {
				$holderName = $holder->first_name . ' ' . $holder->last_name;
			}
			$email = ($options[$value]['email']);
		}
		$emailBtn = ($email) ? "<a href='mailto:$email' class='btn-small btn-blue'>email</a>" : '';
		echo "<tr><td>", get_post($value)->post_title, "</td><td>$holderName</td><td>$emailBtn</td></tr>";

	}
	echo "</tbody></table>";
}

// $option = get_option( 'bka2019ds_plugin' );
// $post_id = get_the_id();

get_header();
?>

<!-- <div class="flex flex-col md:flex-row p-4 bg-white dark:bg-gray-700 dark:text-gray-200"> -->
<!-- no sidebar -->
  <!-- <div id="primary" class="content-area w-full  p-4">
    <main id="main" class="site-main dark:bg-gray-800 dark:text-gray-200" role="main">
      <div class="front-page border-b-2 border-dkblue pb-6 mb-8"> -->
        <?php
        /* Start the Loop */
        // while ( have_posts() ) :
        //   the_post();
        //   // the_content();
        // endwhile;
        ?>
      <!-- </div>
		</main> -->
		<!-- #main -->

<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();

	// show the page title on thumbnail immage or on background.
	$headerStyle = ( has_post_thumbnail() ) ?
		"background-image: url( ". get_the_post_thumbnail_url(). " ); background-repeat: no-repeat;
		background-position: center center; background-size: cover; background-attachment: scroll;" :"";
	?>
	<header class=" entry-header min-h-20 align-stretch" style="<?php echo $headerStyle; ?>">
		<?php
		the_title( '<h1 class="m-0 text-white text-3xl xs:text-4xl font-normal pl-2 xs:pl-8 py-1 entry-title">', '</h1>' );
		?>
	</header>


	<div class=" bg-white">

		<div id="primary" class="content-area w-full p-6">
			<main id="main" class="site-main" role="main">
			<?php
			// the_content();
			// wp_link_pages(
			// 	array(
			// 		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bka2021' ),
			// 		'after'  => '</div>',
			// 	)
			// );
			?>

			</main>

			<div class="">
				<p>If you need to contact us for any reason please check out the people below:</p>
				<?php
				$args = [
					'numberposts' => -1,
					'post_type' => 'officer',
					'order' => 'ASC',
				];
				$officers = get_posts($args);
				// var_dump($officers);

				$options = get_option( 'bkap20_plugin_officers' );
				// var_dump($options);
				foreach ($officers as $officer) {
					$cats = get_the_terms( $officer->ID, 'category' );
					foreach ($cats as $key => $value) {
						if ($value->name == 'AGM'){
							continue;
						}
						if ($value->name == 'BKA'){
							$ncList[] = $officer->ID;
						}
						if ($value->name == 'Kendo'){
							$kList[] = $officer->ID;
						}
						if ($value->name == 'Iaido'){
							$iList[] = $officer->ID;
						}
						if ($value->name == 'Jodo'){
							$jList[] = $officer->ID;
						}
						if ($value->name == 'General'){
							$gList[] = $officer->ID;
						}
					}
				}
				echo "<h3 class='text-center'>National Committee</h3>";
				contactUsTable($ncList, $options);

				echo "<h3 class='text-center'>Kendo Bu Management Team</h3>";
				contactUsTable($kList, $options);

				echo "<h3 class='text-center'>Iaido Bu Management Team</h3>";
				contactUsTable($iList, $options);

				echo "<h3 class='text-center'>Jodo Bu Management Team</h3>";
				contactUsTable($jList, $options);

				echo "<h3 class='text-center'>Other Useful Contacts</h3>";
				contactUsTable($gList, $options);

				?>
			</div>
		</div>

	</div>

	<?php
endwhile;

get_footer();
