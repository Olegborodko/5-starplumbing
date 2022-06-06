<?php
/**
 * Template part for displaying posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plumbio
 */

$blog_single_social = plumbio_get_options( 'blog_single_social' );
?>
<?php
if ( has_post_thumbnail() ) {
	$class = '';
} else {
	$class = 'no-post-thumbnail';
}
?>
<div class="tt-singlepost blog-details-content">
	<div class="tt-post <?php echo esc_attr( $class ); ?>">
		<?php
		plumbio_post_thumbnail();
		?>
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
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links post-single-link">',
				'after'  => '</div>',
			)
		);
		?>
		</div>
	</div>
</div>
<?php if ( has_tag() || $blog_single_social == '1' ) : ?>
<div class="blog-single__meta">
	<?php if ( has_tag() ) : ?>
	<div class="tt-col">
		<div class="tt-col__label"><?php esc_html_e( 'Tags:', 'plumbio' ); ?></div>
		<ul class="tt-list02">
			<li><?php plumbio_tag_list(); ?></li>
		</ul>
	</div>
		<?php endif; ?>
	<?php if ( $blog_single_social == '1' ) : ?>
	<div class="tt-col">
		<div class="tt-col__label"><?php esc_html_e( 'Share:', 'plumbio' ); ?></div>
		<ul class="tt-icon-list-02">
			<?php
				do_action( 'plumbio_blog_social' );
			?>
		</ul>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php
do_action( 'plumbio_author_box' );

if ( comments_open() || get_comments_number() ) :
	?>
		<div class="blog-details-bottom-content blog-details-content">
		<?php
			comments_template();
		?>
		</div>
	<?php
	endif;
?>
