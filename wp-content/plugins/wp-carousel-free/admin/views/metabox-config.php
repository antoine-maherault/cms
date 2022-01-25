<?php
/**
 * The Metabox  configuration
 *
 * @package WP Carousel
 * @subpackage wp-carousel-free/admin/views
 */

if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access pages directly.

//
// Metabox of the uppers section / Upload section.
// Set a unique slug-like ID.
//
$wpcp_carousel_content_source_settings = 'sp_wpcp_upload_options';

/**
 * Preview metabox.
 *
 * @param string $prefix The metabox main Key.
 * @return void
 */
SP_WPCF::createMetabox(
	'sp_wpcf_live_preview',
	array(
		'title'        => __( 'Live Preview', 'wp-carousel-free' ),
		'post_type'    => 'sp_wp_carousel',
		'show_restore' => false,
		'context'      => 'normal',
	)
);

SP_WPCF::createSection(
	'sp_wpcf_live_preview',
	array(
		'fields' => array(
			array(
				'type' => 'preview',
			),
		),
	)
);

//
// Create a metabox.
//
SP_WPCF::createMetabox(
	$wpcp_carousel_content_source_settings,
	array(
		'title'        => __( 'WordPress Carousel', 'wp-carousel-free' ),
		'post_type'    => 'sp_wp_carousel',
		'show_restore' => false,
		'context'      => 'normal',
	)
);

//
// Create a section.
//
SP_WPCF::createSection(
	$wpcp_carousel_content_source_settings,
	array(
		'fields' => array(
			array(
				'type'  => 'heading',
				'image' => plugin_dir_url( __DIR__ ) . 'img/wpcp-logo.svg',
				'after' => '<i class="fa fa-life-ring"></i> Support',
				'link'  => 'https://shapedplugin.com/support/?user=lite',
				'class' => 'wpcp-admin-header',
			),
			array(
				'id'      => 'wpcp_carousel_type',
				'type'    => 'carousel_type',
				'title'   => __( 'Source Type', 'wp-carousel-free' ),
				'options' => array(
					'image-carousel'   => array(
						'icon' => 'fa fa-image',
						'text' => __( 'Image', 'wp-carousel-free' ),
					),
					'post-carousel'    => array(
						'icon' => 'dashicons dashicons-admin-post',
						'text' => __( 'Post', 'wp-carousel-free' ),
					),
					'product-carousel' => array(
						'icon' => 'fa fa-cart-plus',
						'text' => __( 'Woo Product', 'wp-carousel-free' ),
					),
					'content-carousel' => array(
						'icon'     => 'fa fa-file-text-o',
						'text'     => __( 'Content', 'wp-carousel-free' ),
						'pro_only' => true,
					),
					'video-carousel'   => array(
						'icon'     => 'fa fa-play-circle-o',
						'text'     => __( 'Video', 'wp-carousel-free' ),
						'pro_only' => true,
					),
					'mix-content'      => array(
						'icon'     => 'dashicons dashicons-randomize',
						'text'     => __( 'Mix-Content', 'wp-carousel-free' ),
						'pro_only' => true,
					),
				),
				'default' => 'image-carousel',
			),
			array(
				'id'          => 'wpcp_gallery',
				'type'        => 'gallery',
				'title'       => __( 'Images', 'wp-carousel-free' ),
				'wrap_class'  => 'wpcp-gallery-filed-wrapper',
				'add_title'   => __( 'ADD IMAGE', 'wp-carousel-free' ),
				'edit_title'  => __( 'EDIT IMAGE', 'wp-carousel-free' ),
				'clear_title' => __( 'REMOVE ALL', 'wp-carousel-free' ),
				'dependency'  => array( 'wpcp_carousel_type', '==', 'image-carousel' ),
			),
			array(
				'id'         => 'wpcp_display_posts_from',
				'type'       => 'select',
				'title'      => __( 'Filter Posts', 'wp-carousel-free' ),
				'options'    => array(
					'latest'        => array(
						'text' => __( 'Latest', 'wp-carousel-free' ),
					),
					'taxonomy'      => array(
						'text'     => __( 'Taxonomy (Pro)', 'wp-carousel-free' ),
						'pro_only' => true,
					),
					'specific_post' => array(
						'text'     => __( 'Specific (Pro)', 'wp-carousel-free' ),
						'pro_only' => true,
					),
				),
				'default'    => 'latest',
				'class'      => 'chosen',
				'dependency' => array( 'wpcp_carousel_type', '==', 'post-carousel', true ),
			),

			array(
				'id'         => 'number_of_total_posts',
				'type'       => 'spinner',
				'title'      => __( 'Limit', 'wp-carousel-free' ),
				'default'    => '10',
				'min'        => 1,
				'max'        => 1000,
				'dependency' => array( 'wpcp_carousel_type', '==', 'post-carousel', true ),
			),
			// Product Carousel.
			array(
				'id'         => 'wpcp_display_product_from',
				'type'       => 'select',
				'title'      => __( 'Filter Products', 'wp-carousel-free' ),
				'options'    => array(
					'latest'            => array(
						'text' => __( 'Latest', 'wp-carousel-free' ),
					),
					'taxonomy'          => array(
						'text'     => __( 'Category (Pro)', 'wp-carousel-free' ),
						'pro_only' => true,
					),
					'specific_products' => array(
						'text'     => __( 'Specific (Pro)', 'wp-carousel-free' ),
						'pro_only' => true,
					),
				),
				'default'    => 'latest',
				'class'      => 'chosen',
				'dependency' => array( 'wpcp_carousel_type', '==', 'product-carousel', true ),
			),

			array(
				'id'         => 'wpcp_total_products',
				'type'       => 'spinner',
				'title'      => __( 'Limit', 'wp-carousel-free' ),
				'default'    => '10',
				'min'        => 1,
				'max'        => 1000,
				'dependency' => array( 'wpcp_carousel_type', '==', 'product-carousel', true ),
			),
		), // End of fields array.
	)
);

//
// Metabox for the Carousel Post Type.
// Set a unique slug-like ID.
//
$wpcp_carousel_shortcode_settings = 'sp_wpcp_shortcode_options';

//
// Create a metabox.
//
SP_WPCF::createMetabox(
	$wpcp_carousel_shortcode_settings,
	array(
		'title'        => __( 'Shortcode Section', 'wp-carousel-free' ),
		'post_type'    => 'sp_wp_carousel',
		'show_restore' => false,
		'nav'          => 'inline',
		'theme'        => 'light',
		'class'        => 'sp_wpcp_shortcode_generator',
	)
);

//
// Create a section.
//
SP_WPCF::createSection(
	$wpcp_carousel_shortcode_settings,
	array(
		'title'  => __( 'General Settings', 'wp-carousel-free' ),
		'icon'   => 'fa fa-cog',
		'fields' => array(
			array(
				'id'       => 'wpcp_layout',
				'class'    => 'wpcp_layout',
				'type'     => 'image_select',
				'title'    => __( 'Layout Type', 'wp-carousel-free' ),
				'subtitle' => __( 'Choose a layout type.', 'wp-carousel-free' ),
				'options'  => array(
					'carousel' => array(
						'image' => plugin_dir_url( __DIR__ ) . 'img/carousel.svg',
						'text'  => __( 'Carousel', 'wp-carousel-free' ),
					),
					'gallery'  => array(
						'image' => plugin_dir_url( __DIR__ ) . 'img/gallery.svg',
						'text'  => __( 'Gallery', 'wp-carousel-free' ),
					),
				),
				'default'  => 'carousel',
			),
			array(
				'id'         => 'wpcp_grid_mode',
				'class'      => 'wpcp_grid_mode',
				'type'       => 'image_select',
				'title'      => __( 'Layout Mode', 'wp-carousel-free' ),
				'subtitle'   => __( 'Choose a layout mode.', 'wp-carousel-free' ),
				'options'    => array(
					'grid'    => array(
						'image' => plugin_dir_url( __DIR__ ) . 'img/gallery.svg',
						'text'  => __( 'Even', 'wp-carousel-free' ),
					),
					'masonry' => array(
						'image'    => plugin_dir_url( __DIR__ ) . 'img/masonry.svg',
						'text'     => __( 'Masonry', 'wp-carousel-free' ),
						'pro_only' => true,
					),
				),
				'default'    => 'grid',
				'dependency' => array( 'wpcp_layout', '==', 'gallery' ),
			),
			array(
				'id'         => 'wpcp_carousel_mode',
				'type'       => 'select',
				'title'      => __( 'Carousel Mode', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set carousel mode. Carousel controls are disabled in the ticker mode.', 'wp-carousel-free' ),
				'options'    => array(
					'standard' => __( 'Standard', 'wp-carousel-free' ),
					'ticker'   => array(
						'text'     => __( 'Ticker (Pro)', 'wp-carousel-free' ),
						'pro_only' => true,
					),
					'center'   => array(
						'text'     => __( 'Center (Pro)', 'wp-carousel-free' ),
						'pro_only' => true,
					),
				),
				'default'    => 'standard',
				'dependency' => array( 'wpcp_layout', '==', 'carousel' ),
			),
			array(
				'id'       => 'wpcp_number_of_columns',
				'type'     => 'column',
				'title'    => __( 'Column(s)', 'wp-carousel-free' ),
				'subtitle' => __( 'Set number of column on devices.', 'wp-carousel-free' ),
				'default'  => array(
					'lg_desktop' => '5',
					'desktop'    => '4',
					'laptop'     => '3',
					'tablet'     => '2',
					'mobile'     => '1',
				),
				'help'     => '<i class="fa fa-television"></i><b> LARGE DESKTOP </b> - Screens larger than 1280px.<br/>
				<i class="fa fa-desktop"></i><b> DESKTOP </b> - Screens larger than 1280px.<br/>
				<i class="fa fa-laptop"></i><b> LAPTOP </b> - Screens smaller than 980px.<br/>
				<i class="fa fa-tablet"></i><b> TABLET </b> - Screens smaller than 736px.<br/>
				<i class="fa fa-mobile"></i><b> MOBILE </b> - Screens smaller than 480px.<br/>',
				'min'      => '0',
			),
			array(
				'id'         => 'wpcp_logo_link_show',
				'type'       => 'button_set',
				'title'      => __( 'Link type ', 'wp-carousel-free' ),
				'options'    => array(
					'link'  => array(
						'option_name' => __( 'Link', 'wp-carousel-free' ),
						'pro_only'    => true,
					),
					'l_box' => array(
						'option_name' => __( 'Lightbox', 'wp-carousel-free' ),
						'pro_only'    => true,
					),
					'none'  => __( 'None', 'wp-carousel-free' ),
				),
				'subtitle'   => __( 'Select a linking type for the images.', 'wp-carousel-free' ),
				'default'    => 'none',
				'dependency' => array( 'wpcp_carousel_type', '==', 'image-carousel', true ),
			),
			array(
				'id'         => 'wpcp_image_order_by',
				'type'       => 'select',
				'title'      => __( 'Order by', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set an order by option.', 'wp-carousel-free' ),
				'options'    => array(
					'menu_order' => __( 'Drag & Drop', 'wp-carousel-free' ),
					'rand'       => __( 'Random', 'wp-carousel-free' ),
				),
				'default'    => 'menu_order',
				'dependency' => array( 'wpcp_carousel_type', 'any', 'image-carousel', true ),
			),
			array(
				'id'         => 'wpcp_post_order_by',
				'type'       => 'select',
				'title'      => __( 'Order by', 'wp-carousel-free' ),
				'subtitle'   => __( 'Select an order by option.', 'wp-carousel-free' ),
				'options'    => array(
					'ID'         => __( 'ID', 'wp-carousel-free' ),
					'date'       => __( 'Date', 'wp-carousel-free' ),
					'rand'       => __( 'Random', 'wp-carousel-free' ),
					'title'      => __( 'Title', 'wp-carousel-free' ),
					'modified'   => __( 'Modified', 'wp-carousel-free' ),
					'menu_order' => __( 'Menu Order', 'wp-carousel-free' ),
				),
				'default'    => 'menu_order',
				'dependency' => array( 'wpcp_carousel_type', 'any', 'post-carousel,product-carousel', true ),
			),
			array(
				'id'         => 'wpcp_post_order',
				'type'       => 'select',
				'title'      => __( 'Order', 'wp-carousel-free' ),
				'subtitle'   => __( 'Select an order option.', 'wp-carousel-free' ),
				'options'    => array(
					'ASC'  => __( 'Ascending', 'wp-carousel-free' ),
					'DESC' => __( 'Descending', 'wp-carousel-free' ),
				),
				'default'    => 'rand',
				'dependency' => array( 'wpcp_carousel_type', 'any', 'post-carousel,product-carousel', true ),
			),
			array(
				'id'         => 'wpcp_preloader',
				'type'       => 'switcher',
				'title'      => __( 'Preloader', 'wp-carousel-free' ),
				'subtitle'   => __( 'Items will be hidden until page load completed.', 'wp-carousel-free' ),
				'text_on'    => __( 'Enabled', 'wp-carousel-free' ),
				'text_off'   => __( 'Disabled', 'wp-carousel-free' ),
				'text_width' => 96,
				'default'    => true,
			),
			// Pagination.
			array(
				'type'       => 'subheading',
				'content'    => __( 'Pagination', 'wp-carousel-free' ),
				'dependency' => array( 'wpcp_layout', '==', 'gallery', true ),
			),
			array(
				'id'         => 'wpcp_source_pagination_pro',
				'class'      => 'only_pro_switcher',
				'type'       => 'switcher',
				'text_on'    => __( 'Enabled', 'wp-carousel-free' ),
				'text_off'   => __( 'Disabled', 'wp-carousel-free' ),
				'text_width' => 95,
				'title'      => __( 'Pagination', 'wp-carousel-free' ),
				'subtitle'   => __( 'Enable to show pagination.', 'wp-carousel-free' ),
				'default'    => true,
				'dependency' => array( 'wpcp_carousel_type|wpcp_layout', '==|==', 'image-carousel|gallery', true ),
			),
			array(
				'id'         => 'wpcp_source_pagination',
				'type'       => 'switcher',
				'text_on'    => __( 'Enabled', 'wp-carousel-free' ),
				'text_off'   => __( 'Disabled', 'wp-carousel-free' ),
				'text_width' => 95,
				'title'      => __( 'Pagination', 'wp-carousel-free' ),
				'subtitle'   => __( 'Enable to show pagination.', 'wp-carousel-free' ),
				'default'    => true,
				'dependency' => array( 'wpcp_carousel_type|wpcp_layout', 'any|==', 'post-carousel,product-carousel|gallery', true ),
			),
			array(
				'id'         => 'wpcp_post_pagination_type',
				'class'      => 'wpcp_post_pagination_type',
				'type'       => 'radio',
				'title'      => __( 'Pagination Type', 'wp-carousel-free' ),
				'subtitle'   => __( 'Select pagination type.', 'wp-carousel-free' ),
				'options'    => array(
					'load_more_btn'   => __( 'Load More Button (Pro)', 'wp-carousel-free' ),
					'infinite_scroll' => __( 'Load More on Infinite Scroll (Pro)', 'wp-carousel-free' ),
					'ajax_number'     => __( 'Ajax Number Pagination (Pro)', 'wp-carousel-free' ),
					'normal'          => __( 'No Ajax (Normal Pagination)', 'wp-carousel-free' ),
				),
				'default'    => 'normal',
				'dependency' => array( 'wpcp_carousel_type|wpcp_source_pagination|wpcp_layout', 'any|==|==', 'post-carousel,product-carousel|true|gallery', true ),
			),
			array(
				'id'         => 'wpcp_pagination_type',
				'class'      => 'pro_only_field',
				'type'       => 'radio',
				'title'      => __( 'Pagination Type', 'wp-carousel-free' ),
				'subtitle'   => __( 'Select pagination type.', 'wp-carousel-free' ),
				'options'    => array(
					'load_more_btn'   => __( 'Load More Button(Ajax)', 'wp-carousel-free' ),
					'infinite_scroll' => __( 'Load More on Infinite Scroll(Ajax)', 'wp-carousel-free' ),
				),
				'default'    => 'load_more_btn',
				'dependency' => array( 'wpcp_carousel_type|wpcp_layout', '==|==', 'image-carousel|gallery', true ),
			),
			array(
				'id'         => 'post_per_page_pro',
				'class'      => 'pro_only_field',
				'type'       => 'spinner',
				'title'      => __( 'Item(s) To Show Per Page/Click', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set item(s) to show per page or click.', 'wp-carousel-free' ),
				'default'    => '8',
				'min'        => 1,
				'max'        => 10000,
				'dependency' => array( 'wpcp_carousel_type|wpcp_layout', '==|==', 'image-carousel|gallery', true ),
			),
			array(
				'id'         => 'post_per_page',
				'type'       => 'spinner',
				'title'      => __( 'Item(s) To Show Per Page/Click', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set item(s) to show per page or click.', 'wp-carousel-free' ),
				'default'    => '8',
				'min'        => 1,
				'max'        => 10000,
				'dependency' => array( 'wpcp_carousel_type|wpcp_source_pagination|wpcp_layout', 'any|==|==', 'post-carousel,product-carousel|true|gallery', true ),
			),
			array(
				'type'    => 'notice',
				'style'   => 'normal',
				'class'   => 'pro_notice',
				'content' => __( 'To unlock the 28+ dedicated options of <b>Lightbox Settings</b> tab, <a href="https://shapedplugin.com/plugin/wordpress-carousel-pro/?ref=1" target="_blank"><b>Upgrade To Pro!</b></a>', 'wp-carousel-free' ),
			),
		), // Fields array end.
	)
); // End of Upload section.


//
// Style settings section begin.
//
SP_WPCF::createSection(
	$wpcp_carousel_shortcode_settings,
	array(
		'title'  => __( 'Style Settings', 'wp-carousel-free' ),
		'icon'   => 'fa fa-paint-brush',
		'fields' => array(
			array(
				'id'         => 'section_title',
				'type'       => 'switcher',
				'title'      => __( 'Carousel Section Title', 'wp-carousel-free' ),
				'subtitle'   => __( 'Show/Hide the carousel section title.', 'wp-carousel-free' ),
				'default'    => false,
				'text_on'    => __( 'Show', 'wp-carousel-free' ),
				'text_off'   => __( 'Hide', 'wp-carousel-free' ),
				'text_width' => 75,
			),
			array(
				'id'              => 'section_title_margin_bottom',
				'type'            => 'spacing',
				'title'           => __( 'Margin Bottom from Section Title', 'wp-carousel-free' ),
				'subtitle'        => __( 'Set margin bottom from carousel section title. Default value is 30px.', 'wp-carousel-free' ),
				'all'             => true,
				'all_text'        => '<i class="fa fa-long-arrow-down"></i>',
				'units'           => array(
					'px',
				),
				'all_placeholder' => 'margin',
				'default'         => array(
					'all' => '30',
				),
				'dependency'      => array( 'section_title', '==', 'true', true ),
			),
			array(
				'id'         => 'wpcp_post_detail_position',
				'class'      => 'wpcp_post_detail_position',
				'type'       => 'image_select',
				'title'      => __( 'Content Position', 'wp-carousel-free' ),
				'subtitle'   => __( 'Select a position for the title, content, meta etc.', 'wp-carousel-free' ),
				'desc'       => __( 'To unlock the more amazing Content Positions and Settings, <a href="https://shapedplugin.com/plugin/wordpress-carousel-pro/?ref=1" target="_blank"><b>Upgrade To Pro</b></a>!', 'wp-carousel-free' ),
				'options'    => array(
					'bottom'       => array(
						'image' => plugin_dir_url( __DIR__ ) . 'img/bottom.svg',
						'text'  => __( 'Bottom', 'wp-carousel-free' ),
					),
					'top'          => array(
						'image'    => plugin_dir_url( __DIR__ ) . 'img/Top.svg',
						'text'     => __( 'Top', 'wp-carousel-free' ),
						'pro_only' => true,
					),
					'on_right'     => array(
						'image'    => plugin_dir_url( __DIR__ ) . 'img/Right.svg',
						'text'     => __( 'Right', 'wp-carousel-free' ),
						'pro_only' => true,
					),
					'on_left'      => array(
						'image'    => plugin_dir_url( __DIR__ ) . 'img/Left.svg',
						'text'     => __( 'Left', 'wp-carousel-free' ),
						'pro_only' => true,
					),
					'with_overlay' => array(
						'image'    => plugin_dir_url( __DIR__ ) . 'img/overlay.svg',
						'text'     => __( 'Overlay', 'wp-carousel-free' ),
						'pro_only' => true,
					),
				),
				'default'    => 'bottom',
				'dependency' => array( 'wpcp_carousel_type', 'any', 'image-carousel,post-carousel,product-carousel', true ),
			),
			array(
				'id'         => 'wpcp_slide_border',
				'type'       => 'border',
				'title'      => __( 'Slide Border', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set border for the slide.', 'wp-carousel-free' ),
				'all'        => true,
				'default'    => array(
					'all'   => '1',
					'style' => 'solid',
					'color' => '#dddddd',
				),
				'dependency' => array( 'wpcp_carousel_type', '!=', 'product-carousel', true ),
			),

			array(
				'id'         => 'wpcp_slide_background',
				'type'       => 'color',
				'title'      => __( 'Slide Background', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set background color for the slide.', 'wp-carousel-free' ),
				'default'    => '#f9f9f9',
				'dependency' => array( 'wpcp_carousel_type', '==', 'post-carousel', true ),
			),
			array(
				'id'         => 'wpcp_image_caption',
				'type'       => 'switcher',
				'class'      => 'only_pro_switcher',
				'title'      => __( 'Caption', 'wp-carousel-free' ),
				'subtitle'   => __( 'Show/Hide image caption.', 'wp-carousel-free' ),
				'text_on'    => __( 'Show', 'wp-carousel-free' ),
				'text_off'   => __( 'Hide', 'wp-carousel-free' ),
				'text_width' => 77,
				'default'    => false,
				'dependency' => array( 'wpcp_carousel_type', '==', 'image-carousel', true ),
			),
			array(
				'id'         => 'wpcp_image_desc',
				'type'       => 'switcher',
				'class'      => 'only_pro_switcher',
				'title'      => __( 'Description', 'wp-carousel-free' ),
				'subtitle'   => __( 'Show/Hide description.', 'wp-carousel-free' ),
				'text_on'    => __( 'Show', 'wp-carousel-free' ),
				'text_off'   => __( 'Hide', 'wp-carousel-free' ),
				'text_width' => 77,
				'default'    => false,
				'dependency' => array( 'wpcp_carousel_type', 'any', 'image-carousel,video-carousel', true ),
			),
			// Post Settings.
			array(
				'id'         => 'wpcp_post_title',
				'type'       => 'switcher',
				'title'      => __( 'Post Title', 'wp-carousel-free' ),
				'subtitle'   => __( 'Show/Hide post title.', 'wp-carousel-free' ),
				'text_on'    => __( 'Show', 'wp-carousel-free' ),
				'text_off'   => __( 'Hide', 'wp-carousel-free' ),
				'text_width' => 77,
				'default'    => true,
				'dependency' => array( 'wpcp_carousel_type', '==', 'post-carousel', true ),
			),

			array(
				'id'         => 'wpcp_post_content_show',
				'type'       => 'switcher',
				'title'      => __( 'Post Content', 'wp-carousel-free' ),
				'subtitle'   => __( 'Show/Hide post content.', 'wp-carousel-free' ),
				'text_on'    => __( 'Show', 'wp-carousel-free' ),
				'text_off'   => __( 'Hide', 'wp-carousel-free' ),
				'text_width' => 77,
				'default'    => true,
				'dependency' => array( 'wpcp_carousel_type', '==', 'post-carousel', true ),
			),
			array(
				'id'         => 'wpcp_post_content_type',
				'type'       => 'select',
				'title'      => __( 'Content Display Type', 'wp-carousel-free' ),
				'subtitle'   => __( 'Select a content display type.', 'wp-carousel-free' ),
				'options'    => array(
					'excerpt'            => array(
						'text' => __( 'Excerpt', 'wp-carousel-free' ),
					),
					'content'            => array(
						'text'     => __( 'Full Content (Pro)', 'wp-carousel-free' ),
						'pro_only' => true,
					),
					'content_with_limit' => array(
						'text'     => __( 'Content with Limit (Pro)', 'wp-carousel-free' ),
						'pro_only' => true,
					),
				),
				'default'    => 'excerpt',
				'dependency' => array( 'wpcp_carousel_type|wpcp_post_content_show', '==|==', 'post-carousel|true', true ),
			),

			array(
				'type'       => 'subheading',
				'content'    => __( 'Post Meta', 'wp-carousel-free' ),
				'dependency' => array( 'wpcp_carousel_type', '==', 'post-carousel' ),
			),

			array(
				'id'         => 'wpcp_post_date_show',
				'type'       => 'switcher',
				'title'      => __( 'Date', 'wp-carousel-free' ),
				'subtitle'   => __( 'Show/Hide post date.', 'wp-carousel-free' ),
				'text_on'    => __( 'Show', 'wp-carousel-free' ),
				'text_off'   => __( 'Hide', 'wp-carousel-free' ),
				'text_width' => 77,
				'default'    => true,
				'dependency' => array( 'wpcp_carousel_type', '==', 'post-carousel', true ),
			),
			array(
				'id'         => 'wpcp_post_author_show',
				'type'       => 'switcher',
				'title'      => __( 'Author', 'wp-carousel-free' ),
				'subtitle'   => __( 'Show/Hide post author name.', 'wp-carousel-free' ),
				'text_on'    => __( 'Show', 'wp-carousel-free' ),
				'text_off'   => __( 'Hide', 'wp-carousel-free' ),
				'text_width' => 77,
				'default'    => true,
				'dependency' => array( 'wpcp_carousel_type', '==', 'post-carousel', true ),
			),

			// Product.
			array(
				'type'       => 'subheading',
				'content'    => __( 'Product', 'wp-carousel-free' ),
				'dependency' => array( 'wpcp_carousel_type', '==', 'product-carousel', true ),
			),
			array(
				'id'         => 'wpcp_product_name',
				'type'       => 'switcher',
				'title'      => __( 'Product Name', 'wp-carousel-free' ),
				'subtitle'   => __( 'Show/Hide product name.', 'wp-carousel-free' ),
				'text_on'    => __( 'Show', 'wp-carousel-free' ),
				'text_off'   => __( 'Hide', 'wp-carousel-free' ),
				'text_width' => 77,
				'default'    => true,
				'dependency' => array( 'wpcp_carousel_type', '==', 'product-carousel', true ),
			),
			array(
				'id'         => 'wpcp_product_price',
				'type'       => 'switcher',
				'title'      => __( 'Product Price', 'wp-carousel-free' ),
				'subtitle'   => __( 'Show/Hide product price.', 'wp-carousel-free' ),
				'text_on'    => __( 'Show', 'wp-carousel-free' ),
				'text_off'   => __( 'Hide', 'wp-carousel-free' ),
				'text_width' => 77,
				'default'    => true,
				'dependency' => array( 'wpcp_carousel_type', '==', 'product-carousel', true ),
			),
			array(
				'id'         => 'wpcp_product_rating',
				'type'       => 'switcher',
				'title'      => __( 'Product Rating', 'wp-carousel-free' ),
				'subtitle'   => __( 'Show/Hide product rating.', 'wp-carousel-free' ),
				'text_on'    => __( 'Show', 'wp-carousel-free' ),
				'text_off'   => __( 'Hide', 'wp-carousel-free' ),
				'text_width' => 77,
				'default'    => true,
				'dependency' => array( 'wpcp_carousel_type', '==', 'product-carousel', true ),
			),
			array(
				'id'         => 'wpcp_product_cart',
				'type'       => 'switcher',
				'title'      => __( 'Add to Cart Button', 'wp-carousel-free' ),
				'subtitle'   => __( 'Show/Hide add to cart button.', 'wp-carousel-free' ),
				'text_on'    => __( 'Show', 'wp-carousel-free' ),
				'text_off'   => __( 'Hide', 'wp-carousel-free' ),
				'text_width' => 77,
				'default'    => true,
				'dependency' => array( 'wpcp_carousel_type', '==', 'product-carousel', true ),
			),
			// Image.
			array(
				'type'    => 'subheading',
				'content' => __( 'Image', 'wp-carousel-free' ),
			),
			array(
				'id'         => 'show_image',
				'type'       => 'switcher',
				'title'      => __( 'Image', 'wp-carousel-free' ),
				'subtitle'   => __( 'Show/Hide slide image.', 'wp-carousel-free' ),
				'text_on'    => __( 'Show', 'wp-carousel-free' ),
				'text_off'   => __( 'Hide', 'wp-carousel-free' ),
				'text_width' => 77,
				'default'    => true,
				'dependency' => array( 'wpcp_carousel_type', 'any', 'post-carousel,product-carousel', true ),
			),
			array(
				'id'         => 'wpcp_image_sizes',
				'type'       => 'image_sizes',
				'chosen'     => true,
				'title'      => __( 'Image Size', 'wp-carousel-free' ),
				'default'    => 'full',
				'subtitle'   => __( 'Set a size for the image.', 'wp-carousel-free' ),
				'dependency' => array( 'wpcp_carousel_type|show_image', 'any|==', 'image-carousel,post-carousel,product-carousel|true', true ),
			),
			array(
				'id'       => 'wpcp_image_gray_scale',
				'type'     => 'select',
				'class'    => 'wpcp_image_gray_scale_pro',
				'title'    => __( 'Image Mode', 'wp-carousel-free' ),
				'subtitle' => __( 'Set a mode for the image.', 'wp-carousel-free' ),
				'options'  => array(
					''  => __( 'Normal', 'wp-carousel-free' ),
					'1' => array(
						'text'     => __( 'Grayscale and normal on hover (Pro)', 'wp-carousel-free' ),
						'pro_only' => true,
					),
					'2' => array(
						'text'     => __( 'Grayscale on hover (Pro)', 'wp-carousel-free' ),
						'pro_only' => true,
					),
					'3' => array(
						'text'     => __( 'Always grayscale (Pro)', 'wp-carousel-free' ),
						'pro_only' => true,
					),
				),
				'default'  => '',
				'class'    => 'chosen',
			),
			array(
				'id'         => 'wpcp_image_lazy_load',
				'type'       => 'button_set',
				'title'      => __( 'Lazy Load', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set lazy load option for the image.', 'wp-carousel-free' ),
				'options'    => array(
					'false'    => __( 'Off', 'wp-carousel-free' ),
					'ondemand' => __( 'On Demand', 'wp-carousel-free' ),
				),
				'radio'      => true,
				'default'    => 'false',
				'dependency' => array( 'wpcp_carousel_type|wpcp_carousel_mode|show_image|wpcp_layout', 'any|!=|==', 'image-carousel,post-carousel,product-carousel|ticker|true|carousel', true ),
			),
			array(
				'id'         => 'wpcp_product_image_border',
				'type'       => 'border',
				'title'      => __( 'Image Border', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set border for the product image.', 'wp-carousel-free' ),
				'all'        => true,
				'default'    => array(
					'all'   => '1',
					'style' => 'solid',
					'color' => '#dddddd',
				),
				'dependency' => array( 'wpcp_carousel_type', '==', 'product-carousel', true ),
			),
			array(
				'id'         => 'wpcp_watermark',
				'class'      => 'only_pro_switcher',
				'type'       => 'switcher',
				'text_on'    => __( 'Enabled', 'wp-carousel-free' ),
				'text_off'   => __( 'Disabled', 'wp-carousel-free' ),
				'text_width' => 95,
				'title'      => __( 'Watermark', 'wp-carousel-free' ),
				'subtitle'   => __( 'Enable/Disable watermark for the image.', 'wp-carousel-free' ),
				'default'    => false,
			),
			array(
				'id'         => 'wpcp_img_protection',
				'class'      => 'only_pro_switcher',
				'type'       => 'switcher',
				'text_on'    => __( 'Enabled', 'wp-carousel-free' ),
				'text_off'   => __( 'Disabled', 'wp-carousel-free' ),
				'text_width' => 95,
				'title'      => __( 'Image Protection', 'wp-carousel-free' ),
				'subtitle'   => __( 'Enable to protect image downloading from right-click.', 'wp-carousel-free' ),
				'default'    => false,
				'dependency' => array( 'wpcp_carousel_type', '==', 'image-carousel|true' ),
			),
			array(
				'id'         => '_image_title_attr',
				'type'       => 'switcher',
				'text_on'    => __( 'Show', 'wp-carousel-free' ),
				'text_off'   => __( 'Hide', 'wp-carousel-free' ),
				'title'      => __( 'Image Title Attribute', 'wp-carousel-free' ),
				'subtitle'   => __( 'Show/Hide image title attribute.', 'wp-carousel-free' ),
				'default'    => false,
				'text_width' => 77,
				'dependency' => array( 'wpcp_carousel_type|show_image', 'any|==', 'image-carousel,post-carousel,product-carousel|true', true ),
			),
		), // End of fields array.
	)
); // Style settings section end.
//
// Carousel settings section begin.
//
SP_WPCF::createSection(
	$wpcp_carousel_shortcode_settings,
	array(
		'title'  => __( 'Carousel Settings', 'wp-carousel-free' ),
		'icon'   => 'fa fa-sliders',
		'fields' => array(
			array(
				'id'       => 'wpcp_carousel_orientation',
				'type'     => 'button_set',
				'title'    => __( 'Carousel Orientation', 'wp-carousel-free' ),
				'subtitle' => __( 'Choose a carousel orientation.', 'wp-carousel-free' ),
				'options'  => array(
					'horizontal' => __( 'Horizontal', 'wp-carousel-free' ),
					'vertical'   => array(
						'option_name' => __( 'Vertical', 'wp-carousel-free' ),
						'pro_only'    => true,
					),
				),
				'radio'    => true,
				'default'  => 'horizontal',
			),
			array(
				'id'         => 'wpcp_carousel_auto_play',
				'type'       => 'switcher',
				'title'      => __( 'AutoPlay', 'wp-carousel-free' ),
				'subtitle'   => __( 'Enable/Disable auto play.', 'wp-carousel-free' ),
				'text_on'    => __( 'Enabled', 'wp-carousel-free' ),
				'text_off'   => __( 'Disabled', 'wp-carousel-free' ),
				'text_width' => 95,
				'default'    => true,
			),
			array(
				'id'              => 'carousel_auto_play_speed',
				'type'            => 'spacing',
				'title'           => __( 'AutoPlay Speed', 'wp-carousel-free' ),
				'subtitle'        => __( 'Set auto play speed. Default value is 3000 milliseconds.', 'wp-carousel-free' ),
				'all'             => true,
				'all_text'        => false,
				'all_placeholder' => 'speed',
				'default'         => array(
					'all' => '3000',
				),
				'units'           => array(
					'ms',
				),
				'attributes'      => array(
					'min' => 0,
				),
				'dependency'      => array(
					'wpcp_carousel_auto_play',
					'==',
					'true',
				),
			),
			array(
				'id'              => 'standard_carousel_scroll_speed',
				'type'            => 'spacing',
				'title'           => __( 'Sliding Speed', 'wp-carousel-free' ),
				'subtitle'        => __( 'Set sliding or scrolling speed. Default value is 600 milliseconds.', 'wp-carousel-free' ),
				'all'             => true,
				'all_text'        => false,
				'all_placeholder' => 'speed',
				'default'         => array(
					'all' => '600',
				),
				'units'           => array(
					'ms',
				),
				'attributes'      => array(
					'min' => 0,
				),
			),

			array(
				'id'         => 'carousel_pause_on_hover',
				'type'       => 'switcher',
				'title'      => __( 'Pause on Hover', 'wp-carousel-free' ),
				'subtitle'   => __( 'Enable/Disable carousel pause on hover.', 'wp-carousel-free' ),
				'default'    => true,
				'text_on'    => __( 'Enabled', 'wp-carousel-free' ),
				'text_off'   => __( 'Disabled', 'wp-carousel-free' ),
				'text_width' => 95,
				'dependency' => array( 'wpcp_carousel_auto_play', '==', 'true', true ),
			),
			array(
				'id'         => 'carousel_infinite',
				'type'       => 'switcher',
				'title'      => __( 'Infinite Loop', 'wp-carousel-free' ),
				'subtitle'   => __( 'Enable/Disable infinite loop mode.', 'wp-carousel-free' ),
				'text_on'    => __( 'Enabled', 'wp-carousel-free' ),
				'text_off'   => __( 'Disabled', 'wp-carousel-free' ),
				'text_width' => 95,
				'default'    => true,
			),
			array(
				'id'         => 'wpcp_carousel_direction',
				'type'       => 'button_set',
				'title'      => __( 'Carousel Direction', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set carousel direction as you need.', 'wp-carousel-free' ),
				'options'    => array(
					'rtl' => __( 'Right to Left', 'wp-carousel-free' ),
					'ltr' => __( 'Left to Right', 'wp-carousel-free' ),
				),
				'radio'      => true,
				'default'    => 'rtl',
				'dependency' => array( 'wpcp_carousel_orientation', '==', 'horizontal', true ),
			),
			array(
				'id'         => 'wpcp_carousel_row',
				'class'      => 'wpcp_carousel_row_pro_only',
				'type'       => 'column',
				'title'      => __( 'Carousel Row', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set number of carousel row on device.', 'wp-carousel-free' ),
				'lg_desktop' => true,
				'desktop'    => true,
				'laptop'     => true,
				'tablet'     => true,
				'mobile'     => true,
				'default'    => array(
					'lg_desktop' => '1',
					'desktop'    => '1',
					'laptop'     => '1',
					'tablet'     => '1',
					'mobile'     => '1',
				),
			),
			array(
				'type'    => 'subheading',
				'content' => __( 'Navigation', 'wp-carousel-free' ),
			),
			// Navigation.
			array(
				'id'       => 'wpcp_navigation',
				'type'     => 'button_set',
				'title'    => __( 'Navigation', 'wp-carousel-free' ),
				'subtitle' => __( 'Show/Hide carousel navigation.', 'wp-carousel-free' ),
				'options'  => array(
					'show'        => __( 'Show', 'wp-carousel-free' ),
					'hide'        => __( 'Hide', 'wp-carousel-free' ),
					'hide_mobile' => __( 'Hide on Mobile', 'wp-carousel-free' ),
				),
				'radio'    => true,
				'default'  => 'hide_mobile',
			),

			array(
				'id'         => 'wpcp_nav_colors',
				'type'       => 'color_group',
				'title'      => __( 'Navigation Color', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set color for the carousel navigation.', 'wp-carousel-free' ),
				'options'    => array(
					'color1' => __( 'Color', 'wp-carousel-free' ),
					'color2' => __( 'Hover Color', 'wp-carousel-free' ),
				),
				'default'    => array(
					'color1' => '#aaa',
					'color2' => '#178087',
				),
				'dependency' => array( 'wpcp_navigation', '!=', 'hide' ),
			),
			// Pagination.
			array(
				'type'    => 'subheading',
				'content' => __( 'Pagination', 'wp-carousel-free' ),
			),
			array(
				'id'       => 'wpcp_pagination',
				'type'     => 'button_set',
				'title'    => __( 'Pagination', 'wp-carousel-free' ),
				'subtitle' => __( 'Show/Hide carousel pagination.', 'wp-carousel-free' ),
				'options'  => array(
					'show'        => __( 'Show', 'wp-carousel-free' ),
					'hide'        => __( 'Hide', 'wp-carousel-free' ),
					'hide_mobile' => __( 'Hide on Mobile', 'wp-carousel-free' ),
				),
				'radio'    => true,
				'default'  => 'show',
			),
			array(
				'id'         => 'wpcp_pagination_color',
				'type'       => 'color_group',
				'title'      => __( 'Pagination Color', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set color for the carousel pagination dots.', 'wp-carousel-free' ),
				'options'    => array(
					'color1' => __( 'Color', 'wp-carousel-free' ),
					'color2' => __( 'Active Color', 'wp-carousel-free' ),
				),
				'default'    => array(
					'color1' => '#cccccc',
					'color2' => '#178087',
				),
				'dependency' => array( 'wpcp_pagination', '!=', 'hide' ),
			),

			// Miscellaneous.
			array(
				'type'    => 'subheading',
				'content' => __( 'Miscellaneous', 'wp-carousel-free' ),
			),
			array(
				'id'         => 'wpcp_scheduler',
				'class'      => 'only_pro_switcher',
				'type'       => 'switcher',
				'title'      => __( 'Scheduling', 'wp-carousel-free' ),
				'subtitle'   => __( 'Enable/Disable scheduling carousel.', 'wp-carousel-free' ),
				'default'    => false,
				'text_on'    => __( 'Enabled', 'wp-carousel-free' ),
				'text_off'   => __( 'Disabled', 'wp-carousel-free' ),
				'text_width' => 95,
			),
			array(
				'id'         => 'slider_swipe',
				'type'       => 'switcher',
				'title'      => __( 'Touch Swipe', 'wp-carousel-free' ),
				'subtitle'   => __( 'Enable/Disable touch swipe mode.', 'wp-carousel-free' ),
				'text_on'    => __( 'Enabled', 'wp-carousel-free' ),
				'text_off'   => __( 'Disabled', 'wp-carousel-free' ),
				'text_width' => 96,
				'default'    => true,
			),
			array(
				'id'         => 'slider_draggable',
				'type'       => 'switcher',
				'title'      => __( 'Mouse Draggable', 'wp-carousel-free' ),
				'subtitle'   => __( 'Enable/Disable mouse draggable mode.', 'wp-carousel-free' ),
				'text_on'    => __( 'Enabled', 'wp-carousel-free' ),
				'text_off'   => __( 'Disabled', 'wp-carousel-free' ),
				'text_width' => 96,
				'default'    => true,
				'dependency' => array( 'slider_swipe', '==', 'true' ),
			),
			array(
				'id'         => 'carousel_swipetoslide',
				'type'       => 'switcher',
				'title'      => __( 'Swipe To Slide', 'wp-carousel-free' ),
				'subtitle'   => __( 'Allow users to drag or swipe directly to a slide irrespective of slides to scroll.', 'wp-carousel-free' ),
				'text_on'    => __( 'Enabled', 'wp-carousel-free' ),
				'text_off'   => __( 'Disabled', 'wp-carousel-free' ),
				'text_width' => 96,
				'default'    => false,
				'dependency' => array( 'slider_swipe', '==', 'true' ),
			),
		),
	)
); // Carousel settings section end.



//
// Typography section begin.
//
SP_WPCF::createSection(
	$wpcp_carousel_shortcode_settings,
	array(
		'title'           => __( 'Typography', 'wp-carousel-free' ),
		'icon'            => 'fa fa-font',
		'enqueue_webfont' => false,
		'fields'          => array(
			array(
				'type'    => 'notice',
				'style'   => 'normal',
				'content' => __( 'To unlock These Typography (940+ Google Fonts) options, <a href="https://shapedplugin.com/plugin/wordpress-carousel-pro/?ref=1" target="_blank"><b>Upgrade To Pro!</b></a>', 'wp-carousel-free' ),
			),
			array(
				'id'       => 'section_title_font_load',
				'type'     => 'switcher',
				'class'    => 'only_pro_switcher',
				'title'    => __( 'Load Carousel Section Title Font', 'wp-carousel-free' ),
				'subtitle' => __( 'On/Off google font for the carousel section title.', 'wp-carousel-free' ),
				'default'  => false,
			),
			array(
				'id'           => 'wpcp_section_title_typography',
				'class'        => 'disable-color-picker',
				'type'         => 'typography',
				'title'        => __( 'Carousel Section Title Font', 'wp-carousel-free' ),
				'subtitle'     => __( 'Set Carousel section title font properties.', 'wp-carousel-free' ),
				'default'      => array(
					'color'          => '#444444',
					'font-family'    => 'Open Sans',
					'font-weight'    => '600',
					'font-size'      => '24',
					'line-height'    => '28',
					'letter-spacing' => '0',
					'text-align'     => 'center',
					'text-transform' => 'none',
					'type'           => 'google',
					'unit'           => 'px',
				),
				'preview'      => 'always',
				'preview_text' => 'Carousel Section Title',
			),
			array(
				'id'         => 'wpcp_image_caption_font_load',
				'type'       => 'switcher',
				'class'      => 'only_pro_switcher',
				'title'      => __( 'Load Caption Font', 'wp-carousel-free' ),
				'subtitle'   => __( 'On/Off google font for the image caption.', 'wp-carousel-free' ),
				'default'    => false,
				'dependency' => array( 'wpcp_carousel_type', '==', 'image-carousel', true ),
			),
			array(
				'id'           => 'wpcp_image_caption_typography',
				'class'        => 'disable-color-picker',
				'type'         => 'typography',
				'title'        => __( 'Caption Font', 'wp-carousel-free' ),
				'subtitle'     => __( 'Set caption font properties.', 'wp-carousel-free' ),
				'class'        => 'disable-color-picker',
				'default'      => array(
					'color'          => '#333',
					'font-family'    => 'Open Sans',
					'font-weight'    => '600',
					'font-size'      => '15',
					'line-height'    => '23',
					'letter-spacing' => '0',
					'text-align'     => 'center',
					'text-transform' => 'capitalize',
					'type'           => 'google',
				),
				'preview_text' => 'The image caption',
				'dependency'   => array( 'wpcp_carousel_type', '==', 'image-carousel', true ),
			),
			array(
				'id'         => 'wpcp_image_desc_font_load',
				'type'       => 'switcher',
				'class'      => 'only_pro_switcher',
				'title'      => __( 'Load Description Font', 'wp-carousel-free' ),
				'subtitle'   => __( 'On/Off google font for the image description.', 'wp-carousel-free' ),
				'default'    => false,
				'dependency' => array( 'wpcp_carousel_type|wpcp_post_title', '==|==', 'image-carousel|true', true ),
			),
			array(
				'id'         => 'wpcp_image_desc_typography',
				'class'      => 'disable-color-picker',
				'type'       => 'typography',
				'title'      => __( 'Description Font', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set description font properties.', 'wp-carousel-free' ),
				'class'      => 'disable-color-picker',
				'default'    => array(
					'color'          => '#333',
					'font-family'    => 'Open Sans',
					'font-weight'    => '400',
					'font-style'     => 'normal',
					'font-size'      => '14',
					'line-height'    => '21',
					'letter-spacing' => '0',
					'text-align'     => 'center',
					'type'           => 'google',
				),
				'dependency' => array( 'wpcp_carousel_type', '==', 'image-carousel', true ),
			),
			// Post Typography.
			array(
				'id'         => 'wpcp_title_font_load',
				'type'       => 'switcher',
				'class'      => 'only_pro_switcher',
				'title'      => __( 'Load Title Font', 'wp-carousel-free' ),
				'subtitle'   => __( 'On/Off google font for the slide title.', 'wp-carousel-free' ),
				'default'    => false,
				'dependency' => array( 'wpcp_carousel_type', '==', 'post-carousel', true ),
			),
			array(
				'id'           => 'wpcp_title_typography',
				'class'        => 'disable-color-picker',
				'type'         => 'typography',
				'title'        => __( 'Post Title Font', 'wp-carousel-free' ),
				'subtitle'     => __( 'Set title font properties.', 'wp-carousel-free' ),
				'default'      => array(
					'color'          => '#444',
					'hover_color'    => '#555',
					'font-family'    => 'Open Sans',
					'font-style'     => '600',
					'font-size'      => '20',
					'line-height'    => '30',
					'letter-spacing' => '0',
					'text-align'     => 'center',
					'text-transform' => 'capitalize',
					'type'           => 'google',
				),
				'hover_color'  => true,
				'preview_text' => 'The Post Title',
				'dependency'   => array( 'wpcp_carousel_type', '==', 'post-carousel', true ),
			),

			array(
				'id'         => 'wpcp_post_content_font_load',
				'type'       => 'switcher',
				'class'      => 'only_pro_switcher',
				'title'      => __( 'Post Content Font Load', 'wp-carousel-free' ),
				'subtitle'   => __( 'On/Off google font for post the content.', 'wp-carousel-free' ),
				'default'    => false,
				'dependency' => array( 'wpcp_carousel_type', '==', 'post-carousel', true ),
			),
			array(
				'id'         => 'wpcp_post_content_typography',
				'class'      => 'disable-color-picker',
				'type'       => 'typography',
				'title'      => __( 'Post Content Font', 'wp-carousel-free' ),
				'subtitle'   => __( 'Set post content font properties.', 'wp-carousel-free' ),
				'default'    => array(
					'color'          => '#333',
					'font-family'    => 'Open Sans',
					'font-style'     => '400',
					'font-size'      => '16',
					'line-height'    => '26',
					'letter-spacing' => '0',
					'text-align'     => 'center',
					'type'           => 'google',
				),
				'dependency' => array( 'wpcp_carousel_type', '==', 'post-carousel', true ),
			),
			array(
				'id'         => 'wpcp_post_meta_font_load',
				'type'       => 'switcher',
				'class'      => 'only_pro_switcher',
				'title'      => __( 'Post Meta Font Load', 'wp-carousel-free' ),
				'subtitle'   => __( 'On/Off google font for the post meta.', 'wp-carousel-free' ),
				'default'    => false,
				'dependency' => array( 'wpcp_carousel_type', '==', 'post-carousel', true ),
			),
			array(
				'id'           => 'wpcp_post_meta_typography',
				'class'        => 'disable-color-picker',
				'type'         => 'typography',
				'title'        => __( 'Post Meta Font', 'wp-carousel-free' ),
				'subtitle'     => __( 'Set post meta font properties.', 'wp-carousel-free' ),
				'default'      => array(
					'color'          => '#999',
					'font-family'    => 'Open Sans',
					'font-style'     => '400',
					'font-size'      => '14',
					'line-height'    => '24',
					'letter-spacing' => '0',
					'text-align'     => 'center',
					'type'           => 'google',
				),
				'preview_text' => 'Post Meta', // Replace preview text with any text you like.
				'dependency'   => array( 'wpcp_carousel_type', '==', 'post-carousel', true ),
			),

			// // Product Typography.
			array(
				'id'         => 'wpcp_product_name_font_load',
				'type'       => 'switcher',
				'class'      => 'only_pro_switcher',
				'title'      => __( 'Product Name Font Load', 'wp-carousel-free' ),
				'subtitle'   => __( 'On/Off google font for the product name.', 'wp-carousel-free' ),
				'default'    => false,
				'dependency' => array( 'wpcp_carousel_type', '==', 'product-carousel', true ),
			),
			array(
				'id'           => 'wpcp_product_name_typography',
				'class'        => 'disable-color-picker',
				'type'         => 'typography',
				'title'        => __( 'Product Name Font', 'wp-carousel-free' ),
				'subtitle'     => __( 'Set product name font properties.', 'wp-carousel-free' ),
				'default'      => array(
					'color'          => '#444',
					'hover_color'    => '#555',
					'font-family'    => 'Open Sans',
					'font-style'     => '400',
					'font-size'      => '15',
					'line-height'    => '23',
					'letter-spacing' => '0',
					'text-align'     => 'center',
					'type'           => 'google',
				),
				'hover_color'  => true,
				'preview_text' => 'Product Name', // Replace preview text.
				'dependency'   => array( 'wpcp_carousel_type', '==', 'product-carousel', true ),
			),
			array(
				'id'         => 'wpcp_product_price_font_load',
				'type'       => 'switcher',
				'class'      => 'only_pro_switcher',
				'title'      => __( 'Product Price Font Load', 'wp-carousel-free' ),
				'subtitle'   => __( 'On/Off google font for the product price.', 'wp-carousel-free' ),
				'default'    => false,
				'dependency' => array( 'wpcp_carousel_type', '==', 'product-carousel', true ),
			),
			array(
				'id'           => 'wpcp_product_price_typography',
				'class'        => 'disable-color-picker',
				'type'         => 'typography',

				'title'        => __( 'Product Price Font', 'wp-carousel-free' ),
				'subtitle'     => __( 'Set product price font properties.', 'wp-carousel-free' ),
				'default'      => array(
					'color'          => '#222',
					'font-family'    => 'Open Sans',
					'font-style'     => '700',
					'font-size'      => '14',
					'line-height'    => '26',
					'letter-spacing' => '0',
					'text-align'     => 'center',
					'type'           => 'google',
				),
				'preview_text' => '$49.00', // Replace preview text with any text you like.
				'dependency'   => array( 'wpcp_carousel_type', '==', 'product-carousel', true ),
			),
		), // End of fields array.
	)
); // Style settings section end.


//
// Metabox of the footer section / shortocde section.
// Set a unique slug-like ID.
//
$wpcp_display_shortcode = 'sp_wpcp_display_shortcode';

//
// Create a metabox.
//
SP_WPCF::createMetabox(
	$wpcp_display_shortcode,
	array(
		'title'        => __( 'WordPress Carousel', 'wp-carousel-free' ),
		'post_type'    => 'sp_wp_carousel',
		'show_restore' => false,
	)
);

//
// Create a section.
//
SP_WPCF::createSection(
	$wpcp_display_shortcode,
	array(
		'fields' => array(
			array(
				'type'  => 'shortcode',
				'class' => 'wpcp-admin-footer',
			),
		),
	)
);
