<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class PlumbioFooter extends Widget_Base {


	public function get_name() {
		return 'plumbio_footer';
	}

	public function get_title() {
		return esc_html__( 'Plumbio Footer', 'plumbio-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'plumbio' );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'contact_info_box',
			array(
				'label' => esc_html__( 'Contact Info Box', 'plumbio-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'plumbio-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);
		$repeater->add_control(
			'item_icon_bg_shape',
			array(
				'label' => esc_html__( 'Icon BG Shape', 'plumbio-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);
		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Head Office:', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_content',
			array(
				'label'       => esc_html__( 'Content', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '8494 Signal Hill Road Manassas,<br>VA, 20110', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

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
			'footer_info',
			array(
				'label' => esc_html__( 'Footer info', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'map_image',
			array(
				'label'   => esc_html__( 'BG Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$this->add_control(
			'map_on_off',
			array(
				'label'        => __( 'Map On/Off', 'plugin-domain' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'your-plugin' ),
				'label_off'    => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'google_map_iframe',
			array(
				'label'     => esc_html__( 'Google Map Iframe', 'plumbio-core' ),
				'type'      => Controls_Manager::TEXTAREA,
				'default'   => __( '', 'plumbio-core' ),
				'condition' => array( 'map_on_off' => 'yes' ),
			)
		);
		$this->add_control(
			'footer_logo',
			array(
				'label'   => esc_html__( 'Footer Logo', 'plumbio-core' ),
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
			'social_list',
			array(
				'label'       => esc_html__( 'Social List', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'socoialinfo',
			array(
				'label' => esc_html__( 'Social Info', 'plumbio-core' ),
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
		$settings = $this->get_settings_for_display();

		$map_on_off        = $settings['map_on_off'];
		$map_image         = ( $settings['map_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['map_image']['id'], 'full' ) : $settings['map_image']['url'];
		$map_image_alt     = get_post_meta( $settings['map_image']['id'], '_wp_attachment_image_alt', true );
		$google_map_iframe = $settings['google_map_iframe'];
		$description       = $settings['description'];
		$footer_logo       = ( $settings['footer_logo']['id'] != '' ) ? wp_get_attachment_image( $settings['footer_logo']['id'], 'full' ) : $settings['footer_logo']['url'];
		$footer_logo_alt   = get_post_meta( $settings['footer_logo']['id'], '_wp_attachment_image_alt', true );
		?> 

			<?php if ( $map_on_off == 'yes' ) { ?>
			<div id="map" class="lazyload" data-bg="<?php echo $map_image; ?>">
				<?php echo $google_map_iframe; ?>
			</div>
			<?php } ?>
			<div class="footer-layout lazyload" data-bg="<?php echo $map_image; ?>">
				<div class="container container__fluid-lg">
					<div class="row f-info__wrapper">
					<?php
					$i = 1;
					foreach ( $settings['items'] as $item ) {
						$item_icon          = $item['item_icon'];
						$item_icon_bg_shape = $item['item_icon_bg_shape'];
						$item_title         = $item['item_title'];
						$item_content       = $item['item_content'];
						?>
						<div class="col-sm-4">
							<div class="f-info">
							<?php if ( $item_icon_bg_shape['value'] ) { ?>
								<div class="f-info__icon <?php echo $item_icon_bg_shape['value']; ?>"><?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?></div>
							<?php } else { ?>
							<div class="f-info__icon icon-694055"><?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?></div>
							<?php } ?>
							<div class="f-info__title"><?php echo $item_title; ?></div>
								<?php echo $item_content; ?>
							</div>
						</div> 
						<?php $i++; } ?> 
					</div>
					<div class="f-logo-layout text-center">
						<a href="<?php echo esc_url( get_home_url( '/' ) ); ?>">
						<?php
						if ( wp_http_validate_url( $footer_logo ) ) {
							?>
							<img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php esc_url( $footer_logo_alt ); ?>">
							<?php
						} else {
							echo $footer_logo;
						}
						?>
						</a>
						<p class="f-min-width">
							<?php echo $description; ?>
						</p>
						<div class="text-center">
							<ul class="f-social-icon">
							<?php
							foreach ( $settings['social_items'] as $item ) {
								$item_social_icon  = $item['item_social_icon']['value'];
								$item_url          = $item['item_social_url']['url'];
								$item_url_external = $item['item_social_url']['is_external'] ? 'target="_blank"' : '';
								$item_url_nofollow = $item['item_social_url']['nofollow'] ? 'rel="nofollow"' : '';
								?>
								<li><a href="<?php echo esc_url( $item_url ); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?> class="<?php echo esc_attr( $item_social_icon ); ?>"></a></li>
							<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>

		<?php
	}
	protected function content_template() {
	}
}
