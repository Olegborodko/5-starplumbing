<?php
class Plumbio_Int {

	/**
	 * back to top compatibility.
	 */
	public static function plumbio_back_to_top() {
		$back_to_top_on_off = plumbio_get_options( 'back_to_top_on_off' );
		if ( $back_to_top_on_off === '1' ) :
			?>
			<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" id="js-backtotop" class="tt-back-to-top icon-694055"></a>
			<?php
		endif;
	}
	/**
	 * header logo compatibility.
	 */
	public static function plumbio_header_logo() {
		?>
				
					<?php
					if ( has_custom_logo() ) {
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
						?>
						<a class="tt-logo tt-logo__alignment" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url( $logo[0] ); ?>"
							alt="<?php echo esc_attr__( 'Logo', 'plumbio' ); ?>">
						</a>
						<?php
					} elseif ( ! has_custom_logo() ) {
						?>
						<a class="tt-logo tt-logo__alignment" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div class="tt-logo__icon">
									<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
									<path class="tt-logo__icon-color01" d="M257.2,2c1,1.4,1.6,2.3,2.3,3c47.1,47.1,94,94.4,141.3,141.3c23.9,23.8,42.3,50.9,53.4,82.8
										C494,343.7,428.9,467.6,312,499.9c-76.6,21.2-159.4-3.6-211.9-63.1c-27.4-31.2-44.9-67.2-50.2-108.3
										c-9.6-74.4,13.7-137.3,69.3-187.9c1.1-1,2.3-2.1,3.4-3.2C166.7,93.3,210.8,49.1,254.9,5C255.6,4.3,256.2,3.4,257.2,2z M98,346.1
										c0.3,1,0.4,1.7,0.6,2.3c25.1,82.6,112.7,132.3,197,111.6c82.7-20.3,136.3-98.2,125.4-182.7c-4.8-36.9-20.4-68.6-46.5-95
										c-38.3-38.7-77-77.1-115.5-115.6c-0.6-0.6-1.2-1.1-2.3-2.1c-0.7,0.9-1.2,1.8-1.8,2.4c-34.7,34.8-69.4,69.5-104.2,104.2
										c-0.9,0.9-1.8,1.8-2.8,2.7c-8.6,7.5-16.4,15.8-23.3,24.9c-18.1,24-28.8,50.9-32.5,80.7c-0.5,4.5-0.7,9-1.1,13.6
										c0.7,0.1,1,0.2,1.4,0.2c31.3,0,62.6,0.1,93.8,0c8.9,0,15.2-6.6,15.4-15.5c0.1-5.6,0-11.2,0-16.8c0-0.6-0.2-1.1-0.3-1.8
										c-1.4,0-2.7,0.1-4,0c-2.4-0.2-4.3-1.8-4.5-3.9c-0.2-2.2,1.1-3.9,3.7-4.6c0.9-0.2,1.9-0.3,2.8-0.3c6.9,0,13.8,0,20.7,0
										c0.9,0,1.8,0,2.9,0c0-10.5,0-20.5,0-30.6c0-0.7-0.6-1.6-1.1-2c-3.4-2.5-7.1-2.9-11.3-2.1c-7.5,1.5-15,3.1-22.6,4
										c-5.9,0.7-10.3-2.4-12.9-7.7c-2.6-5.3-2.9-10.9-1.4-16.6c0.9-3.3,3.1-5.6,6.4-6.5c2-0.6,4.2-0.9,6.3-1c7.2-0.1,14,1.5,20.5,4.4
										c4.1,1.9,8.3,2,12.3-0.5c2-1.2,4.1-2.2,6.2-3.1c8.3-3.7,15.5-2.4,22.1,3.8c0.7,0.7,2,1.1,3,1.1c7.3,0,14.3-1.4,21.3-3.4
										c3.5-1,7.3-1.7,10.9-1.7c6.5-0.1,10,3.6,10.4,10c0.2,2.7,0.2,5.3,0.1,8c-0.3,8.4-3.8,11.8-12,12.4c-7.2,0.5-14.2-0.4-21.1-2.7
										c-4.7-1.6-9.6-3-13.8,1.4c-0.1,0.1-0.3,0.2-0.4,0.2c-1.5,0.4-1.8,1.5-1.8,2.9c0.1,9.2,0,18.4,0,27.7c0,0.7,0.1,1.3,0.2,2.1
										c8.2,0,16.2,0,24.2,0c2.9,0,4.2,1.2,4.5,3.9c0.2,2.4-1.2,3.7-3.4,4.2c-1.7,0.4-3.5,0.6-5.4,0.9c0,1.1,0,2.1,0,3.1
										c0,5.4,0.2,10.9-0.1,16.3c-0.3,4.4,1.2,7.8,4.8,9.8c2.9,1.6,6.3,3,9.6,3.3c8.6,0.6,16.9,2.5,24.9,5.4c13,4.7,24.5,11.5,32.1,23.5
										c4,6.4,7.8,13,11.3,19.7c6.3,12.1,10.7,24.8,10.1,38.8c-0.1,2.1-0.6,3-2.8,3.3c-8.2,1.3-16.4,2.9-24.7,4.4
										c-7.2,1.3-14.4,2.6-21.7,3.8c-0.2-0.8-0.3-1.3-0.5-1.9c-1.1-5.7-1.9-11.4-3.2-17c-1.9-8-4.5-15.7-10-22.2c-3.7-4.4-8.4-6.4-14-5.1
										c-4.4,1.1-8.7,2.7-12.9,4.4c-11.9,4.9-24,8.4-37,8.6c-19.8,0.4-38.3-5.9-57-11.3c-1-0.3-2-0.6-3-0.6c-23.4,0-46.9,0-70.3,0
										C99.3,346.1,98.8,346.1,98,346.1z"/>
									<path class="tt-logo__icon-color02" d="M334.8,396.7c3.2,17,11.8,31.1,22.7,43.9c5.7,6.6,9.9,14.1,11.9,22.6c2.3,9.5,2.1,19-1.8,28.1
										c-4.3,10.1-11.8,16.2-22.9,17.9c-7.5,1.2-15,1-22.4-0.4c-11.5-2.1-20.4-11.5-22.9-24.5c-3.3-16.9,1.7-31.4,12.7-44.2
										c7.7-9,14.2-18.8,18.5-30C332.2,405.9,333.3,401.4,334.8,396.7z"/>
									</svg>
								</div>
								<div class="tt-logo__text">
									<?php esc_html_e( 'Plumbio', 'plumbio' ); ?>
									<div class="wave_container">
										<svg viewBox="0 0 1140 125" fill="none" >
										<path fill="#e5e5e5" d="M 0 59.9547 C 307.185 122.808 534.699 46.5899 847.24 39.6827 C 1159.78 32.7756 1270.98 45.0236 1440 59.9547 V 351.955 H 0 V 59.9547 Z">
										<animate repeatCount="indefinite" attributeName="d" dur="6s"
										values="M0 95.654C277.431 -69.1705 408 11.654 720 95.654C1032 179.654 1207.5 144.328 1440 95.654V387.654H0V95.654Z; M0 51.8168C277 169.163 433 131.471 720 51.8168C1007 -27.8372 1199 -5.83717 1440 51.8168V343.817H0V51.8168Z; M0 69.3411C342 69.3411 652 -51.313 994 25.687C1336 102.687 1354 103.687 1440 69.3411V361.341H0V69.3411Z; M0 95.654C277.431 -69.1705 408 11.654 720 95.654C1032 179.654 1207.5 144.328 1440 95.654V387.654H0V95.654Z&nbsp;">
										</animate></path></svg>
									</div>
								</div>
							</a>
						<?php
					}
					?>
		
		<?php
	}

	/**
	 * header menu compatibility.
	 */
	public static function plumbio_header_menu() {
		?>
			<div class="desktopmenu" id="js-desktop-menu">
				<nav>
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_class'     => 'navigation clearfix',
								'container'      => 'ul',
							)
						);
					} else {
						wp_nav_menu(
							array(
								'menu_class' => 'navigation clearfix',
								'container'  => 'ul',
							)
						);
					}
					?>
				</nav>
			</div>
		<?php
	}
	/**
	 * header menu compatibility.
	 */
	public static function plumbio_mobile_menu() {
		?>
			<div class="tt-mobile-menu" id="js-mobile-menu">
				<nav>
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_class'     => 'navigation clearfix',
								'container'      => 'ul',
							)
						);
					} else {
						wp_nav_menu(
							array(
								'menu_class' => 'navigation clearfix',
								'container'  => 'ul',
							)
						);
					}
					?>
				</nav>
				<div class="tt-mobile-menu__back" id="js-mobile-menu__back"><?php esc_html_e( 'Back', 'plumbio' ); ?></div>
			</div>
		<?php
	}


	/**
	 * All header and breadcrumb.
	 */
	public static function plumbio_breadcrumb() {
		$breadcrumb_title = 'plumbio';
		$breadcrumb_class = 'breadcrumb_no_bg';
		if ( is_front_page() && is_home() ) :
			$breadcrumb_title = ''; // deafult blog
			$breadcrumb_class = 'deafult-home-breadcrumb';
		elseif ( is_front_page() && ! is_home() ) :
			$breadcrumb_title = ''; // custom home or deafult
			$breadcrumb_class = 'custom-home-breadcrumb';
		elseif ( is_home() ) :
			$blog_breadcrumb_switch = plumbio_get_options( 'blog_breadcrumb_switch' );
			if ( $blog_breadcrumb_switch == '1' ) :

				$blog_breadcrumb_content = plumbio_get_options( 'blog_breadcrumb_content' );

				$blog_style = get_query_var( 'blog_style' );
				if ( ! $blog_style ) {
					$blog_style = plumbio_get_options( 'blog_style' );
				}
				if ( $blog_style == 1 ) :
					$blog_breadcrumb_content = plumbio_get_options( 'blog_breadcrumb_content' );
			 elseif ( $blog_style == 2 ) :
				 $blog_breadcrumb_content = plumbio_get_options( 'blog_breadcrumb_content' );
			 elseif ( $blog_style == 3 ) :
				 $blog_breadcrumb_content = plumbio_get_options( 'blog_breadcrumb_content' );
			 endif;

			 $breadcrumb_title = $blog_breadcrumb_content;
		else :
			$breadcrumb_title = '';
		endif;
			$breadcrumb_class = 'blog-breadcrumb';
		elseif ( is_archive() ) :
			if ( class_exists( 'woocommerce' ) && is_woocommerce() ) :
				if ( is_shop() ) {
					$breadcrumb_title = esc_html__( ' Shop ', 'plumbio' ); // custom home or deafult
				} else {
					$breadcrumb_title = get_the_archive_title();
				}
				$breadcrumb_class = 'custom-woocommerce-breadcrumb';
			else :
				$breadcrumb_title = get_the_archive_title();
				$breadcrumb_class = 'blog-breadcrumb';
			endif;
		elseif ( is_single() ) :
			if ( get_post_type( get_the_ID() ) == 'post' ) :
				$breadcrumb_title = get_the_title();
				$breadcrumb_class = 'blog-single-breadcrumb';
				else :
					// post type
					$breadcrumb_title = get_post_type() . esc_html__( ' Details', 'plumbio' );
					$breadcrumb_class = get_post_type() . '-single-breadcrumb';
			endif;
		elseif ( is_404() ) :
			$breadcrumb_title = esc_html__( 'Error Page', 'plumbio' );
			$breadcrumb_class = 'blog-breadcrumb';
		elseif ( is_search() ) :
			if ( have_posts() ) :
				$breadcrumb_title = esc_html__( 'Search Results for: ', 'plumbio' ) . get_search_query();
				$breadcrumb_class = 'blog-breadcrumb';
		else :
			$breadcrumb_title = esc_html__( 'Nothing Found', 'plumbio' );
			$breadcrumb_class = 'blog-breadcrumb';
		endif;
		elseif ( ! is_home() && ! is_front_page() && ! is_search() && ! is_404() ) :
			$breadcrumb_title = get_the_title();
			$breadcrumb_class = 'page-breadcrumb';
		endif;
			$breadcrumb_active_class = 'breadcrumb-not-active';
		if ( function_exists( 'bcn_display' ) ) :
			$breadcrumb_active_class = '';
		endif;
		?>
		<?php
		$plumbio_show_breadcrumb = get_post_meta( get_the_ID(), 'plumbio_core_show_breadcrumb', true );

		$breadcrumb_bg = plumbio_get_options( 'breadcrumb_bg' );
		if ( $breadcrumb_bg ) {
			$breadcrumb_bg = $breadcrumb_bg['url'];
		} else {
			$breadcrumb_bg = '';
		}

		if ( is_page() ) {
			$thumbnail_url = get_the_post_thumbnail_url();
			if ( $thumbnail_url ) {
				$image_url = $thumbnail_url;
			} else {
				$image_url = $breadcrumb_bg;
			}
		} else {
				$image_url = $breadcrumb_bg;
		}
		?>
		<?php if ( $plumbio_show_breadcrumb != 'off' ) : ?>
			<?php if ( isset( $breadcrumb_title ) && ! empty( $breadcrumb_title ) ) : ?>
					<div class="tt-pagetitle <?php echo esc_attr( $breadcrumb_class . ' ' . $breadcrumb_active_class ); ?>">
						<div class="tt-pagetitle__box">
							<?php if ( isset( $image_url ) && ! empty( $image_url ) ) { ?>
							<picture class="tt-pagetitle__img">
								<source srcset="<?php echo esc_url( $image_url ); ?>" type="image/jpg">
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARgAAAFeAQMAAABkQZK+AAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAACJJREFUaN7twQENAAAAwiD7p7bHBwwAAAAAAAAAAAAAACDqMTgAAXbCiqsAAAAASUVORK5CYII=" data-src="<?php echo esc_url( $image_url ); ?>" class="lazyload" alt="<?php esc_attr_e( 'Page Title BG', 'plumbio' ); ?>" >
							</picture>
							<?php } ?>
							<div class="container">
								<h1 class="tt-pagetitle__title"><?php echo sprintf( __( '%s', 'plumbio' ), $breadcrumb_title ); ?></div>
								<?php if ( function_exists( 'bcn_display' ) ) : ?>
								<ul class="tt-breadcrumbs">
									<?php bcn_display(); ?>
								</ul>
								<?php endif; ?>
							</div>
						</div>
					</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php
	}

	/**
	 * autor box compatibility.
	 */
	public static function plumbio_author_box() {
		$blog_author_switch = plumbio_get_options( 'blog_author_switch' );
		if ( $blog_author_switch == 1 ) :
			global $post;
			$display_name     = get_the_author_meta( 'display_name', $post->post_author );
			$user_description = get_the_author_meta( 'user_description', $post->post_author );
			$user_avatar      = get_avatar( $post->post_author, 170 );
			if ( isset( $display_name ) && ! empty( $user_description ) && isset( $user_avatar ) ) {
				?>
				<div class="tt-personal singlepost__block-top">
						<div class="tt-personal__avatar">
							<picture>
							<?php echo wp_kses( $user_avatar, 'code_contxt' ); ?>
							</picture>
						</div>
						<div class="tt-personal__content">
							<div class="tt-personal__title"><?php echo wp_kses( ucfirst( $display_name ), 'code_contxt' ); ?></div>
							<p>
							<?php echo wp_kses( $user_description, 'code_contxt' ); ?>
							</p>
						</div>
					</div>
				<?php
			}
		endif;
	}
	/**
	 * plumbio compatibility.
	 */
	public static function plumbio_kses_allowed_html( $tags, $context ) {
		switch ( $context ) {
			case 'code_contxt':
				$tags = array(
					'iframe' => array(
						'allowfullscreen' => array(),
						'frameborder'     => array(),
						'height'          => array(),
						'width'           => array(),
						'src'             => array(),
						'class'           => array(),
					),
					'li'     => array(
						'class' => array(),
					),
					'h5'     => array(
						'class' => array(),
					),
					'span'   => array(
						'class' => array(),
					),
					'a'      => array(
						'href' => array(),
					),
					'i'      => array(
						'class' => array(),
					),
					'br'     => array(
						'class' => array(),
					),
					'p'      => array(),
					'em'     => array(),
					'strong' => array(),
					'del'    => array(),
					'ins'    => array(),
				);
				return $tags;
			case 'author_avatar':
				$tags = array(
					'img' => array(
						'class'  => array(),
						'height' => array(),
						'width'  => array(),
						'src'    => array(),
						'alt'    => array(),
					),
				);
				return $tags;
			default:
				return $tags;
		}
	}
}
$plumbio_int = new Plumbio_Int();
