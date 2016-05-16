jQuery(document).on('click', '.cart_list.product_list_widget  .remove-product', function (e) {
    e.preventDefault();
    e.stopPropagation();
    var prod_id = jQuery(this).attr('data-product-id');
    var data = {action: 'remove_product', remove_product: prod_id};
    var ajaxURL = jQuery(this).attr('data-ajax-url');
    var button_remove = jQuery(this);
    jQuery.post(ajaxURL, data, function (result) {
        if (result.status == 1)
        {
            button_remove.parent().remove();
            jQuery(".as-quatity-item-woo").html(result.cart_count_total);
            if (parseInt(result.cart_count_total) > 0)
            {
                jQuery(".widget_shopping_cart_content p.total").html("<strong>Subtotal:</strong>" + result.cart_sub_total);
            }
            else
            {
                jQuery(".cart_list.product_list_widget").append('<li class="empty">No products in the cart.</li>');
                jQuery(".widget_shopping_cart_content p.total").remove();
                jQuery(".widget_shopping_cart_content p.buttons").remove();
            }
        }
        else
        {
            alert(result.message);
        }

    });
});
jQuery(document).on('click', '.single_add_to_cart_button', function (e) {
    e.preventDefault();
    e.stopPropagation();
    var prod_id = jQuery("[name='add-to-cart']").val();
    var prod_quantity = jQuery(".input-text.qty.text").val();
    var prod_sku = jQuery("[itemprop='sku']").html();
    var data = {action: 'woocommerce_add_to_cart', product_id: prod_id, quantity: prod_quantity, product_sku: prod_sku};
    jQuery.post(root_ajax_url, data, function (result) {
        var fragments = result.fragments;
        var cart_hash = result.cart_hash;
        if (fragments) {
            jQuery.each(fragments, function (key, value) {
                jQuery(key).addClass('updating');
            });
            jQuery.each(fragments, function (key, value) {
                jQuery(key).replaceWith(value);
            });
        }
        showMessage("Product is added to Cart!");
    });
});
jQuery(document).on('click', '.as_quickview_btn', function (e) {
    e.preventDefault();
    e.stopPropagation();
    var prod_id = jQuery(this).attr('data-product-id');
    var data = {action: 'as_quick_view', product_id: prod_id};
    var ajaxURL = jQuery(this).attr('data-ajax-url');
    var button_quick_view = jQuery(this);
    var data_effect = "mfp-zoom-in";
    if (typeof (jQuery(this).attr('data-effect')) != "undefined")
    {
        data_effect = jQuery(this).attr('data-effect');
    }
    jQuery.magnificPopup.open({
        preloader: true,
        mainClass: data_effect,
        items: {
            src: '<div id="as-product-quickview" class="as-product-quickview-wrapper woocommerce mfp-with-anim"><span class="as-ajax-loading-img"><img src="' + jQuery(this).attr('data-template-img') + '/img/woocommerce/ajax-loader@2x.gif"></span></div>',
            type: 'inline',
            midClick: true
        },
        callbacks: {
            open: function () {
                jQuery.post(ajaxURL, data, function (result) {
                    jQuery("#as-product-quickview").html(result);
                });
            }
        }
    });
});