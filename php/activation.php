<?php
/**
 * Functions related to plugin activation.
 *
 * @since 20231211
 * @author Josh Robbs <josh@joshrobbs.com>
 * @package JWR_Admin_Menu_Styler
 */

namespace JWR\Admin_Menu_Styler\PHP;

defined( 'ABSPATH' ) || exit;

/**
 * Verify that ACF and AME are active.
 *
 * @return bool True if ACF and AME are active, false otherwise.
 */
function verify_ams_dependencies() {
	$acf_active = is_plugin_active( 'advanced-custom-fields-pro/acf.php' );
	$ame_active = is_plugin_active( 'admin-menu-editor/menu-editor.php' );

	if ( $acf_active || $ame_active ) {
		return true;
	}
	return false;
}

/**
 * Plugin activation hook.
 *
 * @return void
 */
function activate() {
	if ( false === verify_ams_dependencies() ) {
		\deactivate_plugins( 'jwr-admin-menu-styler/index.php' );
		exit;
	}
}
add_action( 'activate_plugin', __NAMESPACE__ . '\activate' );
