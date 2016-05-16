<?php

define("COMPARE_WOO_PLUGIN_URL",  AS_EXTENSION_URL . "include/woocommerce/compare");
define("COMPARE_COOKIE_NAME", "as_compare_products");
/* ----------------------------------------------------------------------------------- */
/* Ajax   */
/* ----------------------------------------------------------------------------------- */
as_ex_add_ajax("as_add_compare", "as_ajax_add_compare_product");
as_ex_add_ajax("as_remove_compare", "as_ajax_remove_compare_product");
/* ----------------------------------------------------------------------------------- */
/* Filters   */
/* ----------------------------------------------------------------------------------- */

/* ----------------------------------------------------------------------------------- */
/* Actions   */
/* ----------------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'as_compare_scripts');
add_action('woocommerce_after_add_to_cart_button', 'as_after_add_to_cart_button');
/* ----------------------------------------------------------------------------------- */
/* ShortCodes   */
/* ----------------------------------------------------------------------------------- */
add_filter( 'the_content', 'as_shortcode_page_compare' );

function as_compare_scripts() {
    as_ex_add_script('compare', COMPARE_WOO_PLUGIN_URL . '/js/compare.js', array(
        'jquery'));
}

function as_shortcode_page_compare($content) {
	if(count(explode("[as_compare]", $content)) > 1)
	{
		$content = str_replace("[as_compare]", "", $content);
    	include_once dirname(__FILE__) . '/template/compare-page.php';
    }
    return $content;
}

function as_ajax_add_compare_product() {
    $product_id = $_REQUEST["product_id"];
    $response   = array(
        "status"  => 0,
        "message" => "something error"
    );
    if (!empty($product_id) && is_numeric($product_id)) {
        $product = wc_get_product($product_id);
        if (!empty($product)) {
            $compare_product = as_get_product_compare();
            if (isset($compare_product[$product_id])) {
                $response["message"] = '<div class="as-tooltip-wishlist-compare">' . esc_html__("It's available,", 'alenastudio') . '  <a target="_blank" href="' . get_page_link(get_option("as-compare-page-id")) . '">' . esc_html__("Go to Compare", 'alenastudio') . '</a>' . '</div>';
            }
            else {
                $product_attrs     = $product->get_attributes();
                $new_product_attrs = array();
                foreach ($product_attrs as
                        $attribute) {
                    if (empty($attribute['is_visible']) || ( $attribute['is_taxonomy'] && !taxonomy_exists($attribute['name']) )) {
                        continue;
                    }
                    else {
                        if ($attribute['is_taxonomy']) {

                            $values = wc_get_product_terms($product->id, $attribute['name'], array(
                                'fields' => 'names'));
                            $values = apply_filters('woocommerce_attribute', wpautop(wptexturize(implode(', ', $values))), $attribute, $values);
                        }
                        else {

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
                as_save_product_compare($data_product);
                $response     = array(
                    "status"  => 1,
                    "message" => "Success",
                    "notice"  => '<div class="as-tooltip-wishlist-compare">' . esc_html__("It's available,", 'alenastudio') . '  <a target="_blank" href="' . get_page_link(get_option("as-compare-page-id")) . '">' . esc_html__("Go to Compare", 'alenastudio') . '</a>' . '</div>'
                );
            }
        }
        else {
            $response["message"] = esc_html__("Product does not existed", 'alenastudio');
        }
    }
    else {
        $response["message"] = esc_html__("Product does not true", 'alenastudio');
    }
    wp_send_json($response);
}

function as_ajax_remove_compare_product() {
    $product_id = $_REQUEST["product_id"];
    $response   = array(
        "status"  => 0,
        "message" => "something error"
    );
    if (!empty($product_id) && is_numeric($product_id)) {
        $compare  = as_remove_product_compare($product_id);
        $response = array(
            "status"  => 1,
            "message" => "Success"
        );
        if (empty($compare)) {
            $response["status"]  = 2;
            $response["message"] = '<tr><td><span class="as-no-product-msg">' . esc_attr("No Products in Compare List", 'alenastudio') . '</span></tr></td>';
        }
    }
    else {
        $response["message"] = esc_html__("Product does not true", 'alenastudio');
    }
    wp_send_json($response);
}

function as_save_product_compare($product) {
    $data_product                 = as_get_product_compare();
    $data_product[$product["id"]] = $product;
    as_ex_add_cookie(COMPARE_COOKIE_NAME, $data_product);
}

function as_remove_product_compare($product_id) {
    $data_product = as_get_product_compare();
    if (isset($data_product[$product_id])) {
        unset($data_product[$product_id]);
    }
    as_ex_add_cookie(COMPARE_COOKIE_NAME, $data_product);
    return $data_product;
}

function as_get_product_compare() {
    return as_ex_get_cookie(COMPARE_COOKIE_NAME);
}

function as_after_add_to_cart_button() {
    global $product;
    $data_product = as_get_product_compare();
    if (isset($data_product[$product->id])) {
        echo '<div class="compare-notice">
        		<div class="as-tooltip-wishlist-compare">' . esc_html__("It's available,", 'alenastudio') . '<a target="_blank" href="' . get_page_link(get_option("as-compare-page-id")) . '">' . esc_html__("Go to Compare!", 'alenastudio') . '</a></div>
        		<a data-product-id="' . $product->id . '"  class="button as_button product_show_detail_button as_compare_btn" href="javascript:;"><span class="dslc-icon dslc-icon-exchange"></span></a>
        	</div>';
    }
    else {
        echo '<div class="compare-notice"><a data-product-id="' . $product->id . '"  class="button as_button product_show_detail_button as_compare_btn" href="javascript:;"><span class="dslc-icon dslc-icon-exchange"></span></a></div>';
    }
}
