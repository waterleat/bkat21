<?php
/**
 * Template Name: Membership Template
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package bka2021
 */

get_header();
?>
<div class="bg-white">
<?php

 /* Start the Loop */
while ( have_posts() ) :
 the_post();

get_template_part('membership/mem', $post->post_name);


endwhile;
?>
</div>
<?php
get_footer();
