<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package plumbio
 */
get_header();
?>
<div class="section-inner">
	<div class="container container__tablet-fluid">
		<div class="blog-container__row">
			<div class="blog-container__col-left">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/single/content' );
						endwhile;
					endif;
				?>
			</div>
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
				<div class="blog-container__col-right">
					<?php get_sidebar(); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php
get_footer();
