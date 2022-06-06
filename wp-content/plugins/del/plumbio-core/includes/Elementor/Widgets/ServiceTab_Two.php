<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class ServiceTab_Two extends Widget_Base {


	public function get_name() {
		return 'plumbio_service_tabtwo';
	}

	protected function get_control_uid( $input_type = 'default' ) {
		return 'elementor-control-' . $input_type . '-{{{ data._cid }}}';
	}

	public function get_title() {
		return esc_html__( 'Service Tab Two', 'plumbio-core' );
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
			'under_title',
			array(
				'label'       => esc_html__( 'Under Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Services', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'our services', 'plumbio-core' ),
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
				'label'       => esc_html__( 'Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

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
			'item_content_list',
			array(
				'label'       => esc_html__( 'Content List', 'plumbio-core' ),
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
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_tab_title',
			array(
				'label'       => esc_html__( 'Tab Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
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
		$settings    = $this->get_settings_for_display();
		$under_title = $settings['under_title'];
		$sub_title   = $settings['sub_title'];
		$title       = $settings['title'];
		$description = $settings['description'];
		$id          = $this->get_html_wrapper_class();

		?> 
		<div class="section-indent">
			<div class="container container__fluid-xl">
				<div class="blocktitle text-center blocktitle__min-width03">
					<div class="blocktitle__under"><?php echo $under_title; ?></div>
					<div class="blocktitle__subtitle"><?php echo $sub_title; ?></div>
					<div class="blocktitle__title"><?php echo $title; ?></div>
					<div class="blocktitle__text blocktitle__text-nopadding">
						<?php echo $description; ?>
					</div>
				</div>
			</div>
			<div class="section-wrapper section-indent-negative05">
				<div class="container container__fluid-xl">
					<!-- tabs -->
					<div class="tabs-dafault tabs__01 js-tabs tabs__indent-negative03">
						<div class="tabs__nav tabs__nav-size-sm tabs__nav-center">
						<?php
							$i = 1;
						foreach ( $settings['items'] as $item ) {
							$item_tab_title = $item['item_tab_title'];
							$active         = '';
							if ( $i == '1' ) {
								$active = 'active';
							}

							?>
							 

							<div class="tabs__nav-item <?php echo $active; ?>" data-pathtab="tab02-<?php echo $id; ?><?php echo $i; ?>">
								<div class="tt-text"><?php echo $item_tab_title; ?></div>
							</div>
							<?php
							$i++;
						}
						?>
						</div>
						<div class="tabs__container">

							<?php
							$i = 1;
							foreach ( $settings['items'] as $item ) {
								$item_title        = $item['item_title'];
								$item_image        = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_image( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
								$item_image_alt    = get_post_meta( $item['item_image']['id'], '_wp_attachment_image_alt', true );
								$item_description  = $item['item_description'];
								$item_content_list = $item['item_content_list'];
								$item_button_title = $item['item_button_title'];
								$item_tab_title    = $item['item_tab_title'];

								$active = '';
								if ( $i == '1' ) {
									$active = 'active';
								}

								?>
							 
								<div class="tabs__layout-item <?php echo $active; ?>" id="tab02-<?php echo $id; ?><?php echo $i; ?>">
									<div class="row flex-sm-row-reverse">
										<div class="col-md-6">
											<picture class="same-height-img">
											<?php
											if ( wp_http_validate_url( $item_image ) ) {
												?>
													<img src="<?php echo esc_url( $item_image ); ?>" alt="large image">
												<?php
											} else {
												echo $item_image;
											}
											?>
											</picture>
										</div>
										<div class="divider tt-visible__mobile"></div>
										<div class="col-md-6">
											<div class="blocktitle text-left">
												<div class="blocktitle__title"><?php echo $item_title; ?></div>
											</div>
											<p>
												<?php echo $item_description; ?>
											</p>
											<ul class="tt-list tt-list__color01 tt-list_top03">
												<?php echo $item_content_list; ?>
											</ul>
											<?php if ( ! empty( $item_button_title ) ) { ?>
											<div class="tt-btn tt-btn__top" data-modal="schedule" data-modal-size="modal__size-lg"><span><?php echo $item_button_title; ?></span></div>
											<?php } ?>
										</div>
									</div>
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
		<?php
	}

	protected function content_template() {
	}
}
