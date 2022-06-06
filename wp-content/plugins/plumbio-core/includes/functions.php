<?php
// Silence is golden.
function plumbio_post_thumbnail_image( $size = 'full' ) {
	$plumbio_featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'plumbio_galleries_home' );
	?>
	<picture>
		<source type="image/jpeg" srcset="<?php echo esc_url( $plumbio_featured_image_url ); ?>">
		<img src="<?php echo esc_url( $plumbio_featured_image_url ); ?>" alt="<?php esc_attr_e( 'Img', 'plumbio' ); ?>">
	</picture>
	<?php
}
/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param  string $string
 * @return string
 */
function plumbio_kses_basic( $string = '' ) {
	return wp_kses( $string, plumbio_get_allowed_html_tags( 'basic' ) );
}

/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param  string $string
 * @return string
 */
function plumbio_kses_intermediate( $string = '' ) {
	return wp_kses( $string, plumbio_get_allowed_html_tags( 'intermediate' ) );
}



function plumbio_get_allowed_html_tags( $level = 'basic' ) {
	$allowed_html = array(
		'b'      => array(),
		'i'      => array(),
		'u'      => array(),
		'em'     => array(),
		'br'     => array(),
		'abbr'   => array(
			'title' => array(),
		),
		'span'   => array(
			'class' => array(),
		),
		'strong' => array(),
	);

	if ( $level === 'intermediate' ) {
		$allowed_html['a'] = array(
			'href'  => array(),
			'title' => array(),
			'class' => array(),
			'id'    => array(),
		);
	}

	return $allowed_html;
}

add_action( 'plumbio_gird_list_view', 'plumbio_gird_list_view_fun' );
function plumbio_gird_list_view_fun() {
	 $shop_cat_term_id_one                    = isset( get_queried_object()->term_id ) ? get_queried_object()->term_id : '';
	$plumbio_theme_metabox_plumbio_shop_style = get_term_meta( $shop_cat_term_id_one, 'plumbio_theme_metabox_plumbio_shop_style', true );
	$shop_page_url                            = get_permalink( wc_get_page_id( 'shop' ) );
	?>
	<div class="menu-box">
		<?php if ( $plumbio_theme_metabox_plumbio_shop_style == '4' || $plumbio_theme_metabox_plumbio_shop_style == '5' ) { ?>
			<a href="<?php echo esc_url( $shop_page_url ); ?>" class="grid"><i class="flaticon-menu"></i></a>
			<a href="<?php echo esc_url( $shop_page_url ); ?>" class="list active"><i class="flaticon-list"></i></a>
		<?php } else { ?>
			<a href="<?php echo esc_url( $shop_page_url ); ?>" class="grid active"><i class="flaticon-menu"></i></a>
			<a href="<?php echo esc_url( $shop_page_url ); ?>" class="list"><i class="flaticon-list"></i></a>
		<?php } ?>
	</div>
	<?php
}


function videocafe_sc_heading( $atts, $content = null ) {
	extract(
		shortcode_atts(
			array(
				'title_text' => '',
			),
			$atts,
			'heading'
		)
	);

	return '<h4 class="widget_title">' . $title_text . '</h4>';
}
add_shortcode( 'heading', 'videocafe_sc_heading' );


add_shortcode( 'videocafe-category-checklist', 'videocafe_category_checklist' );
function videocafe_category_checklist( $atts ) {
	// process passed arguments or assign WP defaults
	$atts = shortcode_atts(
		array(
			'post_id'              => 0,
			'descendants_and_self' => 0,
			'selected_cats'        => false,
			'popular_cats'         => false,
			'checked_ontop'        => true,
		),
		$atts,
		'videocafe-category-checklist'
	);

	// string to bool conversion, so the bool params work as expected
	$atts['selected_cats'] = to_bool( $atts['selected_cats'] );
	$atts['popular_cats']  = to_bool( $atts['popular_cats'] );
	$atts['checked_ontop'] = to_bool( $atts['checked_ontop'] );

	// load template.php from admin, where wp_category_checklist() is defined
	include_once ABSPATH . '/wp-admin/includes/template.php';

	// generate the checklist
	ob_start();
	?>
	<div class="categorydiv">
		<ul class="category-tabs">
			<div id="taxonomy-category" class="categorydiv">
				<div id="category-all" class="tabs-panel">
					<ul id="categorychecklist" data-wp-lists="list:category" class="categorychecklist form-no-clear">
						<?php
						wp_category_checklist(
							$atts['post_id'],
							$atts['descendants_and_self'],
							$atts['selected_cats'],
							$atts['popular_cats'],
							null,
							$atts['checked_ontop']
						);
						?>
					</ul>
				</div>
			</div>
		</ul>
	</div>

	<?php
	return ob_get_clean();
}
function to_bool( $bool ) {
	return ( is_bool( $bool ) ? $bool : ( is_numeric( $bool ) ? ( (bool) intval( $bool ) ) : $bool !== 'false' ) );
}
if ( ! function_exists( 'plumbio_options' ) ) :

	function cameron_options() {
		global $cameron_options;
		$opt_pref = 'cameron_';
		if ( empty( $cameron_options ) ) {
			$cameron_options = get_option( $opt_pref . 'options' );
		}
		return $cameron_options;
	}
endif;

if ( ! function_exists( 'plumbio_public_header_control' ) ) {
	function plumbio_public_header_control( $obj, $dflthdr ) {
		$obj->start_controls_section(
			'public_header_typography',
			array(
				'label' => __( 'Header', 'plumbio-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$obj->add_control(
			'public_header_tag',
			array(
				'label'   => __( 'Header Tag', 'plumbio-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'p'    => 'p',
					'span' => 'span',
				),
				'default' => $dflthdr,
			)
		);

		$obj->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'public_header_typography',
				'label'    => __( 'Header', 'plumbio-core' ),
				'selector' => '{{WRAPPER}} .typo-header-text',
			)
		);

		$obj->add_control(
			'public_header_color',
			array(
				'label'     => __( 'Header Color', 'plumbio-core' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .typo-header-text' => 'color: {{VALUE}} !important',
				),
			)
		);

		$obj->end_controls_section();
	}
}

if ( ! function_exists( 'plumbio_public_tagline_control' ) ) {
	function plumbio_public_tagline_control( $obj, $dflttl ) {
		$obj->start_controls_section(
			'public_tagline_typography',
			array(
				'label' => __( 'Tagline', 'plumbio-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$obj->add_control(
			'public_tagline_tag',
			array(
				'label'   => __( 'Header Tag', 'plumbio-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'p'    => 'p',
					'span' => 'span',
				),
				'default' => $dflttl,
			)
		);

		$obj->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'public_tagline_typography',
				'label'    => __( 'Tagline', 'plumbio-core' ),
				'selector' => '{{WRAPPER}} .typo-tagline-text',
			)
		);

		$obj->add_control(
			'public_tagline_color',
			array(
				'label'     => __( 'Tagline Color', 'plumbio-core' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .typo-tagline-text' => 'color: {{VALUE}} !important',
				),
			)
		);

		$obj->end_controls_section();
	}
}

if ( ! function_exists( 'plumbio_public_title_control' ) ) {
	function plumbio_public_title_control( $obj, $dfltttl ) {
		$obj->start_controls_section(
			'public_title_typography',
			array(
				'label' => __( 'Title', 'plumbio-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$obj->add_control(
			'public_title_tag',
			array(
				'label'   => __( 'Header Tag', 'plumbio-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'p'    => 'p',
					'span' => 'span',
				),
				'default' => $dfltttl,
			)
		);

		$obj->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'public_title_typography',
				'label'    => __( 'Title', 'plumbio-core' ),
				'selector' => '{{WRAPPER}} .typo-title-text',
			)
		);

		$obj->add_control(
			'public_title_color',
			array(
				'label'     => __( 'Title Color', 'plumbio-core' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .typo-title-text' => 'color: {{VALUE}} !important',
				),
			)
		);

		$obj->end_controls_section();
	}
}


if ( ! function_exists( 'plumbio_public_item_control' ) ) {
	function plumbio_public_item_control( $obj ) {
		$obj->start_controls_section(
			'public_item_typography',
			array(
				'label' => __( 'Items', 'plumbio-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$obj->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'public_item_title_typography',
				'label'    => __( 'Title', 'plumbio-core' ),
				'selector' => '{{WRAPPER}} .typo-item_title-text',
			)
		);

		$obj->add_control(
			'public_item_title_color',
			array(
				'label'     => __( 'Title Color', 'plumbio-core' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .typo-item_title-text' => 'color: {{VALUE}} !important',
				),
			)
		);

		$obj->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'public_item_content_typography',
				'label'    => __( 'Title', 'plumbio-core' ),
				'selector' => '{{WRAPPER}} .typo-item_content-text',
			)
		);

		$obj->add_control(
			'public_item_content_color',
			array(
				'label'     => __( 'Title Color', 'plumbio-core' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .typo-item_content-text' => 'color: {{VALUE}} !important',
				),
			)
		);

		$obj->end_controls_section();
	}
}
if ( ! function_exists( 'plumbio_category_control' ) ) {
	function plumbio_category_control( $obj, $bgtitle, $default_bg, $default_class ) {
		$obj->start_controls_section(
			'public_bg' . $default_bg,
			array(
				'label' => __( $bgtitle, 'hanta-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$obj->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'public_category_typography',
				'label'    => __( 'Title', 'plumbio-core' ),
				'selector' => '{{WRAPPER}} .' . $default_class . '',
			)
		);

		$obj->add_control(
			'public_category_color',
			array(
				'label'     => __( 'Category Color', 'plumbio-core' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .' . $default_bg => 'color: {{VALUE}}',
				),
			)
		);

		$obj->end_controls_section();
	}
}


if ( ! function_exists( 'plumbio_core_elementor_library' ) ) {
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
}
