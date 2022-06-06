<?php
class Plumbio_Scripts {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'plumbio_enqueue_scripts' ), 200 );
	}
	public function plumbio_enqueue_scripts() {

		wp_enqueue_script( 'swiper-bundle', PLUMBIO_JS_URL . 'swiper-bundle.min.js', array( 'jquery' ), time(), true );
		wp_enqueue_script( 'lazysizes', PLUMBIO_JS_URL . 'lazysizes.min.js', array( 'jquery' ), time(), true );
		wp_enqueue_script( 'ls-bgset', PLUMBIO_JS_URL . 'ls.bgset.min.js', array( 'jquery' ), time(), true );
		wp_enqueue_script( 'plumbio-flatpickr', PLUMBIO_JS_URL . 'flatpickr.js', array( 'jquery' ), time(), true );
		wp_enqueue_script( 'glightbox', PLUMBIO_JS_URL . 'glightbox.js', array( 'jquery' ), time(), true );
		wp_enqueue_script( 'perfect-scrollbar', PLUMBIO_JS_URL . 'perfect-scrollbar.min.js', array( 'jquery' ), time(), true );
		wp_enqueue_script( 'nouislider', PLUMBIO_JS_URL . 'nouislider.min.js', array( 'jquery' ), time(), true );
		wp_enqueue_script( 'vanilla-calendar', PLUMBIO_JS_URL . 'vanilla-calendar-min.js', array( 'jquery' ), time(), true );
		wp_enqueue_script( 'plumbio-init-calendar', PLUMBIO_JS_URL . 'init-calendar.js', array( 'jquery' ), time(), true );
		wp_enqueue_script( 'plumbio-toggle-aside-listing', PLUMBIO_JS_URL . 'toggle-aside-listing.js', array( 'jquery' ), time(), true );
		wp_enqueue_script( 'plumbio-custom', PLUMBIO_JS_URL . 'custom.js', array( 'jquery' ), time(), true );

		$sticky_header_on = plumbio_get_options( 'sticky_header_on' );
		$ajax_content     = array(
			'sticky_header_on' => $sticky_header_on,
			'ajax_url'         => esc_url( admin_url( 'admin-ajax.php' ) ),
		);
		wp_localize_script( 'plumbio-custom', 'ajax_content_object', $ajax_content );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
$plumbio_scripts = new Plumbio_Scripts();

