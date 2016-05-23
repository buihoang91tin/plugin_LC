<?php

class ASEX_Accordion extends ASEX_MODULE
{

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;
    var $handle_like;

    function __construct()
    {

        $this->module_id       = 'ASEX_Accordion';
        $this->module_title    = __('AS - Accordion', 'monalisa');
        $this->module_icon     = 'reorder';
        $this->module_category = 'as - element';
        $this->handle_like     = 'accordion';
    }

    function options()
    {

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
                'label'      => __('(hidden) Accordion Content', 'monalisa'),
                'id'         => 'functionnaly_hidden_content',
                'std'        => '',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            array(
                'label'      => __('(hidden) Accordion Nav', 'monalisa'),
                'id'         => 'functionnaly_hidden_nav',
                'std'        => '',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling',
            ),
            array(
                'label' => __('Open by default', 'monalisa'),
                'id'    => 'functionnaly_open_by_default',
                'std'   => '1',
                'type'  => 'text',
            ),
            /**
             * General
             */
            array(
                'label'                 => __('BG Color', 'monalisa'),
                'id'                    => 'general_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'monalisa'),
                'id'                    => 'general_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'monalisa'),
                'id'                    => 'general_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Borders', 'monalisa'),
                'id'                    => 'general_border_trbl',
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
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Margin Bottom', 'monalisa'),
                'id'                    => 'general_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Minimum Height', 'monalisa'),
                'id'                    => 'general_minium_height',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'min-height',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 1000,
                'increment'             => 5
            ),
            array(
                'label'                 => __('Padding Vertical', 'monalisa'),
                'id'                    => 'general_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'monalisa'),
                'id'                    => 'general_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Spacing', 'monalisa'),
                'id'                    => 'general_spacing',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-item',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => -5
            ),
            /**
             * Header
             */
            array(
                'label'                 => __('BG Color', 'monalisa'),
                'id'                    => 'header_header_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('header', 'monalisa')
            ),
            array(
                'label'                 => __('BG Color (Active)', 'monalisa'),
                'id'                    => 'header_bg_color_active',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-active .as-accordion-header-color',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('header', 'monalisa')
            ),
            array(
                'label'                 => __('Color Icon', 'monalisa'),
                'id'                    => 'header_color_icon',
                'std'                   => 'rgb(0, 0, 0)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-accordion-header-color .as-icon-arrow.dslc-icon-angle-down',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('header', 'monalisa')
            ),
            array(
                'label'                 => __('Color Icon ( Active )', 'monalisa'),
                'id'                    => 'header_color_icon_active',
                'std'                   => 'rgb(43, 243, 4)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-active .as-accordion-header-color .as-icon-arrow.dslc-icon-angle-down',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('header', 'monalisa')
            ),
            array(
                'label'                 => __('Border Color', 'monalisa'),
                'id'                    => 'header_border_color',
                'std'                   => '#e8e8e8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('header', 'monalisa')
            ),
            array(
                'label'                 => __('Border Width', 'monalisa'),
                'id'                    => 'header_border_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('header', 'monalisa')
            ),
            array(
                'label'                 => __('Borders', 'monalisa'),
                'id'                    => 'header_border_trbl',
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
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('header', 'monalisa')
            ),
            array(
                'label'                 => __('Margin Bottom', 'monalisa'),
                'id'                    => 'header_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('header', 'monalisa')
            ),
            array(
                'label'                 => __('Padding Vertical', 'monalisa'),
                'id'                    => 'header_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('header', 'monalisa')
            ),
            array(
                'label'                 => __('Padding Horizontal', 'monalisa'),
                'id'                    => 'header_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('header', 'monalisa')
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('BG Color', 'monalisa'),
                'id'                    => 'title_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('title', 'monalisa')
            ),
            array(
                'label'                 => __('Border Color', 'monalisa'),
                'id'                    => 'title_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('title', 'monalisa')
            ),
            array(
                'label'                 => __('Border Color ( Active )', 'monalisa'),
                'id'                    => 'title_border_color_active',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-active .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('title', 'monalisa')
            ),
            array(
                'label'                 => __('Border Width', 'monalisa'),
                'id'                    => 'title_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'monalisa')
            ),
            array(
                'label'                 => __('Borders', 'monalisa'),
                'id'                    => 'title_border_trbl',
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
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('title', 'monalisa')
            ),
            array(
                'label'                 => __('Color', 'monalisa'),
                'id'                    => 'title_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('title', 'monalisa')
            ),
            array(
                'label'                 => __('Color ( Active )', 'monalisa'),
                'id'                    => 'title_color_acive',
                'std'                   => 'rgb(43, 243, 4)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-active .dslc-accordion-header .dslc-accordion-title',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('title', 'monalisa')
            ),
            array(
                'label'                 => __('Font Size', 'monalisa'),
                'id'                    => 'title_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('title', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'monalisa'),
                'id'                    => 'title_font_weight',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('title', 'monalisa'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'monalisa'),
                'id'                    => 'title_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('title', 'monalisa'),
            ),
            array(
                'label'                 => __('Line Height', 'monalisa'),
                'id'                    => 'title_line_height',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('title', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'monalisa'),
                'id'                    => 'title_padding_vertical',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'monalisa')
            ),
            array(
                'label'                 => __('Padding Horizontal', 'monalisa'),
                'id'                    => 'title_padding_horizontal',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'monalisa')
            ),
            array(
                'label'                 => __('Text Align', 'monalisa'),
                'id'                    => 'title_text_align',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('title', 'monalisa'),
            ),
            /**
             * Content
             */
            array(
                'label'                 => __('BG Color', 'monalisa'),
                'id'                    => 'content_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('content', 'monalisa')
            ),
            array(
                'label'                 => __('Border Color', 'monalisa'),
                'id'                    => 'content_border_color',
                'std'                   => '#e8e8e8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('content', 'monalisa')
            ),
            array(
                'label'                 => __('Border Width', 'monalisa'),
                'id'                    => 'content_border_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('content', 'monalisa')
            ),
            array(
                'label'                 => __('Borders', 'monalisa'),
                'id'                    => 'content_border_trbl',
                'std'                   => 'right bottom left',
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
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('content', 'monalisa')
            ),
            array(
                'label'                 => __('Color', 'monalisa'),
                'id'                    => 'content_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('content', 'monalisa')
            ),
            array(
                'label'                 => __('Font Size', 'monalisa'),
                'id'                    => 'content_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('content', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'monalisa'),
                'id'                    => 'content_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('content', 'monalisa'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'monalisa'),
                'id'                    => 'content_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('content', 'monalisa'),
            ),
            array(
                'label'                 => __('Line Height', 'monalisa'),
                'id'                    => 'content_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('content', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'monalisa'),
                'id'                    => 'content_padding_vertical',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('content', 'monalisa')
            ),
            array(
                'label'                 => __('Padding Horizontal', 'monalisa'),
                'id'                    => 'content_padding_horizontal',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('content', 'monalisa')
            ),
            array(
                'label'                 => __('Text Align', 'monalisa'),
                'id'                    => 'content_text_align',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('content', 'monalisa'),
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
                'affect_on_change_el'   => '.dslc-accordion',
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
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'monalisa'),
                'id'                    => 'css_res_t_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Header - Margin Bottom', 'monalisa'),
                'id'                    => 'css_res_t_header_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Header - Padding Vertical', 'monalisa'),
                'id'                    => 'css_res_t_header_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Header - Padding Horizontal', 'monalisa'),
                'id'                    => 'css_res_t_header_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Font Size', 'monalisa'),
                'id'                    => 'css_res_t_title_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'monalisa'),
                'id'                    => 'css_res_t_title_lheight',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Padding Vertical', 'monalisa'),
                'id'                    => 'css_res_t_title_padding_vertical',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Padding Horizontal', 'monalisa'),
                'id'                    => 'css_res_t_title_padding_horizontal',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Content - Font Size', 'monalisa'),
                'id'                    => 'css_res_t_content_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Line Height', 'monalisa'),
                'id'                    => 'css_res_t_content_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Padding Vertical', 'monalisa'),
                'id'                    => 'css_res_t_content_padding_vertical',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Content - Padding Horizontal', 'monalisa'),
                'id'                    => 'css_res_t_content_padding_horizontal',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'monalisa'),
                'ext'                   => 'px',
            ),
            /**
             * Responsive phone
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
                'affect_on_change_el'   => '.dslc-accordion',
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
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'monalisa'),
                'id'                    => 'css_res_p_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Header - Margin Bottom', 'monalisa'),
                'id'                    => 'css_res_p_header_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Header - Padding Vertical', 'monalisa'),
                'id'                    => 'css_res_p_header_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Header - Padding Horizontal', 'monalisa'),
                'id'                    => 'css_res_p_header_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-header',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Font Size', 'monalisa'),
                'id'                    => 'css_res_p_title_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'monalisa'),
                'id'                    => 'css_res_p_title_lheight',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Padding Vertical', 'monalisa'),
                'id'                    => 'css_res_p_title_padding_vertical',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Padding Horizontal', 'monalisa'),
                'id'                    => 'css_res_p_title_padding_horizontal',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-title',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Content - Font Size', 'monalisa'),
                'id'                    => 'css_res_p_content_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Line Height', 'monalisa'),
                'id'                    => 'css_res_p_content_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Padding Vertical', 'monalisa'),
                'id'                    => 'css_res_p_content_padding_vertical',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Content - Padding Horizontal', 'monalisa'),
                'id'                    => 'css_res_p_content_padding_horizontal',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion-content',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'monalisa'),
                'ext'                   => 'px',
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

        $accordion_nav = explode('(dslc_sep)', trim($options['accordion_nav']));

        if (empty($options['accordion_content']))
            $accordion_contents = false;
        else
            $accordion_contents = explode('(dslc_sep)', trim($options['accordion_content']));

        $count = 0;
        ?>

        <div class="dslc-accordion" data-open="<?php echo $options['open_by_default']; ?>">

            <?php if (is_array($accordion_contents) && count($accordion_contents) > 0) : ?>

                <?php
                foreach ($accordion_contents as $accordion_content) :
                    ?>

                    <div class="dslc-accordion-item as-accordion-item">

                        <div class="dslc-accordion-header as-accordion-header-color dslc-accordion-hook">
                            <span class="dslc-accordion-title as-accordion-title" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo stripslashes($accordion_nav[$count]); ?></span>
                            <?php if ($dslc_is_admin) : ?>
                                <div class="dslca-accordion-action-hooks as-action-hook-accordion">
                                    <span class="dslca-move-up-accordion-hook"><span class="dslca-icon dslc-icon-arrow-up"></span></span>
                                    <span class="dslca-move-down-accordion-hook"><span class="dslca-icon dslc-icon-arrow-down"></span></span>
                                    <span class="as-accordion-delete dslca-delete-accordion-hook"><span class="dslca-icon dslc-icon-remove"></span></span>
                                </div>
                            <?php endif; ?>
                            <span class="dslca-icon as-icon-arrow dslc-icon-angle-down"></span>
                        </div>

                        <div class="dslc-accordion-content">
                            <div class="dslca-editable-content">
                                <?php
                                $accordion_content_output = stripslashes($accordion_content);
                                $accordion_content_output = str_replace('<lctextarea', '<textarea', $accordion_content_output);
                                $accordion_content_output = str_replace('</lctextarea', '</textarea', $accordion_content_output);
                                echo do_shortcode($accordion_content_output);
                                ?>
                            </div>
                            <?php if ($dslc_is_admin) : ?>
                                <textarea class="dslca-accordion-plain-content"><?php echo trim($accordion_content_output); ?></textarea>
                                <div class="dslca-wysiwyg-actions-edit"><span class="dslca-wysiwyg-actions-edit-hook"><?php _e('Edit Content', 'monalisa'); ?></span></div>
                            <?php endif; ?>
                        </div><!-- .dslc-accordion-content -->

                    </div><!-- .dslc-accordion-item -->

                    <?php
                    $count++;
                endforeach;
                ?>

            <?php else : ?>

                <div class="dslc-accordion-item as-accordion-item">

                    <div class="dslc-accordion-header as-accordion-header-color dslc-accordion-hook">
                        <span class="dslc-accordion-title as-accordion-title" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php _e('CLICK TO EDIT', 'monalisa'); ?></span>
                        <?php if ($dslc_is_admin) : ?>
                            <div class="dslca-accordion-action-hooks as-action-hook-accordion">
                                <span class="dslca-move-up-accordion-hook"><span class="dslca-icon dslc-icon-arrow-up"></span></span>
                                <span class="dslca-move-down-accordion-hook"><span class="dslca-icon dslc-icon-arrow-down"></span></span>
                                <span class="as-accordion-delete dslca-delete-accordion-hook"><span class="dslca-icon dslc-icon-remove"></span></span>
                            </div>
                        <?php endif; ?>
                        <span class="dslca-icon as-icon-arrow dslc-icon-angle-down"></span>
                    </div>

                    <div class="dslc-accordion-content">
                        <div class="dslca-editable-content">
                            Placeholder content. Lorem ipsum dolor sit amet, consectetur
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                        <?php if ($dslc_is_admin) : ?>
                            <textarea class="dslca-accordion-plain-content">Placeholder content. Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                            <div class="dslca-wysiwyg-actions-edit"><span class="dslca-wysiwyg-actions-edit-hook"><?php _e('Edit Content', 'monalisa'); ?></span></div>
                        <?php endif; ?>
                    </div><!-- .dslc-accordion-content -->

                </div><!-- .dslc-accordion-item -->

            <?php endif; ?>

            <?php if ($dslc_is_admin) : ?>
                <div class="dslca-add-accordion">
                    <span class="dslca-add-accordion-hook"><span class="dslca-icon dslc-icon-plus"></span></span>
                </div>
            <?php endif; ?>

        </div><!-- .dslc-accordion -->

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
