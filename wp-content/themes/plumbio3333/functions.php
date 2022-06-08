<?php
/**
 * plumbio functions and definitions [plumbio]
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package plumbio  PLUMBIO_THEME_URI PLUMBIO
 */
defined( 'PLUMBIO_THEME_URI' ) or define( 'PLUMBIO_THEME_URI', get_template_directory_uri() ); // plumbio
define( 'PLUMBIO_THEME_DRI', get_template_directory() );
define( 'PLUMBIO_IMG_URL', PLUMBIO_THEME_URI . '/assets/images/' );
define( 'PLUMBIO_CSS_URL', PLUMBIO_THEME_URI . '/assets/css/' );
define( 'PLUMBIO_JS_URL', PLUMBIO_THEME_URI . '/assets/js/' );
define( 'PLUMBIO_FONT_URL', PLUMBIO_THEME_URI . '/assets/font/' );
define( 'PLUMBIO_FRAMEWORK_DRI', PLUMBIO_THEME_DRI . '/framework/' );
define( 'PLUMBIO_AJAX_CONTENT_DRI', PLUMBIO_THEME_DRI . '/ajax-content/' );

require_once PLUMBIO_FRAMEWORK_DRI . 'styles/index.php';
require_once PLUMBIO_FRAMEWORK_DRI . 'styles/daynamic-style.php';
require_once PLUMBIO_FRAMEWORK_DRI . 'scripts/index.php';
require_once PLUMBIO_FRAMEWORK_DRI . 'redux/redux-config.php';

require_once PLUMBIO_FRAMEWORK_DRI . 'plugin-list.php';
require_once PLUMBIO_FRAMEWORK_DRI . 'tgm/class-tgm-plugin-activation.php';
require_once PLUMBIO_FRAMEWORK_DRI . 'tgm/config-tgm.php';
require_once PLUMBIO_FRAMEWORK_DRI . 'dashboard/class-dashboard.php';
require_once PLUMBIO_FRAMEWORK_DRI . 'classes/plumbio-int.php';
require_once PLUMBIO_FRAMEWORK_DRI . 'classes/plumbio-act.php';
require_once PLUMBIO_AJAX_CONTENT_DRI . 'header-popup.php';
require_once PLUMBIO_AJAX_CONTENT_DRI . 'modal__schedule.php';




if ( class_exists( 'woocommerce' ) ) {
	 include_once PLUMBIO_THEME_DRI . '/woocommerce-functions.php';
	 include_once PLUMBIO_THEME_DRI . '/woo-action-single.php';
}

/**
 * Theme option compatibility.
 */
if ( ! function_exists( 'plumbio_get_options' ) ) :
	function plumbio_get_options( $key ) {
		global $plumbio_options;
		$opt_pref = 'plumbio_';
		if ( empty( $plumbio_options ) ) {
			$plumbio_options = get_option( $opt_pref . 'options' );
		}
		$index = $opt_pref . $key;
		if ( ! isset( $plumbio_options[ $index ] ) ) {
			return false;
		}
		return $plumbio_options[ $index ];
	}
endif;


if ( ! function_exists( 'plumbio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function plumbio_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on love us, use a find and replace
		* to change 'plumbio' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'plumbio', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'plumbio' ),
			)
		);

		function plumbio_upload_mimes( $existing_mimes ) {
			$existing_mimes['webp'] = 'image/webp';
			return $existing_mimes;
		}
		add_filter( 'mime_types', 'plumbio_upload_mimes' );

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

				/*
		* Enable support for Post Formats.
		* See https://developer.wordpress.org/themes/functionality/post-formats/
		*/
		add_theme_support(
			'post-formats',
			array(
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'plumbio_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		add_image_size( 'plumbio-recent-post-size', 80, 80, true );
		add_image_size( 'plumbio-blog-grid', 370, 300, true );
	}
endif;
add_action( 'after_setup_theme', 'plumbio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function plumbio_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'plumbio_content_width', 640 );
}
add_action( 'after_setup_theme', 'plumbio_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function plumbio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'plumbio' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'plumbio' ),
			'before_widget' => '<div id="%1$s" class="tt-aside01 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="tt-aside01__title">',
			'after_title'   => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Service Sidebar', 'plumbio' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'plumbio' ),
			'before_widget' => '<div id="%1$s" class="tt-aside02 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="tt-aside02__title">',
			'after_title'   => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Woo Sidebar', 'plumbio' ),
			'id'            => 'woo_sideber',
			'description'   => esc_html__( 'Add widgets here.', 'plumbio' ),
			'before_widget' => '<div id="%1$s" class="tt-aside01 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="tt-aside01__title">',
			'after_title'   => '</div>',
		)
	);
}
add_action( 'widgets_init', 'plumbio_widgets_init' );



function plumbio_tag_cloud_widget( $tag_args ) {
	$tag_args = array(
		'format' => 'list',
		'echo'   => false,
	);
	return $tag_args;
}
add_filter( 'widget_tag_cloud_args', 'plumbio_tag_cloud_widget' );

function plumbio_product_tag_cloud_widget_args( $args ) {
	$args = array(
		'smallest' => 16,
		'largest'  => 16,
		'format'   => 'list',
		'taxonomy' => 'product_tag',
		'unit'     => 'px',
	);
	return $args;
}
add_filter( 'woocommerce_product_tag_cloud_widget_args', 'plumbio_product_tag_cloud_widget_args' );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * google font compatibility.
 */
function plumbio_google_font() {
	$protocol   = is_ssl() ? 'https' : 'http';
	$display    = 'swap';
	$variants   = ':wght@400;500;600;700;800;900';
	$query_args = array(
		'family'  => 'Inter|Mulish|Raleway' . $variants,
		'family'  => 'Mulish' . $variants . '&family=Raleway' . $variants . '&family=Inter' . $variants,
		'display' => $display,
	);
	$font_url   = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css2' );
	wp_enqueue_style( 'plumbio-google-fonts', $font_url, array(), null );
}
add_action( 'init', 'plumbio_google_font' );

/**
 * is_blog compatibility.
 */
function is_blog() {
	if ( ( is_archive() ) || ( is_author() ) || ( is_category() ) || ( is_home() ) || ( is_single() ) || ( is_tag() ) ) {
		return true;
	} else {
		return false;
	}
}

function plumbio_elementor_library() {
	$pageslist = get_posts(
		array(
			'post_type'      => 'elementor_library',
			'posts_per_page' => -1,
		)
	);
	$pagearray = array();
	if ( ! empty( $pageslist ) ) {
		foreach ( $pageslist as $page ) {
			$pagearray[ $page->ID ] = $page->post_title;
		}
	}
	return $pagearray;
}

function plumbio_body_classes( $classes ) {

	$theme_base_css       = plumbio_get_options( 'theme_base_css' );
	$theme_base_css_class = 'base-theme';
	if ( $theme_base_css == 1 ) :
		$theme_base_css_class = '';
	endif;

	$classes[] = $theme_base_css_class;

	return $classes;
}
add_filter( 'body_class', 'plumbio_body_classes' );



add_filter( 'comment_form_fields', 'plumbio_custom_field' );
function plumbio_custom_field( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	unset( $fields['cookies'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

if ( ! function_exists( 'plumbio_register_elementor_locations' ) ) {
	function plumbio_register_elementor_locations( $elementor_theme_manager ) {
		$hook_result = apply_filters_deprecated( 'plumbio_theme_register_elementor_locations', array( true ), '2.0', 'plumbio_register_elementor_locations' );
		if ( apply_filters( 'plumbio_register_elementor_locations', $hook_result ) ) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}

add_action( 'elementor/theme/register_locations', 'plumbio_register_elementor_locations' );

function change_robots_meta_value($robots_meta_value) {
	if (is_paged()) {
		$robots_meta_value['noindex'] = 'index';
		$robots_meta_value['nofollow'] = 'follow';
	}
	
	return $robots_meta_value;
}
add_filter( 'aioseo_robots_meta', 'change_robots_meta_value' );

function aioseo_filter_meta($value) {
	global $paged;

	$sitename = get_bloginfo('name');
	$obj = get_queried_object();

	if (gettype($obj) == 'object') {
		$type = get_class($obj);
		$name = '';
	
		switch ($type) {
			case 'WP_Post':
				$name = $obj->post_title;
				break;
			
			case 'WP_Term':
				$name = $obj->name;
				break;
		}
		
		if (is_paged()) {
			switch (current_filter()) {
				case 'aioseo_description':
					$value = $name . ' - page ' . $paged;
					break;
	
				case 'aioseo_title':
					$value = $name . ' - page ' . $paged . ' | ' . $sitename;
					break;
			}
		}
	}

	return $value;
}
add_filter( 'aioseo_description', 'aioseo_filter_meta' );
add_filter( 'aioseo_title', 'aioseo_filter_meta' );


function aioseo_add_sitemap_index( $indexes ) {
	foreach ($indexes as $key => $index) {
		if (strpos($index['loc'], 'category-sitemap.xml') !== false) {
			unset($indexes[$key]);
		}
	}

	return $indexes;
}
add_filter( 'aioseo_sitemap_indexes', 'aioseo_add_sitemap_index' );


function aioseo_filter_canonical_url( $canonical_url ) {
	$custom_canonical = [
		'/author/admin/page/10/' => '/blog/',
		'/author/admin/page/11/' => '/blog/',
		'/author/admin/page/12/' => '/blog/',
		'/author/admin/page/13/' => '/blog/',
		'/author/admin/page/2/' => '/blog/',
		'/author/admin/page/3/' => '/blog/',
		'/author/admin/page/4/' => '/blog/',
		'/author/admin/page/5/' => '/blog/',
		'/author/admin/page/6/' => '/blog/',
		'/author/admin/page/7/' => '/blog/',
		'/author/admin/page/8/' => '/blog/',
		'/author/admin/page/9/' => '/blog/',
		'/category/blog/' => '/blog/',
		'/category/blog/page/10/' => '/blog/',
		'/category/blog/page/11/' => '/blog/',
		'/category/blog/page/12/' => '/blog/',
		'/category/blog/page/2/' => '/blog/',
		'/category/blog/page/3/' => '/blog/',
		'/category/blog/page/4/' => '/blog/',
		'/category/blog/page/5/' => '/blog/',
		'/category/blog/page/6/' => '/blog/',
		'/category/blog/page/7/' => '/blog/',
		'/category/blog/page/8/' => '/blog/',
		'/category/blog/page/9/' => '/blog/',
		'/category/uncategorized/' => '/blog/',
	];

	foreach ($custom_canonical as $url => $canonical) {
		$domain = get_home_url();

		if ($domain . $url == $canonical_url) {
			return $domain . $canonical;
		}
	}

	return $canonical_url;
}
add_filter( 'aioseo_canonical_url', 'aioseo_filter_canonical_url' );