<?php
namespace Plumbio\Helper\Elementor\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Core\Schemes;
class VideoSlider extends Widget_Base {


	public function get_name() {
		return 'video_slider';
	}

	public function get_title() {
		return esc_html__( 'Video Slider', 'plumbio-core' );
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
			'placeholder_title',
			array(
				'label'       => esc_html__( 'Placeholder Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Video', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'video reviews', 'plumbio-core' ),
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
			'title',
			array(
				'label'       => esc_html__( 'Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
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
			'button_title',
			array(
				'label'       => esc_html__( 'Button Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
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
			'item_video_image',
			array(
				'label'   => esc_html__( 'Video Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater->add_control(
			'item_small_image',
			array(
				'label'   => esc_html__( 'Small Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
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
		$settings          = $this->get_settings_for_display();
		$placeholder_title = $settings['placeholder_title'];
		$sub_title         = $settings['sub_title'];
		$title             = $settings['title'];
		$description       = $settings['description'];
		$button_title      = $settings['button_title'];
		$html_tag          = $settings['html_tag'];
		?> 
		<div class="section-indent">
			<div class="container container__fluid-lg">
				<div class="row">
					<div class="col-md-6">
						<div class="blocktitle text-left">
							<div class="blocktitle__under"><?php echo $placeholder_title; ?></div>
							<div class="blocktitle__subtitle"><?php echo $sub_title; ?></div>
						   
							<<?php echo $html_tag; ?> class="blocktitle__title"><?php echo $title; ?></<?php echo $html_tag; ?>>
						</div>
						<p>
							<?php echo $description; ?>
						</p>
						<?php if ( ! empty( $button_title ) ) { ?>
						<div class="tt-btn tt-btn__top" data-modal="schedule" data-modal-size="modal__size-lg" data-modal-src="ajax-content/modal__schedule.html"><span><?php echo $button_title; ?></span></div>
						<?php } ?>
					</div>
					<div class="divider tt-visible__mobile"></div>
					<div class="col-md-6">
						<!-- Carusel Gallery -->
						<div class="swiper-container gallery-large">
							<div class="swiper-wrapper">

								<?php
								$i = 1;
								foreach ( $settings['items'] as $item ) {
									$item_video_link          = $item['item_video_link']['url'];
									$item_video_link_external = $item['item_video_link']['is_external'] ? 'target="_blank"' : '';
									$item_video_link_nofollow = $item['item_video_link']['nofollow'] ? 'rel="nofollow"' : '';
									$item_video_image         = ( $item['item_video_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_video_image']['id'], 'full' ) : $item['item_video_image']['url'];
									$item_video_image_alt     = get_post_meta( $item['item_video_image']['id'], '_wp_attachment_image_alt', true );

									?>
								 
									<div class="swiper-slide">
										<a href="<?php echo esc_url( $item_video_link ); ?>" <?php echo $item_video_link_external; ?> <?php echo $item_video_link_nofollow; ?> class="tt-link-video">
											<div class="gallery-large__icon tt-point"></div>
											<video muted loop poster="<?php echo $item_video_image; ?>">
												<source src="<?php echo esc_url( $item_video_link ); ?>" type="video/mp4">
											</video>
										</a>
									</div> 
									<?php
									$i++;
								}
								?>
							</div>
						</div>
						<div class="swiper-container gallery-thumbs">
							<div class="swiper-wrapper">
								<?php
								$i = 1;
								foreach ( $settings['items'] as $item ) {
									$item_small_image     = ( $item['item_small_image']['id'] != '' ) ? wp_get_attachment_image( $item['item_small_image']['id'], 'full' ) : $item['item_small_image']['url'];
									$item_small_image_alt = get_post_meta( $item['item_small_image']['id'], '_wp_attachment_image_alt', true );
									?>
									<div class="swiper-slide">
										<div class="gallery-thumbs__icon tt-point"></div>
										<picture>
											<?php
											if ( wp_http_validate_url( $item_small_image ) ) {
												?>
												<img src="<?php echo esc_url( $item_small_image ); ?>" alt="large image">
												<?php
											} else {
												echo $item_small_image;
											}
											?>
										</picture>
									</div>
									<?php
									$i++;
								}
								?>

							</div>
						</div>
						<!--  -->
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	protected function content_template() {
	}
}
