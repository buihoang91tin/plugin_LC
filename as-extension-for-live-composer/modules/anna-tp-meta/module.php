<?php

class Anna_TP_Meta extends DSLC_Module
{

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct()
    {

        $this->module_id       = 'Anna_TP_Meta';
        $this->module_title    = 'Meta';
        $this->module_icon     = 'info';
        $this->module_category = 'single';
    }

    function options()
    {

        $dslc_options = array(
            array(
                'label'   => __('Elements', 'dslc_string'),
                'id'      => 'tp_elements',
                'std'     => 'date author category tags comments',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Date', 'dslc_string'),
                        'value' => 'date'
                    ),
                    array(
                        'label' => __('Author', 'dslc_string'),
                        'value' => 'author'
                    ),
                    array(
                        'label' => __('Category', 'dslc_string'),
                        'value' => 'category'
                    ),
                    array(
                        'label' => __('Tags', 'dslc_string'),
                        'value' => 'tags'
                    ),
                    array(
                        'label' => __('Comments', 'dslc_string'),
                        'value' => 'comments'
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'   => __('Format', 'dslc_string'),
                'id'      => 'format',
                'std'     => 'horizontal',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Horizontal', 'dslc_string'),
                        'value' => 'horizontal'
                    ),
                    array(
                        'label' => __('Vertical', 'dslc_string'),
                        'value' => 'vertical'
                    ),
                ),
                'section' => 'styling',
            ),
            array(
                'label'                 => __('Spacing', 'dslc_string'),
                'id'                    => 'margin',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'li',
                'affect_on_change_rule' => 'margin',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __(' BG Color', 'dslc_string'),
                'id'                    => 'css_main_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'css_main_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'css_main_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Borders', 'dslc_string'),
                'id'                    => 'css_border_trbl',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'dslc_string'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'dslc_string'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'dslc_string'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'dslc_string'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius - Top', 'dslc_string'),
                'id'                    => 'css_main_border_radius_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'dslc_string'),
                'id'                    => 'css_main_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_main_padding_vertical',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_main_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            /**
             * Avatar
             */
            array(
                'label'                 => __('Avatar - Border Radius', 'dslc_string'),
                'id'                    => 'css_meta_avatar_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta-avatar img',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Avatar', 'dslc_string'),
            ),
            array(
                'label'                 => __('Avatar - Margin Right', 'dslc_string'),
                'id'                    => 'css_meta_avatar_margin_right',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta-avatar',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Avatar', 'dslc_string'),
            ),
            array(
                'label'                 => __('Avatar - Size', 'dslc_string'),
                'id'                    => 'css_meta_avatar_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta-avatar',
                'affect_on_change_rule' => 'width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Avatar', 'dslc_string'),
            ),
            /**
             * Icon
             */
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'color_icon_meta',
                'std'                   => '#2c3e50',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-icon-meta',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('icon', 'dslc_string'),
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'font_size_icon_meta',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-icon-meta',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('icon', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Right', 'dslc_string'),
                'id'                    => 'css_margin_right_icon_meta',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-icon-meta',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'tab'                   => __('icon', 'dslc_string'),
                'ext'                   => 'px',
            ),
            /**
             * Typography
             */
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'color',
                'std'                   => '#4d4d4d',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'li',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography', 'dslc_string'),
            ),
            array(
                'label'                 => __('Color - Hover', 'dslc_string'),
                'id'                    => 'color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'li:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography', 'dslc_string'),
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'li, li a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('typography', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'css_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'li, li a',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('typography', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'css_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'li, li a',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('typography', 'dslc_string'),
            ),
            array(
                'label'                 => __('Line Height', 'dslc_string'),
                'id'                    => 'css_line_height',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'li, li a',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('typography', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Link - Color', 'dslc_string'),
                'id'                    => 'link_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'li a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography', 'dslc_string'),
            ),
            array(
                'label'                 => __('Link - Color - Hover', 'dslc_string'),
                'id'                    => 'link_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'li a:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography', 'dslc_string'),
            ),
            /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive', 'dslc_string'),
                'id'      => 'css_res_t',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'dslc_string'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'dslc_string'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('tablet', 'dslc_string'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_res_t_main_padding_vertical',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_res_t_main_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'css_res_t_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'li, li a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px'
            ),
            /**
             * Responsive Phone
             */
            array(
                'label'   => __('Responsive', 'dslc_string'),
                'id'      => 'css_res_p',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'dslc_string'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'dslc_string'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('phone', 'dslc_string'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_res_p_main_padding_vertical',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_res_p_main_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-tp-meta',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'css_res_p_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'li, li a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px'
            ),
        );

        $dslc_options = array_merge($dslc_options, $this->shared_options('animation_options'));
        $dslc_options = array_merge($dslc_options, $this->presets_options());

        return apply_filters('dslc_module_options', $dslc_options, $this->module_id);
    }

    function output($options)
    {

        global $dslc_active;

        $post_id   = $options['post_id'];
        $show_fake = true;

        if (is_singular())
        {
            $post_id   = get_the_ID();
            $show_fake = false;
        }

        if (get_post_type($post_id) == 'dslc_templates')
        {
            $show_fake = true;
        }

        $this->module_start($options);

        /* Module output starts here */

        $the_post = get_post($post_id);

        $num_comments    = get_comments_number($post_id);
        $comments_output = '';

        if (comments_open($post_id))
        {

            if ($num_comments == 0)
                $comments = __('No Comments', AS_DOMAIN);
            elseif ($num_comments > 1)
                $comments = $num_comments . __(' Comments', AS_DOMAIN);
            else
                $comments = __('1 Comment', AS_DOMAIN);

            $comments_output = '<a href="#dslc-comments">' . $comments . '</a>';
        }

        $tp_elements = $options['tp_elements'];
        if (!empty($tp_elements))
            $tp_elements = explode(' ', trim($tp_elements));
        else
            $tp_elements = 'all';

        if (!$show_fake)
        {
            $post_type_taxonomies = get_object_taxonomies(get_post_type(), 'objects');
        }
        ?>

        <div class="dslc-tp-meta dslc-tp-meta-<?php echo $options['format']; ?>">
            <ul class="dslc-clearfix">
                <?php if (in_array('author', $tp_elements)) : ?>
                    <?php if ($show_fake) : ?>
                        <li>
                            <span class="dslc-tp-meta-avatar">
                                <img src="<?php echo DS_LIVE_COMPOSER_URL; ?>/images/placeholders/small-placeholder.png" />
                            </span>
                            <a href="#"><?php _e('John Doe', 'dslc_string'); ?></a>
                        </li>
                    <?php else : ?>
                        <li>
                            <span class="dslc-tp-meta-avatar">
                                <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
                            </span>
                            <a href="<?php echo get_author_posts_url($the_post->post_author); ?>"><?php the_author_meta('display_name'); ?></a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (in_array('category', $tp_elements)) : ?>
                    <?php if ($show_fake) : ?>
                        <li><span class="dslc-icon-meta dslc-icon-list-ul"></span><a href="#"><?php _e('Category One', 'dslc_string'); ?></a>, <a href="#"><?php _e('Category Two', 'dslc_string'); ?></a></li>
                    <?php else : ?>
                        <?php
                        foreach ($post_type_taxonomies as $taxonomy)
                        {
                            if ($taxonomy->hierarchical == true)
                            {

                                $cats       = get_the_terms(get_the_ID(), $taxonomy->name);
                                $cats_count = 0;
                                if ($cats)
                                {
                                    echo '<li><span class="dslc-icon-meta dslc-icon-list-ul"></span>';
                                    foreach ($cats as $cat)
                                    {
                                        $cats_count++;
                                        if ($cats_count > 1)
                                        {
                                            echo ', ';
                                        }
                                        echo '<a href="' . get_term_link($cat, $taxonomy->name) . '">' . $cat->name . '</a>';
                                    }
                                    echo '</li>';
                                }
                            }
                        }
                        ?>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (in_array('tags', $tp_elements)) : ?>
                    <?php if ($show_fake) : ?>
                        <li><span class="dslc-icon-meta dslc-icon-tags"></span><a href="#"><?php _e('One', 'dslc_string'); ?></a>, <a href="#"><?php _e('Two', 'dslc_string'); ?></a>, <a href="#"><?php _e('Three', 'dslc_string'); ?></a></li>
                    <?php else : ?>
                        <?php
                        foreach ($post_type_taxonomies as $taxonomy)
                        {
                            if ($taxonomy->hierarchical == false)
                            {

                                $cats       = get_the_terms(get_the_ID(), $taxonomy->name);
                                $tags_count = 0;
                                if ($cats)
                                {
                                    echo '<li><span class="dslc-icon-meta dslc-icon-tags"></span>';
                                    foreach ($cats as $cat)
                                    {
                                        $tags_count++;
                                        if ($tags_count > 1)
                                        {
                                            echo ', ';
                                        }
                                        echo '<a href="' . get_term_link($cat, $taxonomy->name) . '">' . $cat->name . '</a>';
                                    }
                                    echo '</li>';
                                }
                            }
                        }
                        ?>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (in_array('comments', $tp_elements) && ( $comments_output != '' || $show_fake )) : ?>
                    <?php if ($show_fake) : ?>
                        <li><span class="dslc-icon-meta dslc-icon-comments-alt"></span><?php _e('10 Comments', 'dslc_string'); ?></li>
                    <?php else : ?>
                        <li><span class="dslc-icon-meta dslc-icon-comments-alt"></span><?php echo $comments_output; ?></li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (in_array('date', $tp_elements)) : ?>
                    <li><span class="dslc-icon-meta dslc-icon-time"></span><?php echo get_the_time(get_option('date_format'), $post_id); ?></li>
                    <?php endif; ?>
            </ul>
        </div>

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
