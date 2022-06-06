<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Core\Schemes;
class EmergencyService extends Widget_Base {


	public function get_name() {
		return 'emergency_service';
	}

	public function get_title() {
		return esc_html__( 'Emergency Service', 'plumbio-core' );
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
			'background_image',
			array(
				'label'   => esc_html__( 'Background Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

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
			'heading',
			array(
				'label'       => esc_html__( 'Heading', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

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
			'icon',
			array(
				'label' => esc_html__( 'Icon', 'plumbio-core' ),
				'type'  => Controls_Manager::ICONS,
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
				'selector' => '{{WRAPPER}} .tt-title',
			)
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings             = $this->get_settings_for_display();
		$background_image     = ( $settings['background_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['background_image']['id'], 'full' ) : $settings['background_image']['url'];
		$background_image_alt = get_post_meta( $settings['background_image']['id'], '_wp_attachment_image_alt', true );
		$heading              = $settings['heading'];
		$description          = $settings['description'];
		$icon                 = $settings['icon'];
		$html_tag             = $settings['html_tag'];
		?> 
		<div class="section-indent">
			<div class="fullwidth-promo init-parallax lazyload" data-bg="<?php echo $background_image; ?>">
				<div class="fullwidth-promo__indent-02">
					<div class="tt-icon"><?php \Elementor\Icons_Manager::render_icon( ( $icon ), array( 'aria-hidden' => 'true' ) ); ?></div>
						<<?php echo $html_tag; ?> class="tt-title"><?php echo $heading; ?></<?php echo $html_tag; ?>>
					<p>
						<?php echo $description; ?>
					</p>
				</div>
			</div>
		</div>
		<?php
	}
	protected function content_template() {
	}
}
