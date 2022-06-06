<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class RequestQuote extends Widget_Base {


	public function get_name() {
		return 'request_a_quote';
	}

	public function get_title() {
		return esc_html__( 'Request a Quote', 'plumbio-core' );
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
			'bg_large_image',
			array(
				'label'   => esc_html__( 'BG Large Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'bg_medium_image',
			array(
				'label'   => esc_html__( 'BG Medium Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'heading',
			array(
				'label'       => esc_html__( 'Heading', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Request a Quote', 'plumbio-core' ),
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
			'thumbnail_large',
			array(
				'label'   => esc_html__( 'Thumbnail Large', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'thumbnail_small',
			array(
				'label'   => esc_html__( 'Thumbnail Small', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'box_bg_image',
			array(
				'label'   => esc_html__( 'Box BG Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$this->add_control(
			'total_client',
			array(
				'label'       => esc_html__( 'Total Client', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'client_title',
			array(
				'label'       => esc_html__( 'Client Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings            = $this->get_settings_for_display();
		$bg_large_image      = ( $settings['bg_large_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['bg_large_image']['id'], 'full' ) : $settings['bg_large_image']['url'];
		$bg_large_image_alt  = get_post_meta( $settings['bg_large_image']['id'], '_wp_attachment_image_alt', true );
		$bg_medium_image     = ( $settings['bg_medium_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['bg_medium_image']['id'], 'full' ) : $settings['bg_medium_image']['url'];
		$bg_medium_image_alt = get_post_meta( $settings['bg_medium_image']['id'], '_wp_attachment_image_alt', true );
		$heading             = $settings['heading'];
		$form_shortcode      = $settings['form_shortcode'];
		$thumbnail_image     = ( $settings['thumbnail_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['thumbnail_image']['id'], 'full' ) : $settings['thumbnail_image']['url'];
		$thumbnail_image_alt = get_post_meta( $settings['thumbnail_image']['id'], '_wp_attachment_image_alt', true );
		$thumbnail_large     = ( $settings['thumbnail_large']['id'] != '' ) ? wp_get_attachment_image_url( $settings['thumbnail_large']['id'], 'full' ) : $settings['thumbnail_large']['url'];
		$thumbnail_large_alt = get_post_meta( $settings['thumbnail_large']['id'], '_wp_attachment_image_alt', true );
		$thumbnail_small     = ( $settings['thumbnail_small']['id'] != '' ) ? wp_get_attachment_image_url( $settings['thumbnail_small']['id'], 'full' ) : $settings['thumbnail_small']['url'];
		$thumbnail_small_alt = get_post_meta( $settings['thumbnail_small']['id'], '_wp_attachment_image_alt', true );
		$box_bg_image        = ( $settings['box_bg_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['box_bg_image']['id'], 'full' ) : $settings['box_bg_image']['url'];
		$box_bg_image_alt    = get_post_meta( $settings['box_bg_image']['id'], '_wp_attachment_image_alt', true );
		$client_title        = $settings['client_title'];
		$total_client        = $settings['total_client'];
		?> 
		<div class="section-indent-negative02">
			<div class="container container__fluid-lg">
				<div class="wrapper01">
					<div class="bg-box01">
						<picture>
							<source media="(max-width: 768px)" srcset="<?php echo $bg_medium_image; ?>" data-srcset="<?php echo $bg_medium_image; ?>" type="image/png">
							<source srcset="<?php echo $bg_large_image; ?>" data-srcset="<?php echo $bg_large_image; ?>" type="image/png">
							<img src="<?php echo $bg_large_image; ?>" class="lazyload" alt="">
						</picture>
					</div>
					<div class="row tt-custom-row">
						<div class="col-sm-auto tt-col-wide">
							<div class="tt-subtitle tt-subtitle-align"><?php echo $heading; ?></div>

							<?php echo do_shortcode( $form_shortcode ); ?>

						</div>
						<div class="divider tt-visible__mobile-sm"></div>
						<div class="col-sm-auto">
							<div class="tt-img02">
								<picture class="tt-img-label__01">
									<source srcset="<?php echo $thumbnail_small; ?>" data-srcset="<?php echo $thumbnail_small; ?>" media="(max-width: 576px)" type="image/jpg">
									<source srcset="<?php echo $thumbnail_large; ?>" data-srcset="<?php echo $thumbnail_large; ?>" media="(max-width: 1024px)" type="image/jpg">
									<source srcset="<?php echo $thumbnail_image; ?>" data-srcset="<?php echo $thumbnail_image; ?>" type="image/jpg">
									<img src="<?php echo $thumbnail_image; ?>" data-src="<?php echo $thumbnail_image; ?>" class="lazyload" alt="">
								</picture>
								<div class="tt-label-01 lazyload" data-bg="<?php echo $box_bg_image; ?>">
									<div class="tt-icon icon-1545289"></div>
									<div class="tt-text01">
										<?php
											echo $total_client;
										?>
									</div>
									<div class="tt-text02">
										<?php echo $client_title; ?>
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
