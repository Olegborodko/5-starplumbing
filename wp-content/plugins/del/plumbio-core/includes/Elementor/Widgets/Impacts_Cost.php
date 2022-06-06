<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Impacts_Cost extends Widget_Base {


	public function get_name() {
		return 'impacts_cost';
	}

	public function get_title() {
		return esc_html__( 'Impacts Cost', 'plumbio-core' );
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
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
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
				'label' => esc_html__( 'Total Item', 'plumbio-core' ),
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
		$settings   = $this->get_settings_for_display();
		$heading    = $settings['heading'];
		$total_item = $settings['total_item'];
		?> 
		<div class="section-wrapper section-indent section-inner-custom">
			<div class="container container__fluid-xl">
				<div class="blocktitle text-left">
					<div class="blocktitle__title"><?php echo $heading; ?></div>
				</div>
				<div class="row tt-data03__wrapper">
				
					<?php
					$i     = 1;
					$count = 1;
					foreach ( $settings['items'] as $item ) {

						$item_description = $item['item_description'];
						?>
					
						<?php if ( $count == 1 ) { ?>

						<div class="col-md-6">
							<?php } ?>

								<div class="tt-data03">

									<?php echo $item_description; ?>
								</div> 

							<?php if ( $total_item == $count ) { ?>
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


