<?php
/* ----------------------------------------------------------------------------------- */
/* 	Init Actions */
/* ----------------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'as_on_add_scripts');
add_action('wp_print_styles', 'as_on_add_styles');
add_action('init', 'as_theme_init');
add_action('widgets_init', 'as_widgets_init');
add_action('wp_footer', 'as_scripts_in_footer', 100);
add_action('after_setup_theme', 'as_action_init_wish_list');
add_action('after_setup_theme', 'as_action_init_compare');
/* ----------------------------------------------------------------------------------- */
/* 	Init Functions */
/* ----------------------------------------------------------------------------------- */

function as_on_add_scripts() {
    // enqueue backbonejs, underscore
    as_add_existed_script('backbone');
    as_add_existed_script('underscore');
    if (as_option('as_option_smooth_scroll', '1')) {
        // Smoothscroll JS
        as_add_script('smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array(
            'jquery'));
    }
    // Modernize JS
    as_add_script('modernizr', get_template_directory_uri() . '/js/libs/modernizr.custom.js', array(
        'jquery'));
    if (as_option('as_option_retina_img', '1')) {
        as_add_script('retina', get_template_directory_uri() . '/js/libs/retina.min.js', array(
            'jquery'));
    }
    as_add_script('front', get_template_directory_uri() . '/js/front.js', array(
        'jquery',
        'backbone',
        'underscore'));
    as_add_script('js-appear', get_template_directory_uri() . '/js/libs/main.js', array(
        'jquery',
        'jquery'));

    // Internet Explorer HTML5 support 
    as_add_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array(), '3.7.3', false);
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');

    // Add js easing when plugin not active
    if (!(function_exists('dslc_register_modules'))) {
        //add js easing
        as_add_script('js-easing', get_template_directory_uri() . '/js/libs/jquery.easing.js', array(
            'jquery',
            'jquery'));
    }
    wp_localize_script('front', 'as_globals', array(
        'ajaxURL' => admin_url('admin-ajax.php'),
        'imgURL'  => get_template_directory_uri() . '/img/'
    ));
    // Custom
    as_add_script('main', get_template_directory_uri() . '/js/main.js', array(
        'jquery'));
    // add style demo
    if (file_exists(get_template_directory() . '/demo/js/custom_panel.js')) {
        as_add_script('custom_panel', get_template_directory_uri() . '/demo/js/custom_panel.js', array(
            'jquery'));
    }
}

function as_on_add_styles() {
    if (!(function_exists('dslc_register_modules'))) {
        as_add_style('as-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0', 'all');
        // AS Icon Font
        as_add_style('as-icon-font', get_template_directory_uri() . '/css/as-icon-font.css', array(), '1.0', 'all');
        // Add temp style
        as_add_style('as-css-temp', get_template_directory_uri() . '/css/temp-style-dslc.css', array(), '1.0', 'all');
    }

    // Dialog
    as_add_style('as-dialog', get_template_directory_uri() . '/css/libs/dialog/dialog.css', array(), '1.0', 'all');
    as_add_style('as-dialog-wilma', get_template_directory_uri() . '/css/libs/dialog/dialog-wilma.css', array(
        'as-dialog'), '1.0', 'all');
    // Style.css
    as_add_style('as-style', get_stylesheet_uri());
    // Responsive Style
    as_add_style('responsive-style', get_template_directory_uri() . '/css/responsive-style.css', array(), '1.0', 'all');
    // Custom Style
    as_add_style('custom', get_template_directory_uri() . '/css/custom-style.php', array(), '1.0', 'all');
    //video audio
    as_add_style('video', get_template_directory_uri() . '/css/libs/html5/video.css', array(), '1.0', 'all');

    if (file_exists(get_template_directory() . '/demo/css/style_end.css')) {
        //style demo
        as_add_style('style_end', get_template_directory_uri() . '/demo/css/style_end.css', array(), '1.0', 'all');
    }
}

function as_theme_init() {
    // Add tile
    add_theme_support("title-tag");
    // Auto feed
    add_theme_support('automatic-feed-links');
    // Woocommerce
    add_theme_support('woocommerce');
    // Add post formats
    add_theme_support('post-formats', array(
        'gallery',
        'image',
        'video',
        'quote',
        'link',
        'audio'));
    add_post_type_support('dslc_projects', 'post-formats');
    // Add featured images
    add_theme_support('post-thumbnails');
    // Add custom background
    add_theme_support('custom-background');
    // Add custom header
    add_theme_support('custom-header');
    /* === Register Menus === */
    register_nav_menu('as_header_menu', esc_html__('Theme Main Menu', 'alenastudio'));
    register_nav_menu('as_sub_menu', esc_html__('Theme Sub Menu', 'alenastudio'));
    register_nav_menu('as_sidebar_menu', esc_html__('Theme Sidebar Menu', 'alenastudio'));
    register_nav_menu('as_footer_menu', esc_html__('Theme Footer Menu', 'alenastudio'));
}

function as_register_widget_init() {
    register_widget('AS_Social_Photo');
    register_widget('AS_Contact_Info_Widget');
    register_widget('AS_Recent_Posts_Widget');
    register_widget('AS_Social_Info_Widget');
    register_widget('AS_Widget_Image');
    register_widget('AS_Subscribe');
    register_widget('AS_Facebook_widget');
    register_widget('AS_introduce_widget');
}

function as_register_sidebar_init() {
    $array_sidebar = include_once get_template_directory() . '/includes/sidebars.php';
    if (!empty($array_sidebar)) {
        foreach ($array_sidebar as
                $sidebar) {
            register_sidebar($sidebar);
        }
    }
}

function as_widgets_init() {
    as_register_widget_init();
    as_register_sidebar_init();
}

function as_scripts_in_footer() {
    ?>
    <script type="text/javascript">
        (function ($, Views, Models, AS) {
            $(document).ready(function () {
                // init view front
                if (typeof Views.Front !== 'undefined') {
                    AS.App = new Views.Front();
                }
            });
        })(jQuery, AS.Views, AS.Models, window.AS);
        var root_ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
    </script>
    <?php
}

// Function Wish-list Product
function as_action_init_wish_list() {
    //Check wish list page
    global $wpdb;
    $page_found = $wpdb->get_var($wpdb->prepare("SELECT `ID` FROM `{$wpdb->posts}` WHERE `post_name` = %s LIMIT 1;", 'wishlist'));
    if ($page_found) {
        update_option('as-wishlist-page-id', $page_found);
        return;
    }

    $page_data = array(
        'post_status'    => 'publish',
        'post_type'      => 'page',
        'post_author'    => 1,
        'post_name'      => esc_sql(_x('wishlist', 'page_slug', 'as')),
        'post_title'     => esc_html__('Wishlist', 'as'),
        'post_content'   => '[as_wish_list]',
        'post_parent'    => 0,
        'comment_status' => 'closed'
    );
    $page_id   = wp_insert_post($page_data);
    update_option('as-wishlist-page-id', $page_id);
}

// Function Compare Product
function as_action_init_compare() {
    //Check wish list page
    global $wpdb;
    $page_found = $wpdb->get_var($wpdb->prepare("SELECT `ID` FROM `{$wpdb->posts}` WHERE `post_name` = %s LIMIT 1;", 'compare'));
    if ($page_found) {
        update_option('as-compare-page-id', $page_found);
        return;
    }

    $page_data = array(
        'post_status'    => 'publish',
        'post_type'      => 'page',
        'post_author'    => 1,
        'post_name'      => esc_sql(_x('compare', 'page_slug', 'as')),
        'post_title'     => esc_html__('Compare', 'as'),
        'post_content'   => '[as_compare]',
        'post_parent'    => 0,
        'comment_status' => 'closed'
    );
    $page_id   = wp_insert_post($page_data);
    update_option('as-compare-page-id', $page_id);
}

// Function wp_kses HTML
function as_allowed_html_array() {
    global $allowed_html_array;
    $allowed_html_array = array(
        //formatting
        'strong' => array(),
        'em'     => array(),
        'b'      => array(),
        'i'      => array(),
        'br'     => array(),
        //links
        'a'      => array(
            'href' => array()
        )
    );
}

as_allowed_html_array();

function as_allowed_html_array_f2() {
    global $allowed_html_array;
    echo wp_kses((as_option('as_option_copyright_footer_2', 'alenastudio')), $allowed_html_array);
}

// Function Woo Header
function as_woo() {
    global $woocommerce;
    echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);
}

// Function Add Class Body + Set Class for Style Boxed
if (!function_exists('as_class_data')) {

    function as_class_data() {
        $as_woo_control_style = '';
        //boxed class
        $as_boxed             = '';
        // set width for boxed
        $as_width             = '';
        if (class_exists('Woocommerce')) {
            $as_woo_control_style = 'as-woo-control-style-wrapper';
        }
        //get value of choice
        $as_boxed_choice = rwmb_meta('as_boxed_choice');
        if ($as_boxed_choice == 1){
            $as_boxed             = 'as-boxed';
            $as_width = rwmb_meta('as_boxed_choice_width');
        }elseif ($as_boxed_choice == 2) {
            $as_boxed             = ' ';
            $as_width = '';
        }elseif ($as_boxed_choice == 0) {
            $as_boxed_RD_choice = as_option('as_option_page_width');
            if($as_boxed_RD_choice == 1){
                $as_boxed = 'as-boxed';
                $as_width = as_option('as_option_page_set_width');
            }
        }
        $as_class_data = array(
            'as_woo_control_style' => $as_woo_control_style,
            'as_boxed'             => $as_boxed,
            'as_width'             => $as_width
        );
        return $as_class_data;
    }

}
add_filter('body_class', 'as_get_class_body');

function as_get_class_body($as_classes) {

    $as_class_data = as_class_data();

    $as_classes[] = $as_class_data['as_woo_control_style'];
    // return the $classes array
    return $as_classes;
}

// Fix Width $content
if (!isset($content_width)) {
    $content_width = 1170;
}
if (!function_exists("rwmb_meta")) {

    function rwmb_meta($id, $default = false) {
        $array_default = array(
            "as_custom_page_metaboxes" => array('page_breadcrumb_options'),
            "as_breadcrumb_menu"       => 1,
            "as_header_box"            => 0,
            "as_boxed_choice"          => 0,
            "as_footer_menu"           => 0,
            "as_boxed_choice_width"    => '',
            "as_blog_option"           => 'default',
            "as_html5_audio_file_mp3"  => '',
            "as_url_link"              => '',
            "as_text_link"             => '',
            "as_bg_link"               => '',
            "as_youtube_link"          => '',
            "as_view_img"              => '',
            "as_html5_video_file_mp4"  => '',
            "as_html5_video_file_ogv"  => '',
            "as_html5_video_file_webm" => '',
            "as_html5_media_loop"      => 'loop',
            "as_html5_media_autoplay"  => 'autoplay',
        );
        if (!isset($array_default[$id])) {
            return $default;
        }
        else {
            return $array_default[$id];
        }
    }

}
