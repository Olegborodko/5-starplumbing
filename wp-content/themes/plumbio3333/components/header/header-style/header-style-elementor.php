<?php
$header_elementor = plumbio_get_options( 'header_elementor' );
?>
<header class="tt-header lock-padding" id="js-header">
<?php
if ( class_exists( '\\Elementor\\Plugin' ) ) {
	if ( ! empty( $header_elementor ) ) :
		$pluginElementor  = \Elementor\Plugin::instance();
		$header_elementor = $pluginElementor->frontend->get_builder_content( $header_elementor );
		echo do_shortcode( $header_elementor );
	endif;
}
?>
</header>
