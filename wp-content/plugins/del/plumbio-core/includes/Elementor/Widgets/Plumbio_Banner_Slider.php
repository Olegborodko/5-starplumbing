<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Plumbio_Banner_Slider extends Widget_Base {


	public function get_name() {
		return 'plumbio_banner_slider';
	}

	public function get_title() {
		return esc_html__( 'Plumbio Banner Slider', 'plumbio-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'plumbio' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'item2',
			array(
				'label' => esc_html__( 'Slider settings', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'state',
			array(
				'label'        => __( 'Banner State', 'plumbio-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'slider', 'your-plugin' ),
				'label_off'    => __( 'static', 'your-plugin' ),
				'return_value' => 'slider',
				'default'      => 'slider',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'Item', 'plumbio-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_heading',
			array(
				'label'       => esc_html__( 'Heading', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Need Help with a Plumbing Emergency?', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_description',
			array(
				'label'       => esc_html__( 'Description', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

			)
		);

		$repeater->add_control(
			'item_video_link',
			array(
				'label'         => esc_html__( 'Video Link', 'plumbio-core' ),
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
		$repeater->add_control(
			'slider_big_image',
			array(
				'label'   => esc_html__( 'Slider Big Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$repeater->add_control(
			'slider_small_image',
			array(
				'label'   => esc_html__( 'Slider Medium Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$repeater->add_control(
			'bg_large_image',
			array(
				'label'   => esc_html__( 'BG Background Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$repeater->add_control(
			'bg_medium_image',
			array(
				'label'   => esc_html__( 'BG Medium Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$repeater->add_control(
			'bg_small_image',
			array(
				'label'   => esc_html__( 'BG Small Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$repeater->add_control(
			'layout_style',
			array(
				'label'   => __( 'Layout Style', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( '1', 'plugin-domain' ),
					'2' => __( '2', 'plugin-domain' ),
				),
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
					array(
						'list_title'   => esc_html__( 'Title #2', 'plumbio-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'plumbio-core' ),
					),
				),
			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$state    = $settings['state'];
		if ( $state == 'slider' ) {
			$id = 'id="js-mainslider"';
		} else {
			$id = 'id="no-slider"';
		}
		?> 
		<div class="section-indent nomargin">
			<div class="mainslider__wrapper">

				<div class="swiper-container mainslider" <?php echo $id; ?> data-arrow="visible-desktop">
					<div class="swiper-wrapper">

						<?php
						$i = 1;
						foreach ( $settings['items'] as $item ) {
							$layout_style             = $item['layout_style'];
							$item_heading             = $item['item_heading'];
							$item_description         = $item['item_description'];
							$item_video_link          = $item['item_video_link']['url'];
							$item_video_link_external = $item['item_video_link']['is_external'] ? 'target="_blank"' : '';
							$item_video_link_nofollow = $item['item_video_link']['nofollow'] ? 'rel="nofollow"' : '';
							$bg_large_image           = ( $item['bg_large_image']['id'] != '' ) ? wp_get_attachment_image( $item['bg_large_image']['id'], 'full' ) : $item['bg_large_image']['url'];
							$bg_medium_image_url      = ( $item['bg_medium_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['bg_medium_image']['id'], 'full' ) : $item['bg_medium_image']['url'];
							$bg_small_image           = ( $item['bg_small_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['bg_small_image']['id'], 'full' ) : $item['bg_small_image']['url'];
							$slider_big_image         = ( $item['slider_big_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['slider_big_image']['id'], 'full' ) : $item['slider_big_image']['url'];
							$slider_small_image       = ( $item['slider_small_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['slider_small_image']['id'], 'full' ) : $item['slider_small_image']['url'];

							?>
						 
							<div class="swiper-slide">
								<div class="mainslider__imgbg">
									<div class="slide-inner">
										<picture>
											<?php if ( $bg_small_image ) { ?>
											<source srcset="<?php echo $bg_small_image; ?>" media="(max-width: 767px)" type="image/jpg">
											<?php } ?>
											<?php if ( $bg_medium_image_url ) { ?>
											<source srcset="<?php echo $bg_medium_image_url; ?>" media="(max-width: 1024px)" type="image/jpg">
											<?php } ?>
											<?php
											if ( wp_http_validate_url( $bg_large_image ) ) {
												?>
												<img src="<?php echo esc_url( $bg_large_image ); ?>" alt="large image">
												<?php
											} else {
												echo $bg_large_image;
											}
											?>
										</picture>
									</div>
								</div>
								<div class="mainslider__img">
									<?php if ( $layout_style == '1' ) { ?>
										<picture>
											<source media="(min-width: 1025px)" srcset="<?php echo $slider_big_image; ?>" type="image/png">
											<source media="(min-width: 768px)" srcset="<?php echo $slider_small_image; ?>" type="image/png">
											<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="">
										</picture>
									<?php } elseif ( $layout_style == '2' ) { ?>
										<picture>
											<source media="(min-width: 768px)" srcset="<?php echo $slider_big_image; ?>" type="image/png">
											<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="">
										</picture>
									<?php } ?>
								</div>
								<?php if ( $layout_style == '1' ) { ?>
								<div class="mainslider__holder layout-h-r mainslider__layout01">
									<div class="mainslider__limiter">
										<div class="mainslider__title">
											<a href="<?php echo esc_url( $item_video_link ); ?>" <?php echo $item_video_link_external; ?> <?php echo $item_video_link_nofollow; ?> class="glightbox3 tt-btn__video icon-808557"><span></span></a>
											<div class="mainslider__title-text">
												<?php echo $item_heading; ?>
											</div>
										</div>
										<div class="mainslider__text">
											<?php echo $item_description; ?>
										</div>
									</div>
								</div>
								<?php } elseif ( $layout_style == '2' ) { ?>
								<div class="mainslider__holder mainslider__layout02">
									<div class="mainslider__limiter">
										<div class="mainslider__title">
											<?php echo $item_heading; ?>
										</div>
										<div class="mainslider__text">
											<?php echo $item_description; ?>
										</div>
									</div>
								</div>
							<?php } ?>
							</div> 
							<?php
							$i++;
						}
						?>
					</div>
					<div class="mainslider__button mainslider__button-next"><i class="icon-545682"></i></div>
					<div class="mainslider__button mainslider__button-prev"><i class="icon-545682"></i></div>
				</div>
			</div>
		</div>
		<?php
	}
	protected function content_template() {
	}
}
