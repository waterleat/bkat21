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
    <p>If no map is shown then it is likely that your browser is not able to support the features used.
        Please use an alternative such as Chrome or Firefox.</p>
    <p>An external version of the map is <a href="https://www.google.com/maps/d/viewer?mid=1LG99133uLOoRgwNSaNwzhIuujxg&ll=53.84387622700738%2C-2.2350062000000435&z=5&fbclid=IwAR07uuXKL6wAUs1mEfnvK--4lj7p8sdwwKIfsfUYNVw9P43AokLSbjOOxeg">available</a>, but this may not contain up-to-date information</p>
    <div id="ukmap" style="height: 500px;"></div>
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
