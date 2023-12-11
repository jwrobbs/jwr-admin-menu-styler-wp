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
	[] create options page
	[] Add css to style output
	[] Add js to toggle sections
*/

require_once 'utilities/utilities.php'; // temporary inclusion of dev utilities.
require_once 'php/activation.php';
