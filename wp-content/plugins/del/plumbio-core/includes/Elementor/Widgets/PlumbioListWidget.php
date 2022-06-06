<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class PlumbioListWidget extends Widget_Base {


	public function get_name() {
		return 'promo_list_widget';
	}

	public function get_title() {
		return esc_html__( 'Promo List Widget', 'plumbio-core' );
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
				'label' => esc_html__( 'Item', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'heading',
			array(
				'label'       => esc_html__( 'Heading', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
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
		$heading  = $settings['heading'];
		?> 
		<div class="promo__aside02">
			<div class="promo__aside02__title">
			   <?php echo $heading; ?>
			</div>
			<ul class="tt-list03">

				<?php
				$i = 1;
				foreach ( $settings['items'] as $item ) {
					$item_title = $item['item_title'];
					?>
				 <li>
						<span class="tt-icon"><strong><?php echo $i; ?></strong></span>
						<span class="tt-text"><?php echo $item_title; ?></span>
					</li> 
					<?php
					$i++;
				}
				?>
			</ul>
		</div>
		<?php
	}

	protected function content_template() {
	}
}
