<?php

class ASEX_Progress_Bars extends ASEX_MODULE {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'ASEX_Progress_Bars';
        $this->module_title    = __('AS - Progress Bar', 'asex');
        $this->module_icon     = 'tasks';
        $this->module_category = 'as - Counter';
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
                'label'      => __('Label', 'asex'),
                'id'         => 'label',
                'std'        => __('CLICK TO EDIT', 'asex'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'functionality',
            ),
            /**
             * General Settings
             */
            array(
                'label'                 => __('Amount', 'asex'),
                'id'                    => 'amount',
                'std'                   => '50',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader-inner',
                'affect_on_change_rule' => 'width',
                'ext'                   => '%',
                'section'               => 'functionality',
            ),
            array(
                'label'   => __('Show / Hide Tooltip', 'asex'),
                'id'      => 'number_percent',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'asex'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled ', 'asex'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'functionality',
            ),
            array(
                'label'   => __('Animation', 'asex'),
                'id'      => 'animation',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'asex'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled ', 'asex'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'functionality',
            ),
            array(
                'label'   => __('Animation Speed ( miliseconds )', 'asex'),
                'id'      => 'animation_speed',
                'std'     => '1000',
                'type'    => 'text',
                'section' => 'functionality',
            ),
            /**
             * Wrapper Style
             */
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'css_wrapper_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_wrapper_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_wrapper_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
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
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius - Top', 'asex'),
                'id'                    => 'css_wrapper_border_radius_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'asex'),
                'id'                    => 'css_wrapper_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
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
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'min-height',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 1000,
                'increment'             => 5
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_wrapper_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_wrapper_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            /**
             * Label
             */
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_label_color',
                'std'                   => '#3d3d3d',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'css_label_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'css_label_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
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
                'id'                    => 'css_label_font_family',
                'std'                   => 'Oswald',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_label_margin',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_label_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Title', 'asex'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_label_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Title', 'asex'),
            ),
            array(
                'label'   => __('Position', 'asex'),
                'id'      => 'label_position',
                'std'     => 'above',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Above', 'asex'),
                        'value' => 'above'
                    ),
                    array(
                        'label' => __('Inside ', 'asex'),
                        'value' => 'inside'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('title', 'asex'),
            ),
            /**
             * Loader
             */
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'css_loader_bg_color',
                'std'                   => '#f1f1f1',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('bar', 'asex'),
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_loader_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('bar', 'asex'),
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_loader_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('bar', 'asex'),
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'css_loader_border_trbl',
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
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('bar', 'asex'),
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'css_loader_border_radius',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader, .dslc-progress-bar-loader-inner',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('bar', 'asex'),
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_loader_color',
                'std'                   => '#62cbd7',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader-inner',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('bar', 'asex'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_loader_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('bar', 'asex'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_loader_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('bar', 'asex'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_loader_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('bar', 'asex'),
            ),
            array(
                'label'                 => __('Size', 'asex'),
                'id'                    => 'css_loader_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader, .dslc-progress-bar-loader-inner',
                'affect_on_change_rule' => 'height',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('bar', 'asex'),
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
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_res_t_wrapper_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_res_t_wrapper_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Font Size', 'asex'),
                'id'                    => 'css_res_t_label_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'asex'),
                'id'                    => 'css_res_t_label_margin',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_t_label_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Padding Vertical', 'asex'),
                'id'                    => 'css_res_t_label_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Margin Bottom', 'asex'),
                'id'                    => 'css_res_t_loader_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Padding Vertical', 'asex'),
                'id'                    => 'css_res_t_loader_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_t_loader_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Size', 'asex'),
                'id'                    => 'css_res_t_loader_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader, .dslc-progress-bar-loader-inner',
                'affect_on_change_rule' => 'height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
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
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_res_p_wrapper_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_res_p_wrapper_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Font Size', 'asex'),
                'id'                    => 'css_res_p_label_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'asex'),
                'id'                    => 'css_res_p_label_margin',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_p_label_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Padding Vertical', 'asex'),
                'id'                    => 'css_res_p_label_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Margin Bottom', 'asex'),
                'id'                    => 'css_res_p_loader_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Padding Vertical', 'asex'),
                'id'                    => 'css_res_p_loader_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_p_loader_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Size', 'asex'),
                'id'                    => 'css_res_p_loader_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader, .dslc-progress-bar-loader-inner',
                'affect_on_change_rule' => 'height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
        );

        $dslc_options = array_merge($dslc_options, $this->shared_options('animation_options', array(
                    'hover_opts' => false)));
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

        /* Module output starts here */

        $wrapper_class = '';

        if ($options['animation'] == 'enabled')
            $wrapper_class .= 'dslc-progress-bar-animated ';
        ?>

        <div class="dslc-progress-bar <?php echo $wrapper_class; ?>">

            <?php if ($options['label_position'] == 'above') : ?>

                <?php if ($dslc_is_admin) : ?>
                    <h4 class="dslc-progress-bar-label dslca-editable-content" data-id="label" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['label'], 'asex'); ?></h4>
                <?php else : ?>
                    <h4 class="dslc-progress-bar-label"><?php echo esc_html($options['label']); ?></h4>
                <?php endif; ?>

            <?php endif; ?>

            <span class="dslc-progress-bar-loader as-progressbar-wrapper">
                <span class="dslc-progress-bar-loader-inner dslc-in-viewport" data-amount="<?php echo esc_attr($options['amount']); ?>" data-speed="<?php echo esc_html($options['animation_speed']); ?>">
                    <?php if ($options['number_percent'] == 'enabled') : ?>
                        <div class="as-number-percent-progress"><?php echo $options['amount']; ?>%<span class="as-triangle-progress"></span></div>
                    <?php endif; ?>
                    <?php if ($options['label_position'] == 'inside') : ?>
                        <?php if ($dslc_is_admin) : ?>
                            <h4 class="dslc-progress-bar-label dslca-editable-content" data-id="label" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['label'], 'asex'); ?></h4>
                        <?php else : ?>
                            <h4 class="dslc-progress-bar-label"><?php echo esc_html($options['label'], 'asex'); ?></h4>
                        <?php endif; ?>
                    <?php endif; ?>
                </span>
            </span><!-- .dslc-progress-bar-loader -->

        </div><!-- .dslc-progress-bar -->

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
