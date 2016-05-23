<?php

require_once (ASEX_DIR . '/core/admin/asex-tab.class.php');
require_once (ASEX_DIR . '/core/admin/asex-admin-option.php');

class ASEX_ADMIN extends ASEX_MAIN
{

    public $_tab;

    public function init()
    {
        $this->_tab = new ASEX_TAB();
        $this->asex_add_action('dslc_hook_register_options', 'asex_option',50);
        $this->asex_add_action('admin_init', 'asex_admin_script');
//        $this->asex_add_action('admin_init', 'asex_plugin_redirect');
        $this->_tab->init();
    }

//    function asex_plugin_redirect()
//    {
//        if (get_option('my_plugin_do_activation_redirect', false))
//        {
//            $this->asex_add_action('admin_notices', 'asex_admin_notice');
//            //  delete_option('my_plugin_do_activation_redirect');
//            // wp_redirect(ASEX_LINK);
//        }
//    }

    public function asex_admin_script()
    {
        $this->asex_add_style('dslc-main-css', ASEX_URL . '/css/admin.css');
        $this->asex_add_script('script_radio', ASEX_URL . '/js/admin.js');
    }

}
