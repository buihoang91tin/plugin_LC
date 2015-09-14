<?php

class Anna_Button extends DSLC_Module
{

    var $module_id;
	var $module_title;
	var $module_icon;
	var $module_category;

	function __construct() {

		$this->module_id = 'Anna_Button';
		$this->module_title = __( 'Button Simple', 'dslc_string' );
		$this->module_icon = 'link';
		$this->module_category = 'as - Button';

	}

    function options()
    {

        $dslc_options = array(

            array(
                'label'   => __( 'Show On', 'dslc_string' ),
                'id'      => 'css_show_on',
                'std'     => 'desktop tablet phone',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __( 'Desktop', 'dslc_string' ),
                        'value' => 'desktop'
                    ),
                    array(
                        'label' => __( 'Tablet', 'dslc_string' ),
                        'value' => 'tablet'
                    ),
                    array(
                        'label' => __( 'Phone', 'dslc_string' ),
                        'value' => 'phone'
                    ),
                ),
            ),

            /**
             * Styling
             */

            array(
                'label'      => __( 'Button Text', 'dslc_string' ),
                'id'         => 'as_button_text',
                'std'        => 'CLICK TO EDIT',
                'type'       => 'text',
                'visibility' => 'hidden',
            ),
            array(
                'label' => __( 'URL', 'dslc_string' ),
                'id'    => 'as_button_url',
                'std'   => '#',
                'type'  => 'text'
            ),
            array(
                'label'   => __( 'Open in', 'dslc_string' ),
                'id'      => 'as_button_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Same Tab', 'dslc_string' ),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __( 'New Tab', 'dslc_string' ),
                        'value' => '_blank',
                    ),
                )
            ),

            array(
                'label'                 => __( 'Align', 'dslc_string' ),
                'id'                    => 'as_button_css_align_position',
                'std'                   => 'left',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __( 'BG Color', 'dslc_string' ),
                'id'                    => 'as_button_css_bg_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __( 'BG Color - Hover', 'dslc_string' ),
                'id'                    => 'as_button_css_bg_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling'
            ),
            array(
                'label'                 => __( 'Border Color', 'dslc_string' ),
                'id'                    => 'as_button_css_border_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __( 'Border Color - Hover', 'dslc_string' ),
                'id'                    => 'as_button_css_border_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'             => __( 'Duration when hover(ms)', 'dslc_string' ),
                'id'                => 'as_button_css_duration_hover',
                'std'               => '300',
                'type'              => 'text',
                'refresh_on_change' => true,
                'section'           => 'styling',
            ),
            array(
                'label'                 => __( 'Border Width', 'dslc_string' ),
                'id'                    => 'as_button_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'   => __( 'Borders', 'dslc_string' ),
                'id'      => 'as_button_css_border_trbl',
                'std'     => 'top right bottom left',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __( 'Top', 'dslc_string' ),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __( 'Right', 'dslc_string' ),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __( 'Bottom', 'dslc_string' ),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __( 'Left', 'dslc_string' ),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __( 'Border Radius', 'dslc_string' ),
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
                'label'                 => __( 'Margin Bottom', 'dslc_string' ),
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
                'label'                 => __( 'Padding Vertical', 'dslc_string' ),
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
                'label'                 => __( 'Padding Horizontal', 'dslc_string' ),
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
                'label'   => __( 'Width', 'dslc_string' ),
                'id'      => 'as_button_css_width',
                'std'     => 'inline-block',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Automatic', 'dslc_string' ),
                        'value' => 'inline-block'
                    ),
                    array(
                        'label' => __( 'Full Width', 'dslc_string' ),
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
                'label'                 => __( 'Out Line Width', 'dslc_string' ),
                'id'                    => 'as_button_out_line_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Out Line Offset', 'dslc_string' ),
                'id'                    => 'as_button_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Out Line Color', 'dslc_string' ),
                'id'                    => 'as_button_out_line_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Out Line Color Hover', 'dslc_string' ),
                'id'                    => 'as_button_out_line_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
            ),
            array(
                'label'   => __( 'Out Line Style', 'dslc_string' ) ,
                'id'      => 'as_button_out_line_style',
                'std'     => 'solid',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Invisible', 'dslc_string' ) ,
                        'value' => 'invisible'
                    ),
                    array(
                        'label' => __( 'Solid', 'dslc_string' ) ,
                        'value' => 'solid'
                    ),
                    array(
                        'label' => __( 'Dashed', 'dslc_string' ) ,
                        'value' => 'dashed'
                    ),
                    array(
                        'label' => __( 'Dotted', 'dslc_string' ) ,
                        'value' => 'dotted'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'outline-style',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
            ),
            /**
             * Typography
             */

            array(
                'label'                 => __( 'Color', 'dslc_string' ),
                'id'                    => 'as_button_css_button_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __( 'typography', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Color - Hover', 'dslc_string' ),
                'id'                    => 'as_button_css_button_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __( 'typography', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Font Size', 'dslc_string' ),
                'id'                    => 'as_button_css_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __( 'typography', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Font Weight', 'dslc_string' ),
                'id'                    => 'as_button_css_button_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __( 'typography', 'dslc_string' ),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __( 'Font Family', 'dslc_string' ),
                'id'                    => 'as_button_css_button_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __( 'typography', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Letter Spacing', 'dslc_string' ),
                'id'                    => 'as_button_css_button_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __( 'typography', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            /**
             * Icon
             */

            array(
                'label'   => __( 'Enable/Disable', 'dslc_string' ),
                'id'      => 'as_button_state',
                'std'     => 'enabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Disabled', 'dslc_string' ),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __( 'Enabled', 'dslc_string' ),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __( 'icon', 'dslc_string' ),
            ),
            array(
                'label'   => __( 'Position Icon', 'dslc_string' ),
                'id'      => 'as_button_position_icon',
                'std'     => 'left',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Left', 'dslc_string' ),
                        'value' => 'left'
                    ),
                    array(
                        'label' => __( 'Right', 'dslc_string' ),
                        'value' => 'right'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __( 'icon', 'dslc_string' ),
            ),
            array(
                'label'   => __( 'Icon', 'dslc_string' ),
                'id'      => 'as_button_icon_id',
                'std'     => 'link',
                'type'    => 'icon',
                'section' => 'styling',
                'tab'     => __( 'icon', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Font Size', 'dslc_string' ),
                'id'                    => 'as_button_css_icon_font_size',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __( 'icon', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Color', 'dslc_string' ),
                'id'                    => 'as_button_css_icon_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __( 'icon', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Color - Hover', 'dslc_string' ),
                'id'                    => 'as_button_css_icon_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a:hover .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __( 'icon', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Margin Right', 'dslc_string' ),
                'id'                    => 'as_button_css_icon_margin_right',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __( 'icon', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Margin Left', 'dslc_string' ),
                'id'                    => 'as_button_css_icon_margin_left',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __( 'icon', 'dslc_string' ),
            ),

            /**
             * Wrapper
             */

            array(
                'label'                 => __( ' BG Color', 'dslc_string' ),
                'id'                    => 'as_button_css_wrapper_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __( 'wrapper', 'dslc_string' )
            ),
            array(
                'label'                 => __( 'BG Image', 'dslc_string' ),
                'id'                    => 'as_button_css_wrapper_bg_img',
                'std'                   => '',
                'type'                  => 'image',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-image',
                'section'               => 'styling',
                'tab'                   => __( 'wrapper', 'dslc_string' )
            ),
            array(
                'label'   => __( 'BG Image Repeat', 'dslc_string' ),
                'id'      => 'as_button_css_wrapper_bg_img_repeat',
                'std'     => 'repeat',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Repeat', 'dslc_string' ),
                        'value' => 'repeat',
                    ),
                    array(
                        'label' => __( 'Repeat Horizontal', 'dslc_string' ),
                        'value' => 'repeat-x',
                    ),
                    array(
                        'label' => __( 'Repeat Vertical', 'dslc_string' ),
                        'value' => 'repeat-y',
                    ),
                    array(
                        'label' => __( 'Do NOT Repeat', 'dslc_string' ),
                        'value' => 'no-repeat',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
                'tab'                   => __( 'wrapper', 'dslc_string' )
            ),
            array(
                'label'   => __( 'BG Image Attachment', 'dslc_string' ),
                'id'      => 'as_button_css_wrapper_bg_img_attch',
                'std'     => 'scroll',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Scroll', 'dslc_string' ),
                        'value' => 'scroll',
                    ),
                    array(
                        'label' => __( 'Fixed', 'dslc_string' ),
                        'value' => 'fixed',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-attachment',
                'section'               => 'styling',
                'tab'                   => __( 'wrapper', 'dslc_string' )
            ),
            array(
                'label'   => __( 'BG Image Position', 'dslc_string' ),
                'id'      => 'as_button_css_wrapper_bg_img_pos',
                'std'     => 'top left',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Top Left', 'dslc_string' ),
                        'value' => 'left top',
                    ),
                    array(
                        'label' => __( 'Top Right', 'dslc_string' ),
                        'value' => 'right top',
                    ),
                    array(
                        'label' => __( 'Top Center', 'dslc_string' ),
                        'value' => 'Center Top',
                    ),
                    array(
                        'label' => __( 'Center Left', 'dslc_string' ),
                        'value' => 'left center',
                    ),
                    array(
                        'label' => __( 'Center Right', 'dslc_string' ),
                        'value' => 'right center',
                    ),
                    array(
                        'label' => __( 'Center', 'dslc_string' ),
                        'value' => 'center center',
                    ),
                    array(
                        'label' => __( 'Bottom Left', 'dslc_string' ),
                        'value' => 'left bottom',
                    ),
                    array(
                        'label' => __( 'Bottom Right', 'dslc_string' ),
                        'value' => 'right bottom',
                    ),
                    array(
                        'label' => __( 'Bottom Center', 'dslc_string' ),
                        'value' => 'center bottom',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'background-position',
                'section'               => 'styling',
                'tab'                   => __( 'wrapper', 'dslc_string' )
            ),
            array(
                'label'                 => __( 'Border Color', 'dslc_string' ),
                'id'                    => 'as_button_css_wrapper_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __( 'wrapper', 'dslc_string' )
            ),
            array(
                'label'                 => __( 'Border Width', 'dslc_string' ),
                'id'                    => 'as_button_css_wrapper_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __( 'wrapper', 'dslc_string' )
            ),
            array(
                'label'   => __( 'Borders', 'dslc_string' ),
                'id'      => 'as_button_css_wrapper_border_trbl',
                'std'     => 'top right bottom left',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __( 'Top', 'dslc_string' ),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __( 'Right', 'dslc_string' ),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __( 'Bottom', 'dslc_string' ),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __( 'Left', 'dslc_string' ),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __( 'wrapper', 'dslc_string' )
            ),
            array(
                'label'                 => __( 'Border Radius - Top', 'dslc_string' ),
                'id'                    => 'as_button_css_wrapper_border_radius_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __( 'wrapper', 'dslc_string' )
            ),
            array(
                'label'                 => __( 'Border Radius - Bottom', 'dslc_string' ),
                'id'                    => 'as_button_css_wrapper_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __( 'wrapper', 'dslc_string' )
            ),
            array(
                'label'                 => __( 'Padding Vertical', 'dslc_string' ),
                'id'                    => 'as_button_css_wrapper_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __( 'wrapper', 'dslc_string' )
            ),
            array(
                'label'                 => __( 'Padding Horizontal', 'dslc_string' ),
                'id'                    => 'as_button_css_wrapper_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __( 'wrapper', 'dslc_string' )
            ),

            /**
             * Responsive Tablet
             */

            array(
                'label'   => __( 'Responsive Styling', 'dslc_string' ),
                'id'      => 'css_res_t',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Disabled', 'dslc_string' ),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __( 'Enabled', 'dslc_string' ),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __( 'tablet', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Margin Bottom', 'dslc_string' ),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __( 'tablet', 'dslc_string' ),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __( 'Padding Vertical', 'dslc_string' ),
                'id'                    => 'css_res_t_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __( 'tablet', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Padding Horizontal', 'dslc_string' ),
                'id'                    => 'css_res_t_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __( 'tablet', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Font Size', 'dslc_string' ),
                'id'                    => 'css_res_t_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __( 'tablet', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Icon - Margin Right', 'dslc_string' ),
                'id'                    => 'css_res_t_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __( 'tablet', 'dslc_string' ),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __( 'Align', 'dslc_string' ),
                'id'                    => 'css_res_t_align',
                'std'                   => 'left',
                'type'                  => 'select',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'responsive',
                'tab'                   => __( 'tablet', 'dslc_string' ),
                'choices'               => array(
                    array(
                        'label' => __( 'Left', 'dslc_string' ),
                        'value' => 'left',
                    ),
                    array(
                        'label' => __( 'Center', 'dslc_string' ),
                        'value' => 'center',
                    ),
                    array(
                        'label' => __( 'Right', 'dslc_string' ),
                        'value' => 'right',
                    ),
                )
            ),

            /**
             * Responsive Phone
             */

            array(
                'label'   => __( 'Responsive Styling', 'dslc_string' ),
                'id'      => 'css_res_p',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Disabled', 'dslc_string' ),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __( 'Enabled', 'dslc_string' ),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __( 'phone', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Margin Bottom', 'dslc_string' ),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __( 'phone', 'dslc_string' ),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __( 'Padding Vertical', 'dslc_string' ),
                'id'                    => 'css_res_p_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __( 'phone', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Padding Horizontal', 'dslc_string' ),
                'id'                    => 'css_res_p_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __( 'phone', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Font Size', 'dslc_string' ),
                'id'                    => 'css_res_p_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __( 'phone', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Icon - Margin Right', 'dslc_string' ),
                'id'                    => 'css_res_p_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __( 'phone', 'dslc_string' ),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __( 'Align', 'dslc_string' ),
                'id'                    => 'css_res_ph_align',
                'std'                   => 'left',
                'type'                  => 'select',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'responsive',
                'tab'                   => __( 'phone', 'dslc_string' ),
                'choices'               => array(
                    array(
                        'label' => __( 'Left', 'dslc_string' ),
                        'value' => 'left',
                    ),
                    array(
                        'label' => __( 'Center', 'dslc_string' ),
                        'value' => 'center',
                    ),
                    array(
                        'label' => __( 'Right', 'dslc_string' ),
                        'value' => 'right',
                    ),
                )
            ),
        );

        $dslc_options = array_merge( $dslc_options, $this->shared_options('animation_options') );
		$dslc_options = array_merge( $dslc_options, $this->presets_options() );

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

        /* Module output starts here */
        ?>
        <div class="as-button-lc">
            <?php
                $duration_hover = '';
                $value_duration = $options['as_button_css_duration_hover'];
                if ( $value_duration != '' ){
                    $duration_hover = 'style="-webkit-transition: all '. $value_duration .'ms ease;-moz-transition: all '. $value_duration .'ms ease;-ms-transition: all '. $value_duration .'ms ease;-o-transition: all '. $value_duration .'ms ease;transition: all '. $value_duration .'ms ease;"';
                }
            ?>
            <a href="<?php echo do_shortcode( $options['as_button_url'] ); ?>" target="<?php echo $options['as_button_target']; ?>" <?php echo $duration_hover; ?>>
                <?php if ( $options['as_button_position_icon'] == 'left' ) : ?>
                    <?php if ( $options['as_button_state'] == 'enabled' ) : ?>
                        <span class="dslc-icon dslc-icon-<?php echo $options['as_button_icon_id']; ?>"></span>
                    <?php endif; ?>
                <?php endif; ?>
                <span class="dslca-editable-content" data-id="as_button_text"  data-type="simple" <?php if ( $dslc_is_admin ) echo 'contenteditable'; ?>><?php echo $options['as_button_text']; ?></span>
                <?php if ( $options['as_button_position_icon'] == 'right' ) : ?>
                    <?php if ( $options['as_button_state'] == 'enabled' ) : ?>
                        <span class="dslc-icon dslc-icon-<?php echo $options['as_button_icon_id']; ?>"></span>
                    <?php endif; ?>
                <?php endif; ?>
            </a>
        </div>

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
