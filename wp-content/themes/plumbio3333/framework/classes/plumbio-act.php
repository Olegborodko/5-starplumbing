<?php
class Plumbio_Act {
	public function __construct() {
		$this->plumbio_register_action();
	}
	private function plumbio_register_action() {
		add_action( 'plumbio_back_to_top_ready', array( 'Plumbio_Int', 'plumbio_back_to_top' ) );
		add_action( 'plumbio_header_logo', array( 'Plumbio_Int', 'plumbio_header_logo' ) );
		add_action( 'plumbio_header_menu', array( 'Plumbio_Int', 'plumbio_header_menu' ) );
		add_action( 'plumbio_mobile_menu', array( 'Plumbio_Int', 'plumbio_mobile_menu' ) );
		add_action( 'plumbio_author_box', array( 'Plumbio_Int', 'plumbio_author_box' ) );
		add_action( 'plumbio_breadcrumb', array( 'Plumbio_Int', 'plumbio_breadcrumb' ) );
		add_filter( 'wp_kses_allowed_html', array( 'Plumbio_Int', 'plumbio_kses_allowed_html' ), 10, 2 );
	}
}
$plumbio_act = new Plumbio_Act();
