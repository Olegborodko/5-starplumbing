<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Core\Schemes;
class WhyChooseUs extends Widget_Base {


	public function get_name() {
		return 'plumbio_why_choose_us';
	}

	public function get_title() {
		return esc_html__( 'Why Choose Us', 'plumbio-core' );
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
				'default'     => __( 'why choose us', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'signature_title',
			array(
				'label'       => esc_html__( 'Signature Title', 'plumbio-core' ),
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

		$this->add_control(
			'signature_image',
			array(
				'label'   => esc_html__( 'Signature Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$this->add_control(
			'list_content',
			array(
				'label'       => esc_html__( 'List Content', 'plumbio-core' ),
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
			'total_item',
			array(
				'label' => esc_html__( 'Total Item', 'plumbio-core' ),
				'type'  => Controls_Manager::NUMBER,
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
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'plumbio-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);

		$repeater->add_control(
			'item_content',
			array(
				'label'       => esc_html__( 'Content ', 'plumbio-core' ),
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
		$settings            = $this->get_settings_for_display();
		$html_tag            = $settings['html_tag'];
		$sub_title           = $settings['sub_title'];
		$description         = $settings['description'];
		$signature_image     = ( $settings['signature_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['signature_image']['id'], 'full' ) : $settings['signature_image']['url'];
		$signature_image_alt = get_post_meta( $settings['signature_image']['id'], '_wp_attachment_image_alt', true );
		$signature_title     = $settings['signature_title'];
		$title               = $settings['title'];
		$list_content        = $settings['list_content'];
		$total_item          = $settings['total_item'];
		?> 
		<div class="row">
			<div class="col-md-6">
				<div class="blocktitle text-left">
					<div class="blocktitle__subtitle"><?php echo $sub_title; ?></div>
					<<?php echo $html_tag; ?> class="blocktitle__title"><?php echo $title; ?></<?php echo $html_tag; ?>>
				</div>
				<p class="tt-max-width">
					<?php echo $description; ?>
				</p>
				<ul class="tt-list tt-list__color01 tt-offset__02">
					<?php echo $list_content; ?>
				</ul>
				<div class="tt-signature tt-signature__top">
					<div class="tt-signature__img">
						<picture>
							<source srcset="<?php echo $signature_image; ?>" data-srcset="<?php echo $signature_image; ?>" type="image/png">
							<img src="<?php echo $signature_image; ?>" data-src="<?php echo $signature_image; ?>" class="lazyload" alt="">
						</picture>
					</div>
					<div class="tt-signature__title"><?php echo $signature_title; ?></div>
				</div>
			</div>
			<div class="divider tt-visible__mobile"></div>
			<div class="col-md-6">
				<div class="row indent-top custom-col-indent">

					<?php
					$i     = 1;
					$count = 1;
					foreach ( $settings['items'] as $item ) {
						$item_title   = $item['item_title'];
						$item_icon    = $item['item_icon'];
						$item_content = $item['item_content'];
						$nomargin     = '';
						if ( $i == 1 ) {
							$nomargin = 'nomargin';
						}
						?>
					 
						<?php if ( $count == 1 ) { ?>
						<div class="col-sm-6">
						<div class="tt-data02__wrapper">
							<?php } ?>
								<div class="tt-data02 <?php echo $nomargin; ?>">
									<div class="tt-data02__icon icon-694055">
										<?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?>
									</div>
									<h6 class="tt-data02__title">
										<?php echo $item_title; ?>
									</h6>
									<?php echo $item_content; ?>
								</div>
							<?php if ( $count == $total_item ) { ?>
							</div> 
						</div>
								<?php
								$count = 1;
								$flag  = 0;
							} else {
								$count++;
								$flag = 1;
							}
							$i++;
					}
					if ( $flag ) {
						?>
							</div> 
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
