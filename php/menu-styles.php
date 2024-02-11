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
	// Handle ACF not being installed.

	$header_bg     = \get_field( 'header_background_color', 'option' );
	$header_text   = \get_field( 'header_text_color', 'option' );
	$a_header_bg   = \get_field( 'active_header_background_color', 'option' );
	$a_header_text = \get_field( 'active_header_text_color', 'option' );

	$header_bg = '';

	$header_bg     = ( ! empty( $header_bg ) ) ? $header_bg : '#002244';
	$header_text   = ( ! empty( $header_text ) ) ? $header_text : '#ffffff';
	$a_header_bg   = ( ! empty( $a_header_bg ) ) ? $a_header_bg : '#820000';
	$a_header_text = ( ! empty( $a_header_text ) ) ? $a_header_text : '#ffffff';

	$style = <<<EOS
	<style id='admin-menu-styler'>
		#adminmenu li[class*="-menu-section-header"] {
			background-color: {$header_bg};
			color: {$header_text};
		}

		#adminmenu li[class*="-menu-section-header"] > a.menu-top:focus,
		#adminmenu li[class*="-menu-section-header"] > a.menu-top:hover {
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
