<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plumbio
 */

$link_title = get_post_meta( get_the_id(), 'plumbio_theme_metabox_link_title', true );

?>
<div class="tt-post">
	<?php if ( has_post_thumbnail() ) { ?>
	<div class="tt-post__img">
		<div class="tt-img">
				<picture>
					<?php the_post_thumbnail( 'full' ); ?>
				</picture>
				<div class="tt-point tt-post__imglink__bg">
					<a class="tt-post__imglink" href="<?php esc_url( the_permalink() ); ?>">
						<div class="tt-icon"><i class="icon-2919521"></i></div>
						<div class="tt-text"><?php echo esc_html( $link_title ); ?></div>
					</a>
				</div>
		</div>
	</div>
	<?php } ?>
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
