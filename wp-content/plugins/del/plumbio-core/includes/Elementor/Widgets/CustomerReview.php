<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Core\Schemes;
class CustomerReview extends Widget_Base {


	public function get_name() {
		return 'customer_review';
	}

	public function get_title() {
		return esc_html__( 'Customer Review', 'plumbio-core' );
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
			'placeholder_title',
			array(
				'label'   => esc_html__( 'Placeholder Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label'   => esc_html__( 'Sub Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'customer say', 'plumbio-core' ),
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
				'label'   => esc_html__( 'Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Reviews from Our Customers', 'plumbio-core' ),
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
			'button_title',
			array(
				'label'   => esc_html__( 'Button Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'More Testimonials', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'button_link',
			array(
				'label'         => esc_html__( 'Button Link', 'plumbio-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'plumbio-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
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

		$this->add_control(
			'column',
			array(
				'label'   => __( 'Column', 'plugin-domain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'col-md-6',
				'options' => array(
					'col-md-6' => __( '2', 'plugin-domain' ),
					'col-md-4' => __( '3', 'plugin-domain' ),
					'col-md-3' => __( '4', 'plugin-domain' ),
				),
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
			'rating',
			array(
				'label' => esc_html__( 'Rating', 'plumbio-core' ),
				'type'  => Controls_Manager::NUMBER,
			)
		);

		$repeater->add_control(
			'item_name',
			array(
				'label'   => esc_html__( 'Name', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Donna Behrens', 'plumbio-core' ),
			)
		);

		$repeater->add_control(
			'item_designation',
			array(
				'label'   => esc_html__( 'Designation', 'plumbio-core' ),
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
		$settings             = $this->get_settings_for_display();
		$column               = $settings['column'];
		$html_tag             = $settings['html_tag'];
		$placeholder_title    = $settings['placeholder_title'];
		$sub_title            = $settings['sub_title'];
		$title                = $settings['title'];
		$description          = $settings['description'];
		$button_title         = $settings['button_title'];
		$button_link          = $settings['button_link']['url'];
		$button_link_external = $settings['button_link']['is_external'] ? 'target="_blank"' : '';
		$button_link_nofollow = $settings['button_link']['nofollow'] ? 'rel="nofollow"' : '';
		?> 
		<div class="section-indent">
			<div class="container container__fluid-lg">
				<div class="blocktitle text-center">
					<div class="blocktitle__under"><?php echo $placeholder_title; ?></div>
					<div class="blocktitle__subtitle"><?php echo $sub_title; ?></div>
					<<?php echo $html_tag; ?> class="blocktitle__title"><?php echo $title; ?></<?php echo $html_tag; ?>>
					<div class="blocktitle__text blocktitle__min-width">
						<?php echo $description; ?>
					</div>
				</div>
				<div class="testimonials02__wrapper row js-addlayout__content">

					<?php
					$i = 1;
					foreach ( $settings['items'] as $item ) {
						$rating           = $item['rating'];
						$item_title       = $item['item_title'];
						$item_description = $item['item_description'];
						$item_name        = $item['item_name'];
						$item_designation = $item['item_designation'];
						?>
					 
						<div class="<?php echo $column; ?>">
							<div class="testimonials02">
								<div class="testimonials02__icon icon-2997"></div>
								<h6 class="testimonials02__title"><?php echo $item_title; ?></h6>
								<p>
									<?php echo $item_description; ?>
								</p>
								<div class="testimonials02__caption">
									<strong>- <?php echo $item_name; ?>,</strong> <?php echo $item_designation; ?>
								</div>
								<div class="tt-rating">
								<?php
								if ( $rating ) {
									for ( $m = 1;$m <= $rating;$m++ ) {
										?>
											<i class="icon-56786"></i>
										<?php
									}
								} else {
									?>
									
									<i class="icon-56786"></i>
									<i class="icon-56786"></i>
									<i class="icon-56786"></i>
									<i class="icon-56786"></i>
									<i class=" icon-56786"></i>
									<?php } ?>
								</div>
							</div>
						</div> 
						<?php
						$i++;
					}
					?>



				</div>
				<div class="text-center addlayout__btn js-addlayout__btn">
					<a href="<?php echo esc_url( $button_link ); ?>" <?php echo $button_link_external; ?> <?php echo $button_link_nofollow; ?> class="tt-btn"><span><?php echo $button_title; ?></span></a>
				</div>
			</div>
		</div>
		<?php
	}

	protected function content_template() {
	}
}
