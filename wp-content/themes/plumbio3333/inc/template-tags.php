<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package plumbio
 */

if ( ! function_exists( 'plumbio_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function plumbio_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'plumbio' ),
			'' . $time_string . ''
		);

		echo '' . $posted_on . '';

	}
endif;

if ( ! function_exists( 'plumbio_category_list' ) ) :

	function plumbio_category_list() {
		if ( 'post' === get_post_type() ) {
			$category_list = get_the_category_list( esc_html__( ' ', 'plumbio' ) );
			if ( $category_list ) {
				?>
					<div class="category">
						<?php
							printf( $category_list ); // WPCS: XSS OK.
						?>
					</div>
				<?php
			}
		}
	}

endif;

if ( ! function_exists( 'plumbio_tag_list' ) ) :

	function plumbio_tag_list() {
		if ( 'post' === get_post_type() ) {
			$tag_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'plumbio' ) );
			if ( $tag_list ) {
				printf( $tag_list ); // WPCS: XSS OK.
			}
		}
	}

endif;


if ( ! function_exists( 'plumbio_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function plumbio_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'plumbio' ),
			'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
		);
		echo esc_html__( 'by ', 'plumbio' ) . $byline; // WPCS: XSS OK.

	}
endif;


if ( ! function_exists( 'plumbio_comments_count' ) ) :

	function plumbio_comments_count() {
		if ( get_comments_number( get_the_ID() ) == 0 ) {
			$comments_count = get_comments_number( get_the_ID() ) . esc_html_e( 'Comment', 'plumbio' );
		} elseif ( get_comments_number( get_the_ID() ) > 1 ) {
			$comments_count = get_comments_number( get_the_ID() ) . esc_html_e( 'Comments', 'plumbio' );
		} else {
			$comments_count = get_comments_number( get_the_ID() ) . esc_html_e( 'Comment', 'plumbio' );
		}
		echo sprintf( esc_html( '%s' ), $comments_count ); // WPCS: XSS OK.
	}

endif;



if ( ! function_exists( 'plumbio_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function plumbio_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		$img_url = get_the_post_thumbnail_url( '', 'post-thumbnail' );
		?>
		<div class="tt-post__img">
			<div class="tt-img">
				<a href="<?php esc_url( the_permalink() ); ?>">
					<picture>
						<source srcset="<?php echo esc_url( $img_url ); ?>" type="image/jpg">
						<?php
						the_post_thumbnail(
							'post-thumbnail',
							array(
								'alt' => the_title_attribute(
									array(
										'echo' => false,
									)
								),
							)
						);
						?>
					</picture>
				</a>
			</div>
		</div>
		<?php
	}
endif;




if ( ! function_exists( 'plumbio_comments' ) ) {

	function plumbio_comments( $comment, $args, $depth ) {
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
		$comment_class_ping = 'yes-ping';
		if ( $comment->comment_type != 'trackback' && $comment->comment_type != 'pingback' ) :
			$comment_class_ping = '';
		endif;
		?>
		<div class="tt-comment-item <?php echo esc_attr( $comment_class_ping ); ?>" id="comment-<?php comment_ID(); ?>">	
			<div class="tt-comments__level-01 tt-comments">	
				<?php if ( $comment->comment_type != 'trackback' && $comment->comment_type != 'pingback' ) { ?>
					<div class="tt-comments__avatar">
					<?php print get_avatar( $comment, 86, null, null, array( 'class' => array() ) ); ?>
					</div>
				<?php } ?>
				<div class="tt-comments__content">
					<?php
						$replyBtn = 'tt-comments__btn';
						echo preg_replace(
							'/comment-reply-link/',
							'comment-reply-link thm_clr1 ' . $replyBtn,
							get_comment_reply_link(
								array_merge(
									$args,
									array(
										'reply_text' => '<span>' . esc_html__( 'Reply', 'plumbio' ) . '</span>',
										'depth'      => $depth,
										'max_depth'  => $args['max_depth'],
									)
								)
							),
							1
						);
					?>
					<div class="tt-comments__title"><?php echo get_comment_author_link(); ?></div>
					<div class="tt-comments__info"><?php echo get_the_date( 'F j, Y' ) . esc_html__( ' at ', 'plumbio' ) . get_the_date( 'g:i a' ); ?></div>
					<div class="tt-comments__text">
						<?php comment_text(); ?>
					</div>
				</div>
			</div>
	
		<?php
	}
}
