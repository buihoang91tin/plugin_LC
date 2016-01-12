<?php

class AS_Info_Box_6 extends DSLC_Module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_Info_Box_6';
        $this->module_title    = __('Info Box 6', 'alenastudio_plugin');
        $this->module_icon     = 'info';
        $this->module_category = 'as - Info Box';
    }

    function options() {

        $dslc_options = array(
            array(
                'label'   => __('Show On', 'alenastudio_plugin'),
                'id'      => 'css_show_on',
                'std'     => 'desktop tablet phone',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Desktop', 'alenastudio_plugin'),
                        'value' => 'desktop'
                    ),
                    array(
                        'label' => __('Tablet', 'alenastudio_plugin'),
                        'value' => 'tablet'
                    ),
                    array(
                        'label' => __('Phone', 'alenastudio_plugin'),
                        'value' => 'phone'
                    ),
                ),
            ),
            array(
                'label' => __('Title Link', 'alenastudio_plugin'),
                'id'    => 'title_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Title Link - Open in', 'alenastudio_plugin'),
                'id'      => 'title_link_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'alenastudio_plugin'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'alenastudio_plugin'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'label' => __('Icon Link', 'alenastudio_plugin'),
                'id'    => 'icon_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Icon Link - Open in', 'alenastudio_plugin'),
                'id'      => 'icon_link_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'alenastudio_plugin'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'alenastudio_plugin'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'label' => __('Primary Button Link', 'alenastudio_plugin'),
                'id'    => 'button_link',
                'std'   => '#',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Primary Button - Open in', 'alenastudio_plugin'),
                'id'      => 'button_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'alenastudio_plugin'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'alenastudio_plugin'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'label' => __('Secondary Button Link', 'alenastudio_plugin'),
                'id'    => 'button_2_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Secondary Button - Open in', 'alenastudio_plugin'),
                'id'      => 'button_2_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'alenastudio_plugin'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'alenastudio_plugin'),
                        'value' => '_blank',
                    ),
                )
            ),
            /**
             * General
             */
            array(
                'label'   => __('Elements', 'alenastudio_plugin'),
                'id'      => 'elements',
                'std'     => 'icon title content button',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Icon', 'alenastudio_plugin'),
                        'value' => 'icon'
                    ),
                    array(
                        'label' => __('Title', 'alenastudio_plugin'),
                        'value' => 'title'
                    ),
                    array(
                        'label' => __('Content', 'alenastudio_plugin'),
                        'value' => 'content'
                    ),
                    array(
                        'label' => __('Button', 'alenastudio_plugin'),
                        'value' => 'button'
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'                 => __('Align', 'alenastudio_plugin'),
                'id'                    => 'text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Color', 'alenastudio_plugin'),
                'id'                    => 'css_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image', 'alenastudio_plugin'),
                'id'                    => 'css_bg_img',
                'std'                   => '',
                'type'                  => 'image',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-image',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Repeat', 'alenastudio_plugin'),
                'id'                    => 'css_bg_img_repeat',
                'std'                   => 'repeat',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Repeat', 'alenastudio_plugin'),
                        'value' => 'repeat',
                    ),
                    array(
                        'label' => __('Repeat Horizontal', 'alenastudio_plugin'),
                        'value' => 'repeat-x',
                    ),
                    array(
                        'label' => __('Repeat Vertical', 'alenastudio_plugin'),
                        'value' => 'repeat-y',
                    ),
                    array(
                        'label' => __('Do NOT Repeat', 'alenastudio_plugin'),
                        'value' => 'no-repeat',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Attachment', 'alenastudio_plugin'),
                'id'                    => 'css_bg_img_attch',
                'std'                   => 'scroll',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Scroll', 'alenastudio_plugin'),
                        'value' => 'scroll',
                    ),
                    array(
                        'label' => __('Fixed', 'alenastudio_plugin'),
                        'value' => 'fixed',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-attachment',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Position', 'alenastudio_plugin'),
                'id'                    => 'css_bg_img_pos',
                'std'                   => 'top left',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Top Left', 'alenastudio_plugin'),
                        'value' => 'left top',
                    ),
                    array(
                        'label' => __('Top Right', 'alenastudio_plugin'),
                        'value' => 'right top',
                    ),
                    array(
                        'label' => __('Top Center', 'alenastudio_plugin'),
                        'value' => 'Center Top',
                    ),
                    array(
                        'label' => __('Center Left', 'alenastudio_plugin'),
                        'value' => 'left center',
                    ),
                    array(
                        'label' => __('Center Right', 'alenastudio_plugin'),
                        'value' => 'right center',
                    ),
                    array(
                        'label' => __('Center', 'alenastudio_plugin'),
                        'value' => 'center center',
                    ),
                    array(
                        'label' => __('Bottom Left', 'alenastudio_plugin'),
                        'value' => 'left bottom',
                    ),
                    array(
                        'label' => __('Bottom Right', 'alenastudio_plugin'),
                        'value' => 'right bottom',
                    ),
                    array(
                        'label' => __('Bottom Center', 'alenastudio_plugin'),
                        'value' => 'center bottom',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-position',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'alenastudio_plugin'),
                'id'                    => 'css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'alenastudio_plugin'),
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
                'label'                 => __('Borders', 'alenastudio_plugin'),
                'id'                    => 'css_border_trbl',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'alenastudio_plugin'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'alenastudio_plugin'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'alenastudio_plugin'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'alenastudio_plugin'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'alenastudio_plugin'),
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
                'label'                 => __('Margin Bottom', 'alenastudio_plugin'),
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
                'label'                 => __('Padding Vertical', 'alenastudio_plugin'),
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
                'label'                 => __('Padding Horizontal', 'alenastudio_plugin'),
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
                'label'                 => __('Width', 'alenastudio_plugin'),
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
                'label'                 => __('BG Color', 'alenastudio_plugin'),
                'id'                    => 'css_icon_bg_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Border Color', 'alenastudio_plugin'),
                'id'                    => 'css_icon_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Border Width', 'alenastudio_plugin'),
                'id'                    => 'css_icon_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Icon', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Borders', 'alenastudio_plugin'),
                'id'                    => 'css_icon_border_trbl',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'alenastudio_plugin'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'alenastudio_plugin'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'alenastudio_plugin'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'alenastudio_plugin'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Border Radius', 'alenastudio_plugin'),
                'id'                    => 'css_icon_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'alenastudio_plugin'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Color', 'alenastudio_plugin'),
                'id'                    => 'css_icon_color',
                'std'                   => '#fda501',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'alenastudio_plugin'),
            ),
            array(
                'label'             => __('Icon', 'alenastudio_plugin'),
                'id'                => 'icon_id',
                'std'               => 'comments',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Icon', 'alenastudio_plugin'),
                'include_in_preset' => false
            ),
            array(
                'label'                 => __('Margin Top', 'alenastudio_plugin'),
                'id'                    => 'css_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'alenastudio_plugin'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Right', 'alenastudio_plugin'),
                'id'                    => 'css_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'alenastudio_plugin'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Size ( Wrapper )', 'alenastudio_plugin'),
                'id'                    => 'css_icon_wrapper_width',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'alenastudio_plugin'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            array(
                'label'                 => __('Size ( Icon )', 'alenastudio_plugin'),
                'id'                    => 'css_icon_width',
                'std'                   => '45',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('Color', 'alenastudio_plugin'),
                'id'                    => 'css_title_color',
                'std'                   => '#3d3d3d',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Font Size', 'alenastudio_plugin'),
                'id'                    => 'css_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Title', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'alenastudio_plugin'),
                'id'                    => 'css_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Title', 'alenastudio_plugin'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'alenastudio_plugin'),
                'id'                    => 'css_title_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Title', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Line Height', 'alenastudio_plugin'),
                'id'                    => 'css_title_line_height',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Title', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Top', 'alenastudio_plugin'),
                'id'                    => 'css_title_margin',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'tab'                   => __('Title', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'alenastudio_plugin'),
                'id'                    => 'css_title_margin h4',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Title', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            /**
             * Content
             */
            array(
                'label'                 => __('Align', 'alenastudio_plugin'),
                'id'                    => 'css_content_text_align',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Content', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Color', 'alenastudio_plugin'),
                'id'                    => 'css_content_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Content', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Font Size', 'alenastudio_plugin'),
                'id'                    => 'css_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Content', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'alenastudio_plugin'),
                'id'                    => 'css_content_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Content', 'alenastudio_plugin'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'alenastudio_plugin'),
                'id'                    => 'css_content_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Content', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Line Height', 'alenastudio_plugin'),
                'id'                    => 'css_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Content', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'alenastudio_plugin'),
                'id'                    => 'css_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Content', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            /**
             * Button
             */
            array(
                'label'                 => __('BG Color', 'alenastudio_plugin'),
                'id'                    => 'css_button_bg_color',
                'std'                   => '#5890e5',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'alenastudio_plugin'),
                'id'                    => 'css_button_bg_color_hover',
                'std'                   => '#3e73c2',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Border Width', 'alenastudio_plugin'),
                'id'                    => 'css_button_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Borders', 'alenastudio_plugin'),
                'id'                    => 'css_button_border_trbl',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'alenastudio_plugin'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'alenastudio_plugin'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'alenastudio_plugin'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'alenastudio_plugin'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Border Color', 'alenastudio_plugin'),
                'id'                    => 'css_button_border_color',
                'std'                   => '#d8d8d8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'alenastudio_plugin'),
                'id'                    => 'css_button_border_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Border Radius', 'alenastudio_plugin'),
                'id'                    => 'css_button_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Color', 'alenastudio_plugin'),
                'id'                    => 'css_button_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Color - Hover', 'alenastudio_plugin'),
                'id'                    => 'css_button_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Font Size', 'alenastudio_plugin'),
                'id'                    => 'css_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'alenastudio_plugin'),
                'id'                    => 'css_button_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'alenastudio_plugin'),
                'id'                    => 'css_button_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Margin Top', 'alenastudio_plugin'),
                'id'                    => 'css_button_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Margin Right', 'alenastudio_plugin'),
                'id'                    => 'css_button_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'   => __('Position', 'alenastudio_plugin'),
                'id'      => 'button_pos',
                'std'     => 'bellow',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Right of content', 'alenastudio_plugin'),
                        'value' => 'aside',
                    ),
                    array(
                        'label' => __('Bellow content', 'alenastudio_plugin'),
                        'value' => 'bellow',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'alenastudio_plugin'),
                'id'                    => 'css_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'alenastudio_plugin'),
                'id'                    => 'css_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'   => __('Icon', 'alenastudio_plugin'),
                'id'      => 'button_icon_id',
                'std'     => 'cog',
                'type'    => 'icon',
                'section' => 'styling',
                'tab'     => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Icon - Color', 'alenastudio_plugin'),
                'id'                    => 'css_button_icon_color',
                'std'                   => '#b0c8eb',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'alenastudio_plugin'),
                'id'                    => 'css_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'alenastudio_plugin'),
            ),
            /**
             * Secondary Button
             */
            array(
                'label'                 => __('BG Color', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_bg_color',
                'std'                   => '#5890e5',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_bg_color_hover',
                'std'                   => '#3e73c2',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Border Width', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Borders', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_border_trbl',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'alenastudio_plugin'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'alenastudio_plugin'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'alenastudio_plugin'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'alenastudio_plugin'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Border Color', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_border_color',
                'std'                   => '#d8d8d8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_border_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Border Radius', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Color', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Color - Hover', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Font Size', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Margin Left', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_mleft',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Margin Top', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_mtop',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'   => __('Icon', 'alenastudio_plugin'),
                'id'      => 'button_2_icon_id',
                'std'     => 'cog',
                'type'    => 'icon',
                'section' => 'styling',
                'tab'     => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Icon - Color', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_icon_color',
                'std'                   => '#b0c8eb',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'alenastudio_plugin'),
                'id'                    => 'css_button_2_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'alenastudio_plugin'),
            ),
            /**
             * Hidden
             */
            array(
                'label'      => __('Title', 'alenastudio_plugin'),
                'id'         => 'title',
                'std'        => __('CLICK TO EDIT','alenastudio'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Content', 'alenastudio_plugin'),
                'id'         => 'content',
                'std'        => 'This is just placeholder text. Click here to edit it.',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Button Title', 'alenastudio_plugin'),
                'id'         => 'button_title',
                'std'        => __('CLICK TO EDIT','alenastudio'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Button Title', 'alenastudio_plugin'),
                'id'         => 'button_2_title',
                'std'        => __('CLICK TO EDIT','alenastudio'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            /**             * Responsive Tablet */
            array
                (
                'label'   => 'Responsive Styling',
                'id'      => 'css_res_t',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array
                    (
                    0 => array
                        (
                        'label' => 'Disabled',
                        'value' => 'disabled'
                    ),
                    1 => array
                        (
                        'label' => 'Enabled',
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => 'tablet',
            ),
            array
                (
                'label'                 => __('Border Width ', 'alenastudio'),
                'id'                    => 'css_res_t_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Radius ', 'alenastudio'),
                'id'                    => 'css_res_t_css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Bottom ', 'alenastudio'),
                'id'                    => 'css_res_t_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical ', 'alenastudio'),
                'id'                    => 'css_res_t_css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'max'                   => '500',
                'increment'             => '1',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal ', 'alenastudio'),
                'id'                    => 'css_res_t_css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Width ', 'alenastudio'),
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
                'label'                 => __('Border Width( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_icon_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Radius( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_icon_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Top( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '100'
            ),
            array
                (
                'label'                 => __('Margin Right( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '100'
            ),
            array
                (
                'label'                 => __('Size ( Wrapper )( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_icon_wrapper_width',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '300'
            ),
            array
                (
                'label'                 => __('Size ( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_icon_width',
                'std'                   => '45',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( Title ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( Title ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-title h4',
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
                'label'                 => __('Line Height( Title ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_title_line_height',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Bottom( Title ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_title_margin',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( Content ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( Content ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_content_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
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
                'label'                 => __('Line Height( Content ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Bottom( Content ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Border Width( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Border Radius( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a',
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
                'label'                 => __('Margin Top( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Right( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Icon - Margin Right( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Width( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_2_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Border Radius( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_2_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_2_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_2_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
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
                'label'                 => __('Margin Left( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_2_mleft',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Top( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_2_mtop',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_2_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_2_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Icon - Margin Right( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_button_2_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            )
            /**             * Responsive phone */
            ,
            array
                (
                'label'   => 'Responsive Styling',
                'id'      => 'css_res_p',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array
                    (
                    0 => array
                        (
                        'label' => 'Disabled',
                        'value' => 'disabled'
                    ),
                    1 => array
                        (
                        'label' => 'Enabled',
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => 'phone',
            ),
            array
                (
                'label'                 => __('Border Width ', 'alenastudio'),
                'id'                    => 'css_res_p_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Radius ', 'alenastudio'),
                'id'                    => 'css_res_p_css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Bottom ', 'alenastudio'),
                'id'                    => 'css_res_p_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical ', 'alenastudio'),
                'id'                    => 'css_res_p_css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'max'                   => '500',
                'increment'             => '1',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal ', 'alenastudio'),
                'id'                    => 'css_res_p_css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Width ', 'alenastudio'),
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
                'label'                 => __('Border Width( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_icon_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Radius( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_icon_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Top( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '100'
            ),
            array
                (
                'label'                 => __('Margin Right( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '100'
            ),
            array
                (
                'label'                 => __('Size ( Wrapper )( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_icon_wrapper_width',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '300'
            ),
            array
                (
                'label'                 => __('Size( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_icon_width',
                'std'                   => '45',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-icon-bellow-title-inner .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( Title ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( Title ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-title h4',
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
                'label'                 => __('Line Height( Title ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_title_line_height',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Bottom( Title ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_title_margin',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( Content ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( Content ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_content_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
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
                'label'                 => __('Line Height( Content ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Bottom( Content ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Border Width( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Border Radius( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a',
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
                'label'                 => __('Margin Top( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Right( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Icon - Margin Right( Primary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Width( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_2_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Border Radius( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_2_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_2_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_2_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
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
                'label'                 => __('Margin Left( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_2_mleft',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Top( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_2_mtop',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_2_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_2_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Icon - Margin Right( Secondary Button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_button_2_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
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
        $elements = $options['elements'];
        if (!empty($elements))
            $elements = explode(' ', trim($elements));
        else
            $elements = array();
        ?>

        <div class="dslc-info-box">

            <?php if ($options['button_pos'] == 'aside' && in_array('button', $elements)) : ?>
                <div class="dslc-info-box-button dslc-info-box-button-aside">
                    <?php if (isset($options['button_link']) && !empty($options['button_link'])) : ?>
                        <a href="<?php echo esc_url($options['button_link']); ?>" target="<?php echo esc_attr($options['button_target']); ?>">
                            <?php if (isset($options['button_icon_id']) && $options['button_icon_id'] != '') : ?>
                                <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['button_icon_id']); ?>"></span>
                            <?php endif; ?>
                            <?php if ($dslc_is_admin) : ?>
                                <span class="dslca-editable-content" data-id="button_title" data-type="simple" contenteditable><?php echo esc_html($options['button_title']); ?></span>
                                <?php
                            else : echo esc_html($options['button_title']);
                            endif;
                            ?>
                        </a>
                    <?php endif; ?>	
                    <?php if (isset($options['button_2_link']) && !empty($options['button_2_link'])) : ?>
                        <a href="<?php echo esc_url($options['button_2_link']); ?>" target="<?php echo esc_attr($options['button_2_target']); ?>" class="dslc-secondary">
                            <?php if (isset($options['button_2_icon_id']) && $options['button_2_icon_id'] != '') : ?>
                                <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['button_2_icon_id']); ?>"></span>
                            <?php endif; ?>
                            <?php if ($dslc_is_admin) : ?>
                                <span class="dslca-editable-content" data-id="button_2_title" data-type="simple" contenteditable><?php echo esc_html($options['button_2_title']); ?></span>
                                <?php
                            else : echo esc_html($options['button_2_title']);
                            endif;
                            ?>
                        </a>
                    <?php endif; ?>
                </div><!-- .dslc-info-box-button -->
            <?php endif; ?>

            <div class="dslc-info-box-main-wrap dslc-clearfix">

                <?php if (in_array('icon', $elements)) : ?>
                    <div class="dslc-info-box-icon-bellow-title">
                        <div class="dslc-info-box-icon-bellow-title-inner as-float-left">
                            <?php if (!empty($options['icon_link'])) : ?>
                                <a class="as-icon-link" href="<?php echo esc_url($options['icon_link']); ?>" target="<?php echo esc_attr($options['icon_link_target']); ?>">
                                    <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['icon_id']); ?>"></span>
                                </a>
                            <?php else :?>
                             <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['icon_id']); ?>"></span>
                            <?php endif; ?>
                        </div><!-- .dslc-info-box-image-inner -->

                        <?php if (in_array('title', $elements)) : ?>
                            <div class="dslc-info-box-title as-float-left">
                                <?php if ($dslc_is_admin) : ?>
                                    <h4 class="dslca-editable-content" data-id="title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo stripslashes($options['title']); ?></h4>
                                <?php else : ?>
                                    <?php if ($options['title_link'] != '') : ?>
                                        <h4><a href="<?php echo esc_url($options['title_link']); ?>" target="<?php echo esc_attr($options['title_link_target']); ?>"><?php echo stripslashes($options['title']); ?></a></h4>
                                    <?php else : ?>
                                        <h4><?php echo stripslashes($options['title']); ?></h4>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div><!-- .dslc-info-box-title -->
                        <?php endif; ?>


                    </div><!-- .dslc-info-box-image -->
                <?php endif; ?>

                <div class="dslc-clearfix"></div>

                <div class="dslc-info-box-main">



                    <?php if (in_array('content', $elements)) : ?>
                        <div class="dslc-info-box-content">
                            <?php if ($dslc_is_admin) : ?>
                                <div class="dslca-editable-content" data-id="content">								
                                    <?php echo stripslashes($options['content']); ?>
                                </div><!-- .dslca-editable-content -->
                                <div class="dslca-wysiwyg-actions-edit"><span class="dslca-wysiwyg-actions-edit-hook"><?php _e('Edit Content', 'alenastudio_plugin'); ?></span></div>
                            <?php else : ?>
                                <?php echo do_shortcode(stripslashes($options['content'])); ?>
                            <?php endif; ?>
                        </div><!-- .dslc-info-box-content -->
                    <?php endif; ?>

                    <?php if ($options['button_pos'] == 'bellow' && in_array('button', $elements)) : ?>
                        <div class="dslc-info-box-button">
                            <?php if (isset($options['button_link']) && !empty($options['button_link'])) : ?>
                                <a href="<?php echo esc_url($options['button_link']); ?>" target="<?php echo esc_attr($options['button_target']); ?>">
                                    <?php if (isset($options['button_icon_id']) && $options['button_icon_id'] != '') : ?>
                                        <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['button_icon_id']); ?>"></span>
                                    <?php endif; ?>
                                    <?php if ($dslc_is_admin) : ?>
                                        <span class="dslca-editable-content" data-id="button_title" data-type="simple" contenteditable><?php echo esc_html($options['button_title']); ?></span>
                                        <?php
                                    else : echo esc_html($options['button_title']);
                                    endif;
                                    ?>
                                </a>
                            <?php endif; ?>	
                            <?php if (isset($options['button_2_link']) && !empty($options['button_2_link'])) : ?>
                                <a href="<?php echo esc_url($options['button_2_link']); ?>" target="<?php echo esc_attr($options['button_2_target']); ?>" class="dslc-secondary">
                                    <?php if (isset($options['button_2_icon_id']) && $options['button_2_icon_id'] != '') : ?>
                                        <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['button_2_icon_id']); ?>"></span>
                                    <?php endif; ?>
                                    <?php if ($dslc_is_admin) : ?>
                                        <span class="dslca-editable-content" data-id="button_2_title" data-type="simple" contenteditable><?php echo esc_html($options['button_2_title']); ?></span>
                                        <?php
                                    else : echo esc_html($options['button_2_title']);
                                    endif;
                                    ?>
                                </a>
                            <?php endif; ?>
                        </div><!-- .dslc-info-box-button -->
                    <?php endif; ?>

                </div><!-- .dslc-info-box-main -->

            </div><!-- .dslc-info-box-main-wrap -->

        </div><!-- .dslc-info-box -->

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
