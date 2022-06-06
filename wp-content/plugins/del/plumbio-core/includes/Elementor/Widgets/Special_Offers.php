<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Special_Offers extends Widget_Base {


	public function get_name() {
		return 'special_offers';
	}

	public function get_title() {
		return esc_html__( 'Special Offers', 'plumbio-core' );
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
			'block_title',
			array(
				'label'   => esc_html__( 'Block BG', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Special', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'tag_line',
			array(
				'label'   => esc_html__( 'Tag Line', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'what we offer', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( "What's Included?", 'plumbio-core' ),
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

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'item', 'plumbio-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_coupon_price',
			array(
				'label'   => esc_html__( 'Coupon  Price', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '-$50', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_coupon_price_text',
			array(
				'label'   => esc_html__( 'Coupon Price Text', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'offer', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_coupon_subtitle',
			array(
				'label'   => esc_html__( 'Coupon Subtitle', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'SPECIAL OFFER', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_coupon_title',
			array(
				'label'   => esc_html__( 'Coupon Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Drain Testing', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_coupon_content',
			array(
				'label'   => esc_html__( 'Coupon Content', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Coupons & special offers cannot be combined with other offers. Valid toward standard pricing only.', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_coupon_date',
			array(
				'label'   => esc_html__( 'Coupon Date', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '* Expires: 12/31/2021', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_print_btn_text',
			array(
				'label'   => esc_html__( 'Print Button Text', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Print coupon', 'plumbio-core' ),
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
	}
	protected function render() {
		$settings    = $this->get_settings_for_display();
		$block_title = $settings['block_title'];
		$tag_line    = $settings['tag_line'];
		$heading     = $settings['heading'];
		$description = $settings['description'];
		?> 
			<div class="section-indent">
				<div class="container container__fluid-xl">
					<div class="blocktitle text-center blocktitle__min-width03">
						<div class="blocktitle__under"><?php echo $block_title; ?></div>
						<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
						<div class="blocktitle__title"><?php echo $heading; ?></div>
						<div class="blocktitle__text"><?php echo $description; ?> </div>
					</div>
					<!-- carusel -->
					<div class="swiper-container imgbox-inner__wrapper swiper__grid js-align-layout two-items-slider" data-carousel="swiper" data-space-between="30" data-slides-sm="1" data-slides-md="1" data-slides-lg="2" data-slides-xl="2" data-slides-xxl="2" data-autoplay-Delay="5000">
						<div class="swiper-wrapper">
							<?php
							$i = 1;
							foreach ( $settings['items'] as $item ) {

								$item_coupon_price      = $item['item_coupon_price'];
								$item_coupon_price_text = $item['item_coupon_price_text'];
								$item_coupon_subtitle   = $item['item_coupon_subtitle'];
								$item_coupon_title      = $item['item_coupon_title'];
								$item_coupon_content    = $item['item_coupon_content'];
								$item_coupon_date       = $item['item_coupon_date'];
								$item_print_btn_text    = $item['item_print_btn_text'];
								?>
							 <div class="swiper-slide">
									<div class="tt-coupon-bg lazyload" data-bg="<?php echo PLUMBIO_CORE_ASSETS; ?>/images/coupon-bg.png">
									<div class="tt-coupon js-align-layout__item">
										<div class="tt-coupon__label">
											<div class="tt-text01"><?php echo $item_coupon_price; ?></div>
											<div class="tt-text02"><?php echo $item_coupon_price_text; ?></div>
										</div>
										<div class="tt-coupon__subtitle">
											<?php echo $item_coupon_subtitle; ?>
										</div>
										<div class="tt-coupon__title">
											<?php echo $item_coupon_title; ?>
										</div>
										<div class="tt-coupon__content">
											<?php echo $item_coupon_content; ?>
										</div>
										<div class="tt-coupon__row">
											<div class="tt-coupon__col">
												<div class="tt-coupon__notes">
													<?php echo $item_coupon_date; ?>
												</div>
											</div>
											<div class="tt-coupon__col">
												<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" class="tt-coupon__print"><?php echo $item_print_btn_text; ?></a>
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
						<div class="swiper-pagination swiper-pagination__center"></div>
					</div>
					<!-- /carusel -->
				</div>
			</div> 
			<?php
	}

	protected function content_template() {    }
}
