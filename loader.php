<?php
// Include modules
include AS_EXTENSION_ABS . '/lc-addon-animations/lc-addon-animations.php';
include AS_EXTENSION_ABS . '/modules/as-title-head/module.php';
include AS_EXTENSION_ABS . '/modules/as-title-head-2/module.php';
include AS_EXTENSION_ABS . '/modules/as-title-head-3/module.php';
include AS_EXTENSION_ABS . '/modules/as-counter/module.php';
include AS_EXTENSION_ABS . '/modules/as-circle-chart/module.php';
include AS_EXTENSION_ABS . '/modules/as-progress-bars/module.php';
include AS_EXTENSION_ABS . '/modules/as-button/module.php';
include AS_EXTENSION_ABS . '/modules/as-image/module.php';
include AS_EXTENSION_ABS . '/modules/as-infobox/module.php';
include AS_EXTENSION_ABS . '/modules/as-infobox-2/module.php';
include AS_EXTENSION_ABS . '/modules/as-infobox-3/module.php';
include AS_EXTENSION_ABS . '/modules/as-infobox-4/module.php';
include AS_EXTENSION_ABS . '/modules/as-accordion/module.php';
include AS_EXTENSION_ABS . '/modules/as-projects/module.php';
include AS_EXTENSION_ABS . '/modules/as-staff/module.php';
include AS_EXTENSION_ABS . '/modules/as-testimonials/module.php';
include AS_EXTENSION_ABS . '/modules/as-posts/module.php';
include AS_EXTENSION_ABS . '/modules/as-posts-2/module.php';
include AS_EXTENSION_ABS . '/modules/as-pricing/module.php';
include AS_EXTENSION_ABS . '/modules/as-pricing-2/module.php';
include AS_EXTENSION_ABS . '/modules/as-timeline/module.php';
include AS_EXTENSION_ABS . '/modules/as-woocommerce/module.php';
include AS_EXTENSION_ABS . '/modules/as-tabs/module.php';
include AS_EXTENSION_ABS . '/modules/as-googlemap/module.php';
include AS_EXTENSION_ABS . '/modules/as-googlemap-2/module.php';
include AS_EXTENSION_ABS . '/modules/as-subscription/module.php';
include AS_EXTENSION_ABS . '/modules/as-before-after/module.php';
include AS_EXTENSION_ABS . '/modules/as-countdown/module.php';
include AS_EXTENSION_ABS . '/modules/as-listing/module.php';
include AS_EXTENSION_ABS . '/modules/as-text-rotator/module.php';
function anna_load_script()
{
	wp_enqueue_style('anna-animation-css', AS_EXTENSION_URL . 'lc-addon-animations/css/animations.css');
    wp_enqueue_style('anna-custom-css', AS_EXTENSION_URL . 'css/hi-icon.css');
    wp_enqueue_style('anna-custom-css', AS_EXTENSION_URL . 'css/anna-custom.css');
    wp_enqueue_script('anna-front-plugins-js', AS_EXTENSION_URL . 'js/front-plugins.js', array('jquery'));
    wp_enqueue_script('anna-front-js', AS_EXTENSION_URL . 'js/front.js', array('jquery'));
    wp_enqueue_script('anna-front-js', AS_EXTENSION_URL . 'js/jquery.event.move.js', array('jquery'));
    wp_enqueue_script('anna-front-js', AS_EXTENSION_URL . 'js/jquery.twentytwenty.js', array('jquery'));
    wp_enqueue_script('anna-googlemap-js', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array('jquery'));
}
add_action('wp_enqueue_scripts', 'anna_load_script');

// Register New Module
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Button" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Circle_Chart_Module" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Counter_Module" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Progress_Bars" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Image" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Info_Box" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Info_Box_2" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Info_Box_3" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Info_Box_4" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Accordion" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Projects" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Staff" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Heading_Title_Module" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Heading_Title_Module_2" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Heading_Title_Module_3" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Posts" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Posts_2" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Pricing" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Pricing_2" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Timeline" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Testimonials_Simple" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_WooCommerce_Products" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Tabs" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Google_Map" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Google_Map_2" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_SubscriptionBox" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Countdown" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Before_After" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_Listing" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "AS_text_rotator" );'));

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