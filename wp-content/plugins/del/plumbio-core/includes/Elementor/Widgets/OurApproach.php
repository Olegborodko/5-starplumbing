<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Plumbio\Helper\Elementor\Settings\Header;
use Elementor\Core\Schemes;
class OurApproach extends Widget_Base {


	public function get_name() {
		return 'our_approach';
	}

	public function get_title() {
		return esc_html__( 'Our Approach', 'plumbio-core' );
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
			'list_content',
			array(
				'label'       => esc_html__( 'List Content', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( '', 'plumbio-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'plumbio-core' ),

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
				'label' => esc_html__( 'Item', 'plumbio-core' ),
			)
		);
		Header::plumbio_coloumn_control( $this, 6, 2 );
		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'       => esc_html__( 'Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Plumbing Specialists', 'plumbio-core' ),
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
			'item_icon_bg_shape',
			array(
				'label' => esc_html__( 'Icon BG Shape', 'plumbio-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);
		$repeater->add_control(
			'item_description',
			array(
				'label'       => esc_html__( 'Description', 'plumbio-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( 'Our team will work intelligently to come up with the optimal solution and then execute it perfectly.', 'plumbio-core' ),
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
		$title        = $settings['title'];
		$sub_title    = $settings['sub_title'];
		$html_tag     = $settings['html_tag'];
		$sub_title    = $settings['sub_title'];
		$description  = $settings['description'];
		$list_content = $settings['list_content'];
		$image_url    = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['image']['id'], 'full' ) : $settings['image']['url'];

		$class = Header::plumbio_coloumn( $this, $settings );
		?>
		<div class="row flex-row-reverse">
			<div class="col-md-6">
				<div class="blocktitle text-left">
					<div class="blocktitle__subtitle"><?php echo $sub_title; ?></div>
					<<?php echo $html_tag; ?> class="blocktitle__title"><?php echo $title; ?></<?php echo $html_tag; ?>>
				</div>
				<p>
					<?php echo $description; ?>
				</p>
				<ul class="tt-list tt-list__color01 tt-offset__02">
					<?php echo $list_content; ?>
				</ul>
			</div>
			<div class="divider tt-visible__mobile"></div>
			<div class="col-md-6 indent-top">
				<picture class="same-height-img">
					<source data-srcset="<?php echo $image_url; ?>" type="image/jpg" srcset="<?php echo $image_url; ?>">
					<img src="<?php echo $image_url; ?>" data-src="<?php echo $image_url; ?>" class="lazyload" alt="">
				</picture>
			</div>
		</div>
		<div class="divider"></div>
		<div class="row tt-data04__wrapper">

			<?php
			$i = 1;
			foreach ( $settings['items'] as $item ) {
				$item_title         = $item['item_title'];
				$item_icon          = $item['item_icon'];
				$item_icon_bg_shape = $item['item_icon_bg_shape'];
				$item_description   = $item['item_description'];

				?>
				<div class="<?php echo $class; ?>">
					<div class="tt-data04">
						<?php if ( $item_icon_bg_shape['value'] ) { ?>
						<div class="tt-data04__icon <?php echo $item_icon_bg_shape['value']; ?>"><?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?></div>
						<?php } else { ?>
							<div class="tt-data04__icon icon-694055"><?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?></div>
						<?php } ?>
						<div class="tt-data04__content">
							<h6 class="tt-data04__title">
								<?php echo $item_title; ?>
							</h6>
							<?php echo $item_description; ?>
						</div>
					</div>
				</div> 
				<?php
				$i++;
			}
			?>
		</div>
		<?php
	}

	protected function content_template() {
	}
}
