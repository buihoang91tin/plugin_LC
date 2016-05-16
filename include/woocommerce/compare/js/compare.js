jQuery(document).on('click', '.as_compare_btn', function (e) {
    e.preventDefault();
    e.stopPropagation();
    var prod_id = jQuery(this).attr('data-product-id');
    var data = {action: 'as_add_compare', product_id: prod_id};
    var button_quick_view = jQuery(this);
    var effect = jQuery(this).attr("data-effect");
    jQuery.post(root_ajax_url, data, function (result) {
        if (result.status == 0)
        {
            showMessage(result.message, effect);
        }
        else
        {
            button_quick_view.html('<span class="dslc-icon dslc-icon-ok"></span>');
            jQuery(".as-tooltip-wishlist-compare").remove();
            jQuery(".compare-notice").prepend(result.notice);
        }
    });
});

jQuery(document).on('click', '.as_remove_compare_product_btn', function (e) {
    e.preventDefault();
    e.stopPropagation();
    var prod_id = jQuery(this).attr('data-product-id');
    var data = {action: 'as_remove_compare', product_id: prod_id};
    var button_quick_view = jQuery(this);
    var effect = jQuery(this).attr("data-effect");
    jQuery.post(root_ajax_url, data, function (result) {
        if (result.status == 0)
        {
            showMessage(result.message, effect);
        }
        else if (result.status == 2)
        {
            jQuery('.as-table-list-compare table tbody').html(result.message);
        }
        else
        {
            jQuery("td[data-product-id='" + prod_id + "']").remove();
        }
    });
});