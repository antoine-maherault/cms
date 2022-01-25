<?php
/**
 * Product image
 *
 * This template can be overridden by copying it to yourtheme/wp-carousel-free/templates/loop/product-type/image.php
 *
 * @since   2.3.4
 * @package WP_Carousel_Free
 * @subpackage WP_Carousel_Free/public/templates
 */

if ( has_post_thumbnail() && $show_slide_image ) {
	$product_thumb_id       = get_post_thumbnail_id();
	$product_thumb_alt_text = get_post_meta( $product_thumb_id, '_wp_attachment_image_alt', true );
	$image_url              = wp_get_attachment_image_src( $product_thumb_id, $image_sizes );
	$the_image_title_attr   = ' title="' . get_the_title() . '"';
	$image_title_attr       = $show_image_title_attr ? $the_image_title_attr : '';

	// Product Thumbnail.
	$wpcp_product_image = '';
	if ( ! empty( $image_url[0] ) ) {
		if ( 'false' !== $lazy_load_image && 'carousel' === $wpcp_layout ) {
			$wpcp_product_thumb = sprintf( '<img class="wcp-lazy" data-lazy="%1$s" src="%2$s"%3$s alt="%4$s" width="%5$s" height="%6$s">', $image_url[0], $lazy_load_img, $image_title_attr, $product_thumb_alt_text, $image_url[1], $image_url[2] );
		} else {
			$wpcp_product_thumb = sprintf( '<img class="skip-lazy" src="%1$s"%2$s alt="%3$s" width="%4$s" height="%5$s">', $image_url[0], $image_title_attr, $product_thumb_alt_text, $image_url[1], $image_url[2] );
		}
		?>
	<div class="wpcp-slide-image">
		<a href="<?php the_permalink(); ?>"><?php echo wp_kses_post( $wpcp_product_thumb ); ?></a>
	</div>
		<?php
	}
}
