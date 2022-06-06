<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Certificates extends Widget_Base {


	public function get_name() {
		return 'certificates';
	}

	public function get_title() {
		return esc_html__( 'Plumbio Certificates', 'plumbio-core' );
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

		$this->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'plumbio-core' ),
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
			'item_image',
			array(
				'label'   => esc_html__( 'Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

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
		$settings     = $this->get_settings_for_display();
		$bg_image     = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];
		$bg_image_alt = get_post_meta( $settings['bg_image']['id'], '_wp_attachment_image_alt', true );

		$tag_line    = $settings['tag_line'];
		$heading     = $settings['heading'];
		$description = $settings['description'];
		?> 
		<div class="section-indent">
			<div class="tt-additional__bg01">
				<div class="tt-additional__bg01-02 lazyload" data-bg="<?php echo $bg_image; ?>"></div>
				<div class="tt-additional__bg02">
					<div class="tt-row02">
						<div class="tt-col">
							<div class="blocktitle text-left">
								<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
								<div class="blocktitle__title"><?php echo $heading; ?></div>
							</div>
						</div>
						<div class="tt-col">
							<?php echo $description; ?>
						</div>
					</div>
					<!-- carusel -->
					<div class="swiper-container imgbox-inner__wrapper three-items-slider" data-carousel="swiper" data-slides-sm="2" data-slides-lg="3" data-slides-xl="3" data-slides-xxl="3.6" data-space-Between="30" data-autoplay-Delay="5000">
						<div class="swiper-wrapper">
								<?php
								$i = 1;
								foreach ( $settings['items'] as $item ) {

									$item_image     = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_image( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
									$item_image_alt = get_post_meta( $item['item_image']['id'], '_wp_attachment_image_alt', true );
									$item_url       = $item['item_url']['url'];

									$item_url_external = $item['item_url']['is_external'] ? 'target="_blank"' : '';
									$item_url_nofollow = $item['item_url']['nofollow'] ? 'rel="nofollow"' : '';
									?>
								
								<div class="swiper-slide">
									<figure class="img-lightbox">
										<a href="<?php echo esc_url( $item_url ); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?> class="glightbox">
											<?php
											if ( wp_http_validate_url( $item_image ) ) {
												?>
												<img src="<?php echo esc_url( $item_image ); ?>" alt="<?php esc_url( $item_image_alt ); ?>">
												<?php
											} else {
												echo $item_image;
											}
											?>
										</a>
									</figure>
								</div> 
							<?php $i++;    } ?>
						</div>
						<div class="swiper-pagination pagination01"></div>
					</div>
					<!-- /carusel -->
				</div>
			</div> 
		</div> 
		<?php
	}


	protected function content_template() {

	}
}
