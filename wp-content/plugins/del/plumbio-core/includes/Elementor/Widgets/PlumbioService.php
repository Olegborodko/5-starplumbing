<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Plumbio\Helper\Elementor\Settings\Header;

class PlumbioService extends Widget_Base {


	public function get_name() {
		return 'plumbio_our_service';
	}

	public function get_title() {
		return esc_html__( 'Our Service', 'plumbio-core' );
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
			'item_sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_large_image',
			array(
				'label'   => esc_html__( 'Large Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater->add_control(
			'item_medium_image',
			array(
				'label'   => esc_html__( 'Medium Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

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
			'item_url',
			array(
				'label' => esc_html__( 'URL', 'plumbio-core' ),
				'type'  => Controls_Manager::URL,
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
		?> 
<div class="section-indent02">
	<div class="container-fluid container__fluid-xl">
		<div class="swiper-container tt-swiper__noshadow col-inner-lg three-items-slider" data-carousel="swiper" data-space-between="30" data-slides-xl="3" data-slides-lg="3" data-slides-md="2" data-slides-sm="1">
			<div class="swiper-wrapper">
				<?php
				$i = 1;
				foreach ( $settings['items'] as $item ) {
					$item_title            = $item['item_title'];
					$item_large_image      = ( $item['item_large_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_large_image']['id'], 'full' ) : $item['item_large_image']['url'];
					$item_large_image_alt  = get_post_meta( $item['item_large_image']['id'], '_wp_attachment_image_alt', true );
					$item_large_image_url  = ( $item['item_large_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_large_image']['id'], 'full' ) : $item['item_large_image']['url'];
					$item_medium_image     = ( $item['item_medium_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_medium_image']['id'], 'full' ) : $item['item_medium_image']['url'];
					$item_medium_image_alt = get_post_meta( $item['item_medium_image']['id'], '_wp_attachment_image_alt', true );
					$item_sub_title        = $item['item_sub_title'];
					$item_icon             = $item['item_icon'];
					$item_description      = $item['item_description'];
					$item_list_content     = $item['item_list_content'];
					$item_url              = $item['item_url']['url'];
					$item_url_external     = $item['item_url']['is_external'] ? 'target="_blank"' : '';
					$item_url_nofollow     = $item['item_url']['nofollow'] ? 'rel="nofollow"' : '';
					?>
				 
					 <div class="swiper-slide">
						<a href="<?php echo esc_url( $item_url ); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?> class="imgbox-inner">
							<div class="imgbox-inner__img">
								<picture>
									<source srcset="<?php echo $item_medium_image; ?>" data-srcset="<?php echo $item_medium_image; ?>" media="(max-width: 1024px)" type="image/jpg">
									<source srcset="<?php echo $item_large_image_url; ?>" data-srcset="<?php echo $item_large_image_url; ?>" type="image/jpg">
									<?php
									if ( wp_http_validate_url( $item_medium_image ) ) {
										?>
											<img src="<?php echo esc_url( $item_medium_image ); ?>" alt="large image">
										<?php
									} else {
										echo $item_medium_image;
									}
									?>
								</picture>
							</div>
							<div class="imgbox-inner__description-small">
								<div class="imgbox-inner__title">
									<div class="tt-icon icon-694055"><?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?></div>
									<div class="tt-title">
										<div class="tt-text-01"><?php echo $item_title; ?></div>
										<div class="tt-text-02"><?php echo $item_sub_title; ?></div>
									</div>
								</div>
								<div class="tt-icon-box">+</div>
							</div>
							<div class="imgbox-inner__description-large">
								<div class="tt-align">
									<div class="imgbox-inner__title">
										<div class="tt-icon icon-694055"><?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?></div>
										<div class="tt-title">
											<div class="tt-text-01"><?php echo $item_title; ?></div>
											<div class="tt-text-02"><?php echo $item_sub_title; ?></div>
										</div>
									</div>
									<p>
										<?php echo $item_description; ?>
									</p>
									<ul class="tt-list tt-offset__01 tt-list__color02">
										<?php echo $item_list_content; ?>
									</ul>
								</div>
								<div class="tt-external-link icon-545682"></div>
							</div>
						</a>
					</div>
					<?php
						$i++;
				}
				?>
					</div>
					<div class="swiper-pagination swiper-pagination__align01 swiper-pagination__center"></div>
				</div>
			</div>
		</div>
		<?php
	}
	protected function content_template() {    }
}
