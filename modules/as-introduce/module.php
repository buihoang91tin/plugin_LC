<?php

class ASEX_Introduce extends ASEX_MODULE {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'ASEX_Introduce';
        $this->module_title    = __('Introduce', 'monalisa');
        $this->module_icon     = 'info';
        $this->module_category = 'as - Info Box';
    }

    function options() {

        $dslc_options = array(
            array(
                'label'   => __('Show On', 'monalisa'),
                'id'      => 'css_show_on',
                'std'     => 'desktop tablet phone',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Desktop', 'monalisa'),
                        'value' => 'desktop'
                    ),
                    array(
                        'label' => __('Tablet', 'monalisa'),
                        'value' => 'tablet'
                    ),
                    array(
                        'label' => __('Phone', 'monalisa'),
                        'value' => 'phone'
                    ),
                ),
            ),
            array(
                'label' => __('Title Link', 'monalisa'),
                'id'    => 'title_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Title Link - Open in', 'monalisa'),
                'id'      => 'title_link_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'monalisa'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'monalisa'),
                        'value' => '_blank',
                    ),
                )
            ),
            /**
             * General
             */
            array(
                'label'   => __('Elements', 'monalisa'),
                'id'      => 'elements',
                'std'     => 'icon title content social image',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Title', 'monalisa'),
                        'value' => 'title'
                    ),
                    array(
                        'label' => __('Image', 'monalisa'),
                        'value' => 'image'
                    ),
                    array(
                        'label' => __('Content', 'monalisa'),
                        'value' => 'content'
                    ),
                    array(
                        'label' => __('Social', 'monalisa'),
                        'value' => 'Social'
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'                 => __('Align', 'monalisa'),
                'id'                    => 'text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Color', 'monalisa'),
                'id'                    => 'css_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'monalisa'),
                'id'                    => 'css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'monalisa'),
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
                'label'                 => __('Borders', 'monalisa'),
                'id'                    => 'css_border_trbl',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'monalisa'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'monalisa'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'monalisa'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'monalisa'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'monalisa'),
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
                'label'                 => __('Z-index', 'monalisa'),
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
                'label'                 => __('Margin Top', 'monalisa'),
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
                'label'                 => __('Margin Bottom', 'monalisa'),
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
                'label'                 => __('Padding Vertical', 'monalisa'),
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
                'label'                 => __('Padding Horizontal', 'monalisa'),
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
                'label'                 => __('Width', 'monalisa'),
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
                'label'                 => __('Align', 'monalisa'),
                'id'                    => 'css_title_text_align',
                'std'                   => 'inherit',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Title', 'monalisa'),
            ),
            array(
                'label'                 => __('Color', 'monalisa'),
                'id'                    => 'css_title_color',
                'std'                   => '#3d3d3d',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'monalisa'),
            ),
            array(
                'label'                 => __('Font Size', 'monalisa'),
                'id'                    => 'css_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Title', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'monalisa'),
                'id'                    => 'css_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Title', 'monalisa'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'monalisa'),
                'id'                    => 'css_title_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Title', 'monalisa'),
            ),
            array(
                'label'                 => __('Line Height', 'monalisa'),
                'id'                    => 'css_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Title', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'monalisa'),
                'id'                    => 'css_title_margin',
                'std'                   => '21',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Title', 'monalisa'),
                'ext'                   => 'px'
            ),
            /**
             * Image
             */
            array(
                'label'             => __('Image Upload', 'monalisa'),
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
                'label'                 => __('Align', 'monalisa'),
                'id'                    => 'css_content_text_align',
                'std'                   => 'inherit',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Decription', 'monalisa'),
            ),
            array(
                'label'                 => __('Color', 'monalisa'),
                'id'                    => 'css_content_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Decription', 'monalisa'),
            ),
            array(
                'label'                 => __('Font Size', 'monalisa'),
                'id'                    => 'css_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Decription', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'monalisa'),
                'id'                    => 'css_content_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Decription', 'monalisa'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'monalisa'),
                'id'                    => 'css_content_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Decription', 'monalisa'),
            ),
            array(
                'label'                 => __('Line Height', 'monalisa'),
                'id'                    => 'css_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Decription', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'monalisa'),
                'id'                    => 'css_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Decription', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'monalisa'),
                'id'                    => 'asex_introduce_decription_padding_vertical',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'tab'                   => __('Decription', 'monalisa'),
                'ext'                   => 'px'
            ),
            /**
             * Social
             */
            array(
                'label'   => __('Soial link 1', 'monalisa'),
                'id'      => 'asex_introduce_social_link_1',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Socials', 'monalisa'),
            ),
            array(
                'label'             => __('Icon', 'monalisa'),
                'id'                => 'asex_introduce_social_icon_1',
                'std'               => 'facebook',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Socials', 'monalisa'),
                'include_in_preset' => false
            ),
            array(
                'label'   => __('Soial link 2', 'monalisa'),
                'id'      => 'asex_introduce_social_link_2',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Socials', 'monalisa'),
            ),
            array(
                'label'             => __('Icon', 'monalisa'),
                'id'                => 'asex_introduce_social_icon_2',
                'std'               => 'youtube',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Socials', 'monalisa'),
                'include_in_preset' => false
            ),
            array(
                'label'   => __('Soial link 3', 'monalisa'),
                'id'      => 'asex_introduce_social_link_3',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Socials', 'monalisa'),
            ),
            array(
                'label'             => __('Icon', 'monalisa'),
                'id'                => 'asex_introduce_social_icon_3',
                'std'               => 'google',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Socials', 'monalisa'),
                'include_in_preset' => false
            ),
            array(
                'label'   => __('Soial link 4', 'monalisa'),
                'id'      => 'asex_introduce_social_link_4',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Socials', 'monalisa'),
            ),
            array(
                'label'             => __('Icon', 'monalisa'),
                'id'                => 'asex_introduce_social_icon_4',
                'std'               => 'pinterest',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Socials', 'monalisa'),
                'include_in_preset' => false
            ),
            array(
                'label'   => __('Soial link 5', 'monalisa'),
                'id'      => 'asex_introduce_social_link_5',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Socials', 'monalisa'),
            ),
            array(
                'label'             => __('Icon', 'monalisa'),
                'id'                => 'asex_introduce_social_icon_5',
                'std'               => 'dribbble',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Socials', 'monalisa'),
                'include_in_preset' => false
            ),
            array(
                'label'                 => __('Padding Vertical', 'monalisa'),
                'id'                    => 'asex_introduce_social_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'monalisa'),
                'id'                    => 'asex_introduce_social_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Size', 'monalisa'),
                'id'                    => 'asex_introduce_social_font_size',
                'std'                   => '19',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('BG Color', 'monalisa'),
                'id'                    => 'asex_introduce_social_bgcolor',
                'std'                   => 'rgba(189, 36, 36, 0)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'monalisa'),
            ),
            array(
                'label'                 => __('Color', 'monalisa'),
                'id'                    => 'asex_introduce_social_color',
                'std'                   => 'rgb(0, 179, 253)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'monalisa'),
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
                'tab'                   => __('Socials', 'monalisa'),
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
                'tab'                   => __('Socials', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Border Style', 'monalisa'),
                'id'                    => 'asex_introduce_social_border_style',
                'std'                   => 'solid',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Invisible', 'monalisa'),
                        'value' => 'invisible'
                    ),
                    array(
                        'label' => __('Solid', 'monalisa'),
                        'value' => 'solid'
                    ),
                    array(
                        'label' => __('Dashed', 'monalisa'),
                        'value' => 'dashed'
                    ),
                    array(
                        'label' => __('Dotted', 'monalisa'),
                        'value' => 'dotted'
                    ),
                ),
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'monalisa'),
            ),
            array(
                'label'                 => __('Border Radius', 'monalisa'),
                'id'                    => 'asex_introduce_social_border_radius',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'monalisa'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Margin Bottom', 'monalisa'),
                'id'                    => 'asex_introduce_social_margin_bottom',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-introduce-social',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Socials', 'monalisa'),
                'ext'                   => 'px'
            ),
            /**
             * Hidden
             */
            array(
                'label'      => __('Title', 'monalisa'),
                'id'         => 'title',
                'std'        => __('CLICK TO EDIT','monalisa'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Content', 'monalisa'),
                'id'         => 'content',
                'std'        => 'This is just placeholder text. Click here to edit it.',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Button Title', 'monalisa'),
                'id'         => 'button_title',
                'std'        => __('CLICK TO EDIT','monalisa'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Button Title', 'monalisa'),
                'id'         => 'button_2_title',
                'std'        => __('CLICK TO EDIT','monalisa'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive Styling', 'monalisa'),
                'id'      => 'css_res_t',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'monalisa'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'monalisa'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('tablet', 'monalisa'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'monalisa'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'monalisa'),
                'id'                    => 'css_res_t_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'monalisa'),
                'id'                    => 'css_res_t_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'monalisa'),
                'id'                    => 'css_res_t_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-main-wrap',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Title - Font Size', 'monalisa'),
                'id'                    => 'css_res_t_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'monalisa'),
                'id'                    => 'css_res_t_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'monalisa'),
                'id'                    => 'css_res_t_title_margin',
                'std'                   => '21',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Font Size', 'monalisa'),
                'id'                    => 'css_res_t_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Line Height', 'monalisa'),
                'id'                    => 'css_res_t_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Margin Bottom', 'monalisa'),
                'id'                    => 'css_res_t_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px'
            ),
            /**
             * Responsive Phone
             */
            array(
                'label'   => __('Responsive Styling', 'monalisa'),
                'id'      => 'css_res_p',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'monalisa'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'monalisa'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('phone', 'monalisa'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'monalisa'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'monalisa'),
                'id'                    => 'css_res_p_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'monalisa'),
                'id'                    => 'css_res_p_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'monalisa'),
                'id'                    => 'css_res_p_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-main-wrap',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Title - Font Size', 'monalisa'),
                'id'                    => 'css_res_p_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'monalisa'),
                'id'                    => 'css_res_p_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'monalisa'),
                'id'                    => 'css_res_p_title_margin',
                'std'                   => '21',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Font Size', 'monalisa'),
                'id'                    => 'css_res_p_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Line Height', 'monalisa'),
                'id'                    => 'css_res_p_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Margin Bottom', 'monalisa'),
                'id'                    => 'css_res_p_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
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
                                <div class="dslca-wysiwyg-actions-edit"><span class="dslca-wysiwyg-actions-edit-hook"><?php _e('Edit Content', 'monalisa'); ?></span></div>
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
