<?php

class AS_Pricing_3 extends as_module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;
    var $handle_like;

    function __construct() {

        $this->module_id       = 'AS_Pricing_3';
        $this->module_title    = __('Pricing 3', 'as_extension');
        $this->module_icon     = 'dollar';
        $this->module_category = 'as - Pricing';
        $this->handle_like     = 'accordion';
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
                'label'      => __('(hidden) Pricing Title', 'as_extension'),
                'id'         => 'as_pricing_title',
                'std'        => __('CLICK TO EDIT ', 'as_extension'),
                'type'       => 'text',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            array(
                'label'      => __('(hidden) Pricing Title Decription', 'as_extension'),
                'id'         => 'as_pricing_title_2',
                'std'        => __('Title Decription ', 'as_extension'),
                'type'       => 'text',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            array(
                'label'      => __('(hidden) Pricing Number', 'as_extension'),
                'id'         => 'as_pricing_number',
                'std'        => __('79', 'as_extension'),
                'type'       => 'text',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            array(
                'label'      => __('(hidden) Accordion Nav', 'as_extension'),
                'id'         => 'accordion_nav',
                'std'        => __('Edit left  |  Edit right', 'as_extension'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            array(
                'label'      => __('Seperate left & right', 'as_extension'),
                'id'         => 'seperate_nav',
                'std'        => __('|', 'as_extension'),
                'type'       => 'text',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            /**
             * General
             */
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'as_pricing_css_bg_color',
                'std'                   => '#4c5f81',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper ,.dslc-accordion-item',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'as_extension'),
                'id'                    => 'as_pricing_css_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'as_extension'),
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
                'label'                 => __('Borders', 'as_extension'),
                'id'                    => 'as_pricing_css_border_trbl',
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
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'as_extension'),
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
                'label'                 => __('Margin Bottom', 'as_extension'),
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
                'label'                 => __('Padding Vertical', 'as_extension'),
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
                'label'                 => __('Padding Horizontal', 'as_extension'),
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
                'label'             => __('Icon', 'as_extension'),
                'id'                => 'icon_id',
                'std'               => 'gift',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Icon', 'as_extension'),
                'include_in_preset' => false
            ),
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'css_icon_bg_color',
                'std'                   => '#344157',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'as_extension'),
                'id'                    => 'css_icon_bg_color_hover',
                'std'                   => '#000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_icon_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
            ),
            array(
                'label'                 => __('Color - Hover', 'as_extension'),
                'id'                    => 'css_icon_color_hover',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style:hover ,dslc-icon:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
            ),
            array(
                'label'                 => __('Size ( Icon )', 'as_extension'),
                'id'                    => 'as_css_icon_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Top', 'as_extension'),
                'id'                    => 'css_icon_wrapper_margin_top',
                'std'                   => '-24',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Margin Right', 'as_extension'),
                'id'                    => 'css_icon_margin_right',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Border Radius', 'as_extension'),
                'id'                    => 'as_css_button_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-icon-style',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'as_pricing_css_title_bg_color',
                'std'                   => '#2b3d4e',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('title', 'as_extension')
            ),
            array(
                'label'                 => __('Border Color', 'as_extension'),
                'id'                    => 'as_pricing_css_title_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('title', 'as_extension')
            ),
            array(
                'label'                 => __('Border Width', 'as_extension'),
                'id'                    => 'as_pricing_css_title_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'as_extension')
            ),
            array(
                'label'                 => __('Borders', 'as_extension'),
                'id'                    => 'as_pricing_css_title_border_trbl',
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
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('title', 'as_extension')
            ),
            array(
                'label'                 => __('Border Radius - Top', 'as_extension'),
                'id'                    => 'as_pricing_css_title_border_radius_top',
                'std'                   => '4',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'tab'                   => __('title', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'as_extension'),
                'id'                    => 'as_pricing_css_title_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'tab'                   => __('title', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'as_pricing_css_title_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('title', 'as_extension')
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'as_pricing_css_title_font_size',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('title', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'as_pricing_css_title_font_weight',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('title', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'as_pricing_css_title_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('title', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'as_pricing_css_title_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('title', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'as_extension'),
                'id'                    => 'as_pricing_css_title_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('title', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'as_pricing_css_title_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('title', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'as_pricing_css_title_padding_vertical',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'as_extension')
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'as_pricing_css_title_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'as_extension')
            ),
            array(
                'label'                 => __('Text Align', 'as_extension'),
                'id'                    => 'as_pricing_css_title_text_align',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('title', 'as_extension'),
            ),
            /**
             * Subtitle
             */
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'as_pricing_css_subtitle_color',
                'std'                   => '#797979',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'as_extension')
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'as_pricing_css_subtitle_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'as_pricing_css_subtitle_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'as_pricing_css_subtitle_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'as_pricing_css_subtitle_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'as_extension'),
                'id'                    => 'as_pricing_css_subtitle_letter',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Top', 'as_extension'),
                'id'                    => 'as_pricing_css_subtitle_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('subtitle', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'as_pricing_css_subtitle_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('subtitle', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'as_pricing_css_subtitle_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('subtitle', 'as_extension'),
            ),
            array(
                'label'                 => __('Text Align', 'as_extension'),
                'id'                    => 'as_pricing_css_subtitle_text_align',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-subtitle p',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('subtitle', 'as_extension'),
            ),
            /**
             * Pricing Number
             */
            array(
                'label'             => __('Pricing Number', 'as_extension'),
                'id'                => 'as_pricing_css_number',
                'std'               => 79,
                'refresh_on_change' => true,
                'type'              => 'text',
                'section'           => 'styling',
                'tab'               => __('pricing number', 'as_extension')
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'as_pricing_css_number_color',
                'std'                   => '#ef3a43',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'as_extension')
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'as_pricing_css_number_font_size',
                'std'                   => '36',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'as_pricing_css_number_font_weight',
                'std'                   => '500',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'as_pricing_css_number_font_family',
                'std'                   => 'Myriad Pro',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'as_pricing_css_number_lheight',
                'std'                   => '46',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'as_pricing_css_number_padding_vertical',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing number', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'as_pricing_css_number_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing number', 'as_extension'),
            ),
            /**
             * Currency
             */
            array(
                'label'             => __('Position of Currency', 'as_extension'),
                'id'                => 'as_style_position_currency',
                'std'               => 'style_1',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'label' => __('Position top left', 'as_extension'),
                        'value' => 'style_1'
                    ),
                    array(
                        'label' => __('Position top right', 'as_extension'),
                        'value' => 'style_2'
                    ),
                ),
                'refresh_on_change' => true,
                'section'           => 'styling',
                'tab'               => __('pricing currency', 'as_extension')
            ),
            array(
                'label'             => __('Pricing Currency', 'as_extension'),
                'id'                => 'as_pricing_css_currency',
                'std'               => '$',
                'refresh_on_change' => true,
                'type'              => 'text',
                'section'           => 'styling',
                'tab'               => __('pricing currency', 'as_extension')
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'as_pricing_css_currency_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'as_extension')
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'as_pricing_css_currency_font_size',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'as_pricing_css_currency_font_weight',
                'std'                   => '200',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'as_pricing_css_currency_font_family',
                'std'                   => 'Myriad Pro',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'as_pricing_css_currency_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'as_extension'),
                'id'                    => 'as_pricing_css_currency_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'as_extension'),
                'ext'                   => 'px'
            ),
            /**
             * Time
             */
            array(
                'label'             => __('Pricing Time', 'as_extension'),
                'id'                => 'as_pricing_css_time',
                'std'               => 'month',
                'refresh_on_change' => true,
                'type'              => 'text',
                'section'           => 'styling',
                'tab'               => __('pricing time', 'as_extension')
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'as_pricing_css_time_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'as_extension')
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'as_pricing_css_time_font_size',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'as_pricing_css_time_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'as_pricing_css_time_font_family',
                'std'                   => 'Myriad Pro',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'as_pricing_css_time_lheight',
                'std'                   => '70',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'as_extension'),
                'id'                    => 'as_pricing_css_time_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'as_extension'),
                'ext'                   => 'px'
            ),
            /**
             * Pricing Option
             */
            array(
                'label'                 => __('BG Color of nth-child(odd)', 'as_extension'),
                'id'                    => 'as_pricing_css_option_bg_color_ood',
                'std'                   => 'rgba(255, 255, 255, 0)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item:nth-child(odd)',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension'),
            ),
            array(
                'label'                 => __('BG Color of nth-child(even)', 'as_extension'),
                'id'                    => 'as_pricing_css_option_bg_color_even',
                'std'                   => 'rgba(250, 250, 250, 0)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item:nth-child(even)',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Color', 'as_extension'),
                'id'                    => 'as_pricing_css_option_line_border_color',
                'std'                   => 'rgb(65, 87, 126)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Width', 'as_extension'),
                'id'                    => 'as_pricing_css_option_line_border_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing option', 'as_extension'),
            ),
            array(
                'label'                 => __('Borders', 'as_extension'),
                'id'                    => 'as_pricing_css_option_line_border_trbl',
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
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'as_pricing_css_option_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension'),
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'as_pricing_css_option_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension')
            ),
            array(
                'label'                 => __('Color Info', 'as_extension'),
                'id'                    => 'as_pricing_css_option_color_2',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title_2',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension')
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'as_pricing_css_option_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size Info', 'as_extension'),
                'id'                    => 'as_pricing_css_option_font_size_2',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title_2',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'as_pricing_css_option_font_weight',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Weight Info', 'as_extension'),
                'id'                    => 'as_pricing_css_option_font_weight_2',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title_2',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'as_pricing_css_option_lheight',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Line Height Info', 'as_extension'),
                'id'                    => 'as_pricing_css_option_lheight_2',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title_2',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'as_extension'),
                'id'                    => 'as_pricing_css_option_letter',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin bottom', 'as_extension'),
                'id'                    => 'as_pricing_css_margin_bottom_option',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing option', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'as_pricing_css_padding_vertical_option',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing option', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'as_pricing_css_padding_horizontal_option',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing option', 'as_extension'),
            ),
            /**
             *  Pricing Button Style
             */
            array(
                'label'      => __('Button Text', 'as_extension'),
                'id'         => 'as_button_text',
                'std'        => __('CLICK TO EDIT','monalisa'),
                'type'       => 'text',
                'visibility' => 'hidden',
            ),
            array(
                'label'   => __('URL', 'as_extension'),
                'id'      => 'as_button_url',
                'std'     => '#',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('pricing button', 'as_extension'),
            ),
            array(
                'label'   => __('Open in', 'as_extension'),
                'id'      => 'as_button_target',
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
                ),
                'section' => 'styling',
                'tab'     => __('pricing button', 'as_extension'),
            ),
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'as_button_css_bg_color',
                'std'                   => 'rgba(188,7,7,0)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'as_extension'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'as_extension'),
                'id'                    => 'as_button_css_bg_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Color', 'as_extension'),
                'id'                    => 'as_button_css_border_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'as_extension'),
                'id'                    => 'as_button_css_border_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'as_extension'),
            ),
            array(
                'label'             => __('Duration when hover(ms)', 'as_extension'),
                'id'                => 'as_button_css_duration_hover',
                'std'               => '300',
                'type'              => 'text',
                'refresh_on_change' => true,
                'section'           => 'styling',
                'tab'               => __('pricing button', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Width', 'as_extension'),
                'id'                    => 'as_button_css_border_width',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'as_extension'),
            ),
            array(
                'label'                 => __('Borders', 'as_extension'),
                'id'                    => 'as_button_css_border_trbl',
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
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Radius', 'as_extension'),
                'id'                    => 'as_button_css_border_radius',
                'std'                   => '50',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'as_extension'),
            ),
            array(
                'label'                 => __('Margin Top', 'as_extension'),
                'id'                    => 'as_button_css_margin_top',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'as_extension'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'as_button_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'as_button_css_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'as_button_css_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'as_extension'),
            ),
            /**
             * Out line Style
             */
            array(
                'label'                 => __('Out Line Width', 'as_extension'),
                'id'                    => 'as_button_out_line_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Offset', 'as_extension'),
                'id'                    => 'as_button_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Color', 'as_extension'),
                'id'                    => 'as_button_out_line_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'as_extension'),
            ),
            array(
                'label'                 => __('Out Line Color Hover', 'as_extension'),
                'id'                    => 'as_button_out_line_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a:hover',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'as_extension'),
            ),
            array(
                'label'                 => __('Out Line Style', 'as_extension'),
                'id'                    => 'as_button_out_line_style',
                'std'                   => 'solid',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Invisible', 'as_extension'),
                        'value' => 'invisible'
                    ),
                    array(
                        'label' => __('Solid', 'as_extension'),
                        'value' => 'solid'
                    ),
                    array(
                        'label' => __('Dashed', 'as_extension'),
                        'value' => 'dashed'
                    ),
                    array(
                        'label' => __('Dotted', 'as_extension'),
                        'value' => 'dotted'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-style',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'as_extension'),
            ),
            /**
             * Typography
             */
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'as_button_css_button_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'as_extension'),
            ),
            array(
                'label'                 => __('Color - Hover', 'as_extension'),
                'id'                    => 'as_button_css_button_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'as_button_css_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'as_button_css_button_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'as_button_css_button_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'as_extension'),
            ),
            array(
                'label'                 => __('Letter Spacing', 'as_extension'),
                'id'                    => 'as_button_css_button_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'as_extension'),
                'ext'                   => 'px'
            ),
            /*             * * 
              Responsive Tablet
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
                'label'                 => __('Border Width ', 'monalisa'),
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
                'label'                 => __('Border Radius ', 'monalisa'),
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
                'label'                 => __('Margin Bottom ', 'monalisa'),
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
                'label'                 => __('Padding Vertical ', 'monalisa'),
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
                'label'                 => __('Padding Horizontal ', 'monalisa'),
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
                'label'                 => __('Size ( Icon )( Icon ) ', 'monalisa'),
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
                'label'                 => __('Margin Top( Icon ) ', 'monalisa'),
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
                'label'                 => __('Margin Right( Icon ) ', 'monalisa'),
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
                'label'                 => __('Border Radius( Icon ) ', 'monalisa'),
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
                'label'                 => __('Border Width( title ) ', 'monalisa'),
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
                'label'                 => __('Border Radius - Top( title ) ', 'monalisa'),
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
                'label'                 => __('Border Radius - Bottom( title ) ', 'monalisa'),
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
                'label'                 => __('Font Size( title ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( title ) ', 'monalisa'),
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
                'label'                 => __('Line Height( title ) ', 'monalisa'),
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
                'label'                 => __('Letter Spacing( title ) ', 'monalisa'),
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
                'label'                 => __('Margin Bottom ', 'monalisa'),
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
                'label'                 => __('Padding Vertical( title ) ', 'monalisa'),
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
                'label'                 => __('Padding Horizontal( title ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( pricing label ) ', 'monalisa'),
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
                'label'                 => __('Font Size( pricing number ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( pricing number ) ', 'monalisa'),
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
                'label'                 => __('Line Height( pricing number ) ', 'monalisa'),
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
                'label'                 => __('Padding Vertical( pricing number ) ', 'monalisa'),
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
                'label'                 => __('Padding Horizontal( pricing number ) ', 'monalisa'),
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
                'label'                 => __('Font Size( pricing currency ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( pricing currency ) ', 'monalisa'),
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
                'label'                 => __('Line Height( pricing currency ) ', 'monalisa'),
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
                'label'                 => __('Letter Spacing( pricing currency ) ', 'monalisa'),
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
                'label'                 => __('Font Size( pricing time ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( pricing time ) ', 'monalisa'),
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
                'label'                 => __('Line Height( pricing time ) ', 'monalisa'),
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
                'label'                 => __('Letter Spacing( pricing time ) ', 'monalisa'),
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
                'label'                 => __('Border Width( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Font Size( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Line Height( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Letter Spacing( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Margin bottom( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Padding Vertical( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Padding Horizontal( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Border Width( pricing button ) ', 'monalisa'),
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
                'label'                 => __('Border Radius( pricing button ) ', 'monalisa'),
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
                'label'                 => __('Margin Top( pricing button ) ', 'monalisa'),
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
                'label'                 => __('Margin Bottom( pricing button ) ', 'monalisa'),
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
                'label'                 => __('Padding Vertical( pricing button ) ', 'monalisa'),
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
                'label'                 => __('Padding Horizontal( pricing button ) ', 'monalisa'),
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
                'label'                 => __('Out Line Width( Out Line Style ) ', 'monalisa'),
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
                'label'                 => __('Out Line Offset( Out Line Style ) ', 'monalisa'),
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
                'label'                 => __('Font Size( typography button ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( typography button ) ', 'monalisa'),
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
                'label'                 => __('Letter Spacing( typography button ) ', 'monalisa'),
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
                'label'                 => __('Border Width ', 'monalisa'),
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
                'label'                 => __('Border Radius ', 'monalisa'),
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
                'label'                 => __('Margin Bottom ', 'monalisa'),
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
                'label'                 => __('Padding Vertical ', 'monalisa'),
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
                'label'                 => __('Padding Horizontal ', 'monalisa'),
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
                'label'                 => __('Size ( Icon )( Icon ) ', 'monalisa'),
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
                'label'                 => __('Margin Top( Icon ) ', 'monalisa'),
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
                'label'                 => __('Margin Right( Icon ) ', 'monalisa'),
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
                'label'                 => __('Border Radius( Icon ) ', 'monalisa'),
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
                'label'                 => __('Border Width( title ) ', 'monalisa'),
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
                'label'                 => __('Border Radius - Top( title ) ', 'monalisa'),
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
                'label'                 => __('Border Radius - Bottom( title ) ', 'monalisa'),
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
                'label'                 => __('Font Size( title ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( title ) ', 'monalisa'),
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
                'label'                 => __('Line Height( title ) ', 'monalisa'),
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
                'label'                 => __('Letter Spacing( title ) ', 'monalisa'),
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
                'label'                 => __('Margin Bottom ', 'monalisa'),
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
                'label'                 => __('Padding Vertical( title ) ', 'monalisa'),
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
                'label'                 => __('Padding Horizontal( title ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( pricing label ) ', 'monalisa'),
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
                'label'                 => __('Font Size( pricing number ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( pricing number ) ', 'monalisa'),
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
                'label'                 => __('Line Height( pricing number ) ', 'monalisa'),
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
                'label'                 => __('Padding Vertical( pricing number ) ', 'monalisa'),
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
                'label'                 => __('Padding Horizontal( pricing number ) ', 'monalisa'),
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
                'label'                 => __('Font Size( pricing currency ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( pricing currency ) ', 'monalisa'),
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
                'label'                 => __('Line Height( pricing currency ) ', 'monalisa'),
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
                'label'                 => __('Letter Spacing( pricing currency ) ', 'monalisa'),
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
                'label'                 => __('Font Size( pricing time ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( pricing time ) ', 'monalisa'),
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
                'label'                 => __('Line Height( pricing time ) ', 'monalisa'),
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
                'label'                 => __('Letter Spacing( pricing time ) ', 'monalisa'),
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
                'label'                 => __('Border Width( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Font Size( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Line Height( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Letter Spacing( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Margin bottom( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Padding Vertical( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Padding Horizontal( pricing option ) ', 'monalisa'),
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
                'label'                 => __('Border Width( pricing button ) ', 'monalisa'),
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
                'label'                 => __('Border Radius( pricing button ) ', 'monalisa'),
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
                'label'                 => __('Margin Top( pricing button ) ', 'monalisa'),
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
                'label'                 => __('Margin Bottom( pricing button ) ', 'monalisa'),
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
                'label'                 => __('Padding Vertical( pricing button ) ', 'monalisa'),
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
                'label'                 => __('Padding Horizontal( pricing button ) ', 'monalisa'),
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
                'label'                 => __('Out Line Width( Out Line Style ) ', 'monalisa'),
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
                'label'                 => __('Out Line Offset( Out Line Style ) ', 'monalisa'),
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
                'label'                 => __('Font Size( typography button ) ', 'monalisa'),
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
                'label'                 => __('Font Weight( typography button ) ', 'monalisa'),
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
                'label'                 => __('Letter Spacing( typography button ) ', 'monalisa'),
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
                                    <div class="clearfix"></div>
                                </div>
                            </li><!-- .dslc-accordion-item -->
                        <?php } ?>
                    <?php endforeach; ?>

                <?php else : ?>

                    <li class="dslc-accordion-item">
                        <div class="dslc-accordion-header">
                            <span class="dslc-accordion-title" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php _e('CLICK TO EDIT', 'as_extension'); ?></span>
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
        </div><!-- .dslc-accordion -->

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
