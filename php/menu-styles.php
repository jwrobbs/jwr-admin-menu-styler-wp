<?php
/**
 * Menu styles.
 *
 * @package JWR\Admin_Menu_Styler
 */

namespace JWR\Admin_Menu_Styler\PHP;

defined( 'ABSPATH' ) || exit;

/**
 * Add styles to wp_head.
 *
 * @return void
 */
function add_styles_to_head() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		$header_bg     = \get_field( 'admin_menu_colors_header_background_color', 'options' );
		$header_text   = \get_field( 'admin_menu_colors_header_text_color', 'options' );
		$a_header_bg   = \get_field( 'admin_menu_colors_active_header_background_color', 'options' );
		$a_header_text = \get_field( 'admin_menu_colors_active_header_text_color', 'options' );
	} else {
		$header_bg     = '#002244';
		$header_text   = '#ffffff';
		$a_header_bg   = '#820000';
		$a_header_text = '#ffffff';
	}

	$style = <<<EOS
	<style>
		#adminmenu li[class*="-menu-section-header"] {
			background-color: {$header_bg};
			color: {$header_text};
		}

		#adminmenu li[class*="-menu-section-header"] > a.menu-top:focus {
			background-color: {$a_header_bg};
			color: {$a_header_text};
		}

		#adminmenu li[class*="-menu-section-item"] {
			display: none;
		}
	</style>
	EOS;
	echo $style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
\add_action( 'admin_head', __NAMESPACE__ . '\add_styles_to_head' );
