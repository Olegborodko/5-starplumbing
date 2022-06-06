<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Icons_Manager;

class SidebarNavContact extends Widget_Base {


	public function get_name() {
		return 'sidebar_navbar_contact';
	}

	public function get_title() {
		return esc_html__( 'Sidebar Navbar Contact', 'plumbio-core' );
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
			'logo',
			array(
				'label'   => esc_html__( 'Logo', 'plumbio-core' ),
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
			'popup_text',
			array(
				'label'   => esc_html__( 'Logo Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Plumbio', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'button_title',
			array(
				'label'   => esc_html__( 'Button Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Schedule Online', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'button_link',
			array(
				'label'         => esc_html__( 'Button Link', 'plumbio-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'plumbio-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
				),

			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'contactinfo',
			array(
				'label' => esc_html__( 'Contact Info', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'contact_title',
			array(
				'label'   => esc_html__( 'Contact Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Our Contacts', 'plumbio-core' ),
			)
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Item Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Head Office:', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_content',
			array(
				'label'   => esc_html__( 'Item Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( '8494 Signal Hill Road Manassas, VA, 20110', 'plumbio-core' ),
			)
		);
		$repeater->add_control(
			'item_icon',
			array(
				'label' => esc_html__( 'Item Icon', 'plumbio-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);
		$this->add_control(
			'items',
			array(
				'label'   => esc_html__( 'Repeater List', 'plumbio-core' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__( 'Title #1', 'plumbio-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'plumbio-core' ),
					),
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'socoialinfo',
			array(
				'label' => esc_html__( 'Social Info', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'social_title',
			array(
				'label'   => esc_html__( 'Social Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'item_social_icon',
			array(
				'label' => esc_html__( 'Social Icon', 'plumbio-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);
		$repeater->add_control(
			'item_social_url',
			array(
				'label' => esc_html__( 'Social URL', 'plumbio-core' ),
				'type'  => Controls_Manager::URL,
			)
		);
		$this->add_control(
			'social_items',
			array(
				'label'   => esc_html__( 'Repeater List', 'plumbio-core' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__( 'Title #1', 'plumbio-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'plumbio-core' ),
					),
				),
			)
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings             = $this->get_settings_for_display();
		$logo                 = ( $settings['logo']['id'] != '' ) ? wp_get_attachment_image( $settings['logo']['id'], 'full' ) : $settings['logo']['url'];
		$logo_alt             = get_post_meta( $settings['logo']['id'], '_wp_attachment_image_alt', true );
		$popup_text           = $settings['popup_text'];
		$description          = $settings['description'];
		$button_title         = $settings['button_title'];
		$button_link          = $settings['button_link']['url'];
		$button_link_external = $settings['button_link']['is_external'] ? 'target="_blank"' : '';
		$button_link_nofollow = $settings['button_link']['nofollow'] ? 'rel="nofollow"' : '';
		$contact_title        = $settings['contact_title'];
		$social_title         = $settings['social_title'];

		?>  
		<div class="tt-popup__item">
			<div class="tt-show-descktop">
				<div class="logo-popup">
					<div class="logo-popup__icon">
					<?php
					if ( $logo ) {
						if ( wp_http_validate_url( $logo ) ) {
							?>
									<img src="<?php echo esc_url( $logo ); ?>" alt="<?php esc_url( $logo_alt ); ?>">
								<?php
						} else {
							echo $logo;
						}
					} else {
						?>
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
					<path d="M257.2,2c1,1.4,1.6,2.3,2.3,3c47.1,47.1,94,94.4,141.3,141.3c23.9,23.8,42.3,50.9,53.4,82.8
						C494,343.7,428.9,467.6,312,499.9c-76.6,21.2-159.4-3.6-211.9-63.1c-27.4-31.2-44.9-67.2-50.2-108.3
						c-9.6-74.4,13.7-137.3,69.3-187.9c1.1-1,2.3-2.1,3.4-3.2C166.7,93.3,210.8,49.1,254.9,5C255.6,4.3,256.2,3.4,257.2,2z M98,346.1
						c0.3,1,0.4,1.7,0.6,2.3c25.1,82.6,112.7,132.3,197,111.6c82.7-20.3,136.3-98.2,125.4-182.7c-4.8-36.9-20.4-68.6-46.5-95
						c-38.3-38.7-77-77.1-115.5-115.6c-0.6-0.6-1.2-1.1-2.3-2.1c-0.7,0.9-1.2,1.8-1.8,2.4c-34.7,34.8-69.4,69.5-104.2,104.2
						c-0.9,0.9-1.8,1.8-2.8,2.7c-8.6,7.5-16.4,15.8-23.3,24.9c-18.1,24-28.8,50.9-32.5,80.7c-0.5,4.5-0.7,9-1.1,13.6
						c0.7,0.1,1,0.2,1.4,0.2c31.3,0,62.6,0.1,93.8,0c8.9,0,15.2-6.6,15.4-15.5c0.1-5.6,0-11.2,0-16.8c0-0.6-0.2-1.1-0.3-1.8
						c-1.4,0-2.7,0.1-4,0c-2.4-0.2-4.3-1.8-4.5-3.9c-0.2-2.2,1.1-3.9,3.7-4.6c0.9-0.2,1.9-0.3,2.8-0.3c6.9,0,13.8,0,20.7,0
						c0.9,0,1.8,0,2.9,0c0-10.5,0-20.5,0-30.6c0-0.7-0.6-1.6-1.1-2c-3.4-2.5-7.1-2.9-11.3-2.1c-7.5,1.5-15,3.1-22.6,4
						c-5.9,0.7-10.3-2.4-12.9-7.7c-2.6-5.3-2.9-10.9-1.4-16.6c0.9-3.3,3.1-5.6,6.4-6.5c2-0.6,4.2-0.9,6.3-1c7.2-0.1,14,1.5,20.5,4.4
						c4.1,1.9,8.3,2,12.3-0.5c2-1.2,4.1-2.2,6.2-3.1c8.3-3.7,15.5-2.4,22.1,3.8c0.7,0.7,2,1.1,3,1.1c7.3,0,14.3-1.4,21.3-3.4
						c3.5-1,7.3-1.7,10.9-1.7c6.5-0.1,10,3.6,10.4,10c0.2,2.7,0.2,5.3,0.1,8c-0.3,8.4-3.8,11.8-12,12.4c-7.2,0.5-14.2-0.4-21.1-2.7
						c-4.7-1.6-9.6-3-13.8,1.4c-0.1,0.1-0.3,0.2-0.4,0.2c-1.5,0.4-1.8,1.5-1.8,2.9c0.1,9.2,0,18.4,0,27.7c0,0.7,0.1,1.3,0.2,2.1
						c8.2,0,16.2,0,24.2,0c2.9,0,4.2,1.2,4.5,3.9c0.2,2.4-1.2,3.7-3.4,4.2c-1.7,0.4-3.5,0.6-5.4,0.9c0,1.1,0,2.1,0,3.1
						c0,5.4,0.2,10.9-0.1,16.3c-0.3,4.4,1.2,7.8,4.8,9.8c2.9,1.6,6.3,3,9.6,3.3c8.6,0.6,16.9,2.5,24.9,5.4c13,4.7,24.5,11.5,32.1,23.5
						c4,6.4,7.8,13,11.3,19.7c6.3,12.1,10.7,24.8,10.1,38.8c-0.1,2.1-0.6,3-2.8,3.3c-8.2,1.3-16.4,2.9-24.7,4.4
						c-7.2,1.3-14.4,2.6-21.7,3.8c-0.2-0.8-0.3-1.3-0.5-1.9c-1.1-5.7-1.9-11.4-3.2-17c-1.9-8-4.5-15.7-10-22.2c-3.7-4.4-8.4-6.4-14-5.1
						c-4.4,1.1-8.7,2.7-12.9,4.4c-11.9,4.9-24,8.4-37,8.6c-19.8,0.4-38.3-5.9-57-11.3c-1-0.3-2-0.6-3-0.6c-23.4,0-46.9,0-70.3,0
						C99.3,346.1,98.8,346.1,98,346.1z"></path>
					<path d="M334.8,396.7c3.2,17,11.8,31.1,22.7,43.9c5.7,6.6,9.9,14.1,11.9,22.6c2.3,9.5,2.1,19-1.8,28.1
						c-4.3,10.1-11.8,16.2-22.9,17.9c-7.5,1.2-15,1-22.4-0.4c-11.5-2.1-20.4-11.5-22.9-24.5c-3.3-16.9,1.7-31.4,12.7-44.2
						c7.7-9,14.2-18.8,18.5-30C332.2,405.9,333.3,401.4,334.8,396.7z"></path>
					</svg>
					<?php } ?>
					</div>
					<div class="logo-popup__text">
					<?php echo $popup_text; ?>
					</div>
				</div>
				<p>
					<?php echo $description; ?>
				</p>
			</div>
				<?php if ( ! empty( $button_link ) ) { ?>
					<p><a href="<?php echo esc_url( $button_link ); ?>" <?php echo $button_link_external; ?> <?php echo $button_link_nofollow; ?> class="tt-btn"><span><?php echo $button_title; ?></span></a></p>
			<?php } else { ?>
				<p><a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" class="tt-btn" data-modal="schedule" data-modal-size="modal__size-lg"><span><?php echo $button_title; ?></span></a></p>
			<?php } ?>
		</div>
		<div class="tt-popup__item">
			<div class="tt-popup__title"><?php echo $contact_title; ?></div>
				<?php
				foreach ( $settings['items'] as $item ) {
					$item_title   = $item['item_title'];
					$item_content = $item['item_content'];
					?>
			<div class="info-box">
				<div class="info-box__img <?php echo $item['item_icon']['value']; ?>">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 374.8 374.8" style="enable-background:new 0 0 374.8 374.8;" xml:space="preserve">
					<g>
						<g>
							<path d="M211,27.6c-8.4-10-16.4-19.2-23.6-27.6c-7.2,8.8-15.2,18-23.6,27.6C113,86,43,167.2,43,230.4c0,40,16,76,42.4,102
			c26,26,62,42.4,102,42.4s76-16,102-42.4c26-26,42.4-62.4,42.4-102C331.8,167.2,261.8,86.4,211,27.6z"></path>
							</g>
						</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
					</svg>
				</div>
				<div class="info-box__content">
					<div class="info-box__title"><?php echo $item_title; ?></div>
					<?php echo $item_content; ?>
				</div>
			</div>
		<?php } ?>

		</div>
		<div class="tt-popup__item">
			<div class="tt-popup__title"><?php echo $social_title; ?></div>
			<ul class="tt-icon-list">
			<?php
			foreach ( $settings['social_items'] as $item ) {
				$item_social_icon  = $item['item_social_icon']['value'];
				$item_url          = $item['item_social_url']['url'];
				$item_url_external = $item['item_social_url']['is_external'] ? 'target="_blank"' : '';
				$item_url_nofollow = $item['item_social_url']['nofollow'] ? 'rel="nofollow"' : '';
				?>
				<li><a href="<?php echo esc_url( $item_url ); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>><span class="<?php echo esc_attr( $item_social_icon ); ?>"></span></a></li>
				<?php } ?>
			</ul>
		</div> 
				<?php
	}

	protected function content_template() {
	}
}
