<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews tt-tabs-reviews">
		<div id="comments" >

			<?php if ( have_comments() ) : ?>
				<div class="customer-comment">
					<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'plumbio_product_comments' ) ) ); ?>
				</div>

				<?php
				if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
					echo '<nav class="woocommerce-pagination">';
					paginate_comments_links(
						apply_filters(
							'woocommerce_comment_pagination_args',
							array(
								'prev_text' => '&larr;',
								'next_text' => '&rarr;',
								'type'      => 'div',
							)
						)
					);
					echo '</nav>';
				endif;
				?>
			<?php else : ?>
				<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'plumbio' ); ?></p>
			<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper" class="replay-inner">
			<div id="review_form" class="replay-form form-default">
				<?php
				$commenter    = wp_get_current_commenter();
				$comment_form = array(
					/* translators: %s is product title */
					'title_reply'         => have_comments() ? esc_html__( 'Customer Reviews', 'plumbio' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'plumbio' ), get_the_title() ),
					/* translators: %s is product title */
					'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'plumbio' ),
					'title_reply_before'  => '<h5 class="tt-form__title">',
					'title_reply_after'   => '</h5>',
					'comment_notes_after' => '',
					'submit_field'        => '<div class="tt-form__btn">%1$s %2$s</div>',
					'label_submit'        => esc_html__( 'SEND REVIEW ', 'plumbio' ),
					'submit_button'       => '<button type="submit" name="%1$s" id="%2$s" class="%3$s tt-btn02"><span>%4$s</span></button>',
					'logged_in_as'        => '',
					'comment_field'       => '',
				);

				$name_email_required = (bool) get_option( 'require_name_email', 1 );
				$fields              = array(
					'author' => array(
						'label'       => __( 'Your name', 'plumbio' ),
						'placeholder' => __( 'Your name', 'plumbio' ),
						'type'        => 'text',
						'value'       => $commenter['comment_author'],
						'required'    => $name_email_required,
					),
					'email'  => array(
						'label'       => __( 'Email', 'plumbio' ),
						'placeholder' => __( 'E-Mail', 'plumbio' ),
						'type'        => 'email',
						'value'       => $commenter['comment_author_email'],
						'required'    => $name_email_required,
					),
				);

				$comment_form['fields'] = array();

				foreach ( $fields as $key => $field ) {
					$field_html = '<div class="comment-form-' . esc_attr( $key ) . ' tt-form__group">';

					$field_html .= '<input class="tt-form__control" placeholder=  ' . esc_attr( $field['placeholder'] ) . ' id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="" ' . ( $field['required'] ? 'required' : '' ) . ' /></div>';

					$comment_form['fields'][ $key ] = $field_html;
				}


				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'plumbio' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
				}

				if ( wc_review_ratings_enabled() ) {
					$comment_form['comment_field'] = '<div class="comment-form-rating review-box clearfix tt-form__group"><label class="control-label" for="rating">' . esc_html__( 'Your rating', 'plumbio' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" class="tt-form__control" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'plumbio' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'plumbio' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'plumbio' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'plumbio' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'plumbio' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'plumbio' ) . '</option>
					</select></div>';
				}

				$comment_form['comment_field'] .= '<div class="comment-form-comment tt-form__group"> <textarea class="tt-form__control" rows="5" id="comment" name="comment" placeholder="' . esc_attr__( 'Your review', 'plumbio' ) . '" required></textarea></div>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'plumbio' ); ?></p>
	<?php endif; ?>

	<div class="clear"></div>
</div>
