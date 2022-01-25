<?php defined( 'ABSPATH' ) || exit;
/**
 * Project: RR_Fictitious_Payment_WooC
 * File: class-rr_fictitious_payment_wooc.php
 * User: reskatorfr
 * Author: Philippe Feryn
 *
 * @Description Adds the fictitious payment gateway in WooCommerce (Backend: Settings > Paiements — Frontend: Checkout)
 * @since        1.0.0
 */

if( ! class_exists( 'RR_Fictitious_Payment_WooC' ) ) :
	class RR_Fictitious_Payment_WooC extends WC_Payment_Gateway {
		/**
		 * Constructor for the gateway Fictitious Payment.
		 */
		public function __construct() {
			
			$this->id                   = 'rr_fictitious_p';
			$this->icon                 = self::_path2url( dirname(__DIR__) .'/assets/img/fictitious-payment.png' );
			$this->method_title         = _x( 'Fictitious Payment', 'Fictitious Payment method', 'rr-fictitious-payment-for-woocommerce' );
			$this->method_description   = __( 'Simulate a payment. This payment method will only be displayed to administrators. Useful to place phone/e-mail orders that are paid for otherwise or to test the ordering process as a whole.', 'rr-fictitious-payment-for-woocommerce' ) ;
			$this->has_fields           = false;
			
			// Loads the settings
			$this->init_form_fields();
			$this->init_settings();
			
			// Defines user set variables
			$this->title                = $this->get_option( 'title' );
			$this->description          = $this->get_option( 'description' );
			$this->instructions         = $this->get_option( 'instructions' );
			
			
			add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, [$this, 'process_admin_options'] );
			add_action( 'woocommerce_thankyou_'. $this->id, [$this, 'thankyou_page'] );
			add_action( 'woocommerce_email_before_order_table', [$this, 'email_instructions'], 10, 3 );
			
		}
		
		
		/**
		 * Adds the Payment Gateway setting fields
		 *
		 * @author Philippe Feryn
		 * @since  1.0.0
		 *
		 */
		function init_form_fields() {
			$this->form_fields = apply_filters( 'wc_offline_form_fields',
				[  'enabled'       => ['title'          => __( 'Enable/Disable', 'woocommerce' ),
				                       'type'           => 'checkbox',
			                           'label'          => __( 'Enable Fictitious Payment', 'rr-fictitious-payment-for-woocommerce' ),
			                           'default'        => 'yes',
									],
				   'title'         => ['title'          => __( 'Title', 'woocommerce' ),
									   'type'           => 'text',
									   'description'    => __( 'This controls the title which you see during checkout.', 'woocommerce' ),
									   'default'        => __( 'Fictitious Payment', 'rr-fictitious-payment-for-woocommerce' ),
									   'desc_tip'       => true,
									],
				   'description'   => ['title'          => __( 'Description', 'woocommerce' ),
									   'type'           => 'textarea',
									   'description'    => __( 'This controls the description which you will see during checkout.', 'rr-fictitious-payment-for-woocommerce' ), // Moyen de paiement que le client verra lors du passage de la commande
									   'default'        => __( 'This option is a payment simulation and only displayed to administrator. Useful to test the ordering process as a whole or for placing orders received by phone or email…', 'rr-fictitious-payment-for-woocommerce'),
									   'desc_tip'       => true,
				                    ],
				   'instructions'  => ['title'          => __( 'Instructions', 'woocommerce' ),
				                       'type'           => 'textarea',
				                       'description'    => __( 'Instructions that will be added to the thank you page and emails.', 'woocommerce' ),
				                       'default'        => '',
				                       'desc_tip'       => true,
					                   'placeholder'    => __( 'For example: “Order placed by the administrator on the customer’s instructions.”', 'rr-fictitious-payment-for-woocommerce' ),
									],
					'inst_thank'   => ['title'          => '',
										'type'          => 'checkbox',
										'label'         => __( 'Add the instructions on the Thank-You page', 'rr-fictitious-payment-for-woocommerce' ),
										'default'       => false,
									],
					'inst_mail'    => ['title'          => '',
					                   'type'           => 'checkbox',
					                   'label'          => __( 'Add the instructions in the e-mail', 'rr-fictitious-payment-for-woocommerce' ),
					                   'default'        => false,
									],

			]);
		}
		
		public function process_admin_options() {
			// Nothing special for now : call the parent function
			parent::process_admin_options();
		}
		
		/**
		 * Adds instructions on thank you page
		 *
		 * @author Philippe Feryn
		 * @since  1.0.0
		 *
		 */
		public function thankyou_page() {
			if( $this->instructions && 'yes' == $this->get_option( 'inst_thank' ) )
				echo wpautop( wptexturize( '<i>'. $this->instructions.'</i>') );
		}
		
		/**
		 * Adds instructions in email
		 *
		 * @author Philippe Feryn
		 * @since  1.0.0
		 *
		 * @param obj  $order
		 * @param      $to_admin
		 * @param bool $plain_text
		 */
		public function email_instructions( $order, $to_admin, $plain_text = false ) {
			if( $this->instructions && 'yes' == $this->get_option( 'inst_mail' ) && $this->id === $order->get_payment_method() )
				echo wpautop( wptexturize( '<i>'. $this->instructions .'</i>' ) ) . PHP_EOL;
		}
		
		/**
		 * Woocommerce process payment function
		 *
		 * @author Philippe Feryn
		 * @since  1.0.0
		 *
		 * @param int $order_id
		 *
		 * @return array
		 */
		public function process_payment( $order_id ) {
			$current_user = wp_get_current_user();
			global $woocommerce;
			
			$order = new WC_Order( $order_id );
			
			// Adds an order note
			$order->add_order_note( sprintf( __( 'Order made by the admin %s and paid via RR Fictitious Payment', 'rr-fictitious-payment-for-woocommerce' ), $current_user->user_login ) );
			
			$order->payment_complete();
			
			// Return Thankyou redirect
			return array(
				'result' => 'success',
				'redirect' => $this->get_return_url($order),
			);
		}
		
		/**
		 * Converts path to url
		 *
		 * @author Philippe Feryn
		 * @since  1.0.0
		 *
		 * @param string $path
		 *
		 * @return string
		 */
		private function _path2url( $path = '' ): string {
			return site_url() . '/' . str_replace( ABSPATH, '', $path );
		}
	}
endif; // class_exists
