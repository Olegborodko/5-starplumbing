<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plumbio
 */

$quote_text               = get_post_meta( get_the_id(), 'plumbio_theme_metabox_quote', true );
$quote_author_designation = get_post_meta( get_the_id(), 'plumbio_theme_metabox_quote_author_designation', true );
$quote_author_name        = get_post_meta( get_the_id(), 'plumbio_theme_metabox_quote_author', true );

?>
<div class="tt-post">
	<div class="tt-post__row">
		<div class="tt-post__data">
			<i class="tt-icon icon-9927001"></i> <?php plumbio_posted_on(); ?>
		</div>
		<div class="tt-post__info">
		<?php plumbio_posted_by(); ?> &nbsp;/&nbsp;  <?php plumbio_comments_count(); ?>
		</div>
	</div>
	<div class="tt-post__layout">
		<?php
		if ( is_sticky() ) {
			echo '<div class="sticky_post_icon " title="' . esc_attr__( 'Sticky Post', 'plumbio' ) . '"><i class="fa fa-map-pin"></i></div>';
		}
		?>
		<h2 class="tt-post__title"><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
		<?php
		if ( get_option( 'rss_use_excerpt' ) ) {
			the_excerpt();
		} else {
			the_excerpt();
		}
		?>
		<blockquote class="tt-blockquote02">
			<div class="tt-blockquote02__line">
				<p>
					<?php echo esc_html( $quote_text ); ?>
				</p>
				<p class="tt-blockquote02__notes">
					<strong class="tt-base-color tt-base-size">- <?php echo esc_html( $quote_author_name ); ?>,</strong> <?php echo esc_html( $quote_author_designation ); ?>
				</p>
			</div>
		</blockquote>
		<a href="<?php esc_url( the_permalink() ); ?>" class="tt-btn tt-btn__top"><span><?php esc_html_e( 'Read More', 'plumbio' ); ?></span></a>
	</div>
</div>
