<?php
/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_prefix = 'plumbio_';
$opt_name   = 'plumbio_options';
/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	// TYPICAL -> Change these values as you need/desire
	'opt_name'             => $opt_name,
	// This is where your data is stored in the database and also becomes your global variable name.
	'display_name'         => $theme->get( 'Name' ),
	// Name that appears at the top of your panel
	'display_version'      => $theme->get( 'Version' ),
	// Version that appears at the top of your panel
	'menu_type'            => 'menu',
	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
	'allow_sub_menu'       => true,
	// Show the sections below the admin menu item or not
	'menu_title'           => esc_html__( 'Plumbio Options', 'plumbio' ),
	'page_title'           => esc_html__( 'Plumbio Options', 'plumbio' ),
	// You will need to generate a Google API key to use this feature.
	// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
	'google_api_key'       => '',
	// Set it you want google fonts to update weekly. A google_api_key value is required.
	'google_update_weekly' => false,
	// Must be defined to add google fonts to the typography module
	'async_typography'     => true,
	// Use a asynchronous font on the front end or font string
	// 'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
	'admin_bar'            => true,
	// Show the panel pages on the admin bar
	'admin_bar_icon'       => 'dashicons-portfolio',
	// Choose an icon for the admin bar menu
	'admin_bar_priority'   => 50,
	// Choose an priority for the admin bar menu
	'global_variable'      => '',
	// Set a different name for your global variable other than the opt_name
	'dev_mode'             => false,
	// Show the time the page took to load, etc
	'update_notice'        => true,
	// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
	'customizer'           => true,
	// Enable basic customizer support
	// 'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
	// 'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
	// OPTIONAL -> Give you extra features
	'page_priority'        => null,
	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_parent'          => 'themes.php',
	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	'page_permissions'     => 'manage_options',
	// Permissions needed to access the options panel.
	'menu_icon'            => '',
	// Specify a custom URL to an icon
	'last_tab'             => '',
	// Force your panel to always open to a specific tab (by id)
	'page_icon'            => 'icon-themes',
	// Icon displayed in the admin panel next to your menu_title
	'page_slug'            => '_options',
	// Page slug used to denote the panel
	'save_defaults'        => true,
	// On load save the defaults to DB before user clicks save or not
	'default_show'         => false,
	// If true, shows the default value next to each field that is not the default value.
	'default_mark'         => '',
	// What to print by the field's title if the value shown is default. Suggested: *
	'show_import_export'   => true,
	// Shows the Import/Export panel when not used as a field.
	// CAREFUL -> These options are for advanced use only
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'output'               => true,
	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
	'output_tag'           => true,
	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
	// 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	'database'             => '',
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'use_cdn'              => true,
	// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
	// 'compiler'             => true,
);
Redux::setArgs( $opt_name, $args );
Redux::setSection(
	$opt_name,
	array(
		'title'  => esc_html__( 'Base theme option', 'plumbio' ),
		'id'     => 'base_theme_option',
		'desc'   => esc_html__( 'Change Base theme option here', 'plumbio' ),
		'icon'   => 'el el-home',
		'fields' => array(
			array(
				'id'      => $opt_prefix . 'back_to_top_on_off',
				'type'    => 'switch',
				'title'   => esc_html__( 'Back To Top on off switch', 'plumbio' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'plumbio' ),
				'off'     => esc_html__( 'Disable', 'plumbio' ),
			),
			array(
				'id'      => $opt_prefix . 'theme_base_css',
				'type'    => 'switch',
				'title'   => esc_html__( 'theme base css', 'plumbio' ),
				'default' => false,
				'on'      => esc_html__( 'Enable', 'plumbio' ),
				'off'     => esc_html__( 'Disable', 'plumbio' ),
			),
		),
	)
);
	Redux::setSection(
		$opt_name,
		array(
			'title'  => esc_html__( 'Header Option', 'plumbio' ),
			'id'     => 'header_theme_option',
			'desc'   => esc_html__( 'Change Header option here', 'plumbio' ),
			'icon'   => 'el el-home',
			'fields' => array(
				array(
					'id'      => $opt_prefix . 'header_style',
					'type'    => 'select',
					'title'   => esc_html__( 'Header Style', 'plumbio' ),
					'options' => array(
						'1'         => esc_html__( 'Style One', 'plumbio' ),
						'elementor' => esc_html__( 'Elementor Header', 'plumbio' ),
					),
					'default' => '1',
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( 'elementor' ) ),
					'id'       => $opt_prefix . 'header_elementor',
					'type'     => 'select',
					'title'    => esc_html__( 'Header Elementor Template', 'plumbio' ),
					'options'  => plumbio_elementor_library(),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_addess',
					'type'     => 'text',
					'title'    => esc_html__( 'Address', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_email',
					'type'     => 'text',
					'title'    => esc_html__( 'Email', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_hours',
					'type'     => 'text',
					'title'    => esc_html__( 'Office Hours', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_phone_title',
					'type'     => 'text',
					'title'    => esc_html__( 'Phone Title', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_phone_number',
					'type'     => 'text',
					'title'    => esc_html__( 'Phone Number', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_social_title',
					'type'     => 'text',
					'title'    => esc_html__( 'Social Title', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_social_facebook',
					'type'     => 'text',
					'title'    => esc_html__( 'Facebook URL', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_social_twitter',
					'type'     => 'text',
					'title'    => esc_html__( 'Twitter URL', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_social_linkedin',
					'type'     => 'text',
					'title'    => esc_html__( 'Linkedin URL', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_social_skype',
					'type'     => 'text',
					'title'    => esc_html__( 'Skype URL', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_social_insta',
					'type'     => 'text',
					'title'    => esc_html__( 'Instagram URL', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'          => $opt_prefix . 'header_top_bar_social',
					'type'        => 'slides',
					'title'       => esc_html__( 'More social links', 'plumbio' ),
					'placeholder' => array(
						'title' => __( 'Image or svg alt text', 'plumbio' ),
						'url'   => __( 'single url of social link', 'plumbio' ),
					),
					'show'        => array(
						'title'       => true,
						'description' => false,
						'url'         => true,
					),
				), 
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_button_text',
					'type'     => 'text',
					'title'    => esc_html__( 'Button Text', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_button_url',
					'type'     => 'text',
					'title'    => esc_html__( 'Button URL', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_cart_onoff',
					'type'     => 'switch',
					'title'    => esc_html__( 'Header Cart on/off switch', 'plumbio' ),
					'default'  => false,
					'on'       => esc_html__( 'Enable', 'plumbio' ),
					'off'      => esc_html__( 'Disable', 'plumbio' ),
				),
			),
		)
	);
	Redux::setSection(
		$opt_name,
		array(

			'title'      => esc_html__( 'Header Sidebar', 'plumbio' ),
			'id'         => 'sidebar_header_option',
			'subsection' => true,
			'desc'       => esc_html__( 'Change Header option here', 'plumbio' ),
			'icon'       => 'el el-home',
			'fields'     => array(
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_sidebar_onoff',
					'type'     => 'switch',
					'title'    => esc_html__( 'Header Sidebar on off switch', 'plumbio' ),
					'default'  => false,
					'on'       => esc_html__( 'Enable', 'plumbio' ),
					'off'      => esc_html__( 'Disable', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'header_sidebar_onoff', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'header_sidebar_template',
					'type'     => 'select',
					'title'    => esc_html__( 'Sidebar Elementor Template', 'plumbio' ),
					'options'  => plumbio_elementor_library(),
				),
			),
		)
	);
	Redux::setSection(
		$opt_name,
		array(
			'title'      => esc_html__( 'Sticky Header', 'plumbio' ),
			'id'         => 'sticky_header_option',
			'subsection' => true,
			'desc'       => esc_html__( 'Change Header option here', 'plumbio' ),
			'icon'       => 'el el-home',
			'fields'     => array(
				array(
					'required' => array( $opt_prefix . 'header_style', '=', array( '1' ) ),
					'id'       => $opt_prefix . 'sticky_header_on',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sticky header on off switch', 'plumbio' ),
					'default'  => false,
					'on'       => esc_html__( 'Enable', 'plumbio' ),
					'off'      => esc_html__( 'Disable', 'plumbio' ),
				),
			),
		)
	);
	Redux::setSection(
		$opt_name,
		array(
			'title'            => esc_html__( 'Modal Settings', 'plumbio' ),
			'id'               => 'modal_settings',
			'desc'             => esc_html__( 'These are really basic fields!', 'plumbio' ),
			'customizer_width' => '400px',
			'icon'             => 'el el-share',
			'fields'           => array(
				array(
					'id'      => $opt_prefix . 'modal_title',
					'type'    => 'text',
					'title'   => esc_html__( 'Modal Title', 'plumbio' ),
					'default' => esc_html__( 'Schedule Service Online', 'plumbio' ),
				),
				array(
					'id'      => $opt_prefix . 'modal_subtitle',
					'type'    => 'textarea',
					'title'   => esc_html__( 'Modal Subtitle', 'plumbio' ),
					'default' => esc_html__( 'Our courteous plumbers work around your busy schedule and we never charge extra for Same Day Service, Evenings, and Saturday or Sunday appointments.', 'plumbio' ),
				),
				array(
					'id'       => $opt_prefix . 'modal_form',
					'type'     => 'text',
					'title'    => esc_html__( 'Modal Form', 'plumbio' ),
					'subtitle' => esc_html__( 'Please Put Modal Form Shortcode', 'plumbio' ),
				),
				array(
					'id'      => $opt_prefix . 'date_format',
					'type'    => 'text',
					'title'   => esc_html__( 'Date Format', 'plumbio' ),
					'default' => esc_html__( 'mm/dd/yyyy', 'plumbio' ),
				),
			),
		)
	);
	Redux::setSection(
		$opt_name,
		array(
			'title'            => esc_html__( 'Typography', 'plumbio' ),
			'id'               => 'fonts_settings',
			'desc'             => esc_html__( 'Typography', 'plumbio' ),
			'customizer_width' => '400px',
			'icon'             => 'el el-font',
			'fields'           => array(
				array(
					'id'       => 'enable_typography',
					'type'     => 'switch',
					'title'    => esc_html__( 'Typography', 'plumbio' ),
					'subtitle' => esc_html__( 'Enable or Disable Typography', 'plumbio' ),
					'default'  => false,
					'off'      => esc_html__( 'Disable', 'plumbio' ),
					'on'       => esc_html__( 'Enable', 'plumbio' ),
				),
				array(
					'required'   => array( 'enable_typography', '=', '1' ),
					'id'         => $opt_prefix . '-body_typography',
					'type'       => 'typography',
					'title'      => esc_html__( 'Body Typography', 'plumbio' ),
					'subtitle'   => esc_html__( 'Select body font family, size, line height, color and weight.', 'plumbio' ),
					'text-align' => false,
					'subsets'    => false,
					'output'     => array( 'body' ),

				),
				array(
					'required'   => array( 'enable_typography', '=', '1' ),
					'id'         => $opt_prefix . '-heading-1-typography',
					'type'       => 'typography',
					'title'      => esc_html__( 'H1 Font', 'plumbio' ),
					'subtitle'   => esc_html__( 'Select heading font family and weight.', 'plumbio' ),
					'google'     => true,
					'text-align' => false,
					'output'     => array( 'h1' ),
				),
				array(
					'required'   => array( 'enable_typography', '=', '1' ),
					'id'         => $opt_prefix . '-heading-2-typography',
					'type'       => 'typography',
					'title'      => esc_html__( 'H2 Font', 'plumbio' ),
					'subtitle'   => esc_html__( 'Select heading font family and weight.', 'plumbio' ),
					'google'     => true,
					'text-align' => false,
					'output'     => array( 'h2' ),

				),
				array(
					'required'   => array( 'enable_typography', '=', '1' ),
					'id'         => $opt_prefix . '-heading-3-typography',
					'type'       => 'typography',
					'title'      => esc_html__( 'H3 Font', 'plumbio' ),
					'subtitle'   => esc_html__( 'Select heading font family and weight.', 'plumbio' ),
					'google'     => true,
					'text-align' => false,
					'output'     => array( 'h3' ),
				),
				array(
					'required'   => array( 'enable_typography', '=', '1' ),
					'id'         => $opt_prefix . '-heading-4-typography',
					'type'       => 'typography',
					'title'      => esc_html__( 'H4 Font', 'plumbio' ),
					'subtitle'   => esc_html__( 'Select heading font family and weight.', 'plumbio' ),
					'google'     => true,
					'text-align' => false,
					'output'     => array( 'h4' ),
				),
				array(
					'required'   => array( 'enable_typography', '=', '1' ),
					'id'         => $opt_prefix . '-heading-5-typography',
					'type'       => 'typography',
					'title'      => esc_html__( 'H5 Font', 'plumbio' ),
					'subtitle'   => esc_html__( 'Select heading font family and weight.', 'plumbio' ),
					'google'     => true,
					'text-align' => false,
					'output'     => array( 'h5' ),
				),
				array(
					'required'   => array( 'enable_typography', '=', '1' ),
					'id'         => $opt_prefix . '-heading-6-typography',
					'type'       => 'typography',
					'title'      => esc_html__( 'H6 Font', 'plumbio' ),
					'subtitle'   => esc_html__( 'Select heading font family and weight.', 'plumbio' ),
					'google'     => true,
					'text-align' => false,
					'output'     => array( 'h6' ),
				),

			),
		)
	);
	Redux::setSection(
		$opt_name,
		array(
			'title'  => esc_html__( 'Color Option', 'plumbio' ),
			'id'     => 'color_area',
			'desc'   => esc_html__( 'Chnage Color option here', 'plumbio' ),
			'icon'   => 'el el-home',
			'fields' => array(
				array(
					'id'          => $opt_prefix . 'primary_color',
					'type'        => 'color',
					'title'       => esc_html__( 'Primary Color', 'plumbio' ),
					'subtitle'    => esc_html__( 'Pick a color for the theme (default: #0c4c93).', 'plumbio' ),
					'validate'    => 'color',
					'transparent' => false,
				),
				array(
					'id'          => $opt_prefix . 'secondary_color',
					'type'        => 'color',
					'title'       => esc_html__( 'Secondary Color', 'plumbio' ),
					'subtitle'    => esc_html__( 'Pick a color for the theme (default: #51acfb).', 'plumbio' ),
					'validate'    => 'color',
					'transparent' => false,
				),
				array(
					'id'          => $opt_prefix . 'third_color',
					'type'        => 'color',
					'title'       => esc_html__( 'Third Color', 'plumbio' ),
					'subtitle'    => esc_html__( 'Pick a color for the theme (default: #51acfb).', 'plumbio' ),
					'validate'    => 'color',
					'transparent' => false,
				),
			),
		)
	);
	Redux::setSection(
		$opt_name,
		array(
			'title'  => esc_html__( 'Breadcrumb area', 'plumbio' ),
			'id'     => 'breadcrumb_area',
			'icon'   => 'el el-home',
			'fields' => array(
				array(
					'id'    => $opt_prefix . 'breadcrumb_bg',
					'type'  => 'media',
					'url'   => true,
					'title' => esc_html__( 'Breadcrumb Background', 'plumbio' ),
				),
				array(
					'id'      => $opt_prefix . 'blog_breadcrumb_switch',
					'type'    => 'switch',
					'title'   => esc_html__( 'Blog breadcrumb on off switch', 'plumbio' ),
					'default' => false,
					'on'      => esc_html__( 'Enable', 'plumbio' ),
					'off'     => esc_html__( 'Disable', 'plumbio' ),
				),
				array(
					'required' => array( $opt_prefix . 'blog_breadcrumb_switch', '=', '1' ),
					'id'       => $opt_prefix . 'blog_breadcrumb_content',
					'type'     => 'text',
					'title'    => esc_html__( 'Blog breadcrumb title', 'plumbio' ),
					'default'  => esc_html__( 'Blog Page', 'plumbio' ),
				),
			),
		)
	);
	Redux::setSection(
		$opt_name,
		array(
			'title'  => esc_html__( 'Blog option', 'plumbio' ),
			'id'     => 'blog_option_panale',
			'desc'   => esc_html__( 'Change blog option', 'plumbio' ),
			'icon'   => 'el el-home',
			'fields' => array(
				array(
					'id'      => $opt_prefix . 'blog_single_social',
					'type'    => 'switch',
					'title'   => esc_html__( 'Social Share', 'plumbio' ),
					'default' => false,
					'on'      => esc_html__( 'Enable', 'plumbio' ),
					'off'     => esc_html__( 'Disable', 'plumbio' ),
				),
				array(
					'id'      => $opt_prefix . 'blog_author_switch',
					'type'    => 'switch',
					'title'   => esc_html__( 'Author Box', 'plumbio' ),
					'default' => false,
					'on'      => esc_html__( 'Enable', 'plumbio' ),
					'off'     => esc_html__( 'Disable', 'plumbio' ),
				),
			),
		)
	);
	Redux::setSection(
		$opt_name,
		array(
			'title'  => esc_html__( 'Footer', 'plumbio' ),
			'id'     => 'footer',
			'icon'   => 'el el-home',
			'fields' => array(
				array(
					'id'    => $opt_prefix . 'copyright',
					'type'  => 'textarea',
					'title' => esc_html__( 'Copyright', 'plumbio' ),
				),
				array(
					'id'      => $opt_prefix . 'footer_widget_elementor',
					'type'    => 'select',
					'title'   => esc_html__( 'Footer Elementor Template', 'plumbio' ),
					'options' => plumbio_elementor_library(),
				),
			),
		)
	);
