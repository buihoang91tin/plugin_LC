<?php
$product_list = $this->asex_get_product_wish_list();
?>
<div class="woocommerce">
    <div class="as-table-list-wishlist">
        <table>
            <tr>
                <th><?php esc_attr_e("Image", 'asex'); ?></th>
                <th><?php esc_attr_e("Name", 'asex'); ?></th>
                <th><?php esc_attr_e("Price", 'asex'); ?></th>
                <th><?php esc_attr_e("View", 'asex'); ?></th>
                <th><?php esc_attr_e("Remove", 'asex'); ?></th>
            </tr>
            <?php
            if (empty($product_list)) {
                ?>
                <tr>
                    <td colspan="5"><span><?php esc_attr_e("No Products in wishlist", 'asex'); ?></span></td>
                </tr>
                <?php
            }
            else {
                foreach ($product_list as
                        $id =>
                        $product) {
                    ?>
                    <tr data-product-id="<?php echo esc_attr($id); ?>">
                        <td><?php echo balanceTags($product["image"]); ?></td>
                        <td><?php echo esc_attr($product["name"]); ?></td>
                        <td><?php echo wc_price($product["price"]); ?></td>
                        <td><a target="_blank" href="<?php echo get_permalink($id); ?>"><?php esc_attr_e("View Product", 'asex'); ?></a></td>
                        <td><a class="asex_remove_wishlist_product_btn" data-product-id="<?php echo esc_attr($id); ?>" href="javascript:;"><?php esc_attr_e("Remove", 'asex'); ?></a></td>
                    </tr>           
                    <?php
                }
            }
            /* |<a href="javascript:;" class="button asex_button product_show_detail_button asex_quickview_btn" data-ajax-url="<?php echo admin_url("admin-ajax.php"); ?>" data-product-id="<?php echo $id; ?>"><span class="dslc-icon dslc-icon-eye-open"></span></a> */
            ?>

        </table>
    </div>
</div>
