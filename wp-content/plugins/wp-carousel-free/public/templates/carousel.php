<?php
/**
 * Carousel.
 *
 * This template can be overridden by copying it to yourtheme/wp-carousel-free/templates/carousel.php
 *
 * @since   2.3.4
 * @package WP_Carousel_Free
 * @subpackage WP_Carousel_Free/public/templates
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<div class="wpcp-carousel-wrapper wpcp-wrapper-<?php echo esc_attr( $post_id ); ?>">
	<?php
	Helper::section_title( $post_id, $section_title, $main_section_title );
	Helper::preloader( $post_id, $preloader );
	$the_rtl = ( 'ltr' === $carousel_direction ) ? ' dir="rtl"' : ' dir="ltr"';
	?>
	<div id="sp-wp-carousel-free-id-<?php echo esc_attr( $post_id ); ?>" class="<?php echo esc_attr( $carousel_classes ); ?>" <?php echo wp_kses_post( $wpcp_slick_options ); ?> <?php echo $the_rtl; ?>>
		<?php
		Helper::get_item_loops( $upload_data, $shortcode_data, $carousel_type, $post_id );
		?>
	</div>
</div>
