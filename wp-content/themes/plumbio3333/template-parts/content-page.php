<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package plumbio
 */

?>
<div class="page-content blog-details-content">
<?php
the_content();
wp_link_pages(
	array(
		'before' => '<div class="page-links post-single-link">',
		'after'  => '</div>',
	)
);
?>
</div>
<?php
if ( comments_open() || get_comments_number() ) :
	comments_template();
endif;
