<?php

class ASEX_COMPARE extends ASEX_MAIN
{

    public $_cookie_name = "asex_compare_products";

    public static function setup()
    {
        //Check wish list page
        global $wpdb;
        $page_found = $wpdb->get_var($wpdb->prepare("SELECT `ID` FROM `{$wpdb->posts}` WHERE `post_name` = %s LIMIT 1;", 'compare'));
        if ($page_found)
        {
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

    public function init()
    {
        $this->asex_add_ajax("asex_add_compare", "asex_ajax_add_compare_product");
        $this->asex_add_ajax("asex_remove_compare", "asex_ajax_remove_compare_product");
        $this->asex_add_action('wp_enqueue_scripts', 'asex_compare_scripts');
        $this->asex_add_action('woocommerce_after_add_to_cart_button', 'asex_after_add_to_cart_button');
        $this->asex_add_filter('the_content', 'asex_shortcode_page_compare');
    }

    public function asex_compare_scripts()
    {
        $this->asex_add_script('compare', ASEX_URL . '/js/compare.js', array(
            'jquery'));
    }

    public function asex_shortcode_page_compare($content)
    {
        if (count(explode("[as_compare]", $content)) > 1)
        {
            $content = str_replace("[as_compare]", "", $content);
            include_once ASEX_DIR . '/template/page-compare.php';
        }
        return $content;
    }

    public function asex_ajax_add_compare_product()
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
                $compare_product = $this->asex_get_product_compare();
                if (isset($compare_product[$product_id]))
                {
                    $response["message"] = '<div class="as-tooltip-wishlist-compare">' . esc_html__("It's available,", 'asex') . '  <a target="_blank" href="' . get_page_link(get_option("as-compare-page-id")) . '">' . esc_html__("Go to Compare", 'asex') . '</a>' . '</div>';
                }
                else
                {
                    $product_attrs     = $product->get_attributes();
                    $new_product_attrs = array();
                    foreach ($product_attrs as $attribute)
                    {
                        if (empty($attribute['is_visible']) || ( $attribute['is_taxonomy'] && !taxonomy_exists($attribute['name']) ))
                        {
                            continue;
                        }
                        else
                        {
                            if ($attribute['is_taxonomy'])
                            {

                                $values = wc_get_product_terms($product->id, $attribute['name'], array(
                                    'fields' => 'names'));
                                $values = apply_filters('woocommerce_attribute', wpautop(wptexturize(implode(', ', $values))), $attribute, $values);
                            }
                            else
                            {

                                // Convert pipes to commas and display values
                                $values = array_map('trim', explode(WC_DELIMITER, $attribute['value']));
                                $values = apply_filters('woocommerce_attribute', wpautop(wptexturize(implode(', ', $values))), $attribute, $values);
                            }
                            $data_attr                             = array(
                                "name"   => $attribute["name"],
                                "title"  => wc_attribute_label($attribute['name']),
                                "values" => $values
                            );
                            $new_product_attrs[$attribute["name"]] = $data_attr;
                        }
                    }
                    $data_product = array(
                        "id"         => $product_id,
                        "name"       => $product->get_title(),
                        "price"      => $product->get_price(),
                        "image"      => $product->get_image(),
                        "attributes" => $new_product_attrs
                    );
                    $this->asex_save_product_compare($data_product);
                    $response     = array(
                        "status"  => 1,
                        "message" => "Success",
                        "notice"  => '<div class="as-tooltip-wishlist-compare">' . esc_html__("It's available,", 'asex') . '  <a target="_blank" href="' . get_page_link(get_option("as-compare-page-id")) . '">' . esc_html__("Go to Compare", 'asex') . '</a>' . '</div>'
                    );
                }
            }
            else
            {
                $response["message"] = esc_html__("Product does not existed", 'asex');
            }
        }
        else
        {
            $response["message"] = esc_html__("Product does not true", 'asex');
        }
        wp_send_json($response);
    }

    public function asex_ajax_remove_compare_product()
    {
        $product_id = $_REQUEST["product_id"];
        $response   = array(
            "status"  => 0,
            "message" => "something error"
        );
        if (!empty($product_id) && is_numeric($product_id))
        {
            $compare  = $this->asex_remove_product_compare($product_id);
            $response = array(
                "status"  => 1,
                "message" => "Success"
            );
            if (empty($compare))
            {
                $response["status"]  = 2;
                $response["message"] = '<tr><td><span class="as-no-product-msg">' . esc_attr("No Products in Compare List", 'asex') . '</span></tr></td>';
            }
        }
        else
        {
            $response["message"] = esc_html__("Product does not true", 'asex');
        }
        wp_send_json($response);
    }

    public function asex_save_product_compare($product)
    {
        $data_product                 = $this->asex_get_product_compare();
        $data_product[$product["id"]] = $product;
        $this->asex_add_cookie($this->_cookie_name, $data_product);
    }

    public function asex_get_product_compare()
    {
        return $this->asex_get_cookie($this->_cookie_name);
    }

    public function asex_remove_product_compare($product_id)
    {
        $data_product = $this->asex_get_product_compare();
        if (isset($data_product[$product_id]))
        {
            unset($data_product[$product_id]);
        }
        $this->asex_add_cookie($this->_cookie_name, $data_product);
        return $data_product;
    }

    public function asex_after_add_to_cart_button()
    {
        global $product;
        $data_product = $this->asex_get_product_compare();
        if (isset($data_product[$product->id]))
        {
            echo '<div class="compare-notice">
        		<div class="as-tooltip-wishlist-compare">' . esc_html__("It's available,", 'asex') . '<a target="_blank" href="' . get_page_link(get_option("as-compare-page-id")) . '">' . esc_html__("Go to Compare!", 'asex') . '</a></div>
        		<a data-product-id="' . $product->id . '"  class="button asex_button product_show_detail_button asex_compare_btn" href="javascript:;"><span class="dslc-icon dslc-icon-exchange"></span></a>
        	</div>';
        }
        else
        {
            echo '<div class="compare-notice"><a data-product-id="' . $product->id . '"  class="button asex_button product_show_detail_button asex_compare_btn" href="javascript:;"><span class="dslc-icon dslc-icon-exchange"></span></a></div>';
        }
    }

}
