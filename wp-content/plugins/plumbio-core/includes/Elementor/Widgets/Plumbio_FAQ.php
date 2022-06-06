<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Plumbio_FAQ extends Widget_Base {


	public function get_name() {
		return 'plumbio_faq';
	}

	public function get_title() {
		return esc_html__( 'Plumbio FAQ', 'plumbio-core' );
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
			'layout_style',
			array(
				'label'   => __( 'Layout Style', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'Style 1', 'plugin-domain' ),
					'2' => __( 'Style 2', 'plugin-domain' ),
				),
			)
		);
		$this->add_control(
			'total_item',
			array(
				'label'   => esc_html__( 'Per Column Items', 'plumbio-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
			)
		);

		$this->add_control(
			'block_title',
			array(
				'label'   => esc_html__( 'Block BG Text', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Questions', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'tag_line',
			array(
				'label'   => esc_html__( 'Tag Line', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'let you know', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Frequently Asked Questions', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'button_title',
			array(
				'label'     => esc_html__( 'Button Title', 'plumbio-core' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => __( '', 'plumbio-core' ),
				'condition' => array( 'layout_style' => '2' ),
			)
		);

		$this->add_control(
			'button_link',
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
				'condition'     => array( 'layout_style' => '2' ),

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
				'label' => esc_html__( 'item', 'plumbio-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'What do you charge for services?', 'plumbio-core' ),
			)
		);
		$repeater->add_control(
			'on_off',
			array(
				'label'        => __( 'Active On/Off?', 'plugin-domain' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'your-plugin' ),
				'label_off'    => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default'      => 'hide',
			)
		);

		$repeater->add_control(
			'item_description',
			array(
				'label'       => esc_html__( 'Description', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( 'We charge a cost-efficient fee for coming out and quote each job in writing before the work begins. All of our work is backed by a 100% satisfaction guarantee.', 'plumbio-core' ),
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
		$settings = $this->get_settings_for_display();

		$layout_style = $settings['layout_style'];
		$block_title  = $settings['block_title'];
		$tag_line     = $settings['tag_line'];
		$heading      = $settings['heading'];
		$description  = $settings['description'];

		$total_item = $settings['total_item'];
		if ( $layout_style == '2' ) {
			$button_title      = $settings['button_title'];
			$item_url          = $settings['button_link']['url'];
			$item_url_external = $settings['button_link']['is_external'] ? 'target="_blank"' : '';
			$item_url_nofollow = $settings['button_link']['nofollow'] ? 'rel="nofollow"' : '';
		}
		?> 
		<?php if ( $layout_style == '1' ) { ?>
		<div class="section-indent">
			<div class="container container__tablet-fluid">
				<div class="blocktitle text-center blocktitle__min-width03">
					<div class="blocktitle__under"><?php echo $block_title; ?></div>
					<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
					<div class="blocktitle__title"><?php echo $heading; ?></div>
					<div class="blocktitle__text"><?php echo $description; ?> </div>
				</div>
				<div class="row accordeon-wrapper">
					<?php
							$i     = 1;
							$count = 1;
					foreach ( $settings['items'] as $item ) {

						$on_off           = $item['on_off'];
						$item_title       = $item['item_title'];
						$item_description = $item['item_description'];

						$on_off = $item['on_off'];
						$active = '';
						if ( $on_off == 'yes' ) {
							$active = 'tt-show';
						}
						?>
						<?php if ( $count == 1 ) { ?>
					<div class="col-md-6">
						<div class="tt-collapse js-accordeon">
							<?php } ?>
								<div class="tt-collapse__item <?php echo $active; ?>">
									<div class="tt-collapse__title">
									<?php echo $item_title; ?>
									</div>
									<div class="tt-collapse__layout">
									<?php echo $item_description; ?>
									</div>
								</div>
						<?php if ( $total_item == $count ) { ?>
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
		<?php } elseif ( $layout_style == '2' ) { ?>

		<div class="section-indent07">
			<div class="container container__fluid-lg">
				<div class="row">
					<div class="col-md-6">
						<div class="blocktitle text-left tt-no-top">

							<div class="blocktitle__under"><?php echo $block_title; ?></div>
							<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
							<div class="blocktitle__title"><?php echo $heading; ?></div>
							
						</div>
						<p class="max-widt-02">
						<?php echo $description; ?>
						</p>
						<?php if ( ! empty( $button_title ) ) { ?>
						<a href="<?php echo esc_url( $item_url ); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?> class="tt-btn tt-btn__top"><span><?php echo $button_title; ?></span></a>
						<?php } ?>
					</div>
					<div class="divider tt-visible__mobile"></div>
					<div class="col-md-6">
						<div class="tt-collapse js-accordeon indent-top">
						<?php
							$i = 1;
						foreach ( $settings['items'] as $item ) {

							$item_title       = $item['item_title'];
							$item_description = $item['item_description'];
							if ( $i == 1 ) {
								$active = 'tt-show';
							} else {
								$active = '';
							}
							?>
							 
							<div class="tt-collapse__item <?php echo $active; ?>">
								<div class="tt-collapse__title"><?php echo $item_title; ?></div>
								<div class="tt-collapse__layout">
									<div class="tt-collapse__layou-indent">
									<?php echo $item_description; ?>
									</div>
								</div>
							</div>
							<?php
							$i++;
						}
						?>

						</div>
					</div>
				</div>
			</div>
		</div>
		
			<?php
		}
	}

	protected function content_template() {
	}
}
