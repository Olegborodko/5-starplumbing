<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Service_Plans extends Widget_Base {


	public function get_name() {
		return 'service_plans';
	}

	public function get_title() {
		return esc_html__( 'Pricing Plans', 'plumbio-core' );
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
			'tag_line',
			array(
				'label'   => esc_html__( 'Tag Line', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
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
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'plumbio-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_price_list',
			array(
				'label'       => esc_html__( 'Price List', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

			)
		);

		$repeater->add_control(
			'item_coupon_text',
			array(
				'label'   => esc_html__( 'Coupon Text', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_coupon_number',
			array(
				'label'   => esc_html__( 'Coupon Number', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_button_text',
			array(
				'label'   => esc_html__( 'Button Text', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_url',
			array(
				'label'         => esc_html__( 'URL', 'plumbio-core' ),
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
		$settings = $this->get_settings_for_display();
		$tag_line = $settings['tag_line'];
		$heading  = $settings['heading'];
		?> 
		<div class="section-indent">
			<div class="container container__fluid-xl">
				<div class="blocktitle text-center blocktitle__min-width03">
					<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
					<div class="blocktitle__title"><?php echo $heading; ?></div>
				</div>
				<div class="swiper-grid-layout">
					<div class="swiper-grid-layout02">
						<div class="swiper-container js-align-layout three-items-slider" data-carousel="swiper" data-slides-sm="1" data-slides-md="2" data-slides-lg="3" data-slides-xl="3" data-slides-xxl="3" data-autoplay-delay="3500" data-space-between="0">
							<div class="swiper-wrapper">

								<?php
								$i = 1;
								foreach ( $settings['items'] as $item ) {
									$item_icon          = $item['item_icon'];
									$item_title         = $item['item_title'];
									$item_price_list    = $item['item_price_list'];
									$item_coupon_text   = $item['item_coupon_text'];
									$item_coupon_number = $item['item_coupon_number'];
									$item_button_text   = $item['item_button_text'];
									$item_url           = $item['item_url']['url'];
									$item_url_external  = $item['item_url']['is_external'] ? 'target="_blank"' : '';
									$item_url_nofollow  = $item['item_url']['nofollow'] ? 'rel="nofollow"' : '';
									?>
								 <div class="swiper-slide">
										<div class="promo-price js-align-layout__item">
											<div class="promo-price__icon <?php echo esc_attr( $item_icon['value'] ); ?>">
												<i class="icon-694055"></i>
											</div>
											<div class="promo-price__title">
												<?php echo $item_title; ?>
											</div>
											<ul class="promo-price__list">
												<?php echo $item_price_list; ?>
											</ul>
											<div class="promo-price__price">
												<div class="text01"><?php echo $item_coupon_number; ?></div>
												<div class="text02"><?php echo $item_coupon_text; ?></div>
											</div>
											<a href="<?php echo esc_url( $item_url ); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?> class="tt-btn"><span><?php echo $item_button_text; ?></span></a>
										</div>
									</div> 
								<?php $i++;     } ?>

							</div>
							<div class="swiper-pagination swiper-pagination__center swiper-pagination__align02"></div>
						</div>
					</div>
				</div>
			</div>
		</div> 
		<?php
	}

	protected function content_template() {    }
}


