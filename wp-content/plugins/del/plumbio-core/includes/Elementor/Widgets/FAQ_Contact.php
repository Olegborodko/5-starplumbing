<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class FAQ_Contact extends Widget_Base {


	public function get_name() {
		return 'faq_contact';
	}

	public function get_title() {
		return esc_html__( 'FAQ Contact', 'plumbio-core' );
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
				'label' => esc_html__( 'general', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'tag_line',
			array(
				'label'   => esc_html__( 'Tag Line', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'       => esc_html__( 'Description', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

			)
		);

		$this->add_control(
			'short_code',
			array(
				'label'   => esc_html__( 'Short Code', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings    = $this->get_settings_for_display();
		$tag_line    = $settings['tag_line'];
		$heading     = $settings['heading'];
		$description = $settings['description'];
		$short_code  = $settings['short_code'];
		?> <div class="section-indent">
			<div class="container container__tablet-fluid">
				<div class="blocktitle text-center blocktitle__min-width03">
					<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
					<div class="blocktitle__title"><?php echo $heading; ?></div>
					<div class="blocktitle__text"><?php echo $description; ?></div>
				</div>
				<div class="row justify-content-md-center">
					<div class="col-md-10 col-lg-8">
					<?php echo do_shortcode( $short_code ); ?>
					</div>
				</div>
			</div>
		</div> 
		<?php
	}

	protected function content_template() {
	}
}

