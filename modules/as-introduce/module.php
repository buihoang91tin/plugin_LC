<?php

class ASEX_Introduce extends ASEX_MODULE {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'ASEX_Introduce';
        $this->module_title    = __('Introduce', 'asex');
        $this->module_icon     = 'info';
        $this->module_category = 'as - Info Box';
    }

    function options() {

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
            /**
             * General
             */
            array(
                'label'   => __('Elements', 'asex'),
                'id'      => 'elements',
                'std'     => 'icon title content social image',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Title', 'asex'),
                        'value' => 'title'
                    ),
                    array(
                        'label' => __('Image', 'asex'),
                        'value' => 'image'
                    ),
                    array(
                        'label' => __('Content', 'asex'),
                        'value' => 'content'
                    ),
                    array(
                        'label' => __('Social', 'asex'),
                        'value' => 'Social'
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
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'css_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
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
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
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
                'label'                 => __('Z-index', 'asex'),
                'id'                    => 'css_margin_z_index',
                'std'                   => '999',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'z-index',
                'section'               => 'styling',
                'max'                   => 1000,
            ),
            array(
                'label'                 => __('Margin Top', 'asex'),
                'id'                    => 'css_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => -100,
                'ma~x'                  => 100,
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
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
                'label'                 => __('Padding Vertical', 'asex'),
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
                'label'                 => __('Padding Horizontal', 'asex'),
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
             * Title
             */
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'css_title_text_align',
                'std'                   => 'inherit',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
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
                'affect_on_change_el'   => '.dslc-info-box-title h4',
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
                'affect_on_change_el'   => '.dslc-info-box-title h4',
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
                'affect_on_change_el'   => '.dslc-info-box-title h4',
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
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'css_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_title_margin',
                'std'                   => '21',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px'
            ),
            /**
             * Image
             */
            array(
                'label'             => __('Image Upload', 'asex'),
                'id'                => 'asex_introduce_upload',
                'std'               => '',
                'type'              => 'image',
                'refresh_on_change' => false,
                'section'           => 'styling',
                'tab'               => 'Image',
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'asex_introduce_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-info-box-image-wrapper,.as-info-box-image-wrapper img,.as-info-box-image-wrapper a img',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => 'Image',
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Size', 'asex'),
                'id'                    => 'asex_introduce_size',
                'std'                   => '32',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-info-box-image-wrapper a img, .as-info-box-image-wrapper img',
                'affect_on_change_rule' => 'width',
                'section'               => 'styling',
                'tab'                   => 'Image',
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'asex_introduce_margin_bottom',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-info-box-image-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => 'Image',
                'ext'                   => 'px'
            ),
            /**
             * Decription
             */
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'css_content_text_align',
                'std'                   => 'inherit',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Decription', 'asex'),
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
                'tab'                   => __('Decription', 'asex'),
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
                'tab'                   => __('Decription', 'asex'),
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
                'tab'                   => __('Decription', 'asex'),
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
                'tab'                   => __('Decription', 'asex'),
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
                'tab'                   => __('Decription', 'asex'),
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
                'tab'                   => __('Decription', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_introduce_decription_padding_vertical',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'tab'                   => __('Decription', 'asex'),
                'ext'                   => 'px'
            ),
            /**
             * Social
             */
            array(
                'label'   => __('Soial link 1', 'asex'),
                'id'      => 'asex_introduce_social_link_1',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Socials', 'asex'),
            ),
            array(
                'label'             => __('Icon', 'asex'),
                'id'                => 'asex_introduce_social_icon_1',
                'std'               => 'facebook',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Socials', 'asex'),
                'include_in_preset' => false
            ),
            array(
                'label'   => __('Soial link 2', 'asex'),
                'id'      => 'asex_introduce_social_link_2',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Socials', 'asex'),
            ),
            array(
                'label'             => __('Icon', 'asex'),
                'id'                => 'asex_introduce_social_icon_2',
                'std'               => 'youtube',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Socials', 'asex'),
                'include_in_preset' => false
            ),
            array(
                'label'   => __('Soial link 3', 'asex'),
                'id'      => 'asex_introduce_social_link_3',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Socials', 'asex'),
            ),
            array(
                'label'             => __('Icon', 'asex'),
                'id'                => 'asex_introduce_social_icon_3',
                'std'               => 'google',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Socials', 'asex'),
                'include_in_preset' => false
            ),
            array(
                'label'   => __('Soial link 4', 'asex'),
                'id'      => 'asex_introduce_social_link_4',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Socials', 'asex'),
            ),
            array(
                'label'             => __('Icon', 'asex'),
                'id'                => 'asex_introduce_social_icon_4',
                'std'               => 'pinterest',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Socials', 'asex'),
                'include_in_preset' => false
            ),
            array(
                'label'   => __('Soial link 5', 'asex'),
                'id'      => 'asex_introduce_social_link_5',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Socials', 'asex'),
            ),
            array(
                'label'             => __('Icon', 'asex'),
                'id'                => 'asex_introduce_social_icon_5',
                'std'               => 'dribbble',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Socials', 'asex'),
                'include_in_preset' => false
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_introduce_social_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'asex_introduce_social_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Size', 'asex'),
                'id'                    => 'asex_introduce_social_font_size',
                'std'                   => '19',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'asex_introduce_social_bgcolor',
                'std'                   => 'rgba(189, 36, 36, 0)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'asex'),
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'asex_introduce_social_color',
                'std'                   => 'rgb(0, 179, 253)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'asex'),
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'asex_introduce_social_border',
                'std'                   => 'rgba(189, 36, 36, 0)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'asex'),
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'asex_introduce_social_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Border Style', 'asex'),
                'id'                    => 'asex_introduce_social_border_style',
                'std'                   => 'solid',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Invisible', 'asex'),
                        'value' => 'invisible'
                    ),
                    array(
                        'label' => __('Solid', 'asex'),
                        'value' => 'solid'
                    ),
                    array(
                        'label' => __('Dashed', 'asex'),
                        'value' => 'dashed'
                    ),
                    array(
                        'label' => __('Dotted', 'asex'),
                        'value' => 'dotted'
                    ),
                ),
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'asex'),
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'asex_introduce_social_border_radius',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'asex'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'asex_introduce_social_margin_bottom',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'asex'),
                'ext'                   => 'px'
            ),
            /**
             * Hidden
             */
            array(
                'label'      => __('Title', 'asex'),
                'id'         => 'title',
                'std'        => __('CLICK TO EDIT','asex'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Content', 'asex'),
                'id'         => 'content',
                'std'        => 'This is just placeholder text. Click here to edit it.',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Button Title', 'asex'),
                'id'         => 'button_title',
                'std'        => __('CLICK TO EDIT','asex'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Button Title', 'asex'),
                'id'         => 'button_2_title',
                'std'        => __('CLICK TO EDIT','asex'),
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
                'affect_on_change_el'   => '.dslc-info-box',
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
                'affect_on_change_el'   => '.dslc-info-box',
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
                'affect_on_change_el'   => '.dslc-info-box',
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
                'label'                 => __('Title - Font Size', 'asex'),
                'id'                    => 'css_res_t_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
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
                'affect_on_change_el'   => '.dslc-info-box-title h4',
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
                'affect_on_change_el'   => '.dslc-info-box-title',
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
                'affect_on_change_el'   => '.dslc-info-box',
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
                'affect_on_change_el'   => '.dslc-info-box',
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
                'affect_on_change_el'   => '.dslc-info-box',
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
                'label'                 => __('Title - Font Size', 'asex'),
                'id'                    => 'css_res_p_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
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
                'affect_on_change_el'   => '.dslc-info-box-title h4',
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
                'affect_on_change_el'   => '.dslc-info-box-title',
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
            <div class="dslc-info-box-main-wrap dslc-clearfix">
                <div class="dslc-info-box-main">
                    <?php if (in_array('title', $elements)) : ?>
                        <div class="dslc-info-box-title">
                            <?php if ($dslc_is_admin) : ?>
                                <h4 class="dslca-editable-content" data-id="title" data-type="simple" <?php
                                if ($dslc_is_admin) {
                                    echo 'contenteditable';
                                }
                                ?>><?php echo stripslashes($options['title']); ?></h4>
                                <?php else : ?>
                                    <?php if ($options['title_link'] != '') : ?>
                                    <h4><a href="<?php echo esc_url($options['title_link']); ?>" target="<?php echo esc_attr($options['title_link_target']); ?>"><?php echo stripslashes($options['title']); ?></a></h4>
                                <?php else : ?>
                                    <h4><?php echo stripslashes($options['title']); ?></h4>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <!-- .dslc-info-box-title -->
                    <?php endif; ?>
                    <?php if (in_array('image', $elements) && $options['asex_introduce_upload'] != ""): ?>
                        <div class="as-info-box-image-wrapper">
                            <?php if ($options['title_link'] != '') : ?>
                                <a href="<?php echo esc_url($options['title_link']); ?>" target="<?php echo esc_attr($options['title_link_target']); ?>">
                                    <image src="<?php echo esc_url($options['asex_introduce_upload']); ?>"/>
                                </a>
                            <?php else : ?>
                                <image src="<?php echo esc_url($options['asex_introduce_upload']); ?>" />
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (in_array('content', $elements)) : ?>
                        <div class="dslc-info-box-content">
                            <?php if ($dslc_is_admin) : ?>
                                <div class="dslca-editable-content" data-id="content">
                                    <?php echo stripslashes($options['content']); ?>
                                </div>
                                <!-- .dslca-editable-content -->
                                <div class="dslca-wysiwyg-actions-edit"><span class="dslca-wysiwyg-actions-edit-hook"><?php _e('Edit Content', 'asex'); ?></span></div>
                            <?php else : ?>
                                <?php echo do_shortcode(stripslashes($options['content'])); ?>
                            <?php endif; ?>
                        </div>
                        <!-- .dslc-info-box-content -->
                    <?php endif; ?>
                    <div class="as-introduce-social ">
                        <?php if (in_array('Social', $elements)):$i = 1; ?>
                            <?php
                            while ($i < 6):
                                $url  = $options['asex_introduce_social_link_' . $i];
                                $icon = $options['asex_introduce_social_icon_' . $i];
                                if ($url != ''):
                                    ?>
                                    <a href="<?php echo esc_url($options['asex_introduce_social_link_' . $i]) ?>"><span class="dslc-icon dslc-icon-<?php echo esc_attr($icon) ?>"></span></a>
                                        <?php
                                    endif;
                                    $i+=1;
                                    ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                    </div>
                </div>
                <!-- .dslc-info-box-main -->
            </div>
            <!-- .dslc-info-box-main-wrap -->
        </div>
        <!-- .dslc-info-box -->
        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
