<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class ServiceSidebarContact extends Widget_Base {


	public function get_name() {
		return 'sidebar_contact_plumbio';
	}

	public function get_title() {
		return esc_html__( 'Sidebar Contact', 'plumbio-core' );
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
			'title',
			array(
				'label'       => esc_html__( 'Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'       => esc_html__( 'Content', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

			)
		);

		$this->add_control(
			'phone_number',
			array(
				'label'       => esc_html__( 'Phone Number', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'phone_number_tel',
			array(
				'label'       => esc_html__( 'Phone Number Tel', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings             = $this->get_settings_for_display();
		$background_image     = ( $settings['background_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['background_image']['id'], 'full' ) : $settings['background_image']['url'];
		$background_image_alt = get_post_meta( $settings['background_image']['id'], '_wp_attachment_image_alt', true );
		$title                = $settings['title'];
		$content              = $settings['content'];
		$phone_number         = $settings['phone_number'];
		$phone_number_tel     = $settings['phone_number_tel'];
		?> 
		<a href="tel:<?php echo $phone_number_tel; ?>" class="promo__aside text-center lazyload" data-bg="<?php echo $background_image; ?>">
			<div class="promo__aside-title"><?php echo $title; ?></div>
			<?php echo $content; ?>
			<address>
				<span class="icon-25453"></span> <?php echo $phone_number; ?>
			</address>
		</a> 
		<?php
	}

	protected function content_template() {
	}
}
