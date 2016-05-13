<?php

class AS_Listing extends as_module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_Listing';
        $this->module_title    = __('AS - Listing', 'as_extension');
        $this->module_icon     = 'info';
        $this->module_category = 'as - element';
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
            array(
                'label' => __('Title Link', 'as_extension'),
                'id'    => 'as_lis_title_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Title Link - Open in', 'as_extension'),
                'id'      => 'as_lis_title_link_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'as_extension'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'as_extension'),
                        'value' => '_blank',
                    ),
                )
            ),
            /**
             * General
             */
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'as_lis_bgcolor',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image', 'as_extension'),
                'id'                    => 'css_bg_img',
                'std'                   => '',
                'type'                  => 'image',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'background-image',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Repeat', 'as_extension'),
                'id'                    => 'css_bg_img_repeat',
                'std'                   => 'repeat',
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
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Attachment', 'as_extension'),
                'id'                    => 'css_bg_img_attch',
                'std'                   => 'scroll',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Scroll', 'as_extension'),
                        'value' => 'scroll',
                    ),
                    array(
                        'label' => __('Fixed', 'as_extension'),
                        'value' => 'fixed',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'background-attachment',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Position', 'as_extension'),
                'id'                    => 'css_bg_img_pos',
                'std'                   => 'top left',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Top Left', 'as_extension'),
                        'value' => 'left top',
                    ),
                    array(
                        'label' => __('Top Right', 'as_extension'),
                        'value' => 'right top',
                    ),
                    array(
                        'label' => __('Top Center', 'as_extension'),
                        'value' => 'Center Top',
                    ),
                    array(
                        'label' => __('Center Left', 'as_extension'),
                        'value' => 'left center',
                    ),
                    array(
                        'label' => __('Center Right', 'as_extension'),
                        'value' => 'right center',
                    ),
                    array(
                        'label' => __('Center', 'as_extension'),
                        'value' => 'center center',
                    ),
                    array(
                        'label' => __('Bottom Left', 'as_extension'),
                        'value' => 'left bottom',
                    ),
                    array(
                        'label' => __('Bottom Right', 'as_extension'),
                        'value' => 'right bottom',
                    ),
                    array(
                        'label' => __('Bottom Center', 'as_extension'),
                        'value' => 'center bottom',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'background-position',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'as_extension'),
                'id'                    => 'css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'as_extension'),
                'id'                    => 'css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-info-box',
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
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'as_extension'),
                'id'                    => 'css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-info-box',
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
                'affect_on_change_el'   => '.as-lis-info-box',
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
                'affect_on_change_el'   => '.as-lis-info-box',
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
                'affect_on_change_el'   => '.as-lis-info-box',
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
             * Icon
             */
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'css_icon_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Color', 'as_extension'),
                'id'                    => 'css_icon_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Width', 'as_extension'),
                'id'                    => 'css_icon_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Icon', 'as_extension'),
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
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Radius', 'as_extension'),
                'id'                    => 'css_icon_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_icon_color',
                'std'                   => 'rgb(36, 120, 204)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-icon .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
            ),
            array(
                'label'             => __('Icon', 'as_extension'),
                'id'                => 'icon_id',
                'std'               => 'ok',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Icon', 'as_extension'),
                'include_in_preset' => false
            ),
            array(
                'label'                 => __('Margin Top', 'as_extension'),
                'id'                    => 'css_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Right', 'as_extension'),
                'id'                    => 'css_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Size ( Wrapper )', 'as_extension'),
                'id'                    => 'css_icon_wrapper_width',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            array(
                'label'                 => __('Size ( Icon )', 'as_extension'),
                'id'                    => 'css_icon_width',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-icon .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px'
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_title_color',
                'std'                   => '#3d3d3d',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-title h4',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'css_title_font_size',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-title h4',
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
                'affect_on_change_el'   => '.as-lis-title h4',
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
                'affect_on_change_el'   => '.as-lis-title h4',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'css_title_line_height',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-lis-title h4',
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
                'affect_on_change_el'   => '.as-lis-title h4',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
                'ext'                   => 'px'
            ),
            /**
             * Content
             */
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
            array
                (
                'label'                 => __('Border Width', 'monalisa'),
                'id'                    => 'css_res_t_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Radius', 'monalisa'),
                'id'                    => 'css_res_t_css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Bottom', 'monalisa'),
                'id'                    => 'css_res_t_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical', 'monalisa'),
                'id'                    => 'css_res_t_css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'max'                   => '500',
                'increment'             => '1',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal', 'monalisa'),
                'id'                    => 'css_res_t_css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Width', 'monalisa'),
                'id'                    => 'css_res_t_css_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-main-wrap',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'responsive',
                'ext'                   => '%',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Width(Icon)', 'monalisa'),
                'id'                    => 'css_res_t_css_icon_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Radius(Icon)', 'monalisa'),
                'id'                    => 'css_res_t_css_icon_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Top(Icon)', 'monalisa'),
                'id'                    => 'css_res_t_css_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '100'
            ),
            array
                (
                'label'                 => __('Margin Right(Icon)', 'monalisa'),
                'id'                    => 'css_res_t_css_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '100'
            ),
            array
                (
                'label'                 => __('Size ( Wrapper )(Icon)', 'monalisa'),
                'id'                    => 'css_res_t_css_icon_wrapper_width',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '300'
            ),
            array
                (
                'label'                 => __('Size ( Icon )', 'monalisa'),
                'id'                    => 'css_res_t_css_icon_width',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-icon .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size(Title)', 'monalisa'),
                'id'                    => 'css_res_t_css_title_font_size',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight(Title)', 'monalisa'),
                'id'                    => 'css_res_t_css_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-title h4',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => '',
                'min'                   => '100',
                'max'                   => '900',
                'increment'             => '100'
            ),
            array
                (
                'label'                 => __('Line Height(Title)', 'monalisa'),
                'id'                    => 'css_res_t_css_title_line_height',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Bottom(Title)', 'monalisa'),
                'id'                    => 'css_res_t_css_title_margin',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
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
            array
                (
                'label'                 => __('Border Width', 'monalisa'),
                'id'                    => 'css_res_p_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Radius', 'monalisa'),
                'id'                    => 'css_res_p_css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Bottom', 'monalisa'),
                'id'                    => 'css_res_p_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical', 'monalisa'),
                'id'                    => 'css_res_p_css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'max'                   => '500',
                'increment'             => '1',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal', 'monalisa'),
                'id'                    => 'css_res_p_css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Width', 'monalisa'),
                'id'                    => 'css_res_p_css_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-main-wrap',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'responsive',
                'ext'                   => '%',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Width( Icon )', 'monalisa'),
                'id'                    => 'css_res_p_css_icon_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Radius( Icon )', 'monalisa'),
                'id'                    => 'css_res_p_css_icon_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Top( Icon )', 'monalisa'),
                'id'                    => 'css_res_p_css_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '100'
            ),
            array
                (
                'label'                 => __('Margin Right( Icon )', 'monalisa'),
                'id'                    => 'css_res_p_css_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '100'
            ),
            array
                (
                'label'                 => __('Size ( Wrapper-Icon )', 'monalisa'),
                'id'                    => 'css_res_p_css_icon_wrapper_width',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-icon',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '300'
            ),
            array
                (
                'label'                 => __('Size( Icon )', 'monalisa'),
                'id'                    => 'css_res_p_css_icon_width',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-icon .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( Title )', 'monalisa'),
                'id'                    => 'css_res_p_css_title_font_size',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( Title )', 'monalisa'),
                'id'                    => 'css_res_p_css_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-title h4',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => '',
                'min'                   => '100',
                'max'                   => '900',
                'increment'             => '100'
            ),
            array
                (
                'label'                 => __('Line Height( Title )', 'monalisa'),
                'id'                    => 'css_res_p_css_title_line_height',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Bottom( Title )', 'monalisa'),
                'id'                    => 'css_res_p_css_title_margin',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-lis-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            )
                ,
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
        ?>

        <div class="as-lis-info-box">
            <div class="dslc-info-box-main-wrap dslc-clearfix">
                <div class="dslc-info-box-icon-bellow-title">
                    <div class="as-lis-icon as-float-left">
                        <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['icon_id']); ?>"></span>
                    </div>
                    <!-- .dslc-info-box-image-inner -->
                    <div class="as-lis-title as-float-left">
                        <?php if ($dslc_is_admin) : ?>
                            <h4 class="dslca-editable-content" data-id="title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo stripslashes($options['title']); ?></h4>
                        <?php else : ?>
                            <?php if ($options['as_lis_title_link'] != '') : ?>
                                <h4><a href="<?php echo esc_url($options['as_lis_title_link']); ?>" target="<?php echo esc_attr($options['as_lis_title_link_target']); ?>"><?php echo stripslashes($options['title']); ?></a></h4>
                            <?php else : ?>
                                <h4><?php echo stripslashes($options['title']); ?></h4>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div><!-- .dslc-info-box-title -->
                </div>
                <!-- .dslc-info-box-image -->
            </div>
            <!-- .dslc-info-box-main-wrap -->
        </div>
        <!-- .dslc-info-box -->

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
