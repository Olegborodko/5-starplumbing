<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Core\Schemes;
class Coverage_Location extends Widget_Base {


	public function get_name() {
		return 'coverage_location';
	}

	public function get_title() {
		return esc_html__( 'Coverage Location', 'plumbio-core' );
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
				'default'     => __( 'Coverage', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Coverage', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Locations We Cover', 'plumbio-core' ),
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
			'description_1',
			array(
				'label'       => esc_html__( 'Description 1', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( 'Our multiple service locations make it easy to deliver prompt – Same Day Service.', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

			)
		);

		$this->add_control(
			'description_2',
			array(
				'label'       => esc_html__( 'Description 2', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( 'Working with a trusted company to provide you with plumbing and HVAC services can go a long way towards helping you feel confident in the quality of the pipes, sewer lines, and heating and cooling system in your home or business. We are proud to offer our services to the following communities:', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

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
			'image_one',
			array(
				'label'   => esc_html__( 'Image One', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'image_two',
			array(
				'label'   => esc_html__( 'Image Two', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'Item', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'total_item',
			array(
				'label' => __( 'Per Column', 'plugin-domain' ),
				'type'  => \Elementor\Controls_Manager::NUMBER,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_link',
			array(
				'label'         => esc_html__( 'Link', 'plumbio-core' ),
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
			'item_country_name',
			array(
				'label'   => esc_html__( 'Country Name', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Alexandria City,', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_location',
			array(
				'label'   => esc_html__( 'Location', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Virginia', 'plumbio-core' ),
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
		$html_tag          = $settings['html_tag'];
		$total_item        = $settings['total_item'];
		$placeholder_title = $settings['placeholder_title'];
		$sub_title         = $settings['sub_title'];
		$title             = $settings['title'];
		$description_1     = $settings['description_1'];
		$description_2     = $settings['description_2'];
		$bg_image          = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];
		$image_one         = ( $settings['image_one']['id'] != '' ) ? wp_get_attachment_image( $settings['image_one']['id'], 'full' ) : $settings['image_one']['url'];
		$image_one_alt     = get_post_meta( $settings['image_one']['id'], '_wp_attachment_image_alt', true );
		$image_two         = ( $settings['image_two']['id'] != '' ) ? wp_get_attachment_image( $settings['image_two']['id'], 'full' ) : $settings['image_two']['url'];
		$image_two_alt     = get_post_meta( $settings['image_two']['id'], '_wp_attachment_image_alt', true );
		?> 
		<div class="section-inner bg-center-top lazyload" data-bg="<?php echo $bg_image; ?>">
			<div class="container container__tablet-fluid">
				<div class="row">
					<div class="col-md-6 col-lg-5">
						<div class="blocktitle text-left">
							<div class="blocktitle__under"><?php echo $placeholder_title; ?></div>
							<div class="blocktitle__subtitle"><?php echo $sub_title; ?></div>
							<<?php echo $html_tag; ?> class="blocktitle__title"><?php echo $title; ?></<?php echo $html_tag; ?>>
						</div>
						<p>
							<strong class="tt-base-color"><?php echo $description_1; ?> </strong>
						</p>
						<p>
							<?php echo $description_2; ?>
						</p>
					</div>
					<div class="divider tt-visible__mobile"></div>
					<div class="col-md-6 offset-lg-1">
						<div class="layout01__img">
							<picture class="layout01__img-main">
								<?php
								if ( wp_http_validate_url( $image_one ) ) {
									?>
										<img src="<?php echo esc_url( $image_one ); ?>" alt="large image">
									<?php
								} else {
									echo $image_one;
								}
								?>
							</picture>
							<picture class="layout01__img-additional02 p-b-l">
							<?php
							if ( wp_http_validate_url( $image_two ) ) {
								?>
										<img src="<?php echo esc_url( $image_two ); ?>" alt="large image">
									<?php
							} else {
								echo $image_two;
							}
							?>
							</picture>
						</div>
					</div>
				</div>
				<div class="divider-xl"></div>
				<div class="row">
					<?php
					$i     = 1;
					$count = 1;
					foreach ( $settings['items'] as $item ) {
						$item_link          = $item['item_link']['url'];
						$item_link_external = $item['item_link']['is_external'] ? 'target="_blank"' : '';
						$item_link_nofollow = $item['item_link']['nofollow'] ? 'rel="nofollow"' : '';
						$item_location      = $item['item_location'];
						$item_country_name  = $item['item_country_name'];
						?>
					 
						<?php if ( $count == 1 ) { ?>
					<div class="col-sm-4 col-md-4">
					<?php } ?>
							<a href="<?php echo esc_url( $item_link ); ?>" <?php echo $item_link_external; ?> <?php echo $item_link_nofollow; ?> class="tt-dot-info"><h3><?php echo $item_country_name; ?></h3> <?php echo $item_location; ?></a>
						<?php if ( $count == $total_item ) { ?>
						</div> 
							<?php
							$count = 1;
							$flag  = 0;
						} else {
							$count++;
							$flag = 1;
						}
						$i++;
					}
					if ( $flag ) {
						?>
						</div>
					<?php } ?>


				</div>
			</div>
		</div> 
		<?php
	}

	protected function content_template() {
	}
}
