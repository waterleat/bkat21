<?php
/**
 * Template Name: Membership Admin Template
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package bka2021
 */

get_header();

 /* Start the Loop */
while ( have_posts() ) :
 the_post();

get_template_part('membership/membershipadmin/mem', $post->post_name);


endwhile;

get_footer();
