<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class RepairTab extends Widget_Base {


	public function get_name() {
		return 'repair_tab';
	}

	public function get_title() {
		return esc_html__( 'Repair Tab', 'plumbio-core' );
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
			'image',
			array(
				'label'   => esc_html__( 'Image', 'plumbio-core' ),
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
			'item_title',
			array(
				'label'       => esc_html__( 'Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
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
			'item_button_title',
			array(
				'label'       => esc_html__( 'Button Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Schedule Repair', 'plumbio-core' ),
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
		$settings  = $this->get_settings_for_display();
		$image     = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image( $settings['image']['id'], 'full' ) : $settings['image']['url'];
		$image_alt = get_post_meta( $settings['image']['id'], '_wp_attachment_image_alt', true );
		?> 
		<div class="tabs__indent-negative02">
			<div class="container container__fluid-xl">
				<div class="row">
					<div class="col-md-6">
						<picture class="same-height-img tt-custom-indent">
							<?php
							if ( wp_http_validate_url( $image ) ) {
								?>
									<img src="<?php echo esc_url( $image ); ?>" alt="large image">
								<?php
							} else {
								echo $image;
							}
							?>
						</picture>
					</div>
					<div class="divider tt-visible__mobile"></div>
					<div class="col-md-6">
						<!-- tabs -->
						<div class="tabs-dafault tabs__indent01 js-tabs">
							<div class="tabs__nav tabs__nav-size-small">
							<?php
								$i = 1;
							foreach ( $settings['items'] as $item ) {
								$item_title        = $item['item_title'];
								$item_description  = $item['item_description'];
								$item_button_title = $item['item_button_title'];

								$active = '';
								if ( $i == '1' ) {
									$active = 'active';
								}
								?>
								 

								<div class="tabs__nav-item <?php echo $active; ?>" data-pathtab="tab03-<?php echo $i; ?>">
									<div class="tt-text"><?php echo $item_title; ?></div>
								</div>
								<?php
								$i++;
							}
							?>
							</div>
							<div class="tabs__container03">

								<?php
								$i = 1;
								foreach ( $settings['items'] as $item ) {
									$item_title        = $item['item_title'];
									$item_description  = $item['item_description'];
									$item_button_title = $item['item_button_title'];

									$active = '';
									if ( $i == '1' ) {
										$active = 'active';
									}
									?>
								 
									<div class="tabs__layout-item <?php echo $active; ?>" id="tab03-<?php echo $i; ?>">
										<div class="blocktitle text-left">
											<div class="blocktitle__title"><?php echo $item_title; ?></div>
										</div>
										<p>
											<?php echo $item_description; ?>
										</p>
										<?php if ( ! empty( $item_button_title ) ) { ?>
										<div class="tt-btn tt-btn__top" data-modal="schedule" data-modal-size="modal__size-lg" data-modal-src=""><span><?php echo $item_button_title; ?></span></div>
										<?php } ?>
									</div> 
									<?php
									$i++;
								}
								?>
							</div>
						</div>
						<!-- /tabs -->
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	protected function content_template() {
	}
}
