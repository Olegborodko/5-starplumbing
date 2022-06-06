<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Plumbio_About extends Widget_Base {


	public function get_name() {
		return 'about';
	}

	public function get_title() {
		return esc_html__( 'Plumbio About', 'plumbio-core' );
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
			'image1',
			array(
				'label'   => esc_html__( 'Image1', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'image2',
			array(
				'label'   => esc_html__( 'Image2', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'tag_line',
			array(
				'label'   => esc_html__( 'Tag Line', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
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
			'title',
			array(
				'label'   => esc_html__( 'Title', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
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
			'author_signature',
			array(
				'label'   => esc_html__( 'Author Signature', 'plumbio-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'author_designation',
			array(
				'label'   => esc_html__( 'Author Designation', 'plumbio-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'plumbio-core' ),
			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings       = $this->get_settings_for_display();
		$image1         = ( $settings['image1']['id'] != '' ) ? wp_get_attachment_image( $settings['image1']['id'], 'full' ) : $settings['image1']['url'];
		$image1_alt     = get_post_meta( $settings['image1']['id'], '_wp_attachment_image_alt', true );
		$item_image_url = ( $settings['image1']['id'] != '' ) ? wp_get_attachment_image_url( $settings['image1']['id'], 'full' ) : $settings['image1']['url'];

		$image2          = ( $settings['image2']['id'] != '' ) ? wp_get_attachment_image( $settings['image2']['id'], 'full' ) : $settings['image2']['url'];
		$image2_alt      = get_post_meta( $settings['image2']['id'], '_wp_attachment_image_alt', true );
		$item_image_url2 = ( $settings['image2']['id'] != '' ) ? wp_get_attachment_image_url( $settings['image2']['id'], 'full' ) : $settings['image2']['url'];

		$tag_line             = $settings['tag_line'];
		$heading              = $settings['heading'];
		$title                = $settings['title'];
		$description          = $settings['description'];
		$author_signature     = ( $settings['author_signature']['id'] != '' ) ? wp_get_attachment_image( $settings['author_signature']['id'], 'full' ) : $settings['author_signature']['url'];
		$author_signature_alt = get_post_meta( $settings['author_signature']['id'], '_wp_attachment_image_alt', true );
		$author_designation   = $settings['author_designation'];
		?>
			<div class="section-indent">
				<div class="container container__fluid-lg">
					<div class="row layout01">

						<div class="col-sm-6 col-md-5 col-lg-6">
							<div class="layout01__img">
								<picture class="layout01__img-main">
								   
									 <source srcset="<?php echo $item_image_url; ?>" data-srcset="<?php echo $item_image_url; ?>" type="image/jpg">
									<?php
									if ( wp_http_validate_url( $image1 ) ) {
										?>
										<img src="<?php echo esc_url( $image1 ); ?>" alt="<?php esc_url( $image1_alt ); ?>">
										<?php
									} else {
										echo $image1;
									}
									?>
								</picture>
								<picture class="layout01__img-additional p-b-l">
								   
								<source srcset="<?php echo $item_image_url2; ?>" data-srcset="<?php echo $item_image_url2; ?>" type="image/jpg">
									<?php
									if ( wp_http_validate_url( $image2 ) ) {
										?>
										<img src="<?php echo esc_url( $image2 ); ?>" alt="<?php esc_url( $image2_alt ); ?>">
										<?php
									} else {
										echo $image2;
									}
									?>
								</picture>
							</div>
						</div>
						<div class="layout01__content col-sm-6 col-md-7 col-lg-6">
							<div class="blocktitle text-left">
								<div class="blocktitle__subtitle"><?php echo $tag_line; ?></div>
								<h3 class="blocktitle__title"><?php echo $heading; ?></h3>
							</div>
							<p>
								<strong class="tt-base-color">
									<?php echo $title; ?>
								</strong>
							</p>
							<p>
								<?php echo $description; ?>
							</p>
							<div class="tt-signature tt-signature__top">
								<div class="tt-signature__img">
								<?php
								if ( wp_http_validate_url( $author_signature ) ) {
									?>
										<img src="<?php echo esc_url( $author_signature ); ?>" alt="<?php esc_url( $author_signature_alt ); ?>">
									<?php
								} else {
									echo $author_signature;
								}
								?>
								</div>
								<div class="tt-signature__title"><?php echo $author_designation; ?></div>
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


