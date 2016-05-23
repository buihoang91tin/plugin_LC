<?php

class ASEX_Image extends ASEX_MODULE {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'ASEX_Image';
        $this->module_title    = __('AS - Custom Image', 'asex');
        $this->module_icon     = 'picture';
        $this->module_category = 'as - element';
    }

    function options() {

        $dslc_options = array(
            array(
                'label'      => __('CT', 'asex'),
                'id'         => 'custom_text',
                'std'        => __('This is just some placeholder text. Click to edit it.', 'asex'),
                'type'       => 'textarea',
                'visibility' => 'hidden'
            ),
            array(
                'label' => __('Image', 'asex'),
                'id'    => 'image',
                'std'   => '',
                'type'  => 'image',
            ),
            array(
                'label'   => __('Link Type', 'asex'),
                'id'      => 'link_type',
                'std'     => 'none',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('None', 'asex'),
                        'value' => 'none',
                    ),
                    array(
                        'label' => __('URL - Same Tab', 'asex'),
                        'value' => 'url_same',
                    ),
                    array(
                        'label' => __('URL - New Tab', 'asex'),
                        'value' => 'url_new',
                    ),
                    array(
                        'label' => __('Lightbox', 'asex'),
                        'value' => 'lightbox',
                    ),
                )
            ),
            array(
                'label' => __('Link - URL', 'asex'),
                'id'    => 'link_url',
                'std'   => '',
                'type'  => 'text',
            ),
            array(
                'label' => __('Link - Lightbox Image', 'asex'),
                'id'    => 'link_lb_image',
                'std'   => '',
                'type'  => 'image',
            ),
            array(
                'label'   => __('Custom Text', 'asex'),
                'id'      => 'custom_text_state',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Enabled', 'asex'),
                        'value' => 'enabled',
                    ),
                    array(
                        'label' => __('Disabled', 'asex'),
                        'value' => 'disabled',
                    ),
                )
            ),
            array(
                'label' => __('Resize - Height', 'asex'),
                'id'    => 'resize_height',
                'std'   => '',
                'type'  => 'text',
            ),
            array(
                'label' => __('Resize - Width', 'asex'),
                'id'    => 'resize_width',
                'std'   => '',
                'type'  => 'text',
            ),
            array(
                'label' => __('Image - ALT attribute', 'asex'),
                'id'    => 'image_alt',
                'std'   => '',
                'type'  => 'text',
            ),
            array(
                'label' => __('Image - TITLE attribute', 'asex'),
                'id'    => 'image_title',
                'std'   => '',
                'type'  => 'text',
            ),
            /**
             * Styling
             */
            array(
                'label'                 => __('Effect Style', 'asex'),
                'id'                    => 'asex_image_effect_style',
                'std'                   => 'default',
                'type'                  => 'select',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'section'               => 'styling',
                'choices'               => array(
                    array(
                        'label' => __('Default', 'asex'),
                        'value' => 'default',
                    ),
                    array(
                        'label' => __('1977', 'asex'),
                        'value' => '_1977',
                    ),
                    array(
                        'label' => __('Aden', 'asex'),
                        'value' => 'aden',
                    ),
                    array(
                        'label' => __('Brooklyn', 'asex'),
                        'value' => 'brooklyn',
                    ),
                    array(
                        'label' => __('Earlybird', 'asex'),
                        'value' => 'earlybird',
                    ),
                    array(
                        'label' => __('Gingham', 'asex'),
                        'value' => 'gingham',
                    ),
                    array(
                        'label' => __('Hudson', 'asex'),
                        'value' => 'hudson',
                    ),
                    array(
                        'label' => __('Inkwell', 'asex'),
                        'value' => 'inkwell',
                    ),
                    array(
                        'label' => __('Lofi', 'asex'),
                        'value' => 'lofi',
                    ),
                    array(
                        'label' => __('Mayfair', 'asex'),
                        'value' => 'mayfair',
                    ),
                    array(
                        'label' => __('Perpetua', 'asex'),
                        'value' => 'perpetua',
                    ),
                    array(
                        'label' => __('Reyes', 'asex'),
                        'value' => 'reyes',
                    ),
                    array(
                        'label' => __('Toaster', 'asex'),
                        'value' => 'toaster',
                    ),
                    array(
                        'label' => __('Walden', 'asex'),
                        'value' => 'walden',
                    ),
                    array(
                        'label' => __('Xpro2', 'asex'),
                        'value' => 'xpro2',
                    ),
                )
            ),
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'css_align',
                'std'                   => 'center',
                'type'                  => 'select',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'choices'               => array(
                    array(
                        'label' => __('Left', 'asex'),
                        'value' => 'left',
                    ),
                    array(
                        'label' => __('Center', 'asex'),
                        'value' => 'center',
                    ),
                    array(
                        'label' => __('Right', 'asex'),
                        'value' => 'right',
                    ),
                    array(
                        'label' => __('Justify', 'asex'),
                        'value' => 'justify',
                    ),
                )
            ),
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'css_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'css_border_trbl',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'asex'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'asex'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'asex'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'asex'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image, .dslc-image img',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Top', 'asex'),
                'id'                    => 'css_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            /**
             * Custom Text
             */
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'css_ct_text_align',
                'std'                   => 'center',
                'type'                  => 'select',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image-caption',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('custom text', 'asex'),
                'choices'               => array(
                    array(
                        'label' => __('Left', 'asex'),
                        'value' => 'left',
                    ),
                    array(
                        'label' => __('Center', 'asex'),
                        'value' => 'center',
                    ),
                    array(
                        'label' => __('Right', 'asex'),
                        'value' => 'right',
                    ),
                    array(
                        'label' => __('Justify', 'asex'),
                        'value' => 'justify',
                    ),
                )
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_ct_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image-caption',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('custom text', 'asex'),
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'css_ct_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image-caption',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('custom text', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'css_ct_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image-caption',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('custom text', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'css_ct_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image-caption',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('custom text', 'asex'),
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'css_ct_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image-caption',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('custom text', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Top', 'asex'),
                'id'                    => 'css_ct_margin_top',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image-caption',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('custom text', 'asex'),
            ),
            /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive', 'asex'),
                'id'      => 'css_res_t',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'asex'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'asex'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('tablet', 'asex'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_res_t_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_res_t_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Text - Font Size', 'asex'),
                'id'                    => 'css_res_t_ct_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image-caption',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Text - Line Height', 'asex'),
                'id'                    => 'css_res_t_ct_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image-caption',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Text - Margin Top', 'asex'),
                'id'                    => 'css_res_t_ct_margin_top',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image-caption',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            /**
             * Responsive Phone
             */
            array(
                'label'   => __('Responsive', 'asex'),
                'id'      => 'css_res_p',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'asex'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'asex'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('phone', 'asex'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_res_p_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_res_p_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Text - Font Size', 'asex'),
                'id'                    => 'css_res_p_ct_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image-caption',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Text - Line Height', 'asex'),
                'id'                    => 'css_res_p_ct_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image-caption',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Text - Margin Top', 'asex'),
                'id'                    => 'css_res_p_ct_margin_top',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-image-caption',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
        );

        $dslc_options = array_merge($dslc_options, $this->shared_options('animation_options'));
        $dslc_options = array_merge($dslc_options, $this->presets_options());

        return apply_filters('dslc_module_options', $dslc_options, $this->module_id);
    }

    function output($options) {

        $this->module_start($options);

        /* Module output starts here */

        global $dslc_active;

        if ($dslc_active && is_user_logged_in() && current_user_can(DS_LIVE_COMPOSER_CAPABILITY))
            $dslc_is_admin = true;
        else
            $dslc_is_admin = false;

        $anchor_class  = '';
        $anchor_target = '_self';
        $anchor_href   = '#';

        if ($options['link_type'] == 'url_new')
            $anchor_target = '_blank';

        if ($options['link_url'] !== '')
            $anchor_href = $options['link_url'];

        if ($options['link_type'] == 'lightbox' && $options['link_lb_image'] !== '') {
            $anchor_class .= 'dslc-lightbox-image ';
            $anchor_href = $options['link_lb_image'];
        }
        ?>

        <div class="dslc-image">

            <?php if (empty($options['image'])) : ?>

                <div class="dslc-notification dslc-red"><?php _e('No image has been set yet, edit the module to set one.', 'asex'); ?></div>

            <?php else : ?>

                <?php
                $resize    = false;
                $the_image = $options['image'];
                if ($options['resize_width'] != '' || $options['resize_height'] != '') {

                    $resize        = true;
                    $resize_width  = false;
                    $resize_height = false;

                    if ($options['resize_width'] != '')
                        $resize_width = $options['resize_width'];

                    if ($options['resize_height'] != '')
                        $resize_height = $options['resize_height'];

                    $the_image = dslc_aq_resize($options['image'], $resize_width, $resize_height, true);
                }
                ?>

                <?php if ($options['link_type'] !== 'none') : ?>
                    <a class="<?php echo esc_attr($anchor_class); ?>" href="<?php echo esc_url($anchor_href); ?>" target="<?php echo esc_attr($anchor_target); ?>">
                    <?php endif; ?>
                    <div class="as-effect-style <?php echo esc_attr($options['asex_image_effect_style']); ?>">
                        <img src="<?php echo esc_url($the_image) ?>" alt="<?php echo esc_attr($options['image_alt']); ?>" title="<?php echo esc_attr($options['image_title']); ?>" />

                    </div>
                    <?php if ($options['link_type'] !== 'none') : ?>
                    </a>
                <?php endif; ?>

                <?php if ($options['custom_text_state'] == 'enabled') : ?>

                    <div class="dslc-image-caption">

                        <?php if ($dslc_is_admin) : ?>
                            <div class="dslca-editable-content" data-id="custom_text" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['custom_text'], 'monalisa'); ?></div>
                        <?php else : ?>
                            <?php echo esc_html($options['custom_text'], 'monalisa'); ?>
                        <?php endif; ?>

                    </div>

                <?php endif; ?>

            <?php endif; ?>

        </div><!-- .dslc-image -->

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
