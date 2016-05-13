<?php

class AS_Progress_Bars extends as_module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_Progress_Bars';
        $this->module_title    = __('AS - Progress Bar', 'as_extension');
        $this->module_icon     = 'tasks';
        $this->module_category = 'as - Counter';
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
                'label'      => __('Label', 'as_extension'),
                'id'         => 'label',
                'std'        => __('CLICK TO EDIT', 'as_extension'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'functionality',
            ),
            /**
             * General Settings
             */
            array(
                'label'                 => __('Amount', 'as_extension'),
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
                'label'   => __('Show / Hide Tooltip', 'as_extension'),
                'id'      => 'number_percent',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'as_extension'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled ', 'as_extension'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'functionality',
            ),
            array(
                'label'   => __('Animation', 'as_extension'),
                'id'      => 'animation',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'as_extension'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled ', 'as_extension'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'functionality',
            ),
            array(
                'label'   => __('Animation Speed ( miliseconds )', 'as_extension'),
                'id'      => 'animation_speed',
                'std'     => '1000',
                'type'    => 'text',
                'section' => 'functionality',
            ),
            /**
             * Wrapper Style
             */
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'css_wrapper_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'as_extension'),
                'id'                    => 'css_wrapper_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'as_extension'),
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
                'label'                 => __('Borders', 'as_extension'),
                'id'                    => 'css_wrapper_border_trbl',
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
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius - Top', 'as_extension'),
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
                'label'                 => __('Border Radius - Bottom', 'as_extension'),
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
                'label'                 => __('Margin Bottom', 'as_extension'),
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
                'label'                 => __('Minimum Height', 'as_extension'),
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
                'label'                 => __('Padding Vertical', 'as_extension'),
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
                'label'                 => __('Padding Horizontal', 'as_extension'),
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
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_label_color',
                'std'                   => '#3d3d3d',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'css_label_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'css_label_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
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
                'id'                    => 'css_label_font_family',
                'std'                   => 'Oswald',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_label_margin',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'css_label_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Title', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'css_label_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Title', 'as_extension'),
            ),
            array(
                'label'   => __('Position', 'as_extension'),
                'id'      => 'label_position',
                'std'     => 'above',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Above', 'as_extension'),
                        'value' => 'above'
                    ),
                    array(
                        'label' => __('Inside ', 'as_extension'),
                        'value' => 'inside'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('title', 'as_extension'),
            ),
            /**
             * Loader
             */
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'css_loader_bg_color',
                'std'                   => '#f1f1f1',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('bar', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Color', 'as_extension'),
                'id'                    => 'css_loader_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('bar', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Width', 'as_extension'),
                'id'                    => 'css_loader_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('bar', 'as_extension'),
            ),
            array(
                'label'                 => __('Borders', 'as_extension'),
                'id'                    => 'css_loader_border_trbl',
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
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('bar', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Radius', 'as_extension'),
                'id'                    => 'css_loader_border_radius',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader, .dslc-progress-bar-loader-inner',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('bar', 'as_extension'),
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_loader_color',
                'std'                   => '#62cbd7',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader-inner',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('bar', 'as_extension'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_loader_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('bar', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'css_loader_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('bar', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'css_loader_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('bar', 'as_extension'),
            ),
            array(
                'label'                 => __('Size', 'as_extension'),
                'id'                    => 'css_loader_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader, .dslc-progress-bar-loader-inner',
                'affect_on_change_rule' => 'height',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('bar', 'as_extension'),
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
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'css_res_t_wrapper_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'css_res_t_wrapper_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Font Size', 'as_extension'),
                'id'                    => 'css_res_t_label_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'as_extension'),
                'id'                    => 'css_res_t_label_margin',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Padding Horizontal', 'as_extension'),
                'id'                    => 'css_res_t_label_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Padding Vertical', 'as_extension'),
                'id'                    => 'css_res_t_label_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Margin Bottom', 'as_extension'),
                'id'                    => 'css_res_t_loader_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Padding Vertical', 'as_extension'),
                'id'                    => 'css_res_t_loader_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Padding Horizontal', 'as_extension'),
                'id'                    => 'css_res_t_loader_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Size', 'as_extension'),
                'id'                    => 'css_res_t_loader_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader, .dslc-progress-bar-loader-inner',
                'affect_on_change_rule' => 'height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
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
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'css_res_p_wrapper_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'css_res_p_wrapper_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Font Size', 'as_extension'),
                'id'                    => 'css_res_p_label_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'as_extension'),
                'id'                    => 'css_res_p_label_margin',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Padding Horizontal', 'as_extension'),
                'id'                    => 'css_res_p_label_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Padding Vertical', 'as_extension'),
                'id'                    => 'css_res_p_label_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => 'h4.dslc-progress-bar-label',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Margin Bottom', 'as_extension'),
                'id'                    => 'css_res_p_loader_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Padding Vertical', 'as_extension'),
                'id'                    => 'css_res_p_loader_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Padding Horizontal', 'as_extension'),
                'id'                    => 'css_res_p_loader_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Bar - Size', 'as_extension'),
                'id'                    => 'css_res_p_loader_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-progress-bar-loader, .dslc-progress-bar-loader-inner',
                'affect_on_change_rule' => 'height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
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
                    <h4 class="dslc-progress-bar-label dslca-editable-content" data-id="label" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['label'], 'monalisa'); ?></h4>
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
                            <h4 class="dslc-progress-bar-label dslca-editable-content" data-id="label" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['label'], 'monalisa'); ?></h4>
                        <?php else : ?>
                            <h4 class="dslc-progress-bar-label"><?php echo esc_html($options['label'], 'monalisa'); ?></h4>
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
