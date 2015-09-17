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
$gallery_post_type = '';
if (is_singular('dslc_projects'))
{
    $gallery_post_type = 'dslc_project_images';
}
else
{
    $gallery_post_type = 'dslc_gallery_images';
}

$gallery_images = get_post_meta(get_the_ID(), $gallery_post_type, true);
$gallery_images = explode(' ', trim($gallery_images));
?>
<div class="as-featured-img">
	
	<div class="as-gallery-wrapper">
		<div class="as-customNavigation-blog">
	        <a class="as-post-gallery-lc-prev"><span class="dslc-icon dslc-icon-angle-left"></span></a>
	        <a class="as-post-gallery-lc-next"><span class="dslc-icon dslc-icon-angle-right"></span></a>
	    </div>
		<div class="as-post-galleries owl-theme">
			<?php
				if(!empty($gallery_images)){
				foreach ($gallery_images as $image) {
					$gallery_image_src = wp_get_attachment_image_src( $image, 'full' );
					$gallery_image_src = $gallery_image_src[0];
			?>
			<div class="item">
				<img src="<?php echo( ( $gallery_image_src )); ?>" />
			</div>
			<?php } } ?>
		</div>
	</div>
</div>