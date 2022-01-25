<?php
/**
 *
 * Field: textarea
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 * @package WP Carousel
 * @subpackage wp-carousel-free/sp-framework
 */

if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

if ( ! class_exists( 'SP_WPCF_Field_textarea' ) ) {

	/**
	 *
	 * Field: textarea
	 *
	 * @since 1.0.0
	 * @version 1.0.0
	 */
	class SP_WPCF_Field_textarea extends SP_WPCF_Fields {

		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}


		/**
		 * Render
		 *
		 * @return void
		 */
		public function render() {

			echo wp_kses_post( $this->field_before() );
			echo $this->shortcoder(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $this->shortcoder() is escaped before being passed in.
			echo '<textarea name="' . esc_attr( $this->field_name() ) . '"' . $this->field_attributes() . '>' . $this->value . '</textarea>';// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $this->field_attributes() is escaped before being passed in.
			echo wp_kses_post( $this->field_after() );

		}

		/**
		 * Short coder
		 *
		 * @return void
		 */
		public function shortcoder() {

			if ( ! empty( $this->field['shortcoder'] ) ) {

				$instances = ( is_array( $this->field['shortcoder'] ) ) ? $this->field['shortcoder'] : array_filter( (array) $this->field['shortcoder'] );

				foreach ( $instances as $instance_key ) {

					if ( isset( SP_WPCF::$shortcode_instances[ $instance_key ] ) ) {

						$button_title = SP_WPCF::$shortcode_instances[ $instance_key ]['button_title'];

						echo '<a href="#" class="button button-primary wpcf-shortcode-button" data-modal-id="' . esc_attr( $instance_key ) . '">' . wp_kses_post( $button_title ) . '</a>';

					}
				}
			}

		}
	}
}
