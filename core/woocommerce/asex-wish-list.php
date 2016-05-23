<?php

class ASEX_WISH_LIST extends ASEX_MAIN
{

    public $_cookie_name = "asex_wishlist_products";

    public static function setup()
    {
        //Check wish list page
        global $wpdb;
        $page_found = $wpdb->get_var($wpdb->prepare("SELECT `ID` FROM `{$wpdb->posts}` WHERE `post_name` = %s LIMIT 1;", 'wishlist'));
        if ($page_found)
        {
            update_option('as-wishlist-page-id', $page_found);
            return;
        }

        $page_data = array(
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'post_author'    => 1,
            'post_name'      => esc_sql(_x('wishlist', 'page_slug', 'as')),
            'post_title'     => esc_html__('Wishlist', 'as'),
            'post_content'   => '[asex_wish_list]',
            'post_parent'    => 0,
            'comment_status' => 'closed'
        );
        $page_id   = wp_insert_post($page_data);
        update_option('as-wishlist-page-id', $page_id);
    }

    public function init()
    {
        $this->asex_add_ajax("asex_add_wish_list", "asex_ajax_add_wish_list_product");
        $this->asex_add_ajax("asex_remove_wish_list", "asex_ajax_remove_wish_list_product");
        $this->asex_add_action('wp_enqueue_scripts', 'asex_wishlist_scripts');
        $this->asex_add_action('woocommerce_after_add_to_cart_button', 'asex_wish_list_after_add_to_cart_button');
        $this->asex_add_filter('the_content', 'asex_shortcode_page_wish_list');
    }

    public function asex_wishlist_scripts()
    {
        $this->asex_add_script('wishlist', ASEX_URL . '/js/wish-list.js', array(
            'jquery'));
    }

    public function asex_shortcode_page_wish_list($content)
    {
        if (count(explode("[as_wish_list]", $content)) > 1)
        {
            $content = str_replace("[as_wish_list]", "", $content);
            include_once ASEX_DIR . '/template/page-wish-list.php';
        }
        return $content;
    }

    public function asex_ajax_add_wish_list_product()
    {
        $product_id = $_REQUEST["product_id"];
        $response   = array(
            "status"  => 0,
            "message" => "something error"
        );
        if (!empty($product_id) && is_numeric($product_id))
        {
            $product = wc_get_product($product_id);
            if (!empty($product))
            {
                $wishlist_product = $this->asex_get_product_wish_list();
                if (isset($wishlist_product[$product_id]))
                {
                    $response["message"] = '<div class="as-tooltip-wishlist-compare">' . esc_html__("It's available,", 'alenastudio') . ' <a target="_blank" href="' . get_page_link(get_option("as-wishlist-page-id")) . '">' . esc_html__("Go to Wishlist", 'alenastudio') . '</a>' . '</div>';
                }
                else
                {
                    $data_product = array(
                        "id"    => $product_id,
                        "name"  => $product->get_title(),
                        "price" => $product->get_price(),
                        "image" => $product->get_image()
                    );
                    $this->asex_save_product_wish_list($data_product);
                    $response     = array(
                        "status"  => 1,
                        "message" => "Success",
                        "notice"  => '<div class="as-tooltip-wishlist-compare">' . esc_html__("It's available,", 'alenastudio') . ' <a target="_blank" href="' . get_page_link(get_option("as-wishlist-page-id")) . '">' . esc_html__("Go to Wishlist", 'alenastudio') . '</a>' . '</div>'
                    );
                }
            }
            else
            {
                $response["message"] = esc_html__("Product does not existed", 'alenastudio');
            }
        }
        else
        {
            $response["message"] = esc_html__("Product does not true", 'alenastudio');
        }
        wp_send_json($response);
    }

    public function asex_ajax_remove_wish_list_product()
    {
        $product_id = $_REQUEST["product_id"];
        $response   = array(
            "status"  => 0,
            "message" => "something error"
        );
        if (!empty($product_id) && is_numeric($product_id))
        {
            $wishlist = $this->asex_remove_product_wish_list($product_id);
            $response = array(
                "status"  => 1,
                "message" => "Success"
            );
            if (empty($wishlist))
            {
                $response = array(
                    "status"  => 2,
                    "message" => '<tr><td colspan="5"><span>' . esc_attr("No Products in wishlist", 'alenastudio') . '</span></td></tr>'
                );
            }
        }
        else
        {
            $response["message"] = esc_html__("Product does not true", 'alenastudio');
        }
        wp_send_json($response);
    }

    public function asex_save_product_wish_list($product)
    {
        $data_product                 = $this->asex_get_product_wish_list();
        $data_product[$product["id"]] = $product;
        $this->asex_add_cookie($this->_cookie_name, $data_product);
    }

    public function asex_remove_product_wish_list($product_id)
    {
        $data_product = $this->asex_get_product_wish_list();
        if (isset($data_product[$product_id]))
        {
            unset($data_product[$product_id]);
        }
        $this->asex_add_cookie($this->_cookie_name, $data_product);
        return $data_product;
    }

    public function asex_get_product_wish_list()
    {
        return $this->asex_get_cookie($this->_cookie_name);
    }

    public function asex_wish_list_after_add_to_cart_button()
    {
        global $product;
        $data_product = $this->asex_get_product_wish_list();
        if (isset($data_product[$product->id]))
        {
            echo '<div class="wish-list-notice">
        		<div class="as-tooltip-wishlist-compare">' . esc_html__("It's available,", 'alenastudio') . '<a target="_blank" href="' . get_page_link(get_option("as-wishlist-page-id")) . '">' . esc_html__("Go to Wishlist!", 'alenastudio') . '</a></div>
        		<a data-product-id = "' . $product->id . '" class="button asex_button product_show_detail_button asex_wishlist_btn" href="javascript:;"><span class="dslc-icon dslc-icon-heart-empty"></span></a>
        	</div>';
        }
        else
        {
            echo '<div class="wish-list-notice"><a data-product-id = "' . $product->id . '" class="button asex_button product_show_detail_button asex_wishlist_btn" href="javascript:;"><span class="dslc-icon dslc-icon-heart-empty"></span></a></div>';
        }
    }

}
