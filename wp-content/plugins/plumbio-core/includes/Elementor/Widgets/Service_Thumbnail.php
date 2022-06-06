<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Service_Thumbnail extends Widget_Base {


	public function get_name() {
		return 'service_image_thumbnail';
	}

	public function get_title() {
		return esc_html__( 'Service Image Thumbnail', 'plumbio-core' );
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
			'sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'commercial services', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'       => esc_html__( 'Heading', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Need a Plumber for Your Commercial Property?', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'thumbnail_image',
			array(
				'label'   => esc_html__( 'Thumbnail Image', 'plumbio-core' ),
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

		$this->end_controls_section();
	}
	protected function render() {
		$settings            = $this->get_settings_for_display();
		$sub_title           = $settings['sub_title'];
		$heading             = $settings['heading'];
		$thumbnail_image     = ( $settings['thumbnail_image']['id'] != '' ) ? wp_get_attachment_image( $settings['thumbnail_image']['id'], 'full' ) : $settings['thumbnail_image']['url'];
		$thumbnail_image_alt = get_post_meta( $settings['thumbnail_image']['id'], '_wp_attachment_image_alt', true );
		$description         = $settings['description'];
		?> 
		<div class="blocktitle text-left blocktitle__bottom-size02">
			<div class="blocktitle__subtitle"><?php echo $sub_title; ?></div>
			<div class="blocktitle__title"><?php echo $heading; ?></div>
		</div>
		<picture>
			<?php
			if ( wp_http_validate_url( $thumbnail_image ) ) {
				?>
				<img src="<?php echo esc_url( $thumbnail_image ); ?>" alt="<?php esc_url( $thumbnail_image_alt ); ?>">
				<?php
			} else {
				echo $thumbnail_image;
			}
			?>
		</picture>
		<p class="p-indent-top">
			<?php echo $description; ?>
		</p>
		<?php
	}
	protected function content_template() {
	}
}
