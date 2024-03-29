<?php

namespace Bka2021\Setup;

class Setup
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action( 'after_setup_theme', [ $this, 'setup' ] );
        add_action( 'after_setup_theme', [ $this, 'content_width' ], 0);

				// hacker prevention from https://www.wp-tweaks.com/hackers-can-find-your-wordpress-username
				add_action( 'template_redirect', [ $this, 'redirect_to_home_if_author_parameter' ] );
				add_filter( 'rest_endpoints', [ $this, 'disable_rest_endpoints' ], 1 );
    }

		public function redirect_to_home_if_author_parameter() {
			$is_author_set = get_query_var( 'author', '' );
			if ( $is_author_set != '' && !is_admin()) {
				wp_redirect( home_url(), 301 );
				exit;
			}
		}

		public function disable_rest_endpoints ( $endpoints ) {
			if ( isset( $endpoints['/wp/v2/users'] ) ) {
				unset( $endpoints['/wp/v2/users'] );
			}
			if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
				unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
			}
			return $endpoints;
		}

    public function setup()
    {
        /*
         * You can activate this if you're planning to build a multilingual theme
         */

        //load_theme_textdomain( 'Bka2020', get_template_directory() . '/languages' );

        /*
         * Default Theme Support options better have
         */

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'custom-logo' );
        add_theme_support( 'responsive-embeds' );

        add_theme_support( 'html5',
		[
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ] );

        add_theme_support( 'custom-background', apply_filters( 'bka2021_custom_background_args',
		[
            'default-color' => 'ffffff',
            'default-image' => '',
        ] ) );

        /*
         * Activate Post formats if you need
         */
        add_theme_support( 'post-formats',
		[
            'aside',
            'gallery',
            'link',
            'image',
            'quote',
            'status',
            'video',
            'audio',
            'chat',
        ] );
    }

    /*
        Define a max content width to allow WordPress to properly resize your images
    */
    public function content_width()
    {
        $GLOBALS[ 'content_width' ] = apply_filters( 'content_width', 1440 );
    }

}
