<?php
/**
 * Monalisa the format content link.
 *
 * Set up the content.
 *
 * @package WordPress
 * @subpackage Monalisa
 * @since Monalisa 1.0
 */
?>
<?php

function img_link()
{
    $images = rwmb_meta('as_bg_link', 'type=image');
    foreach ($images as $image)
    {
        echo "{$image['full_url']}";
    }
}

$url_link  = rwmb_meta('as_url_link');
$text_link = rwmb_meta('as_text_link');

//$img_link = ' style="background-size: cover; background:url( '.img_link().' );" ';
?>
<div class="as-featured-img as-featured-link">
    <a href="<?php echo esc_url( $url_link ); ?>"><span class="dslc-icon dslc-icon-link"></span>&nbsp;&nbsp;<?php echo esc_html( $text_link ); ?></a>
</div>