<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plumbio
 */

get_header();
?>
<div class="section-inner error-section">
	<div class="container container__tablet-fluid">
		<div class="content-404">
			<h1><?php esc_html_e( '404', 'plumbio' ); ?></h1>
			<h2><?php esc_html_e( 'Oops! That page can not be found.', 'plumbio' ); ?></h2>
			<div class="text"><?php esc_html_e( 'We’re unable to find a page you are looking for, Try later or click the button.', 'plumbio' ); ?></div>
			<a href="<?php echo esc_url( get_home_url() ); ?>" class="tt-btn"><span> <?php esc_html_e( 'Back to Home', 'plumbio' ); ?></span></a>
		</div>
	</div>
</div>
<?php
get_footer();
