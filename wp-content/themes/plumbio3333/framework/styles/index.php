<?php
class Plumbio_Style {
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'plumbio_enqueue_style' ), 200 );
	}
	public function plumbio_enqueue_style() {
		wp_enqueue_style( 'plumbio-font-style', PLUMBIO_FONT_URL . 'style.css', false, time() );
		wp_enqueue_style( 'plumbio-main-style', PLUMBIO_CSS_URL . 'style.css', '', time() );
		wp_enqueue_style( 'plumbio-style-blog', PLUMBIO_CSS_URL . 'style-blog.css', false, time() );
		wp_enqueue_style( 'plumbio-theme-style', PLUMBIO_CSS_URL . 'theme-style.css', false, time() );
		wp_enqueue_style( 'plumbio-shop', PLUMBIO_CSS_URL . 'shop.css', false, time() );
		wp_enqueue_style( 'plumbio-style', get_stylesheet_uri(), null, time() );

		$plumbio_custom_inline_style = '';
		if ( function_exists( 'plumbio_get_custom_styles' ) ) {
			$plumbio_custom_inline_style = plumbio_get_custom_styles();
		}
		wp_add_inline_style( 'plumbio-style', $plumbio_custom_inline_style );

	}
}
$plumbio_style = new Plumbio_Style();
