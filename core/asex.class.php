<?php
require_once ASEX_ABS . "/core/woocommerce/asex-wish-list.php";
require_once ASEX_ABS . "/core/woocommerce/asex-compare.php";

class ASEX extends ASEX_MAIN
{

    public $_front;
    public $_admin;

    public function init()
    {
        register_activation_hook(ASEX_DIR . '/as-extension.php', array(
            $this,
            'activation_hook'));
        register_deactivation_hook(ASEX_DIR . '/as-extension.php', array(
            $this,
            'deactivation_hook'));
        $this->asex_add_action('plugins_loaded', 'asex_require');
    }

    public function activation_hook()
    {
        add_option('my_plugin_do_activation_redirect', true);
        add_option('asex_default_module_stye', true);
        ASEX_COMPARE::setup();
        ASEX_WISH_LIST::setup();
    }

    public function deactivation_hook()
    {
        delete_option('my_plugin_do_activation_redirect');
        delete_option('asex_default_module_stye');
    }

    public function asex_require()
    {
        if (class_exists('DSLC_Module'))
        {
            require_once (ASEX_DIR . '/core/asex-front.class.php');
            require_once (ASEX_DIR . '/core/admin/asex-admin.class.php');
            $this->_front = new ASEX_FRONT();
            $this->_admin = new ASEX_ADMIN();
            $this->_front->init();
            $this->_admin->init();
        }
        else
        {
            $this->asex_add_action('admin_notices', 'asex_require_notice');
        }
    }

    public function asex_require_notice()
    {
        ?>    <div class="updated">
            <?php
            $admin_url = '#'; // get_admin_url().'update.php?action=install-plugin&amp;plugin=asex_extension&amp;_wpnonce=d77895e8c3';
            ?>
            <p><?php _e('AS Extension need Live Composer plugin <a style="color:red;" target="_self" href="' . $admin_url . '">Please install this plugin</a>', 'asex'); ?></p>
        </div>
        <?php
    }

//
//    public function asex_load_this_plugin_last()
//    {
//        if (defined('DS_LIVE_COMPOSER_VER'))
//        {
//            require_once ASEX_ABS . DIRECTORY_SEPARATOR . 'loader.php';
//        }
//    }
}
