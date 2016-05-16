<?php
/**
 * Plugin Name: AS Extension For Live Composer
 * Plugin URI: monalisa.alenastudio.com
 * Description: AS Extension - Ultimate live composer extension packs
 * Version: 1.0.0
 * Author: Alena Studio
 * Author URI: monalisa.alenastudio.com
 * License: N/A
 */
/* Don't load me from dark side */
if (!function_exists('add_action'))
{
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
define('AS_EXTENSION_VERSION', '1.0.0');
define('AS_EXTENSION_URL', plugin_dir_url(__FILE__));
define('AS_EXTENSION_DIR', __DIR__);
define('AS_EXTENSION_DIR_NAME', dirname(plugin_basename(__FILE__)));
define('AS_EXTENSION_ABS', dirname(__FILE__));
define('AS_EXTENSION_DEV_MODE', false);
require (AS_EXTENSION_DIR . '/functions.php');
require_once (AS_EXTENSION_DIR . '/core/as-extension.class.php');
include (AS_EXTENSION_DIR . '/admin/options/general.php');
$as_extension = new AS_EXTENSION();

require (AS_EXTENSION_ABS . '/core/as-tab.class.php');
$as_tab_menu = new AS_EX_TAB();
require_once (AS_EXTENSION_DIR . '/core/as-front.class.php');
new AS_EX_FRONT();
add_action('admin_init', 'my_plugin_redirect');
require_once (AS_EXTENSION_DIR . '/include/woocommerce/woocommerce_init.php');

