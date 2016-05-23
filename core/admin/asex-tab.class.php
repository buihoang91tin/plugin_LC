<?php

class ASEX_TAB extends ASEX_MAIN {

    public $config_menu = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function init()
    {
        $this->config_menu = $this->config["menu"];
        $this->asex_add_action('admin_menu', 'asex_add_menu');
        $this->asex_add_action('admin_init', 'asex_plugin_options_init');
    }

    public function asex_tab_menu()
    {
        $asex_config = $this->config_menu;
        $asex_output = '';
        $asex_output .= '<h2 class="nav-tab-wrapper">';
        foreach ($asex_config as
                $name =>
                $link)
        {
            $asex_output.= '<a class = "nav-tab nav-tab-active" href = "' . $link . '">' . $name . '</a >';
        }
        $asex_output .='</h2>';
        return $asex_output;
    }

    public function asex_content()
    {
        return apply_filters('asex_content', 'default content');
    }

    public function asex_tab()
    {
        $asex_output = '';
        $asex_output .='<div id="wpbody-content" aria-label="Main content" tabindex="0">';
        $asex_output .='<div class="wrap about-wrap">';
        $asex_output .='<h1>' . __('Welcome to AS Extension', 'asex') . '</h1>';
        $asex_output .='<h1><div class="about-text">' . __('Thank you for using AS Extension! We hope you will enjoy it and build awesome stuff with it.', 'asex') . '</div></h1>';
        $asex_output .='<div class="dslc-badge"></div>';
        //menu table
        $asex_output.= $this->asex_tab_menu();
        $asex_output.= $this->asex_content();
        $asex_output .= '</div><div class="clear"></div></div>';
        return $asex_output;
    }

    public function asex_plugin_options_init()
    {

        global $asex_plugin_options;
        /**
         * Add Sections
         */
        if (!empty($asex_plugin_options))
        {
            foreach ($asex_plugin_options as
                    $section_ID =>
                    $section)
            {
                add_settings_section(
                        $section_ID, $section['title'], array(
                    $this,
                    'asex_plugin_options_display_options'), $section_ID
                );

                register_setting(
                        $section_ID, $section_ID
                );

                /**
                 * Add Fields
                 */
                foreach ($section['options'] as
                        $option_ID =>
                        $option)
                {

                    $option['id'] = $option_ID;

                    if (!isset($option['section']))
                    {

                        $option['section'] = $section_ID;
                    }

                    $option['name'] = 'asex_general_options[' . $option['id'] . ']';

                    $value   = '';
                    $options = get_option('asex_general_options');

                    if (isset($options[$option_ID]))
                    {

                        $value = $options[$option_ID];
                    }

                    /// Prev version struct
                    if ($value == '')
                    {

                        $options = get_option($section_ID);

                        if (isset($options[$option_ID]))
                        {

                            $value = $options[$option_ID];
                        }

                        if ($value == '')
                        {

                            $value = $option['std'];
                        }
                    }

                    $option['value'] = $value;

                    add_settings_field(
                            $option_ID, $option['label'], function() use ( $option )
                    {

                        $func = 'dslc_plugin_option_display_' . $option['type'];
                        $func($option);
                    }, $section_ID, $section_ID
                    );
                }
            }
        }
    }

    public function asex_plugin_options_display_options($section)
    {
        /*
         * Function is required for add_settings_section
         * even if we don't print any data insite of it.
         * In our case all the settings fields rendered
         * by callback from add_settings_field.
         *
         */
    }

    public function asex_add_menu()
    {
        add_menu_page('AS Extension', 'AS Extension', 'read', 'as-extension', array(
            $this,
            'asex_options_getting_start'), ASEX_URL . '/img/icon.png');
    }

    function asex_options_getting_start()
    {
        include ( ASEX_DIR . '/template/tab-init.php');
    }

}
