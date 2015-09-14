<?php
// Include modules
include AS_EXTENSION_ABS . '/lc-addon-animations/lc-addon-animations.php';
//include AS_EXTENSION_ABS . '/modules/anna-tp-meta/module.php';
include AS_EXTENSION_ABS . '/modules/anna-title-head/module.php';
include AS_EXTENSION_ABS . '/modules/anna-counter/module.php';
include AS_EXTENSION_ABS . '/modules/anna-circle-chart/module.php';
include AS_EXTENSION_ABS . '/modules/anna-button/module.php';
include AS_EXTENSION_ABS . '/modules/anna-image/module.php';
include AS_EXTENSION_ABS . '/modules/anna-infobox/module.php';
include AS_EXTENSION_ABS . '/modules/anna-infobox-2/module.php';
include AS_EXTENSION_ABS . '/modules/anna-infobox-3/module.php';
include AS_EXTENSION_ABS . '/modules/anna-accordion/module.php';
include AS_EXTENSION_ABS . '/modules/anna-projects/module.php';
include AS_EXTENSION_ABS . '/modules/anna-staff/module.php';
include AS_EXTENSION_ABS . '/modules/anna-testimonials/module.php';
//include AS_EXTENSION_ABS . '/modules/anna-social/module.php';
include AS_EXTENSION_ABS . '/modules/anna-posts/module.php';
include AS_EXTENSION_ABS . '/modules/anna-pricing/module.php';
//include AS_EXTENSION_ABS . '/modules/anna-timeline/module.php';
//include AS_EXTENSION_ABS . '/modules/anna-related-posts/module.php';
//include AS_EXTENSION_ABS . '/modules/anna-woocommerce/module.php';
include AS_EXTENSION_ABS . '/modules/anna-tabs/module.php';
include AS_EXTENSION_ABS . '/modules/anna-googlemap/module.php';
include AS_EXTENSION_ABS . '/modules/anna-subscription/module.php';
//include AS_EXTENSION_ABS . '/modules/anna-countdown/module.php';
function anna_load_script()
{
	wp_enqueue_style('anna-animation-css', AS_EXTENSION_URL . 'lc-addon-animations/css/animations.css');
    wp_enqueue_style('anna-custom-css', AS_EXTENSION_URL . 'css/anna-custom.css');
    wp_enqueue_script('anna-front-plugins-js', AS_EXTENSION_URL . 'js/front-plugins.js', array('jquery'));
    wp_enqueue_script('anna-front-js', AS_EXTENSION_URL . 'js/front.js', array('jquery'));
    wp_enqueue_script('anna-googlemap-js', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array('jquery'));
}
add_action('wp_enqueue_scripts', 'anna_load_script');

// Register New Module
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_TP_Meta" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Button" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Circle_Chart_Module" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Counter_Module" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Image" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Info_Box" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Info_Box_2" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Info_Box_3" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Accordion" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Projects" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Staff" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Heading_Title_Module" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Posts" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Pricing" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Timeline" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Related_Posts" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Testimonials_Simple" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Social" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_WooCommerce_Products" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Tabs" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Google_Map" );'));
add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_SubscriptionBox" );'));
//add_action('dslc_hook_register_modules', create_function('', 'return dslc_register_module( "Anna_Countdown" );'));

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