<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plumbio
 */


if ( function_exists( 'rwmb_meta' ) ) {
	$gallery = rwmb_meta( 'plumbio_theme_metabox_gallery', array( 'size' => 'full' ) );
}
?>
<div class="tt-post">
	<div class="tt-post__img">
	<?php
	if ( ! empty( $gallery ) ) {
		?>
		<div class="tt-slider">
			<div class="swiper-container lazyload"
				data-carousel="swiper"
				data-slides-sm="1"
				data-slides-md="1"
				data-slides-lg="1"
				data-slides-xl="1"
				data-slides-xxl="1"
				data-autoplay-Delay="5000">
				<div class="swiper-wrapper">
					<?php
					foreach ( $gallery as $single ) {
						?>
					<div class="swiper-slide">
						<a href="<?php esc_url( the_permalink() ); ?>">
							<picture>
								<img src="<?php echo esc_url( $single['url'] ); ?>" alt="<?php esc_attr_e( 'Post Gallery', 'plumbio' ); ?>">
							</picture>
						</a>
					</div>
					<?php } ?>
				</div>
				<div class="swiper-pagination  swiper-pagination-inner03"></div>
			</div>
		</div>
		<?php } else { ?>
			<div class="tt-img">
			<a href="<?php esc_url( the_permalink() ); ?>">
				<picture>
					<?php the_post_thumbnail( 'full' ); ?>
				</picture>
			</a>
		</div>
		<?php } ?>
	</div>
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
		<a href="<?php esc_url( the_permalink() ); ?>" class="tt-btn tt-btn__top"><span><?php esc_html_e( 'Read More', 'plumbio' ); ?></span></a>
	</div>
</div>
