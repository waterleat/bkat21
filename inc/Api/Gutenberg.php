<?php
/**
 * Build Gutenberg Blocks
 *
 * @package bka2021
 */

namespace Bka2021\Api;

/**
 * Customizer class
 */
class Gutenberg
{
	/**
	 * Register default hooks and actions for WordPress
	 *
	 * @return WordPress add_action()
	 */
	public function register()
	{
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		add_action( 'init', array( $this, 'gutenberg_enqueue' ) );

		// // Hook scripts function into block editor hook
		// add_action( 'enqueue_block_assets', array( $this, 'hello_gutenberg_scripts' ) );
		//
		// add_action( 'add_meta_boxes', array( $this, 'hello_gutenberg_add_meta_box' ) );
		// add_action( 'save_post', array( $this, 'hello_gutenberg_save_postdata' ) );
		// add_action( 'init', array( $this, 'hello_gutenberg_register_meta' ) );
	}

	/**
 * Enqueue front end and editor JavaScript and CSS
 */
	function hello_gutenberg_scripts() {
		// $blockPath = '/dist/block.js';
		// $stylePath = '/dist/block.css';
		//
		// // Enqueue the bundled block JS file
		// wp_enqueue_script(
		// 	'hello-gutenberg-block-js',
		// 	plugins_url( $blockPath, __FILE__ ),
		// 	[ 'wp-i18n', 'wp-blocks', 'wp-editor', 'wp-components' ],
		// 	filemtime( plugin_dir_path(__FILE__) . $blockPath )
		// );
		//
		// // Enqueue frontend and editor block styles
		// wp_enqueue_style(
		// 	'hello-gutenberg-block-css',
		// 	plugins_url( $stylePath, __FILE__ ),
		// 	'',
		// 	filemtime( plugin_dir_path(__FILE__) . $stylePath )
		// );

	}

	/**
	 * Register Hello Gutenberg Meta Field to Rest API
	 */
	function hello_gutenberg_register_meta() {
		register_meta(
			'post', '_hello_gutenberg_field', array(
				'type'		=> 'string',
				'single'	=> true,
				'show_in_rest'	=> true,
			)
		);
	}

	/**
 * Register Hello Gutenbert Meta Box
 */
	function hello_gutenberg_add_meta_box() {
		add_meta_box( 'hello_gutenberg_meta_box', // id
			// __( 'Hello Gutenberg Meta Box', 'hello-gutenberg' ), // title
			'Hello Gutenberg Meta Box', // title
			array( $this, 'hello_gutenberg_metabox_callback' ), // callback
			'post',  // screen context priority callback_args
			'', '', array( // adde these two blanks to get arrayin correct position
				'__back_compat_meta_box' => false, // using array into callback_args
			)
		);
	}

	/**
	 * Hello Gutenberg Metabox Callback
	 */
	function hello_gutenberg_metabox_callback( $post ) {
		$value = get_post_meta( $post->ID, '_hello_gutenberg_field', true );
		?>
		<label for="hello_gutenberg_field"><?php _e( 'What\'s your name?', 'hello-gutenberg' ) ?></label>
		<input type="text" name="hello_gutenberg_field" id="hello_gutenberg_field" value="<?php echo $value ?>" />
		<?php
	}

	/**
	 * Save Hello Gutenberg Metabox
	 */
	function hello_gutenberg_save_postdata( $post_id ) {
		if ( array_key_exists( 'hello_gutenberg_field', $_POST ) ) {
			update_post_meta( $post_id, '_hello_gutenberg_field', $_POST['hello_gutenberg_field'] );
		}
	}


	/**
	 * Enqueue scripts and styles of your Gutenberg blocks
	 * @return
	 */
	public function gutenberg_enqueue()
	{
		wp_register_script( 'gutenberg-test',
			get_template_directory_uri() . '/assets/dist/js/gutenberg.js',
			array( 'wp-blocks', 'wp-element' ) );


		wp_register_style( 'gutenberg-test-style',
			get_template_directory_uri() . '/assets/dist/css/gutenberg.css',
			array( 'wp-edit-blocks' ), time() );

		wp_register_style( 'gutenberg-test-editor',
			get_template_directory_uri() . '/assets/dist/css/editor.css',
			array( 'wp-edit-blocks' ), time() );

		wp_register_script( 'gutenberg-card',
			get_template_directory_uri() . '/assets/dist/js/gutenberg.js',
			array( 'wp-blocks', 'wp-element', 'wp-il8n', 'wp-editor', 'wp-components' ) );


		wp_register_script( 'hello-gutenberg',
			get_template_directory_uri() . '/assets/dist/js/gutenberg.js',
			array( 'wp-blocks', 'wp-editor', 'wp-i18n', 'wp-components' ) );
		// register block types

		register_block_type( 'gutenberg-test/hello-world', array(
			'editor_script' => 'gutenberg-test', // Load script in the editor
			'editor_style' => 'gutenberg-test', // Load style in the editor
			'style' => 'gutenberg-test-style', // Load style in the front-end
		) );

		// register_block_type( 'gutenberg-test/latest-post', array(
		// 	'render_callback' => array( $this, 'bka2021_render_block_latest_post' ),
		// 	'editor_style' => 'gutenberg-test',
		// 	'style' => 'gutenberg-test'
		// ) );

// 1
		register_block_type( 'gutenberg-test/step-one', array(
        'editor_script' => 'gutenberg-test',
				'editor_style' => 'gutenberg-test-editor', // Load style in the editor
				'style' => 'gutenberg-test-style', // Load style in the front-end
    ) );

// 2
		// editable block
		register_block_type( 'gutenberg-test/step-two', array(
        'editor_script' => 'gutenberg-card',
				'editor_style' => 'gutenberg-test-editor', // Load style in the editor
				'style' => 'gutenberg-test-style', // Load style in the front-end
    ) );

		// editable block
		register_block_type( 'gutenberg-test/step-three', array(
        'editor_script' => 'gutenberg-card',
				'editor_style' => 'gutenberg-test-editor', // Load style in the editor
				'style' => 'gutenberg-test-style', // Load style in the front-end
    ) );

		register_block_type( 'gutenberg-test/step-five', array(
        'editor_script' => 'gutenberg-test',
				'editor_style' => 'gutenberg-test-editor', // Load style in the editor
				'style' => 'gutenberg-test-style', // Load style in the front-end
    ) );

// 1
		register_block_type( 'gutenberg-test/step-six', array(
        'editor_script' => 'gutenberg-card',
				'editor_style' => 'gutenberg-test-editor', // Load style in the editor
				'style' => 'gutenberg-test-style', // Load style in the front-end
    ) );

		// hello gut
		// register_block_type( 'hello-gutenberg/step-four', array(
    //     'editor_script' => 'gutenberg-test',
		// 		'editor_style' => 'gutenberg-test-editor', // Load style in the editor
		// 		'style' => 'gutenberg-test-style', // Load style in the front-end
    // ) );
	}

	// public function bka2021_render_block_latest_post( $attributes )
	// {
	// 	$recent_posts = wp_get_recent_posts( array(
	// 		'numberposts' => 1,
	// 		'post_status' => 'publish',
	// 	) );
	//
	// 	if ( count( $recent_posts ) === 0 ) {
	// 		return 'No posts';
	// 	}
	//
	// 	$post = $recent_posts[ 0 ];
	// 	$post_id = $post[ 'ID' ];
	//
	// 	return sprintf(
	// 		'<a class="wp-block-bka2021-latest-post" href="%1$s">%2$s</a>',
	// 		esc_url( get_permalink( $post_id ) ),
	// 		esc_html( get_the_title( $post_id ) )
	// 	);
	// }
}
