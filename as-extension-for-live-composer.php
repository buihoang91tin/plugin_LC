<?php
/**
 * Plugin Name: AS Extension For Live Composer
 * Plugin URI: http://www.example.com/
 * Description: Ultimate live composer extension packs
 * Version: 1.0.0
 * Author: N/A
 * Author URI: N/A
 * License: N/A
 */
/* Don't load me from dark side */
function_exists('add_action') or die('Access denied');

/* Base plugin define */
define('AS_EXTENSION_URL', plugin_dir_url(__FILE__));
define('AS_EXTENSION_DIR', __DIR__);
define('AS_EXTENSION_DIR_NAME', dirname(plugin_basename(__FILE__)));
define('AS_EXTENSION_ABS', dirname(__FILE__));
define('AS_EXTENSION_DEV_MODE', false);

/* Load this after all */

function as_load_this_plugin_last() {
    if (defined('DS_LIVE_COMPOSER_VER')) {
        $asLoader = new asExtensionLoader();
    }
}

function as_extension_options_display($tab = '') {
   //include( AS_EXTENSION_DIR_NAME . 'assets/about.php');
}

function as_extension_options_about_us() {
    include ( AS_EXTENSION_DIR . '/admin/about.php');
}

function as_extension_options_manage_feature() {
    include ( AS_EXTENSION_DIR . '/admin/as-options-framework.php');
}

/**
 * Add menu item
 */
function as_extension_setup_menu() {

    global $as_extension_options;

    add_menu_page(
            'AS Extension For Live Composer', 'AS Extension', 'manage_options', 'as_extension_options', 'as_extension_options_display'
    );
    add_submenu_page(
            'as_extension_options', 'About AS Extension For Live Composer', 'About Us', 'manage_options', 'as_extension_options', 'as_extension_options_about_us'
    );
    add_submenu_page(
            'as_extension_options', 'Manage AS Extension For Live Composer', 'Manage features modules', 'manage_options', 'as_extension_manage_feature', 'as_extension_options_manage_feature'
    );
}

add_action('plugins_loaded', 'as_load_this_plugin_last', count(get_option('active_plugins')));
add_action('admin_menu', 'as_extension_setup_menu');

/**
 * AS Extension Loader
 */
class asExtensionLoader {

    /**
     * AS Extension loader construction
     */
    public function __construct() {
        include_once AS_EXTENSION_ABS . DIRECTORY_SEPARATOR . 'loader.php';
    }

}
