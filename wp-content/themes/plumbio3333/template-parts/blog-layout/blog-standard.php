<?php
$blog_breadcrumb_class  = 'blog-breadcrumb-active';
$blog_breadcrumb_switch = plumbio_get_options( 'blog_breadcrumb_switch' );
if ( $blog_breadcrumb_switch == 1 ) :
	$blog_breadcrumb_class = '';
endif;
?>
<div class="section-inner">
	<div class="container container__tablet-fluid">
		<div class="blog-container__row">
			<div class="blog-container__col-left">
				<div class="tt-post-list">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/blog-layout/content', get_post_format() );
							endwhile;
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
				</div>
				<?php if ( get_the_posts_pagination() ) : ?>
					<div class="tt-pagination tt-pagination__top">
						<?php
							the_posts_pagination(
								array(
									'type'      => 'list',
									'mid_size'  => 4,
									'prev_text' => '<span class="icon-545682"></span>',
									'next_text' => '<span class="icon-545682"></span>',
								)
							);
						?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
				<div class="blog-container__col-right">
					<?php get_sidebar(); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>

