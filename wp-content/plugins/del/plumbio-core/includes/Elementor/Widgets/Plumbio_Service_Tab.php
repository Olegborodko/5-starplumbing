<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Plumbio\Helper\Elementor\Settings\Header;

class Plumbio_Service_Tab extends Widget_Base {


	public function get_name() {
		return 'plumbio_service_tab';
	}

	public function get_title() {
		return esc_html__( 'Plumbio Service Tab', 'plumbio-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'plumbio' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'ITEM', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'nav_style',
			array(
				'label'   => esc_html__( 'Nav Style', 'plumbio-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'Style 1', 'plugin-domain' ),
					'2' => __( 'Style 2', 'plugin-domain' ),
				),
			)
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'item_heading',
			array(
				'label'       => esc_html__( 'Tab Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);
		$repeater->add_control(
			'content_two',
			array(
				'label'       => __( 'Template Select', 'plumbio-core' ),
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
		$settings = $this->get_settings_for_display();

		$nav_style = $settings['nav_style'];
		if ( $nav_style == '2' ) {
			$nav_class     = 'tabs__nav tabs__nav-center tabs__nav__min-width01';
			$section_class = 'section-indent-negative04';
		} else {
			$nav_class     = 'tabs__nav tabs__nav-center tabs__nav-fullwidth-space';
			$section_class = 'section-indent-negative';
		}
		$plumbio_pluginElementor = \Elementor\Plugin::instance();

		$id = $this->get_html_wrapper_class();
		?>

		<div class="<?php echo $section_class; ?>">
			<div class="container container__fluid-lg">
				<div class="tabs-dafault tabs__01 js-tabs" data-ajaxcheck="true">
					<div class="<?php echo esc_attr( $nav_class ); ?>">
				<?php
					$i = 1;
				foreach ( $settings['items'] as $item ) {
					$item_heading = $item['item_heading'];
					$active       = '';
					if ( $i == 1 ) {
						$active = 'active';
					}
					?>
						<div class="tabs__nav-item <?php echo $active; ?>" data-pathtab="tab-<?php echo $id; ?><?php echo $i; ?>">
							<div class="tt-text"><?php echo $item_heading; ?></div>
						</div>
						<?php
						$i++;
				}
				?>

					</div>
					<div class="tabs__container">
						<?php
						if ( ! empty( $settings['items'] ) ) {
							$i = 1;
							foreach ( $settings['items'] as $item1 ) {
								$active_tab = '';

								if ( $i == 1 ) {
									$active_tab = 'active';
								}
								?>
						<div class="tabs__layout-item <?php echo $active_tab; ?>" id="tab-<?php echo $id; ?><?php echo $i; ?>">
								<?php
								echo $plumbio_pluginElementor->frontend->get_builder_content( $item1['content_two'] );
								?>

						</div>
								<?php
								$i++;
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	protected function content_template() {
	}
}
