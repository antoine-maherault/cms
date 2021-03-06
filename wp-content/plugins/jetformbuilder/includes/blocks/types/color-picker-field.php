<?php


namespace Jet_Form_Builder\Blocks\Types;

use Jet_Form_Builder\Blocks\Render\Base as Base_Render;

class Color_Picker_Field extends Base {


	/**
	 * Returns block name
	 *
	 * @return [type] [description]
	 */
	public function get_name() {
		return 'color-picker-field';
	}

	protected function _jsm_register_controls() {
		$this->controls_manager->start_section(
			'style_controls',
			[
				'id'    => 'field_section',
				'title' => __( 'Color Picker Field', 'jet-form-builder' )
			]
		);

		$this->controls_manager->add_control( [
			'id'           => 'field_width',
			'type'         => 'range',
			'label'        => __( 'Width', 'jet-form-builder' ),
			'units'        => [
				[
					'value'     => 'px',
					'intervals' => [
						'step' => 1,
						'min'  => 1,
						'max'  => 1000,
					]
				],
				[
					'value'     => '%',
					'intervals' => [
						'step' => 1,
						'min'  => 1,
						'max'  => 100,
					]
				],
			],
			'css_selector' => [
				$this->selector( '__field-wrap.%s__field-wrap' ) => 'width: {{VALUE}}{{UNIT}};',
			],
			'attributes'   => array(
				'default' => array(
					'value' => array(
						'value' => 100,
						'unit'  => '%'
					)
				)
			),
		] );

		$this->controls_manager->end_section();
	}

	/**
	 * Returns current block render instance
	 *
	 * @param null $wp_block
	 *
	 * @return string
	 */
	public function get_block_renderer( $wp_block = null ) {
		/**
		 * We define a custom attribute so that
		 * we can then redefine it in Modifiers without using a hook
		 * `jet-form-builder/render/{block_name}/attributes`
		 */
		$this->block_attrs['field_type'] = 'color';

		$color_render = ( new class( $this ) extends Base_Render {
			public function get_name() {
				return 'color-picker-field';
			}
		} );


		return $color_render->render();
	}

}