<?php
/*
  Plugin Name: Plumbio Core
  Plugin URI: http://smartdatasoft.com/
  Description: Helping for the Plumbio theme.
  Author: SmartDataSoft Team
  Version: 1.5
  Author URI: http://smartdatasoft.com/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/breadcrumb-navxt/breadcrumb-navxt.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/page-option/page-option.php';
require_once __DIR__ . '/meta-box/config-meta-box.php';

/**
 * The main plugin class
 */
final class Plumbio_Helper {


	/**
	 * Plugin version
	 *
	 * @var string
	 */
	const version = '1.0';


	/**
	 * Plugin Version
	 *
	 * @since 1.2.0
	 * @var   string The plugin version.
	 */
	const VERSION = '1.2.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.2.0
	 * @var   string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.2.0
	 * @var   string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Constructor
	 *
	 * @since  1.0.0
	 * @access public
	 */

	/**
	 * Class construcotr
	 */
	private function __construct() {
		$this->define_constants();
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );
	}

	/**
	 * Initializes a singleton instance
	 *
	 * @return \Plumbio
	 */
	public static function init() {
		 static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}


	/**
	 * Define the required plugin constants
	 *
	 * @return void
	 */
	public function define_constants() {
		define( 'PLUMBIO_CORE_VERSION', self::version );
		define( 'PLUMBIO_CORE_FILE', __FILE__ );
		define( 'PLUMBIO_CORE_PATH', __DIR__ );
		define( 'PLUMBIO_CORE_URL', plugin_dir_url( __FILE__ ) );
		define( 'PLUMBIO_CORE_ASSETS_DEPENDENCY_CSS', PLUMBIO_CORE_URL . '/assets/elementor/css/' );
		define( 'PLUMBIO_CORE_ASSETS', PLUMBIO_CORE_URL . 'assets' );
		$theme = wp_get_theme();
		define( 'THEME_VERSION_CORE', $theme->Version );
	}

	/**
	 * Initialize the plugin
	 *
	 * @return void
	 */
	public function init_plugin() {
		 $this->checkElementor();
		load_plugin_textdomain( 'plumbio-core', false, basename( dirname( __FILE__ ) ) . '/languages' );
		new Plumbio\Helper\Posttype();
		new \Plumbio\Helper\Hooks();
		// sidebar generator
		new \Plumbio\Helper\Sidebar_Generator();

		new \Plumbio\Helper\Widgets();
		if ( did_action( 'elementor/loaded' ) ) {
			new \Plumbio\Helper\Elementor();
		}

		if ( is_admin() ) {
			new \Plumbio\Helper\Admin();
		}
	}

	public function checkElementor() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = '<p>If you want to use Elementor Version of "<strong>plumbio</strong>" Theme, Its requires "<strong>Elementor</strong>" to be installed and activated.</p>';

		// $message = sprintf(
		// * translators: 1: Plugin name 2: Elementor */
		// esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'elementor-hello-world'), '<strong>' . esc_html__('Elementor ChildIt', 'elementor-hello-world') . '</strong>', '<strong>' . esc_html__('Elementor', 'elementor-hello-world') . '</strong>'
		// esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'elementor-hello-world'), '<strong>' . esc_html__('If you want to use Elementor Version of Theme, ', 'elementor-hello-world') . '</strong>', '<strong>' . esc_html__('Elementor', 'elementor-hello-world') . '</strong>'
		// );

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-hello-world' ),
			'<strong>' . esc_html__( 'Elementor ChildIt', 'elementor-hello-world' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-hello-world' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'plumbio-core' ),
			'<strong>' . esc_html__( 'Elementor ChildIt', 'plumbio-core' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'plumbio-core' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}


	/**
	 * Do stuff upon plugin activation
	 *
	 * @return void
	 */
	public function activate() {
		$installer = new Plumbio\Helper\Installer();
		$installer->run();
	}
}

/**
 * Initializes the main plugin
 *
 * @return \Plumbio
 */
function Plumbio() {
	return Plumbio_Helper::init();
}

// kick-off the plugin
Plumbio();




function plumbio_get_contact_form_7_posts() {
	$args    = array(
		'post_type'      => 'wpcf7_contact_form',
		'posts_per_page' => -1,
	);
	$catlist = array();

	if ( $categories = get_posts( $args ) ) {
		foreach ( $categories as $category ) {
			(int) $catlist[ $category->ID ] = $category->post_title;
		}
	} else {
		(int) $catlist['0'] = esc_html__( 'No contect From 7 form found', 'plumbio-core' );
	}
	return $catlist;
}


// Get The Menu List
function plumbio_get_menu_list() {
	$menulist = array();
	$menus    = get_terms( 'nav_menu' );
	foreach ( $menus as $menu ) {
		$menulist[ $menu->name ] = $menu->name;
	}
	return $menulist;
}
// Put it on the output side

// Get The Menu List


// Enqueue Style During Editing
add_action(
	'elementor/editor/before_enqueue_styles',
	function () {
		wp_enqueue_style( 'elementor-stylesheet', plugins_url() . '/plumbio-core/assets/elementor/stylesheets.css', true );
	}
);

/**
 * Passing Classes to Menu
 */
add_action(
	'wp_nav_menu_item_custom_fields',
	function ( $item_id, $item ) {
		if ( $item->menu_item_parent == '0' ) {
			$show_as_megamenu = get_post_meta( $item_id, '_show-as-megamenu', true ); ?>
		<p class="description-wide">
			<label for="megamenu-item-<?php echo $item_id; ?>"> <input type="checkbox" id="megamenu-item-<?php echo $item_id; ?>" name="megamenu-item[<?php echo $item_id; ?>]" <?php checked( $show_as_megamenu, true ); ?> /><?php _e( 'Mega menu', 'sds' ); ?>
			</label>
		</p>
			<?php
		}
	},
	10,
	2
);

add_action(
	'wp_update_nav_menu_item',
	function ( $menu_id, $menu_item_db_id ) {
		$button_value = ( isset( $_POST['megamenu-item'][ $menu_item_db_id ] ) && $_POST['megamenu-item'][ $menu_item_db_id ] == 'on' ) ? true : false;
		update_post_meta( $menu_item_db_id, '_show-as-megamenu', $button_value );
	},
	10,
	2
);

add_filter(
	'nav_menu_css_class',
	function ( $classes, $menu_item ) {
		if ( $menu_item->menu_item_parent == '0' ) {
			$show_as_megamenu = get_post_meta( $menu_item->ID, '_show-as-megamenu', true );
			if ( $show_as_megamenu ) {
				$classes[] = 'megamenu';
			}
		}
		return $classes;
	},
	10,
	2
);


/**
 * plumbio search popup compatibility.
 */
function plumbio_blog_social() {
	?>
		<li><a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://twitter.com/home?status=<?php echo urlencode( get_the_title() ); ?>-<?php echo esc_url( get_permalink() ); ?>" class="icon-733635"></a></li>
		<li><a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" class="icon-59439"></a></li>
		<li><a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url( get_permalink() ); ?>" class="icon-2111532"></a></li>
	<?php
}
add_action( 'plumbio_blog_social', 'plumbio_blog_social' );

function plumbio_core_elementor_library() {
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
