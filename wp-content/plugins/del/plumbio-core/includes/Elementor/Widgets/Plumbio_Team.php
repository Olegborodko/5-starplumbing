<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Plumbio_Team extends Widget_Base {


	public function get_name() {
		return 'plumbio_team';
	}

	public function get_title() {
		return esc_html__( 'Plumbio Team', 'plumbio-core' );
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
				'label'   => esc_html__( 'Block Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
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
			'item_social_icon',
			array(
				'label'       => esc_html__( 'Social Icon', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

			)
		);

		$repeater->add_control(
			'item_name',
			array(
				'label'   => esc_html__( 'Name', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_designation',
			array(
				'label'   => esc_html__( 'Designation', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
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

		$this->start_controls_section(
			'item2',
			array(
				'label' => esc_html__( 'item2', 'plumbio-core' ),
			)
		);

		$repeater2 = new Repeater();

		$repeater2->add_control(
			'item2_image',
			array(
				'label'   => esc_html__( 'Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater2->add_control(
			'item2_name',
			array(
				'label'   => esc_html__( 'Name', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$repeater2->add_control(
			'item2_designation',
			array(
				'label'   => esc_html__( 'Designation', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'items2',
			array(
				'label'   => esc_html__( 'Repeater List', 'plumbio-core' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater2->get_controls(),
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
		$description = $settings['description'];  ?> 
		
		<div class="section-indent">
			<div class="container container__fluid-lg">
				<div class="blocktitle text-center blocktitle__min-width02">
					<div class="blocktitle__under"><?php echo $block_title; ?></div>
					<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
					<div class="blocktitle__title"><?php echo $heading; ?></div>
					<div class="blocktitle__text blocktitle__min-width"><?php echo $description; ?></div>
				</div>
				<div class="row personal-02__wrapper">

					<?php
					$i = 1;
					foreach ( $settings['items'] as $item ) {

						$item_image     = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_image( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
						$item_image_alt = get_post_meta( $item['item_image']['id'], '_wp_attachment_image_alt', true );

						$item_image_url = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];

						$item_social_icon = $item['item_social_icon'];
						$item_name        = $item['item_name'];
						$item_designation = $item['item_designation'];
						$item_description = $item['item_description'];
						?>

						<div class="col-md-6">
							<div class="personal-02">
								<div class="personal-02__slide">
									<?php echo $item_social_icon; ?>
								</div>
								<div class="personal-02__img">
									<picture>
										<source srcset="<?php echo $item_image_url; ?>" data-srcset="<?php echo $item_image_url; ?>" type="image/jpg">
										<?php
										if ( wp_http_validate_url( $item_image ) ) {
											?>
											<img src="<?php echo esc_url( $item_image ); ?>" alt="<?php esc_url( $item_image_alt ); ?>">
											<?php
										} else {
											echo $item_image;
										}
										?>
									</picture>
								</div>
								<div class="personal-02__content">
									<h6 class="personal-02__title"><?php echo $item_name; ?></h6>
									<div class="personal-02__label"><?php echo $item_designation; ?></div>
									<p>
										<?php echo $item_description; ?>
									</p>
								</div>
							</div>
						</div>
				 <?php $i++;  } ?>


				</div>
				<!-- carusel -->
				<div class="block_indent01">
					<div class="swiper-container imgbox-inner__wrapper four-items-slider" data-carousel="swiper" data-slides-sm="2" data-slides-lg="3" data-slides-xl="4" data-slides-xxl="4" data-autoplay-Delay="2000">
						<div class="swiper-wrapper">
						<?php
						$i = 1;
						foreach ( $settings['items2'] as $item ) {

							$item2_image     = ( $item['item2_image']['id'] != '' ) ? wp_get_attachment_image( $item['item2_image']['id'], 'full' ) : $item['item2_image']['url'];
							$item2_image_alt = get_post_meta( $item['item2_image']['id'], '_wp_attachment_image_alt', true );

							$item_image_url2   = ( $item['item2_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item2_image']['id'], 'full' ) : $item['item2_image']['url'];
							$item2_name        = $item['item2_name'];
							$item2_designation = $item['item2_designation'];

							?>
							<div class="swiper-slide">
								<a href="#" class="personal-03">
									<div class="personal-03__img">
										<picture>
										<source srcset="<?php echo $item_image_url2; ?>" data-srcset="<?php echo $item_image_url2; ?>" type="image/jpg">
											<?php
											if ( wp_http_validate_url( $item_image ) ) {
												?>
													<img src="<?php echo esc_url( $item_image ); ?>" alt="<?php esc_url( $item_image_alt ); ?>">
												<?php
											} else {
												echo $item_image;
											}
											?>
										</picture>
									</div>
									<div class="personal-03__title"><?php echo $item2_name; ?></div>
									<div class="personal-03__label"><?php echo $item2_designation; ?></div>
								</a>
							</div>
							<?php $i++;  } ?>
						</div>
						<div class="swiper-pagination swiper-pagination__center"></div>
					</div>
				</div>
				<!-- /carusel -->
			</div>
		</div> 
		<?php
	}

	protected function content_template() {
	}
}


