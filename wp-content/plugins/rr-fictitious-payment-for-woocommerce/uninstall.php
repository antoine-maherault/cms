<?php defined( 'ABSPATH' ) || exit;
/**
 * Project: RR_Fictitious_Payment_WooC
 * File: uninstall.php
 * User: reskator
 * Author: Philippe Feryn
 *
 * @Description  Fires on uninstall
 * @since        1.0.0
 */

// Delete the plugin's option
delete_option( 'woocommerce_rr_fictitious_p_settings' );

// Clear any cached data that has been removed.
wp_cache_flush();