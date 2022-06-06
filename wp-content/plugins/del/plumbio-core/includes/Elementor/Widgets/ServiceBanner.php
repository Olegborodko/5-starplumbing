<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class ServiceBanner extends Widget_Base {


	public function get_name() {
		return 'service_banner';
	}

	public function get_title() {
		return esc_html__( 'Service Banner', 'plumbio-core' );
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
			'layout_style',
			array(
				'label'   => __( 'Layout Style', 'plugin-domain' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'Style 1', 'plugin-domain' ),
					'2' => __( 'Style 2', 'plugin-domain' ),
				),
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
			'icon',
			array(
				'label' => esc_html__( 'Icon', 'plumbio-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);

		$this->add_control(
			'service_heading',
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
			'extra_class',
			array(
				'label' => esc_html__( 'Extra Class', 'plumbio-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings         = $this->get_settings_for_display();
		$layout_style     = $settings['layout_style'];
		$background_image = ( $settings['background_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['background_image']['id'], 'full' ) : $settings['background_image']['url'];
		$icon             = $settings['icon'];
		$service_heading  = $settings['service_heading'];
		$description      = $settings['description'];
		$extra_class      = $settings['extra_class'];

		?>
		<?php if ( $layout_style == '1' ) { ?>
			<div class="section-indent05 <?php echo $extra_class; ?>">
				<div class="fullwidth-promo init-parallax lazyload" data-bg="<?php echo $background_image; ?>">
					<div class="fullwidth-promo__indent-01">
						<div class="tt-icon"><?php \Elementor\Icons_Manager::render_icon( ( $icon ), array( 'aria-hidden' => 'true' ) ); ?></div>
						<div class="tt-title">
							<?php echo $service_heading; ?>
						</div>
						<p>
							<?php echo $description; ?>
						</p>
					</div>
				</div>
			</div>
		<?php } elseif ( $layout_style == '2' ) { ?>
			<div class="section-indent">
				<div class="fullwidth-promo fullwidth-promo__place-tabs init-parallax lazyloaded" data-bg="images/bg-04.jpg" style="background-image: url(<?php echo $background_image; ?>);">
					<div class="fullwidth-promo__indent-03">
						<div class="tt-icon"><?php \Elementor\Icons_Manager::render_icon( ( $icon ), array( 'aria-hidden' => 'true' ) ); ?></div>
						<div class="tt-title"><?php echo $service_heading; ?></div>
						<p><?php echo $description; ?></p>
					</div>
				</div>
			</div>
			<?php
		}
	}

	protected function content_template() {
	}
}
