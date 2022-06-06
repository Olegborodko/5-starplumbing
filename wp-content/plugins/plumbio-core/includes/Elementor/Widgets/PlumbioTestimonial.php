<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Core\Schemes;
class PlumbioTestimonial extends Widget_Base {


	public function get_name() {
		return 'plumbio_testimonial';
	}

	public function get_title() {
		return esc_html__( 'Plumbio Testimonial', 'plumbio-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'plumbio' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'Item', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'layout_style',
			array(
				'label'   => __( 'Layout Style', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'Style 1', 'plugin-domain' ),
					'2' => __( 'Style 2', 'plugin-domain' ),
				),
			)
		);
		$this->add_control(
			'bg_shape',
			array(
				'label'   => esc_html__( 'BG Shape', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'       => esc_html__( 'Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);
		$repeater->add_control(
			'rating',
			array(
				'label' => esc_html__( 'Rating', 'plumbio-core' ),
				'type'  => Controls_Manager::NUMBER,

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
			'item_bg_image',
			array(
				'label'   => esc_html__( 'BG Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater->add_control(
			'item_sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_content',
			array(
				'label'       => esc_html__( 'Content', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

			)
		);

		$repeater->add_control(
			'item_name',
			array(
				'label'       => esc_html__( 'Name', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_designation',
			array(
				'label'       => esc_html__( 'Designation', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
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
		$bg_shape = ( $settings['bg_shape']['id'] != '' ) ? wp_get_attachment_image_url( $settings['bg_shape']['id'], 'full' ) : $settings['bg_shape']['url'];

		$layout_style = $settings['layout_style'];

		?> 
		<?php if ( $layout_style == '1' ) { ?>
		<div class="section-indent">
			<div class="tt-testimonials__wrapper">
				<div class="tt-testimonials__separator-bg">
					<div class="tt-testimonials-bg lazyload" data-bg="<?php echo $bg_shape; ?>" data-arrow="visible-desktop">
						<div class="tt-testimonials__box">
							<div class="swiper-container one-item-slider" data-carousel="swiper" data-autoplay-delay="6500" data-slides-xxl="1" data-slides-xl="1" data-slides-lg="1" data-slides-md="1" data-slides-sm="1">
								<div class="swiper-wrapper">

									<?php
									$i = 1;
									foreach ( $settings['items'] as $item ) {
										$item_title               = $item['item_title'];
										$item_video_link          = $item['item_video_link']['url'];
										$item_video_link_external = $item['item_video_link']['is_external'] ? 'target="_blank"' : '';
										$item_video_link_nofollow = $item['item_video_link']['nofollow'] ? 'rel="nofollow"' : '';
										$item_bg_image            = ( $item['item_bg_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_bg_image']['id'], 'full' ) : $item['item_bg_image']['url'];
										$item_sub_title           = $item['item_sub_title'];
										$item_content             = $item['item_content'];
										$item_name                = $item['item_name'];
										$item_designation         = $item['item_designation'];
										$rating                   = $item['rating'];
										?>
									 
										<div class="swiper-slide">
											<div class="layout05">
												<div class="tt-btn__video-wrapper tt-point">
													<a href="<?php echo esc_url( $item_video_link ); ?>" <?php echo $item_video_link_external; ?>  <?php echo $item_video_link_nofollow; ?> class="glightbox3 tt-btn__video icon-808557"><span></span></a>
												</div>
												<div class="layout05_bg layout05_bg-left" style="background-image: url(<?php echo $item_bg_image; ?>);"></div>
												<div class="layout05__content layout05__content-indent">
													<div class="row align-items-center justify-content-end">
														<div class="col-auto">
															<div class="blocktitle text-left">
																<div class="blocktitle__subtitle"><?php echo $item_sub_title; ?></div>
																<div class="blocktitle__title"><?php echo $item_title; ?></div>
															</div>
															<div class="testimonials-item">
																<div class="tt-rating tt-rating_size-lg">
																	<?php
																	if ( $rating ) {
																		for ( $m = 1;$m <= $rating;$m++ ) {
																			?>
																			<i class="icon-56786"></i>
																			<?php
																		}
																	} else {
																		?>
																	<i class="icon-56786"></i>
																	<i class="icon-56786"></i>
																	<i class="icon-56786"></i>
																	<i class="icon-56786"></i>
																	<i class=" icon-56786"></i>
																	<?php } ?>
																</div>
																<div class="testimonials-item__content">
																	<?php echo $item_content; ?>
																</div>
																<div class="testimonials-item__caption">
																	<strong>- <?php echo $item_name; ?>,</strong> <?php echo $item_designation; ?>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div> 
										<?php
										$i++;
									}
									?>
								</div>
								<div class="swiper-pagination swiper-pagination__center swiper-pagination-inner02"></div>
								<div class="swiper-next swiper__button swiper__button-next"><i class="icon-545682"></i></div>
								<div class="swiper-prev swiper__button swiper__button-prev"><i class="icon-545682"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } elseif ( $layout_style == '2' ) { ?>
		<div class="section-indent">
			<div class="tt-testimonials__box">
				<!-- carusel -->
				<div class="swiper-container"
					data-carousel="swiper"
					data-autoplay-delay="4500"
					data-slides-xxl="1"
					data-slides-xl="1"
					data-slides-lg="1"
					data-slides-md="1"
					data-slides-sm="1">
					<div class="swiper-wrapper">
					<?php
						$i = 1;
					foreach ( $settings['items'] as $item ) {
						$item_title               = $item['item_title'];
						$item_video_link          = $item['item_video_link']['url'];
						$item_video_link_external = $item['item_video_link']['is_external'] ? 'target="_blank"' : '';
						$item_video_link_nofollow = $item['item_video_link']['nofollow'] ? 'rel="nofollow"' : '';
						$item_bg_image            = ( $item['item_bg_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_bg_image']['id'], 'full' ) : $item['item_bg_image']['url'];
						$item_sub_title           = $item['item_sub_title'];
						$item_content             = $item['item_content'];
						$item_name                = $item['item_name'];
						$item_designation         = $item['item_designation'];
						$rating                   = $item['rating'];
						?>
						<div class="swiper-slide">
							<div class="layout05">
								<div class="tt-btn__video-wrapper tt-point">
									<a href="<?php echo esc_url( $item_video_link ); ?>" <?php echo $item_video_link_external; ?>  <?php echo $item_video_link_nofollow; ?> class="glightbox3 tt-btn__video icon-808557"><span></span></a>
								</div>
								<div class="layout05_bg layout05_bg-left" style="background-image: url(<?php echo $item_bg_image; ?>);"></div>
								<div class="layout05__content layout05__content-indent">
									<div class="row align-items-center justify-content-end">
										<div class="col-auto">
											<div class="blocktitle blocktitle__icon-right text-left">
												<div class="blocktitle__subtitle"><?php echo $item_sub_title; ?></div>
												<div class="blocktitle__title"><?php echo $item_title; ?></div>
											</div>
											<div class="testimonials-item">
												<div class="tt-rating tt-rating_size-lg">
											<?php
											if ( $rating ) {
												for ( $m = 1;$m <= $rating;$m++ ) {
													?>
															<i class="icon-56786"></i>
														<?php
												}
											} else {
												?>
													
													<i class="icon-56786"></i>
													<i class="icon-56786"></i>
													<i class="icon-56786"></i>
													<i class="icon-56786"></i>
													<i class=" icon-56786"></i>
													<?php } ?>
												</div>
												<div class="testimonials-item__content">
												<?php echo $item_content; ?>
												</div>
												<div class="testimonials-item__caption">
													<strong>- <?php echo $item_name; ?>,</strong> <?php echo $item_designation; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						$i++;
					}
					?>

					</div>
					<div class="swiper-pagination swiper-pagination__center swiper-pagination-inner02"></div>
				</div>
				<!-- /carusel -->
			</div>
		</div>
			<?php
		}
	}
	protected function content_template() {
	}
}
