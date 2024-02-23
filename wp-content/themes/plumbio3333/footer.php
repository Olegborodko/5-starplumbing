<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plumbio
 */
$copyright         = plumbio_get_options( 'copyright' );
$page_footer_class = get_post_meta( get_the_ID(), 'plumbio_core_page_footer_class', true );

?>
</div>
<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) { ?>
	<?php if ( $page_footer_class ) { ?>
<footer id="tt-footer" class="<?php echo esc_attr( $page_footer_class ); ?>">
<?php } else { ?>
	<footer id="tt-footer">
<?php } ?>
	<?php get_template_part( 'components/footer/footer-top' ); ?>
	<div class="footer-copyright">
	<?php
	if ( $copyright ) {
		echo wp_kses( $copyright, 'code_contxt' );
	} else {
		esc_html_e( '&copy; Copyright 2024 by Plumbio', 'plumbio' );
	}
	?>
	</div>
</footer>
<?php } ?>
<?php do_action( 'plumbio_back_to_top_ready' ); ?>
<?php wp_footer(); ?>
</body>
</html>
