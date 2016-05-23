<?php

require_once ASEX_ABS . "/core/woocommerce/asex-quick-view.php";

class ASEX_WOO extends ASEX_MAIN
{

    public $_compare;
    public $_quickview;
    public $_wish_list;

    public function init()
    {
        $this->_compare   = new ASEX_COMPARE();
        $this->_wish_list = new ASEX_WISH_LIST();
        $this->_quickview = new ASEX_QUICK_VIEW();
        if (class_exists('Woocommerce'))
        {
            $this->_compare->init();
            $this->_wish_list->init();
            $this->_quickview->init();
            $this->asex_add_ajax('remove_product', 'asex_remove_product_from_cart');
//            $this->add_filter('body_class', 'woo_columns_body_class');
            //$this->add_filter('loop_shop_per_page', create_function('$limit', 'return ' . asex_option('asex_woo_item_per_page') . ';'), 20);
            $this->asex_add_filter('woocommerce_enqueue_styles', 'asex_dequeue_styles');
            $this->asex_add_filter('woocommerce_show_page_title', 'asex_override_page_title');
// $this->add_filter('loop_shop_columns', create_function('$cols', 'return ' . asex_option('woo_listing_column_number') . ';'), 20);

            /* ----------------------------------------------------------------------------------- */
            /* Actions   */
            /* ----------------------------------------------------------------------------------- */
            $this->asex_add_action('wp_enqueue_scripts', 'asex_woo_enqueue_scripts');
            $this->asex_add_action('init', 'asex_remove_wc_breadcrumbs');
            $this->asex_add_action('woocommerce_before_shop_loop_item_title', 'asex_woo_template_loop_second_product_thumbnail', 11);
            $this->asex_add_action('woocommerce_before_shop_loop_item_title_module_dslc', 'asex_woo_template_loop_second_product_thumbnail', 11);
        }
    }

    public function asex_remove_product_from_cart()
    {
        $prod_to_remove = $_POST["remove_product"];
        $response       = array(
            "status"  => 0,
            "message" => "something error"
        );
        if (!empty($prod_to_remove) && is_numeric($prod_to_remove))
        {
            foreach (WC()->cart->cart_contents as $prod_in_cart)
            {
                // Get the Variation or Product ID
                $prod_id = ( isset($prod_in_cart['variation_id']) && $prod_in_cart['variation_id'] != 0 ) ? $prod_in_cart['variation_id'] : $prod_in_cart['product_id'];

                // Check to see if IDs match
                if ($prod_to_remove == $prod_id)
                {
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
        else
        {
            $response = array(
                "status"  => 0,
                "message" => "Wrong Product"
            );
        }
        wp_send_json($response);
    }

    public function asex_woo_columns_body_class($classes)
    {
        if (is_woocommerce())
        {
            $classes[] = 'columns-' . asex_option('woo_listing_column_number');
        }
        return $classes;
    }

    public function asex_dequeue_styles($enqueue_styles)
    {
        unset($enqueue_styles['woocommerce-general']);
        return $enqueue_styles;
    }

    public function asex_override_page_title()
    {
        return false;
    }

    public function asex_woo_enqueue_scripts()
    {
        $this->asex_add_style('asex-woocommerce', ASEX_URL . '/css/woocommerce.css');
        $this->asex_add_script('asex-woocommerce', ASEX_URL . '/js/woocommerce.js', array(
            "jquery"), false, true);
        $this->asex_add_script('asex-elevatezoom', ASEX_URL . '/js/lib/jquery.elevatezoom.js', array(
            "jquery"), false, true);
    }

    public function asex_remove_wc_breadcrumbs()
    {
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    }

    public function asex_woo_template_loop_second_product_thumbnail()
    {
        global $product, $woocommerce;

        $attachment_ids = $product->get_gallery_attachment_ids();

        if ($attachment_ids)
        {
            $secondary_image_id = $attachment_ids['0'];
            echo wp_get_attachment_image($secondary_image_id, 'shop_catalog', '', $attr               = array(
                'class' => 'secondary-image attachment-shop-catalog'));
        }
    }

}
