<?php
$product_list = as_get_product_compare();
$total_attrs  = array();
$attrs        = array();
$images       = array();
$names        = array();
$prices       = array();
$views        = array();
$removes      = array();
if (!empty($product_list)) {
    //Get Total Product Attr
    foreach ($product_list as
            $id =>
            $product) {
        $product_attr = $product["attributes"];
        foreach ($product_attr as
                $attribute) {
            $total_attrs[] = $attribute["name"];
        }
    }
    foreach ($product_list as
            $id =>
            $product) {
        $images[$id]  = $product["image"];
        $names[$id]   = $product["name"];
        $prices[$id]  = wc_price($product["price"]);
        $views[$id]   = '<a target="_blank" href="' . get_permalink($id) . '">' . esc_attr__("View Product", 'alenastudio') . '</a>';
        $removes[$id] = '<a class="as_remove_compare_product_btn" data-product-id="' . $id . '" href="javascript:;">' . esc_html__("Remove", 'alenastudio') . '</a>';
        $product_attr = $product["attributes"];
        foreach ($total_attrs as
                $attr_name) {
            if (isset($product_attr[$attr_name])) {
                $attrs[$attr_name]["title"]       = $product_attr[$attr_name]["title"];
                $attrs[$attr_name]["values"][$id] = $product_attr[$attr_name]["values"];
            }
            else {
                $attrs[$attr_name]["title"]       = "";
                $attrs[$attr_name]["values"][$id] = "";
            }
        }
    }
}
//|<a href="javascript:;" class="button as_button product_show_detail_button as_quickview_btn" data-ajax-url="' . admin_url("admin-ajax.php") . '" data-product-id="' . $id . '"><span class="dslc-icon dslc-icon-eye-open"></span></a>
?>
<div class="woocommerce">
    <div class="as-table-list-compare">
        <table>
            <?php
            if (empty($product_list)) {
                ?>
                <tr>
                    <td><span class="as-no-product-msg"><?php esc_attr_e("No Products in Compare List", 'alenastudio'); ?></span></td>
                </tr>
                <?php
            }
            else {
                ?>
                <tr>
                    <td><?php esc_attr_e("Images", 'alenastudio'); ?></td>
                    <?php
                    foreach ($images as
                            $id =>
                            $image) {
                        ?>
                        <td data-product-id="<?php echo esc_attr($id); ?>"><?php echo balanceTags($image); ?></td>
                        <?php
                    }
                    ?>
                </tr>   
                <tr>
                    <td><?php esc_attr_e("Names", 'alenastudio'); ?></td>
                    <?php
                    foreach ($names as
                            $id =>
                            $name) {
                        ?>
                        <td data-product-id="<?php echo esc_attr($id); ?>"><?php echo balanceTags($name); ?></td>
                        <?php
                    }
                    ?>
                </tr>  
                <tr>
                    <td><?php esc_attr_e("Price", 'alenastudio'); ?></td>
                    <?php
                    foreach ($prices as
                            $id =>
                            $price) {
                        ?>
                        <td data-product-id="<?php echo esc_attr($id); ?>"><?php echo balanceTags($price); ?></td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
                foreach ($attrs as
                        $attr) {
                    ?>
                    <tr>
                        <td><?php echo $attr["title"]; ?></td>
                        <?php
                        foreach ($attr["values"] as
                                $id =>
                                $value) {
                            ?>
                            <td data-product-id="<?php echo esc_attr($id); ?>"> <?php echo balanceTags($value); ?></td>
                            <?php
                        }
                        ?>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td><?php esc_attr_e("View", 'alenastudio'); ?></td>
                    <?php
                    foreach ($views as
                            $id =>
                            $view) {
                        ?>
                        <td data-product-id="<?php echo esc_attr($id); ?>"><?php echo balanceTags($view); ?></td>
                        <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td><?php esc_attr_e("Remove", 'alenastudio'); ?></td>
                    <?php
                    foreach ($removes as
                            $id =>
                            $remove) {
                        ?>
                        <td data-product-id="<?php echo esc_attr($id); ?>"><?php echo balanceTags($remove); ?></td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>

        </table>
    </div>
</div>
