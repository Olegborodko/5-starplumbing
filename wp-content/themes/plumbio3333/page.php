<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plumbio
 */
get_header();

$page_single_col                = '12';
$page_single_col2               = '12';
$plumbio_theme_metabox_page_col = get_post_meta( get_the_ID(), 'plumbio_core_page_col', true );
if ( $plumbio_theme_metabox_page_col == 'on' ) :
	$page_single_col  = '8';
	$page_single_col2 = '7';
endif;
	$plumbio_core_page_widget_left_right = get_post_meta( get_the_ID(), 'plumbio_core_page_widget_left_right', true );
	$order_class                         = '';
if ( $plumbio_core_page_widget_left_right == 'left' ) :
	$order_class = 'order-lg-2';
	endif;
$plumbio_theme_metabox_page_extra_class = get_post_meta( get_the_ID(), 'plumbio_core_page_extra_class', true );
?>
	<div class="section-inner <?php echo esc_attr( $plumbio_theme_metabox_page_extra_class ); ?>">
		<div class="container container__tablet-fluid">
			<div class="row">
				<div class="col-md-<?php echo esc_attr( $page_single_col2 ); ?> col-lg-<?php echo esc_attr( $page_single_col ); ?> <?php echo esc_attr( $order_class ); ?>">
				<?php
				if ( $plumbio_theme_metabox_page_col == 'on' ) :
					?>
					<div class="tt-services-indent">
					<?php
					endif;
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'page' );
						endwhile;
					endif;
				?>
					<?php
					if ( $plumbio_theme_metabox_page_col == 'on' ) :
						?>
					</div>
					<?php endif; ?>
				</div>
				<?php
				if ( $plumbio_theme_metabox_page_col == 'on' ) :
					 do_action( 'page_advance_content_left' );
				endif;
				?>
				<?php
				if ( $plumbio_theme_metabox_page_col == 'on' ) :
					do_action( 'page_advance_content_right' );
				endif;
				?>
			</div>
		</div>
	</div>
<?php
$plumbio_core_select_footer_template = get_post_meta( get_the_ID(), 'plumbio_core_select_footer_template', true );

if ( class_exists( '\\Elementor\\Plugin' ) && $plumbio_core_select_footer_template ) :
	$pluginElementor                     = \Elementor\Plugin::instance();
	$plumbio_core_select_footer_template = $pluginElementor->frontend->get_builder_content( $plumbio_core_select_footer_template );
	echo do_shortcode( $plumbio_core_select_footer_template );
endif;
get_footer();
