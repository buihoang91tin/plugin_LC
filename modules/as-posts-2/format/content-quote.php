<?php
/**
 * Monalisa the format content quote.
 *
 * Set up the content.
 *
 * @package WordPress
 * @subpackage Monalisa
 * @since Monalisa 1.0
 */
?>
<div class="as-featured-img as-featured-quote">
    <?php
    if (!is_single())
    {
        ?>
        <a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php } ?>
        <blockquote>
            <span class="dslc-icon dslc-icon-quote-left"></span>&nbsp;&nbsp;<?php echo get_the_content() ?>&nbsp;&nbsp;<span class="dslc-icon dslc-icon-quote-right"></span>
        </blockquote>
        <?php
        if (!is_single())
        {
            ?>
        </a>
    <?php } ?>
</div>