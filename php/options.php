<?php
/**
 * Options page functions.
 *
 * @since 20231211
 * @package JWR_Admin_Menu_Styler
 */

namespace JWR\Admin_Menu_Styler\PHP;

defined( 'ABSPATH' ) || exit;

/**
 * Create options page during plugin activation (ACF based).
 *
 * @return void
 */
function create_options_page() {

	// Add options page.
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_sub_page(
			array(
				'page_title' => 'Admin Menu Styler',
				'menu_title' => 'Admin Menu Styler',
				'capability' => 'manage_options',
				'parent'     => 'options-general.php',
			)
		);
	}

}

add_action( 'acf/init', __NAMESPACE__ . '\create_options_page' );

// Add field group.
add_action(
	'acf/include_fields',
	function() {
		if ( ! function_exists( 'acf_add_local_field_group' ) ) {
			return;
		}
		$instructions = <<<HTML
		<p>This plugin was built to augment the Admin Menu Editor plugin. AME lets you reorganize your admin menu. This plugin lets you create collapsible sections.</p>
		<p>Everything is automatic. These settings are only for changing the section header colors.</p>

		<H3>1. Pick your class names.</H3>
		<p>This system uses class names to understand what is in what group and differentiate between headers and regular items.</p>
		<ol>
			<li>Pick a short CSS class name. (If you don't know CSS rules for this, pick 1 word and make it lowercase.)<br>
			Example: content</li>
			<li>For the header, append "-menu-section-header" to the end.<br />
			Example: content-menu-section-header</li>
			<li>For the items, append "-menu-section-item" to the end.<br />
			Example: content-menu-section-item</li>
			<li>Repeat the process for each collapsable group you want.</li>
		</ol>
		
		<H3>2. In AME, create section headings</H3>
		<ol>
			<li>Create a new menu item.</li>
			<li>Set the target page to "none".</li>
			<li>Set the class name.<br />
			The class field is in the advanced options. They're hidden by default. I recommend going into the screen settings and unchecking “Hide advanced menu options by default”.</li>
			<li>Repeat for each section.</li>
			<li>Click "save changes" when you're done.</li>
		</ol>

		<H3>3. In AME, rearrange the menu items into the order you want. Set the class name. Click "Save changes".</H3>
		<p>Remember:<br />
		The menu item with the class ending in "-header" becomes the toggle button.<br />
		The menu item with the class ending in "-item" will be hidden until the section heading is clicked.</p>

		HTML;

		acf_add_local_field_group(
			array(
				'key'                   => 'group_65777cac7fe2c',
				'title'                 => 'JWR Admin Menu Options',
				'fields'                => array(
					array(
						'key'               => 'field_657784f324016',
						'label'             => 'Instructions',
						'name'              => '',
						'aria-label'        => '',
						'type'              => 'message',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => '',
							'id'    => '',
						),
						'message'           => $instructions,
						'new_lines'         => '',
						'esc_html'          => 0,
					),
					array(
						'key'               => 'field_65777de4820f0',
						'label'             => 'Colors',
						'name'              => 'admin_menu_colors',
						'aria-label'        => '',
						'type'              => 'group',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'jwr-admin-menu-settings__colors',
							'id'    => '',
						),
						'layout'            => 'block',
						'sub_fields'        => array(
							array(
								'key'               => 'field_65777cacc2143',
								'label'             => 'Header background color',
								'name'              => 'header_background_color',
								'aria-label'        => '',
								'type'              => 'color_picker',
								'instructions'      => '',
								'required'          => 1,
								'conditional_logic' => 0,
								'wrapper'           => array(
									'width' => '',
									'class' => 'jwr-admin-menu-settings__color',
									'id'    => '',
								),
								'default_value'     => '#002244',
								'enable_opacity'    => 0,
								'return_format'     => 'string',
							),
							array(
								'key'               => 'field_65777ce3c2144',
								'label'             => 'Header text color',
								'name'              => 'header_text_color',
								'aria-label'        => '',
								'type'              => 'color_picker',
								'instructions'      => '',
								'required'          => 1,
								'conditional_logic' => 0,
								'wrapper'           => array(
									'width' => '',
									'class' => 'jwr-admin-menu-settings__color',
									'id'    => '',
								),
								'default_value'     => '#FFFFFF',
								'enable_opacity'    => 0,
								'return_format'     => 'string',
							),
							array(
								'key'               => 'field_65777cf5c2145',
								'label'             => 'Active header background color',
								'name'              => 'active_header_background_color',
								'aria-label'        => '',
								'type'              => 'color_picker',
								'instructions'      => '',
								'required'          => 1,
								'conditional_logic' => 0,
								'wrapper'           => array(
									'width' => '',
									'class' => 'jwr-admin-menu-settings__color',
									'id'    => '',
								),
								'default_value'     => '#004499',
								'enable_opacity'    => 0,
								'return_format'     => 'string',
							),
							array(
								'key'               => 'field_65777d0cc2146',
								'label'             => 'Active header text color',
								'name'              => 'active_header_text_color',
								'aria-label'        => '',
								'type'              => 'color_picker',
								'instructions'      => '',
								'required'          => 1,
								'conditional_logic' => 0,
								'wrapper'           => array(
									'width' => '',
									'class' => 'jwr-admin-menu-settings__color',
									'id'    => '',
								),
								'default_value'     => '#FFFFFF',
								'enable_opacity'    => 0,
								'return_format'     => 'string',
							),
						),
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'acf-options-admin-menu-styler',
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 0,
			)
		);
	}
);
