<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class ServiceHeading extends Widget_Base {


	public function get_name() {
		return 'service_heading_description';
	}

	public function get_title() {
		return esc_html__( 'Service Heading', 'plumbio-core' );
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
			'under_title',
			array(
				'label'       => esc_html__( 'Under Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Services', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'sub_heading',
			array(
				'label'       => esc_html__( 'Sub Heading', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'our services', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => esc_html__( 'Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
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

		$this->end_controls_section();
	}
	protected function render() {
		$settings    = $this->get_settings_for_display();
		$under_title = $settings['under_title'];
		$sub_heading = $settings['sub_heading'];
		$title       = $settings['title'];
		$description = $settings['description'];
		?> 
		<div class="section-indent">
			<div class="container container__fluid-xl">
				<div class="row">
					<div class="col-md-5 col-lg-6">
						<div class="blocktitle text-left blocktitle__nomargin">
							<div class="blocktitle__under"><?php echo $under_title; ?></div>
							<div class="blocktitle__subtitle"><?php echo $sub_heading; ?></div>
							<div class="blocktitle__title"><?php echo $title; ?></div>
						</div>
					</div>
					<div class="col-md-6 col-lg-6 tt-hide__mobile">
						<div class="tt-notes">
							<?php echo $description; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	protected function content_template() {
	}
}
