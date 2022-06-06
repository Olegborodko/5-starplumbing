<?php
namespace Plumbio\Helper\Elementor;

/**
 * The Menu handler class
 */

class Scripts {


	private $prefix = 'plumbio';

	public function __construct() {
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'plumbio_core_required_script' ) );
		add_action( 'wp_head', array( $this, 'widget_assets_css' ) );
		add_action( 'wp_footer', array( $this, 'widget_scripts' ) );
		add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'widget_editor_scripts' ) );
	}

	public function plumbio_core_required_script( $screen ) {
	}
	public function widget_assets_css() {
		wp_enqueue_style( 'plumbio-core-custom', plugins_url() . '/plumbio-core/assets/elementor/css/custom.css', true, time() );
	}

	public function widget_scripts() {
		 wp_enqueue_script( 'plumbio-swiper-slider', PLUMBIO_CORE_ASSETS . '/elementor/js/swiper-slider.js', array( 'jquery' ), time(), true );
		// wp_enqueue_script( 'bannerslider', PLUMBIO_CORE_ASSETS . '/elementor/js/banner_slider.js', array( 'jquery' ), time(), true );
		// wp_enqueue_script( 'three-items-slider', PLUMBIO_CORE_ASSETS . '/elementor/js/three-items-slider.js', array( 'jquery' ), time(), true );
		// wp_enqueue_script( 'one-item-slider', PLUMBIO_CORE_ASSETS . '/elementor/js/one-item-slider.js', array( 'jquery' ), time(), true );
		// wp_enqueue_script( 'two-items-slider', PLUMBIO_CORE_ASSETS . '/elementor/js/two-items-slider.js', array( 'jquery' ), time(), true );
		// wp_enqueue_script( 'four-items-slider', PLUMBIO_CORE_ASSETS . '/elementor/js/four-items-slider.js', array( 'jquery' ), time(), true );
	}

	public function widget_editor_scripts() {

	}
}
