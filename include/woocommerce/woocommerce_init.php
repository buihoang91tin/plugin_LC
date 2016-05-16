<?php

/* ----------------------------------------------------------------------------------- */
/* Wishlist   */
/* ----------------------------------------------------------------------------------- */
require_once AS_EXTENSION_ABS . "/include/woocommerce/wish-list/wish-list.php";
require_once AS_EXTENSION_ABS . "/include/woocommerce/compare/compare.php";
if (class_exists('Woocommerce')) {
    /* ----------------------------------------------------------------------------------- */
    /* Ajax   */
    /* ----------------------------------------------------------------------------------- */
    as_ex_add_ajax('remove_product', 'as_remove_product_from_cart');
    as_ex_add_ajax('as_quick_view', 'as_load_product_quick_view');

    /* ----------------------------------------------------------------------------------- */
    /* Filters   */
    /* ----------------------------------------------------------------------------------- */
    add_filter('body_class', 'woo_columns_body_class');
    add_filter('loop_shop_per_page', create_function('$limit', 'return ' . as_option('as_woo_item_per_page') . ';'), 20);
    add_filter('woocommerce_enqueue_styles', 'jk_dequeue_styles');
    add_filter('woocommerce_show_page_title', 'override_page_title');
    add_filter('loop_shop_columns', create_function('$cols', 'return ' . as_option('woo_listing_column_number') . ';'), 20);

    /* ----------------------------------------------------------------------------------- */
    /* Actions   */
    /* ----------------------------------------------------------------------------------- */
    add_action('wp_enqueue_scripts', 'as_woo_enqueue_scripts');
    add_action('init', 'jk_remove_wc_breadcrumbs');
    add_action('woocommerce_before_shop_loop_item_title', 'as_woo_template_loop_second_product_thumbnail', 11);
    add_action('woocommerce_before_shop_loop_item_title_module_dslc', 'as_woo_template_loop_second_product_thumbnail', 11);
    /* ----------------------------------------------------------------------------------- */
    /* Remove Woo Default Styles  */
    /* ----------------------------------------------------------------------------------- */

    function jk_dequeue_styles($enqueue_styles) {
        unset($enqueue_styles['woocommerce-general']);
        return $enqueue_styles;
    }

    /* ----------------------------------------------------------------------------------- */
    /* Load Our Woo Styles   */
    /* ----------------------------------------------------------------------------------- */

    function as_woo_enqueue_scripts() {
        if (!function_exists('is_woocommerce_activated')) {
            as_ex_add_style('as-woocommerce', AS_EXTENSION_URL . '/include/woocommerce/css/woocommerce.css');
            as_ex_add_script('as-woocommerce', AS_EXTENSION_URL . '/include/woocommerce/js/woocommerce.js', array(
                "jquery"), false, true);
            as_ex_add_script('as-elevatezoom', AS_EXTENSION_URL . '/include/woocommerce/js/libs/jquery.elevatezoom.js', array(
                "jquery"), false, true);
        }
    }

    /* ----------------------------------------------------------------------------------- */
    /* Product Listing: Disable Page Title  */
    /* ----------------------------------------------------------------------------------- */

    function override_page_title() {
        return false;
    }

    /* ----------------------------------------------------------------------------------- */
    /* Remove woocommerce breadcrumb   */
    /* ----------------------------------------------------------------------------------- */

    function jk_remove_wc_breadcrumbs() {
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    }

    /* ----------------------------------------------------------------------------------- */
    /* Product Listing: Column Classes   */
    /* ----------------------------------------------------------------------------------- */

    function woo_columns_body_class($classes) {
        if (is_woocommerce()) {
            $classes[] = 'columns-' . as_option('woo_listing_column_number');
        }
        return $classes;
    }

    function as_remove_product_from_cart() {
        $prod_to_remove = $_POST["remove_product"];
        $response       = array(
            "status"  => 0,
            "message" => "something error"
        );
        if (!empty($prod_to_remove) && is_numeric($prod_to_remove)) {
            foreach (WC()->cart->cart_contents as
                    $prod_in_cart) {
                // Get the Variation or Product ID
                $prod_id = ( isset($prod_in_cart['variation_id']) && $prod_in_cart['variation_id'] != 0 ) ? $prod_in_cart['variation_id'] : $prod_in_cart['product_id'];

                // Check to see if IDs match
                if ($prod_to_remove == $prod_id) {
                    // Get it's unique ID within the Cart
                    $prod_unique_id = WC()->cart->generate_cart_id($prod_id);
                    // Remove it from the cart by un-setting it
                    ob_start();
                    WC()->cart->remove_cart_item($prod_unique_id);
                    ob_get_clean();
                }
            }
            $response = array(
                "status"           => 1,
                "message"          => "success",
                "cart_sub_total"   => WC()->cart->get_cart_subtotal(),
                "cart_count_total" => WC()->cart->get_cart_contents_count(),
            );
        }
        else {
            $response = array(
                "status"  => 0,
                "message" => "Wrong Product"
            );
        }
        wp_send_json($response);
    }

    function as_load_product_quick_view() {

        if (!isset($_REQUEST['product_id'])) {
            die();
        }
        // Image
        add_action('as_wcqv_product_image', 'woocommerce_show_product_sale_flash', 10);
        add_action('as_wcqv_product_image', 'woocommerce_show_product_images', 20);

        // Summary
        add_action('as_wcqv_product_summary', 'woocommerce_template_single_title', 5);
        add_action('as_wcqv_product_summary', 'woocommerce_template_single_rating', 10);
        add_action('as_wcqv_product_summary', 'woocommerce_template_single_price', 15);
        add_action('as_wcqv_product_summary', 'woocommerce_template_single_excerpt', 20);
        add_action('as_wcqv_product_summary', 'woocommerce_template_single_add_to_cart', 25);
        add_action('as_wcqv_product_summary', 'woocommerce_template_single_meta', 30);

        $product_id = intval($_REQUEST['product_id']);

        // set the main wp query for the product
        wp('p=' . $product_id . '&post_type=product');

        // remove product thumbnails gallery
        remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);

        ob_start();

        // load content template
        wc_get_template('quick-view.php', array(), '', get_template_directory() . '/woocommerce/cart/');

        echo ob_get_clean();

        die();
    }

    // Display the second thumbnails
    function as_woo_template_loop_second_product_thumbnail() {
        global $product, $woocommerce;

        $attachment_ids = $product->get_gallery_attachment_ids();

        if ($attachment_ids) {
            $secondary_image_id = $attachment_ids['0'];
            echo wp_get_attachment_image($secondary_image_id, 'shop_catalog', '', $attr               = array(
                'class' => 'secondary-image attachment-shop-catalog'));
        }
    }

}