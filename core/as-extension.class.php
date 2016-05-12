<?php

if (!function_exists('add_action'))
{
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

class AS_EXTENSION {

    public function __construct()
    {
        add_action('admin_init', array(
            $this,
            'as_ex_regiter_style'));
        add_action('admin_menu', array(
            $this,
            'as_add_menu'));
        add_action('plugins_loaded', array(
            $this,
            'as_load_this_plugin_last'), count(get_option('active_plugins')));
        register_activation_hook(AS_EXTENSION_DIR . '/as-extension.php', array(
            $this,
            'activation_hook'));
        register_deactivation_hook(AS_EXTENSION_DIR . '/as-extension.php', array(
            $this,
            'deactivation_hook'));
    }

    public function activation_hook()
    {
        add_option('my_plugin_do_activation_redirect', true);
        add_option('as_default_module_stye', true);
    }

    public function deactivation_hook()
    {
        delete_option('my_plugin_do_activation_redirect');
        delete_option('as_default_module_stye');
    }

    public function as_add_menu()
    {
        add_menu_page('AS Extension', 'AS Extension', 'read', 'as-extension', array(
            $this,
            'as_ex_options_getting_start'), AS_EXTENSION_URL . '/admin/img/icon.png');
    }

    public function as_ex_regiter_style()
    {
        wp_enqueue_style('as-checkbox', AS_EXTENSION_URL . '/admin/css/as-checkbox.css');
        wp_enqueue_style('about', AS_EXTENSION_URL . '/admin/css/about.css');
        wp_enqueue_style('about-rev', AS_EXTENSION_URL . '/admin/css/reponsive-about.css');
        wp_enqueue_script('script_radio', AS_EXTENSION_URL . '/admin/js/script.js');
    }

    function as_ex_options_getting_start()
    {

        include ( AS_EXTENSION_DIR . '/admin/as-options-getting-start.php');
    }

    public function as_load_this_plugin_last()
    {
        if (defined('DS_LIVE_COMPOSER_VER'))
        {
            require_once AS_EXTENSION_ABS . DIRECTORY_SEPARATOR . 'loader.php';
        }
    }

    public function as_ex_options_about()
    {
        include ( AS_EXTENSION_DIR . '/admin/about.php');
    }

}
