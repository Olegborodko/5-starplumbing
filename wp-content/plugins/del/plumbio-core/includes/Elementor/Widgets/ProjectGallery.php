<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class ProjectGallery extends Widget_Base {


	public function get_name() {
		return 'project_gallery';
	}

	public function get_title() {
		return esc_html__( 'Project Gallery', 'plumbio-core' );
	}

	public function get_icon() {
		return 'fa fa-deaf';
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
			'sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'latest projects', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'title',
			array(
				'label'       => esc_html__( 'Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Our Portfolio & Gallery', 'plumbio-core' ),
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
			'back_title',
			array(
				'label'   => esc_html__( 'Back Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Gallery', 'plumbio-core' ),
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
				'label'   => esc_html__( 'Tab Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);
		$repeater->add_control(
			'content_two',
			array(
				'label'       => __( 'Template Select', 'sanitizex-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => plumbio_core_elementor_library(),
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
		$sub_title   = $settings['sub_title'];
		$title       = $settings['title'];
		$description = $settings['description'];
		$back_title  = $settings['back_title'];

		$plumbio_pluginElementor = \Elementor\Plugin::instance();
		?> 
		<div class="section-indent">
			<div class="container container__fluid-xl">
				<div class="row">
					<div class="col-md-5 col-lg-6">
						<div class="blocktitle text-left">
							<div class="blocktitle__subtitle"><?php echo $sub_title; ?></div>
							<div class="blocktitle__title"><?php echo $title; ?></div>
						</div>
					</div>
					<div class="col-md-7 col-lg-6">
						<div class="tt-notes02">
							<p>
								<?php echo $description; ?>
							</p>
							<div class="tt-notes02__under"><?php echo $back_title; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-indent nomargin">
			<div class="wrapper02">
				<div class="container container__fluid-xl">
					<!-- tabs -->
					<div class="tabs-dafault tabs__01 js-tabs tabs__indent-negative">
						<div class="tabs__nav tabs__nav-size-md">

							<?php
							$i = 1;
							foreach ( $settings['items'] as $item ) {
								$item_title = $item['item_title'];
								$active     = '';
								if ( $i == '1' ) {
									$active = 'active';
								}
								?>
							 
								<div class="tabs__nav-item <?php echo $active; ?>" data-pathtab="tab-0<?php echo $i; ?>">
									<div class="tt-text"><?php echo $item_title; ?></div>
								</div> 
								<?php
								$i++;
							}
							?>
						</div>
						<div class="tabs__container02">
						<?php
							$i = 1;
						foreach ( $settings['items'] as $item ) {
							$item_title = $item['item_title'];
							$active     = '';
							if ( $i == '1' ) {
								$active = 'active';
							}

							?>
							<div class="tabs__layout-item <?php echo $active; ?>" id="tab-0<?php echo $i; ?>">

							<?php
							echo $plumbio_pluginElementor->frontend->get_builder_content( $item['content_two'] );
							?>
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
