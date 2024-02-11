<?php
/**
 * Options page functions.
 *
 * @since 20231211
 * @package JWR_Admin_Menu_Styler
 */

namespace JWR\Admin_Menu_Styler\PHP;

use JWR\JWR_Control_Panel\PHP\JWR_Plugin_Options;

defined( 'ABSPATH' ) || exit;

/**
 * Add settings to the JWR Control Panel.
 *
 * @since 2024-02-11
 *
 * @return void
 */
function add_admin_menu_style_settings() {
	JWR_Plugin_Options::add_tab( 'Admin Menu Styler', 'ams' );
	JWR_Plugin_Options::add_color_picker_field( 'Header Background Color', 'header_background_color', '#002244', 25 );
	JWR_Plugin_Options::add_color_picker_field( 'Header Text Color', 'header_text_color', '#ffffff', 25 );
	JWR_Plugin_Options::add_color_picker_field( 'Active Header Background Color', 'active_header_background_color', '#820000', 25 );
	JWR_Plugin_Options::add_color_picker_field( 'Active Header Text Color', 'active_header_text_color', '#ffffff', 25 );
}
add_action( 'update_jwr_control_panel', __NAMESPACE__ . '\add_admin_menu_style_settings' );
