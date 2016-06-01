<?php

class ASEX_Info_Box_2 extends ASEX_MODULE {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct()
    {

        $this->module_id       = 'ASEX_Info_Box_2';
        $this->module_title    = __('Info Box 2', 'asex');
        $this->module_icon     = 'info';
        $this->module_category = 'as - Info Box';
    }

    function options()
    {

        $dslc_options = array(
            array(
                'label'   => __('Show On', 'asex'),
                'id'      => 'css_show_on',
                'std'     => 'desktop tablet phone',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Desktop', 'asex'),
                        'value' => 'desktop'
                    ),
                    array(
                        'label' => __('Tablet', 'asex'),
                        'value' => 'tablet'
                    ),
                    array(
                        'label' => __('Phone', 'asex'),
                        'value' => 'phone'
                    ),
                ),
            ),
            array(
                'label' => __('Title Link', 'asex'),
                'id'    => 'title_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Title Link - Open in', 'asex'),
                'id'      => 'title_link_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'asex'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'asex'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'label' => __('Icon Link', 'asex'),
                'id'    => 'icon_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Icon Link - Open in', 'asex'),
                'id'      => 'icon_link_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'asex'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'asex'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'label' => __('Primary Button Link', 'asex'),
                'id'    => 'button_link',
                'std'   => '#',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Primary Button - Open in', 'asex'),
                'id'      => 'button_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'asex'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'asex'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'label' => __('Secondary Button Link', 'asex'),
                'id'    => 'button_2_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Secondary Button - Open in', 'asex'),
                'id'      => 'button_2_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'asex'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'asex'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'id'      => 'link_nofollow',
                'std'     => '',
                'type'    => 'checkbox',
                'help'    => __('Nofollow tells search engines to not follow this specific link', 'asex'),
                'choices' => array(
                    array(
                        'label' => __('Nofollow', 'asex'),
                        'value' => 'nofollow'
                    ),
                ),
            ),
            /**
             * General
             */
            array(
                'label'   => __('Elements', 'asex'),
                'id'      => 'elements',
                'std'     => 'icon title content',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Icon', 'asex'),
                        'value' => 'icon'
                    ),
                    array(
                        'label' => __('Image', 'asex'),
                        'value' => 'image'
                    ),
                    array(
                        'label' => __('Title', 'asex'),
                        'value' => 'title'
                    ),
                    array(
                        'label' => __('Sub Title', 'asex'),
                        'value' => 'subtitle'
                    ),
                    array(
                        'label' => __('Content', 'asex'),
                        'value' => 'content'
                    ),
                    array(
                        'label' => __('Button', 'asex'),
                        'value' => 'button'
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'css_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Color Hover', 'asex'),
                'id'                    => 'css_bg_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image', 'asex'),
                'id'                    => 'css_bg_img',
                'std'                   => '',
                'type'                  => 'image',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'background-image',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Repeat', 'asex'),
                'id'                    => 'css_bg_img_repeat',
                'std'                   => 'repeat',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Repeat', 'asex'),
                        'value' => 'repeat',
                    ),
                    array(
                        'label' => __('Repeat Horizontal', 'asex'),
                        'value' => 'repeat-x',
                    ),
                    array(
                        'label' => __('Repeat Vertical', 'asex'),
                        'value' => 'repeat-y',
                    ),
                    array(
                        'label' => __('Do NOT Repeat', 'asex'),
                        'value' => 'no-repeat',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Attachment', 'asex'),
                'id'                    => 'css_bg_img_attch',
                'std'                   => 'scroll',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Scroll', 'asex'),
                        'value' => 'scroll',
                    ),
                    array(
                        'label' => __('Fixed', 'asex'),
                        'value' => 'fixed',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'background-attachment',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Position', 'asex'),
                'id'                    => 'css_bg_img_pos',
                'std'                   => 'top left',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Top Left', 'asex'),
                        'value' => 'left top',
                    ),
                    array(
                        'label' => __('Top Right', 'asex'),
                        'value' => 'right top',
                    ),
                    array(
                        'label' => __('Top Center', 'asex'),
                        'value' => 'Center Top',
                    ),
                    array(
                        'label' => __('Center Left', 'asex'),
                        'value' => 'left center',
                    ),
                    array(
                        'label' => __('Center Right', 'asex'),
                        'value' => 'right center',
                    ),
                    array(
                        'label' => __('Center', 'asex'),
                        'value' => 'center center',
                    ),
                    array(
                        'label' => __('Bottom Left', 'asex'),
                        'value' => 'left bottom',
                    ),
                    array(
                        'label' => __('Bottom Right', 'asex'),
                        'value' => 'right bottom',
                    ),
                    array(
                        'label' => __('Bottom Center', 'asex'),
                        'value' => 'center bottom',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'background-position',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
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
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Minimum Height', 'asex'),
                'id'                    => 'css_min_height',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'min-height',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 1000,
                'increment'             => 5
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'asex'),
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
             * Wrapper
             */
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'css_wrapper_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('BG Color Hover', 'asex'),
                'id'                    => 'css_wrapper_bg_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2:hover .dslc-info-box-wrapper',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('BG Image', 'asex'),
                'id'                    => 'css_wrapper_bg_img',
                'std'                   => '',
                'type'                  => 'image',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'background-image',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('BG Image Repeat', 'asex'),
                'id'                    => 'css_wrapper_bg_img_repeat',
                'std'                   => 'repeat',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Repeat', 'asex'),
                        'value' => 'repeat',
                    ),
                    array(
                        'label' => __('Repeat Horizontal', 'asex'),
                        'value' => 'repeat-x',
                    ),
                    array(
                        'label' => __('Repeat Vertical', 'asex'),
                        'value' => 'repeat-y',
                    ),
                    array(
                        'label' => __('Do NOT Repeat', 'asex'),
                        'value' => 'no-repeat',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('BG Image Attachment', 'asex'),
                'id'                    => 'css_wrapper_bg_img_attch',
                'std'                   => 'scroll',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Scroll', 'asex'),
                        'value' => 'scroll',
                    ),
                    array(
                        'label' => __('Fixed', 'asex'),
                        'value' => 'fixed',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'background-attachment',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('BG Image Position', 'asex'),
                'id'                    => 'css_wrapper_bg_img_pos',
                'std'                   => 'top left',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Top Left', 'asex'),
                        'value' => 'left top',
                    ),
                    array(
                        'label' => __('Top Right', 'asex'),
                        'value' => 'right top',
                    ),
                    array(
                        'label' => __('Top Center', 'asex'),
                        'value' => 'Center Top',
                    ),
                    array(
                        'label' => __('Center Left', 'asex'),
                        'value' => 'left center',
                    ),
                    array(
                        'label' => __('Center Right', 'asex'),
                        'value' => 'right center',
                    ),
                    array(
                        'label' => __('Center', 'asex'),
                        'value' => 'center center',
                    ),
                    array(
                        'label' => __('Bottom Left', 'asex'),
                        'value' => 'left bottom',
                    ),
                    array(
                        'label' => __('Bottom Right', 'asex'),
                        'value' => 'right bottom',
                    ),
                    array(
                        'label' => __('Bottom Center', 'asex'),
                        'value' => 'center bottom',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'background-position',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_wrapper_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_wrapper_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'css_wrapper_border_trbl',
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
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'css_wrapper_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_wrapper_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_wrapper_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'asex')
            ),
            /**
             * Icon
             */
            array(
                'label'   => __('Style Icon', 'asex'),
                'id'      => 'icon_style',
                'std'     => 'icon',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Icon', 'asex'),
                        'value' => 'icon',
                    ),
                    array(
                        'label' => __('Text', 'asex'),
                        'value' => 'text',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Icon', 'asex'),
            ),
            array(
                'label'   => __('Icon Text', 'asex'),
                'id'      => 'icon_text',
                'std'     => '01',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Icon', 'asex')
            ),
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'css_icon_text_align',
                'std'                   => 'inherit',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'css_icon_bg_color',
                'std'                   => '#ffb727',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('BG Color Hover', 'asex'),
                'id'                    => 'css_icon_bg_color_hover',
                'std'                   => '#ffb727',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2:hover .dslc-info-box-image-inner',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_icon_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_icon_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'css_icon_border_trbl',
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
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'css_icon_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
                'ext'                   => '%',
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_icon_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('Color Hover', 'asex'),
                'id'                    => 'css_icon_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2:hover .dslc-info-box-image-inner .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'             => __('Icon', 'asex'),
                'id'                => 'icon_id',
                'std'               => 'as-params',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Icon', 'asex'),
                'include_in_preset' => false
            ),
            array(
                'label'                 => __('Margin Top', 'asex'),
                'id'                    => 'css_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Left', 'asex'),
                'id'                    => 'css_icon_margin_left',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Right', 'asex'),
                'id'                    => 'css_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2 .dslc-info-box-wrapper .dslc-info-box-image',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_icon_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'   => __('Position', 'asex'),
                'id'      => 'icon_position',
                'std'     => 'aside',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Above', 'asex'),
                        'value' => 'above',
                    ),
                    array(
                        'label' => __('Aside', 'asex'),
                        'value' => 'aside',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Icon', 'asex'),
            ),
            array(
                'label'   => __('Style', 'asex'),
                'id'      => 'icon_position_style',
                'std'     => 'style_1',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Style 1', 'asex'),
                        'value' => 'style_1',
                    ),
                    array(
                        'label' => __('Style 2', 'asex'),
                        'value' => 'style_2',
                    ),
                    array(
                        'label' => __('Style 3', 'asex'),
                        'value' => 'style_3',
                    ),
                    array(
                        'label' => __('Style 4', 'asex'),
                        'value' => 'style_4',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('Size ( Wrapper )', 'asex'),
                'id'                    => 'css_icon_wrapper_width',
                'std'                   => '84',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            array(
                'label'                 => __('Size ( Icon )', 'asex'),
                'id'                    => 'css_icon_width',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
                'ext'                   => 'px'
            ),
            /**
             * Icon text
             */
            array(
                'label'                 => __('Color (Text)' , 'asex'),
                'id'                    => 'css_icon_text_color',
                'std'                   => '#3d3d3d',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-icon-text',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('Color Hover (Text)', 'asex'),
                'id'                    => 'css_icon_text_color_hover',
                'std'                   => '#3d3d3d',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2:hover .asex-icon-text',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('Font Size (Text)', 'asex'),
                'id'                    => 'css_icon_text_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-icon-text',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight (Text)', 'asex'),
                'id'                    => 'css_icon_text_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-icon-text',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family (Text)', 'asex'),
                'id'                    => 'css_icon_text_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-icon-text',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('Letter Spacing (Text)', 'asex'),
                'id'                    => 'css_icon_text_letter_spacing',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-icon-text',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Line Height (Text)', 'asex'),
                'id'                    => 'css_icon_text_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-icon-text',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
                'ext'                   => 'px'
            ),
            /**
             * Image
             */
            array(
                'label'   => __('Image - File', 'asex'),
                'id'      => 'image_alt',
                'std'     => '',
                'type'    => 'image',
                'section' => 'styling',
                'tab'     => __('Image', 'asex'),
            ),
            array(
                'label'   => __('Image Link - URL', 'asex'),
                'id'      => 'image_alt_link_url',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Image', 'asex'),
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_image_alt_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-alt-inner img',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Image', 'asex'),
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_image_alt_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-alt-inner img',
                'affect_on_change_rule' => 'border-width',
                'ext'                   => 'px',
                'section'               => 'styling',
                'tab'                   => __('Image', 'asex'),
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'css_image_alt_border_trbl',
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
                'affect_on_change_el'   => '.dslc-info-box-image-alt-inner img',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Image', 'asex'),
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'css_image_alt_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-alt-inner img',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Image', 'asex'),
                'ext'                   => '%',
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_image_alt_margin_bottom',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-alt-inner img',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Image', 'asex'),
                'ext'                   => 'px',
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'css_title_text_align',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_title_color',
                'std'                   => '#3d3d3d',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title h4',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
            ),
            array(
                'label'                 => __('Color Hover', 'asex'),
                'id'                    => 'css_title_color_hover',
                'std'                   => '#3d3d3d',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2:hover .asex-infobox-title h4',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'css_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'css_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title h4',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'css_title_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title h4',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
            ),
            array(
                'label'                 => __('Font Style', 'asex'),
                'id'                    => 'css_title_font_family',
                'std'                   => 'normal',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Normal', 'asex'),
                        'value' => 'normal'
                    ),
                    array(
                        'label' => __('Italic', 'asex'),
                        'value' => 'italic'
                    ),
                ),
                                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title h4',
                'affect_on_change_rule' => 'font-style',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex'),
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'css_title_letter_spacing',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title h4',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px',
                'min'                   => -50,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'css_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_title_margin',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Left', 'asex'),
                'id'                    => 'css_title_margin_left',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title h4',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Right', 'asex'),
                'id'                    => 'css_title_margin_right h4',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px'
            ),
            /**
             * Sub Title
             */
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'css_sub_title_text_align',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-sub-title',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'asex'),
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_sub_title_color',
                'std'                   => '#797979',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-sub-title div',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'asex'),
            ),
            array(
                'label'                 => __('Color Hover', 'asex'),
                'id'                    => 'css_sub_title_color_hover',
                'std'                   => '#797979',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2:hover .asex-infobox-sub-title div',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'asex'),
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'css_sub_title_font_size',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-sub-title div',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'css_sub_title_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-sub-title div',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'css_sub_title_font_family',
                'std'                   => 'Playfair Display',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-sub-title div',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'asex'),
            ),
            array(
                'label'                 => __('Font Style', 'asex'),
                'id'                    => 'css_sub_title_font_family',
                'std'                   => 'Italic',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Normal', 'asex'),
                        'value' => 'normal'
                    ),
                    array(
                        'label' => __('Italic', 'asex'),
                        'value' => 'italic'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-sub-title div',
                'affect_on_change_rule' => 'font-style',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'asex'),
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'css_sub_title_letter_spacing',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-sub-title div',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'asex'),
                'ext'                   => 'px',
                'min'                   => -50,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'css_sub_title_line_height',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-sub-title div',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_sub_title_margin',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-sub-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'asex'),
                'ext'                   => 'px'
            ),
            /**
             * Content
             */
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'css_content_text_align',
                'std'                   => 'left    ',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Content', 'asex'),
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_content_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Content', 'asex'),
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'css_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Content', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'css_content_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Content', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'css_content_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Content', 'asex'),
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'css_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Content', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Content', 'asex'),
                'ext'                   => 'px'
            ),
            /**
             * Button
             */
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'css_button_bg_color',
                'std'                   => '#5890e5',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'asex'),
                'id'                    => 'css_button_bg_color_hover',
                'std'                   => '#3e73c2',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_button_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'css_button_border_trbl',
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
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_button_border_color',
                'std'                   => '#d8d8d8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'asex'),
                'id'                    => 'css_button_border_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'css_button_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_button_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('Color - Hover', 'asex'),
                'id'                    => 'css_button_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'css_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'css_button_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'css_button_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'css_button_letter_spacing',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
                'ext'                   => 'px',
                'min'                   => -50,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Margin Top', 'asex'),
                'id'                    => 'css_button_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('Margin Right', 'asex'),
                'id'                    => 'css_button_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'   => __('Position', 'asex'),
                'id'      => 'button_pos',
                'std'     => 'bellow',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Right of content', 'asex'),
                        'value' => 'aside',
                    ),
                    array(
                        'label' => __('Bellow content', 'asex'),
                        'value' => 'bellow',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'   => __('Icon', 'asex'),
                'id'      => 'button_icon_id',
                'std'     => 'cog',
                'type'    => 'icon',
                'section' => 'styling',
                'tab'     => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('Icon - Color', 'asex'),
                'id'                    => 'css_button_icon_color',
                'std'                   => '#b0c8eb',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('Icon - Color Hover', 'asex'),
                'id'                    => 'css_button_icon_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a:hover .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'asex'),
                'id'                    => 'css_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'asex'),
            ),
            /**
             * Secondary Button
             */
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'css_button_2_bg_color',
                'std'                   => '#5890e5',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'asex'),
                'id'                    => 'css_button_2_bg_color_hover',
                'std'                   => '#3e73c2',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_button_2_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'css_button_2_border_trbl',
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
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_button_2_border_color',
                'std'                   => '#d8d8d8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'asex'),
                'id'                    => 'css_button_2_border_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'css_button_2_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_button_2_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('Color - Hover', 'asex'),
                'id'                    => 'css_button_2_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'css_button_2_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'css_button_2_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'css_button_2_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'css_button_2_letter_spacing',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
                'ext'                   => 'px',
                'min'                   => -50,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Margin Left', 'asex'),
                'id'                    => 'css_button_2_mleft',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('Margin Top', 'asex'),
                'id'                    => 'css_button_2_mtop',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_button_2_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_button_2_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'   => __('Icon', 'asex'),
                'id'      => 'button_2_icon_id',
                'std'     => 'cog',
                'type'    => 'icon',
                'section' => 'styling',
                'tab'     => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('Icon - Color', 'asex'),
                'id'                    => 'css_button_2_icon_color',
                'std'                   => '#b0c8eb',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('Icon - Color Hover', 'asex'),
                'id'                    => 'css_button_2_icon_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary:hover .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'asex'),
                'id'                    => 'css_button_2_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'asex'),
            ),
            /**
             * Hidden
             */
            array(
                'label'      => __('Title', 'asex'),
                'id'         => 'title',
                'std'        => 'CLICK TO EDIT',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Sub Title', 'asex'),
                'id'         => 'sub_title',
                'std'        => 'CLICK TO EDIT',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Content', 'asex'),
                'id'         => 'content',
                'std'        => 'This is just placeholder text. Hover over the module and click "Edit Content" to change it.',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Button Title', 'asex'),
                'id'         => 'button_title',
                'std'        => 'CLICK TO EDIT',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Button Title', 'asex'),
                'id'         => 'button_2_title',
                'std'        => 'CLICK TO EDIT',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive Styling', 'asex'),
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
                'affect_on_change_el'   => '.asex-info-box-2',
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
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_res_t_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Wrapper - Padding Vertical', 'asex'),
                'id'                    => 'css_res_t_inner_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Wrapper - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_t_inner_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'asex'),
                'id'                    => 'css_res_t_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-main-wrap',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Icon - Margin Top', 'asex'),
                'id'                    => 'css_res_t_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'asex'),
                'id'                    => 'css_res_t_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Icon - Size ( Wrapper )', 'asex'),
                'id'                    => 'css_res_t_icon_wrapper_width',
                'std'                   => '84',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            array(
                'label'                 => __('Icon - Size ( Icon )', 'asex'),
                'id'                    => 'css_res_t_icon_width',
                'std'                   => '31',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Font Size', 'asex'),
                'id'                    => 'css_res_t_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'asex'),
                'id'                    => 'css_res_t_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'asex'),
                'id'                    => 'css_res_t_title_margin',
                'std'                   => '21',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Font Size', 'asex'),
                'id'                    => 'css_res_t_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Line Height', 'asex'),
                'id'                    => 'css_res_t_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Margin Bottom', 'asex'),
                'id'                    => 'css_res_t_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Font Size', 'asex'),
                'id'                    => 'css_res_t_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Margin Top', 'asex'),
                'id'                    => 'css_res_t_button_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Margin Right', 'asex'),
                'id'                    => 'css_res_t_button_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Padding Vertical', 'asex'),
                'id'                    => 'css_res_t_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_t_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Icon - Margin Right', 'asex'),
                'id'                    => 'css_res_t_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('2nd Button Margin Left', 'asex'),
                'id'                    => 'css_res_t_button_2_mleft',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'asex'),
            ),
            array(
                'label'                 => __('2nd Button Margin Top', 'asex'),
                'id'                    => 'css_res_t_button_2_mtop',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'asex'),
            ),
            /**
             * Responsive Phone
             */
            array(
                'label'   => __('Responsive Styling', 'asex'),
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
                'affect_on_change_el'   => '.asex-info-box-2',
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
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_res_p_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-info-box-2',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Wrapper - Padding Vertical', 'asex'),
                'id'                    => 'css_res_p_inner_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Wrapper - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_p_inner_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'asex'),
                'id'                    => 'css_res_p_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-main-wrap',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Icon - Margin Top', 'asex'),
                'id'                    => 'css_res_p_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'asex'),
                'id'                    => 'css_res_p_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Icon - Size ( Wrapper )', 'asex'),
                'id'                    => 'css_res_p_icon_wrapper_width',
                'std'                   => '84',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            array(
                'label'                 => __('Icon - Size ( Icon )', 'asex'),
                'id'                    => 'css_res_p_icon_width',
                'std'                   => '31',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Font Size', 'asex'),
                'id'                    => 'css_res_p_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'asex'),
                'id'                    => 'css_res_p_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'asex'),
                'id'                    => 'css_res_p_title_margin',
                'std'                   => '21',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex-infobox-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Font Size', 'asex'),
                'id'                    => 'css_res_p_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Line Height', 'asex'),
                'id'                    => 'css_res_p_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Margin Bottom', 'asex'),
                'id'                    => 'css_res_p_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Font Size', 'asex'),
                'id'                    => 'css_res_p_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Margin Top', 'asex'),
                'id'                    => 'css_res_p_button_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Margin Right', 'asex'),
                'id'                    => 'css_res_p_button_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Padding Vertical', 'asex'),
                'id'                    => 'css_res_p_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_p_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Icon - Margin Right', 'asex'),
                'id'                    => 'css_res_p_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('2nd Button Margin Left', 'asex'),
                'id'                    => 'css_res_p_button_2_mleft',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'asex'),
            ),
            array(
                'label'                 => __('2nd Button Margin Top', 'asex'),
                'id'                    => 'css_res_p_button_2_mtop',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'asex'),
            ),
        );

        $dslc_options = array_merge($dslc_options, $this->shared_options('animation_options', array(
                    'hover_opts' => false)));
        $dslc_options = array_merge($dslc_options, $this->presets_options());

        return apply_filters('dslc_module_options', $dslc_options, $this->module_id);
    }

    function output($options)
    {

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

        $image_alt          = $options['image_alt'];
        $image_alt_link_url = $options['image_alt_link_url'];
        ?>

        <div class="dslc-info-box asex-info-box-2 dslc-info-box-icon-pos-<?php echo $options['icon_position']; ?>">

            <div class="dslc-info-box-wrapper"<?php if ($dslc_is_admin) echo ' data-exportable-content="div"'; ?>>

                <?php if ($options['button_pos'] == 'aside' && in_array('button', $elements)) : ?>
                    <div class="dslc-info-box-button dslc-info-box-button-aside">
                        <?php if (isset($options['button_link']) && !empty($options['button_link'])) : ?>
                            <a href="<?php echo $options['button_link']; ?>" target="<?php echo $options['button_target']; ?>" <?php if ($options['link_nofollow']) echo 'rel="nofollow"'; ?> class="dslc-primary">
                                <?php if (isset($options['button_icon_id']) && $options['button_icon_id'] != '') : ?>
                                    <span class="dslc-icon dslc-icon-<?php echo $options['button_icon_id']; ?>"></span>
                                <?php endif; ?>
                                <?php if ($dslc_is_admin) : ?>
                                    <span class="dslca-editable-content" data-id="button_title" data-type="simple" contenteditable><?php echo $options['button_title']; ?></span>
                                    <?php
                                else : echo $options['button_title'];
                                endif;
                                ?>
                            </a>
                        <?php endif; ?>
                        <?php if (isset($options['button_2_link']) && !empty($options['button_2_link'])) : ?>
                            <a href="<?php echo $options['button_2_link']; ?>" target="<?php echo $options['button_2_target']; ?>" <?php if ($options['link_nofollow']) echo 'rel="nofollow"'; ?> class="dslc-secondary">
                                <?php if (isset($options['button_2_icon_id']) && $options['button_2_icon_id'] != '') : ?>
                                    <span class="dslc-icon dslc-icon-<?php echo $options['button_2_icon_id']; ?>"></span>
                                <?php endif; ?>
                                <?php if ($dslc_is_admin) : ?>
                                    <span class="dslca-editable-content" data-id="button_2_title" data-type="simple" contenteditable><?php echo $options['button_2_title']; ?></span>
                                    <?php
                                else : echo $options['button_2_title'];
                                endif;
                                ?>
                            </a>
                        <?php endif; ?>
                    </div><!-- .dslc-info-box-button -->
                <?php endif; ?>

                <div class="dslc-info-box-main-wrap dslc-clearfix">

                    <?php if (in_array('image', $elements) && $image_alt) : ?>
                        <div class="dslc-info-box-image-alt">
                            <div class="dslc-info-box-image-alt-inner">
                                <?php if (!$image_alt_link_url) : ?>
                                    <img src="<?php echo esc_url($image_alt); ?>">
                                <?php else : ?>
                                    <a href="<?php echo esc_url($image_alt_link_url); ?>" <?php if ($options['link_nofollow']) echo 'rel="nofollow"'; ?>><img src="<?php echo esc_url($image_alt); ?>"></a>
                                <?php endif; ?>
                            </div><!-- .dslc-info-box-image-alt-inner -->
                        </div><!-- .dslc-info-box-image-alt -->
                    <?php endif; ?>

                    <?php if (in_array('icon', $elements)) : ?>
                        <?php
                        $asex_icon_pos = '';
                        if ($options['icon_position'] == 'aside')
                        {
                            switch ($options['icon_position_style'])
                            {
                                case 'style_1':
                                    $asex_icon_pos = 'as-float-left';
                                    $asex_overflow = 'asex-oveflow';
                                    $asex_clear    = 'asex-oveflow';
                                    break;
                                case 'style_2':
                                    $asex_icon_pos = 'as-float-right';
                                    $asex_overflow = 'asex-oveflow';
                                    $asex_clear    = 'asex-oveflow';
                                    break;
                                case 'style_3':
                                    $asex_icon_pos = 'as-float-left';
                                    $asex_overflow = 'asex-oveflow';
                                    $asex_clear    = 'clearfix';
                                    break;
                                case 'style_4':
                                    $asex_icon_pos = 'as-float-right';
                                    $asex_clear    = 'clearfix';
                                    $asex_overflow = 'asex-oveflow';
                                    break;
                                default:
                                    $asex_overflow = '';
                                    $asex_clear    = '';
                                    break;
                            }
                        }
                        ?>
                        <div class="dslc-info-box-image <?php echo $asex_icon_pos; ?>">
                            <div class="dslc-info-box-image-inner <?php echo ($options['icon_style'] == 'icon' ? 'asex-icon-wrapper' : 'asex-text-wrapper'); ?>">
                                <span class="<?php echo ($options['icon_style'] == 'icon' ? 'dslc-init-center dslc-icon dslc-icon-' . $options['icon_id'] : 'asex-icon-text'); ?> ">
                                    <?php
                                    if ($options['icon_style'] == 'text')
                                    {
                                        echo esc_attr($options['icon_text']);
                                    }
                                    ?></span>
                                <?php if (!empty($options['icon_link'])) : ?>
                                    <a class="dslc-info-box-image-link" href="<?php echo $options['icon_link']; ?>" <?php if ($options['link_nofollow']) echo 'rel="nofollow"'; ?> target="<?php echo $options['icon_link_target']; ?>"></a>
                                <?php endif; ?>
                            </div><!-- .dslc-info-box-image-inner -->
                        </div><!-- .dslc-info-box-image -->
                    <?php endif; ?>
                    <div class="asex-info-box-main">

                        <?php if (in_array('title', $elements)) : ?>
                            <div class=" asex-infobox-title <?php echo esc_attr($asex_overflow) ?>">
                                <?php if ($dslc_is_admin) : ?>
                                    <h4 class="dslca-editable-content" data-id="title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo stripslashes($options['title']); ?></h4>
                                <?php else : ?>
                                    <?php if ($options['title_link'] != '') : ?>
                                        <h4><a href="<?php echo $options['title_link']; ?>" target="<?php echo $options['title_link_target']; ?>" <?php if ($options['link_nofollow']) echo 'rel="nofollow"'; ?>><?php echo stripslashes($options['title']); ?></a></h4>
                                    <?php else : ?>
                                        <h4><?php echo stripslashes($options['title']); ?></h4>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div><!-- .dslc-info-box-title -->
                        <?php endif; ?>
                        <?php if (in_array('subtitle', $elements)) : ?>
                            <div class=" asex-infobox-sub-title <?php echo esc_attr($asex_overflow) ?>">
                                <?php if ($dslc_is_admin) : ?>
                                    <div class="dslca-editable-content" data-id="sub_title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo stripslashes($options['sub_title']); ?></div>
                                <?php else : ?>
                                    <div><?php echo stripslashes($options['sub_title']); ?></div>
                                <?php endif; ?>
                            </div><!-- .dslc-info-box-title -->
                        <?php endif; ?>
                        <?php
                        if ($options['icon_position_style'] == 'style_3' || $options['icon_position_style'] == 'style_4')
                        {
                            echo '<div class="clearfix"></div>';
                        }
                        ?>
                        <?php if (in_array('content', $elements)) : ?>
                            <div class="dslc-info-box-content <?php echo esc_attr($asex_clear) ?> ">
                                <?php if ($dslc_is_admin) : ?>
                                    <div class="dslca-editable-content" data-id="content">
                                        <?php echo stripslashes($options['content']); ?>
                                    </div><!-- .dslca-editable-content -->
                                    <div class="dslca-wysiwyg-actions-edit"><span class="dslca-wysiwyg-actions-edit-hook"><?php _e('Edit Content', 'asex'); ?></span></div>
                                <?php else : ?>
                                    <?php echo do_shortcode(stripslashes($options['content'])); ?>
                                <?php endif; ?>
                            </div><!-- .dslc-info-box-content -->
                        <?php endif; ?>

                        <?php if ($options['button_pos'] == 'bellow' && in_array('button', $elements)) : ?>
                            <div class="dslc-info-box-button">
                                <?php if (isset($options['button_link']) && !empty($options['button_link'])) : ?>
                                    <a href="<?php echo $options['button_link']; ?>" target="<?php echo $options['button_target']; ?>" <?php if ($options['link_nofollow']) echo 'rel="nofollow"'; ?> class="dslc-primary">
                                        <?php if (isset($options['button_icon_id']) && $options['button_icon_id'] != '') : ?>
                                            <span class="dslc-icon dslc-icon-<?php echo $options['button_icon_id']; ?>"></span>
                                        <?php endif; ?>
                                        <?php if ($dslc_is_admin) : ?>
                                            <span class="dslca-editable-content" data-id="button_title" data-type="simple" contenteditable><?php echo $options['button_title']; ?></span>
                                            <?php
                                        else : echo $options['button_title'];
                                        endif;
                                        ?>
                                    </a>
                                <?php endif; ?>
                                <?php if (isset($options['button_2_link']) && !empty($options['button_2_link'])) : ?>
                                    <a href="<?php echo $options['button_2_link']; ?>" target="<?php echo $options['button_2_target']; ?>" <?php if ($options['link_nofollow']) echo 'rel="nofollow"'; ?> class="dslc-secondary">
                                        <?php if (isset($options['button_2_icon_id']) && $options['button_2_icon_id'] != '') : ?>
                                            <span class="dslc-icon dslc-icon-<?php echo $options['button_2_icon_id']; ?>"></span>
                                        <?php endif; ?>
                                        <?php if ($dslc_is_admin) : ?>
                                            <span class="dslca-editable-content" data-id="button_2_title" data-type="simple" contenteditable><?php echo $options['button_2_title']; ?></span>
                                            <?php
                                        else : echo $options['button_2_title'];
                                        endif;
                                        ?>
                                    </a>
                                <?php endif; ?>
                            </div><!-- .dslc-info-box-button -->
                        <?php endif; ?>

                    </div><!-- .dslc-info-box-main -->

                </div><!-- .dslc-info-box-main-wrap -->

            </div><!-- .dslc-info-box-wrapper -->

        </div><!-- .dslc-info-box -->

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
