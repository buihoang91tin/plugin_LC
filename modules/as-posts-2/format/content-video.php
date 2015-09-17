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
//global $meta_boxes;
?>
<!-- Video -->
<div class="as-featured-img as-featured-video flex-video">
	<p>dumamama</p>
    <?php echo wp_oembed_get(rwmb_meta('as_oembed_link')); ?>
</div>
<!-- Video / End -->