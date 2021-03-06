<?php


namespace Jet_Form_Builder\Request;

use Jet_Form_Builder\Blocks\Modules\Fields_Errors\Error_Handler;
use Jet_Form_Builder\Exceptions\Request_Exception;

abstract class Field_Data_Parser {

	protected $value;
	protected $is_required = false;
	protected $name = 'field_name';
	protected $block;
	protected $settings;
	protected $inner;
	protected $request_handler;
	protected $inside_conditional;

	abstract public function type();

	public function get_response() {
		return $this->value;
	}

	public function _is_custom_check() {
		return false;
	}

	final public function response() {
		if ( $this->_is_required() || $this->_is_custom_check() ) {
			$this->save_error();
		}

		return $this->get_response();
	}

	public function parse_value( $value ) {
		return $value;
	}

	public function init( $value, $block, $inside_conditional ) {
		$this->block              = $block;
		$this->inside_conditional = $inside_conditional;
		$this->settings           = $this->block['attrs'];
		$this->inner              = $this->block['innerBlocks'];

		if ( isset( $this->settings['required'] ) ) {
			$this->is_required = $this->settings['required'];
		}
		if ( isset( $this->settings['name'] ) ) {
			$this->name = $this->settings['name'];
		}
		$this->value = $this->parse_value( $value );
	}

	protected function _is_required() {
		return ( ! $this->inside_conditional && $this->is_required && empty( $this->value ) );
	}

	protected function save_error() {
		Error_Handler::instance()->add(
			$this->type(),
			array(
				'name'   => $this->name,
				'params' => $this->settings,
			)
		);
	}


}
