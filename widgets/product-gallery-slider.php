<?php
namespace ElementorCustomExtension\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Product_Gallery_Slider extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'product-gallery-slider';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Product Gallery Slider', 'elementor-custom-extension' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-gallery-group';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'product-gallery-slider' ];
	}

	/**
	 * Register the widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'elementor-custom-extension' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'elementor-custom-extension' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'elementor-custom-extension' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'elementor-custom-extension' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'elementor-custom-extension' ),
					'uppercase' => __( 'UPPERCASE', 'elementor-custom-extension' ),
					'lowercase' => __( 'lowercase', 'elementor-custom-extension' ),
					'capitalize' => __( 'Capitalize', 'elementor-custom-extension' ),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		//$settings = $this->get_settings_for_display();
		//echo $settings['title'];

		include_once( __DIR__ . '/../front-end/product-gallery-slider.php' );
	}

	/**
	 * Render the widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 *
   *protected function _content_template() {
   *	?>
   *	<div class="title">
   *		{{{ settings.title }}}
   *	</div>
   *	<?php
   *}
	*/

}
