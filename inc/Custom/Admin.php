<?php

namespace Bka2021\Custom;

use Bka2021\Api\Settings;
use Bka2021\Api\Callbacks\SettingsCallback;

/**
 * Admin
 * use it to write your admin related methods by tapping the settings api class.
 */
class Admin
{
	/**
	 * Store a new instance of the Settings API Class
	 * @var class instance
	 */
	public $settings;

	/**
	 * Callback class
	 * @var class instance
	 */
	public $callback;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->settings = new Settings();

		$this->callback = new SettingsCallback();
	}

	/**
     * register default hooks and actions for WordPress
     * @return
     */
	public function register()
	{
		$this->enqueue()->pages()->settings()->sections()->fields()->register_settings();

		$this->enqueue_faq( new Settings() );

		// add_action('admin_enqueue_scripts', array($this,'theme_admin_styles'));
	}

	public function theme_admin_styles()
  {
    wp_enqueue_style('some-css', get_template_directory_uri().'/assets/dist/css/style.css');
		// wp_enqueue_scripts('some-js', plugins_url('assets/eventvenue.js',__FILE__));
		// wp_enqueue_scripts('some-js', $this->plugin_url . 'src/js/eventvenue.js');
  }

	/**
	 * Trigger the register method of the Settings API Class
	 * @return
	 */
	private function register_settings() {
		$this->settings->register();
	}

	/**
	 * Enqueue scripts in specific admin pages
	 * @return $this
	 */
	private function enqueue()
	{
		// Scripts multidimensional array with styles and scripts
		$scripts = [
			'script' => [
				'jquery',
				'media_uploader',
				get_template_directory_uri() . '/assets/dist/js/admin.js'
			],
			'style' => [
				get_template_directory_uri() . '/assets/dist/css/admin.css',
				'wp-color-picker'
			]
		];

		// Pages array to where enqueue scripts
		$pages = [ 'toplevel_page_bka2021' ];

		// Enqueue files in Admin area
		$this->settings->admin_enqueue( $scripts, $pages );

		return $this;
	}

	/**
	 * Enqueue only to a specific page different from the main enqueue
	 * @param  Settings $settings 	a new instance of the Settings API class
	 * @return
	 */
	private function enqueue_faq( Settings $settings )
	{
		// Scripts multidimensional array with styles and scripts
		$scripts = [
			'style' => [
				get_template_directory_uri() . '/assets/dist/css/admin.css',
			]
		];

		// Pages array to where enqueue scripts
		$pages = [ 'bka2021_page_bka2021_faq' ];

		// Enqueue files in Admin area
		$settings->admin_enqueue( $scripts, $pages )->register();
	}

	/**
	 * Register admin pages and subpages at once
	 * @return $this
	 */
	private function pages()
	{
		$admin_pages = [
			[
				'page_title' => 'Theme Admin Page',
				'menu_title' => 'BKA Theme',
				'capability' => 'manage_options',
				'menu_slug' => 'bka2021',
				'callback' => [ $this->callback, 'admin_index' ],
				'icon_url' => get_template_directory_uri() . '/assets/dist/images/admin-icon.png',
				'position' => 110,
			]
		];

		$admin_subpages = [
			[
				'parent_slug' => 'bka2021',
				'page_title' => 'Bka2021 FAQ',
				'menu_title' => 'FAQ',
				'capability' => 'manage_options',
				'menu_slug' => 'bka2021_faq',
				'callback' => [ $this->callback, 'admin_faq' ]
			]
		];

		// Create multiple Admin menu pages and subpages
		$this->settings->addPages( $admin_pages )->withSubPage( 'Settings' )->addSubPages( $admin_subpages );

		return $this;
	}

	/**
	 * Register settings in preparation of custom fields
	 * @return $this
	 */
	private function settings()
	{
		// Register settings
		$args = [
			[
				'option_group' => 'bka2021_options_group',
				'option_name' => 'first_name',
				'callback' => [ $this->callback, 'bka2021_options_group' ]
			]
		];

		$this->settings->add_settings( $args );

		return $this;
	}

	/**
	 * Register sections in preparation of custom fields
	 * @return $this
	 */
	private function sections()
	{
		// Register sections
		$args = [
			[
				'id' => 'bka2021_admin_index',
				'title' => 'Settings',
				'callback' => [ $this->callback, 'bka2021_admin_index' ],
				'page' => 'bka2021'
			]
		];

		$this->settings->add_sections( $args );

		return $this;
	}

	/**
	 * Register custom admin fields
	 * @return $this
	 */
	private function fields()
	{
		// Register fields
		$args = [
			[
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => [ $this->callback, 'first_name' ],
				'page' => 'bka2021',
				'section' => 'bka2021_admin_index',
				'args' => [
					'label_for' => 'first_name',
					'class' => ''
				]
			],
			[
				'id' => 'last_name',
				'title' => 'Last Name',
				'callback' => [ $this->callback, 'last_name' ],
				'page' => 'bka2021',
				'section' => 'bka2021_admin_index',
				'args' => [
					'label_for' => 'last_name',
					'class' => ''
				]
			]
		];

		$this->settings->add_fields( $args );

		return $this;
	}
}
