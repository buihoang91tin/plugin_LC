<?php

if (!function_exists('add_action'))
{
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

class AS_EX_TAB extends AS_EXTENSION {

    public $config_menu = array();

    public function __construct()
    {
        $this->config_menu = include AS_EXTENSION_ABS . DIRECTORY_SEPARATOR . 'core/config/config.php';
        add_action('admin_menu', array(
            $this,
            'as_add_plugin_page'));
    }

    public function as_add_plugin_page()
    {
        add_dashboard_page('AS Extension Getting Start', 'AS Extension', 'manage_options', 'as_getting_start', array(
            $this,
            'as_ex_options_getting_start'));
        remove_submenu_page('index.php', 'as_getting_start');
        add_dashboard_page('AS Extension About', 'AS Extension', 'manage_options', 'about', array(
            $this,
            'as_ex_options_about'));
        remove_submenu_page('index.php', 'about');
    }

    public function as_ex_tab_menu()
    {
        $as_config = $this->config_menu;
        $as_output = '';
        $as_output .= '<h2 class="nav-tab-wrapper">';
        foreach ($as_config as
                $name =>
                $link)
        {
            $as_output.= '<a class = "nav-tab nav-tab-active" href = "' . $link . '">' . $name . '</a >';
        }
        $as_output .='</h2>';
        return $as_output;
    }

    public function as_ex_content()
    {
        return apply_filters('as_ex_content', 'default content');
    }

    public function as_ex_tab()
    {
        $as_output = '';
        $as_output .='<div id="wpbody-content" aria-label="Main content" tabindex="0">';
        $as_output .='<div class="wrap about-wrap">';
        $as_output .='<h1>' . __('Welcome to AS Extension', 'as_extension') . '</h1>';
        $as_output .='<h1><div class="about-text">' . __('Thank you for using AS Extension! We hope you will enjoy it and build awesome stuff with it.', 'as_extension') . '</div></h1>';
        $as_output .='<div class="dslc-badge"></div>';
        //menu table
        $as_output.= $this->as_ex_tab_menu();
        $as_output.= $this->as_ex_content();
        $as_output .= '</div><div class="clear"></div></div>';
        return $as_output;
    }

}
