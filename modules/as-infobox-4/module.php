<?php

class AS_Info_Box_4 extends as_module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_Info_Box_4';
        $this->module_title    = __('Info Box 4', 'live-composer-page-builder');
        $this->module_icon     = 'info';
        $this->module_category = 'as - Info Box';
    }

    function options() {
        global $as_ex_options;
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
                'label' => __('Title Link', 'live-composer-page-builder'),
                'id'    => 'title_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Title Link - Open in', 'live-composer-page-builder'),
                'id'      => 'title_link_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'live-composer-page-builder'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'live-composer-page-builder'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'label' => __('Icon Link', 'live-composer-page-builder'),
                'id'    => 'icon_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Icon Link - Open in', 'live-composer-page-builder'),
                'id'      => 'icon_link_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'live-composer-page-builder'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'live-composer-page-builder'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'label' => __('Primary Button Link', 'live-composer-page-builder'),
                'id'    => 'button_link',
                'std'   => '#',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Primary Button - Open in', 'live-composer-page-builder'),
                'id'      => 'button_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'live-composer-page-builder'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'live-composer-page-builder'),
                        'value' => '_blank',
                    ),
                )
            ),
            array(
                'label' => __('Secondary Button Link', 'live-composer-page-builder'),
                'id'    => 'button_2_link',
                'std'   => '',
                'type'  => 'text'
            ),
            array(
                'label'   => __('Secondary Button - Open in', 'live-composer-page-builder'),
                'id'      => 'button_2_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same Tab', 'live-composer-page-builder'),
                        'value' => '_self',
                    ),
                    array(
                        'label' => __('New Tab', 'live-composer-page-builder'),
                        'value' => '_blank',
                    ),
                )
            ),
            /**
             * General
             */
            array(
                'label'   => __('Elements', 'live-composer-page-builder'),
                'id'      => 'elements',
                'std'     => 'icon title content button',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Icon', 'live-composer-page-builder'),
                        'value' => 'icon'
                    ),
                    array(
                        'label' => __('Title', 'live-composer-page-builder'),
                        'value' => 'title'
                    ),
                    array(
                        'label' => __('Content', 'live-composer-page-builder'),
                        'value' => 'content'
                    ),
                    array(
                        'label' => __('Button', 'live-composer-page-builder'),
                        'value' => 'button'
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'                 => __('Align', 'live-composer-page-builder'),
                'id'                    => 'text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Color', 'live-composer-page-builder'),
                'id'                    => 'css_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image', 'live-composer-page-builder'),
                'id'                    => 'css_bg_img',
                'std'                   => '',
                'type'                  => 'image',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-image',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Repeat', 'live-composer-page-builder'),
                'id'                    => 'css_bg_img_repeat',
                'std'                   => 'repeat',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Repeat', 'live-composer-page-builder'),
                        'value' => 'repeat',
                    ),
                    array(
                        'label' => __('Repeat Horizontal', 'live-composer-page-builder'),
                        'value' => 'repeat-x',
                    ),
                    array(
                        'label' => __('Repeat Vertical', 'live-composer-page-builder'),
                        'value' => 'repeat-y',
                    ),
                    array(
                        'label' => __('Do NOT Repeat', 'live-composer-page-builder'),
                        'value' => 'no-repeat',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Attachment', 'live-composer-page-builder'),
                'id'                    => 'css_bg_img_attch',
                'std'                   => 'scroll',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Scroll', 'live-composer-page-builder'),
                        'value' => 'scroll',
                    ),
                    array(
                        'label' => __('Fixed', 'live-composer-page-builder'),
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
		        'label'                 => __('BG Image Size', 'live-composer-page-builder'),
		        'type'                  => 'select',
		        'choices'               => array(
		            array(
		                'label' => __('Original', 'live-composer-page-builder'),
		                'value' => 'auto',
		            ),
		            array(
		                'label' => __('Cover', 'live-composer-page-builder'),
		                'value' => 'cover',
		            ),
		            array(
		                'label' => __('Contain', 'live-composer-page-builder'),
		                'value' => 'contain',
		            ),
		        ),
		        'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
		        'affect_on_change_rule' => 'background-size',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Position', 'live-composer-page-builder'),
                'id'                    => 'css_bg_img_pos',
                'std'                   => 'top left',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Top Left', 'live-composer-page-builder'),
                        'value' => 'left top',
                    ),
                    array(
                        'label' => __('Top Right', 'live-composer-page-builder'),
                        'value' => 'right top',
                    ),
                    array(
                        'label' => __('Top Center', 'live-composer-page-builder'),
                        'value' => 'Center Top',
                    ),
                    array(
                        'label' => __('Center Left', 'live-composer-page-builder'),
                        'value' => 'left center',
                    ),
                    array(
                        'label' => __('Center Right', 'live-composer-page-builder'),
                        'value' => 'right center',
                    ),
                    array(
                        'label' => __('Center', 'live-composer-page-builder'),
                        'value' => 'center center',
                    ),
                    array(
                        'label' => __('Bottom Left', 'live-composer-page-builder'),
                        'value' => 'left bottom',
                    ),
                    array(
                        'label' => __('Bottom Right', 'live-composer-page-builder'),
                        'value' => 'right bottom',
                    ),
                    array(
                        'label' => __('Bottom Center', 'live-composer-page-builder'),
                        'value' => 'center bottom',
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'background-position',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'live-composer-page-builder'),
                'id'                    => 'css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
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
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'css_border_trbl',
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
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'live-composer-page-builder'),
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
                'label'                 => __('Z-index', 'live-composer-page-builder'),
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
                'label'                 => __('Margin Top', 'live-composer-page-builder'),
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
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
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
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
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
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
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
                'label'                 => __('Minimum Height', 'live-composer-page-builder'),
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
                'label'                 => __('Width', 'live-composer-page-builder'),
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
                'label'                 => __('Align', 'live-composer-page-builder'),
                'id'                    => 'css_icon_text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image > .hi-icon-wrap',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
            ),
            array(
                'label'             => __('Icon', 'live-composer-page-builder'),
                'id'                => 'icon_id',
                'std'               => 'comments',
                'type'              => 'icon',
                'section'           => 'styling',
                'tab'               => __('Icon', 'live-composer-page-builder'),
                'include_in_preset' => false
            ),
            array(
                'label'   => __('Effect Style', 'live-composer-page-builder'),
                'id'      => 'as_effect_id',
                'std'     => 'hi-icon-effect-1 hi-icon-effect-1a',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Style 1a', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-1 hi-icon-effect-1a',
                    ),
                    array(
                        'label' => __('Style 1b', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-1 hi-icon-effect-1b',
                    ),
                    array(
                        'label' => __('Style 2a', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-2 hi-icon-effect-2a',
                    ),
                    array(
                        'label' => __('Style 2b', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-2 hi-icon-effect-2b',
                    ),
                    array(
                        'label' => __('Style 3a', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-3 hi-icon-effect-3a',
                    ),
                    array(
                        'label' => __('Style 3b', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-3 hi-icon-effect-3b',
                    ),
                    array(
                        'label' => __('Style 4a', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-4 hi-icon-effect-4a',
                    ),
                    array(
                        'label' => __('Style 4b', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-4 hi-icon-effect-4b',
                    ),
                    array(
                        'label' => __('Style 5a', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-5 hi-icon-effect-5a',
                    ),
                    array(
                        'label' => __('Style 5b', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-5 hi-icon-effect-5b',
                    ),
                    array(
                        'label' => __('Style 5c', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-c hi-icon-effect-5c',
                    ),
                    array(
                        'label' => __('Style 5d', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-5 hi-icon-effect-5d',
                    ),
                    array(
                        'label' => __('Style 6', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-6',
                    ),
                    array(
                        'label' => __('Style 7a', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-7 hi-icon-effect-7a',
                    ),
                    array(
                        'label' => __('Style 7b', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-7 hi-icon-effect-7b',
                    ),
                    array(
                        'label' => __('Style 8', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-8',
                    ),
                    array(
                        'label' => __('Style 9a', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-9 hi-icon-effect-9a',
                    ),
                    array(
                        'label' => __('Style 9b', 'live-composer-page-builder'),
                        'value' => 'hi-icon-effect-9 hi-icon-effect-9b',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Icon', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('BG Color', 'live-composer-page-builder'),
                'id'                    => 'css_icon_bg_color',
                'std'                   => '#ccc',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box .hi-icon',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'live-composer-page-builder'),
                'id'                    => 'css_icon_bg_color_hover',
                'std'                   => '#000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box:hover .hi-icon',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'css_icon_color',
                'std'                   => $as_ex_options['as_ex_color_content'],
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box .hi-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color - Hover', 'live-composer-page-builder'),
                'id'                    => 'css_icon_color_hover',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box:hover .hi-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color Box Shadown ( Icon )', 'live-composer-page-builder'),
                'id'                    => 'css_icon_color_shadow_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box .hi-icon:after',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
                'help'                  => __('Color will change when you save option module!', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Size ( Icon )', 'live-composer-page-builder'),
                'id'                    => 'as_css_icon_size',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.hi-icon .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Icon - Margin top', 'live-composer-page-builder'),
                'id'                    => 'css_icon_margin_top',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.hi-icon .dslc-icon',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Z-index', 'live-composer-page-builder'),
                'id'                    => 'css_icon_z_index',
                'std'                   => '999',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.hi-icon',
                'affect_on_change_rule' => 'z-index',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Top', 'live-composer-page-builder'),
                'id'                    => 'css_icon_wrapper_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Margin Right', 'live-composer-page-builder'),
                'id'                    => 'css_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Left', 'live-composer-page-builder'),
                'id'                    => 'css_icon_margin_left',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_icon_margin_bottom',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'   => __('Position', 'live-composer-page-builder'),
                'id'      => 'icon_position',
                'std'     => 'above',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Above', 'live-composer-page-builder'),
                        'value' => 'above',
                    ),
                    array(
                        'label' => __('Left', 'live-composer-page-builder'),
                        'value' => 'aside',
                    ),
                    array(
                        'label' => __('Right', 'live-composer-page-builder'),
                        'value' => 'right',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Icon', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Size ( Wrapper )', 'live-composer-page-builder'),
                'id'                    => 'as_css_icon_wrapper_width',
                'std'                   => '84',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.hi-icon',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'live-composer-page-builder'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('Align', 'live-composer-page-builder'),
                'id'                    => 'css_title_text_align',
                'std'                   => 'inherit',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'css_title_color',
                'std'                   => $as_ex_options['as_ex_color_main'],
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'css_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'css_title_font_family',
                'std'                   => $as_ex_options['as_ex_title_font']['font-family'],
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Line Height', 'live-composer-page-builder'),
                'id'                    => 'css_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_title_margin',
                'std'                   => '21',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            /**
             * Content
             */
            array(
                'label'                 => __('Align', 'live-composer-page-builder'),
                'id'                    => 'css_content_text_align',
                'std'                   => 'inherit',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Content', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'css_content_color',
                'std'                   => $as_ex_options['as_ex_color_content'],
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Content', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Content', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'css_content_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Content', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'css_content_font_family',
                'std'                   => $as_ex_options['as_ex_content_font']['font-family'],
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Content', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Line Height', 'live-composer-page-builder'),
                'id'                    => 'css_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Content', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Content', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            /**
             * Button
             */
            array(
                'label'                 => __('BG Color', 'live-composer-page-builder'),
                'id'                    => 'css_button_bg_color',
                'std'                   => '#5890e5',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'live-composer-page-builder'),
                'id'                    => 'css_button_bg_color_hover',
                'std'                   => '#3e73c2',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
                'id'                    => 'css_button_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'css_button_border_trbl',
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
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Color', 'live-composer-page-builder'),
                'id'                    => 'css_button_border_color',
                'std'                   => '#d8d8d8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'live-composer-page-builder'),
                'id'                    => 'css_button_border_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Radius', 'live-composer-page-builder'),
                'id'                    => 'css_button_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'css_button_color',
                'std'                   => $as_ex_options['as_ex_color_content'],
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color - Hover', 'live-composer-page-builder'),
                'id'                    => 'css_button_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'css_button_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'css_button_font_family',
                'std'                   => $as_ex_options['as_ex_content_font']['font-family'],
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Top', 'live-composer-page-builder'),
                'id'                    => 'css_button_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Right', 'live-composer-page-builder'),
                'id'                    => 'css_button_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'   => __('Position', 'live-composer-page-builder'),
                'id'      => 'button_pos',
                'std'     => 'bellow',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Right of content', 'live-composer-page-builder'),
                        'value' => 'aside',
                    ),
                    array(
                        'label' => __('Bellow content', 'live-composer-page-builder'),
                        'value' => 'bellow',
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'   => __('Icon', 'live-composer-page-builder'),
                'id'      => 'button_icon_id',
                'std'     => 'cog',
                'type'    => 'icon',
                'section' => 'styling',
                'tab'     => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Icon - Color', 'live-composer-page-builder'),
                'id'                    => 'css_button_icon_color',
                'std'                   => $as_ex_options['as_ex_color_content'],
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'live-composer-page-builder'),
                'id'                    => 'css_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Primary Button', 'live-composer-page-builder'),
            ),
            /**
             * Secondary Button
             */
            array(
                'label'                 => __('BG Color', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_bg_color',
                'std'                   => '#5890e5',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_bg_color_hover',
                'std'                   => '#3e73c2',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_border_trbl',
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
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Color', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_border_color',
                'std'                   => '#d8d8d8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_border_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Radius', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_color',
                'std'                   => $as_ex_options['as_ex_color_content'],
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color - Hover', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_font_family',
                'std'                   => $as_ex_options['as_ex_content_font']['font-family'],
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Left', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_mleft',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Top', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_mtop',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'   => __('Icon', 'live-composer-page-builder'),
                'id'      => 'button_2_icon_id',
                'std'     => 'cog',
                'type'    => 'icon',
                'section' => 'styling',
                'tab'     => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Icon - Color', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_icon_color',
                'std'                   => $as_ex_options['as_ex_color_content'],
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary .dslc-icon',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'live-composer-page-builder'),
                'id'                    => 'css_button_2_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Secondary Button', 'live-composer-page-builder'),
            ),
            /**
             * Hidden
             */
            array(
                'label'      => __('Title', 'live-composer-page-builder'),
                'id'         => 'title',
                'std'        => __('CLICK TO EDIT','alenastudio'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Content', 'live-composer-page-builder'),
                'id'         => 'content',
                'std'        => 'This is just placeholder text. Click here to edit it.',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Button Title', 'live-composer-page-builder'),
                'id'         => 'button_title',
                'std'        => __('CLICK TO EDIT','alenastudio'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Button Title', 'live-composer-page-builder'),
                'id'         => 'button_2_title',
                'std'        => __('CLICK TO EDIT','alenastudio'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
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
                'affect_on_change_el'   => '.dslc-info-box',
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
                'affect_on_change_el'   => '.dslc-info-box',
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
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-main-wrap',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Icon - Margin Top', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Icon - Size ( Wrapper )', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_icon_wrapper_width',
                'std'                   => '84',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            array(
                'label'                 => __('Icon - Size ( Icon )', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_icon_width',
                'std'                   => '31',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_title_margin',
                'std'                   => '21',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Line Height', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Margin Top', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_button_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Margin Right', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_button_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Icon - Margin Right', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('2nd Button Margin Left', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_button_2_mleft',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('2nd Button Margin Top', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_button_2_mtop',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
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
                'affect_on_change_el'   => '.dslc-info-box',
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
                'affect_on_change_el'   => '.dslc-info-box',
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
                'affect_on_change_el'   => '.dslc-info-box',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-main-wrap',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Icon - Margin Top', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_icon_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 50
            ),
            array(
                'label'                 => __('Icon - Margin Right', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_icon_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Icon - Size ( Wrapper )', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_icon_wrapper_width',
                'std'                   => '84',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 300
            ),
            array(
                'label'                 => __('Icon - Size ( Icon )', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_icon_width',
                'std'                   => '31',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-image-inner .dslc-icon',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_title_font_size',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_title_line_height',
                'std'                   => '17',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_title_margin',
                'std'                   => '21',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_content_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Line Height', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_content_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content, .dslc-info-box-content p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_content_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-content',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Margin Top', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_button_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Margin Right', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_button_margin_right',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Button - Icon - Margin Right', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('2nd Button Margin Left', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_button_2_mleft',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('2nd Button Margin Top', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_button_2_mtop',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-info-box-button a.dslc-secondary',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'live-composer-page-builder'),
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
                                <span class="dslca-editable-content" data-id="button_title" data-type="simple" contenteditable><?php echo esc_html($options['button_title'], 'alenastudio'); ?></span>
                                <?php
                            else : echo esc_html($options['button_title'], 'alenastudio');
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
                                <span class="dslca-editable-content" data-id="button_2_title" data-type="simple" contenteditable><?php echo esc_html($options['button_2_title'], 'alenastudio'); ?></span>
                                <?php
                            else : echo esc_html($options['button_2_title'], 'alenastudio');
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
                                <div class="dslca-wysiwyg-actions-edit"><span class="dslca-wysiwyg-actions-edit-hook"><?php _e('Edit Content', 'live-composer-page-builder'); ?></span></div>
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
                                        <span class="dslca-editable-content" data-id="button_title" data-type="simple" contenteditable><?php echo esc_html($options['button_title'], 'alenastudio'); ?></span>
                                        <?php
                                    else : echo esc_html($options['button_title'], 'alenastudio');
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
                                        <span class="dslca-editable-content" data-id="button_2_title" data-type="simple" contenteditable><?php echo esc_html($options['button_2_title'], 'alenastudio'); ?></span>
                                        <?php
                                    else : echo esc_html($options['button_2_title'], 'alenastudio');
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
