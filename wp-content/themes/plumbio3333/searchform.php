<div class="tt-aside01__content">
	<form role="search" method="get" class="search-form search-box" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="tt-search-aside">
			<div class="tt-form__group">
				<input type="search" id="<?php echo esc_attr( uniqid( 'search-form-' ) ); ?>" class="tt-form__control"
				placeholder="<?php esc_attr_e( 'Search...', 'plumbio' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required="required"/>
				<button type="submit" class="tt-btn-inner-right icon-2089805"></button>
			</div>
		</div>
	</form>
</div>
