<?php
/**
 * Register meta boxes
 *
 * @return void
 */


add_filter( 'rwmb_meta_boxes', 'plumbio_theme_meta_box' );

function plumbio_theme_meta_box( $meta_boxes ) {

	$prefix = 'plumbio_theme_metabox';

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-quote',
		'title'     => esc_html__( 'Post Format Data', 'plumbio-core' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',

		'fields'    => array(
			array(
				'name' => esc_html__( 'Quote Author', 'plumbio-core' ),
				'desc' => esc_html__( 'Insert quote author name.', 'plumbio-core' ),
				'id'   => "{$prefix}_quote_author",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Quote Author Designation', 'plumbio-core' ),
				'desc' => esc_html__( 'Insert author Designation.', 'plumbio-core' ),
				'id'   => "{$prefix}_quote_author_designation",
				'type' => 'text',
			),
			array(
				'name'              => esc_html__( 'Quote Text', 'plumbio-core' ),
				'desc'              => esc_html__( 'Insert Quote Text.', 'plumbio-core' ),
				'id'                => "{$prefix}_quote",
				'type'              => 'textarea',
				'sanitize_callback' => 'none',
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-video',
		'title'     => esc_html__( 'Post Format Data', 'plumbio-core' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',

		'fields'    => array(
			array(
				'name' => esc_html__( 'Video Link', 'plumbio-core' ),
				'desc' => esc_html__( 'Put link of video. i.e. youtube, vimeo', 'plumbio-core' ),
				'id'   => "{$prefix}_video_link",
				'type' => 'text',
				'cols' => 20,
				'rows' => 3,
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-audio',
		'title'     => esc_html__( 'Post Format Data', 'plumbio-core' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',

		'fields'    => array(
			array(
				'name'              => esc_html__( 'Audio Markup', 'plumbio-core' ),
				'desc'              => esc_html__( 'Put embed src of soundcloud.', 'plumbio-core' ),
				'id'                => "{$prefix}_audio_markup",
				'type'              => 'textarea',
				'cols'              => 20,
				'rows'              => 3,
				'sanitize_callback' => 'none',
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-link',
		'title'     => esc_html__( 'Post Format Data', 'plumbio-core' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',

		'fields'    => array(
			array(
				'name' => esc_html__( 'Link title', 'plumbio-core' ),
				'desc' => esc_html__( 'Works with link post format.', 'plumbio-core' ),
				'id'   => "{$prefix}_link_title",
				'type' => 'text',
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-gallery',
		'title'     => esc_html__( 'Post Format Data', 'plumbio-core' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',

		'fields'    => array(

			array(
				'name'             => esc_html__( 'Upload Gallery Images', 'plumbio-core' ),
				'id'               => "{$prefix}_gallery",
				'desc'             => '',
				'type'             => 'image_advanced',
				'max_file_uploads' => 24,

			),
		),
	);

	return $meta_boxes;
}
