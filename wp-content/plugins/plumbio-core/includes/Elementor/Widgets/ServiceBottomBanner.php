<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class ServiceBottomBanner extends Widget_Base {


	public function get_name() {
		return 'service_bottom_banner';
	}

	public function get_title() {
		return esc_html__( 'Service Bottom Banner', 'plumbio-core' );
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
			'image',
			array(
				'label'   => esc_html__( 'Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings             = $this->get_settings_for_display();
		$background_image     = ( $settings['background_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['background_image']['id'], 'full' ) : $settings['background_image']['url'];
		$background_image_alt = get_post_meta( $settings['background_image']['id'], '_wp_attachment_image_alt', true );
		$description          = $settings['description'];
		$image_url            = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['image']['id'], 'full' ) : $settings['image']['url'];
		$image                = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image( $settings['image']['id'], 'full' ) : $settings['image']['url'];
		$image_alt            = get_post_meta( $settings['image']['id'], '_wp_attachment_image_alt', true );
		?> 
		<div class="promo01 promo01__top lazyload" data-bg="<?php echo $background_image; ?>">
			<div class="promo01__content">
				<?php echo $description; ?>
			</div>
			<div class="promo01__img">
				<picture>
					<source media="(min-width: 575px)" srcset="<?php echo $image_url; ?>" type="image/png">
					<?php
					if ( wp_http_validate_url( $image ) ) {
						?>
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_url( $image_alt ); ?>">
						<?php
					} else {
						echo $image;
					}
					?>
				</picture>
			</div>
		</div>
		<?php
	}

	protected function content_template() {
	}
}
