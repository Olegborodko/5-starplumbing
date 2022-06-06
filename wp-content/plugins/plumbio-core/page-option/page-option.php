<?php
function plumbio_sidebar_list() {
	$sidebars_list   = array();
	$get_all_sidebar = $GLOBALS['wp_registered_sidebars'];
	if ( ! empty( $get_all_sidebar ) ) {
		foreach ( $get_all_sidebar as $sidebar ) {
			$sidebars_list[ $sidebar['id'] ] = $sidebar['name'];
		}
	}
	return $sidebars_list;
}



add_filter( 'rwmb_meta_boxes', 'plumbio_core_page_meta_box' );
function plumbio_core_page_meta_box( $meta_boxes ) {

	$prefix     = 'plumbio_core';
	$posts_page = get_option( 'page_for_posts' );
	if ( ! isset( $_GET['post'] ) || intval( $_GET['post'] ) != $posts_page ) {
		$meta_boxes[] = array(
			'id'       => $prefix . '_page_wiget_meta_box',
			'title'    => esc_html__( 'Post Widget Settings', 'plumbio' ),
			'pages'    => array(
				'page',
			),
			'context'  => 'normal',
			'priority' => 'core',
			'fields'   => array(
				array(
					'id'      => "{$prefix}_show_breadcrumb",
					'name'    => esc_html__( 'show breadcrumb', 'plumbio' ),
					'desc'    => '',
					'type'    => 'radio',
					'std'     => 'on',
					'options' => array(
						'on'  => 'on',
						'off' => 'off',
					),
				),
				array(
					'name'    => 'Enable Sidebar',
					'id'      => "{$prefix}_page_col",
					'desc'    => '',
					'type'    => 'radio',
					'std'     => 'off',
					'options' => array(
						'on'  => 'on',
						'off' => 'off',
					),
				),
				array(
					'name'            => 'Sidebar Select',
					'id'              => "{$prefix}_page_widget_left",
					'type'            => 'select',
					'options'         => plumbio_sidebar_list(),
					'multiple'        => false,
					'placeholder'     => 'Select an Item',
					'select_all_none' => false,
				),
				array(
					'id'      => "{$prefix}_page_widget_left_right",
					'name'    => esc_html__( 'Sidebar Position', 'plumbio' ),
					'desc'    => '',
					'type'    => 'radio',
					'std'     => 'left',
					'options' => array(
						'left'  => 'Left',
						'right' => 'right',
					),
				),
				array(
					'id'      => "{$prefix}_select_footer_template",
					'name'    => esc_html__( 'Footer Top Select', 'plumbio' ),
					'type'    => 'select_advanced',
					'options' => plumbio_core_elementor_library(),
				),
				array(
					'name' => 'Page Extra Class',
					'id'   => "{$prefix}_page_extra_class",
					'type' => 'text',
				),
				array(
					'name' => 'Page Footer Class',
					'id'   => "{$prefix}_page_footer_class",
					'type' => 'text',
				),
			),
		);
	}
	return $meta_boxes;
}
add_action( 'page_advance_content_left', 'page_advance_content_left_fun', 99 );
function page_advance_content_left_fun() {
	$plumbio_core_page_widget_left_right = get_post_meta( get_the_ID(), 'plumbio_core_page_widget_left_right', true );
	if ( $plumbio_core_page_widget_left_right == 'left' ) :

		$plumbio_core_page_widget_left = get_post_meta( get_the_ID(), 'plumbio_core_page_widget_left', true );
		?>
		<?php if ( $plumbio_core_page_widget_left != '' ) { ?>
			<?php if ( is_active_sidebar( $plumbio_core_page_widget_left ) ) { ?>
				<div class="col-md-5 col-lg-4 tt-aside_wrapper left-sidebar">
					<?php dynamic_sidebar( $plumbio_core_page_widget_left ); ?>
				</div>
			<?php } ?>
		<?php } ?>
		<?php
	endif;
}

add_action( 'page_advance_content_right', 'page_advance_content_right_fun', 99 );
function page_advance_content_right_fun() {
	 $plumbio_core_page_widget_left_right = get_post_meta( get_the_ID(), 'plumbio_core_page_widget_left_right', true );
	if ( $plumbio_core_page_widget_left_right == 'right' ) :

		$plumbio_core_page_widget_left = get_post_meta( get_the_ID(), 'plumbio_core_page_widget_left', true );
		?>
		<?php if ( $plumbio_core_page_widget_left != '' ) { ?>
			<?php if ( is_active_sidebar( $plumbio_core_page_widget_left ) ) { ?>
				<div class="divider tt-visible__mobile"></div>
				<div class="col-md-5 col-lg-4 tt-aside_wrapper right-sidebar">
					<?php dynamic_sidebar( $plumbio_core_page_widget_left ); ?>
				</div>
			<?php } ?>
		<?php } ?>

		<?php
	endif;
}
