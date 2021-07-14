<?php
/**
 * Template Name: Dojo Map Template
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Bka2020
 */

get_header();
?>
<div class="bg-white">
	<p class="p-2 md:px-4">This is the most up to date version of the map for dojo in the UK.</p>
	<div id="ukmap" style="height: 500px;"></div>
    <p class="p-2 md:px-4">If no map is shown then it is likely that your browser is not able to support the features used.
        Please use an alternative such as Chrome or Firefox.</p>
    <p class="p-2 md:px-4">An external version of the map is <a href="https://www.google.com/maps/d/viewer?mid=1LG99133uLOoRgwNSaNwzhIuujxg&ll=53.84387622700738%2C-2.2350062000000435&z=5&fbclid=IwAR07uuXKL6wAUs1mEfnvK--4lj7p8sdwwKIfsfUYNVw9P43AokLSbjOOxeg">available</a>, but this may not contain up-to-date information</p>
    <?php

    /* Start the Loop */
    // while ( have_posts() ) :
    //     the_post();
        // echo "<h1>map space</h1>";
        // // get_template_part('membership/mem', $post->post_name);
        // echo "<div id='ukmap' style='height: 500px;'></div>";
    // endwhile;


    ?>
</div>
<?php
get_footer();
