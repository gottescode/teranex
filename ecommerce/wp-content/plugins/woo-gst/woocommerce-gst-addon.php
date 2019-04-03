<?php
/*
Plugin Name: WooCommerce GST
Description: WooCommerce addon for GST.
Author: Stark Digital
Author URI: http://starkdigital.net/
Version: 1.1
*/
if (!defined('ABSPATH'))
{
    exit; // Exit if accessed directly
}
require_once('inc/functions.php');
/**
 * Check WooCommerce exists
 */
if ( fn_is_woocommerce_active() ) {
	define('gst_RELATIVE_PATH', plugin_dir_url( __FILE__ ));
	define('gst_ABS_PATH', plugin_dir_path(__FILE__));
	define( 'gst_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

	require_once( 'class-gst-woocommerce-addon.php' );

	WC_GST_Settings::init();

} else {
	add_action( 'admin_notices', 'fn_gst_admin_notice__error' );
}