<?php

class ASEX_QUICK_VIEW extends ASEX_MAIN
{

    public function init()
    {
        $this->asex_add_ajax('asex_quick_view', 'asex_load_product_quick_view');
    }

    public function asex_load_product_quick_view()
    {
        if (!isset($_REQUEST['product_id']))
        {
            die();
        }
        // Image
        add_action('asex_wcqv_product_image', 'woocommerce_show_product_sale_flash', 10);
        add_action('asex_wcqv_product_image', 'woocommerce_show_product_images', 20);

        // Summary
        add_action('asex_wcqv_product_summary', 'woocommerce_template_single_title', 5);
        add_action('asex_wcqv_product_summary', 'woocommerce_template_single_rating', 10);
        add_action('asex_wcqv_product_summary', 'woocommerce_template_single_price', 15);
        add_action('asex_wcqv_product_summary', 'woocommerce_template_single_excerpt', 20);
        add_action('asex_wcqv_product_summary', 'woocommerce_template_single_add_to_cart', 25);
        add_action('asex_wcqv_product_summary', 'woocommerce_template_single_meta', 30);

        $product_id = intval($_REQUEST['product_id']);

        // set the main wp query for the product
        wp('p=' . $product_id . '&post_type=product');

        // remove product thumbnails gallery
        remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);

        ob_start();

        // load content template
        wc_get_template('page-quick-view.php', array(), '', ASEX_ABS . '/template/');

        echo ob_get_clean();

        die();
    }

}
