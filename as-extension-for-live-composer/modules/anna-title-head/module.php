<?php
class Anna_Heading_Title_Module extends DSLC_Module
{
    // Module Attributes
    var $module_id       = 'Anna_Heading_Title_Module';
    var $module_title    = 'Custom Heading Title';
    var $module_icon     = 'th-list';
    var $module_category = 'as - Headding';
    // Module Options
    function options()
    {
        // The options array
        $dslc_options = array(
            array(
                'label' => __( 'Show On', 'dslc_string' ),
                'id' => 'css_show_on',
                'std' => 'desktop tablet phone',
                'type' => 'checkbox',
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
             * General
             */
            array(
                'label'   => __('Elements', 'dslc_string'),
                'id'      => 'elements',
                'std'     => 'as_title as_sub_title as_line_heading',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Title', 'dslc_string'),
                        'value' => 'as_title'
                    ),
                    array(
                        'label' => __('Sub Title', 'dslc_string'),
                        'value' => 'as_sub_title'
                    ),
					array(
                        'label' => __('Line Heading', 'dslc_string'),
                        'value' => 'as_line_heading'
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'      => __('Title', 'dslc_string'),
                'id'         => 'as_title',
                'std'        => __('CLICK TO EDIT', 'dslc_string'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'      => __('Sub Title', 'dslc_string'),
                'id'         => 'as_sub_title',
                'std'        => __('Developing breakthrough insights, think tank disrupt investment donate. Meaningful work peace, donors growth Kony 2012 transformative.', 'dslc_string'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),

            array(
                'label'                 => __('Align', 'dslc_string'),
                'id'                    => 'text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
			array(
                'label'                 => __('Position Subtitle with Title', 'dslc_string'),
                'id'                    => 'as_position_subtitle',
                'std'                   => 'bottom',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'dslc_string'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Bottom', 'dslc_string'),
                        'value' => 'bottom'
                    ),
                ),
                'refresh_on_change'     => true,
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Borders', 'dslc_string'),
                'id'                    => 'as_css_border_trbl',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'dslc_string'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'dslc_string'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'dslc_string'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'dslc_string'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'as_css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
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
                'label'                 => __('Border Radius', 'dslc_string'),
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
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'as_css_main_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'BG Image', 'dslc_string' ),
				'id' => 'as_css_main_bg_img',
				'std' => '',
				'type' => 'image',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper',
				'affect_on_change_rule' => 'background-image',
				'section' => 'styling',
			),
			array(
				'label' => __( 'BG Image Repeat', 'dslc_string' ),
				'id' => 'as_css_main_bg_img_repeat',
				'std' => 'repeat',
				'type' => 'select',
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
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper',
				'affect_on_change_rule' => 'background-repeat',
				'section' => 'styling',
			),
			array(
				'label' => __( 'BG Image Attachment', 'dslc_string' ),
				'id' => 'as_css_main_bg_img_attch',
				'std' => 'scroll',
				'type' => 'select',
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
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper',
				'affect_on_change_rule' => 'background-attachment',
				'section' => 'styling',
			),
			array(
				'label' => __( 'BG Image Position', 'dslc_string' ),
				'id' => 'as_css_main_bg_img_pos',
				'std' => 'top left',
				'type' => 'select',
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
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper',
				'affect_on_change_rule' => 'background-position',
				'section' => 'styling',
			),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
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
                'label'                 => __('Padding Vertical', 'dslc_string'),
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
                'label'                 => __('Padding Horizontal', 'dslc_string'),
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
                'label'                 => __('Width', 'dslc_string'),
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
                'label'                 => __('Color', 'dslc_string'),
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
                'label'                 => __('Font Size', 'dslc_string'),
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
                'label'                 => __('Font Weight', 'dslc_string'),
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
                'label'                 => __('Font Family', 'dslc_string'),
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
                'label'                 => __('Line Height', 'dslc_string'),
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
                'label'                 => __('Letter Spacing', 'dslc_string'),
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
                'label'                 => __('Margin Bottom', 'dslc_string'),
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
                'label'                 => __('Color', 'dslc_string'),
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
                'label'                 => __('Font Size', 'dslc_string'),
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
                'label'                 => __('Font Weight', 'dslc_string'),
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
                'label'                 => __('Font Family', 'dslc_string'),
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
                'label'                 => __('Line Height', 'dslc_string'),
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
                'label'                 => __('Letter Spacing', 'dslc_string'),
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
                'label'                 => __('Margin Bottom', 'dslc_string'),
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
             * Line Heading
             */
			array(
                'label'                 => __( 'BG Color', 'dslc_string' ) ,
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
                'label'                 => __( 'BG Image', 'dslc_string' ),
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
                'label'   => __( 'BG Image Repeat', 'dslc_string' ),
                'id'      => 'as_line_heading_css_main_bg_img_repeat',
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
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'background-repeat',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
			),
			array(
                'label'   => __( 'BG Image Attachment', 'dslc_string' ),
                'id'      => 'as_line_heading_css_main_bg_img_attch',
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
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'background-attachment',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
			),
			array(
                'label'   => __( 'BG Image Position', 'dslc_string' ),
                'id'      => 'as_line_heading_css_main_bg_img_pos',
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
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'background-position',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
			),
			array(
                'label'                 => __( 'Border Color', 'dslc_string' ),
                'id'                    => 'as_line_heading_css_main_border_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
			),
			array(
                'label'                 => __( 'Border Width', 'dslc_string' ),
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
                'label'   => __( 'Borders', 'dslc_string' ),
                'id'      => 'as_line_heading_css_main_border_trbl',
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
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
			),
			array(
                'label'                 => __( 'Border Radius - Top', 'dslc_string' ),
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
                'label'                 => __( 'Border Radius - Bottom', 'dslc_string' ),
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
                'label'                 => __( 'Width', 'dslc_string' ),
                'id'                    => 'as_line_heading_css_main_border_width_real',
                'std'                   => '170',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-line-heading-wrapper',
                'affect_on_change_rule' => 'width',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
                'ext'                   => 'px',
                'min'                   => 1,
                'max'                   => 500,
            ),
			array(
                'label'                 => __( 'Color', 'dslc_string' ) ,
                'id'                    => 'as_line_heading_css_border_color',
                'std'                   => '#ededed',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-line-heading',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => 'Line Heading',
			),
			array(
                'label'                 => __( 'Height', 'dslc_string' ) ,
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
                'label'   => __( 'Style', 'dslc_string' ) ,
                'id'      => 'style',
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
                'section' => 'styling',
                'tab'     => 'Line Heading',
			),
			array(
                'label'                 => __( 'Thickness', 'dslc_string' ) ,
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
				'label' => __( 'Responsive Styling', 'dslc_string' ),
				'id' => 'css_res_t',
				'std' => 'disabled',
				'type' => 'select',
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
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_main_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_main_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Font Size Title', 'dslc_string' ),
				'id' => 'css_res_t_main_title_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Line Height Title', 'dslc_string' ),
				'id' => 'css_res_t_main_title_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
                'label'                 => __('Letter Spacing', 'dslc_string'),
                'id'                    => 'css_res_t_title_letter_spacing',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
                'affect_on_change_rule' => 'letter-spacing',
                'section' 				=> 'responsive',
				'tab' 					=> __( 'tablet', 'dslc_string' ),
				'ext' 					=> 'px'
            ),
			array(
				'label' => __( 'Margin Bottom Title', 'dslc_string' ),
				'id' => 'css_res_t_title_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Font Size SubTitle', 'dslc_string' ),
				'id' => 'css_res_t_main_subtitle_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper .as-heading-title .as-small-subtitle-heading',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Line Height SubTitle', 'dslc_string' ),
				'id' => 'css_res_t_main_subtitle_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper .as-heading-title .as-small-subtitle-heading',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Bottom SubTitle', 'dslc_string' ),
				'id' => 'css_res_t_subtitle_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper .as-heading-title .as-small-subtitle-heading',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px',
			),
            /**
             * Responsive Phone
             */
            array(
                'label'   => __('Responsive Styling', 'dslc_string'),
                'id'      => 'css_res_p',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'dslc_string'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'dslc_string'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => 'phone',
            ),
            array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_main_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_main_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Font Size Title', 'dslc_string' ),
				'id' => 'css_res_p_main_title_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Line Height Title', 'dslc_string' ),
				'id' => 'css_res_p_main_title_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
                'label'                 => __('Letter Spacing', 'dslc_string'),
                'id'                    => 'css_res_p_title_letter_spacing',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
                'affect_on_change_rule' => 'letter-spacing',
                'section' 				=> 'responsive',
				'tab' 					=> __( 'phone', 'dslc_string' ),
				'ext' 					=> 'px'
            ),
			array(
				'label' => __( 'Margin Bottom Title', 'dslc_string' ),
				'id' => 'css_res_p_title_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper .as-heading-title h3.as-big-title-heading',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Font Size SubTitle', 'dslc_string' ),
				'id' => 'css_res_p_main_subtitle_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper .as-heading-title .as-small-subtitle-heading',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Line Height SubTitle', 'dslc_string' ),
				'id' => 'css_res_p_main_subtitle_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper .as-heading-title .as-small-subtitle-heading',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Bottom SubTitle', 'dslc_string' ),
				'id' => 'css_res_p_subtitle_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-heading-wrapper .as-heading-title .as-small-subtitle-heading',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px',
			),
        );
        $dslc_options = array_merge($dslc_options, $this->shared_options('animation_options'));
        $dslc_options = array_merge($dslc_options, $this->presets_options());
        // Return the array
        return apply_filters('dslc_module_options', $dslc_options, $this->module_id);
    }
    // Module Output
    function output($options)
    {
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
        <!-- HEADING TITLE -->
        <div class="as-heading-wrapper">
            <div class="as-heading-title">
                <?php if ( $options['as_position_subtitle'] == 'top' ) : ?>
                    <?php if ( in_array('as_sub_title', $elements) ) : ?>
                        <div class="as-small-subtitle-heading">
                            <?php if ( $dslc_is_admin) : ?>
                                <div class="dslca-editable-content" data-id="as_sub_title">
                                    <?php echo stripslashes( $options['as_sub_title'] ); ?>
                                </div>
                                <div class="dslca-wysiwyg-actions-edit">
                                    <span class="dslca-wysiwyg-actions-edit-hook"><?php echo __('Edit Subtitle', 'dslc_string'); ?></span>
                                </div>
                            <?php else : ?>
                                <?php echo stripslashes( $options['as_sub_title'] ); ?>
                            <?php endif; ?>
                        </div>
                        <div class="clearfix"></div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ( in_array('as_title', $elements) ) : ?>
                    <?php if ( $dslc_is_admin ) : ?>
                        <h3 class="dslca-editable-content as-big-title-heading" data-id="as_title" data-type="simple" <?php if ( $dslc_is_admin ) echo 'contenteditable'; ?>><?php echo $options['as_title']; ?></h3>
                    <?php else : ?>
                        <h3 class="as-big-title-heading"><?php echo $options['as_title']; ?></h3>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ( $options['as_position_subtitle'] == 'bottom' ) : ?>
                    <?php if ( in_array('as_sub_title', $elements) ) : ?>
                        <div class="clearfix"></div>
                        <div class="as-small-subtitle-heading">
                            <?php if ( $dslc_is_admin) : ?>
                                <div class="dslca-editable-content" data-id="as_sub_title">
                                    <?php echo stripslashes( $options['as_sub_title'] ); ?>
                                </div>
                                <div class="dslca-wysiwyg-actions-edit">
                                    <span class="dslca-wysiwyg-actions-edit-hook"><?php echo __('Edit Subtitle', 'dslc_string'); ?></span>
                                </div>
                            <?php else : ?>
                                <?php echo stripslashes( $options['as_sub_title'] ); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ( in_array('as_line_heading', $elements) ) : ?>
                	<div class="clearfix"></div>
                    <?php
                        $as_align_line_heading = '';
                        if ( $options['text_align'] == 'left' ){
                            $as_align_line_heading = 'style="float:left;"';
                        }elseif ( $options['text_align'] == 'center' ){
                            $as_align_line_heading = 'style="margin:0 auto;"';
                        }else{
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
