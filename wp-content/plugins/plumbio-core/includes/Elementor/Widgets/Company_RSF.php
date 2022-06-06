<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Company_RSF extends Widget_Base {


	public function get_name() {
		return 'company_rsf';
	}

	public function get_title() {
		return esc_html__( 'Company RSF', 'plumbio-core' );
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
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'plumbio-core' ),
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
		$settings     = $this->get_settings_for_display();
		$bg_image     = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];
		$bg_image_alt = get_post_meta( $settings['bg_image']['id'], '_wp_attachment_image_alt', true );
		?>      
		<div class="section-indent-negative03">
			<div class="layout03">
				<div class="layout03_bg lazyload" data-bg="<?php echo $bg_image; ?>"></div>
				<div class="container container__fluid-xl">
					<div class="layout03__content">
						<div class="row">

							<?php
							$i = 1;
							foreach ( $settings['items'] as $item ) {
								$item_image     = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_image( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
								$item_image_alt = get_post_meta( $item['item_image']['id'], '_wp_attachment_image_alt', true );
								$item_image_url = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];

								$item_title       = $item['item_title'];
								$item_description = $item['item_description'];
								?>
							 <div class="col-sm-6 col-md-4">
									<div class="layout03__item">
										<div class="layout03__item-img">
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
										<div class="layout03__item-content">
											<h5 class="layout03__item-title"><?php echo $item_title; ?></h5>
											<p>
												<?php echo $item_description; ?>
											</p>
										</div>
									</div>
								</div> 
						  <?php $i++;   } ?>

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
