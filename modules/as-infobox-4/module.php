<?php

class AS_Info_Box_4 extends as_module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_Info_Box_4';
        $this->module_title    = __('Info Box 4', 'as_extension');
        $this->module_icon     = 'info';
        $this->module_category = 'as - Info Box';
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
                'label' => __('Title Link', 'as_extension'),
                'id'    => 'title_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Title Link - Open in', 'as_extension'),
                'id'      => 'title_link_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'as_extension'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'as_extension'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'label' => __('Icon Link', 'as_extension'),
                'id'    => 'icon_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Icon Link - Open in', 'as_extension'),
                'id'      => 'icon_link_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'as_extension'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'as_extension'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'label' => __('Primary Button Link', 'as_extension'),
                'id'    => 'button_link',
                'std'   => '#',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Primary Button - Open in', 'as_extension'),
                'id'      => 'button_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'as_extension'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'as_extension'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'label' => __('Secondary Button Link', 'as_extension'),
                'id'    => 'button_2_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Secondary Button - Open in', 'as_extension'),
                'id'      => 'button_2_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'as_extension'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'as_extension'),
                        'value' => '_blank',
                    ),
                )
            ),
            /**
             * General
             */
            array(
                'label'   => __('Elements', 'as_extension'),
                'id'      => 'elements',
                'std'     => 'icon title content button',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Icon', 'as_extension'),
                        'value' => 'icon'
                    ),
                    array(
                        'label' => __('Title', 'as_extension'),
                        'value' => 'title'
                    ),
                    array(
                        'label' => __('Content', 'as_extension'),
                        'value' => 'content'
                    ),
                    array(
                        'label' => __('Button', 'as_extension'),
                        'value' => 'button'
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'                 => __('Align', 'as_extension'),
                'id'                    => 'text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'css_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image', 'as_extension'),
                'id'                    => 'css_bg_img',
                'std'                   => '',
                'type'                  => 'image',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-image',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Repeat', 'as_extension'),
                'id'                    => 'css_bg_img_repeat',
                'std'                   => 'repeat',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Repeat', 'as_extension'),
                        'value' => 'repeat',
                    ),
                    array(
                        'label' => __('Repeat Horizontal', 'as_extension'),
                        'value' => 'repeat-x',
                    ),
                    array(
                        'label' => __('Repeat Vertical', 'as_extension'),
                        'value' => 'repeat-y',
                    ),
                    array(
                        'label' => __('Do NOT Repeat', 'as_extension'),
                        'value' => 'no-repeat',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Attachment', 'as_extension'),
                'id'                    => 'css_bg_img_attch',
                'std'                   => 'scroll',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Scroll', 'as_extension'),
                        'value' => 'scroll',
                    ),
                    array(
                        'label' => __('Fixed', 'as_extension'),
                        'value' => 'fixed',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-attachment',
                'section'               => 'styling',
            ),
            array(
                'id'                    => 'css_bg_img_size',
		        'std'                   => 'auto',
		        'label'                 => __('BG Image Size', 'as_extension'),
		        'type'                  => 'select',
		        'choices'               => array(
		            array(
		                'label' => __('Original', 'as_extension'),
		                'value' => 'auto',
		            ),
		            array(
		                'label' => __('Cover', 'as_extension'),
		                'value' => 'cover',
		            ),
		            array(
		                'label' => __('Contain', 'as_extension'),
		                'value' => 'contain',
		            ),
		        ),
		        'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
		        'affect_on_change_rule' => 'background-size',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Position', 'as_extension'),
                'id'                    => 'css_bg_img_pos',
                'std'                   => 'top left',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Top Left', 'as_extension'),
                        'value' => 'left top',
                    ),
                    array(
                        'label' => __('Top Right', 'as_extension'),
                        'value' => 'right top',
                    ),
                    array(
                        'label' => __('Top Center', 'as_extension'),
                        'value' => 'Center Top',
                    ),
                    array(
                        'label' => __('Center Left', 'as_extension'),
                        'value' => 'left center',
                    ),
                    array(
                        'label' => __('Center Right', 'as_extension'),
                        'value' => 'right center',
                    ),
                    array(
                        'label' => __('Center', 'as_extension'),
                        'value' => 'center center',
                    ),
                    array(
                        'label' => __('Bottom Left', 'as_extension'),
                        'value' => 'left bottom',
                    ),
                    array(
                        'label' => __('Bottom Right', 'as_extension'),
                        'value' => 'right bottom',
                    ),
                    array(
                        'label' => __('Bottom Center', 'as_extension'),
                        'value' => 'center bottom',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-position',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'as_extension'),
                'id'                    => 'css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'as_extension'),
                'id'                    => 'css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Borders', 'as_extension'),
                'id'                    => 'css_border_trbl',
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
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'as_extension'),
                'id'                    => 'css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Z-index', 'as_extension'),
                'id'                    => 'css_margin_z_index',
                'std'                   => '999',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'z-index',
                'section'               => 'styling',
                'max'                   => 1000,
            ),
            array(
                'label'                 => __('Margin Top', 'as_extension'),
                'id'                    => 'css_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => -100,
                'ma~x'                  => 100,
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Minimum Height', 'as_extension'),
                'id'                    => 'css_min_height',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'min-height',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 1000,
                'increment'             => 5
            ),
            array(
                'label'                 => __('Width', 'as_extension'),
                'id'                    => 'css_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-main-wrap',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'styling',
                'ext'                   => '%'
            ),
            /**
             * Icon
             */
            array(
                'label'                 => __('Align', 'as_extension'),
                'id'                    => 'css_icon_text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image > .hi-icon-wrap',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
            ),
            array(
                'label'             => __('Icon', 'as_extension'),
                'id'                => 'icon_id',
                'std'               => 'comments',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Icon', 'as_extension'),
                'include_in_preset' => false
            ),
            array(
                'label'   => __('Effect Style', 'as_extension'),
                'id'      => 'as_effect_id',
                'std'     => 'hi-icon-effect-1 hi-icon-effect-1a',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Style 1a', 'as_extension'),
                        'value' => 'hi-icon-effect-1 hi-icon-effect-1a',
                    ),
                    array(
                        'label' => __('Style 1b', 'as_extension'),
                        'value' => 'hi-icon-effect-1 hi-icon-effect-1b',
                    ),
                    array(
                        'label' => __('Style 2a', 'as_extension'),
                        'value' => 'hi-icon-effect-2 hi-icon-effect-2a',
                    ),
                    array(
                        'label' => __('Style 2b', 'as_extension'),
                        'value' => 'hi-icon-effect-2 hi-icon-effect-2b',
                    ),
                    array(
                        'label' => __('Style 3a', 'as_extension'),
                        'value' => 'hi-icon-effect-3 hi-icon-effect-3a',
                    ),
                    array(
                        'label' => __('Style 3b', 'as_extension'),
                        'value' => 'hi-icon-effect-3 hi-icon-effect-3b',
                    ),
                    array(
                        'label' => __('Style 4a', 'as_extension'),
                        'value' => 'hi-icon-effect-4 hi-icon-effect-4a',
                    ),
                    array(
                        'label' => __('Style 4b', 'as_extension'),
                        'value' => 'hi-icon-effect-4 hi-icon-effect-4b',
                    ),
                    array(
                        'label' => __('Style 5a', 'as_extension'),
                        'value' => 'hi-icon-effect-5 hi-icon-effect-5a',
                    ),
                    array(
                        'label' => __('Style 5b', 'as_extension'),
                        'value' => 'hi-icon-effect-5 hi-icon-effect-5b',
                    ),
                    array(
                        'label' => __('Style 5c', 'as_extension'),
                        'value' => 'hi-icon-effect-c hi-icon-effect-5c',
                    ),
                    array(
                        'label' => __('Style 5d', 'as_extension'),
                        'value' => 'hi-icon-effect-5 hi-icon-effect-5d',
                    ),
                    array(
                        'label' => __('Style 6', 'as_extension'),
                        'value' => 'hi-icon-effect-6',
                    ),
                    array(
                        'label' => __('Style 7a', 'as_extension'),
                        'value' => 'hi-icon-effect-7 hi-icon-effect-7a',
                    ),
                    array(
                        'label' => __('Style 7b', 'as_extension'),
                        'value' => 'hi-icon-effect-7 hi-icon-effect-7b',
                    ),
                    array(
                        'label' => __('Style 8', 'as_extension'),
                        'value' => 'hi-icon-effect-8',
                    ),
                    array(
                        'label' => __('Style 9a', 'as_extension'),
                        'value' => 'hi-icon-effect-9 hi-icon-effect-9a',
                    ),
                    array(
                        'label' => __('Style 9b', 'as_extension'),
                        'value' => 'hi-icon-effect-9 hi-icon-effect-9b',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Icon', 'as_extension'),
            ),
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'css_icon_bg_color',
                'std'                   => '#ccc',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box .hi-icon',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'as_extension'),
                'id'                    => 'css_icon_bg_color_hover',
                'std'                   => '#000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box:hover .hi-icon',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_icon_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box .hi-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
            ),
            array(
                'label'                 => __('Color - Hover', 'as_extension'),
                'id'                    => 'css_icon_color_hover',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box:hover .hi-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
            ),
            array(
                'label'                 => __('Color Box Shadown ( Icon )', 'as_extension'),
                'id'                    => 'css_icon_color_shadow_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box .hi-icon:after',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'help'                  => __('Color will change when you save option module!', 'as_extension'),
            ),
            array(
                'label'                 => __('Size ( Icon )', 'as_extension'),
                'id'                    => 'as_css_icon_size',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.hi-icon .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Icon - Margin top', 'as_extension'),
                'id'                    => 'css_icon_margin_top',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.hi-icon .dslc-icon',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Z-index', 'as_extension'),
                'id'                    => 'css_icon_z_index',
                'std'                   => '999',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.hi-icon',
                'affect_on_change_rule' => 'z-index',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Top', 'as_extension'),
                'id'                    => 'css_icon_wrapper_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Margin Right', 'as_extension'),
                'id'                    => 'css_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Left', 'as_extension'),
                'id'                    => 'css_icon_margin_left',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_icon_margin_bottom',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'   => __('Position', 'as_extension'),
                'id'      => 'icon_position',
                'std'     => 'above',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Above', 'as_extension'),
                        'value' => 'above',
                    ),
                    array(
                        'label' => __('Left', 'as_extension'),
                        'value' => 'aside',
                    ),
                    array(
                        'label' => __('Right', 'as_extension'),
                        'value' => 'right',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Icon', 'as_extension'),
            ),
            array(
                'label'                 => __('Size ( Wrapper )', 'as_extension'),
                'id'                    => 'as_css_icon_wrapper_width',
                'std'                   => '84',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.hi-icon',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('Align', 'as_extension'),
                'id'                    => 'css_title_text_align',
                'std'                   => 'inherit',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_title_color',
                'std'                   => '#3d3d3d',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'css_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'css_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
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
                'id'                    => 'css_title_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'css_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_title_margin',
                'std'                   => '21',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Title', 'as_extension'),
                'ext'                   => 'px'
            ),
            /**
             * Content
             */
            array(
                'label'                 => __('Align', 'as_extension'),
                'id'                    => 'css_content_text_align',
                'std'                   => 'inherit',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_content_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'css_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'css_content_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'css_content_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'css_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
                'id'                    => 'css_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Content', 'as_extension'),
                'ext'                   => 'px'
            ),
            /**
             * Button
             */
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'css_button_bg_color',
                'std'                   => '#5890e5',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'as_extension'),
                'id'                    => 'css_button_bg_color_hover',
                'std'                   => '#3e73c2',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Width', 'as_extension'),
                'id'                    => 'css_button_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Borders', 'as_extension'),
                'id'                    => 'css_button_border_trbl',
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
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Color', 'as_extension'),
                'id'                    => 'css_button_border_color',
                'std'                   => '#d8d8d8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'as_extension'),
                'id'                    => 'css_button_border_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Radius', 'as_extension'),
                'id'                    => 'css_button_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_button_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Color - Hover', 'as_extension'),
                'id'                    => 'css_button_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'css_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'css_button_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'css_button_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Margin Top', 'as_extension'),
                'id'                    => 'css_button_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Margin Right', 'as_extension'),
                'id'                    => 'css_button_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'   => __('Position', 'as_extension'),
                'id'      => 'button_pos',
                'std'     => 'bellow',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Right of content', 'as_extension'),
                        'value' => 'aside',
                    ),
                    array(
                        'label' => __('Bellow content', 'as_extension'),
                        'value' => 'bellow',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'css_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'css_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'   => __('Icon', 'as_extension'),
                'id'      => 'button_icon_id',
                'std'     => 'cog',
                'type'    => 'icon',
                'section' => 'styling',
                'tab'     => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Icon - Color', 'as_extension'),
                'id'                    => 'css_button_icon_color',
                'std'                   => '#b0c8eb',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'as_extension'),
                'id'                    => 'css_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'as_extension'),
            ),
            /**
             * Secondary Button
             */
            array(
                'label'                 => __('BG Color', 'as_extension'),
                'id'                    => 'css_button_2_bg_color',
                'std'                   => '#5890e5',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'as_extension'),
                'id'                    => 'css_button_2_bg_color_hover',
                'std'                   => '#3e73c2',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Width', 'as_extension'),
                'id'                    => 'css_button_2_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Borders', 'as_extension'),
                'id'                    => 'css_button_2_border_trbl',
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
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Color', 'as_extension'),
                'id'                    => 'css_button_2_border_color',
                'std'                   => '#d8d8d8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'as_extension'),
                'id'                    => 'css_button_2_border_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Border Radius', 'as_extension'),
                'id'                    => 'css_button_2_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Color', 'as_extension'),
                'id'                    => 'css_button_2_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Color - Hover', 'as_extension'),
                'id'                    => 'css_button_2_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'css_button_2_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'css_button_2_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'css_button_2_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Margin Left', 'as_extension'),
                'id'                    => 'css_button_2_mleft',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Margin Top', 'as_extension'),
                'id'                    => 'css_button_2_mtop',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'css_button_2_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'css_button_2_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'   => __('Icon', 'as_extension'),
                'id'      => 'button_2_icon_id',
                'std'     => 'cog',
                'type'    => 'icon',
                'section' => 'styling',
                'tab'     => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Icon - Color', 'as_extension'),
                'id'                    => 'css_button_2_icon_color',
                'std'                   => '#b0c8eb',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'as_extension'),
                'id'                    => 'css_button_2_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'as_extension'),
            ),
            /**
             * Hidden
             */
            array(
                'label'      => __('Title', 'as_extension'),
                'id'         => 'title',
                'std'        => __('CLICK TO EDIT','monalisa'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Content', 'as_extension'),
                'id'         => 'content',
                'std'        => 'This is just placeholder text. Click here to edit it.',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Button Title', 'as_extension'),
                'id'         => 'button_title',
                'std'        => __('CLICK TO EDIT','monalisa'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Button Title', 'as_extension'),
                'id'         => 'button_2_title',
                'std'        => __('CLICK TO EDIT','monalisa'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
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
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'css_res_t_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'css_res_t_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'as_extension'),
                'id'                    => 'css_res_t_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-main-wrap',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Icon - Margin Top', 'as_extension'),
                'id'                    => 'css_res_t_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'as_extension'),
                'id'                    => 'css_res_t_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Icon - Size ( Wrapper )', 'as_extension'),
                'id'                    => 'css_res_t_icon_wrapper_width',
                'std'                   => '84',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            array(
                'label'                 => __('Icon - Size ( Icon )', 'as_extension'),
                'id'                    => 'css_res_t_icon_width',
                'std'                   => '31',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Font Size', 'as_extension'),
                'id'                    => 'css_res_t_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'as_extension'),
                'id'                    => 'css_res_t_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'as_extension'),
                'id'                    => 'css_res_t_title_margin',
                'std'                   => '21',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Font Size', 'as_extension'),
                'id'                    => 'css_res_t_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Line Height', 'as_extension'),
                'id'                    => 'css_res_t_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Margin Bottom', 'as_extension'),
                'id'                    => 'css_res_t_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Font Size', 'as_extension'),
                'id'                    => 'css_res_t_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Margin Top', 'as_extension'),
                'id'                    => 'css_res_t_button_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Margin Right', 'as_extension'),
                'id'                    => 'css_res_t_button_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Padding Vertical', 'as_extension'),
                'id'                    => 'css_res_t_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Padding Horizontal', 'as_extension'),
                'id'                    => 'css_res_t_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Icon - Margin Right', 'as_extension'),
                'id'                    => 'css_res_t_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('2nd Button Margin Left', 'as_extension'),
                'id'                    => 'css_res_t_button_2_mleft',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'as_extension'),
            ),
            array(
                'label'                 => __('2nd Button Margin Top', 'as_extension'),
                'id'                    => 'css_res_t_button_2_mtop',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'as_extension'),
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
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'as_extension'),
                'id'                    => 'css_res_p_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'as_extension'),
                'id'                    => 'css_res_p_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'as_extension'),
                'id'                    => 'css_res_p_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-main-wrap',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Icon - Margin Top', 'as_extension'),
                'id'                    => 'css_res_p_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'as_extension'),
                'id'                    => 'css_res_p_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Icon - Size ( Wrapper )', 'as_extension'),
                'id'                    => 'css_res_p_icon_wrapper_width',
                'std'                   => '84',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            array(
                'label'                 => __('Icon - Size ( Icon )', 'as_extension'),
                'id'                    => 'css_res_p_icon_width',
                'std'                   => '31',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Font Size', 'as_extension'),
                'id'                    => 'css_res_p_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'as_extension'),
                'id'                    => 'css_res_p_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'as_extension'),
                'id'                    => 'css_res_p_title_margin',
                'std'                   => '21',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Font Size', 'as_extension'),
                'id'                    => 'css_res_p_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Line Height', 'as_extension'),
                'id'                    => 'css_res_p_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Margin Bottom', 'as_extension'),
                'id'                    => 'css_res_p_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Font Size', 'as_extension'),
                'id'                    => 'css_res_p_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Margin Top', 'as_extension'),
                'id'                    => 'css_res_p_button_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Margin Right', 'as_extension'),
                'id'                    => 'css_res_p_button_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Padding Vertical', 'as_extension'),
                'id'                    => 'css_res_p_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Padding Horizontal', 'as_extension'),
                'id'                    => 'css_res_p_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Icon - Margin Right', 'as_extension'),
                'id'                    => 'css_res_p_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'as_extension'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('2nd Button Margin Left', 'as_extension'),
                'id'                    => 'css_res_p_button_2_mleft',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'as_extension'),
            ),
            array(
                'label'                 => __('2nd Button Margin Top', 'as_extension'),
                'id'                    => 'css_res_p_button_2_mtop',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'as_extension'),
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

        /* Module output stars here */

        // Main Elements
        $elements = $options['elements'];
        if (!empty($elements))
            $elements = explode(' ', trim($elements));
        else
            $elements = array();
        ?>

        <div class="dslc-info-box dslc-info-box-icon-pos-<?php echo esc_attr($options['icon_position']); ?>">

            <?php if ($options['button_pos'] == 'aside' && in_array('button', $elements)) : ?>
                <div class="dslc-info-box-button dslc-info-box-button-aside">
                    <?php if (isset($options['button_link']) && !empty($options['button_link'])) : ?>
                        <a href="<?php echo esc_url($options['button_link']); ?>" target="<?php echo esc_attr($options['button_target']); ?>">
                            <?php if (isset($options['button_icon_id']) && $options['button_icon_id'] != '') : ?>
                                <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['button_icon_id']); ?>"></span>
                            <?php endif; ?>
                            <?php if ($dslc_is_admin) : ?>
                                <span class="dslca-editable-content" data-id="button_title" data-type="simple" contenteditable><?php echo esc_html($options['button_title'], 'monalisa'); ?></span>
                                <?php
                            else : echo esc_html($options['button_title'], 'monalisa');
                            endif;
                            ?>
                        </a>
                    <?php endif; ?>	
                    <?php if (isset($options['button_2_link']) && !empty($options['button_2_link'])) : ?>
                        <a href="<?php echo esc_url($options['button_2_link']); ?>" target="<?php echo esc_attr($options['button_2_target']); ?>" class="dslc-secondary">
                            <?php if (isset($options['button_2_icon_id']) && $options['button_2_icon_id'] != '') : ?>
                                <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['button_2_icon_id']); ?>"></span>
                            <?php endif; ?>
                            <?php if ($dslc_is_admin) : ?>
                                <span class="dslca-editable-content" data-id="button_2_title" data-type="simple" contenteditable><?php echo esc_html($options['button_2_title'], 'monalisa'); ?></span>
                                <?php
                            else : echo esc_html($options['button_2_title'], 'monalisa');
                            endif;
                            ?>
                        </a>
                    <?php endif; ?>
                </div><!-- .dslc-info-box-button -->
            <?php endif; ?>

            <div class="dslc-info-box-main-wrap dslc-clearfix">

                <?php if (in_array('icon', $elements)) : ?>
                    <div class="dslc-info-box-image">
                        <div class="hi-icon-wrap <?php echo esc_attr($options['as_effect_id']); ?>">
                            <?php if (!empty($options['icon_link'])) { ?> 
                                <a class="as-icon-link" href="<?php echo esc_url($options['icon_link']); ?>" target="<?php echo esc_attr($options['icon_link_target']); ?>">
                                <?php } ?>
                                <span class="hi-icon">
                                    <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['icon_id']); ?>"></span>
                                </span>
                                <?php if (!empty($options['icon_link'])) { ?> 
                                </a>
                            <?php } ?>
                        </div><!-- .dslc-info-box-image-inner -->
                    </div><!-- .dslc-info-box-image -->
                <?php endif; ?>

                <div class="dslc-info-box-main">

                    <?php if (in_array('title', $elements)) : ?>
                        <div class="dslc-info-box-title">
                            <?php if ($dslc_is_admin) : ?>
                                <h4 class="dslca-editable-content" data-id="title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo stripslashes($options['title']); ?></h4>
                            <?php else : ?>
                                <?php if ($options['title_link'] != '') : ?>
                                    <h4><a href="<?php echo esc_url($options['title_link']); ?>" target="<?php echo esc_attr($options['title_link_target']); ?>"><?php echo stripslashes($options['title']); ?></a></h4>
                                <?php else : ?>
                                    <h4><?php echo stripslashes($options['title']); ?></h4>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div><!-- .dslc-info-box-title -->
                    <?php endif; ?>

                    <?php if (in_array('content', $elements)) : ?>
                        <div class="dslc-info-box-content">
                            <?php if ($dslc_is_admin) : ?>
                                <div class="dslca-editable-content" data-id="content">								
                                    <?php echo stripslashes($options['content']); ?>
                                </div><!-- .dslca-editable-content -->
                                <div class="dslca-wysiwyg-actions-edit"><span class="dslca-wysiwyg-actions-edit-hook"><?php _e('Edit Content', 'as_extension'); ?></span></div>
                            <?php else : ?>
                                <?php echo do_shortcode(stripslashes($options['content'])); ?>
                            <?php endif; ?>
                        </div><!-- .dslc-info-box-content -->
                    <?php endif; ?>

                    <?php if ($options['button_pos'] == 'bellow' && in_array('button', $elements)) : ?>
                        <div class="dslc-info-box-button">
                            <?php if (isset($options['button_link']) && !empty($options['button_link'])) : ?>
                                <a href="<?php echo esc_url($options['button_link']); ?>" target="<?php echo esc_attr($options['button_target']); ?>">
                                    <?php if (isset($options['button_icon_id']) && $options['button_icon_id'] != '') : ?>
                                        <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['button_icon_id']); ?>"></span>
                                    <?php endif; ?>
                                    <?php if ($dslc_is_admin) : ?>
                                        <span class="dslca-editable-content" data-id="button_title" data-type="simple" contenteditable><?php echo esc_html($options['button_title'], 'monalisa'); ?></span>
                                        <?php
                                    else : echo esc_html($options['button_title'], 'monalisa');
                                    endif;
                                    ?>
                                </a>
                            <?php endif; ?>	
                            <?php if (isset($options['button_2_link']) && !empty($options['button_2_link'])) : ?>
                                <a href="<?php echo esc_url($options['button_2_link']); ?>" target="<?php echo esc_attr($options['button_2_target']); ?>" class="dslc-secondary">
                                    <?php if (isset($options['button_2_icon_id']) && $options['button_2_icon_id'] != '') : ?>
                                        <span class="dslc-icon dslc-icon-<?php echo esc_attr($options['button_2_icon_id']); ?>"></span>
                                    <?php endif; ?>
                                    <?php if ($dslc_is_admin) : ?>
                                        <span class="dslca-editable-content" data-id="button_2_title" data-type="simple" contenteditable><?php echo esc_html($options['button_2_title'], 'monalisa'); ?></span>
                                        <?php
                                    else : echo esc_html($options['button_2_title'], 'monalisa');
                                    endif;
                                    ?>
                                </a>
                            <?php endif; ?>
                        </div><!-- .dslc-info-box-button -->
                    <?php endif; ?>

                </div><!-- .dslc-info-box-main -->

            </div><!-- .dslc-info-box-main-wrap -->

        </div><!-- .dslc-info-box -->

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
