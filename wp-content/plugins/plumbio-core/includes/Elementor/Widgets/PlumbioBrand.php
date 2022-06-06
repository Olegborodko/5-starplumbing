<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Core\Schemes;
class PlumbioBrand extends Widget_Base {


	public function get_name() {
		return 'plumbio_brand';
	}

	public function get_title() {
		return esc_html__( 'Plumbio Brand', 'plumbio-core' );
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
			'layout_style',
			array(
				'label'   => esc_html__( 'Layout Style', 'plumbio-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'1' => esc_html__( 'Style 1', 'plumbio-core' ),
					'2' => esc_html__( 'Style 2', 'plumbio-core' ),

				),
				'default' => '1',

			)
		);

		$this->add_control(
			'large_image',
			array(
				'label'   => esc_html__( 'Large BG Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'medium_image',
			array(
				'label'     => esc_html__( 'Medium BG Image', 'plumbio-core' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'condition' => array( 'layout_style' => '1' ),

			)
		);

		$this->add_control(
			'small_image',
			array(
				'label'     => esc_html__( 'Small BG Image', 'plumbio-core' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'condition' => array( 'layout_style' => '1' ),

			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label'   => esc_html__( 'Sub Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'we work with', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Our Partners', 'plumbio-core' ),
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
			'description',
			array(
				'label'       => esc_html__( 'Description', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),
				'condition'   => array( 'layout_style' => '1' ),
			)
		);
		$this->add_control(
			'extra_class',
			array(
				'label' => esc_html__( 'Extra Class', 'plumbio-core' ),
				'type'  => Controls_Manager::TEXT,
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
			'item_client_large_image',
			array(
				'label'   => esc_html__( 'Client Large Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater->add_control(
			'item_client_medium_image',
			array(
				'label'   => esc_html__( 'Client Medium Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

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
		$settings     = $this->get_settings_for_display();
		$extra_class  = $settings['extra_class'];
		$layout_style = $settings['layout_style'];
		$large_image  = ( $settings['large_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['large_image']['id'], 'full' ) : $settings['large_image']['url'];

		$large_image_alt = get_post_meta( $settings['large_image']['id'], '_wp_attachment_image_alt', true );
		if ( $layout_style == '1' ) {
			$medium_image = ( $settings['medium_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['medium_image']['id'], 'full' ) : $settings['medium_image']['url'];
			$small_image  = ( $settings['small_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['small_image']['id'], 'full' ) : $settings['small_image']['url'];
		}
		$sub_title   = $settings['sub_title'];
		$title       = $settings['title'];
		$description = $settings['description'];
		$html_tag    = $settings['html_tag'];

		?> 
		<?php if ( $layout_style == '1' ) { ?>
		<div class="section-inner02 <?php echo $extra_class; ?>">
			<div class="container container__fluid-lg">
				<div class="row">
					<div class="col-md-6">
						<div class="logo-item__wrapper row logo-item__col-2">

							<?php
							$i = 1;
							foreach ( $settings['items'] as $item ) {
								$item_client_large_image      = ( $item['item_client_large_image']['id'] != '' ) ? wp_get_attachment_image( $item['item_client_large_image']['id'], 'full' ) : $item['item_client_large_image']['url'];
								$item_client_large_image_alt  = get_post_meta( $item['item_client_large_image']['id'], '_wp_attachment_image_alt', true );
								$item_client_medium_image     = ( $item['item_client_medium_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_client_medium_image']['id'], 'full' ) : $item['item_client_medium_image']['url'];
								$item_client_medium_image_alt = get_post_meta( $item['item_client_medium_image']['id'], '_wp_attachment_image_alt', true );
								$item_link                    = $item['item_link']['url'];
								$item_link_external           = $item['item_link']['is_external'] ? 'target="_blank"' : '';
								$item_link_nofollow           = $item['item_link']['nofollow'] ? 'rel="nofollow"' : '';
								?>
							 
								<a href="<?php echo esc_url( $item_link ); ?>" <?php echo $item_link_external; ?> <?php echo $item_link_nofollow; ?> target="_blank" class="logo-item">
									<picture>
										<source srcset="<?php echo $item_client_medium_image; ?>" data-srcset="<?php echo $item_client_medium_image; ?>" media="(max-width: 1024px)" type="image/jpg">
										<?php
										if ( wp_http_validate_url( $item_client_large_image ) ) {
											?>
											<img src="<?php echo esc_url( $item_client_large_image ); ?>" alt="<?php esc_url( $item_client_large_image_alt ); ?>">
											<?php
										} else {
											echo $item_client_large_image;
										}
										?>
									</picture>
								</a> 
								<?php
								$i++;
							}
							?>
						</div>
					</div>
					<div class="divider tt-visible__mobile"></div>
					<div class="col-md-6">
						<picture class="tt-extra-bg01">
							<source srcset="<?php echo $small_image; ?>" data-srcset="<?php echo $small_image; ?>" media="(max-width: 767px)" type="image/png">
							<source srcset="<?php echo $medium_image; ?>" data-srcset="<?php echo $medium_image; ?>" media="(max-width: 1024px)" type="image/png">
							<source srcset="<?php echo $large_image; ?>" data-srcset="<?php echo $large_image; ?>" type="image/png">
							<img src="<?php echo $large_image; ?>" data-src="<?php echo $large_image; ?>" class="lazyload" alt="">
						</picture>
						<div class="tt-position-relative">
							<div class="blocktitle">
								<div class="blocktitle__subtitle"><?php echo $sub_title; ?></div>
								<<?php echo $html_tag; ?> class="blocktitle__title"><?php echo $title; ?></<?php echo $html_tag; ?>>
							</div>
							<?php echo $description; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } elseif ( $layout_style == '2' ) { ?>
		<div class="section-inner lazyload bg-center-center <?php echo $extra_class; ?>" data-bg="<?php echo $large_image; ?>">
		<div class="container container__fluid-xl">
			<div class="blocktitle text-left blocktitle__bottom-size02">
				<div class="blocktitle__subtitle"><?php echo $sub_title; ?></div>
				<<?php echo $html_tag; ?> class="blocktitle__title"><?php echo $title; ?></<?php echo $html_tag; ?>>
			</div>
			<div class="tt-row-col5">
			<?php
				$i = 1;
			foreach ( $settings['items'] as $item ) {
				$item_client_large_image     = ( $item['item_client_large_image']['id'] != '' ) ? wp_get_attachment_image( $item['item_client_large_image']['id'], 'full' ) : $item['item_client_large_image']['url'];
				$item_client_large_image_alt = get_post_meta( $item['item_client_large_image']['id'], '_wp_attachment_image_alt', true );
				$item_link                   = $item['item_link']['url'];
				$item_link_external          = $item['item_link']['is_external'] ? 'target="_blank"' : '';
				$item_link_nofollow          = $item['item_link']['nofollow'] ? 'rel="nofollow"' : '';
				?>
				 

				<div class="tt-col-item">
					<a href="<?php echo esc_url( $item_link ); ?>" <?php echo $item_link_external; ?> <?php echo $item_link_nofollow; ?> class="logo-item">
						<picture>
					<?php
					if ( wp_http_validate_url( $item_client_large_image ) ) {
						?>
								<img src="<?php echo esc_url( $item_client_large_image ); ?>" alt="<?php esc_url( $item_client_large_image_alt ); ?>">
						<?php
					} else {
						echo $item_client_large_image;
					}
					?>
						</picture>
					</a>
				</div>
				<?php
				$i++;
			}
			?>

			</div>
		</div>
	</div>
			<?php
		}
	}
	protected function content_template() {
	}
}
