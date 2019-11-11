<?php
namespace ElementorCustomExtension;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}


	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widget styles
		add_action( 'elementor/frontend/after_register_styles', [ $this, 'widget_styles' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
	}

	/**
	 * register widget scripts
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_register_script( 'jssor-slider-js', plugins_url( '/assets/js/jssor.slider-28.0.0.min.js', __FILE__ ), [], false, true );
		wp_register_script( 'product-gallery-slider', plugins_url( '/assets/js/product-gallery-slider.js', __FILE__ ), [ 'jssor-slider-js' ], false, true );
	}

	/**
	 * register widget styles
	 *
	 * @since 1.0.0
	 * @access public
	 */
	 public function widget_styles() {
  		wp_enqueue_style( 'jssor-slider-css', plugins_url( '/assets/css/jssor-slider.css', __FILE__ ) );
	 }

	/**
	 * Register Widgets
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function init_widgets() {

		// Its is now safe to include Widgets files
		require_once( __DIR__ . '/widgets/product-gallery-slider.php' );

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Product_Gallery_Slider() );
	}

}

// Instantiate Plugin Class
Plugin::instance();
