<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>


<div class="tabs-dafault tabs__01 tabs-shopitem js-tabs">
		<div class="tabs__nav tabs__nav-size-small">
			<?php
			$i = 0;
			foreach ( $product_tabs as $key => $product_tab ) :
				$i++;
				if ( $i == 1 ) {
					$active = 'active';
				} else {
					$active = '';
				}
				?>
				<div class="<?php echo esc_attr( $key ); ?>_tab tabs__nav-item <?php echo esc_attr( $active ); ?>" id="tab-title-<?php echo esc_attr( $key ); ?>" data-pathtab="tab-shopitem-<?php echo esc_attr( $key ); ?>">
						<div class="tt-text">
							<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
						</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="tabs__container">
		<?php
		$i = 0;
		foreach ( $product_tabs as $key => $product_tab ) :
			$i++;
			if ( $i == 1 ) {
				$active = 'is-show active';
			} else {
				$active = '';
			}
			?>
		
			<div class="tabs__layout-item  <?php echo esc_attr( $active ); ?>" id="tab-shopitem-<?php echo esc_attr( $key ); ?>">
				<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
			</div>
		
		<?php endforeach; ?>
		</div>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>

	</div>
<?php endif; ?>
