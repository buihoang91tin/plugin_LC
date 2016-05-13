<?php

class AS_Res_Menu extends as_module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_Res_Menu';
        $this->module_title    = __('Restaurant Menu', 'as_extension');
        $this->module_icon     = 'info';
        $this->module_category = 'as - res - menu';
    }

    function options() {

        $dslc_options = array(
            array(
                'label'   => __('Show On', 'as_extension'),
                'id'      => 'css_show_on',
                'std'     => 'desktop tablet phone',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Desktop', 'as_extension'),
                        'value' => 'desktop'
                    ),
                    array(
                        'label' => __('Tablet', 'as_extension'),
                        'value' => 'tablet'
                    ),
                    array(
                        'label' => __('Phone', 'as_extension'),
                        'value' => 'phone'
                    ),
                ),
            ),
            /**
             * General
             */
            array(
                'label'   => __('Elements', 'as_extension'),
                'id'      => 'elements',
                'std'     => 'icon title content button image label',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Title', 'as_extension'),
                        'value' => 'title'
                    ),
                    array(
                        'label' => __('Content', 'as_extension'),
                        'value' => 'content'
                    ),
                    array(
                        'label' => __('Image', 'as_extension'),
                        'value' => 'image'
                    ),
                    array(
                        'label' => __('Label', 'as_extension'),
                        'value' => 'label'
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'                 => __('Border Color', 'as_extension'),
                'id'                    => 'css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'as_extension'),
                'id'                    => 'css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Borders', 'as_extension'),
                'id'                    => 'css_border_trbl',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'as_extension'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'as_extension'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'as_extension'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'as_extension'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'as_extension'),
                'id'                    => 'css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'as_extension'),
                'id'                    => 'css_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-main-wrap',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'styling',
                'ext'                   => '%'
            ),
            /**
             * Image
             */
            array(
                'label'                 => __('Align', 'as_extension'),
                'id'                    => 'css_icon_text_align',
                'std'                   => 'inherit',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Image', 'as_extension'),
            ),
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'css_icon_bg_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Image', 'as_extension'),
            ),
            array(
                'label'                 => __('BG Image', 'as_extension'),
                'id'                    => 'css_icon_bg_img',
                'std'                   => 'http://www.freewebsitetemplates.com/images/forum/500/restaurantwebsitetemplate.jpg',
                'type'                  => 'image',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'section'               => 'styling',
                'tab'                   => __('Image', 'as_extension'),
            ),
            array(
                'label'                 => __('BG Image Repeat', 'as_extension'),
                'id'                    => 'css_icon_bg_img_repeat',
                'std'                   => 'no-repeat',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Repeat', 'as_extension'),
                        'value' => 'repeat',
                    ),
                    array(
                        'label' => __('Repeat Horizontal', 'as_extension'),
                        'value' => 'repeat-x',
                    ),
                    array(
                        'label' => __('Repeat Vertical', 'as_extension'),
                        'value' => 'repeat-y',
                    ),
                    array(
                        'label' => __('Do NOT Repeat', 'as_extension'),
                        'value' => 'no-repeat',
                    ),
                ),
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
                'tab'                   => __('Image', 'as_extension'),
            ),
            array(
                'label'                 => __('BG Image Size', 'as_extension'),
                'id'                    => 'css_icon_bg_img_size',
                'std'                   => 'auto',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Original', 'as_extension'),
                        'value' => 'auto',
                    ),
                    array(
                        'label' => __('Cover', 'as_extension'),
                        'value' => 'cover',
                    ),
                    array(
                        'label' => __('Contain', 'as_extension'),
                        'value' => 'contain',
                    ),
                ),
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'background-size',
                'section'               => 'styling',
                'tab'                   => __('Image', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Color', 'as_extension'),
                'id'                    => 'css_icon_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Image', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Width', 'as_extension'),
                'id'                    => 'css_icon_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Image', 'as_extension'),
            ),
            array(
                'label'                 => __('Borders', 'as_extension'),
                'id'                    => 'css_icon_border_trbl',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'as_extension'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'as_extension'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'as_extension'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'as_extension'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Image', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Radius', 'as_extension'),
                'id'                    => 'css_icon_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Image', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Top', 'as_extension'),
                'id'                    => 'css_icon_margin_top',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'tab'                   => __('Image', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Margin Right', 'as_extension'),
                'id'                    => 'css_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'tab'                   => __('Image', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_icon_margin_bottom',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Image', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'   => __('Position', 'as_extension'),
                'id'      => 'icon_position',
                'std'     => 'above',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Above', 'as_extension'),
                        'value' => 'above',
                    ),
                    array(
                        'label' => __('Aside', 'as_extension'),
                        'value' => 'aside',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Image', 'as_extension'),
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('Align', 'as_extension'),
                'id'                    => 'css_title_text_align',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_title_color',
                'std'                   => '#3d3d3d',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'css_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'css_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'css_title_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'css_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_title_margin',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
                'ext'                   => 'px'
            ),
            /**
             * Content
             */
            array(
                'label'                 => __('Align', 'as_extension'),
                'id'                    => 'css_content_text_align',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_content_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'css_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'css_content_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'css_content_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'css_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_content_margin',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
                'ext'                   => 'px'
            ),
            /**
             * Prices
             */
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_content_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-price .dslca-editable-content, .as-res-menu-price',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Prices', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'css_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-price .dslca-editable-content, .as-res-menu-price',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Prices', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'css_content_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-price .dslca-editable-content, .as-res-menu-price',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Prices', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'css_content_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-price .dslca-editable-content, .as-res-menu-price',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Prices', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'css_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-price .dslca-editable-content, .as-res-menu-price',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Prices', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_content_margin',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-price',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('prices', 'as_extension'),
                'ext'                   => 'px'
            ),
            /**
             * label
             */
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'css_icon_bg_color',
                'std'                   => '#BF9553',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-menu-label',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Label', 'as_extension'),
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_content_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-menu-label',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Label', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'css_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-menu-label',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Label', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'css_content_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-menu-label',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Label', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'css_content_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-menu-label',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Label', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'css_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-menu-label',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Label', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_content_margin',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-menu-label',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Label', 'as_extension'),
                'ext'                   => 'px'
            ),
            /**
             * Hidden
             */
            array(
                'label'      => __('Title', 'as_extension'),
                'id'         => 'title',
                'std'        => __('CLICK TO EDIT','monalisa'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Content', 'as_extension'),
                'id'         => 'content',
                'std'        => 'This is just placeholder text. Click here to edit it.',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('price', 'as_extension'),
                'id'         => 'price',
                'std'        => '$  Edit',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('label', 'as_extension'),
                'id'         => 'label',
                'std'        => 'Edit label',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive Styling', 'as_extension'),
                'id'      => 'css_res_t',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'as_extension'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'as_extension'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('tablet', 'as_extension'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'css_res_t_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'css_res_t_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px'
            ),
            /**
             * Responsive Phone
             */
            array(
                'label'   => __('Responsive Styling', 'as_extension'),
                'id'      => 'css_res_p',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'as_extension'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'as_extension'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('phone', 'as_extension'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'css_res_p_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'css_res_p_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px'
            ),
        );

        $dslc_options = array_merge($dslc_options, $this->shared_options('animation_options'));
        $dslc_options = array_merge($dslc_options, $this->presets_options());

        return apply_filters('dslc_module_options', $dslc_options, $this->module_id);
    }

    function output($options) {

        global $dslc_active;

        if ($dslc_active && is_user_logged_in() && current_user_can(DS_LIVE_COMPOSER_CAPABILITY))
            $dslc_is_admin = true;
        else
            $dslc_is_admin = false;

        $this->module_start($options);

        /* Module output stars here */

        // Main Elements
        $elements = $options['elements'];
        if (!empty($elements))
            $elements = explode(' ', trim($elements));
        else
            $elements = array();
        ?>

        <div class="dslc-info-box dslc-info-box-icon-pos-<?php echo $options['icon_position']; ?> dslc-res-menu">
            <div class="dslc-info-box-main-wrap dslc-clearfix">
                <?php if (in_array('image', $elements)) : ?>
                    <div class="dslc-info-box-image">
                        <div class="dslc-info-box-image-inner">
                            <?php
                            $the_image = $options['css_icon_bg_img'];
                            if ($the_image) {
                                ?>
                                <img src="<?php echo esc_url($the_image) ?>" alt="">
                            <?php } ?>
                        </div><!-- .dslc-info-box-image-inner -->
                    </div><!-- .dslc-info-box-image -->
                <?php endif; ?>
                <div class="dslc-info-box-main">
                    <?php if (in_array('title', $elements)) : ?>
                        <div class="dslc-info-box-title">
                            <?php if ($dslc_is_admin) : ?>
                                <h4 class="dslca-editable-content" data-id="title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo stripslashes($options['title']); ?></h4>
                            <?php else : ?>
                                <?php if ($options['title_link'] != '') : ?>
                                    <h4><a href="<?php echo esc_url($options['title_link']); ?>" target="<?php echo esc_attr($options['title_link_target']); ?>"><?php echo stripslashes($options['title']); ?></a></h4>
                                <?php else : ?>
                                    <h4><?php echo stripslashes($options['title']); ?></h4>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="dslc-info-box-price">
                                <?php if ($dslc_is_admin) : ?>
                                    <div class="dslca-editable-content" data-id="price" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo stripslashes($options['price']); ?>
                                    </div><!-- .dslca-editable-content -->
                                <?php else : ?>
                                    <div class = "as-res-menu-price"><?php echo do_shortcode(stripslashes($options['price'])); ?></div>
                                <?php endif; ?>
                            </div><!-- .dslc-info-box-price -->
                        </div><!-- .dslc-info-box-title -->
                    <?php endif; ?>
                    <?php if (in_array('content', $elements)) : ?>
                        <div class="dslc-info-box-content">
                            <?php if ($dslc_is_admin) : ?>
                                <div class="dslca-editable-content" data-id="content" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>>	

                                    <p><?php echo stripslashes($options['content']); ?></p>
                                </div><!-- .dslca-editable-content -->
                            <?php else : ?>
                                <?php echo do_shortcode(stripslashes($options['content'])); ?>
                            <?php endif; ?>
                            <?php if (in_array('label', $elements)): ?> 
                                <?php if ($dslc_is_admin) : ?>
                                    <span class="as-menu-label dslca-editable-content" data-id="label" data-type="simple" contenteditable ><?php echo stripslashes(trim($options['label'])); ?></span>	
                                <?php else: ?>
                                    <span class="as-menu-label"><?php echo do_shortcode(stripslashes(trim($options['label']))); ?></span>	
                                <?php endif ?>			
                            <?php endif ?>			
                        </div><!-- .dslc-info-box-content -->		
                    <?php endif; ?>

                </div><!-- .dslc-info-box-main -->

            </div><!-- .dslc-info-box-main-wrap -->

        </div><!-- .dslc-info-box -->

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
