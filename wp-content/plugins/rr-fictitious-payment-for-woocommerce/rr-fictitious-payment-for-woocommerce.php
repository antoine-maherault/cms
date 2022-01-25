<?php defined( 'ABSPATH' ) || exit;
/**
 * @author  Philippe Feryn
 * @package RR_Fictitious_Payment_WooC
 * @since   0.1.0
 * @version 1.1.5
 *
 * @wordpress-plugin
 * Plugin Name:     RR Fictitious Payment for WooCommerce
 * Description:     A WooCommerce payment gateway plugin to handle fictiv payments - For admin only.
 * Version:         1.1.5
 * Plugin URI:      https://www.reskator.fr
 * Author:          Philippe Feryn aka Reskator
 * Author URI:      https://www.reskator.fr
 * Text Domain:     rr-fictitious-payment-for-woocommerce
 * Domain Path:     /languages/
 * Requires PHP:    5.3.6
 * WC requires at least: 2.1.0
 * WC tested up to: 6.0
 * License:         GPL-2.0 or later
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @copyright 2015-2018 Philippe Feryn
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * ( at your option ) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 */

if( ! defined('RR_FICTITIOUS_FILE' ) ){
	define('RR_FICTITIOUS_FILE', __FILE__ );
}

/**
 * Loads the plugin
 *
 * @author Philippe Feryn
 * @since  1.0.0
 *
 */
function rr_fictitious_payment_start() {
	/**
	 * If requirement is not met, displays an error and deactivates the plugin
	 *
	 * @author Philippe Feryn
	 * @since  1.0.0
	 *
	 */
	function RR_Fictitous_maybe_disable_plugin() {
		// The error message
		echo '<div id="message" class="error">';
		echo '<p>' . sprintf( __( '<b>RR Fictitious Payment for WooCommerce</b> requires <b>WooCommerce</b> v2.1.0 or more. Please install and activate <a href="%s">WooCommerce</a>, then activate this plugin.', 'rr-fictitious-payment-for-woocommerce' ), admin_url( 'plugins.php' ) ) . '</p>';
		echo '</div>';

		// Deactivate this plugin
		deactivate_plugins( __FILE__ );
	}

	/**
	 * Adds the plugin settings link
	 *
	 * @author Philippe Feryn
	 * @since  1.0.0
	 *
	 * @param $links array Current plugin links
	 *
	 * @return array
	 */
	function rr_fictitious_plugin_links( $links ) {
		$settings_link = admin_url( 'admin.php?page=wc-settings&tab=checkout&section=rr_fictitious_p' );
		$settings_link = '<a href="'. $settings_link .'" title="'. __( 'Access to the plugin settings', 'rr-fictitious-payment-for-woocommerce' ) .'">'. __( 'Settings', 'woocommerce' ) .'</a>';

		array_unshift( $links, $settings_link );

		return $links;
	}

	/**
	 * Adds our payment gateway method if user is an admin
	 *
	 * @author Philippe Feryn
	 * @since  1.0.0
	 *
	 * @param $methods Current WooC payment methods
	 *
	 * @return array
	 */
	function RR_add_fictitious_payment ( $methods ) {
		if( current_user_can( 'manage_options' ) ) {
			$methods[] = 'RR_Fictitious_Payment_WooC';
		}

		return $methods;
	}

	// Loads localization
	load_plugin_textdomain( 'rr-fictitious-payment-for-woocommerce', false, plugin_basename( __DIR__ ) . '/languages' );

	// Checks if requirement is met
	if ( ! class_exists( 'WC_Payment_Gateway' ) || version_compare( WC()->version, '2.1.0', '<' ) ) {
		add_action( 'admin_notices', 'RR_Fictitous_maybe_disable_plugin' );
		return;
	}

	if ( ! class_exists( 'RR_Fictitious_Payment_WooC' ) ) {
		include __DIR__ .'/includes/class-rr_fictitious_payment_wooc.php';
	}

	// Start !
	add_filter( 'woocommerce_payment_gateways', 'RR_add_fictitious_payment' );

	add_filter( 'plugin_action_links_'. plugin_basename( RR_FICTITIOUS_FILE ), 'rr_fictitious_plugin_links' );
}

add_action( 'plugins_loaded', 'rr_fictitious_payment_start' );
