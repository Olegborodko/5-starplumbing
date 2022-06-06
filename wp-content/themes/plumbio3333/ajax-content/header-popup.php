<?php
add_action( 'wp_ajax_plumbio_ajax_header_popup', 'plumbio_ajax_header_popup' );
add_action( 'wp_ajax_nopriv_plumbio_ajax_header_popup', 'plumbio_ajax_header_popup' );

function plumbio_ajax_header_popup() {
	$header_sidebar_template = plumbio_get_options( 'header_sidebar_template' );
	?>
		<div class="tt-popup__close icon-748122" tabindex="-1">
			<label><?php esc_html_e( 'Close', 'plumbio' ); ?></label>
		</div>
		<?php do_action( 'plumbio_mobile_menu' ); ?>
		<?php
		if ( class_exists( '\\Elementor\\Plugin' ) ) {
			if ( ! empty( $header_sidebar_template ) ) :
				$pluginElementor         = \Elementor\Plugin::instance();
				$header_sidebar_template = $pluginElementor->frontend->get_builder_content( $header_sidebar_template );
				echo do_shortcode( $header_sidebar_template );
			endif;
		}
		?>
	<?php
	wp_die();
}
