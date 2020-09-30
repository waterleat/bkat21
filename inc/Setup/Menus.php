<?php

namespace Bka2021\Setup;

/**
 * Menus
 */
class Menus
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action( 'after_setup_theme', array( $this, 'menus' ) );
    }

    public function menus()
    {
        /*
            Register all your menus here
        */
        register_nav_menus(array(
            'primary' => esc_html__( 'Primary', 'bka2021' ),
            'primary2' => esc_html__( 'Primary2', 'bka2021' ),
            // 'login' => esc_html__( 'Login', 'bka2021' ),
            'kendo1' => esc_html__( 'Kendo1', 'bka2021' ),
            'kendo2' => esc_html__( 'Kendo2', 'bka2021' ),
            'iaido1' => esc_html__( 'Iaido1', 'bka2021' ),
            'iaido2' => esc_html__( 'Iaido2', 'bka2021' ),
            'jodo1' => esc_html__( 'Jodo1', 'bka2021' ),
            'jodo2' => esc_html__( 'Jodo2', 'bka2021' ),
            'cs0' => esc_html__( 'Central Services 0', 'bka2021' ),
            'cs1' => esc_html__( 'Central Services 1', 'bka2021' ),
            'cs2' => esc_html__( 'Central Services 2', 'bka2021' ),
            'buAdmin' => esc_html__( 'Bu Officers', 'bka2021' ),
            'membershipAdmin' => esc_html__( 'Membership Officers', 'bka2021' ),
        ));
    }
}
