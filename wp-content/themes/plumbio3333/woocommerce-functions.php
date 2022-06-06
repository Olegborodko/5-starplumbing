<?php
// remove default woo hooks
add_action( 'init', 'plumbio_remove_hooks_woocommerce' );
function plumbio_remove_hooks_woocommerce() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar' );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

}

// remove default woo hooks

add_filter( 'woocommerce_template_loop_price', '__return_false' );
add_filter( 'woocommerce_show_page_title', '__return_false' );

add_filter( 'woocommerce_template_loop_product_title', '__return_false' );


add_filter( 'woocommerce_sale_flash', 'plumbio_custom_hide_sales_flash' );
function plumbio_custom_hide_sales_flash() {
	return false;
}

add_action( 'woocommerce_before_shop_loop', 'plumbio_before_shop_loop' );
function plumbio_before_shop_loop() {     ?>
<div class="section-inner">
	<div class="container container__tablet-fluid">
		<div class="row">
			<?php if ( is_active_sidebar( 'woo_sideber' ) ) { ?>
			<div class="col-md-4 col-lg-4 col-xl-3 leftColumn aside toggle__aside" id="js-toggle__aside">
				<div class="toggle__aside-cloe icon-748122" id="js-aside-close"></div>
				<?php
				dynamic_sidebar( 'woo_sideber' );
				?>
			</div>
			<?php } ?>
			<?php if ( is_active_sidebar( 'woo_sideber' ) ) { ?>
			<div class="col-lg-8 col-xl-9">
			<?php } else { ?>
				<div class="col-lg-12 col-xl-12">
			<?php } ?>
				<div class="tt-filters">
					<div class="tt-col tt-filters__toggle-parent">
						<div class="tt-filters__toggle" id="js-toggle__btn">
							<div class="tt-icon icon-icon-filter"></div>
							<div class="tt-text"><?php esc_html_e( 'Filter', 'plumbio' ); ?></div>
						</div>
					</div>
					<div class="tt-col tt-select-parent">
						<div class="tt-select custom-select">
						<?php woocommerce_catalog_ordering(); ?>
						</div>
					</div>
					<div class="tt-col tt-filters__info-parent tt-visible__descktop">
						<div class="tt-filters__info">
						<?php woocommerce_result_count(); ?>
						</div>
					</div>
				</div>
	<?php
}

add_action( 'woocommerce_after_shop_loop', 'plumbio_after_shop_loop' );
function plumbio_after_shop_loop() {
		$pagination_blog = get_the_posts_pagination();
	if ( $pagination_blog ) :
		?>
			<div class="tt-pagination tt-pagination__top">
			<?php
			the_posts_pagination(
				array(
					'type'      => 'list',
					'mid_size'  => 4,
					'prev_text' => '<span class="icon-545682"></span>',
					'next_text' => '<span class="icon-545682"></span>',
				)
			);
			?>
			</div>
		<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
}

add_action( 'woocommerce_before_shop_loop_item_title', 'plumbio_before_shop_loop_item_title_new' );

function plumbio_before_shop_loop_item_title_new() {
	global $product;

	if ( method_exists( $product, 'get_id' ) ) {
		$product_id = $product->get_id();
	} else {
		$product_id = $product->id;
	}
	global $product;
	$attachment_ids[0] = get_post_thumbnail_id( $product->get_id() );
	$attachment        = wp_get_attachment_image_src( $attachment_ids[0], 'full' );
	$link2             = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
	$cart_class        = apply_filters( 'plumbio_loop_product_cart', 'btn-addtocart' );
	?>
		<div class="tt-product">
			<div class="tt-product__img">
				<a href="<?php echo esc_url( $link2 ); ?>" class="tt-img">
					<picture>
						<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARgAAAFeAQMAAABkQZK+AAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAACJJREFUaN7twQENAAAAwiD7p7bHBwwAAAAAAAAAAAAAACDqMTgAAXbCiqsAAAAASUVORK5CYII=" data-src="<?php echo esc_url( $attachment[0] ); ?>" class="lazyload" alt="<?php esc_attr_e( 'Product', 'plumbio' ); ?>">
					</picture>
					<div class="<?php echo esc_attr( $cart_class ); ?>"><?php esc_html_e( 'Add to Cart', 'plumbio' ); ?></div>
				</a>
				<?php if ( $product->is_on_sale() ) { ?>
				<div class="tt-label-location">
					<div class="tt-label-new"><?php esc_html_e( 'SALE', 'plumbio' ); ?></div>
				</div>
				<?php } ?>
			</div>
			<div class="tt-product__description">
	<?php
}

add_action( 'woocommerce_after_shop_loop_item_title', 'plumbio_after_shop_loop_item_title_new' );

function plumbio_after_shop_loop_item_title_new() {
	global $product;
	$link3 = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
	$title = apply_filters( 'woocommerce_loop_product_title', get_the_title(), $product );
	?>
		<h2 class="tt-product__title"><a href="<?php echo esc_url( $link3 ); ?>"><?php echo esc_html( $title ); ?></a></h2>
		<?php if ( $product->get_average_rating() ) : ?>
			<div class="tt-rating">
			<?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
			</div>
		<?php endif; ?>
		<?php if ( $price_html = $product->get_price_html() ) : ?>
			<div class="tt-product__price">
			<?php echo wp_kses( $price_html, 'code_contxt' ); ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
	<?php
}

