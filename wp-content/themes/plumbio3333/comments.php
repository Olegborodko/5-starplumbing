<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plumbio
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
	<?php
		// You can start editing here -- including this comment!
	if ( have_comments() ) :
		$comment_close = '';
		if ( ! comments_open() ) :
			$comment_close = 'comment-close';
			endif;
		?>
			<div id="comments-area" class="comments-area singlepost__block-top <?php echo esc_attr( $comment_close ); ?>">
				<div class="singlepost__title">
					<?php
						$plumbio_comment_count = get_comments_number();
					if ( '1' === $plumbio_comment_count ) {
						printf(
								/* translators: 1: title. */
							esc_html__( 'One Comment', 'plumbio' )
						);
					} else {
						printf(// WPCS: XSS OK.
								/* translators: 1: comment count number, 2: title. */
							esc_html( _nx( '%1$s Comment', '%1$s Comments ', $plumbio_comment_count, 'comments title', 'plumbio' ), 'plumbio' ),
							number_format_i18n( $plumbio_comment_count )
						);
					}
					?>
				</div>
				<?php
				if ( have_comments() ) :
					the_comments_navigation();
					?>
				<div class="tt-comments__list">
					<?php
					wp_list_comments(
						array(
							'style'      => 'div',
							'callback'   => 'plumbio_comments',
							'short_ping' => true,
						)
					);
					?>
				</div>
					<?php
						the_comments_navigation();
						// If comments are closed and there are comments, let's leave a little note, shall we?
					if ( ! comments_open() ) :
						?>
							<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'plumbio' ); ?></p>
							<?php
						endif;
					endif;
				?>
			</div>
		<?php
		endif; // Check for have_comments().

	$is_no_post_thumb = '';
	if ( ! have_comments() ) {
		$is_no_post_thumb = 'no-comment';
	}
	if ( comments_open() ) :
		?>

<div class="singlepost__block-top <?php echo esc_attr( $is_no_post_thumb ); ?>">

		<?php
			$user                  = wp_get_current_user();
			$plumbio_user_identity = $user->display_name;
			$req                   = get_option( 'require_name_email' );
			$aria_req              = $req ? " aria-required='true'" : '';
			$formargs              = array(
				'class_form'           => 'tt-form',
				'title_reply'          => esc_html__( 'Leave a Comment', 'plumbio' ),
				'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'plumbio' ),
				'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'plumbio' ),
				'title_reply_before'   => '<div class="singlepost__title">',
				'title_reply_after'    => '</div>',
				'label_submit'         => esc_html__( 'Post Comment', 'plumbio' ),
				'submit_field'         => '<div>%1$s %2$s</div>',
				'submit_button'        => '<button type="submit" name="%1$s" id="%2$s" class="%3$s tt-btn02"><span>%4$s</span></button>',
				'comment_field'        => '<div class="tt-form__group"><textarea id="comment" class="tt-form__control" rows="6" name="comment" placeholder="' . esc_attr__( 'Comment', 'plumbio' ) . '"  >' .
				'</textarea></div>',
				'comment_notes_before' => '',
				'must_log_in'          => '<div>' . sprintf( wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'plumbio' ), array( 'a' => array( 'href' => array() ) ) ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</div>',
				'logged_in_as'         => '<div class="logged-in-as">' . sprintf( wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="%4$s">Log out?</a>', 'plumbio' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'profile.php' ) ), $plumbio_user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ), esc_attr__( 'Log out of this account', 'plumbio' ) ) . '</div>',
				'comment_notes_after'  => '',
				'fields'               => apply_filters(
					'comment_form_default_fields',
					array(
						'author' =>
						'<div class="row"><div class="col-md-6"><div class="tt-form__group">'
						. '<input id="author"  name="author" class="tt-form__control" placeholder="' . esc_attr__( 'Your Name *', 'plumbio' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
						'" size="30"' . $aria_req . ' /></div></div>',
						'email'  =>
						'<div class="col-md-6"><div class="tt-form__group">'
						. '<input id="email" name="email" class="tt-form__control" type="text"  placeholder="' . esc_attr__( 'Email Address', 'plumbio' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
						'" size="30"' . $aria_req . ' /></div></div></div>',
					)
				),
			);
			?>
		<?php
			comment_form( $formargs );
		?>
</div>
<?php endif; ?>
