<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Core\Schemes;
class AdditionalServiceSlider extends Widget_Base {


	public function get_name() {
		return 'additional_service_slider';
	}

	public function get_title() {
		return esc_html__( 'Additional Service Slider', 'plumbio-core' );
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
			'large_image',
			array(
				'label'   => esc_html__( 'Large Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'medium_image',
			array(
				'label'   => esc_html__( 'Medium Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'bg_image',
			array(
				'label'   => esc_html__( 'BG Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'what else do we offer', 'plumbio-core' ),
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

		$this->end_controls_section();

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'Item', 'plumbio-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'plumbio-core' ),
				'type'  => Controls_Manager::ICONS,
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
			'item_list_content',
			array(
				'label'       => esc_html__( 'List Content', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

			)
		);

		$repeater->add_control(
			'item_button_title',
			array(
				'label'   => esc_html__( 'Button Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_button_link',
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
		$settings         = $this->get_settings_for_display();
		$large_image      = ( $settings['large_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['large_image']['id'], 'full' ) : $settings['large_image']['url'];
		$large_image_alt  = get_post_meta( $settings['large_image']['id'], '_wp_attachment_image_alt', true );
		$medium_image     = ( $settings['medium_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['medium_image']['id'], 'full' ) : $settings['medium_image']['url'];
		$medium_image_alt = get_post_meta( $settings['medium_image']['id'], '_wp_attachment_image_alt', true );
		$bg_image         = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];
		$bg_image_alt     = get_post_meta( $settings['bg_image']['id'], '_wp_attachment_image_alt', true );
		$sub_title        = $settings['sub_title'];
		$title            = $settings['title'];
		$description      = $settings['description'];
		$html_tag         = $settings['html_tag'];
		?> 
		<div class="section-indent6">
			<div class="tt-additional__wrapper">
				<picture class="tt-additional_img01">
					<source media="(min-width: 1230px)" srcset="<?php echo $large_image; ?>" data-srcset="<?php echo $large_image; ?>" type="image/png">
					<source media="(min-width: 768px)" srcset="<?php echo $medium_image; ?>" data-srcset="<?php echo $medium_image; ?>" type="image/png">
					<img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class=" lazyloaded" alt="">
				</picture>
				<div class="tt-additional__bg01">
					<div class="tt-additional__bg01-02 lazyload" data-bg="<?php echo $bg_image; ?>"></div>
					<div class="tt-additional__bg02">
						<div class="tt-row01">
							<div class="tt-col">
								<div class="blocktitle text-left">
									<div class="blocktitle__subtitle"><?php echo $sub_title; ?></div>
									<<?php echo $html_tag; ?> class="blocktitle__title"><?php echo $title; ?></<?php echo $html_tag; ?>>
								</div>
							</div>
							<div class="tt-col">
								<?php echo $description; ?>
							</div>
						</div>
						<div class="swiper-container imgbox-inner__wrapper js-align-layout three-items-slider" data-carousel="swiper" data-space-between="30" data-slides-sm="1" data-slides-lg="3" data-slides-xl="3" data-slides-xxl="4" data-autoplay-Delay="5000">
							<div class="swiper-wrapper">
								<?php
								$i = 1;
								foreach ( $settings['items'] as $item ) {
									$item_title                = $item['item_title'];
									$item_icon                 = $item['item_icon'];
									$item_content              = $item['item_content'];
									$item_list_content         = $item['item_list_content'];
									$item_button_title         = $item['item_button_title'];
									$item_button_link          = $item['item_button_link']['url'];
									$item_button_link_external = $item['item_button_link']['is_external'] ? 'target="_blank"' : '';
									$item_button_link_nofollow = $item['item_button_link']['nofollow'] ? 'rel="nofollow"' : '';
									?>
								 
									<div class="swiper-slide">
										<div class="additional js-align-layout__item">
											<div class="additional__icon icon-694055"><?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?></div>
											<h6 class="additional__title"><?php echo $item_title; ?></h6>
											<p>
												<?php echo $item_content; ?>
											</p>
											<ul class="tt-list tt-list__color01">
												<?php echo $item_list_content; ?>
											</ul>
											<?php if ( ! empty( $item_button_link ) && ! empty( $item_button_title ) ) { ?>
											<a href="<?php echo esc_url( $item_button_link ); ?>" <?php echo $item_button_link_external; ?> <?php echo $item_button_link_nofollow; ?> class="tt-btn"><span><?php echo $item_button_title; ?></span></a>
											<?php } ?>
										</div>
									</div> 
									<?php
									$i++;
								}
								?>
							</div>
							<div class="swiper-pagination pagination01"></div>
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
