<?php

class AS_Button extends DSLC_Module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_Button';
        $this->module_title    = __('AS - Button Simple', 'alenastudio_plugin');
        $this->module_icon     = 'link';
        $this->module_category = 'as - element';
    }

    function options() {

        $dslc_options = array(
            array(
                'label'   => __('Show On', 'alenastudio_plugin'),
                'id'      => 'css_show_on',
                'std'     => 'desktop tablet phone',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Desktop', 'alenastudio_plugin'),
                        'value' => 'desktop'
                    ),
                    array(
                        'label' => __('Tablet', 'alenastudio_plugin'),
                        'value' => 'tablet'
                    ),
                    array(
                        'label' => __('Phone', 'alenastudio_plugin'),
                        'value' => 'phone'
                    ),
                ),
            ),
            /**
             * Styling
             */
            array(
                'label'      => __('Button Text', 'alenastudio_plugin'),
                'id'         => 'as_button_text',
                'std'        => __('CLICK TO EDIT','alenastudio'),
                'type'       => 'text',
                'visibility' => 'hidden',
            ),
            array(
                'label' => __('URL', 'alenastudio_plugin'),
                'id'    => 'as_button_url',
                'std'   => '#',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Open in', 'alenastudio_plugin'),
                'id'      => 'as_button_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'alenastudio_plugin'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'alenastudio_plugin'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'label'                 => __('Align', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_align_position',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Padding Vertical Wrapper', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_padding_vertical_wrapper',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal Wrapper', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_padding_horizontal_wrapper',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('BG Color', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Color - Hover', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_bg_color_hover',
                'std'                   => '#00b9cf',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling'
            ),
            array(
                'label'                 => __('Border Color', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_border_color',
                'std'                   => '#212121',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color - Hover', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_border_color_hover',
                'std'                   => '#00b9cf',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'             => __('Duration when hover(ms)', 'alenastudio_plugin'),
                'id'                => 'as_button_css_duration_hover',
                'std'               => '300',
                'type'              => 'text',
                'refresh_on_change' => true,
                'section'           => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_border_width',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Borders', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_border_trbl',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'alenastudio_plugin'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'alenastudio_plugin'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'alenastudio_plugin'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'alenastudio_plugin'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Bottom', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_width',
                'std'                   => 'inline-block',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Automatic', 'alenastudio_plugin'),
                        'value' => 'inline-block'
                    ),
                    array(
                        'label' => __('Full Width', 'alenastudio_plugin'),
                        'value' => 'block'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'display',
                'section'               => 'styling',
            ),
            /**
             * Out line Style
             */
            array(
                'label'                 => __('Out Line Width', 'alenastudio_plugin'),
                'id'                    => 'as_button_out_line_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Offset', 'alenastudio_plugin'),
                'id'                    => 'as_button_out_line_offset',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Color', 'alenastudio_plugin'),
                'id'                    => 'as_button_out_line_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Out Line Color Hover', 'alenastudio_plugin'),
                'id'                    => 'as_button_out_line_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Out Line Style', 'alenastudio_plugin'),
                'id'                    => 'as_button_out_line_style',
                'std'                   => 'solid',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Invisible', 'alenastudio_plugin'),
                        'value' => 'invisible'
                    ),
                    array(
                        'label' => __('Solid', 'alenastudio_plugin'),
                        'value' => 'solid'
                    ),
                    array(
                        'label' => __('Dashed', 'alenastudio_plugin'),
                        'value' => 'dashed'
                    ),
                    array(
                        'label' => __('Dotted', 'alenastudio_plugin'),
                        'value' => 'dotted'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'outline-style',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'alenastudio_plugin'),
            ),
            /**
             * Typography
             */
            array(
                'label'                 => __('Color', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_button_color',
                'std'                   => '#212121',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Color - Hover', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_button_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Font Size', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('typography', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_button_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('typography', 'alenastudio_plugin'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_button_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('typography', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Letter Spacing', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_button_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('typography', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            /**
             * Icon
             */
            array(
                'label'   => __('Enable/Disable', 'alenastudio_plugin'),
                'id'      => 'as_button_state',
                'std'     => 'enabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'alenastudio_plugin'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'alenastudio_plugin'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('icon', 'alenastudio_plugin'),
            ),
            array(
                'label'   => __('Position Icon', 'alenastudio_plugin'),
                'id'      => 'as_button_position_icon',
                'std'     => 'left',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Left', 'alenastudio_plugin'),
                        'value' => 'left'
                    ),
                    array(
                        'label' => __('Right', 'alenastudio_plugin'),
                        'value' => 'right'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('icon', 'alenastudio_plugin'),
            ),
            array(
                'label'   => __('Icon', 'alenastudio_plugin'),
                'id'      => 'as_button_icon_id',
                'std'     => 'link',
                'type'    => 'icon',
                'section' => 'styling',
                'tab'     => __('icon', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Color', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_icon_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('icon', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Color - Hover', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_icon_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('icon', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Margin Right', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_icon_margin_right',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('icon', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Margin Left', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_icon_margin_left',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('icon', 'alenastudio_plugin'),
            ),
            /**
             * Wrapper
             */
            array(
                'label'                 => __(' BG Color', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_wrapper_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'alenastudio_plugin')
            ),
            array(
                'label'                 => __('BG Image', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_wrapper_bg_img',
                'std'                   => '',
                'type'                  => 'image',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-image',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'alenastudio_plugin')
            ),
            array(
                'label'                 => __('BG Image Repeat', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_wrapper_bg_img_repeat',
                'std'                   => 'repeat',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Repeat', 'alenastudio_plugin'),
                        'value' => 'repeat',
                    ),
                    array(
                        'label' => __('Repeat Horizontal', 'alenastudio_plugin'),
                        'value' => 'repeat-x',
                    ),
                    array(
                        'label' => __('Repeat Vertical', 'alenastudio_plugin'),
                        'value' => 'repeat-y',
                    ),
                    array(
                        'label' => __('Do NOT Repeat', 'alenastudio_plugin'),
                        'value' => 'no-repeat',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'alenastudio_plugin')
            ),
            array(
                'label'                 => __('BG Image Attachment', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_wrapper_bg_img_attch',
                'std'                   => 'scroll',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Scroll', 'alenastudio_plugin'),
                        'value' => 'scroll',
                    ),
                    array(
                        'label' => __('Fixed', 'alenastudio_plugin'),
                        'value' => 'fixed',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-attachment',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'alenastudio_plugin')
            ),
            array(
                'label'                 => __('BG Image Position', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_wrapper_bg_img_pos',
                'std'                   => 'top left',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Top Left', 'alenastudio_plugin'),
                        'value' => 'left top',
                    ),
                    array(
                        'label' => __('Top Right', 'alenastudio_plugin'),
                        'value' => 'right top',
                    ),
                    array(
                        'label' => __('Top Center', 'alenastudio_plugin'),
                        'value' => 'Center Top',
                    ),
                    array(
                        'label' => __('Center Left', 'alenastudio_plugin'),
                        'value' => 'left center',
                    ),
                    array(
                        'label' => __('Center Right', 'alenastudio_plugin'),
                        'value' => 'right center',
                    ),
                    array(
                        'label' => __('Center', 'alenastudio_plugin'),
                        'value' => 'center center',
                    ),
                    array(
                        'label' => __('Bottom Left', 'alenastudio_plugin'),
                        'value' => 'left bottom',
                    ),
                    array(
                        'label' => __('Bottom Right', 'alenastudio_plugin'),
                        'value' => 'right bottom',
                    ),
                    array(
                        'label' => __('Bottom Center', 'alenastudio_plugin'),
                        'value' => 'center bottom',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-position',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'alenastudio_plugin')
            ),
            array(
                'label'                 => __('Border Color', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_wrapper_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'alenastudio_plugin')
            ),
            array(
                'label'                 => __('Border Width', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_wrapper_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'alenastudio_plugin')
            ),
            array(
                'label'                 => __('Borders', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_wrapper_border_trbl',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'alenastudio_plugin'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'alenastudio_plugin'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'alenastudio_plugin'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'alenastudio_plugin'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'alenastudio_plugin')
            ),
            array(
                'label'                 => __('Border Radius - Top', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_wrapper_border_radius_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'alenastudio_plugin')
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_wrapper_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'alenastudio_plugin')
            ),
            array(
                'label'                 => __('Padding Vertical', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_wrapper_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'alenastudio_plugin')
            ),
            array(
                'label'                 => __('Padding Horizontal', 'alenastudio_plugin'),
                'id'                    => 'as_button_css_wrapper_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'alenastudio_plugin')
            ),
            /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive Styling', 'alenastudio_plugin'),
                'id'      => 'css_res_t',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'alenastudio_plugin'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'alenastudio_plugin'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('tablet', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'alenastudio_plugin'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'alenastudio_plugin'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'alenastudio_plugin'),
                'id'                    => 'css_res_t_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'alenastudio_plugin'),
                'id'                    => 'css_res_t_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size', 'alenastudio_plugin'),
                'id'                    => 'css_res_t_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'alenastudio_plugin'),
                'id'                    => 'css_res_t_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'alenastudio_plugin'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Align', 'alenastudio_plugin'),
                'id'                    => 'css_res_t_align',
                'std'                   => 'left',
                'type'                  => 'select',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'alenastudio_plugin'),
                'choices'               => array(
                    array(
                        'label' => __('Left', 'alenastudio_plugin'),
                        'value' => 'left',
                    ),
                    array(
                        'label' => __('Center', 'alenastudio_plugin'),
                        'value' => 'center',
                    ),
                    array(
                        'label' => __('Right', 'alenastudio_plugin'),
                        'value' => 'right',
                    ),
                )
            ),
            /**
             * Responsive Phone
             */
            array(
                'label'   => __('Responsive Styling', 'alenastudio_plugin'),
                'id'      => 'css_res_p',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'alenastudio_plugin'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'alenastudio_plugin'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('phone', 'alenastudio_plugin'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'alenastudio_plugin'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'alenastudio_plugin'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'alenastudio_plugin'),
                'id'                    => 'css_res_p_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'alenastudio_plugin'),
                'id'                    => 'css_res_p_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size', 'alenastudio_plugin'),
                'id'                    => 'css_res_p_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'alenastudio_plugin'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'alenastudio_plugin'),
                'id'                    => 'css_res_p_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'alenastudio_plugin'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Align', 'alenastudio_plugin'),
                'id'                    => 'css_res_ph_align',
                'std'                   => 'left',
                'type'                  => 'select',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'alenastudio_plugin'),
                'choices'               => array(
                    array(
                        'label' => __('Left', 'alenastudio_plugin'),
                        'value' => 'left',
                    ),
                    array(
                        'label' => __('Center', 'alenastudio_plugin'),
                        'value' => 'center',
                    ),
                    array(
                        'label' => __('Right', 'alenastudio_plugin'),
                        'value' => 'right',
                    ),
                )
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

        /* Module output starts here */
        ?>
        <div class="as-button-lc">
            <?php
            $duration_hover = '';
            $value_duration = $options['as_button_css_duration_hover'];
            if ($value_duration != '') {
                $duration_hover = 'style="-webkit-transition: all ' . $value_duration . 'ms ease;-moz-transition: all ' . $value_duration . 'ms ease;-ms-transition: all ' . $value_duration . 'ms ease;-o-transition: all ' . $value_duration . 'ms ease;transition: all ' . $value_duration . 'ms ease;"';
            }
            ?>
            <a href="<?php echo do_shortcode($options['as_button_url']); ?>" target="<?php echo esc_attr($options['as_button_target']); ?>" <?php echo ($duration_hover); ?>>
                <?php if ($options['as_button_position_icon'] == 'left') : ?>
                    <?php if ($options['as_button_state'] == 'enabled') : ?>
                        <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['as_button_icon_id']); ?>"></span>
                    <?php endif; ?>
                <?php endif; ?>
                <span class="dslca-editable-content" data-id="as_button_text"  data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['as_button_text'], 'alenastudio'); ?></span>
                <?php if ($options['as_button_position_icon'] == 'right') : ?>
                    <?php if ($options['as_button_state'] == 'enabled') : ?>
                        <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['as_button_icon_id']); ?>"></span>
                    <?php endif; ?>
                <?php endif; ?>
            </a>
        </div>

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
