<?php

class ASEX_Pricing_2 extends ASEX_MODULE {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;
    var $handle_like;

    function __construct() {

        $this->module_id       = 'ASEX_Pricing_2';
        $this->module_title    = __('Pricing Table 2', 'asex');
        $this->module_icon     = 'dollar';
        $this->module_category = 'as - Pricing';
        $this->handle_like     = 'accordion';
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
                'label'             => __('Style of Pricing', 'asex'),
                'id'                => 'asex_style_pricing',
                'std'               => 'style_2',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'label' => __('Style 1 with button on top', 'asex'),
                        'value' => 'style_1'
                    ),
                    array(
                        'label' => __('Style 2 with Button on bottom', 'asex'),
                        'value' => 'style_2'
                    ),
                ),
                'refresh_on_change' => true,
            ),
            array(
                'label'      => __('(hidden) Pricing Title', 'asex'),
                'id'         => 'asex_pricing_title',
                'std'        => __('CLICK TO EDIT', 'asex'),
                'type'       => 'text',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            array(
                'label'      => __('(hidden) Pricing Number', 'asex'),
                'id'         => 'asex_pricing_number',
                'std'        => __('79', 'asex'),
                'type'       => 'text',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            array(
                'label'      => __('(hidden) Accordion Nav', 'asex'),
                'id'         => 'accordion_nav',
                'std'        => __('CLICK TO EDIT', 'asex'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            /**
             * General
             */
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'asex_pricing_css_bg_color',
                'std'                   => '#f4f4f4',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'asex_pricing_css_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'asex_pricing_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'asex_pricing_css_border_trbl',
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
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'asex_pricing_css_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'asex_pricing_css_margin_bottom',
                'std'                   => '45',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_pricing_css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'asex_pricing_css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'asex_pricing_css_title_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex')
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'asex_pricing_css_title_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex')
            ),
            array(
                'label'                 => __('Pricing Line Bottom', 'asex'),
                'id'                    => 'asex_pricing_css_title_line_bottom_text',
                'std'                   => 'none',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Disable', 'asex'),
                        'value' => 'none',
                    ),
                    array(
                        'label' => __('Enable', 'asex'),
                        'value' => '',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-wrapper.as-pricing-style-2 .as-pricing-title h3:before,.as-pricing-wrapper.as-pricing-style-2 .as-pricing-title h3:after',
                'affect_on_change_rule' => 'content',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex')
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'asex_pricing_css_title_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'asex')
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'asex_pricing_css_title_border_trbl',
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
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex')
            ),
            array(
                'label'                 => __('Border Radius - Top', 'asex'),
                'id'                    => 'asex_pricing_css_title_border_radius_top',
                'std'                   => '4',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'asex'),
                'id'                    => 'asex_pricing_css_title_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'asex_pricing_css_title_color',
                'std'                   => '#232c3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex')
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'asex_pricing_css_title_font_size',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'asex_pricing_css_title_font_weight',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'asex_pricing_css_title_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex'),
            ),
            array(
                'label'                 => __('Margin Top', 'asex'),
                'id'                    => 'asex_pricing_css_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'asex_pricing_css_title_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'asex_pricing_css_title_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'asex_pricing_css_title_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_pricing_css_title_padding_vertical',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'asex')
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'asex_pricing_css_title_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'asex')
            ),
            array(
                'label'                 => __('Text Align', 'asex'),
                'id'                    => 'asex_pricing_css_title_text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('title', 'asex'),
            ),
            /**
             * Pricing Icon
             */
            array(
                'label'   => __('Pricing Icon', 'asex'),
                'id'      => 'asex_pricing_label',
                'std'     => 'none',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disable', 'asex'),
                        'value' => 'none',
                    ),
                    array(
                        'label' => __('Enable', 'asex'),
                        'value' => 'free_label',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('pricing icon', 'asex')
            ),
            array(
                'label'                 => __('Square Size', 'asex'),
                'id'                    => 'asex_pricing_icon_css_square_size',
                'std'                   => '60',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'styling',
                'tab'                   => __('pricing icon', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Top Icon', 'asex'),
                'id'                    => 'asex_pricing_icon_css_top',
                'std'                   => '-30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'top',
                'section'               => 'styling',
                'tab'                   => __('pricing icon', 'asex'),
                'ext'                   => 'px',
                'max'                   => 0,
                'min'                   => -100,
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'asex_pricing_icon_css_border_radius',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('pricing icon', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'             => __('Icon', 'asex'),
                'id'                => 'icon_id',
                'std'               => 'comments',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('pricing icon', 'asex'),
                'include_in_preset' => false
            ),
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'asex_pricing_icon_bg_color',
                'std'                   => '#ef3a43',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing icon', 'asex')
            ),
            array(
                'label'                 => __('Color Label', 'asex'),
                'id'                    => 'asex_pricing_label_css_number_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing icon', 'asex')
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'asex_pricing_icon_css_font_size',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing icon', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding', 'asex'),
                'id'                    => 'asex_pricing_icon_css_padding',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'padding',
                'section'               => 'styling',
                'tab'                   => __('pricing icon', 'asex'),
                'ext'                   => 'px',
            ),
            /**
             * Pricing Number
             */
            array(
                'label'                 => __('Text Align', 'asex'),
                'id'                    => 'asex_pricing_css_number_text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number-wrapper',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'asex')
            ),
            array(
                'label'                 => __('Background', 'asex'),
                'id'                    => 'asex_pricing_css_number_background',
                'std'                   => '#2f2f2f',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number-wrapper',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'asex')
            ),
            array(
                'label'             => __('Pricing Number', 'asex'),
                'id'                => 'asex_pricing_css_number',
                'std'               => 79,
                'refresh_on_change' => true,
                'type'              => 'text',
                'section'           => 'styling',
                'tab'               => __('pricing number', 'asex')
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'asex_pricing_css_number_color',
                'std'                   => '#ef3a43',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'asex')
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'asex_pricing_css_number_font_size',
                'std'                   => '36',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'asex_pricing_css_number_font_weight',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'asex_pricing_css_number_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'asex'),
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'asex_pricing_css_number_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing number', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_pricing_css_number_padding_vertical',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing number', 'asex'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'asex_pricing_css_number_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-number-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing number', 'asex'),
            ),
            /**
             * Currency
             */
            array(
                'label'             => __('Position of Currency', 'asex'),
                'id'                => 'asex_style_position_currency',
                'std'               => 'style_1',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'label' => __('Position top left', 'asex'),
                        'value' => 'style_1'
                    ),
                    array(
                        'label' => __('Position top right', 'asex'),
                        'value' => 'style_2'
                    ),
                ),
                'refresh_on_change' => true,
                'section'           => 'styling',
                'tab'               => __('pricing currency', 'asex')
            ),
            array(
                'label'             => __('Pricing Currency', 'asex'),
                'id'                => 'asex_pricing_css_currency',
                'std'               => '$',
                'refresh_on_change' => true,
                'type'              => 'text',
                'section'           => 'styling',
                'tab'               => __('pricing currency', 'asex')
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'asex_pricing_css_currency_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'asex')
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'asex_pricing_css_currency_font_size',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'asex_pricing_css_currency_font_weight',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'asex_pricing_css_currency_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'asex'),
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'asex_pricing_css_currency_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'asex_pricing_css_currency_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-currency',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('pricing currency', 'asex'),
                'ext'                   => 'px'
            ),
            /**
             * Time
             */
            array(
                'label'             => __('Pricing Time', 'asex'),
                'id'                => 'asex_pricing_css_time',
                'std'               => 'mo',
                'refresh_on_change' => true,
                'type'              => 'text',
                'section'           => 'styling',
                'tab'               => __('pricing time', 'asex')
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'asex_pricing_css_time_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'asex')
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'asex_pricing_css_time_font_size',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'asex_pricing_css_time_font_weight',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'asex_pricing_css_time_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'asex'),
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'asex_pricing_css_time_lheight',
                'std'                   => '24',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'asex_pricing_css_time_letter',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-pricing-time',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('pricing time', 'asex'),
                'ext'                   => 'px'
            ),
            /**
             * Pricing Option
             */
            array(
                'label'                 => __('Text Align', 'asex'),
                'id'                    => 'asex_pricing_css_text_align_option',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'asex'),
            ),
            array(
                'label'                 => __('BG Color of nth-child(odd)', 'asex'),
                'id'                    => 'asex_pricing_css_option_bg_color_ood',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item:nth-child(odd)',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'asex'),
            ),
            array(
                'label'                 => __('BG Color of nth-child(even)', 'asex'),
                'id'                    => 'asex_pricing_css_option_bg_color_even',
                'std'                   => '#fafafa',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item:nth-child(even)',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'asex'),
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'asex_pricing_css_option_line_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'asex'),
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'asex_pricing_css_option_line_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing option', 'asex'),
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'asex_pricing_css_option_line_border_trbl',
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
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li.dslc-accordion-item',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'asex'),
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'asex_pricing_css_option_color',
                'std'                   => '#2B3D4E',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'asex')
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'asex_pricing_css_option_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'asex_pricing_css_option_font_weight',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'asex_pricing_css_option_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'asex'),
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'asex_pricing_css_option_lheight',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'asex_pricing_css_option_letter',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('pricing option', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin bottom', 'asex'),
                'id'                    => 'asex_pricing_css_margin_bottom_option',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing option', 'asex'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_pricing_css_padding_vertical_option',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing option', 'asex'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'asex_pricing_css_padding_horizontal_option',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-list-pricing-option-wrapper li .dslc-accordion-header',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing option', 'asex'),
            ),
            /**
             *  Pricing Button Style
             */
            array(
                'label'      => __('Button Text', 'asex'),
                'id'         => 'asex_button_text',
                'std'        => 'CLICK TO EDIT',
                'type'       => 'text',
                'visibility' => 'hidden',
            ),
            array(
                'label'   => __('URL', 'asex'),
                'id'      => 'asex_button_url',
                'std'     => '#',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('pricing button', 'asex'),
            ),
            array(
                'label'   => __('Open in', 'asex'),
                'id'      => 'asex_button_target',
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
                ),
                'section' => 'styling',
                'tab'     => __('pricing button', 'asex'),
            ),
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'asex_button_css_align_position',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'asex'),
            ),
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'asex_button_css_bg_color',
                'std'                   => '#ef3a43',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'asex'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'asex'),
                'id'                    => 'asex_button_css_bg_color_hover',
                'std'                   => '#f86970',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'asex'),
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'asex_button_css_border_color',
                'std'                   => '#ef3a43',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'asex'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'asex'),
                'id'                    => 'asex_button_css_border_color_hover',
                'std'                   => '#f86970',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'asex'),
            ),
            array(
                'label'             => __('Duration when hover(ms)', 'asex'),
                'id'                => 'asex_button_css_duration_hover',
                'std'               => '300',
                'type'              => 'text',
                'refresh_on_change' => true,
                'section'           => 'styling',
                'tab'               => __('pricing button', 'asex'),
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'asex_button_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'asex'),
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'asex_button_css_border_trbl',
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
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'asex'),
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'asex_button_css_border_radius',
                'std'                   => '34',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'asex'),
            ),
            array(
                'label'                 => __('Margin Top', 'asex'),
                'id'                    => 'asex_button_css_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'asex'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'asex_button_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'asex'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_button_css_padding_vertical',
                'std'                   => '7',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'asex'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'asex_button_css_padding_horizontal',
                'std'                   => '19',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('pricing button', 'asex'),
            ),
            array(
                'label'                 => __('Width', 'asex'),
                'id'                    => 'asex_button_css_width',
                'std'                   => 'inline-block',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Automatic', 'asex'),
                        'value' => 'inline-block'
                    ),
                    array(
                        'label' => __('Full Width', 'asex'),
                        'value' => 'block'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'display',
                'section'               => 'styling',
                'tab'                   => __('pricing button', 'asex'),
            ),
            /**
             * Out line Style
             */
            array(
                'label'                 => __('Out Line Width', 'asex'),
                'id'                    => 'asex_button_out_line_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Offset', 'asex'),
                'id'                    => 'asex_button_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Color', 'asex'),
                'id'                    => 'asex_button_out_line_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'asex'),
            ),
            array(
                'label'                 => __('Out Line Color Hover', 'asex'),
                'id'                    => 'asex_button_out_line_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a:hover',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'asex'),
            ),
            array(
                'label'                 => __('Out Line Style', 'asex'),
                'id'                    => 'asex_button_out_line_style',
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
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'outline-style',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'asex'),
            ),
            /**
             * Typography
             */
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'asex_button_css_button_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'asex'),
            ),
            array(
                'label'                 => __('Color - Hover', 'asex'),
                'id'                    => 'asex_button_css_button_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'asex'),
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'asex_button_css_button_font_size',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'asex_button_css_button_font_weight',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'asex_button_css_button_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'asex'),
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'asex_button_css_button_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('typography button', 'asex'),
                'ext'                   => 'px'
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
                'label'                 => __('Border Width ', 'monalisa'),
                'id'                    => 'css_res_t_asex_pricing_css_border_width',
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
                'id'                    => 'css_res_t_asex_pricing_css_border_radius',
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
                'id'                    => 'css_res_t_asex_pricing_css_margin_bottom',
                'std'                   => '45',
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
                'id'                    => 'css_res_t_asex_pricing_css_padding_vertical',
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
                'id'                    => 'css_res_t_asex_pricing_css_padding_horizontal',
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
                'label'                 => __('Border Width( title ) ', 'monalisa'),
                'id'                    => 'css_res_t_asex_pricing_css_title_border_width',
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
                'id'                    => 'css_res_t_asex_pricing_css_title_border_radius_top',
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
                'id'                    => 'css_res_t_asex_pricing_css_title_border_radius_bottom',
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
                'id'                    => 'css_res_t_asex_pricing_css_title_font_size',
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
                'id'                    => 'css_res_t_asex_pricing_css_title_font_weight',
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
                'label'                 => __('Margin Top( title ) ', 'monalisa'),
                'id'                    => 'css_res_t_asex_pricing_css_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Line Height( title ) ', 'monalisa'),
                'id'                    => 'css_res_t_asex_pricing_css_title_lheight',
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
                'id'                    => 'css_res_t_asex_pricing_css_title_letter',
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
                'label'                 => __('Margin Bottom( title ) ', 'monalisa'),
                'id'                    => 'css_res_t_asex_pricing_css_title_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Padding Vertical( title ) ', 'monalisa'),
                'id'                    => 'css_res_t_asex_pricing_css_title_padding_vertical',
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
                'id'                    => 'css_res_t_asex_pricing_css_title_padding_horizontal',
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
                'label'                 => __('Square Size( pricing icon ) ', 'monalisa'),
                'id'                    => 'css_res_t_asex_pricing_icon_css_square_size',
                'std'                   => '60',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Top Icon( pricing icon ) ', 'monalisa'),
                'id'                    => 'css_res_t_asex_pricing_icon_css_top',
                'std'                   => '-30',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'top',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
                'max'                   => '0',
                'min'                   => '-100'
            ),
            array
                (
                'label'                 => __('Border Radius( pricing icon ) ', 'monalisa'),
                'id'                    => 'css_res_t_asex_pricing_icon_css_border_radius',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( pricing icon ) ', 'monalisa'),
                'id'                    => 'css_res_t_asex_pricing_icon_css_font_size',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Padding( pricing icon ) ', 'monalisa'),
                'id'                    => 'css_res_t_asex_pricing_icon_css_padding',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'padding',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( pricing number ) ', 'monalisa'),
                'id'                    => 'css_res_t_asex_pricing_css_number_font_size',
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
                'id'                    => 'css_res_t_asex_pricing_css_number_font_weight',
                'std'                   => '700',
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
                'id'                    => 'css_res_t_asex_pricing_css_number_lheight',
                'std'                   => '24',
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
                'id'                    => 'css_res_t_asex_pricing_css_number_padding_vertical',
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
                'id'                    => 'css_res_t_asex_pricing_css_number_padding_horizontal',
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
                'id'                    => 'css_res_t_asex_pricing_css_currency_font_size',
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
                'id'                    => 'css_res_t_asex_pricing_css_currency_font_weight',
                'std'                   => '700',
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
                'id'                    => 'css_res_t_asex_pricing_css_currency_lheight',
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
                'id'                    => 'css_res_t_asex_pricing_css_currency_letter',
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
                'id'                    => 'css_res_t_asex_pricing_css_time_font_size',
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
                'id'                    => 'css_res_t_asex_pricing_css_time_font_weight',
                'std'                   => '600',
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
                'id'                    => 'css_res_t_asex_pricing_css_time_lheight',
                'std'                   => '24',
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
                'id'                    => 'css_res_t_asex_pricing_css_time_letter',
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
                'id'                    => 'css_res_t_asex_pricing_css_option_line_border_width',
                'std'                   => '0',
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
                'id'                    => 'css_res_t_asex_pricing_css_option_font_size',
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
                'id'                    => 'css_res_t_asex_pricing_css_option_font_weight',
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
                'id'                    => 'css_res_t_asex_pricing_css_option_lheight',
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
                'id'                    => 'css_res_t_asex_pricing_css_option_letter',
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
                'id'                    => 'css_res_t_asex_pricing_css_margin_bottom_option',
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
                'id'                    => 'css_res_t_asex_pricing_css_padding_vertical_option',
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
                'id'                    => 'css_res_t_asex_pricing_css_padding_horizontal_option',
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
                'id'                    => 'css_res_t_asex_button_css_border_width',
                'std'                   => '0',
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
                'id'                    => 'css_res_t_asex_button_css_border_radius',
                'std'                   => '34',
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
                'id'                    => 'css_res_t_asex_button_css_margin_top',
                'std'                   => '0',
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
                'id'                    => 'css_res_t_asex_button_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical( pricing button ) ', 'monalisa'),
                'id'                    => 'css_res_t_asex_button_css_padding_vertical',
                'std'                   => '7',
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
                'id'                    => 'css_res_t_asex_button_css_padding_horizontal',
                'std'                   => '19',
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
                'id'                    => 'css_res_t_asex_button_out_line_width',
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
                'id'                    => 'css_res_t_asex_button_out_line_offset',
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
                'id'                    => 'css_res_t_asex_button_css_button_font_size',
                'std'                   => '16',
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
                'id'                    => 'css_res_t_asex_button_css_button_font_weight',
                'std'                   => '700',
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
                'id'                    => 'css_res_t_asex_button_css_button_letter_spacing',
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
                'id'                    => 'css_res_p_asex_pricing_css_border_width',
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
                'id'                    => 'css_res_p_asex_pricing_css_border_radius',
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
                'id'                    => 'css_res_p_asex_pricing_css_margin_bottom',
                'std'                   => '45',
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
                'id'                    => 'css_res_p_asex_pricing_css_padding_vertical',
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
                'id'                    => 'css_res_p_asex_pricing_css_padding_horizontal',
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
                'label'                 => __('Border Width( title ) ', 'monalisa'),
                'id'                    => 'css_res_p_asex_pricing_css_title_border_width',
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
                'id'                    => 'css_res_p_asex_pricing_css_title_border_radius_top',
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
                'id'                    => 'css_res_p_asex_pricing_css_title_border_radius_bottom',
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
                'id'                    => 'css_res_p_asex_pricing_css_title_font_size',
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
                'id'                    => 'css_res_p_asex_pricing_css_title_font_weight',
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
                'label'                 => __('Margin Top( title ) ', 'monalisa'),
                'id'                    => 'css_res_p_asex_pricing_css_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title h3',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Line Height( title ) ', 'monalisa'),
                'id'                    => 'css_res_p_asex_pricing_css_title_lheight',
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
                'id'                    => 'css_res_p_asex_pricing_css_title_letter',
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
                'label'                 => __('Margin Bottom( title ) ', 'monalisa'),
                'id'                    => 'css_res_p_asex_pricing_css_title_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-pricing-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Padding Vertical( title ) ', 'monalisa'),
                'id'                    => 'css_res_p_asex_pricing_css_title_padding_vertical',
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
                'id'                    => 'css_res_p_asex_pricing_css_title_padding_horizontal',
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
                'label'                 => __('Square Size( pricing icon ) ', 'monalisa'),
                'id'                    => 'css_res_p_asex_pricing_icon_css_square_size',
                'std'                   => '60',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Top Icon( pricing icon ) ', 'monalisa'),
                'id'                    => 'css_res_p_asex_pricing_icon_css_top',
                'std'                   => '-30',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'top',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
                'max'                   => '0',
                'min'                   => '-100'
            ),
            array
                (
                'label'                 => __('Border Radius( pricing icon ) ', 'monalisa'),
                'id'                    => 'css_res_p_asex_pricing_icon_css_border_radius',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( pricing icon ) ', 'monalisa'),
                'id'                    => 'css_res_p_asex_pricing_icon_css_font_size',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Padding( pricing icon ) ', 'monalisa'),
                'id'                    => 'css_res_p_asex_pricing_icon_css_padding',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.dslc-icon',
                'affect_on_change_rule' => 'padding',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( pricing number ) ', 'monalisa'),
                'id'                    => 'css_res_p_asex_pricing_css_number_font_size',
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
                'id'                    => 'css_res_p_asex_pricing_css_number_font_weight',
                'std'                   => '700',
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
                'id'                    => 'css_res_p_asex_pricing_css_number_lheight',
                'std'                   => '24',
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
                'id'                    => 'css_res_p_asex_pricing_css_number_padding_vertical',
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
                'id'                    => 'css_res_p_asex_pricing_css_number_padding_horizontal',
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
                'id'                    => 'css_res_p_asex_pricing_css_currency_font_size',
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
                'id'                    => 'css_res_p_asex_pricing_css_currency_font_weight',
                'std'                   => '700',
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
                'id'                    => 'css_res_p_asex_pricing_css_currency_lheight',
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
                'id'                    => 'css_res_p_asex_pricing_css_currency_letter',
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
                'id'                    => 'css_res_p_asex_pricing_css_time_font_size',
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
                'id'                    => 'css_res_p_asex_pricing_css_time_font_weight',
                'std'                   => '600',
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
                'id'                    => 'css_res_p_asex_pricing_css_time_lheight',
                'std'                   => '24',
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
                'id'                    => 'css_res_p_asex_pricing_css_time_letter',
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
                'id'                    => 'css_res_p_asex_pricing_css_option_line_border_width',
                'std'                   => '0',
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
                'id'                    => 'css_res_p_asex_pricing_css_option_font_size',
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
                'id'                    => 'css_res_p_asex_pricing_css_option_font_weight',
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
                'id'                    => 'css_res_p_asex_pricing_css_option_lheight',
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
                'id'                    => 'css_res_p_asex_pricing_css_option_letter',
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
                'id'                    => 'css_res_p_asex_pricing_css_margin_bottom_option',
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
                'id'                    => 'css_res_p_asex_pricing_css_padding_vertical_option',
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
                'id'                    => 'css_res_p_asex_pricing_css_padding_horizontal_option',
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
                'id'                    => 'css_res_p_asex_button_css_border_width',
                'std'                   => '0',
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
                'id'                    => 'css_res_p_asex_button_css_border_radius',
                'std'                   => '34',
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
                'id'                    => 'css_res_p_asex_button_css_margin_top',
                'std'                   => '0',
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
                'id'                    => 'css_res_p_asex_button_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical( pricing button ) ', 'monalisa'),
                'id'                    => 'css_res_p_asex_button_css_padding_vertical',
                'std'                   => '7',
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
                'id'                    => 'css_res_p_asex_button_css_padding_horizontal',
                'std'                   => '19',
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
                'id'                    => 'css_res_p_asex_button_out_line_width',
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
                'id'                    => 'css_res_p_asex_button_out_line_offset',
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
                'id'                    => 'css_res_p_asex_button_css_button_font_size',
                'std'                   => '16',
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
                'id'                    => 'css_res_p_asex_button_css_button_font_weight',
                'std'                   => '700',
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
                'id'                    => 'css_res_p_asex_button_css_button_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-pricing a',
                'affect_on_change_rule' => 'letter-spacing',
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

        $accordion_nav = explode('(dslc_sep)', trim($options['accordion_nav']));
        ?>
        <?php
        $style_pricing = '';
        if ($options['asex_style_pricing'] == 'style_2') {
            $style_pricing = ' as-pricing-style-2';
        }
        ?>
        <div class="dslc-accordion as-pricing-wrapper as-no-hidden as-pricing-style-2">
            <?php if ($options['asex_pricing_label'] != 'none') { ?>
                <div class="dslc-info-box-icon">
                    <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['icon_id']); ?>"></span>
                </div>
            <?php } ?>

            <div class="as-pricing-title"><h3 class="dslca-editable-content" data-id="asex_pricing_title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['asex_pricing_title']); ?></h3></div>
            <div class="as-pricing-number-wrapper">
                <?php if ($options['asex_style_position_currency'] == 'style_1') { ?>
                    <sup class="as-pricing-currency"><?php echo esc_html($options['asex_pricing_css_currency']); ?></sup>
                <?php } ?>
                <span class="as-pricing-number"><?php echo esc_html($options['asex_pricing_css_number']); ?></span>
                <?php if ($options['asex_style_position_currency'] == 'style_2') { ?>
                    <sup class="as-pricing-currency"><?php echo esc_html($options['asex_pricing_css_currency']); ?></sup>
                <?php } ?>
                <span class="as-pricing-time"><?php echo esc_html($options['asex_pricing_css_time']); ?></span>
            </div>
            <?php if ($options['asex_style_pricing'] == 'style_1') { ?>
                <div class="as-button-pricing">
                    <?php
                    $duration_hover = '';
                    $value_duration = $options['asex_button_css_duration_hover'];
                    if ($value_duration != '') {
                        $duration_hover = 'style="-webkit-transition: all ' . $value_duration . 'ms ease;-moz-transition: all ' . $value_duration . 'ms ease;-ms-transition: all ' . $value_duration . 'ms ease;-o-transition: all ' . $value_duration . 'ms ease;transition: all ' . $value_duration . 'ms ease;"';
                    }
                    ?>
                    <a href="<?php echo do_shortcode($options['asex_button_url']); ?>" target="<?php echo esc_attr($options['asex_button_target']); ?>" <?php echo $duration_hover; ?>>
                        <span class="dslca-editable-content" data-id="asex_button_text"  data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['asex_button_text']); ?></span>
                    </a>
                </div>
            <?php } ?>
            <ul class="as-list-pricing-option-wrapper">
                <?php if (is_array($accordion_nav) && count($accordion_nav) > 0) : ?>
                    <?php
                    foreach ($accordion_nav as
                            $accordion_nav_content) :
                        ?>

                        <li class="dslc-accordion-item">
                            <div class="dslc-accordion-header">
                                <span class="dslc-accordion-title" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo stripslashes($accordion_nav_content); ?></span>
                                <?php if ($dslc_is_admin) : ?>
                                    <div class="dslca-accordion-action-hooks">
                                        <span class="dslca-move-up-accordion-hook"><span class="dslca-icon dslc-icon-arrow-up"></span></span>
                                        <span class="dslca-move-down-accordion-hook"><span class="dslca-icon dslc-icon-arrow-down"></span></span>
                                        <span class="dslca-delete-accordion-hook"><span class="dslca-icon dslc-icon-remove"></span></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </li><!-- .dslc-accordion-item -->

                    <?php endforeach; ?>

                <?php else : ?>

                    <li class="dslc-accordion-item">
                        <div class="dslc-accordion-header">
                            <span class="dslc-accordion-title" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php _e('CLICK TO EDIT', 'asex'); ?></span>
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
            <?php if ($options['asex_style_pricing'] == 'style_2') { ?>
                <div class="as-button-pricing">
                    <?php
                    $duration_hover = '';
                    $value_duration = $options['asex_button_css_duration_hover'];
                    if ($value_duration != '') {
                        $duration_hover = 'style="-webkit-transition: all ' . $value_duration . 'ms ease;-moz-transition: all ' . $value_duration . 'ms ease;-ms-transition: all ' . $value_duration . 'ms ease;-o-transition: all ' . $value_duration . 'ms ease;transition: all ' . $value_duration . 'ms ease;"';
                    }
                    ?>
                    <a href="<?php echo do_shortcode($options['asex_button_url']); ?>" target="<?php echo esc_attr($options['asex_button_target']); ?>" <?php echo $duration_hover; ?>>
                        <span class="dslca-editable-content" data-id="asex_button_text"  data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['asex_button_text']); ?></span>
                    </a>
                </div>
            <?php } ?>
        </div><!-- .dslc-accordion -->

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
