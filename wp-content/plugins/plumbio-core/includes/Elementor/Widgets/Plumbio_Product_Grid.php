<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Widget_Base;

class Plumbio_Product_Grid extends Widget_Base {



	public function get_name() {
		return 'plumbio_product_grid';
	}

	public function get_title() {
		return esc_html__( 'Products Grid', 'plumbio-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'plumbio' );
	}

	private function grid_get_all_post_type_categories() {
		$options  = array();
		$taxonomy = 'product_cat';
		if ( ! empty( $taxonomy ) ) {
			$terms = get_terms(
				array(
					'taxonomy'   => $taxonomy,
					'hide_empty' => false,
				)
			);
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					if ( isset( $term ) ) {
						if ( isset( $term->slug ) && isset( $term->name ) ) {
							$options[ $term->slug ] = $term->name;
						}
					}
				}
			}
		}

		return $options;
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general_setting',
			array(
				'label' => esc_html__( 'General Settings', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'tagline',
			array(
				'label'   => esc_html__( 'Tagline', 'plumbio' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'our recommendation', 'plumbio' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'plumbio' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Related Products', 'plumbio' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_settings',
			array(
				'label' => esc_html__( 'Content Settings', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'product_grid_type',
			array(
				'label'   => esc_html__( 'Product Type', 'plumbio-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'recent_products',
				'options' => array(
					'featured_products'     => esc_html__( 'Featured Products', 'plumbio-core' ),
					'sale_products'         => esc_html__( 'Sale Products', 'plumbio-core' ),
					'best_selling_products' => esc_html__( 'Best Selling Products', 'plumbio-core' ),
					'recent_products'       => esc_html__( 'Recent Products', 'plumbio-core' ),
					'top_rated_products'    => esc_html__( 'Top Rated Products', 'plumbio-core' ),
					'product_category'      => esc_html__( 'Product Category', 'plumbio-core' ),
				),
			)
		);

		// Product categories.
		$this->add_control(
			'catagory_name',
			array(
				'type'      => \Elementor\Controls_Manager::SELECT,
				'label'     => esc_html__( 'Category', 'plumbio-core' ),
				'options'   => $this->grid_get_all_post_type_categories(),
				'condition' => array(
					'product_grid_type' => 'product_category',
				),
			)
		);

		$this->add_control(
			'product_per_page',
			array(
				'label'   => esc_html__( 'Number of Products', 'plumbio-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => esc_html__( 8, 'plumbio-core' ),
			)
		);

		$this->add_control(
			'product_order_by',
			array(
				'label'   => esc_html__( 'Order By', 'plumbio-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'          => esc_html__( 'Date', 'plumbio-core' ),
					'ID'            => esc_html__( 'ID', 'plumbio-core' ),
					'author'        => esc_html__( 'Author', 'plumbio-core' ),
					'title'         => esc_html__( 'Title', 'plumbio-core' ),
					'modified'      => esc_html__( 'Modified', 'plumbio-core' ),
					'rand'          => esc_html__( 'Random', 'plumbio-core' ),
					'comment_count' => esc_html__( 'Comment count', 'plumbio-core' ),
					'menu_order'    => esc_html__( 'Menu order', 'plumbio-core' ),
				),
			)
		);

		$this->add_control(
			'product_order',
			array(
				'label'   => esc_html__( 'Product Order', 'plumbio-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'plumbio-core' ),
					'ASC'  => esc_html__( 'ASC', 'plumbio-core' ),
				),
			)
		);

		$this->add_control(
			'extra_class',
			array(
				'label' => esc_html__( 'Extra Class', 'plumbio-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();

		$tagline = $settings['tagline'];
		$title   = $settings['title'];

		$product_grid_type = $settings['product_grid_type'];
		$product_per_page  = $settings['product_per_page'];
		$catagory_name     = $settings['catagory_name'];
		$product_order_by  = $settings['product_order_by'];
		$product_order     = $settings['product_order'];

		?>

<div class="section-indent woocommerce">
	<div class="container container__tablet-fluid">
			<?php if ( ! empty( $tagline ) || ! empty( $title ) ) { ?>
			<div class="blocktitle text-left">
				<div class="blocktitle__subtitle"><?php echo $tagline; ?></div>
				<div class="blocktitle__title"><?php echo $title; ?></div>
			</div>
			<?php } ?>

			<div class="swiper-container four-items-slider"
				data-carousel="swiper"
				data-space-between="30"
				data-slides-xxl="4"
				data-slides-xl="4"
				data-slides-lg="4"
				data-slides-md="3"
				data-slides-sm="2">
				<div class="swiper-wrapper">
					<!-- Slides -->
			<?php
			if ( $product_grid_type == 'sale_products' ) {
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => $product_per_page,
					'meta_query'     => array(
						'relation' => 'OR',
						array(// Simple products type
							'key'     => '_sale_price',
							'value'   => 0,
							'compare' => '>',
							'type'    => 'numeric',
						),
						array(// Variable products type
							'key'     => '_min_variation_sale_price',
							'value'   => 0,
							'compare' => '>',
							'type'    => 'numeric',
						),
					),
					'orderby'        => $product_order_by,
					'order'          => $product_order,
				);
			}
			if ( $product_grid_type == 'best_selling_products' ) {
				$args = array(
					'post_type'      => 'product',
					'meta_key'       => 'total_sales',
					'orderby'        => 'meta_value_num',
					'posts_per_page' => $product_per_page,
					'order'          => $product_order,
				);
			}
			if ( $product_grid_type == 'recent_products' ) {
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => $product_per_page,
					'orderby'        => $product_order_by,
					'order'          => $product_order,
				);
			}
			if ( $product_grid_type == 'featured_products' ) {
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => $product_per_page,
					'tax_query'      => array(
						array(
							'taxonomy' => 'product_visibility',
							'field'    => 'name',
							'terms'    => 'featured',
						),
					),
					'orderby'        => $product_order_by,
					'order'          => $product_order,
				);

			}
			if ( $product_grid_type == 'top_rated_products' ) {
				$args = array(
					'posts_per_page' => $product_per_page,
					'no_found_rows'  => 1,
					'post_status'    => 'publish',
					'post_type'      => 'product',
					'meta_key'       => '_wc_average_rating',
					'orderby'        => $product_order_by,
					'order'          => $product_order,
					'meta_query'     => WC()->query->get_meta_query(),
					'tax_query'      => WC()->query->get_tax_query(),
				);
			}

			if ( $product_grid_type == 'product_category' ) {
				$args = array(
					'post_type'      => 'product',
					'posts_per_page' => $product_per_page,
					'product_cat'    => $catagory_name,
					'orderby'        => $product_order_by,
					'order'          => $product_order,
				);
			}

			$loop = new \WP_Query( $args );

			if ( $loop->have_posts() ) {
				?>
				<?php
				while ( $loop->have_posts() ) :
					$loop->the_post();
					if ( class_exists( 'WooCommerce' ) ) {
						?>
						
						<?php
							wc_get_template_part( 'content-product', 'grid' );
						?>
						<?php
					} else {
						echo __( '<p class="text-center">WooCommerce Not Active.</p>', 'plumbio-core' );
					}
				endwhile;
				?>
				<?php
			} else {
				echo __( '<p class="text-center">No products found.</p>', 'plumbio-core' );
			}
			wp_reset_query();
			?>
		</div>
		<div class="swiper-pagination  swiper-pagination__center"></div>
		</div>
	</div>
</div>
			<?php
	}

	protected function content_template() {

	}

}
