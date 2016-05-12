<?php

if (!function_exists('add_action'))
{
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
/**
 * AS Extension Loader
 */
/* Base plugin define */
define('AS_EXTENSION_URL', plugin_dir_url(__FILE__));
define('AS_EXTENSION_DIR', __DIR__);
define('AS_EXTENSION_DIR_NAME', dirname(plugin_basename(__FILE__)));
define('AS_EXTENSION_ABS', dirname(__FILE__));
define('AS_EXTENSION_DEV_MODE', false);
define('AS_EXTENSION_LINK', 'index.php?page=as_getting_start');
define('AS_EXTENSION_LINK_ABOUT', 'index.php?page=about');
register_activation_hook(__FILE__, array(
    'AS_EX_INIT',
    'as_plugin_activate'));
register_deactivation_hook(__FILE__, array(
    'AS_EX_INIT',
    'as_plugin_deactivation'));
require (AS_EXTENSION_ABS . '/core/main.class.php');
add_action('admin_menu', 'as_add_menu');
function as_add_menu()
{
    add_menu_page('AS Extension', 'AS Extension', 'read', 'as-extension', 'as_function',AS_EXTENSION_URL . '/admin/img/icon.png');
}
require_once AS_EXTENSION_ABS . DIRECTORY_SEPARATOR . 'core/init.class.php';

function as_function()
{
    require_once AS_EXTENSION_ABS . DIRECTORY_SEPARATOR . 'admin/as-options-getting-start.php';
}

function as_load_this_plugin_last()
{
    if (defined('DS_LIVE_COMPOSER_VER'))
    {
        require_once AS_EXTENSION_ABS . DIRECTORY_SEPARATOR . 'loader.php';
    }
}

function as_extension_options_display($tab = '')
{
    //include( AS_EXTENSION_DIR_NAME . 'assets/about.php');
}

function as_extension_options_about_us()
{
    wp_enqueue_style('about');
    wp_enqueue_style('about-rev');
    include ( AS_EXTENSION_DIR . '/admin/about.php');
}

function as_extension_options_manage_feature()
{
    wp_enqueue_style('as-checkbox');
    wp_enqueue_script('script_radio');
    include ( AS_EXTENSION_DIR . '/admin/as-options-framework.php');
}

function as_extension_options_getting_start()
{

    include ( AS_EXTENSION_DIR . '/admin/as-options-getting-start.php');
}

function as_extension_options_about()
{

    include ( AS_EXTENSION_DIR . '/admin/about.php');
}

function as_extension_options_default()
{
    wp_enqueue_style('as-checkbox');
    wp_enqueue_script('script_radio');
    include ( AS_EXTENSION_DIR . '/admin/as-options-default.php');
}

/**
 * Add menu item
 */
function as_extension_setup_menu()
{
    wp_register_style('as-checkbox', plugins_url('/admin/css/as-checkbox.css', __FILE__));
    wp_register_style('about', plugins_url('/admin/css/about.css', __FILE__));
    wp_register_style('about-rev', plugins_url('/admin/css/reponsive-about.css', __FILE__));
    wp_register_script('script_radio', plugins_url('/admin/js/script.js', __FILE__));
    global $as_extension_options;
    add_dashboard_page('AS Extension Getting Start', 'AS Extension', 'manage_options', 'as_getting_start', 'as_extension_options_getting_start');
    remove_submenu_page('index.php', 'as_getting_start');
    add_dashboard_page('AS Extension About', 'AS Extension', 'manage_options', 'about', 'as_extension_options_about');
    remove_submenu_page('index.php', 'about');
}

add_action('plugins_loaded', 'as_load_this_plugin_last', count(get_option('active_plugins')));
add_action('admin_menu', 'as_extension_setup_menu');

register_activation_hook(__FILE__, 'my_plugin_activate');
add_action('admin_init', 'my_plugin_redirect');

function my_plugin_activate()
{

//hook vào after active ko fai hook vao active no chua active thi no ko cho e vao fai roi =.= hieu ko da
    // Activation code here...
    add_option('my_plugin_do_activation_redirect', true);
    add_option('as_default_module_stye', true);
}

function my_admin_notice()
{
    if (!(function_exists('dslc_register_modules')))
    {
        ?>
        <div class="updated">
            <?php
            $admin_url = '#'; // get_admin_url().'update.php?action=install-plugin&amp;plugin=live-composer-page-builder&amp;_wpnonce=d77895e8c3';
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
