<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class AboutCompany extends Widget_Base {


	public function get_name() {
		return 'about_company';
	}

	public function get_title() {
		return esc_html__( 'About Company', 'plumbio-core' );
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
			'box_image',
			array(
				'label'   => esc_html__( 'Box Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$this->add_control(
			'garantee_title',
			array(
				'label'       => esc_html__( 'Guarantee Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'year',
			array(
				'label'       => esc_html__( 'Year', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
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
				'label'       => esc_html__( 'Heading', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Nobody Wows Clients <br> Like We Do', 'plumbio-core' ),
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
			'list_content',
			array(
				'label'       => esc_html__( 'List Content', 'plumbio-core' ),
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
				'label'       => esc_html__( 'Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_number',
			array(
				'label'       => esc_html__( 'Number', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_unit',
			array(
				'label'       => esc_html__( 'Unit', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'plumbio-core' ),
				'type'  => Controls_Manager::ICONS,
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
		$settings       = $this->get_settings_for_display();
		$large_image    = ( $settings['large_image']['id'] != '' ) ? wp_get_attachment_image( $settings['large_image']['id'], 'full' ) : $settings['large_image']['url'];
		$medium_image   = ( $settings['medium_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['medium_image']['id'], 'full' ) : $settings['medium_image']['url'];
		$box_image      = ( $settings['box_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['box_image']['id'], 'full' ) : $settings['box_image']['url'];
		$box_image_alt  = get_post_meta( $settings['box_image']['id'], '_wp_attachment_image_alt', true );
		$garantee_title = $settings['garantee_title'];
		$year           = $settings['year'];
		$tag_line       = $settings['tag_line'];
		$heading        = $settings['heading'];
		$description    = $settings['description'];
		$list_content   = $settings['list_content'];
		?> 
		<div class="section-indent03">
			<div class="container container__fluid-lg">
				<div class="row tt-row-custom">
					<div class="col-sm-6">
						<div class="tt-img01">
							<picture class="tt-img-label__01">
								<source srcset="<?php echo $medium_image; ?>" data-srcset="<?php echo $medium_image; ?>" media="(max-width: 767px)" type="image/jpg">
								<?php
								if ( wp_http_validate_url( $large_image ) ) {
									?>
										<img src="<?php echo esc_url( $large_image ); ?>" alt="large image">
									<?php
								} else {
									echo $large_image;
								}
								?>
							</picture>
							<div class="tt-label-01 lazyload" data-bg="<?php echo $box_image; ?>">
								<div class="tt-icon icon-1701875"></div>
								<div class="tt-text01"><?php echo $year; ?></div>
								<div class="tt-text02">
									<?php echo $garantee_title; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="divider tt-visible__mobile-sm"></div>
					<div class="col-sm-6">
						<div class="blocktitle text-left">
							<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
							<div class="blocktitle__title"><?php echo $heading; ?></div>
						</div>
						<p>
							<?php echo $description; ?>
						</p>
						<ul class="tt-list tt-list__color01 tt-offset__02">
							<?php echo $list_content; ?>
						</ul>
						<div class="row tt-data01__wrapper01 tt-data01__top tt-data01__col2">

							<?php
							$i = 1;
							foreach ( $settings['items'] as $item ) {
								$item_title  = $item['item_title'];
								$item_number = $item['item_number'];
								$item_unit   = $item['item_unit'];
								$item_icon   = $item['item_icon']['value'];
								?>
							 
								<div class="col-6 tt-data01__item">
									<div class="tt-data01">
										<div class="tt-data01__icon <?php echo $item_icon; ?>">
											<i class="icon-694055"></i>
										</div>
										<div class="tt-data01__text">
											<div class="tt-text01">
												<?php echo $item_number; ?><sub><?php echo $item_unit; ?></sub>
											</div>
											<div class="tt-text02"><?php echo $item_title; ?></div>
										</div>
									</div>
								</div> 
								<?php
								$i++;
							}
							?>
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
