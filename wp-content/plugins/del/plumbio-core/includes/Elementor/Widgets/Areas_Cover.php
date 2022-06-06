<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Areas_Cover extends Widget_Base {


	public function get_name() {
		return 'areas_cover';
	}

	public function get_title() {
		return esc_html__( 'Areas Cover', 'plumbio-core' );
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
			'image',
			array(
				'label'   => esc_html__( ' Large Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'image2',
			array(
				'label'   => esc_html__( 'Medium Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'image3',
			array(
				'label'   => esc_html__( 'Small Image', 'plumbio-core' ),
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
				'default' => __( 'we work in', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Areas We Cover', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'       => esc_html__( 'Description', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( 'Working with a trusted company to provide you with plumbing and HVAC services can go a long way towards helping you feel confident in the quality of the pipes, sewer lines, and heating and cooling system in your home or business.', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'button_text',
			array(
				'label'   => esc_html__( 'Button Text', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'All Locations', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'url',
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

		$this->end_controls_section();

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'item', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'total_item',
			array(
				'label' => esc_html__( 'Total Item One Column', 'plumbio-core' ),
				'type'  => Controls_Manager::NUMBER,
			)
		);

		$repeater = new Repeater();

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
		$settings       = $this->get_settings_for_display();
		$image          = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image( $settings['image']['id'], 'full' ) : $settings['image']['url'];
		$image_alt      = get_post_meta( $settings['image']['id'], '_wp_attachment_image_alt', true );
		$item_image_url = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['image']['id'], 'full' ) : $settings['image']['url'];

		$image2          = ( $settings['image2']['id'] != '' ) ? wp_get_attachment_image( $settings['image2']['id'], 'full' ) : $settings['image2']['url'];
		$image_alt       = get_post_meta( $settings['image2']['id'], '_wp_attachment_image_alt', true );
		$item_image_url2 = ( $settings['image2']['id'] != '' ) ? wp_get_attachment_image_url( $settings['image2']['id'], 'full' ) : $settings['image2']['url'];

		$image3          = ( $settings['image3']['id'] != '' ) ? wp_get_attachment_image( $settings['image3']['id'], 'full' ) : $settings['image3']['url'];
		$image_alt       = get_post_meta( $settings['image3']['id'], '_wp_attachment_image_alt', true );
		$item_image_url3 = ( $settings['image3']['id'] != '' ) ? wp_get_attachment_image_url( $settings['image3']['id'], 'full' ) : $settings['image3']['url'];

		$tag_line     = $settings['tag_line'];
		$heading      = $settings['heading'];
		$description  = $settings['description'];
		$button_text  = $settings['button_text'];
		$url          = $settings['url']['url'];
		$url_external = $settings['url']['is_external'] ? 'target="_blank"' : '';
		$url_nofollow = $settings['url']['nofollow'] ? 'rel="nofollow"' : '';
		$total_item   = $settings['total_item'];
		?> 
		<div class="section-indent">
			<div class="container container__fluid-lg">
				<div class="blocktitle tt-visible__tablet tt-visible__mobile">
					<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
					<div class="blocktitle__title"><?php echo $heading; ?></div>
				</div>
				<div class="row">
					<div class="col-md-10 col-lg-7">
						<picture class="tt-extra-bg02">

							<source srcset="<?php echo $item_image_url; ?>" data-srcset="<?php echo $item_image_url; ?>" type="image/jpg"> 
							<source srcset="<?php echo $item_image_url2; ?>" data-srcset="<?php echo $item_image_url2; ?>" type="image/jpg">         
							<source srcset="<?php echo $item_image_url3; ?>" data-srcset="<?php echo $item_image_url3; ?>" type="image/jpg">
					  
							<?php
							if ( wp_http_validate_url( $image ) ) {
								?>
								<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_url( $image_alt ); ?>">
								<?php
							} else {
								echo $image;
							}
							?>
						</picture>
						<div class="row location__list__wrapper">
							<?php
							$i     = 1;
							$count = 1;
							foreach ( $settings['items'] as $item ) {
								$item_description  = $item['item_description'];
								$item_url          = $item['item_url']['url'];
								$item_url_external = $item['item_url']['is_external'] ? 'target="_blank"' : '';
								$item_url_nofollow = $item['item_url']['nofollow'] ? 'rel="nofollow"' : '';
								?>
								<?php if ( $count == 1 ) { ?>

									<div class="col-6">
										<ul class="location__list">
										<?php } ?>

										<li><a href="<?php echo esc_url( $item_url ); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>><?php echo $item_description; ?></a></li>
										<?php if ( $total_item == $count ) { ?>
										</ul>
									</div>
											<?php
											$count = 1;
											$flag  = 0;
										} else {
											$count++;
											$flag = 1;
										}
							}
							if ( $flag ) {
								?>
								</ul>
							</div>
						<?php } ?>
						</div>
					</div>
					<div class="divider-md tt-visible__tablet tt-visible__mobile"></div>
					<div class="col-lg-5">
						<div class="blocktitle tt-visible__descktop">
							<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
							<div class="blocktitle__title"><?php echo $heading; ?></div>
						</div>
						<p>
							<?php echo $description; ?>
						</p>
						<a href="<?php echo esc_url( $url ); ?>" <?php echo $url_external; ?>  <?php echo $url_nofollow; ?> class="tt-btn tt-btn__top"><span><?php echo $button_text; ?></span></a>                    
					</div>
				 </div>
			</div>
		</div>
		<?php
	}


	protected function content_template() {

	}

}
