<?php
add_action( 'wp_ajax_plumbio_ajax_modal_schedule', 'plumbio_ajax_modal_schedule' );
add_action( 'wp_ajax_nopriv_plumbio_ajax_modal_schedule', 'plumbio_ajax_modal_schedule' );

function plumbio_ajax_modal_schedule() {
	$modal_title    = plumbio_get_options( 'modal_title' );
	$modal_subtitle = plumbio_get_options( 'modal_subtitle' );
	$modal_form     = plumbio_get_options( 'modal_form' );
	?>
	<h6 class="tt-modal__title"><?php echo esc_html( $modal_title ); ?></h6>
	<p>
		<?php echo esc_html( $modal_subtitle ); ?>
	</p>

	<div class="tt-form">
		<?php echo do_shortcode( $modal_form ); ?>
	</div>
	<?php
	wp_die();
}
