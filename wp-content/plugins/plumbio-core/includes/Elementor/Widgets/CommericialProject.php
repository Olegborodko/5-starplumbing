<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class CommericialProject extends Widget_Base {


	public function get_name() {
		return 'commericial_project';
	}

	public function get_title() {
		return esc_html__( 'Gallery Project Template', 'plumbio-core' );
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
			'item_image',
			array(
				'label'   => esc_html__( 'Image', 'plumbio-core' ),
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
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		?> 
		<div class="row tt-gallery__wrapper">


			<?php
			$i = 1;
			foreach ( $settings['items'] as $item ) {
				$item_title     = $item['item_title'];
				$item_image     = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
				$item_image_url = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
				$item_image_alt = get_post_meta( $item['item_image']['id'], '_wp_attachment_image_alt', true );
				?>
			 
				<div class="col-6 col-md-4">
					<a href="<?php echo $item_image_url; ?>" class="tt-gallery glightbox">
						<div class="tt-gallery__img">
							<picture>
								<?php
								if ( wp_http_validate_url( $item_image ) ) {
									?>
											<img src="<?php echo esc_url( $item_image ); ?>" alt="<?php esc_url( $item_image_alt ); ?>">
										<?php
								} else {
									echo $item_image;
								}
								?>
							</picture>
							<div class="tt-gallery__icon icon-2089805"></div>
						</div>
						<div class="tt-gallery__title">
							<?php echo $item_title; ?>
						</div>
					</a>
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
