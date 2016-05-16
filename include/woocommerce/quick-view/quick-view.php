<?php
while (have_posts()) : the_post();
    ?>

    <!--<div id="as-product-quickview" class="as-product-quickview-wrapper woocommerce mfp-with-anim">-->
    <div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php do_action('as_wcqv_product_image'); ?>
        <div class="summary entry-summary">
            <?php do_action('as_wcqv_product_summary'); ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close">×</button>
    <!--</div>-->
    <?php
endwhile; // end of the loop.