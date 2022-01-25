<?php
/**
 * The image carousel template.
 *
 * This template can be overridden by copying it to yourtheme/wp-carousel-free/templates/loop/image-type.php
 *
 * @since   2.3.4
 * @package WP_Carousel_Free
 * @subpackage WP_Carousel_Free/public/templates
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
$image_data           = get_post( $attachment );
$image_title          = $image_data->post_title;
$image_alt_titles     = $image_data->_wp_attachment_image_alt;
$image_alt_title      = ! empty( $image_alt_titles ) ? $image_alt_titles : $image_title;
$image_url            = wp_get_attachment_image_src( $attachment, $image_sizes );
$the_image_title_attr = ' title="' . $image_title . '"';
$image_title_attr     = 'true' === $show_image_title_attr ? $the_image_title_attr : '';

if ( 'false' !== $lazy_load_image && 'carousel' === $wpcp_layout ) {
	$image = sprintf( '<img class="wcp-lazy" data-lazy="%1$s" src="%2$s"%3$s alt="%4$s" width="%5$s" height="%6$s">', $image_url[0], $lazy_load_img, $image_title_attr, $image_alt_title, $image_url[1], $image_url[2] );
} else {
	$image = sprintf( '<img class="skip-lazy" src="%1$s"%2$s alt="%3$s" width="%4$s" height="%5$s">', $image_url[0], $image_title_attr, $image_alt_title, $image_url[1], $image_url[2] );
}
?>
<div class="<?php echo esc_attr( $grid_column ); ?>">
	<div class="wpcp-single-item">
		<?php

			include Helper::wpcf_locate_template( 'loop/image-type/image.php' );
		?>
	</div>
</div>
