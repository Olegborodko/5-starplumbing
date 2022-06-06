
<form role="search" method="get" class="woocommerce-product-search tt-search-aside" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="tt-form__group">
		<input type="text" class="tt-form__control" placeholder="<?php echo esc_attr_x( 'Search products', 'placeholder', 'plumbio' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'plumbio' ); ?>" />
		<button type="submit" class="tt-btn-inner-right icon-2089805"></button>
		<input type="hidden" name="post_type" value="product" />
	</div>
</form>
