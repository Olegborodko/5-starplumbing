<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Choose extends Widget_Base {


	public function get_name() {
		return 'choose';
	}

	public function get_title() {
		return esc_html__( 'Choose', 'plumbio-core' );
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
			'image',
			array(
				'label'   => esc_html__( 'Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'block_title',
			array(
				'label'   => esc_html__( 'Block Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
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
			'list_field1',
			array(
				'label'       => esc_html__( 'List Field1', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

			)
		);

		$this->add_control(
			'list_field2',
			array(
				'label'       => esc_html__( 'List Field2', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		$image       = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['image']['id'], 'full' ) : $settings['image']['url'];
		$image_alt   = get_post_meta( $settings['image']['id'], '_wp_attachment_image_alt', true );
		$block_title = $settings['block_title'];
		$tag_line    = $settings['tag_line'];
		$heading     = $settings['heading'];
		$description = $settings['description'];
		$list_field1 = $settings['list_field1'];
		$list_field2 = $settings['list_field2'];
		?> 
		<div class="section-indent">
			<div class="layout02">
				<div class="layout02_bg layout02_bg-right lazyload" data-bg="<?php echo $image; ?>"></div>
				<div class="container container__fluid-xl">
					<div class="layout02__content layout02__content-indent01">
						<div class="row">
							<div class="col-md-7">
								<div class="blocktitle text-left">
									<div class="blocktitle__under"><?php echo $block_title; ?></div>
									<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
									<div class="blocktitle__title"><?php echo $heading; ?></div>
								</div>
								<p class="tt-min-width-02">
									<?php echo $description; ?>
								</p>
								<div class="row tt-list_top02">
									<div class="col-md-6 col-xl-5">
										<ul class="tt-list tt-list__color01">
											<?php echo $list_field1; ?>
										</ul>
									</div>
									<div class="col-md-6 col-xl-6">
										<ul class="tt-list tt-list__color01">
											<?php echo $list_field2; ?>
										</ul>
									</div>
								</div>
							</div>
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


