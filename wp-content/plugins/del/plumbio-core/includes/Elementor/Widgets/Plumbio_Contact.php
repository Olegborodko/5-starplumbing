<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Plumbio_Contact extends Widget_Base {


	public function get_name() {
		return 'plumbio_contact';
	}

	public function get_title() {
		return esc_html__( 'Plumbio Contact', 'plumbio-core' );
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
			'bg_image',
			array(
				'label'   => esc_html__( 'BG Image', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'bg_title',
			array(
				'label'   => esc_html__( 'BG Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Contact', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'tag_line',
			array(
				'label'   => esc_html__( 'Tag Line', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'contact us', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__( 'Heading', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Get in Touch', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'sub_heading',
			array(
				'label'   => esc_html__( 'Sub Heading', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Our team proudly offers an on-time guarantee and a 100% customer satisfaction guarantee.', 'plumbio-core' ),
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
			'form_title',
			array(
				'label'   => esc_html__( 'Form Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'short_code',
			array(
				'label'   => esc_html__( 'Short Code', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'Item List', 'plumbio-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_icon',
			array(
				'label' => esc_html__( 'Icon', 'plumbio-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);

		$repeater->add_control(
			'item_title',
			array(
				'label' => esc_html__( 'Title', 'plumbio-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$repeater->add_control(
			'item_description',
			array(
				'label' => esc_html__( 'Description', 'plumbio-core' ),
				'type'  => Controls_Manager::TEXTAREA,
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
		$this->start_controls_section(
			'socoialinfo',
			array(
				'label' => esc_html__( 'Social Info', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'social_title',
			array(
				'label'   => esc_html__( 'Social Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'item_social_icon',
			array(
				'label' => esc_html__( 'Social Icon', 'plumbio-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);
		$repeater->add_control(
			'item_social_url',
			array(
				'label' => esc_html__( 'Social URL', 'plumbio-core' ),
				'type'  => Controls_Manager::URL,
			)
		);
		$this->add_control(
			'social_items',
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
		$settings     = $this->get_settings_for_display();
		$bg_image     = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];
		$bg_image_alt = get_post_meta( $settings['bg_image']['id'], '_wp_attachment_image_alt', true );
		$bg_title     = $settings['bg_title'];
		$tag_line     = $settings['tag_line'];
		$heading      = $settings['heading'];
		$sub_heading  = $settings['sub_heading'];
		$description  = $settings['description'];
		$form_title   = $settings['form_title'];
		$short_code   = $settings['short_code'];
		$social_title = $settings['social_title'];
		?> 

			<div class="section-inner bg-center-top lazyload" data-bg="<?php echo $bg_image; ?>">
				<div class="container container__tablet-fluid">
					<div class="row">
						<div class="col-md-5">
							<div class="blocktitle text-left">
								<div class="blocktitle__under"><?php echo $bg_title; ?></div>
								<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
								<div class="blocktitle__title"><?php echo $heading; ?></div>
							</div>
							<p class="tt-min-width-01">
								<strong class="tt-base-color"><?php echo $sub_heading; ?></strong>
							</p>
							<p class="tt-min-width-01">
								<?php echo $description; ?>
							</p>
							<ul class="tt-list04 tt-list04__top">
								<?php
								$i = 1;
								foreach ( $settings['items'] as $item ) {
									$item_icon        = $item['item_icon'];
									$item_title       = $item['item_title'];
									$item_description = $item['item_description'];
									?>
									 <li>
										<?php \Elementor\Icons_Manager::render_icon( ( $item_icon ), array( 'aria-hidden' => 'true' ) ); ?>
										<strong><?php echo $item_title; ?></strong>
										<?php echo $item_description; ?>
									</li> 
									<?php
									$i++;
								}
								?>
							</ul>
							<div class="tt-subtitle tt-subtitle__top"><?php echo $social_title; ?></div>
							<ul class="tt-icon-list">
							<?php
							foreach ( $settings['social_items'] as $item ) {
								$item_social_icon  = $item['item_social_icon']['value'];
								$item_url          = $item['item_social_url']['url'];
								$item_url_external = $item['item_social_url']['is_external'] ? 'target="_blank"' : '';
								$item_url_nofollow = $item['item_social_url']['nofollow'] ? 'rel="nofollow"' : '';
								?>
							<li><a href="<?php echo esc_url( $item_url ); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>><i class="<?php echo esc_attr( $item_social_icon ); ?>"></i></a></li>
							<?php } ?>
							</ul>
						</div>
						<div class="divider-noresponsive  tt-visible__mobile"></div>
						<div class="col-md-7">
							<div class="box-contact">
								<div class="tt-subtitle"><?php echo $form_title; ?></div>
								<?php echo do_shortcode( $short_code ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
	 
		
		<?php
	}


	protected function content_template() {
	}
}


