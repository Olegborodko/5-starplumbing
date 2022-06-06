<?php
namespace Plumbio\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Core\Schemes;
use Plumbio\Helper\Elementor\Settings\Header;

class PlumbioBlog extends Widget_Base {

	public function get_name() {
		return 'plumbio_blog';
	}

	public function get_title() {
		return esc_html__( 'Plumbio Blog', 'plumbio-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'plumbio' );
	}

	private function get_blog_categories() {
		$options  = array();
		$taxonomy = 'category';
		if ( ! empty( $taxonomy ) ) {
			$terms = get_terms(
				array(
					'parent'     => 0,
					'taxonomy'   => $taxonomy,
					'hide_empty' => false,
				)
			);
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					if ( isset( $term ) ) {
						$options[''] = 'Select';
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
			'general',
			array(
				'label' => esc_html__( 'Left Blog', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'placeholder',
			array(
				'label'       => esc_html__( 'Placeholder Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'tagline',
			array(
				'label'       => esc_html__( 'Tagline', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'News & Events', 'plumbio-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => esc_html__( 'Title', 'plumbio-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Latest Blog Posts', 'plumbio-core' ),
			)
		);
		$this->add_control(
			'html_tag',
			array(
				'label'   => esc_html__( 'Html Tag', 'visarzo-core' ),
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
				'default' => 'h6',

			)
		);

		$this->add_control(
			'category_id',
			array(
				'type'        => \Elementor\Controls_Manager::SELECT2,
				'label'       => esc_html__( 'Category', 'plumbio-core' ),
				'options'     => $this->get_blog_categories(),
				'multiple'    => true,
				'label_block' => true,
			)
		);

		$this->add_control(
			'posts_per_page',
			array(
				'label'   => esc_html__( 'Number of Post', 'plumbio-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
			)
		);

		$this->add_control(
			'order_by',
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
			'order',
			array(
				'label'   => esc_html__( 'Order', 'plumbio-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => array(
					'desc' => esc_html__( 'DESC', 'plumbio-core' ),
					'asc'  => esc_html__( 'ASC', 'plumbio-core' ),
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'text_style_section',
			array(
				'label' => __( 'Text Style', 'plumbio-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Typography', 'plumbio-core' ),
				'scheme'   => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blocktitle__title',
			)
		);
		$this->end_controls_section();
	}
	protected function render() {
		$settings    = $this->get_settings_for_display();
		$placeholder = $settings['placeholder'];
		$tagline     = $settings['tagline'];
		$title       = $settings['title'];
		if ( $settings['category_id'] ) {
			$category_arr = implode( ', ', $settings['category_id'] );
		} else {
			$category_arr = $settings['category_id'];
		}

		$posts_per_page = $settings['posts_per_page'];
		$order_by       = $settings['order_by'];
		$order          = $settings['order'];
		$html_tag       = $settings['html_tag'];
		$pg_num         = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$args           = array(
			'post_type'      => array( 'post' ),
			'post_status'    => array( 'publish' ),
			'nopaging'       => false,
			'paged'          => $pg_num,
			'posts_per_page' => $posts_per_page,
			'category_name'  => $category_arr,
			'orderby'        => $order_by,
			'order'          => $order,
		);

		$query = new \WP_Query( $args );

		?>

<div class="section-wrapper">
	<div class="section-inner">
		<div class="container container__fluid-lg">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-4">
					<div class="blocktitle text-left">
						<div class="tt-color-white blocktitle__under blocktitle__under-align"><?php echo $placeholder; ?></div>
						<div class="blocktitle__subtitle"><?php echo $tagline; ?></div>
						<<?php echo $html_tag; ?> class="blocktitle__title"><?php echo $title; ?></<?php echo $html_tag; ?>>
					</div>
					<div class="tt-news01__wrapper">
					<?php
						$i = 0;
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$i++;
							$query->the_post();
							global $post;
							$tags = wp_get_post_categories( get_the_ID() );

							$excerpt = get_the_excerpt();

							$excerpt   = substr( $excerpt, 0, 70 );
							$result    = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
							$hideclass = '';
							if ( $i == 2 ) {
								$hideclass = 'tt-hide__mobile-small';
							}
							if ( $i < 3 ) {
								?>
						<div class="tt-news01__item <?php echo $hideclass; ?>">
							<div class="tt-news01__row">
								<div class="tt-news01__time"><i class="tt-icon icon-9927001"></i> <?php plumbio_posted_on(); ?></div>
								<div class="tt-news01__info"><?php echo esc_html__( 'by', 'plumbio-core' ); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>  /  <span class="tt-nowrap"><?php plumbio_comments_count(); ?></span></div>
							</div>
							<div class="tt-news01__title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></div>
								<?php echo $result; ?>
						</div>
								<?php
							}
						}
						wp_reset_postdata();
					}
					?>
					</div>
				</div>
				<div class="divider tt-visible__mobile-sm"></div>
				<div class="col-sm-6 col-md-6 col-lg-8 js-align-layout">
					<div class="swiper-container two-items-slider"
						data-carousel="swiper"
						data-autoplay-delay="4500"
						data-space-between="30"
						data-slides-xxl="2"
						data-slides-xl="2"
						data-slides-lg="1"
						data-slides-md="1"
						data-slides-sm="1">
						<div class="swiper-wrapper">	
						<?php
						$i = 0;
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$i++;
								$query->the_post();
								global $post;
								$tags = wp_get_post_categories( get_the_ID() );

								$excerpt = get_the_excerpt();

								$excerpt = substr( $excerpt, 0, 70 );
								$result  = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
								if ( $i > 2 ) {
									?>
							<div class="swiper-slide">
								<div class="tt-news02">
									<?php if ( has_post_thumbnail() ) : ?>
									<div class="tt-news02__img">
										<a href="<?php echo esc_url( get_permalink() ); ?>">
											<picture>
											<?php the_post_thumbnail( 'plumbio-blog-grid' ); ?>
											</picture>
										</a>
									</div>
									<?php endif; ?>
									<div class="tt-news02__description js-align-layout__item">
										<div class="tt-news02__data icon-694055">
											<div class="tt-text01"><?php echo get_the_date( 'M' ); ?></div>
											<div class="tt-text02"><?php echo get_the_date( 'd' ); ?></div>
										</div>
										<div class="tt-news02__info"><?php echo esc_html__( 'by', 'plumbio-core' ); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>  /  <span class="tt-nowrap"><?php plumbio_comments_count(); ?></span></div>
										<div class="tt-news02__title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></div>
										<p>
										<?php echo $result; ?>...
										</p>
										<a href="<?php echo esc_url( get_permalink() ); ?>" class="tt-news02__extra-link icon-545682"></a>
									</div>
								</div>
							</div>
									<?php
								}
							}
							wp_reset_postdata();
						}
						?>
						</div>
						<div class="swiper-pagination"></div>
					</div>
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
