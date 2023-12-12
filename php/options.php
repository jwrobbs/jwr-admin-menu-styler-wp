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
		$instructions = <<<EOS
			<p>Implemented properly, this plugin will augment the Admin Menu Editor plugin by allowing you to hide or display large chunks of the admin menu. This is done by adding section headers (menu items) and using CSS classes to indicate your groups. </p>
			<ol>
				<li><p>Set your class names below.</p>
				<p>You are defining the <em>stem</em>. When you add the class to the menu items, you should use a prefix for the menu group.</p>
				
				<p>Example: Suppose you are creating a group for content type items (and you're using the default class stems). You could use "content-menu-section-header" for the section header class name and "content-menu-section-item" for the items you want to hide.</p></li>
				<ul>
					<li>Header class stem - The class name stem for the section headers. These items will be the buttons that hide or show the rest of the group.</li>
					<li>Item class stem - The class name stem for the menu items. These items will be hidden on page load.</li>
				</ul>
				<li>Using the Admin Menu Editor plugin, put the menu items in the order you want. Don't forget to set the classname.</li>
				<li>Add menu items to indicate the start of a section. Set the target pages to "none". Again, don't forget to set the class name.</li>
				<li>Assuming you clicked "Save Changes" everything should be configured.</li>

			</ol>
			<p><strong>Note: The class setting is hidden by default. I recommend going into the settings and unchecking "Hide advanced menu options by default".</strong></p>
			<strong>Colors</strong>

			<ul>
				<li><strong>Header background color</strong> - The background color of the header.</li>
				<li><strong>Header text color</strong> - The text color of the header.</li>
				<li><strong>Active header background color</strong> - The background color of the active header.</li>
				<li><strong>Active header text color</strong> - The text color of the active header.</li>
			</ul>

		EOS;

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
						'name'              => 'colors',
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
					array(
						'key'               => 'field_65777e66820f1',
						'label'             => 'Class names',
						'name'              => 'class_names',
						'aria-label'        => '',
						'type'              => 'group',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => array(
							'width' => '',
							'class' => 'jwr-admin-menu-settings__classes',
							'id'    => '',
						),
						'layout'            => 'block',
						'sub_fields'        => array(
							array(
								'key'               => 'field_65777e81820f2',
								'label'             => 'Header class stem',
								'name'              => 'header_class_stem',
								'aria-label'        => '',
								'type'              => 'text',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => array(
									'width' => '',
									'class' => 'jwr-admin-menu-settings__class',
									'id'    => '',
								),
								'default_value'     => '-menu-section-header',
								'maxlength'         => '',
								'placeholder'       => '',
								'prepend'           => '',
								'append'            => '',
							),
							array(
								'key'               => 'field_65777eb8820f3',
								'label'             => 'Item class stem',
								'name'              => 'item_class_stem',
								'aria-label'        => '',
								'type'              => 'text',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => array(
									'width' => '',
									'class' => 'jwr-admin-menu-settings__class',
									'id'    => '',
								),
								'default_value'     => '-menu-section-item',
								'maxlength'         => '',
								'placeholder'       => '',
								'prepend'           => '',
								'append'            => '',
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
