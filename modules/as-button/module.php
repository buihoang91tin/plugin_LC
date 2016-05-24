<?php

class ASEX_Button extends ASEX_MODULE {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'ASEX_Button';
        $this->module_title    = __('AS - Button Simple', 'asex');
        $this->module_icon     = 'link';
        $this->module_category = 'as - element';
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
            /**
             * Styling
             */
            array(
                'label'      => __('Button Text', 'asex'),
                'id'         => 'asex_button_text',
                'std'        => __('CLICK TO EDIT','asex'),
                'type'       => 'text',
                'visibility' => 'hidden',
            ),
            array(
                'label' => __('URL', 'asex'),
                'id'    => 'asex_button_url',
                'std'   => '#',
                'type'  => 'text'
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
                )
            ),
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'asex_button_css_align_position',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'asex_button_css_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Color - Hover', 'asex'),
                'id'                    => 'asex_button_css_bg_color_hover',
                'std'                   => '#00b9cf',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling'
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'asex_button_css_border_color',
                'std'                   => '#212121',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color - Hover', 'asex'),
                'id'                    => 'asex_button_css_border_color_hover',
                'std'                   => '#00b9cf',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'             => __('Duration when hover(ms)', 'asex'),
                'id'                => 'asex_button_css_duration_hover',
                'std'               => '300',
                'type'              => 'text',
                'refresh_on_change' => true,
                'section'           => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'asex_button_css_border_width',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
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
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'asex_button_css_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'asex_button_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_button_css_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'asex_button_css_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
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
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'display',
                'section'               => 'styling',
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
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Offset', 'asex'),
                'id'                    => 'asex_button_out_line_offset',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Color', 'asex'),
                'id'                    => 'asex_button_out_line_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'asex'),
            ),
            array(
                'label'                 => __('Out Line Color Hover', 'asex'),
                'id'                    => 'asex_button_out_line_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover',
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
                'affect_on_change_el'   => '.as-button-lc a',
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
                'std'                   => '#212121',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography', 'asex'),
            ),
            array(
                'label'                 => __('Color - Hover', 'asex'),
                'id'                    => 'asex_button_css_button_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography', 'asex'),
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'asex_button_css_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('typography', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'asex_button_css_button_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('typography', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'asex_button_css_button_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('typography', 'asex'),
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'asex_button_css_button_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('typography', 'asex'),
                'ext'                   => 'px'
            ),
            /**
             * Icon
             */
            array(
                'label'   => __('Enable/Disable', 'asex'),
                'id'      => 'asex_button_state',
                'std'     => 'enabled',
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
                'section' => 'styling',
                'tab'     => __('icon', 'asex'),
            ),
            array(
                'label'   => __('Position Icon', 'asex'),
                'id'      => 'asex_button_position_icon',
                'std'     => 'left',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Left', 'asex'),
                        'value' => 'left'
                    ),
                    array(
                        'label' => __('Right', 'asex'),
                        'value' => 'right'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('icon', 'asex'),
            ),
            array(
                'label'   => __('Icon', 'asex'),
                'id'      => 'asex_button_icon_id',
                'std'     => 'link',
                'type'    => 'icon',
                'section' => 'styling',
                'tab'     => __('icon', 'asex'),
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'asex_button_css_icon_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('icon', 'asex'),
            ),
            array(
                'label'                 => __('Color - Hover', 'asex'),
                'id'                    => 'asex_button_css_icon_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('icon', 'asex'),
            ),
            array(
                'label'                 => __('Margin Right', 'asex'),
                'id'                    => 'asex_button_css_icon_margin_right',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('icon', 'asex'),
            ),
            array(
                'label'                 => __('Margin Left', 'asex'),
                'id'                    => 'asex_button_css_icon_margin_left',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('icon', 'asex'),
            ),
            /**
             * Wrapper
             */
            array(
                'label'                 => __(' BG Color', 'asex'),
                'id'                    => 'asex_button_css_wrapper_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('BG Image', 'asex'),
                'id'                    => 'asex_button_css_wrapper_bg_img',
                'std'                   => '',
                'type'                  => 'image',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-image',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('BG Image Repeat', 'asex'),
                'id'                    => 'asex_button_css_wrapper_bg_img_repeat',
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
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('BG Image Attachment', 'asex'),
                'id'                    => 'asex_button_css_wrapper_bg_img_attch',
                'std'                   => 'scroll',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Scroll', 'asex'),
                        'value' => 'scroll',
                    ),
                    array(
                        'label' => __('Fixed', 'asex'),
                        'value' => 'fixed',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-attachment',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('BG Image Position', 'asex'),
                'id'                    => 'asex_button_css_wrapper_bg_img_pos',
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
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-position',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'asex_button_css_wrapper_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'asex_button_css_wrapper_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'asex_button_css_wrapper_border_trbl',
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
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('Border Radius - Top', 'asex'),
                'id'                    => 'asex_button_css_wrapper_border_radius_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'asex'),
                'id'                    => 'asex_button_css_wrapper_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_button_css_wrapper_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'asex')
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'asex_button_css_wrapper_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('wrapper', 'asex')
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
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_res_t_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_res_t_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'css_res_t_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'asex'),
                'id'                    => 'css_res_t_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'css_res_t_align',
                'std'                   => 'left',
                'type'                  => 'select',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'choices'               => array(
                    array(
                        'label' => __('Left', 'asex'),
                        'value' => 'left',
                    ),
                    array(
                        'label' => __('Center', 'asex'),
                        'value' => 'center',
                    ),
                    array(
                        'label' => __('Right', 'asex'),
                        'value' => 'right',
                    ),
                )
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
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_res_p_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_res_p_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'css_res_p_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'asex'),
                'id'                    => 'css_res_p_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'css_res_ph_align',
                'std'                   => 'left',
                'type'                  => 'select',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'choices'               => array(
                    array(
                        'label' => __('Left', 'asex'),
                        'value' => 'left',
                    ),
                    array(
                        'label' => __('Center', 'asex'),
                        'value' => 'center',
                    ),
                    array(
                        'label' => __('Right', 'asex'),
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
            $value_duration = $options['asex_button_css_duration_hover'];
            if ($value_duration != '') {
                $duration_hover = 'style="-webkit-transition: all ' . $value_duration . 'ms ease;-moz-transition: all ' . $value_duration . 'ms ease;-ms-transition: all ' . $value_duration . 'ms ease;-o-transition: all ' . $value_duration . 'ms ease;transition: all ' . $value_duration . 'ms ease;"';
            }
            ?>
            <a href="<?php echo do_shortcode($options['asex_button_url']); ?>" target="<?php echo esc_attr($options['asex_button_target']); ?>" <?php echo ($duration_hover); ?>>
                <?php if ($options['asex_button_position_icon'] == 'left') : ?>
                    <?php if ($options['asex_button_state'] == 'enabled') : ?>
                        <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['asex_button_icon_id']); ?>"></span>
                    <?php endif; ?>
                <?php endif; ?>
                <span class="dslca-editable-content" data-id="asex_button_text"  data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['asex_button_text'], 'asex'); ?></span>
                <?php if ($options['asex_button_position_icon'] == 'right') : ?>
                    <?php if ($options['asex_button_state'] == 'enabled') : ?>
                        <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['asex_button_icon_id']); ?>"></span>
                    <?php endif; ?>
                <?php endif; ?>
            </a>
        </div>

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
