<?php

/**
 * Post thumbnails
 *
 * This template can be overridden by copying it to yourtheme/wp-carousel-free/templates/loop/post-type/thumbnails.php
 *
 * @since   2.3.4
 * @package WP_Carousel_Free
 * @subpackage WP_Carousel_Free/public/templates
 */

if ( has_post_thumbnail() && $show_slide_image ) {
	$image_id             = get_post_thumbnail_id();
	$image_url            = wp_get_attachment_image_src( $image_id, $image_sizes );
	$image_alt_text       = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
	$the_image_title_attr = ' title="' . the_title_attribute( 'echo=0' ) . '"';
	$image_title_attr     = ( 'true' === $show_image_title_attr ) ? $the_image_title_attr : '';

	if ( 'false' !== $lazy_load_image && 'carousel' === $wpcp_layout ) {
		$post_thumb = sprintf( '<img class="wcp-lazy" data-lazy="%1$s" src="%2$s"%3$s alt="%4$s" width="%5$s" height="%6$s">', $image_url[0], $lazy_load_img, $image_title_attr, $image_alt_text, $image_url[1], $image_url[2] );
	} else {
		$post_thumb = sprintf( '<img class="skip-lazy" src="%1$s"%2$s alt="%3$s" width="%4$s" height="%5$s">', $image_url[0], $image_title_attr, $image_alt_text, $image_url[1], $image_url[2] );
	}
	?>
	<div class="wpcp-slide-image">
		<a href="<?php echo esc_url( get_the_permalink() ); ?>">
			<?php echo wp_kses_post( $post_thumb ); ?>
		</a>
	</div>
	<?php
} // End of Has post thumbnail.
