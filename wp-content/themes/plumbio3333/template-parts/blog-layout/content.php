<?php
if ( has_post_thumbnail() ) {
	$class = '';
} else {
	$class = 'no-post-thumbnail';
}
?>
<div class="tt-post <?php echo esc_attr( $class ); ?>">
	<?php plumbio_post_thumbnail(); ?>
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
			echo '<div class="sticky_post_icon " title="' . esc_attr__( 'Sticky Post', 'plumbio' ) . '"><span class="dashicons dashicons-admin-post"></span></div>';
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
