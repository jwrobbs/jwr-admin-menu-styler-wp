<?php
/**
 * Plugin name: JWR's Admin Menu Styler
 * Plugin URI: https://joshrobbs.com
 * Description: A plugin to style the admin menu. <strong>Requires Admin Menu Editory and ACF PRO.</strong>
 * Author: Josh Robbs
 * Author URI: https://joshrobbs.com
 * Version 0.9.0
 *
 * @since 20231211
 * @author Josh Robbs <josh@joshrobbs.com>
 * @package JWR_Admin_Menu_Styler
 */

namespace JWR\Admin_Menu_Styler;

defined( 'ABSPATH' ) || exit;

/*
	[x] Verify ACF and AME installed and active
	[x] create options page
	[] Add css to style output
	[] Add js to toggle sections
*/

require_once 'php/activation.php';
require_once 'php/options.php';
require_once 'php/menu-styles.php';


/**
 * Enqueue admin scripts and styles.
 *
 * @return void
 */
function enqueue_admin_scripts() {
	wp_enqueue_style(
		'jwr-admin-menu-options',
		plugin_dir_url( __FILE__ ) . 'css/options-page-styles.css',
		array(),
		filemtime( plugin_dir_path( __FILE__ ) . 'css/options-page-styles.css' )
	);
}
\add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\enqueue_admin_scripts' );
