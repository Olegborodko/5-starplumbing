<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Plumbio_Offer extends Widget_Base {


	public function get_name() {
		return 'plumbio_offer';
	}

	public function get_title() {
		return esc_html__( 'Plumbio Offer', 'plumbio-core' );
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
			'list_field',
			array(
				'label'       => esc_html__( 'List Field', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

			)
		);

		$this->add_control(
			'coupon_price',
			array(
				'label'   => esc_html__( 'Coupon Price', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '-$50', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'coupon_price_text',
			array(
				'label'   => esc_html__( 'Coupon Price Text', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'offer', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'coupon_subtitle',
			array(
				'label'   => esc_html__( 'Coupon Subtitle', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'SPECIAL OFFER', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'coupon_title',
			array(
				'label'   => esc_html__( 'Coupon Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Any Plumbing Job', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'coupon_description',
			array(
				'label'   => esc_html__( 'Coupon Description', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Grand Opening Special! We are offering $50 OFF to any new customers!', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'coupon_date',
			array(
				'label'   => esc_html__( 'Coupon Date', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '* Expires: 12/31/2021', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'print_btn_text',
			array(
				'label'   => esc_html__( 'Print Button Text', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Print coupon', 'plumbio-core' ),
			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings           = $this->get_settings_for_display();
		$tag_line           = $settings['tag_line'];
		$heading            = $settings['heading'];
		$list_field         = $settings['list_field'];
		$coupon_price       = $settings['coupon_price'];
		$coupon_price_text  = $settings['coupon_price_text'];
		$coupon_title       = $settings['coupon_title'];
		$coupon_subtitle    = $settings['coupon_subtitle'];
		$coupon_description = $settings['coupon_description'];
		$coupon_date        = $settings['coupon_date'];
		$print_btn_text     = $settings['print_btn_text'];
		?> 
		<div class="section-indent">
			<div class="container container__fluid-xl">
				<div class="row">
					<div class="col-md-6">
						<div class="blocktitle text-left">
							<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
							<div class="blocktitle__title"><?php echo $heading; ?></div>
						</div>
						<ul class="tt-list tt-list__color01 tt-list_top">
							<?php echo $list_field; ?>
						</ul>
					</div>
					<div class="divider tt-visible__mobile"></div>
					<div class="col-md-6">
						<div class="tt-coupon lazyload" data-bg="<?php echo PLUMBIO_CORE_ASSETS; ?>/images/coupon-bg.png">
							<div class="tt-coupon__label">
								<div class="tt-text01"><?php echo $coupon_price; ?></div>
								<div class="tt-text02"><?php echo $coupon_price_text; ?></div>
							</div>
							<div class="tt-coupon__subtitle">
								<?php echo $coupon_subtitle; ?>
							</div>
							<div class="tt-coupon__title">
							<?php echo $coupon_title; ?>
							</div>
							<div class="tt-coupon__content">
								<?php echo $coupon_description; ?>
							</div>
							<div class="tt-coupon__row">
								<div class="tt-coupon__col">
									<div class="tt-coupon__notes">
										<?php echo $coupon_date; ?>
									</div>
								</div>
								<div class="tt-coupon__col">
									<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" class="tt-coupon__print"><?php echo $print_btn_text; ?></a>
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


