<?php

require_once ASEX_DIR . '/core/asex-module.php';
// Include modules
include ASEX_ABS . '/modules/as-accordion/module.php';
include ASEX_ABS . '/modules/as-before-after/module.php';
include ASEX_ABS . '/modules/as-box-image/module.php';
include ASEX_ABS . '/modules/as-button/module.php';
include ASEX_ABS . '/modules/as-circle-chart/module.php';
include ASEX_ABS . '/modules/as-counter/module.php';
include ASEX_ABS . '/modules/as-googlemap/module.php';
include ASEX_ABS . '/modules/as-image/module.php';
include ASEX_ABS . '/modules/as-infobox/module.php';
include ASEX_ABS . '/modules/as-infobox-2/module.php';
include ASEX_ABS . '/modules/as-infobox-3/module.php';
include ASEX_ABS . '/modules/as-infobox-4/module.php';
include ASEX_ABS . '/modules/as-infobox-5/module.php';
include ASEX_ABS . '/modules/as-introduce/module.php';
include ASEX_ABS . '/modules/as-listing/module.php';
include ASEX_ABS . '/modules/as-pricing/module.php';
include ASEX_ABS . '/modules/as-pricing-2/module.php';
include ASEX_ABS . '/modules/as-pricing-3/module.php';
include ASEX_ABS . '/modules/as-progress-bars/module.php';
include ASEX_ABS . '/modules/as-projects/module.php';
include ASEX_ABS . '/modules/as-res-menu/module.php';
include ASEX_ABS . '/modules/as-social/module.php';
include ASEX_ABS . '/modules/as-staff/module.php';
include ASEX_ABS . '/modules/as-subscription/module.php';
include ASEX_ABS . '/modules/as-tabs/module.php';
include ASEX_ABS . '/modules/as-testimonials/module.php';
include ASEX_ABS . '/modules/as-text-rotator/module.php';
include ASEX_ABS . '/modules/as-timeline/module.php';
include ASEX_ABS . '/modules/as-title-head/module.php';
include ASEX_ABS . '/modules/as-title-head-2/module.php';
include ASEX_ABS . '/modules/as-title-head-3/module.php';
include ASEX_ABS . '/modules/as-video/module.php';

//Temp
include ASEX_ABS . '/modules/as-posts/module.php';
include ASEX_ABS . '/modules/as-countdown/module.php';
if (class_exists('WooCommerce'))
{
    include ASEX_ABS . '/modules/as-woocommerce/module.php';
}

class ASEX_MODULE_LIST extends ASEX_MAIN
{

    public function init()
    {
        $this->asex_add_action('wp_enqueue_scripts', 'asex_load_script');
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Accordion" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Accordion" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Button" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Circle_Chart_Module" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Counter_Module" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Progress_Bars" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Image" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Info_Box" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Info_Box_2" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Info_Box_3" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Info_Box_4" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Info_Box_5" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Projects" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Staff" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Heading_Title_Module" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Heading_Title_Module_2" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Heading_Title_Module_3" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Posts" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Pricing" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Pricing_2" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Pricing_3" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Timeline" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Testimonials_Simple" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Tabs" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Google_Map" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_SubscriptionBox" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Countdown" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Before_After" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Listing" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_text_rotator" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Introduce" );'));
        add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_video" );'));
        if (class_exists('WooCommerce'))
        {
            add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_WooCommerce_Products" );'));
        }
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "ASEX_Res_Menu" );'));
        $this->setCustomOptions();
    }

    public function asex_load_script()
    {
        $this->asex_add_style('as-animation-css', ASEX_URL . 'css/animations.css');
        $this->asex_add_style('as-hi-icon-css', ASEX_URL . 'css/hi-icon.css');
        $this->asex_add_style('as-icon-font', ASEX_URL . 'css/as-icon-font.css');
        $this->asex_add_style('as-custom-css', ASEX_URL . 'css/scss/asex_custom.css');
        $this->asex_add_script('as-front-plugins-js', ASEX_URL . 'js/front-plugins.js', array(
            'jquery'));
        $this->asex_add_script('as-front-js', ASEX_URL . 'js/front.js', array(
            'jquery'));
        $this->asex_add_script('as-event-move', ASEX_URL . 'js/jquery.event.move.js', array(
            'jquery'));
        $this->asex_add_script('as-js-plugin', ASEX_URL . 'js/jquery.plugin.js', array(
            'jquery'));
        $this->asex_add_script('as-circle-char', ASEX_URL . 'js/lib/circle_chart.js', array(
            'jquery'));
        $this->asex_add_script('as-video-module', ASEX_URL . 'js/lib/video.js', array(
            'jquery'));
        $this->asex_add_script('as-text-rotator', ASEX_URL . 'js/text-rotator-main.js', array(
            'jquery'));
        $this->asex_add_script('as-twentytwenty', ASEX_URL . 'js/jquery.twentytwenty.js', array(
            'jquery'));
        $this->asex_add_script('as-countdown', ASEX_URL . 'js/jquery.countdown.js', array(
            'jquery'));
        $this->asex_add_script('as-googlemap-js', 'http://maps.google.com/maps/api/js?sensor=false&v=3.5', array(
            'jquery'));
    }

    public function setCustomOptions()
    {
        global $dslc_var_post_options;
        $dslc_var_post_options['dslc-post-options'] = array(
            'title'   => 'Gallery Options',
            'show_on' => 'post',
            'options' => array(
                array(
                    'label' => 'Images',
                    'std'   => '',
                    'id'    => 'dslc_gallery_images',
                    'type'  => 'files',
                ),
            )
        );
    }

}
