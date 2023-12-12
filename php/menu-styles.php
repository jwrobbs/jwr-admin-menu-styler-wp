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
	$header_bg     = \get_field( 'field_65777cacc2143', 'options' );
	$header_text   = \get_field( 'field_65777ce3c2144', 'options' );
	$a_header_bg   = \get_field( 'field_65777cf5c2145', 'options' );
	$a_header_text = \get_field( 'field_65777d0cc2146', 'options' );

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
