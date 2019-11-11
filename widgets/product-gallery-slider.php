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
		$settings = $this->get_settings_for_display();
		$image_url = PLUGIN_BASE_URL.'assets/images';
		//echo $settings['title'];

		echo <<<SLIDER_HTML
		<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:960px;height:480px;overflow:hidden;visibility:hidden;background-color:#24262e;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="{$image_url}/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:240px;width:720px;height:480px;overflow:hidden;">
            <div>
                <img data-u="image" src="{$image_url}/004.jpg" />
                <img data-u="thumb" src="{$image_url}/004-s99x66.jpg" />
            </div>
            <div>
                <img data-u="image" src="{$image_url}/005.jpg" />
                <img data-u="thumb" src="{$image_url}/005-s99x66.jpg" />
            </div>
            <div>
                <img data-u="image" src="{$image_url}/006.jpg" />
                <img data-u="thumb" src="{$image_url}/006-s99x66.jpg" />
            </div>
            <div>
                <img data-u="image" src="{$image_url}/007.jpg" />
                <img data-u="thumb" src="{$image_url}/007-s99x66.jpg" />
            </div>
            <div>
                <img data-u="image" src="{$image_url}/008.jpg" />
                <img data-u="thumb" src="{$image_url}/008-s99x66.jpg" />
            </div>
            <div>
                <img data-u="image" src="{$image_url}/009.jpg" />
                <img data-u="thumb" src="{$image_url}/009-s99x66.jpg" />
            </div>
            <div>
                <img data-u="image" src="{$image_url}/010.jpg" />
                <img data-u="thumb" src="{$image_url}/010-s99x66.jpg" />
            </div>
            <div>
                <img data-u="image" src="{$image_url}/013.jpg" />
                <img data-u="thumb" src="{$image_url}/013-s99x66.jpg" />
            </div>
            <div>
                <img data-u="image" src="{$image_url}/014.jpg" />
                <img data-u="thumb" src="{$image_url}/014-s99x66.jpg" />
            </div>
            <div>
                <img data-u="image" src="{$image_url}/015.jpg" />
                <img data-u="thumb" src="{$image_url}/015-s99x66.jpg" />
            </div>
            <div>
                <img data-u="image" src="{$image_url}/016.jpg" />
                <img data-u="thumb" src="{$image_url}/016-s99x66.jpg" />
            </div>
            <div>
                <img data-u="image" src="{$image_url}/017.jpg" />
                <img data-u="thumb" src="{$image_url}/017-s99x66.jpg" />
            </div>
            <div>
                <img data-u="image" src="{$image_url}/018.jpg" />
                <img data-u="thumb" src="{$image_url}/018-s99x66.jpg" />
            </div><a data-u="any" href="https://www.jssor.com" style="display:none">slider bootstrap</a>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;top:0px;width:240px;height:480px;background-color:#000;" data-autocenter="2" data-scale-left="0.75">
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:99px;height:66px;">
                    <div data-u="thumbnailtemplate" class="t"></div>
                    <svg viewbox="0 0 16000 16000" class="cv">
                        <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                        <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                        <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                    </svg>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora093" style="width:50px;height:50px;top:0px;left:270px;" data-autocenter="2">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora093" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
            </svg>
        </div>
    </div>
    <!-- #endregion Jssor Slider End -->
SLIDER_HTML;

	}

	/**
	 * Render the widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
		?>

		<div class="title">
			{{{ settings.title }}}
		</div>

		<?php
	}

}
