<?php

class ASEX_Counter_Module extends ASEX_MODULE {

    // Module Attributes
    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'ASEX_Counter_Module';
        $this->module_title    = __('AS - Counter Number', 'asex');
        $this->module_icon     = 'bar-chart';
        $this->module_category = 'as - Counter';
    }

    // Module Options
    function options() {

        // The options array
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
                'label' => 'From Number',
                'id'    => 'asex_counter_from_number',
                'std'   => '7979',
                'type'  => 'text',
            ),
            array(
                'label' => 'To Number',
                'id'    => 'asex_counter_to_number',
                'std'   => '9999',
                'type'  => 'text',
            ),
            /**
             * General
             */
            array(
                'label'   => __('Elements', 'asex'),
                'id'      => 'elements',
                'std'     => 'icon title',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Icon', 'asex'),
                        'value' => 'icon'
                    ),
                    array(
                        'label' => __('Title', 'asex'),
                        'value' => 'title'
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'      => __('Title', 'asex'),
                'id'         => 'asex_counter_title',
                'std'        => __('CLICK TO EDIT','asex'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Number', 'asex'),
                'id'         => 'asex_counter_number',
                'std'        => '1989',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'asex_counter_text_align',
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
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Width', 'asex'),
                'id'                    => 'css_main_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'width',
                'section'               => 'styling',
                'ext'                   => '%',
            ),
            array(
                'label'                 => __(' BG Color', 'asex'),
                'id'                    => 'css_main_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image', 'asex'),
                'id'                    => 'css_main_bg_img',
                'std'                   => '',
                'type'                  => 'image',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'background-image',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Repeat', 'asex'),
                'id'                    => 'css_main_bg_img_repeat',
                'std'                   => 'repeat',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Repeat', 'asex'),
                        'value' => 'repeat',
                    ),
                    array(
                        'label' => __('Repeat Horizontal', 'asex'),
                        'value' => 'repeat-x',
                    ),
                    array(
                        'label' => __('Repeat Vertical', 'asex'),
                        'value' => 'repeat-y',
                    ),
                    array(
                        'label' => __('Do NOT Repeat', 'asex'),
                        'value' => 'no-repeat',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Position', 'asex'),
                'id'                    => 'css_main_bg_img_pos',
                'std'                   => 'top left',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Top Left', 'asex'),
                        'value' => 'left top',
                    ),
                    array(
                        'label' => __('Top Right', 'asex'),
                        'value' => 'right top',
                    ),
                    array(
                        'label' => __('Top Center', 'asex'),
                        'value' => 'Center Top',
                    ),
                    array(
                        'label' => __('Center Left', 'asex'),
                        'value' => 'left center',
                    ),
                    array(
                        'label' => __('Center Right', 'asex'),
                        'value' => 'right center',
                    ),
                    array(
                        'label' => __('Center', 'asex'),
                        'value' => 'center center',
                    ),
                    array(
                        'label' => __('Bottom Left', 'asex'),
                        'value' => 'left bottom',
                    ),
                    array(
                        'label' => __('Bottom Right', 'asex'),
                        'value' => 'right bottom',
                    ),
                    array(
                        'label' => __('Bottom Center', 'asex'),
                        'value' => 'center bottom',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'background-position',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'asex_counter_css_border_trbl',
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
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'asex_counter_css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'asex_counter_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'asex_counter_css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'max'                   => '300',
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'asex_counter_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_counter_css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'asex_counter_css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'asex_counter_css_title_color',
                'std'                   => '#797979',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => 'Title'
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'asex_counter_css_title_font_size',
                'std'                   => '36',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'asex_counter_css_title_font_weight',
                'std'                   => '300',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
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
                'id'                    => 'asex_counter_css_title_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => 'Title',
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'asex_counter_css_title_line_height',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'asex_counter_css_title_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'asex_counter_css_title_margin',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
            /**
             * Number
             */
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'asex_counter_css_number_color',
                'std'                   => '#797979',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => 'Number'
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'asex_counter_css_number_font_size',
                'std'                   => '36',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => 'Number',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'asex_counter_css_number_font_weight',
                'std'                   => '300',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => 'Number',
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'asex_counter_css_number_font_family',
                'std'                   => 'Oswald',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => 'Number',
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'asex_counter_css_number_line_height',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => 'Number',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'asex_counter_css_number_margin',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => 'Number',
                'ext'                   => 'px'
            ),
            /**
             * Icon
             */
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'asex_counter_css_icon_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => 'Icon',
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'asex_counter_css_icon_border_color',
                'std'                   => 'rgb(90, 195, 188)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => 'Icon',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'asex_counter_css_icon_border_width',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => 'Icon',
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'asex_counter_css_icon_border_trbl',
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
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => 'Icon'
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'asex_counter_css_icon_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => 'Icon',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'asex_counter_css_icon_color',
                'std'                   => 'rgb(90, 195, 188)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => 'Icon',
            ),
            array(
                'label'   => __('Icon', 'asex'),
                'id'      => 'asex_counter_icon_id',
                'std'     => 'comments',
                'type'    => 'icon',
                'section' => 'styling',
                'tab'     => 'Icon',
            ),
            array(
                'label'                 => __('Margin Top', 'asex'),
                'id'                    => 'asex_counter_css_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'tab'                   => 'Icon',
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Margin Right', 'asex'),
                'id'                    => 'asex_counter_css_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'tab'                   => 'Icon',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_counter_css_icon_padding_vertical',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px',
                'tab'                   => 'Icon',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'asex_counter_css_icon_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => 'Icon',
            ),
            array(
                'label'                 => __('Size ( Wrapper )', 'asex'),
                'id'                    => 'asex_counter_css_icon_wrapper_width',
                'std'                   => '84',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'styling',
                'tab'                   => 'Icon',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            array(
                'label'                 => __('Size ( Icon )', 'asex'),
                'id'                    => 'asex_counter_css_icon_width',
                'std'                   => '31',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => 'Icon',
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
                'label'                 => __('Width', 'asex'),
                'id'                    => 'css_res_t_main_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'width',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => '%',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_res_t_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
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
                'affect_on_change_el'   => '.as-counter-box-wrapper',
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
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size (Title)', 'asex'),
                'id'                    => 'css_res_t_title_font_size',
                'std'                   => '36',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight (Title)', 'asex'),
                'id'                    => 'css_res_t_title_font_weight',
                'std'                   => '300',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Line Height (Title)', 'asex'),
                'id'                    => 'css_res_t_title_line_height',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing (Title)', 'asex'),
                'id'                    => 'css_res_t_title_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom (Title)', 'asex'),
                'id'                    => 'css_res_t_title_margin',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size (Number)', 'asex'),
                'id'                    => 'css_res_t_number_font_size',
                'std'                   => '36',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight (Number)', 'asex'),
                'id'                    => 'css_res_t_number_font_weight',
                'std'                   => '300',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Line Height (Number)', 'asex'),
                'id'                    => 'css_res_t_number_line_height',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom (Number)', 'asex'),
                'id'                    => 'css_res_t_number_margin',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Border Width (Icon)', 'asex'),
                'id'                    => 'css_res_t_icon_border_width',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Border Radius (Icon)', 'asex'),
                'id'                    => 'css_res_t_icon_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Top (Icon)', 'asex'),
                'id'                    => 'css_res_t_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Margin Right (Icon)', 'asex'),
                'id'                    => 'css_res_t_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Padding Vertical (Icon)', 'asex'),
                'id'                    => 'css_res_t_icon_padding_vertical',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal (Icon)', 'asex'),
                'id'                    => 'css_res_t_icon_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Size ( Wrapper (Icon) )', 'asex'),
                'id'                    => 'css_res_t_icon_wrapper_width',
                'std'                   => '84',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            array(
                'label'                 => __('Size ( Icon )', 'asex'),
                'id'                    => 'css_res_t_icon_width',
                'std'                   => '31',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner .dslc-icon',
                'affect_on_change_rule' => 'font-size',
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
                'label'                 => __('Width', 'asex'),
                'id'                    => 'css_res_p_main_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'width',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => '%',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_res_p_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-wrapper',
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
                'affect_on_change_el'   => '.as-counter-box-wrapper',
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
                'affect_on_change_el'   => '.as-counter-box-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size (Title)', 'asex'),
                'id'                    => 'css_res_p_title_font_size',
                'std'                   => '36',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight (Title)', 'asex'),
                'id'                    => 'css_res_p_title_font_weight',
                'std'                   => '300',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Line Height (Title)', 'asex'),
                'id'                    => 'css_res_p_title_line_height',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing (Title)', 'asex'),
                'id'                    => 'css_res_p_title_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom (Title)', 'asex'),
                'id'                    => 'css_res_p_title_margin',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_counter_title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size (Number)', 'asex'),
                'id'                    => 'css_res_p_number_font_size',
                'std'                   => '36',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight (Number)', 'asex'),
                'id'                    => 'css_res_p_number_font_weight',
                'std'                   => '300',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Line Height (Number)', 'asex'),
                'id'                    => 'css_res_p_number_line_height',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom (Number)', 'asex'),
                'id'                    => 'css_res_p_number_margin',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.odometer',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Border Width (Icon)', 'asex'),
                'id'                    => 'css_res_p_icon_border_width',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Border Radius (Icon)', 'asex'),
                'id'                    => 'css_res_p_icon_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Top (Icon)', 'asex'),
                'id'                    => 'css_res_p_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Margin Right (Icon)', 'asex'),
                'id'                    => 'css_res_p_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Padding Vertical (Icon)', 'asex'),
                'id'                    => 'css_res_p_icon_padding_vertical',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal (Icon)', 'asex'),
                'id'                    => 'css_res_p_icon_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Size ( Wrapper (Icon) )', 'asex'),
                'id'                    => 'css_res_p_icon_wrapper_width',
                'std'                   => '84',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            array(
                'label'                 => __('Size ( Icon )', 'asex'),
                'id'                    => 'css_res_p_icon_width',
                'std'                   => '31',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-counter-box-image-inner .dslc-icon',
                'affect_on_change_rule' => 'font-size',
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
        $elements = $options['elements'];
        if (!empty($elements))
            $elements = explode(' ', trim($elements));
        else
            $elements = array();
        ?>
        <div class="as-counter-box-wrapper">
            <?php if (in_array('icon', $elements)) : ?>
                <div class="as-counter-box-image">
                    <div class="as-counter-box-image-inner">
                        <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['asex_counter_icon_id']); ?> as-init-center"></span>
                    </div>
                </div>
            <?php endif; ?>
            <div class="as-counter-content">
                <div class="odometer" data-number="<?php echo esc_attr($options['asex_counter_to_number']); ?>"><?php echo esc_html($options['asex_counter_from_number'], 'asex'); ?></div>
                <?php if (in_array('title', $elements)) : ?>
                    <?php if ($dslc_is_admin) : ?>
                        <h2 class="dslca-editable-content asex_counter_title" data-id="asex_counter_title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['asex_counter_title'], 'asex'); ?></h2>
                    <?php else : ?>
                        <h2 class="asex_counter_title"><?php echo esc_html($options['asex_counter_title'], 'asex'); ?></h2>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php
        // REQUIRED
        $this->module_end($options);
    }

}
