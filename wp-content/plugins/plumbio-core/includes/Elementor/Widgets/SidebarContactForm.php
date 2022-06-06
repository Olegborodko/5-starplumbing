<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class SidebarContactForm extends Widget_Base {


	public function get_name() {
		return 'plumbio_sidebar_contact';
	}

	public function get_title() {
		return esc_html__( 'Sidebar Form ', 'plumbio-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'plumbio' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general',
			array(
				'label' => esc_html__( 'General', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'       => esc_html__( 'Heading', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'form_shortcode',
			array(
				'label'       => esc_html__( 'Form Shortcode', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings       = $this->get_settings_for_display();
		$heading        = $settings['heading'];
		$form_shortcode = $settings['form_shortcode'];
		?> 
		<div class="tt-aside02">
			<div class="tt-aside02__title">
				<?php echo $heading; ?>
			</div>
			<div class="tt-aside02__content">
				<?php echo do_shortcode( $form_shortcode ); ?>
			</div>
		</div>
		<?php
	}
	protected function content_template() {
	}
}
