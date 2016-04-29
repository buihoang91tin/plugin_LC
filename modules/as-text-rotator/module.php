<?php

class AS_text_rotator extends DSLC_Module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_text_rotator';
        $this->module_title    = __('AS - Text Rotator', 'live-composer-page-builder');
        $this->module_icon     = 'quote-right';
        $this->module_category = 'as - element';
    }

    function options() {

        $dslc_options = array(
            array(
                'label'   => __('Show On', 'live-composer-page-builder'),
                'id'      => 'css_show_on',
                'std'     => 'desktop tablet phone',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Desktop', 'live-composer-page-builder'),
                        'value' => 'desktop'
                    ),
                    array(
                        'label' => __('Tablet', 'live-composer-page-builder'),
                        'value' => 'tablet'
                    ),
                    array(
                        'label' => __('Phone', 'live-composer-page-builder'),
                        'value' => 'phone'
                    ),
                ),
            ),
            array(
                'label'             => __('Text before', 'live-composer-page-builder'),
                'id'                => 'as_rotator_1',
                'std'               => 'Super',
                'type'              => 'text',
                'refresh_on_change' => true,
            ),
            array(
                'label'             => __('Text rotate', 'live-composer-page-builder'),
                'id'                => 'as_rotator_2',
                'std'               => 'Easy, Simple, Customizable',
                'type'              => 'text',
                'refresh_on_change' => true,
                'help'              => __('Words separated by ","', 'live-composer-page-builder'),
            ),
            array(
                'label'             => __('Text after', 'live-composer-page-builder'),
                'id'                => 'as_rotator_3',
                'std'               => 'Text Rotator with Style',
                'type'              => 'text',
                'refresh_on_change' => true,
            ),
            array(
                'label'   => __('Effect Word', 'live-composer-page-builder'),
                'id'      => 'as_rotator_style',
                'std'     => 'rotate-1',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Style 1', 'live-composer-page-builder'),
                        'value' => 'rotate-1',
                    ),
                    array(
                        'label' => __('Style 2', 'live-composer-page-builder'),
                        'value' => 'letters type',
                    ),
                    array(
                        'label' => __('Style 3', 'live-composer-page-builder'),
                        'value' => 'letters rotate-2',
                    ),
                    array(
                        'label' => __('Style 4', 'live-composer-page-builder'),
                        'value' => 'loading-bar',
                    ),
                    array(
                        'label' => __('Style 5', 'live-composer-page-builder'),
                        'value' => 'slide',
                    ),
                    array(
                        'label' => __('Style 6', 'live-composer-page-builder'),
                        'value' => 'clip is-full-width',
                    ),
                    array(
                        'label' => __('Style 7', 'live-composer-page-builder'),
                        'value' => 'zoom',
                    ),
                    array(
                        'label' => __('Style 8', 'live-composer-page-builder'),
                        'value' => 'letters rotate-3',
                    ),
                    array(
                        'label' => __('Style 9', 'live-composer-page-builder'),
                        'value' => 'letters scale',
                    ),
                    array(
                        'label' => __('Style 10', 'live-composer-page-builder'),
                        'value' => 'push',
                    ),
                ),
            ),
            /**
             * General
             */
            array(
                'label'                 => __('BG Color', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('BORDER COLOR', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_boder_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_boder_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('General', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_boder',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'live-composer-page-builder'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'live-composer-page-builder'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'live-composer-page-builder'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'live-composer-page-builder'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Radius', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
                'ext'                   => '%'
            ),
            /**
             * TEXT
             */
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'as_title_color',
                'std'                   => 'rgb(61, 61, 61)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .as-text-rotator-text',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('text', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'as_title_font_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .as-text-rotator-text',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('text', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'as_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .as-text-rotator-text',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('text', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'as_title_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .as-text-rotator-text',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('text', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Line Height', 'live-composer-page-builder'),
                'id'                    => 'as_title_line_height',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .as-text-rotator-text',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('text', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            /**
             * Text Rotate
             */
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_title_color',
                'std'                   => 'rgb(61, 61, 61)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .cd-words-wrapper, .as-text-wraper .cd-words-wrapper b',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_title_font_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .cd-words-wrapper, .as-text-wraper .cd-words-wrapper b',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .cd-words-wrapper, .as-text-wraper .cd-words-wrapper b',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_title_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .cd-words-wrapper, .as-text-wraper .cd-words-wrapper b',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Line Height', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_title_line_height',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .cd-words-wrapper, .as-text-wraper .cd-words-wrapper b',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .cd-words-wrapper, .as-text-wraper .cd-words-wrapper b',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .cd-words-wrapper, .as-text-wraper .cd-words-wrapper b',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
                'ext'                   => 'px',
                'max'                   => 500,
            ),
            /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive Styling', 'live-composer-page-builder'),
                'id'      => 'css_res_t',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'live-composer-page-builder'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'live-composer-page-builder'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('tablet', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size Text', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_font_size',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper .as-text-rotator-text',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size Rotator', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_font_size_text_rotator',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper .cd-words-wrapper, .as-text-wraper .cd-words-wrapper b ',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Line Height ( Text )', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_line_height_text',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .as-text-rotator-text',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Line Height ( Rotator )', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_line_height_rotator',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .cd-words-wrapper',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            /**
             * Responsive Phone
             */
            array(
                'label'   => __('Responsive Styling', 'live-composer-page-builder'),
                'id'      => 'css_res_p',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'live-composer-page-builder'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'live-composer-page-builder'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('phone', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_font_size',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper .as-text-rotator-text',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_font_size_text_rotator',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper .cd-words-wrapper, .as-text-wraper .cd-words-wrapper b',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Line Height ( Text )', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_line_height_text',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .as-text-rotator-text',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Line Height ( Rotator )', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_line_height_rotator',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotator .cd-words-wrapper',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
        );



        return apply_filters('dslc_module_options', $dslc_options, $this->module_id);
    }

    function output($options) {
        global $dslc_active;

        if ($dslc_active && is_user_logged_in() && current_user_can(DS_LIVE_COMPOSER_CAPABILITY))
            $dslc_is_admin = true;
        else
            $dslc_is_admin = false;

        $this->module_start($options);
        $as_text = explode(',', $options['as_rotator_2']);
        ?>
        <!-- Module output stars here -->
        <div class="as-text-rotator as-text-wraper">
            <section class="cd-intro as-text-rotator" >
                <h1 class="cd-headline <?php echo $options['as_rotator_style']; ?>">
                    <span class="as-text-rotator-text"><?php echo esc_attr($options['as_rotator_1']); ?></span>
                    <span class="cd-words-wrapper ">
                        <b class="is-visible"><?php echo $as_text[0]; ?></b>
                        <?php
                        for ($i = 1;
                                $i < count($as_text);
                                $i++) {
                            echo '<b>' . $as_text[$i] . '</b>';
                        }
                        ?>
                    </span>
                    <span class="as-text-rotator-text"><?php echo esc_attr($options['as_rotator_3']); ?></span>
                </h1>
            </section>
        </div>
        <?php
        wp_reset_postdata();
        /* Module output ends here */

        /* Module output ends here */
        $this->module_end($options);
    }

}
