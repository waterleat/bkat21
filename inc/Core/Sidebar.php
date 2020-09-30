<?php

namespace Bka2021\Core;

/**
 * Sidebar.
 */
class Sidebar
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action( 'widgets_init', array( $this, 'widgets_init' ) );
    }

    /*
        Define the sidebar
    */
    public function widgets_init()
    {
      // has to be lowercase for ID name of sidebar -- theme root dir/sidebar.php
        register_sidebar( array(
            'name' => esc_html__('Sidebar', 'bka2021'),
            'id' => 'bka2021-sidebar',
            'description' => esc_html__('Default sidebar to add all your widgets.', 'bka2021'),
            'before_widget' => '<section id="%1$s" class="widget %2$s p-2">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="text-redish font-normal widget-title">',
            'after_title' => '</h2>',
        ) );

        // widget area above footer
        register_sidebar( array(
            'name' => esc_html__('AboveFooter', 'bka2021'),
            'id' => 'bka2021-footbar',
            'description' => esc_html__('Area below main content to add widgets.', 'bka2021'),
            'before_widget' => '<section id="%1$s" class="widget %2$s px-4 mb-8 w-full md:w-1/3">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="my-2 font-bold widget-title">',
            'after_title' => '</h3>',
        ) );
    }
}
