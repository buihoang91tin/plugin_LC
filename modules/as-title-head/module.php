<?php

class AS_Heading_Title_Module extends DSLC_Module {

    // Module Attributes
    var $module_id       = 'AS_Heading_Title_Module';
    var $module_title    = 'AS - Heading Title';
    var $module_icon     = 'th-list';
    var $module_category = 'as - Headding';

    // Module Options
    function options() {
        // The options array
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
            /**
             * General
             */
            array(
                'label'   => __('Elements', 'live-composer-page-builder'),
                'id'      => 'elements',
                'std'     => 'as_title as_sub_title as_line_heading',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Title', 'live-composer-page-builder'),
                        'value' => 'as_title'
                    ),
                    array(
                        'label' => __('Sub Title', 'live-composer-page-builder'),
                        'value' => 'as_sub_title'
                    ),
                    array(
                        'label' => __('Line Heading', 'live-composer-page-builder'),
                        'value' => 'as_line_heading'
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'      => __('Title', 'live-composer-page-builder'),
                'id'         => 'as_title',
                'std'        => __('CLICK TO EDIT', 'live-composer-page-builder'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Sub Title', 'live-composer-page-builder'),
                'id'         => 'as_sub_title',
                'std'        => __('Developing breakthrough insights, think tank disrupt investment donate. Meaningful work peace, donors growth Kony 2012 transformative.', 'live-composer-page-builder'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'                 => __('Align', 'live-composer-page-builder'),
                'id'                    => 'text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
            array(
                'label'             => __('Position Subtitle with Title', 'live-composer-page-builder'),
                'id'                => 'as_position_subtitle',
                'std'               => 'bottom',
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'label' => __('Top', 'live-composer-page-builder'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Bottom', 'live-composer-page-builder'),
                        'value' => 'bottom'
                    ),
                ),
                'refresh_on_change' => true,
                'section'           => 'styling',
            ),
            array(
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'as_css_border_trbl',
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
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'live-composer-page-builder'),
                'id'                    => 'as_css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
                'id'                    => 'as_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Border Radius', 'live-composer-page-builder'),
                'id'                    => 'as_css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __(' BG Color', 'live-composer-page-builder'),
                'id'                    => 'as_css_main_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image', 'live-composer-page-builder'),
                'id'                    => 'as_css_main_bg_img',
                'std'                   => '',
                'type'                  => 'image',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'background-image',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Repeat', 'live-composer-page-builder'),
                'id'                    => 'as_css_main_bg_img_repeat',
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
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Attachment', 'live-composer-page-builder'),
                'id'                    => 'as_css_main_bg_img_attch',
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
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'background-attachment',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('BG Image Position', 'live-composer-page-builder'),
                'id'                    => 'as_css_main_bg_img_pos',
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
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'background-position',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'as_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'as_css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'as_css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'live-composer-page-builder'),
                'id'                    => 'as_css_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'styling',
                'ext'                   => '%'
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('Background', 'live-composer-page-builder'),
                'id'                    => 'as_css_title_background',
                'std'                   => '#ccc',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-title .as-big-title-heading',
                'affect_on_change_rule' => 'background',
                'section'               => 'styling',
                'tab'                   => 'Title'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'as_css_title_padding_horizontal',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-title .as-big-title-heading',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'as_css_title_padding_vertical',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-title .as-big-title-heading',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Horizontal', 'live-composer-page-builder'),
                'id'                    => 'as_css_title_margin_horizontal',
                'std'                   => '',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-title .as-big-title-heading',
                'affect_on_change_rule' => 'margin-left,margin-right',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'as_css_title_color',
                'std'                   => '#212f3d',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-title .as-big-title-heading',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => 'Title'
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'as_css_title_font_size',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-title .as-big-title-heading',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'as_css_title_font_weight',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-title .as-big-title-heading',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'as_css_title_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-title .as-big-title-heading',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => 'Title',
            ),
            array(
                'label'                 => __('Line Height', 'live-composer-page-builder'),
                'id'                    => 'as_css_title_line_height',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-title .as-big-title-heading',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'live-composer-page-builder'),
                'id'                    => 'as_css_title_letter_spacing',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-title .as-big-title-heading',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'as_css_title_margin',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-title .as-big-title-heading',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
            /**
             * Sub Title
             */
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'as_css_subtitle_color',
                'std'                   => '#222222',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-small-subtitle-heading',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => 'Subtitle'
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'as_css_subtitle_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-small-subtitle-heading',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => 'Subtitle',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'as_css_subtitle_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-small-subtitle-heading',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => 'Subtitle',
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'as_css_subtitle_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-small-subtitle-heading',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => 'Subtitle',
            ),
            array(
                'label'                 => __('Line Height', 'live-composer-page-builder'),
                'id'                    => 'as_css_subtitle_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-small-subtitle-heading',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => 'Subtitle',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'live-composer-page-builder'),
                'id'                    => 'as_css_subtitle_letter_spacing',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-small-subtitle-heading',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => 'Subtitle',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'as_css_subtitle_margin',
                'std'                   => '28',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-small-subtitle-heading',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => 'Subtitle',
                'ext'                   => 'px'
            ),
            /**
             * 	Line Heading
             * */
            array(
                'label'                 => __('BG Color', 'live-composer-page-builder'),
                'id'                    => 'as_line_heading_css_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
            ),
            array(
                'label'                 => __('BG Image', 'live-composer-page-builder'),
                'id'                    => 'as_line_heading_css_main_bg_img',
                'std'                   => '',
                'type'                  => 'image',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'background-image',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
            ),
            array(
                'label'                 => __('BG Image Repeat', 'live-composer-page-builder'),
                'id'                    => 'as_line_heading_css_main_bg_img_repeat',
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
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
            ),
            array(
                'label'                 => __('BG Image Attachment', 'live-composer-page-builder'),
                'id'                    => 'as_line_heading_css_main_bg_img_attch',
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
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'background-attachment',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
            ),
            array(
                'label'                 => __('BG Image Position', 'live-composer-page-builder'),
                'id'                    => 'as_line_heading_css_main_bg_img_pos',
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
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'background-position',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
            ),
            array(
                'label'                 => __('Border Color', 'live-composer-page-builder'),
                'id'                    => 'as_line_heading_css_main_border_color',
                'std'                   => 'rgb(0, 186, 208)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
                'id'                    => 'as_line_heading_css_main_border_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'as_line_heading_css_main_border_trbl',
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
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
            ),
            array(
                'label'                 => __('Border Radius - Top', 'live-composer-page-builder'),
                'id'                    => 'as_line_heading_css_main_border_radius_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'live-composer-page-builder'),
                'id'                    => 'as_line_heading_css_main_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Width', 'live-composer-page-builder'),
                'id'                    => 'as_line_heading_css_main_border_width_real',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'width',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
                'ext'                   => '%',
            ),
            array(
                'label'                 => __('Height', 'live-composer-page-builder'),
                'id'                    => 'as_line_heading_height',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-line-heading',
                'affect_on_change_rule' => 'margin-bottom,padding-bottom',
                'ext'                   => 'px',
                'min'                   => 1,
                'max'                   => 300,
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
            ),
            array(
                'label'   => __('Style', 'live-composer-page-builder'),
                'id'      => 'style',
                'std'     => 'solid',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Invisible', 'live-composer-page-builder'),
                        'value' => 'invisible'
                    ),
                    array(
                        'label' => __('Solid', 'live-composer-page-builder'),
                        'value' => 'solid'
                    ),
                    array(
                        'label' => __('Dashed', 'live-composer-page-builder'),
                        'value' => 'dashed'
                    ),
                    array(
                        'label' => __('Dotted', 'live-composer-page-builder'),
                        'value' => 'dotted'
                    ),
                ),
                'section' => 'styling',
                'tab'     => 'Line Heading',
            ),
            array(
                'label'                 => __('Thickness', 'live-composer-page-builder'),
                'id'                    => 'thickness',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-line-heading',
                'affect_on_change_rule' => 'border-width',
                'ext'                   => 'px',
                'min'                   => 1,
                'max'                   => 50,
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
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
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_main_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_main_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Font Size Title', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_main_title_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Line Height Title', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_main_title_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_title_letter_spacing',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom Title', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_title_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Font Size SubTitle', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_main_subtitle_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title .as-small-subtitle-heading',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Line Height SubTitle', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_main_subtitle_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title .as-small-subtitle-heading',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom SubTitle', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_subtitle_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title .as-small-subtitle-heading',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
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
                'tab'     => 'phone',
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_main_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_main_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Font Size Title', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_main_title_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Line Height Title', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_main_title_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_title_letter_spacing',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom Title', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_title_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Font Size SubTitle', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_main_subtitle_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title .as-small-subtitle-heading',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Line Height SubTitle', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_main_subtitle_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title .as-small-subtitle-heading',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom SubTitle', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_subtitle_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title .as-small-subtitle-heading',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
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
        $elements      = $options['elements'];
        if (!empty($elements))
            $elements      = explode(' ', trim($elements));
        else
            $elements      = array();
        ?>
        <!-- HEADING TITLE -->
        <div class="as-heading-wrapper">
            <div class="as-heading-title">
                <?php if ($options['as_position_subtitle'] == 'top') : ?>
                    <?php if (in_array('as_sub_title', $elements)) : ?>
                        <div class="as-small-subtitle-heading">
                            <?php if ($dslc_is_admin) : ?>
                                <div class="dslca-editable-content" data-id="as_sub_title">
                                    <?php echo stripslashes($options['as_sub_title']); ?>
                                </div>
                                <div class="dslca-wysiwyg-actions-edit">
                                    <span class="dslca-wysiwyg-actions-edit-hook"><?php _e('Edit Subtitle', 'live-composer-page-builder'); ?></span>
                                </div>
                            <?php else : ?>
                                <?php echo stripslashes($options['as_sub_title']); ?>
                            <?php endif; ?>
                        </div>
                        <div class="clearfix"></div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (in_array('as_title', $elements)) : ?>
                    <?php if ($dslc_is_admin) : ?>
                        <h3 class="dslca-editable-content as-big-title-heading" data-id="as_title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo esc_html($options['as_title']); ?></h3>
                    <?php else : ?>
                        <h3 class="as-big-title-heading"><?php echo esc_html($options['as_title']); ?></h3>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($options['as_position_subtitle'] == 'bottom') : ?>
                    <?php if (in_array('as_sub_title', $elements)) : ?>
                        <div class="clearfix"></div>
                        <div class="as-small-subtitle-heading">
                            <?php if ($dslc_is_admin) : ?>
                                <div class="dslca-editable-content" data-id="as_sub_title">
                                    <?php echo stripslashes($options['as_sub_title']); ?>
                                </div>
                                <div class="dslca-wysiwyg-actions-edit">
                                    <span class="dslca-wysiwyg-actions-edit-hook"><?php _e('Edit Subtitle', 'live-composer-page-builder'); ?></span>
                                </div>
                            <?php else : ?>
                                <?php echo stripslashes($options['as_sub_title']); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (in_array('as_line_heading', $elements)) : ?>
                    <div class="clearfix"></div>
                    <?php
                    $as_align_line_heading = '';
                    if ($options['text_align'] == 'left') {
                        $as_align_line_heading = 'style="float:left;"';
                    }
                    elseif ($options['text_align'] == 'center') {
                        $as_align_line_heading = 'style="margin:0 auto;"';
                    }
                    else {
                        $as_align_line_heading = 'style="float:right;"';
                    }
                    ?>
                    <div class="as-line-heading-wrapper" <?php echo $as_align_line_heading; ?>>
                        <div class="as-line-heading"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- HEADING TITLE / END -->
        <?php
        // REQUIRED
        $this->module_end($options);
    }

}
