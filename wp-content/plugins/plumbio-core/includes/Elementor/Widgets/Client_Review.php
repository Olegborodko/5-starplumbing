<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Core\Schemes;

class Client_Review extends Widget_Base {


	public function get_name() {
		return 'client_review';
	}

	public function get_title() {
		return esc_html__( 'Client Review', 'plumbio-core' );
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
			'client_image',
			array(
				'label'   => esc_html__( 'Client Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label'   => esc_html__( 'Sub Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'help us to get better', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Write Your Review', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'html_tag',
			array(
				'label'   => esc_html__( 'Html Tag', 'plumbio-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h1'   => esc_html__( 'H1', 'plumbio-core' ),
					'h2'   => esc_html__( 'H2', 'plumbio-core' ),
					'h3'   => esc_html__( 'H3', 'plumbio-core' ),
					'h4'   => esc_html__( 'H4', 'plumbio-core' ),
					'h5'   => esc_html__( 'H5', 'plumbio-core' ),
					'h6'   => esc_html__( 'H6', 'plumbio-core' ),
					'div'  => esc_html__( 'div', 'plumbio-core' ),
					'span' => esc_html__( 'span', 'plumbio-core' ),
					'p'    => esc_html__( 'p', 'plumbio-core' ),
				),
				'default' => 'div',

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
		$this->add_control(
			'extra_class',
			array(
				'label' => esc_html__( 'Extra Class', 'plumbio-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'text_style_section',
			array(
				'label' => __( 'Typography', 'plumbio-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Typography', 'plumbio-core' ),
				'selector' => '{{WRAPPER}} .blocktitle__title',
			)
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings         = $this->get_settings_for_display();
		$extra_class      = $settings['extra_class'];
		$client_image     = ( $settings['client_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['client_image']['id'], 'full' ) : $settings['client_image']['url'];
		$client_image_alt = get_post_meta( $settings['client_image']['id'], '_wp_attachment_image_alt', true );
		$sub_title        = $settings['sub_title'];
		$title            = $settings['title'];
		$form_shortcode   = $settings['form_shortcode'];
		$html_tag         = $settings['html_tag'];
		?> 
		<div class="section-inner <?php echo $extra_class; ?>">
			<div class="bg-testimonials-map">
				<div class="testimonials-map-img">
					<picture>
						<source media="(min-width: 1025px)" srcset="<?php echo $client_image; ?>" type="image/png">
						<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="">
					</picture>
				</div>
				<div class="container container__fluid-lg">
					<div class="row justify-content-md-center">
						<div class="col-md-10 col-lg-6 offset-lg-6">
							<div class="blocktitle">
								<div class="blocktitle__subtitle"><?php echo $sub_title; ?></div>
								<<?php echo $html_tag; ?> class="blocktitle__title"><?php echo $title; ?></<?php echo $html_tag; ?>>
							</div>
							<?php echo do_shortcode( $form_shortcode ); ?>
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
