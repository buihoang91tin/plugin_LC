<?php
/**
 * Monalisa the format content post for index.
 *
 * Sets up the content.
 *
 * @package WordPress
 * @subpackage Monalisa
 * @since Monalisa 1.0
 */
?>
<div class="as-featured-img as-featured-content-img">
    <?php
    if (has_post_thumbnail())
    {
        $width_img_blog  = as_option('as_blog_width_img');
        $height_img_blog = as_option('as_blog_height_img');
        $thumb           = get_post_thumbnail_id();
        $img_url         = wp_get_attachment_url($thumb, 'full'); //get full URL to image (use "large" or "medium" if the images too big)
        $image           = aq_resize($img_url, $width_img_blog, $height_img_blog, true); //resize & crop the image
        $anchor_class    = 'dslc-lightbox-image';
        ?>
            <a class="<?php echo esc_attr( $anchor_class ); ?>" href="<?php echo esc_url( $img_url ); ?>" class="as-post-image" title="<?php the_title(); ?>">

                    <?php if ($img_url) : ?>
                        <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php the_title(); ?>"/>
                    <?php endif; ?>
              
  
            </a>
            <?php
        }else
        {
            ?>
            <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/no-image.jpg" /></a>
        <?php } ?>
</div>