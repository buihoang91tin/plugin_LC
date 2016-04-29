<?php

/**
  ReduxFramework Sample Config File
  For full documentation, please visit http://reduxframework.com/docs/
 * */
/**
  Most of your editing will be done in this section.
  Here you can override default values, uncomment args and change their values.
  No $args are required, but they can be overridden if needed.
 * */
$args                      = array();
// For use with a tab example below
$tabs                      = array();
// BEGIN Sample Config
// Setting dev mode to true allows you to view the class settings/info in the panel.
// Default: true
$args['dev_mode']          = false;
// Set the icon for the dev mode tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['dev_mode_icon'] = 'info-sign';
// Set the class for the dev mode tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
//args['dev_mode_icon_class'] = 'el-icon-large';
// Set a custom option name. Don't forget to replace spaces with underscores!
$args['opt_name']          = 'as_ex_options';
// Setting system info to true allows you to view info useful for debugging.
// Default: false
//$args['system_info'] = false;
// Theme Panel Main Display Name
$args['display_name']      = __("AS EXTENSION DEFAULT MODULE", 'alenastudio');
$args['display_version']   = false;
// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key']    = 'AIzaSyANTG_0ZzMEVSNOTw5VfrDk4RfOgaL9L3s';
// Define the starting tab for the option panel.
// Default: '0';
$args['last_tab']          = '0';
// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
// Default: 'standard'
$args['admin_stylesheet']  = 'standard';
// Enable the import/export feature.
// Default: true
//$args['show_import_export'] = false;
// Set the icon for the import/export tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: refresh
//$args['import_icon'] = 'refresh';
// Set the class for the import/export tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['import_icon_class'] = 'wp-menu-image dashicons-before dashicons-admin-generic';
// Set a custom menu icon.
$args['menu_icon']         = get_template_directory_uri() . '/img/logo-mona-small.png';
// Set a custom title for the options page.
// Default: Options
$args['menu_title']        = esc_html__('AS STYLE MODULE', 'alenastudio');
// Set a custom page title for the options page.
// Default: Options
$args['page_title']        = esc_html__('AS STYLE MODULE', 'alenastudio');
// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug']         = 'as_ex_options';
// Show Default
$args['default_show']      = false;
// Default Mark
$args['default_mark']      = '';
// Set a custom page capability.
// Default: manage_options
//$args['page_cap'] = 'manage_options';
// Set the menu type. Set to "menu" for a top level menu, or "submenu" to add below an existing item.
// Default: menu
//$args['page_type'] = 'submenu';
// Set the parent menu.
// Default: themes.php
// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'options_general.php';
// Set a custom page location. This allows you to place your menu where you want in the menu order.
// Must be unique or it will override other items!
// Default: null
//$args['page_position'] = null;
// Set a custom page icon class (used to override the page icon next to heading)
$args['page_icon']         = 'icon-themes';
// Set the icon type. Set to "iconfont" for Elusive Icon, or "image" for traditional.
// Redux no longer ships with standard icons!
// Default: iconfont
//$args['icon_type'] = 'image';
// Disable the panel sections showing as submenu items.
// Default: true
//$args['allow_sub_menu'] = false;
// Set the help sidebar for the options page.
//$args['help_sidebar'] = esc_html__('<p>This is the sidebar content, HTML is allowed.</p>', 'alenastudio');
// Add content after the form.
$args['footer_text']       = "";
// Set footer/credit line.
$args['footer_credit']     = "";
// Declare sections array
$sections                  = array();
// Main Setting -------------------------------------------------------------------------- >
$sections[]                = array(
    'title'      => esc_html__('Style Module For Default', 'alenastudio'),
    'header'     => esc_html__('Style Module For Default', 'alenastudio'),
    'desc'       => esc_html__('Style Module For Default', 'alenastudio'),
    'icon_class' => 'el-icon-large',
    'icon'       => 'el-icon-cog',
    'submenu'    => true,
    'fields'     => array(
    ),
);
global $ReduxFramework;
$ReduxFramework            = new ReduxFramework($sections, $args, $tabs);
// Function used to retrieve theme option values
if (!function_exists('as_ex_options')) {

    function as_ex_options($id, $fallback = false, $param = false) {
        global $as_ex_options;
        if ($fallback == false)
            $fallback = '';
        $output   = ( isset($as_ex_options[$id]) && $as_ex_options[$id] !== '' ) ? $as_ex_options[$id] : $fallback;
        if (!empty($as_ex_options[$id]) && $param) {
            $output = $as_ex_options[$id][$param];
        }
        return $output;
    }

}