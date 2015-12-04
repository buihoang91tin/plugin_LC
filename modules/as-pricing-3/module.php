<?php

class AS_Pricing_3 extends DSLC_Module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;
    var $handle_like;

    function __construct() {

        $this->module_id       = 'AS_Pricing_3';
        $this->module_title    = __('Pricing 3', 'dslc_string');
        $this->module_icon     = 'dollar';
        $this->module_category = 'as - Pricing';
        $this->handle_like     = 'accordion';
    }

    function options() {

        $dslc_options = array(
            array(
                'label'   => __('Show On', 'dslc_string'),
                'id'      => 'css_show_on',
                'std'     => 'desktop tablet phone',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Desktop', 'dslc_string'),
                        'value' => 'desktop'
                    ),
                    array(
                        'label' => __('Tablet', 'dslc_string'),
                        'value' => 'tablet'
                    ),
                    array(
                        'label' => __('Phone', 'dslc_string'),
                        'value' => 'phone'
                    ),
                ),
            ),
            array(
                'label'             => __('Style of Pricing', 'dslc_string'),
                'id'                => 'as_style_pricing',
                'std'               => 'style_1',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'label' => __('Style 1 with button on top', 'dslc_string'),
                        'value' => 'style_1'
                    ),
                    array(
                        'label' => __('Style 2 with Button on bottom', 'dslc_string'),
                        'value' => 'style_2'
                    ),
                ),
                'refresh_on_change' => true,
            ),
            array(
                'label'      => __('(hidden) Pricing Title', 'dslc_string'),
                'id'         => 'as_pricing_title',
                'std'        => __('CLICK TO EDIT ', 'dslc_string'),
                'type'       => 'text',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            array(
                'label'      => __('(hidden) Pricing Title Decription', 'dslc_string'),
                'id'         => 'as_pricing_title_2',
                'std'        => __('Title Decription ', 'dslc_string'),
                'type'       => 'text',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            array(
                'label'      => __('(hidden) Pricing Number', 'dslc_string'),
                'id'         => 'as_pricing_number',
                'std'        => __('79', 'dslc_string'),
                'type'       => 'text',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            array(
                'label'      => __('(hidden) Accordion Nav', 'dslc_string'),
                'id'         => 'accordion_nav',
                'std'        => __('Edit left  |  Edit right', 'dslc_string'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            array(
                'label'      => __('Seperate left & right', 'dslc_string'),
                'id'         => 'seperate_nav',
                'std'        => __('|', 'dslc_string'),
                'type'       => 'text',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            /**
             * General
             */
            array(
                'label'                 => __('BG Color', 'dslc_string'),
                'id'                    => 'as_pricing_css_bg_color',
                'std'                   => '#4c5f81',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper ,.dslc-accordion-item',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'as_pricing_css_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'as_pricing_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Borders', 'dslc_string'),
                'id'                    => 'as_pricing_css_border_trbl',
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
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'dslc_string'),
                'id'                    => 'as_pricing_css_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'as_pricing_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'as_pricing_css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'as_pricing_css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            /**
             * icon
             */
            array(
                'label'             => __('Icon', 'dslc_string'),
                'id'                => 'icon_id',
                'std'               => 'gift',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Icon', 'dslc_string'),
                'include_in_preset' => false
            ),
            array(
                'label'                 => __('BG Color', 'dslc_string'),
                'id'                    => 'css_icon_bg_color',
                'std'                   => '#344157',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'dslc_string'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'dslc_string'),
                'id'                    => 'css_icon_bg_color_hover',
                'std'                   => '#000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'dslc_string'),
            ),
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'css_icon_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'dslc_string'),
            ),
            array(
                'label'                 => __('Color - Hover', 'dslc_string'),
                'id'                    => 'css_icon_color_hover',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style:hover ,dslc-icon:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'dslc_string'),
            ),
            array(
                'label'                 => __('Size ( Icon )', 'dslc_string'),
                'id'                    => 'as_css_icon_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Top', 'dslc_string'),
                'id'                    => 'css_icon_wrapper_margin_top',
                'std'                   => '-24',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'dslc_string'),
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Margin Right', 'dslc_string'),
                'id'                    => 'css_icon_margin_right',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'dslc_string'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Border Radius', 'dslc_string'),
                'id'                    => 'as_css_button_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'dslc_string'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('BG Color', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_bg_color',
                'std'                   => '#2b3d4e',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string')
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string')
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'dslc_string')
            ),
            array(
                'label'                 => __('Borders', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_border_trbl',
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
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string')
            ),
            array(
                'label'                 => __('Border Radius - Top', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_border_radius_top',
                'std'                   => '4',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string')
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_font_size',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_font_weight',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
            ),
            array(
                'label'                 => __('Line Height', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_padding_vertical',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'dslc_string')
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'dslc_string')
            ),
            array(
                'label'                 => __('Text Align', 'dslc_string'),
                'id'                    => 'as_pricing_css_title_text_align',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
            ),
            /**
             * Subtitle
             */
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'as_pricing_css_subtitle_color',
                'std'                   => '#797979',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'dslc_string')
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'as_pricing_css_subtitle_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'as_pricing_css_subtitle_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'as_pricing_css_subtitle_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'dslc_string'),
            ),
            array(
                'label'                 => __('Line Height', 'dslc_string'),
                'id'                    => 'as_pricing_css_subtitle_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'dslc_string'),
                'id'                    => 'as_pricing_css_subtitle_letter',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Top', 'dslc_string'),
                'id'                    => 'as_pricing_css_subtitle_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('subtitle', 'dslc_string'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'as_pricing_css_subtitle_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('subtitle', 'dslc_string'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'as_pricing_css_subtitle_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('subtitle', 'dslc_string'),
            ),
            array(
                'label'                 => __('Text Align', 'dslc_string'),
                'id'                    => 'as_pricing_css_subtitle_text_align',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'dslc_string'),
            ),
            /**
             * Pricing Number
             */
            array(
                'label'                 => __('Text Align', 'dslc_string'),
                'id'                    => 'as_pricing_css_number_text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number-wrapper',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'dslc_string')
            ),
            array(
                'label'             => __('Pricing Number', 'dslc_string'),
                'id'                => 'as_pricing_css_number',
                'std'               => 79,
                'refresh_on_change' => true,
                'type'              => 'text',
                'section'           => 'styling',
                'tab'               => __('pricing number', 'dslc_string')
            ),
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'as_pricing_css_number_color',
                'std'                   => '#ef3a43',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'dslc_string')
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'as_pricing_css_number_font_size',
                'std'                   => '36',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'as_pricing_css_number_font_weight',
                'std'                   => '500',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'as_pricing_css_number_font_family',
                'std'                   => 'Myriad Pro',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'dslc_string'),
            ),
            array(
                'label'                 => __('Line Height', 'dslc_string'),
                'id'                    => 'as_pricing_css_number_lheight',
                'std'                   => '46',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'as_pricing_css_number_padding_vertical',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing number', 'dslc_string'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'as_pricing_css_number_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing number', 'dslc_string'),
            ),
            /**
             * Currency
             */
            array(
                'label'             => __('Position of Currency', 'dslc_string'),
                'id'                => 'as_style_position_currency',
                'std'               => 'style_1',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'label' => __('Position top left', 'dslc_string'),
                        'value' => 'style_1'
                    ),
                    array(
                        'label' => __('Position top right', 'dslc_string'),
                        'value' => 'style_2'
                    ),
                ),
                'refresh_on_change' => true,
                'section'           => 'styling',
                'tab'               => __('pricing currency', 'dslc_string')
            ),
            array(
                'label'             => __('Pricing Currency', 'dslc_string'),
                'id'                => 'as_pricing_css_currency',
                'std'               => '$',
                'refresh_on_change' => true,
                'type'              => 'text',
                'section'           => 'styling',
                'tab'               => __('pricing currency', 'dslc_string')
            ),
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'as_pricing_css_currency_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'dslc_string')
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'as_pricing_css_currency_font_size',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'as_pricing_css_currency_font_weight',
                'std'                   => '200',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'as_pricing_css_currency_font_family',
                'std'                   => 'Myriad Pro',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'dslc_string'),
            ),
            array(
                'label'                 => __('Line Height', 'dslc_string'),
                'id'                    => 'as_pricing_css_currency_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'dslc_string'),
                'id'                    => 'as_pricing_css_currency_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'dslc_string'),
                'ext'                   => 'px'
            ),
            /**
             * Time
             */
            array(
                'label'             => __('Pricing Time', 'dslc_string'),
                'id'                => 'as_pricing_css_time',
                'std'               => 'month',
                'refresh_on_change' => true,
                'type'              => 'text',
                'section'           => 'styling',
                'tab'               => __('pricing time', 'dslc_string')
            ),
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'as_pricing_css_time_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'dslc_string')
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'as_pricing_css_time_font_size',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'as_pricing_css_time_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'as_pricing_css_time_font_family',
                'std'                   => 'Myriad Pro',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'dslc_string'),
            ),
            array(
                'label'                 => __('Line Height', 'dslc_string'),
                'id'                    => 'as_pricing_css_time_lheight',
                'std'                   => '70',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'dslc_string'),
                'id'                    => 'as_pricing_css_time_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'dslc_string'),
                'ext'                   => 'px'
            ),
            /**
             * Pricing Option
             */
            array(
                'label'                 => __('Text Align', 'dslc_string'),
                'id'                    => 'as_pricing_css_text_align_option',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string'),
            ),
            array(
                'label'                 => __('BG Color of nth-child(odd)', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_bg_color_ood',
                'std'                   => 'rgba(255, 255, 255, 0)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item:nth-child(odd)',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string'),
            ),
            array(
                'label'                 => __('BG Color of nth-child(even)', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_bg_color_even',
                'std'                   => 'rgba(250, 250, 250, 0)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item:nth-child(even)',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string'),
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_line_border_color',
                'std'                   => 'rgb(65, 87, 126)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string'),
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_line_border_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing option', 'dslc_string'),
            ),
            array(
                'label'                 => __('Borders', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_line_border_trbl',
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
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string'),
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string'),
            ),
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string')
            ),
            array(
                'label'                 => __('Color Info', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_color_2',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title_2',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string')
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size Info', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_font_size_2',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title_2',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_font_weight',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Weight Info', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_font_weight_2',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title_2',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Line Height', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_lheight',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Line Height Info', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_lheight_2',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title_2',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'dslc_string'),
                'id'                    => 'as_pricing_css_option_letter',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin bottom', 'dslc_string'),
                'id'                    => 'as_pricing_css_margin_bottom_option',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing option', 'dslc_string'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'as_pricing_css_padding_vertical_option',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing option', 'dslc_string'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'as_pricing_css_padding_horizontal_option',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing option', 'dslc_string'),
            ),
            /**
             *  Pricing Button Style
             */
            array(
                'label'      => __('Button Text', 'dslc_string'),
                'id'         => 'as_button_text',
                'std'        => 'CLICK TO EDIT',
                'type'       => 'text',
                'visibility' => 'hidden',
            ),
            array(
                'label'   => __('URL', 'dslc_string'),
                'id'      => 'as_button_url',
                'std'     => '#',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'   => __('Open in', 'dslc_string'),
                'id'      => 'as_button_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'dslc_string'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'dslc_string'),
                        'value' => '_blank',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Align', 'dslc_string'),
                'id'                    => 'as_button_css_align_position',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'                 => __('BG Color', 'dslc_string'),
                'id'                    => 'as_button_css_bg_color',
                'std'                   => 'rgba(188,7,7,0)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'dslc_string'),
                'id'                    => 'as_button_css_bg_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'as_button_css_border_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'dslc_string'),
                'id'                    => 'as_button_css_border_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'             => __('Duration when hover(ms)', 'dslc_string'),
                'id'                => 'as_button_css_duration_hover',
                'std'               => '300',
                'type'              => 'text',
                'refresh_on_change' => true,
                'section'           => 'styling',
                'tab'               => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'as_button_css_border_width',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Borders', 'dslc_string'),
                'id'                    => 'as_button_css_border_trbl',
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
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Border Radius', 'dslc_string'),
                'id'                    => 'as_button_css_border_radius',
                'std'                   => '50',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Margin Top', 'dslc_string'),
                'id'                    => 'as_button_css_margin_top',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'as_button_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'as_button_css_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'as_button_css_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Width', 'dslc_string'),
                'id'                    => 'as_button_css_width',
                'std'                   => 'inline-block',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Automatic', 'dslc_string'),
                        'value' => 'inline-block'
                    ),
                    array(
                        'label' => __('Full Width', 'dslc_string'),
                        'value' => 'block'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'display',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'dslc_string'),
            ),
            /**
             * Out line Style
             */
            array(
                'label'                 => __('Out Line Width', 'dslc_string'),
                'id'                    => 'as_button_out_line_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Offset', 'dslc_string'),
                'id'                    => 'as_button_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Color', 'dslc_string'),
                'id'                    => 'as_button_out_line_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'dslc_string'),
            ),
            array(
                'label'                 => __('Out Line Color Hover', 'dslc_string'),
                'id'                    => 'as_button_out_line_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a:hover',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'dslc_string'),
            ),
            array(
                'label'                 => __('Out Line Style', 'dslc_string'),
                'id'                    => 'as_button_out_line_style',
                'std'                   => 'solid',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Invisible', 'dslc_string'),
                        'value' => 'invisible'
                    ),
                    array(
                        'label' => __('Solid', 'dslc_string'),
                        'value' => 'solid'
                    ),
                    array(
                        'label' => __('Dashed', 'dslc_string'),
                        'value' => 'dashed'
                    ),
                    array(
                        'label' => __('Dotted', 'dslc_string'),
                        'value' => 'dotted'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-style',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'dslc_string'),
            ),
            /**
             * Typography
             */
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'as_button_css_button_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Color - Hover', 'dslc_string'),
                'id'                    => 'as_button_css_button_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'as_button_css_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'as_button_css_button_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'as_button_css_button_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Letter Spacing', 'dslc_string'),
                'id'                    => 'as_button_css_button_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'dslc_string'),
                'ext'                   => 'px'
            ),
            /*             * * 
              Responsive Tablet
             */
            array(
                'label'   => __('Responsive Styling', 'dslc_string'),
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
            array
                (
                'label'                 => __('Border Width ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Radius ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Bottom ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Size ( Icon )( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_css_icon_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-icon-style .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Top( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_icon_wrapper_margin_top',
                'std'                   => '-24',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
                'min'                   => '-100',
                'max'                   => '50'
            ),
            array
                (
                'label'                 => __('Margin Right( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_t_css_icon_margin_right',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '100'
            ),
            array
                (
                'label'                 => __('Border Radius( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_css_button_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '300'
            ),
            array
                (
                'label'                 => __('Border Width( title ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_title_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Radius - Top( title ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_title_border_radius_top',
                'std'                   => '4',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Border Radius - Bottom( title ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_title_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( title ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_title_font_size',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( title ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_title_font_weight',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title h3',
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
                'label'                 => __('Line Height( title ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_title_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Letter Spacing( title ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_title_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Bottom ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_title_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical( title ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_title_padding_vertical',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( title ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_title_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Font Weight( pricing label ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_label_css_number_font_weight',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-label span',
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
                'label'                 => __('Font Size( pricing number ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_number_font_size',
                'std'                   => '36',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( pricing number ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_number_font_weight',
                'std'                   => '500',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-number',
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
                'label'                 => __('Line Height( pricing number ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_number_lheight',
                'std'                   => '46',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Padding Vertical( pricing number ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_number_padding_vertical',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-number-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( pricing number ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_number_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-number-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Font Size( pricing currency ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_currency_font_size',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( pricing currency ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_currency_font_weight',
                'std'                   => '200',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-currency',
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
                'label'                 => __('Line Height( pricing currency ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_currency_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Letter Spacing( pricing currency ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_currency_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( pricing time ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_time_font_size',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( pricing time ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_time_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-time',
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
                'label'                 => __('Line Height( pricing time ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_time_lheight',
                'std'                   => '70',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Letter Spacing( pricing time ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_time_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Border Width( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_option_line_border_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Font Size( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_option_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_option_font_weight',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
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
                'label'                 => __('Line Height( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_option_lheight',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Letter Spacing( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_option_letter',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin bottom( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_margin_bottom_option',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_padding_vertical_option',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_pricing_css_padding_horizontal_option',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Width( pricing button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_border_width',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Radius( pricing button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_border_radius',
                'std'                   => '50',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Top( pricing button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_margin_top',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Bottom( pricing button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical( pricing button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( pricing button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Out Line Width( Out Line Style ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_out_line_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Out Line Offset( Out Line Style ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( typography button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( typography button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_button_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
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
                'label'                 => __('Letter Spacing( typography button ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_button_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            /**             * Responsive phone */
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
                'id'                    => 'css_res_p_as_pricing_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Radius ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Bottom ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Size ( Icon )( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_css_icon_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-icon-style .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Top( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_icon_wrapper_margin_top',
                'std'                   => '-24',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
                'min'                   => '-100',
                'max'                   => '50'
            ),
            array
                (
                'label'                 => __('Margin Right( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_p_css_icon_margin_right',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '100'
            ),
            array
                (
                'label'                 => __('Border Radius( Icon ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_css_button_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
                'min'                   => '0',
                'max'                   => '300'
            ),
            array
                (
                'label'                 => __('Border Width( title ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_title_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Radius - Top( title ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_title_border_radius_top',
                'std'                   => '4',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Border Radius - Bottom( title ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_title_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( title ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_title_font_size',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( title ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_title_font_weight',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title h3',
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
                'label'                 => __('Line Height( title ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_title_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Letter Spacing( title ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_title_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin Bottom ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_title_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical( title ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_title_padding_vertical',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( title ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_title_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Font Weight( pricing label ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_label_css_number_font_weight',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-label span',
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
                'label'                 => __('Font Size( pricing number ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_number_font_size',
                'std'                   => '36',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( pricing number ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_number_font_weight',
                'std'                   => '500',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-number',
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
                'label'                 => __('Line Height( pricing number ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_number_lheight',
                'std'                   => '46',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Padding Vertical( pricing number ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_number_padding_vertical',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-number-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( pricing number ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_number_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-number-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Font Size( pricing currency ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_currency_font_size',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( pricing currency ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_currency_font_weight',
                'std'                   => '200',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-currency',
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
                'label'                 => __('Line Height( pricing currency ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_currency_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Letter Spacing( pricing currency ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_currency_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( pricing time ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_time_font_size',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( pricing time ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_time_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-time',
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
                'label'                 => __('Line Height( pricing time ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_time_lheight',
                'std'                   => '70',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Letter Spacing( pricing time ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_time_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Border Width( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_option_line_border_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Font Size( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_option_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_option_font_weight',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
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
                'label'                 => __('Line Height( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_option_lheight',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Letter Spacing( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_option_letter',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Margin bottom( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_margin_bottom_option',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_padding_vertical_option',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( pricing option ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_pricing_css_padding_horizontal_option',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Width( pricing button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_border_width',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Radius( pricing button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_border_radius',
                'std'                   => '50',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Top( pricing button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_margin_top',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Bottom( pricing button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical( pricing button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( pricing button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Out Line Width( Out Line Style ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_out_line_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Out Line Offset( Out Line Style ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( typography button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( typography button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_button_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
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
                'label'                 => __('Letter Spacing( typography button ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_button_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'phone',
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

        $accordion_nav = explode('(dslc_sep)', trim($options['accordion_nav']));
        ?>
        <?php
        $style_pricing = '';
        if ($options['as_style_pricing'] == 'style_2') {
            $style_pricing = ' as-pricing-style-2';
        }
        ?>
        <div class="dslc-accordion as-pricing-wrapper as-pricing-style-3">

            <div class="as-pricing-title"><h3 class="dslca-editable-content" data-id="as_pricing_title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['as_pricing_title']); ?></h3><div class = "as-icon-style"><div class ="relative-wraper"><span class="dslc-icon dslc-icon-<?php echo esc_attr($options['icon_id']); ?>"></span></div></div>
                <div class="as-pricing-subtitle">
                    <p class="dslca-editable-content" data-id="as_pricing_title_2" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['as_pricing_title_2']); ?></p>
                </div>
            </div>
            <ul class="as-list-pricing-option-wrapper">
                <?php if (is_array($accordion_nav) && count($accordion_nav) > 0) : ?>
                    <?php
                    foreach ($accordion_nav as
                            $accordion_nav_content) :
                        ?>
                        <?php
                        $temp = explode($options['seperate_nav'], $accordion_nav_content);
                        if (count($temp) == 2) {
                            $left  = $temp[0];
                            $right = $temp[1];
                            ?>
                            <li class="dslc-accordion-item">
                                <div class="dslc-accordion-header">
                                    <?php if ($dslc_is_admin) { ?>
                                        <span class="dslc-accordion-title" contenteditable><?php echo stripslashes($left) . $options["seperate_nav"] . stripslashes($right); ?></span>	
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <span class="dslc-accordion-title" ><?php echo stripslashes($left); ?></span>	
                                        <span class="dslc-accordion-title_2"><?php echo stripslashes($right); ?></span>
                                    <?php } ?>
                                    <?php if ($dslc_is_admin) : ?>
                                        <div class="dslca-accordion-action-hooks">
                                            <span class="dslca-move-up-accordion-hook"><span class="dslca-icon dslc-icon-arrow-up"></span></span>
                                            <span class="dslca-move-down-accordion-hook"><span class="dslca-icon dslc-icon-arrow-down"></span></span>
                                            <span class="dslca-delete-accordion-hook"><span class="dslca-icon dslc-icon-remove"></span></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </li><!-- .dslc-accordion-item -->
                        <?php } ?>
                    <?php endforeach; ?>

                <?php else : ?>

                    <li class="dslc-accordion-item">
                        <div class="dslc-accordion-header">
                            <span class="dslc-accordion-title" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php _e('CLICK TO EDIT', 'dslc_string'); ?></span>
                            <?php if ($dslc_is_admin) : ?>
                                <div class="dslca-accordion-action-hooks">
                                    <span class="dslca-move-up-accordion-hook"><span class="dslca-icon dslc-icon-arrow-up"></span></span>
                                    <span class="dslca-move-down-accordion-hook"><span class="dslca-icon dslc-icon-arrow-down"></span></span>
                                    <span class="dslca-delete-accordion-hook"><span class="dslca-icon dslc-icon-remove"></span></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </li><!-- .dslc-accordion-item -->

                <?php endif; ?>
            </ul>
            <?php if ($dslc_is_admin) : ?>
                <div class="dslca-add-accordion">
                    <span class="dslca-add-accordion-hook"><span class="dslca-icon dslc-icon-plus"></span></span>
                </div>
            <?php endif; ?>
            <div class="as-pricing-number-wrapper">
                <?php if ($options['as_style_position_currency'] == 'style_1') { ?>
                    <sup class="as-pricing-currency"><?php echo esc_html($options['as_pricing_css_currency']); ?></sup>
                <?php } ?>
                <span class="as-pricing-number"><?php echo esc_html($options['as_pricing_css_number']); ?></span>
                <?php if ($options['as_style_position_currency'] == 'style_2') { ?>
                    <sup class="as-pricing-currency"><?php echo esc_html($options['as_pricing_css_currency']); ?></sup>
                <?php } ?>
                <span class="as-pricing-time"><?php echo esc_html($options['as_pricing_css_time']); ?></span>
            </div>
            <?php if ($options['as_style_pricing'] == 'style_1') { ?>
                <div class="as-button-pricing">
                    <?php
                    $duration_hover = '';
                    $value_duration = $options['as_button_css_duration_hover'];
                    if ($value_duration != '') {
                        $duration_hover = 'style="-webkit-transition: all ' . $value_duration . 'ms ease;-moz-transition: all ' . $value_duration . 'ms ease;-ms-transition: all ' . $value_duration . 'ms ease;-o-transition: all ' . $value_duration . 'ms ease;transition: all ' . $value_duration . 'ms ease;"';
                    }
                    ?>
                    <a href="<?php echo do_shortcode($options['as_button_url']); ?>" target="<?php echo esc_attr($options['as_button_target']); ?>" <?php echo $duration_hover; ?>>
                        <span class="dslca-editable-content" data-id="as_button_text"  data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['as_button_text']); ?></span>
                    </a>
                </div>
            <?php } ?>
            <?php if ($options['as_style_pricing'] == 'style_2') { ?>
                <div class="as-button-pricing">
                    <?php
                    $duration_hover = '';
                    $value_duration = $options['as_button_css_duration_hover'];
                    if ($value_duration != '') {
                        $duration_hover = 'style="-webkit-transition: all ' . $value_duration . 'ms ease;-moz-transition: all ' . $value_duration . 'ms ease;-ms-transition: all ' . $value_duration . 'ms ease;-o-transition: all ' . $value_duration . 'ms ease;transition: all ' . $value_duration . 'ms ease;"';
                    }
                    ?>
                    <a href="<?php echo do_shortcode($options['as_button_url']); ?>" target="<?php echo $options['as_button_target']; ?>" <?php echo $duration_hover; ?>>
                        <span class="dslca-editable-content" data-id="as_button_text"  data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo $options['as_button_text']; ?></span>
                    </a>
                </div>
            <?php } ?>
        </div><!-- .dslc-accordion -->

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
