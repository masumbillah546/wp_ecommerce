<?php
/**
* XT Framework WP Override functions or define them if they dont exist is older WP versions
*
* @author      XplodedThemss
* @category    Core
* @package     XT_Framework/Admin/Functions
* @version     1.0.0
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Check if is json request
 */
if(!function_exists('wp_is_json_request')) {

	function wp_is_json_request() {

		if ( isset( $_SERVER['HTTP_ACCEPT'] ) && false !== strpos( $_SERVER['HTTP_ACCEPT'], 'application/json' ) ) {
			return true;
		}

		if ( isset( $_SERVER['CONTENT_TYPE'] ) && 'application/json' === $_SERVER['CONTENT_TYPE'] ) {
			return true;
		}

		return false;

	}
}