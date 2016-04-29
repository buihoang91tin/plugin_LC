<?php
//Add function
include AS_EXTENSION_ABS . '/include/function.php';
//Add function
include AS_EXTENSION_ABS . '/include/ajax.php';
//add redux
require_once dirname(__FILE__) . '/admin/inc/framework.php';
require_once dirname(__FILE__) . '/admin/inc/admin-config.php';
require_once dirname(__FILE__) . '/include/as_module.php';
//// Include modules
include AS_EXTENSION_ABS . '/lc-addon-animations/lc-addon-animations.php';
include AS_EXTENSION_ABS . '/modules/as-accordion/module.php';
include AS_EXTENSION_ABS . '/modules/as-before-after/module.php';
include AS_EXTENSION_ABS . '/modules/as-box-image/module.php';
include AS_EXTENSION_ABS . '/modules/as-button/module.php';
include AS_EXTENSION_ABS . '/modules/as-circle-chart/module.php';
//include AS_EXTENSION_ABS . '/modules/as-countdown/module.php';
include AS_EXTENSION_ABS . '/modules/as-counter/module.php';
include AS_EXTENSION_ABS . '/modules/as-googlemap/module.php';
include AS_EXTENSION_ABS . '/modules/as-image/module.php';
include AS_EXTENSION_ABS . '/modules/as-infobox/module.php';
include AS_EXTENSION_ABS . '/modules/as-infobox-2/module.php';
include AS_EXTENSION_ABS . '/modules/as-infobox-3/module.php';
include AS_EXTENSION_ABS . '/modules/as-infobox-4/module.php';
include AS_EXTENSION_ABS . '/modules/as-infobox-5/module.php';
include AS_EXTENSION_ABS . '/modules/as-introduce/module.php';
include AS_EXTENSION_ABS . '/modules/as-listing/module.php';
//include AS_EXTENSION_ABS . '/modules/as-posts/module.php';
include AS_EXTENSION_ABS . '/modules/as-pricing/module.php';
include AS_EXTENSION_ABS . '/modules/as-pricing-2/module.php';
include AS_EXTENSION_ABS . '/modules/as-pricing-3/module.php';
include AS_EXTENSION_ABS . '/modules/as-progress-bars/module.php';
include AS_EXTENSION_ABS . '/modules/as-projects/module.php';
include AS_EXTENSION_ABS . '/modules/as-res-menu/module.php';
include AS_EXTENSION_ABS . '/modules/as-social/module.php';
include AS_EXTENSION_ABS . '/modules/as-staff/module.php';
include AS_EXTENSION_ABS . '/modules/as-subscription/module.php';
include AS_EXTENSION_ABS . '/modules/as-tabs/module.php';
include AS_EXTENSION_ABS . '/modules/as-testimonials/module.php';
include AS_EXTENSION_ABS . '/modules/as-text-rotator/module.php';
include AS_EXTENSION_ABS . '/modules/as-timeline/module.php';
include AS_EXTENSION_ABS . '/modules/as-title-head/module.php';
include AS_EXTENSION_ABS . '/modules/as-title-head-2/module.php';
include AS_EXTENSION_ABS . '/modules/as-title-head-3/module.php';
include AS_EXTENSION_ABS . '/modules/as-video/module.php';
if ( class_exists( 'WooCommerce' ) ) {    
include AS_EXTENSION_ABS . '/modules/as-woocommerce/module.php';
}

// Register JS & CSS libary
function as_load_script() {
    wp_enqueue_style('as-animation-css', AS_EXTENSION_URL . 'lc-addon-animations/css/animations.css');
    wp_enqueue_style('as-hi-icon-css', AS_EXTENSION_URL . 'css/hi-icon.css');
    wp_enqueue_style('as-icon-font', AS_EXTENSION_URL . 'css/as-icon-font.css');
    wp_enqueue_style('as-custom-css', AS_EXTENSION_URL . 'css/scss/as_custom.css');
    wp_enqueue_script('as-front-plugins-js', AS_EXTENSION_URL . 'js/front-plugins.js', array(
        'jquery'));
    wp_enqueue_script('as-front-js', AS_EXTENSION_URL . 'js/front.js', array(
        'jquery'));
    wp_enqueue_script('as-event-move', AS_EXTENSION_URL . 'js/jquery.event.move.js', array(
        'jquery'));
      wp_enqueue_script('as-js-plugin', AS_EXTENSION_URL . 'js/jquery.plugin.js', array(
        'jquery'));
      wp_enqueue_script('as-circle-char', AS_EXTENSION_URL . 'js/lib/circle_chart.js', array(
        'jquery'));
      wp_enqueue_script('as-video-module', AS_EXTENSION_URL . 'js/lib/video.js', array(
        'jquery'));
      wp_enqueue_script('as-text-rotator', AS_EXTENSION_URL . 'js/text-rotator-main.js', array(
        'jquery'));
    wp_enqueue_script('as-twentytwenty', AS_EXTENSION_URL . 'js/jquery.twentytwenty.js', array(
        'jquery'));
    wp_enqueue_script('as-countdown', AS_EXTENSION_URL . 'js/jquery.countdown.js', array(
        'jquery'));
    wp_enqueue_script('as-googlemap-js', 'http://maps.google.com/maps/api/js?sensor=false&v=3.5', array(
        'jquery'));
}

add_action('wp_enqueue_scripts', 'as_load_script');

//// Register New Module

add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Accordion" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Button" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Circle_Chart_Module" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Counter_Module" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Progress_Bars" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Image" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Info_Box" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Info_Box_2" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Info_Box_3" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Info_Box_4" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Info_Box_5" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Projects" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Staff" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Heading_Title_Module" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Heading_Title_Module_2" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Heading_Title_Module_3" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Posts" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Pricing" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Pricing_2" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Pricing_3" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Timeline" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Testimonials_Simple" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Tabs" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Google_Map" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_SubscriptionBox" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Countdown" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Before_After" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Listing" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_text_rotator" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Introduce" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_video" );'));
if ( class_exists( 'WooCommerce' ) ) {  
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_WooCommerce_Products" );'));    
    
}
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Res_Menu" );'));
// Add galleries to post
// Add galleries to post
global $dslc_var_post_options;
$dslc_var_post_options['dslc-gallery-post-options'] = array(
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
