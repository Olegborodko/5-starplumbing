<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Plumbio\Helper\Elementor\Settings;
use Plumbio\Helper\Elementor\Settings\Header;
use Elementor\Core\Schemes;
class WorkPlan extends Widget_Base {


	public function get_name() {
		return 'work_plan';
	}

	public function get_title() {
		return esc_html__( 'Work Plan', 'plumbio-core' );
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
			'title',
			array(
				'label'       => esc_html__( 'Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label'       => esc_html__( 'Sub Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'html_tag',
			array(
				'label'   => esc_html__( 'Html Heading', 'plumbio-core' ),
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
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'       => esc_html__( 'Content', 'plumbio-core' ),
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
		$this->add_control(
			'column',
			array(
				'label'   => __( 'Column Select', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'col-sm-4',
				'options' => array(
					'col-sm-6' => __( '2', 'plugin-domain' ),
					'col-sm-4' => __( '3', 'plugin-domain' ),
					'col-sm-3' => __( '4', 'plugin-domain' ),
				),
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
			'item_large_image',
			array(
				'label'   => esc_html__( 'Large Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater->add_control(
			'item_small_image',
			array(
				'label'   => esc_html__( 'Small Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
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
		$settings  = $this->get_settings_for_display();
		$title     = $settings['title'];
		$sub_title = $settings['sub_title'];
		$heading   = $settings['heading'];
		$content   = $settings['content'];
		$column    = $settings['column'];
		$html_tag  = $settings['html_tag'];

		?> 
		<div class="section-indent08">
			<div class="container container__fluid-xl">
				<div class="blocktitle text-center blocktitle__min-width02">
					<div class="blocktitle__under"><?php echo $title; ?></div>
					<div class="blocktitle__subtitle"><?php echo $sub_title; ?></div>
					<<?php echo $html_tag; ?> class="blocktitle__title"><?php echo $heading; ?></<?php echo $html_tag; ?>>
					<div class="blocktitle__text"><?php echo $content; ?> </div>
				</div>
				<div class="step__wrapper row">

					<?php
					$i = 1;
					foreach ( $settings['items'] as $item ) {
						$item_title           = $item['item_title'];
						$item_large_image_url = ( $item['item_large_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_large_image']['id'], 'full' ) : $item['item_large_image']['url'];
						$item_small_image     = ( $item['item_small_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_small_image']['id'], 'full' ) : $item['item_small_image']['url'];
						$item_small_image_alt = get_post_meta( $item['item_small_image']['id'], '_wp_attachment_image_alt', true );
						?>
					  
						<div class="<?php echo $column; ?>">
							<div class="step">
								<div class="step__img">
									<picture>
										<source srcset="<?php echo $item_small_image; ?>" data-srcset="<?php echo $item_small_image; ?>" media="(max-width: 1024px)" type="image/png">
										<source srcset="<?php echo $item_large_image_url; ?>" data-srcset="<?php echo $item_large_image_url; ?>" type="image/png">
										<img src="<?php echo $item_large_image_url; ?>" data-src="<?php echo $item_large_image_url; ?>" class=" lazyloaded" alt="">
									</picture>
								</div>
								<h6 class="step__title"><?php echo $item_title; ?></h6>
							</div>
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
	protected function content_template() {
	}
}
