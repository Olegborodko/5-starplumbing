<?php
// Woocommerce Single Page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_product_thumbnail', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_filter( 'woocommerce_quantity_input_max', 'plumbio_quantity_input_max_callback', 10, 2 );
function plumbio_quantity_input_max_callback( $max ) {
	$max = 1000;
	return $max;
}




add_action( 'woocommerce_before_single_product_summary', 'plumbio_before_single_product_summery', 10 );
function plumbio_before_single_product_summery() {
	?>
	<div class="section-indent">
		<div class="container container__tablet-fluid">
				<div class="row">
	<?php
}


add_action( 'woocommerce_after_single_product_summary', 'plumbio_after_single_product_summery', 10 );
function plumbio_after_single_product_summery() {
	?>
		
			</div>
		</div>
	</div>

	<div class="section-indent-small section-inner">
		<div class="container container__tablet-fluid">
				<?php
				woocommerce_output_product_data_tabs();
				?>
		</div>
	</div>
	<?php
}


add_action( 'woocommerce_single_product_summary', 'plumbio_template_single_title', 5 );
function plumbio_template_single_title() {
	global $product;
	$rating_count = $product->get_rating_count();
	?>
	<h1 class="product-single___title"><?php the_title(); ?></h1>
	<div class="product-single___price"><?php echo wp_kses( $product->get_price_html(), 'code_contxt' ); ?></div>
	<?php
	if ( $rating_count > 0 ) {
		?>
	<div class="tt-rating__wrapper">
		<div class="tt-rating">
			<?php woocommerce_template_single_rating(); ?>
		</div>
	</div>
	<?php } ?>
	<div class="product-single__indent">
	<?php the_excerpt(); ?>
	</div>
	<div class="product-single__indent">
	<?php woocommerce_template_single_add_to_cart(); ?>
	</div>
	<div class="tproduct-single__indent"><?php esc_attr_e( 'SKU:', 'plumbio' ); ?> <?php echo esc_html( $product->get_sku() ); ?></div>
	<?php

}




add_action( 'woocommerce_after_single_product_summary', 'plumbio_related_after_single_product_summary', 10 );
function plumbio_related_after_single_product_summary() {
	?>
	<?php
	global $product;
	$related = wc_get_related_products( $product->get_id() );
	?>
	<?php
	if ( count( $related ) > 0 ) {
		?>
		<div class="section-inner related_products">
			<div class="container container__tablet-fluid">
				<div class="blocktitle text-left"><div class="blocktitle__subtitle"><?php esc_html_e( 'our recommendation', 'plumbio' ); ?></div><div class="blocktitle__title"><?php esc_html_e( 'Related Products', 'plumbio' ); ?></div></div>
				<div class="swiper-container"
					data-carousel="swiper"
					data-space-between="30"
					data-slides-xxl="4"
					data-slides-xl="4"
					data-slides-lg="4"
					data-slides-md="3"
					data-slides-sm="2">
					<div class="swiper-wrapper">
					<?php plumbio_output_related_products(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

	<?php
}

add_filter( 'woocommerce_output_related_products', 'plumbio_output_related_products', 10, 1 );

function plumbio_output_related_products() {
	global $product;

	$related_products = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), 10, $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );
	?>
	<?php foreach ( $related_products as $related_product ) : ?>
		<div class="swiper-slide">
		<?php
		$post_object = get_post( $related_product->get_id() );
		setup_postdata( $GLOBALS['post'] =& $post_object );
		wc_get_template_part( 'content', 'product' );
		?>
		</div>
	<?php endforeach; ?>

	<?php
}



add_action( 'woocommerce_after_single_product', 'plumbio_woocommerce_after_single_product', 20 );

function plumbio_woocommerce_after_single_product() {
	?>
	<?php
}


if ( ! function_exists( 'plumbio_product_comments' ) ) {

	function plumbio_product_comments( $comment, $args, $depth ) {
		extract( $args, EXTR_SKIP );
		$args['reply_text'] = esc_html__( 'Reply', 'plumbio' );
		$class              = '';
		if ( $depth > 1 ) {
			$class = '';
		}
		if ( $depth == 1 ) {
			$child_html_el     = '<ul><li>';
			$child_html_end_el = '</li></ul>';
		}

		if ( $depth >= 2 ) {
			$child_html_el     = '<li>';
			$child_html_end_el = '</li>';
		}

		global $comment;
		$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
		?>
		<div class="comment" id="comment-<?php comment_ID(); ?>">
			<figure class="customer-thumb">
		<?php print get_avatar( $comment, 115, null, null, array( 'class' => array() ) ); ?>
			</figure>
			<div class="info clearfix">
				<h4><?php echo get_comment_author_link(); ?>,</h4>
				<span><?php echo get_comment_date(); ?></span>
			</div>
			<div class="rating clearfix">
				<?php
				if ( $rating && wc_review_ratings_enabled() ) {
					echo wc_get_rating_html( $rating ); // WPCS: XSS ok.
				}
				?>
			</div>
			<?php comment_text(); ?>
		</div>
		<?php
	}
}
