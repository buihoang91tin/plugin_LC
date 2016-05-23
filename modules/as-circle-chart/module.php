<?php

class ASEX_Circle_Chart_Module extends ASEX_MODULE {

    // Module Attributes
    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'ASEX_Circle_Chart_Module';
        $this->module_title    = __('AS - Circle Chart', 'asex');
        $this->module_icon     = 'circle-blank';
        $this->module_category = 'as - Counter';
    }

    // Module Options
    function options() {
        // The options array
        $dslc_options = array(
            /**
             * General
             */
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
                'label'      => __('Title', 'asex'),
                'id'         => 'title',
                'std'        => __('CLICK TO EDIT','monalisa'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'text_align',
                'std'                   => 'center',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Left', 'asex'),
                        'value' => 'left'
                    ),
                    array(
                        'label' => __('Center', 'asex'),
                        'value' => 'center'
                    ),
                    array(
                        'label' => __('Right', 'asex'),
                        'value' => 'right'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
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
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
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
                'affect_on_change_el'   => '.circle-chart-wrapper',
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
                'affect_on_change_el'   => '.circle-chart-wrapper',
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
                'affect_on_change_el'   => '.circle-chart-wrapper',
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
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'styling',
                'ext'                   => '%'
            ),
            /**
             * Circle Chart
             */
            array(
                'label'   => __('On Load Animation', 'asex'),
                'id'      => 'circle_chart_animation',
                'std'     => 'easeOutExpo',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => 'easeInSine',
                        'value' => 'easeInSine'
                    ),
                    array(
                        'label' => 'easeOutSine',
                        'value' => 'easeOutSine'
                    ),
                    array(
                        'label' => 'easeInOutSine',
                        'value' => 'easeInOutSine'
                    ),
                    array(
                        'label' => 'easeInQuad',
                        'value' => 'easeInQuad'
                    ),
                    array(
                        'label' => 'easeOutQuad',
                        'value' => 'easeOutQuad'
                    ),
                    array(
                        'label' => 'easeInOutQuad',
                        'value' => 'easeInOutQuad'
                    ),
                    array(
                        'label' => 'easeInCubic',
                        'value' => 'easeInCubic'
                    ),
                    array(
                        'label' => 'easeOutCubic',
                        'value' => 'easeOutCubic'
                    ),
                    array(
                        'label' => 'easeInOutCubic',
                        'value' => 'easeInOutCubic'
                    ),
                    array(
                        'label' => 'easeInQuart',
                        'value' => 'easeInQuart'
                    ),
                    array(
                        'label' => 'easeOutQuart',
                        'value' => 'easeOutQuart'
                    ),
                    array(
                        'label' => 'easeInOutQuart',
                        'value' => 'easeInOutQuart'
                    ),
                    array(
                        'label' => 'easeInQuint',
                        'value' => 'easeInQuint'
                    ),
                    array(
                        'label' => 'easeOutQuint',
                        'value' => 'easeOutQuint'
                    ),
                    array(
                        'label' => 'easeInOutQuint',
                        'value' => 'easeInOutQuint'
                    ),
                    array(
                        'label' => 'easeInExpo',
                        'value' => 'easeInExpo'
                    ),
                    array(
                        'label' => 'easeOutExpo',
                        'value' => 'easeOutExpo'
                    ),
                    array(
                        'label' => 'easeInOutExpo',
                        'value' => 'easeInOutExpo'
                    ),
                    array(
                        'label' => 'easeInCirc',
                        'value' => 'easeInCirc'
                    ),
                    array(
                        'label' => 'easeOutCirc',
                        'value' => 'easeOutCirc'
                    ),
                    array(
                        'label' => 'easeInOutCirc',
                        'value' => 'easeInOutCirc'
                    ),
                    array(
                        'label' => 'easeInBack',
                        'value' => 'easeInBack'
                    ),
                    array(
                        'label' => 'easeOutBack',
                        'value' => 'easeOutBack'
                    ),
                    array(
                        'label' => 'easeInBack',
                        'value' => 'easeInBack'
                    ),
                    array(
                        'label' => 'easeInOutBack',
                        'value' => 'easeInOutBack'
                    ),
                    array(
                        'label' => 'easeInElastic',
                        'value' => 'easeInElastic'
                    ),
                    array(
                        'label' => 'easeOutElastic',
                        'value' => 'easeOutElastic'
                    ),
                    array(
                        'label' => 'easeInOutElastic',
                        'value' => 'easeInOutElastic'
                    ),
                    array(
                        'label' => 'easeInBounce',
                        'value' => 'easeInBounce'
                    ),
                    array(
                        'label' => 'easeOutBounce',
                        'value' => 'easeOutBounce'
                    ),
                    array(
                        'label' => 'easeInOutBounce',
                        'value' => 'easeInOutBounce'
                    ),
                ),
                'section' => 'styling',
                'tab'     => 'Circle Chart',
            ),
            array(
                'label'             => __('Percent Circle Chart', 'asex'),
                'id'                => 'circle_chart_percent',
                'std'               => 50,
                'refresh_on_change' => true,
                'type'              => 'text',
                'min'               => 0,
                'max'               => 100,
                'section'           => 'styling',
                'tab'               => 'Circle Chart',
            ),
            array(
                'label'   => __('Duration', 'asex'),
                'id'      => 'circle_chart_duration',
                'std'     => '4000',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => 'Circle Chart',
            ),
            array(
                'label'   => __('Type chart', 'asex'),
                'id'      => 'circle_chart_cap',
                'std'     => 'butt',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => 'Square',
                        'value' => 'square'
                    ),
                    array(
                        'label' => 'Butt',
                        'value' => 'butt'
                    ),
                    array(
                        'label' => 'Round',
                        'value' => 'round'
                    ),
                ),
                'section' => 'styling',
                'tab'     => 'Circle Chart',
            ),
            array(
                'label'                 => __('Line Width (px)', 'asex'),
                'id'                    => 'circle_chart_width',
                'std'                   => '5',
                'type'                  => 'slider',
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'section'               => 'styling',
                'tab'                   => __('Circle Chart', 'asex'),
                'ext'                   => '',
                'min'                   => 0,
                'max'                   => 30
            ),
            array(
                'label'                 => __('Track Color', 'asex'),
                'id'                    => 'circle_chart_track',
                'std'                   => '#f2f2f2',
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'type'                  => 'color',
                'section'               => 'styling',
                'tab'                   => 'Circle Chart',
            ),
            array(
                'label'                 => __('Bar Color', 'asex'),
                'id'                    => 'circle_chart_bar',
                'std'                   => '#5ac3bc',
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'type'                  => 'color',
                'section'               => 'styling',
                'tab'                   => 'Circle Chart',
            ),
            array(
                'label'   => __('Size', 'asex'),
                'id'      => 'circle_chart_size',
                'std'     => '150',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => 'Small',
                        'value' => '110'
                    ),
                    array(
                        'label' => 'Normal',
                        'value' => '150'
                    ),
                    array(
                        'label' => 'Large',
                        'value' => '200'
                    ),
                ),
                'section' => 'styling',
                'tab'     => 'Circle Chart',
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_percent_chart_color',
                'std'                   => 'rgb(44, 62, 80)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.percent-chart',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => 'Circle Chart',
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'css_percent_chart_font_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.percent-chart',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => 'Circle Chart',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'css_percent_chart_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.percent-chart',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => 'Circle Chart',
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'css_percent_chart_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.percent-chart',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => 'Circle Chart',
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_title_color',
                'std'                   => '#797979',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.pie-content h2',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => 'Title'
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'css_title_font_size',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.pie-content h2',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'css_title_font_weight',
                'std'                   => '300',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.pie-content h2',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'css_title_font_family',
                'std'                   => 'Oswald',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.pie-content h2',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => 'Title',
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'css_title_line_height',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.pie-content h2',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_title_margin',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.pie-content h2',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
            /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive', 'asex'),
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
                'tab'     => 'tablet',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_res_t_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'css_res_t_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_res_t_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
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
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'asex'),
                'id'                    => 'css_res_t_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Font Size(Circle Chart)', 'asex'),
                'id'                    => 'css_res_t_percent_chart_font_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.percent-chart',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight (Circle Chart)', 'asex'),
                'id'                    => 'css_res_t_percent_chart_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.percent-chart',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Size(Title)', 'asex'),
                'id'                    => 'css_res_t_title_font_size',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.pie-content h2',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Line Height (Title)', 'asex'),
                'id'                    => 'css_res_t_title_line_height',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.pie-content h2',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            /**
             * Responsive Phone
             */
            array(
                'label'   => __('Responsive', 'asex'),
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
                'tab'     => 'phone',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_res_p_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'css_res_p_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_res_p_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
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
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'asex'),
                'id'                    => 'css_res_p_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Font Size(Circle Chart)', 'asex'),
                'id'                    => 'css_res_p_percent_chart_font_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.percent-chart',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight (Circle Chart)', 'asex'),
                'id'                    => 'css_res_p_percent_chart_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.percent-chart',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Size(Title)', 'asex'),
                'id'                    => 'css_res_p_title_font_size',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.pie-content h2',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Line Height (Title)', 'asex'),
                'id'                    => 'css_res_p_title_line_height',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.pie-content h2',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
        );

        $dslc_options = array_merge($dslc_options, $this->shared_options('animation_options'));
        $dslc_options = array_merge($dslc_options, $this->presets_options());

        // Return the array
        return apply_filters('dslc_module_options', $dslc_options, $this->module_id);
    }

    // Module Output
    function output($options) {

        global $dslc_active;

        if ($dslc_active && is_user_logged_in() && current_user_can(DS_LIVE_COMPOSER_CAPABILITY))
            $dslc_is_admin = true;
        else
            $dslc_is_admin = false;

        // REQUIRED
        $this->module_start($options);

        /* Module output stars here */

        // Main Elements
        /* $elements = $options['elements'];
          if ( ! empty( $elements ) )
          $elements = explode( ' ', trim( $elements ) );
          else
          $elements = array(); */
        ?>
        <div class="circle-chart-wrapper">
            <span class="chart" data-percent="<?php echo esc_attr($options['circle_chart_percent']); ?>" data-easing="<?php echo esc_attr($options['circle_chart_animation']); ?>" data-duration="<?php echo esc_attr($options['circle_chart_duration']); ?>" data-line-cap="<?php echo esc_attr($options['circle_chart_cap']); ?>" data-line-width="<?php echo esc_attr($options['circle_chart_width']); ?>" data-track-color="<?php echo esc_attr($options['circle_chart_track']); ?>" data-bar-color="<?php echo esc_attr($options['circle_chart_bar']); ?>" data-size="<?php echo esc_attr($options['circle_chart_size']); ?>" style="width:<?php echo esc_attr($options['circle_chart_size']); ?>px;height:<?php echo esc_attr($options['circle_chart_size']); ?>px;">
                <span class="percent-chart <?php echo $dslc_is_admin ? 'active-lc' : ''; ?>" data-from="0" data-to="<?php echo esc_attr($options['circle_chart_percent']); ?>" data-speed="1500" data-refresh-interval="25" style="line-height:<?php echo esc_attr($options['circle_chart_size']); ?>px;"><?php echo esc_attr($options['circle_chart_percent']); ?></span>
            </span>
            <div class="pie-content">
                <?php if ($dslc_is_admin) : ?>
                    <h2 class="dslca-editable-content title" data-id="title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['title'], 'monalisa'); ?></h2>
                <?php else : ?>
                    <h2 class="title"><?php echo esc_html($options['title'], 'monalisa'); ?></h2>
                <?php endif; ?>
            </div>
        </div>

        <?php
        // REQUIRED
        $this->module_end($options);
    }

}
