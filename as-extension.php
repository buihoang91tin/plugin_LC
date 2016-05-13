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
require_once (AS_EXTENSION_DIR . '/core/as-extension.class.php');
include (AS_EXTENSION_DIR . '/admin/options/general.php');
$as_extension = new AS_EXTENSION();

require (AS_EXTENSION_ABS . '/core/as-tab.class.php');
$as_tab_menu = new AS_EX_TAB();
require_once (AS_EXTENSION_DIR . '/core/as-front.class.php');
new AS_EX_FRONT();
add_action('admin_init', 'my_plugin_redirect');

function my_admin_notice()
{
    if (!(function_exists('dslc_register_modules')))
    {
        ?>
        <div class="updated">
            <?php
            $admin_url = '#'; // get_admin_url().'update.php?action=install-plugin&amp;plugin=as_extension&amp;_wpnonce=d77895e8c3';
            ?>
            <p><?php _e('AS Extension need Live Composer plugin <a style="color:red;" target="_self" href="' . $admin_url . '">Please install this plugin</a>', 'alenastudio'); ?></p>
        </div>
        <?php
    }
}

function my_plugin_redirect()
{
    if (get_option('my_plugin_do_activation_redirect', false))
    {
        add_action('admin_notices', 'my_admin_notice');
        //  delete_option('my_plugin_do_activation_redirect');
        // wp_redirect(AS_EXTENSION_LINK);
    }
}