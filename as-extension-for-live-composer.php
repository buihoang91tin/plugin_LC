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
function_exists('add_action') or die('Access denied');

/* Base plugin define */
define('AS_EXTENSION_URL', plugin_dir_url(__FILE__));
define('AS_EXTENSION_DIR', __DIR__);
define('AS_EXTENSION_DIR_NAME', dirname(plugin_basename(__FILE__)));
define('AS_EXTENSION_ABS', dirname(__FILE__));
define('AS_EXTENSION_DEV_MODE', false);
define('AS_EXTENSION_LINK','index.php?page=as_getting_start');

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
    wp_enqueue_style( 'about' );
    wp_enqueue_style( 'about-rev' );
    include ( AS_EXTENSION_DIR . '/admin/about.php');
}

function as_extension_options_manage_feature() {
    wp_enqueue_style( 'as-checkbox' );
    wp_enqueue_script('script_radio');
    include ( AS_EXTENSION_DIR . '/admin/as-options-framework.php');
}
function as_extension_options_getting_start() {
    
    include ( AS_EXTENSION_DIR . '/admin/as-options-getting-start.php');
}


/**
 * Add menu item
 */
function as_extension_setup_menu() {
    wp_register_style( 'as-checkbox', plugins_url('/admin/css/as-checkbox.css', __FILE__) );
    wp_register_style( 'about', plugins_url('/admin/css/about.css', __FILE__) );
    wp_register_style( 'about-rev', plugins_url('/admin/css/reponsive-about.css', __FILE__) );
    wp_register_script( 'script_radio', plugins_url( '/admin/js/script.js', __FILE__ ) );
    global $as_extension_options;


    add_menu_page(
            'AS Extension For Live Composer', 'AS Extension', 'manage_options', 'as_extension_options', 'as_extension_options_display'
    );
    add_submenu_page(
            'as_extension_options', 'About AS Extension For Live Composer', 'About Us', 'manage_options', 'as_extension_options', 'as_extension_options_about_us'
    );
    add_submenu_page(
            'as_extension_options', 'Manage AS Extension For Live Composer', 'Manage modules', 'manage_options', 'as_extension_manage_feature', 'as_extension_options_manage_feature'
    );

     add_dashboard_page( 'AS Extension Getting Start', 'AS Extension', 'manage_options', 'as_getting_start', 'as_extension_options_getting_start');
     remove_submenu_page( 'index.php', 'as_getting_start' );
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

register_activation_hook( __FILE__, 'my_plugin_activate' );
add_action('admin_init', 'my_plugin_redirect');
function my_plugin_activate() {

//hook vào after active ko fai hook vao active no chua active thi no ko cho e vao fai roi =.= hieu ko da
    // Activation code here...
    add_option('my_plugin_do_activation_redirect', true);
}

function my_admin_notice() {
	if (!(function_exists('dslc_register_modules'))){
   ?>
    <div class="updated">
        <?php
        $admin_url = admin_url().'plugin-install.php?tab=plugin-information&plugin=live-composer-page-builder&TB_iframe=true&width=300&height=300';
        ?>
        <p><?php _e( 'AS Extension need Live Composer plugin <a target="_blank" href="'.$admin_url.'" style="color:red;">Please install this plugin</a>', 'alenastudio'); ?></p>
    </div>
	<?php }
}
function my_plugin_redirect() {
    if (get_option('my_plugin_do_activation_redirect', false)) {
		add_action( 'admin_notices', 'my_admin_notice' );
      //  delete_option('my_plugin_do_activation_redirect');
       // wp_redirect(AS_EXTENSION_LINK);
    }
}