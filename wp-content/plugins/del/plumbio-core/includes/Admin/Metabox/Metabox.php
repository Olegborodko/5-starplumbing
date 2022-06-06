<?php
namespace Plumbio\Helper\Admin\Metabox;

class Metabox {




	/**
	 * Initialize the class
	 */
	function __construct() {
		// Register the post type
		add_filter( 'rwmb_meta_boxes', array( $this, 'plumbio_register_framework_post_meta_box' ) );
	}


	/**
	 * Register meta boxes
	 *
	 * Remember to change "your_prefix" to actual prefix in your project
	 *
	 * @return void
	 */
	function plumbio_register_framework_post_meta_box( $meta_boxes ) {

		global $wp_registered_sidebars;

		/**
		 * prefix of meta keys (optional)
		 * Use underscore (_) at the beginning to make keys hidden
		 * Alt.: You also can make prefix empty to disable it
		 */
		// Better has an underscore as last sign

		$sidebars = array();

		foreach ( $wp_registered_sidebars as $key => $value ) {
			$sidebars[ $key ] = $value['name'];
		}

		$opacities = array();
		for ( $o = 0.0, $n = 0; $o <= 1.0; $o += 0.1, $n++ ) {
			$opacities[ $n ] = $o;
		}
		$prefix     = 'plumbio_core';
		$posts_page = get_option( 'page_for_posts' );
		if ( ! isset( $_GET['post'] ) || intval( $_GET['post'] ) != $posts_page ) {
			$meta_boxes[] = array(
				'id'       => $prefix . '_page_wiget_meta_box',
				'title'    => esc_html__( 'Page Settings', 'plumbio' ),
				'pages'    => array(
					'page',
				),
				'context'  => 'normal',
				'priority' => 'core',
				'fields'   => array(),
			);
		}
		return $meta_boxes;
	}
}
