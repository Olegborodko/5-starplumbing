<?php
$footer_widget_elementor = plumbio_get_options( 'footer_widget_elementor' );
if ( class_exists( '\\Elementor\\Plugin' ) ) :
	$pluginElementor         = \Elementor\Plugin::instance();
	$footer_widget_elementor = $pluginElementor->frontend->get_builder_content( $footer_widget_elementor );
	echo do_shortcode( $footer_widget_elementor );
endif;
