<?php
class Anna_Counter_Module extends DSLC_Module
{
	// Module Attributes
	var $module_id;
	var $module_title;
	var $module_icon;
	var $module_category;

	function __construct() {

		$this->module_id = 'Anna_Counter_Module';
		$this->module_title = __( 'Counter Number', 'dslc_string' );
		$this->module_icon = 'bar-chart';
		$this->module_category = 'as - Counter';

	}
	
	// Module Options
	function options(){
		
		// The options array
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
			array(
				'label' => 'From Number',
				'id'    => 'as_counter_from_number',
				'std'   => '7979',
				'type'  => 'text',
			),
			array(
				'label' => 'To Number',
				'id'    => 'as_counter_to_number',
				'std'   => '9999',
				'type'  => 'text',
			),
			/**
			 * General
			 */
			array(
				'label'   => __('Elements', 'dslc_string'),
				'id'      => 'elements',
				'std'     => 'icon title',
				'type'    => 'checkbox',
				'choices' => array(
					array(
						'label' => __('Icon', 'dslc_string'),
						'value' => 'icon'
					),
					array(
						'label' => __('Title', 'dslc_string'),
						'value' => 'title'
					),
				),
				'section' => 'styling'
			),
			array(
				'label'      => __('Title', 'dslc_string'),
				'id'         => 'as_counter_title',
				'std'        => 'CLICK TO EDIT',
				'type'       => 'textarea',
				'visibility' => 'hidden',
				'section'    => 'styling'
			),
			array(
				'label'      => __('Number', 'dslc_string'),
				'id'         => 'as_counter_number',
				'std'        => '1989',
				'type'       => 'textarea',
				'visibility' => 'hidden',
				'section'    => 'styling'
			),
			array(
				'label'                 => __('Align', 'dslc_string'),
				'id'                    => 'as_counter_text_align',
				'std'                   => 'center',
				'type'                  => 'select',
				'choices'               => array(
					array(
						'label' => __('Left', 'dslc_string'),
						'value' => 'left'
					),
					array(
						'label' => __('Center', 'dslc_string'),
						'value' => 'center'
					),
					array(
						'label' => __('Right', 'dslc_string'),
						'value' => 'right'
					),
				),
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-counter-box-wrapper',
				'affect_on_change_rule' => 'text-align',
				'section'               => 'styling',
			),
			array(
				'label'                 => __( ' BG Color', 'dslc_string' ),
				'id'                    => 'css_main_bg_color',
				'std'                   => '',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-counter-box-wrapper',
				'affect_on_change_rule' => 'background-color',
				'section'               => 'styling',
			),
			array(
				'label'                 => __( 'BG Image', 'dslc_string' ),
				'id'                    => 'css_main_bg_img',
				'std'                   => '',
				'type'                  => 'image',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-counter-box-wrapper',
				'affect_on_change_rule' => 'background-image',
				'section'               => 'styling',
			),
			array(
				'label'   => __( 'BG Image Repeat', 'dslc_string' ),
				'id'      => 'css_main_bg_img_repeat',
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
				'affect_on_change_el'   => '.as-counter-box-wrapper',
				'affect_on_change_rule' => 'background-repeat',
				'section'               => 'styling',
			),
			array(
				'label'   => __( 'BG Image Position', 'dslc_string' ),
				'id'      => 'css_main_bg_img_pos',
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
				'affect_on_change_el'   => '.as-counter-box-wrapper',
				'affect_on_change_rule' => 'background-position',
				'section'               => 'styling',
			),
			array(
				'label'                 => __('Borders', 'dslc_string'),
				'id'                    => 'as_counter_css_border_trbl',
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
				'affect_on_change_el'   => '.as-counter-box-wrapper',
				'affect_on_change_rule' => 'border-style',
				'section'               => 'styling',
			),
			array(
				'label'                 => __('Border Color', 'dslc_string'),
				'id'                    => 'as_counter_css_border_color',
				'std'                   => '#000000',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-counter-box-wrapper',
				'affect_on_change_rule' => 'border-color',
				'section'               => 'styling',
			),
			array(
				'label'                 => __('Border Width', 'dslc_string'),
				'id'                    => 'as_counter_css_border_width',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-counter-box-wrapper',
				'affect_on_change_rule' => 'border-width',
				'section'               => 'styling',
				'ext'                   => 'px',
			),
			array(
				'label'                 => __('Border Radius', 'dslc_string'),
				'id'                    => 'as_counter_css_border_radius',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-counter-box-wrapper',
				'affect_on_change_rule' => 'border-radius',
				'section'               => 'styling',
				'ext'                   => 'px'
			),
			array(
				'label'                 => __('Margin Bottom', 'dslc_string'),
				'id'                    => 'as_counter_css_margin_bottom',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-counter-box-wrapper',
				'affect_on_change_rule' => 'margin-bottom',
				'section'               => 'styling',
				'ext'                   => 'px',
			),
			array(
				'label'                 => __('Padding Vertical', 'dslc_string'),
				'id'                    => 'as_counter_css_padding_vertical',
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
				'label'                 => __('Padding Horizontal', 'dslc_string'),
				'id'                    => 'as_counter_css_padding_horizontal',
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
				'label'                 => __('Color', 'dslc_string'),
				'id'                    => 'as_counter_css_title_color',
				'std'                   => '#797979',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as_counter_title',
				'affect_on_change_rule' => 'color',
				'section'               => 'styling',
				'tab'                   => 'Title'
			),
			array(
				'label'                 => __('Font Size', 'dslc_string'),
				'id'                    => 'as_counter_css_title_font_size',
				'std'                   => '36',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as_counter_title',
				'affect_on_change_rule' => 'font-size',
				'section'               => 'styling',
				'tab'                   => 'Title',
				'ext'                   => 'px'
			),
			array(
				'label'                 => __('Font Weight', 'dslc_string'),
				'id'                    => 'as_counter_css_title_font_weight',
				'std'                   => '300',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as_counter_title',
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
				'id'                    => 'as_counter_css_title_font_family',
				'std'                   => 'Open Sans',
				'type'                  => 'font',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as_counter_title',
				'affect_on_change_rule' => 'font-family',
				'section'               => 'styling',
				'tab'                   => 'Title',
			),
			array(
				'label'                 => __('Line Height', 'dslc_string'),
				'id'                    => 'as_counter_css_title_line_height',
				'std'                   => '40',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as_counter_title',
				'affect_on_change_rule' => 'line-height',
				'section'               => 'styling',
				'tab'                   => 'Title',
				'ext'                   => 'px'
			),
			array(
				'label'                 => __('Letter Spacing', 'dslc_string'),
				'id'                    => 'as_counter_css_title_letter_spacing',
				'std'                   => '1',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as_counter_title',
				'affect_on_change_rule' => 'letter-spacing',
				'section'               => 'styling',
				'tab'                   => 'Title',
				'ext'                   => 'px'
			),
			array(
				'label'                 => __('Margin Bottom', 'dslc_string'),
				'id'                    => 'as_counter_css_title_margin',
				'std'                   => '10',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as_counter_title',
				'affect_on_change_rule' => 'margin-bottom',
				'section'               => 'styling',
				'tab'                   => 'Title',
				'ext'                   => 'px'
			),
			/**
			 * Number
			 */
			array(
				'label'                 => __('Color', 'dslc_string'),
				'id'                    => 'as_counter_css_number_color',
				'std'                   => '#797979',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.odometer',
				'affect_on_change_rule' => 'color',
				'section'               => 'styling',
				'tab'                   => 'Number'
			),
			array(
				'label'                 => __('Font Size', 'dslc_string'),
				'id'                    => 'as_counter_css_number_font_size',
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
				'label'                 => __('Font Weight', 'dslc_string'),
				'id'                    => 'as_counter_css_number_font_weight',
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
				'label'                 => __('Font Family', 'dslc_string'),
				'id'                    => 'as_counter_css_number_font_family',
				'std'                   => 'Oswald',
				'type'                  => 'font',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.odometer',
				'affect_on_change_rule' => 'font-family',
				'section'               => 'styling',
				'tab'                   => 'Number',
			),
			array(
				'label'                 => __('Line Height', 'dslc_string'),
				'id'                    => 'as_counter_css_number_line_height',
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
				'label'                 => __('Margin Bottom', 'dslc_string'),
				'id'                    => 'as_counter_css_number_margin',
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
				'label'                 => __('BG Color', 'dslc_string'),
				'id'                    => 'as_counter_css_icon_bg_color',
				'std'                   => '',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-counter-box-image-inner',
				'affect_on_change_rule' => 'background-color',
				'section'               => 'styling',
				'tab'                   => 'Icon',
			),
			array(
				'label'                 => __('Border Color', 'dslc_string'),
				'id'                    => 'as_counter_css_icon_border_color',
				'std'                   => 'rgb(90, 195, 188)',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-counter-box-image-inner',
				'affect_on_change_rule' => 'border-color',
				'section'               => 'styling',
				'tab'                   => 'Icon',
			),
			array(
				'label'                 => __('Border Width', 'dslc_string'),
				'id'                    => 'as_counter_css_icon_border_width',
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
				'label'                 => __('Borders', 'dslc_string'),
				'id'                    => 'as_counter_css_icon_border_trbl',
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
				'affect_on_change_el'   => '.as-counter-box-image-inner',
				'affect_on_change_rule' => 'border-style',
				'section'               => 'styling',
				'tab'                   => 'Icon'
			),
			array(
				'label'                 => __('Border Radius', 'dslc_string'),
				'id'                    => 'as_counter_css_icon_border_radius',
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
				'label'                 => __('Color', 'dslc_string'),
				'id'                    => 'as_counter_css_icon_color',
				'std'                   => 'rgb(90, 195, 188)',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-counter-box-image-inner .dslc-icon',
				'affect_on_change_rule' => 'color',
				'section'               => 'styling',
				'tab'                   => 'Icon',
			),
			array(
				'label'   => __('Icon', 'dslc_string'),
				'id'      => 'as_counter_icon_id',
				'std'     => 'comments',
				'type'    => 'icon',
				'section' => 'styling',
				'tab'     => 'Icon',
			),
			array(
				'label'                 => __('Margin Top', 'dslc_string'),
				'id'                    => 'as_counter_css_icon_margin_top',
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
				'label'                 => __('Margin Right', 'dslc_string'),
				'id'                    => 'as_counter_css_icon_margin_right',
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
				'label'                 => __('Padding Vertical', 'dslc_string'),
				'id'                    => 'as_counter_css_icon_padding_vertical',
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
				'label'                 => __('Padding Horizontal', 'dslc_string'),
				'id'                    => 'as_counter_css_icon_padding_horizontal',
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
				'label'   => __('Position', 'dslc_string'),
				'id'      => 'as_counter_icon_position',
				'std'     => 'above',
				'type'    => 'select',
				'choices' => array(
					array(
						'label' => __('Above', 'dslc_string'),
						'value' => 'above',
					),
					array(
						'label' => __('Aside', 'dslc_string'),
						'value' => 'aside',
					),
				),
				'section' => 'styling',
				'tab'     => 'Icon'
			),
			array(
				'label'                 => __('Size ( Wrapper )', 'dslc_string'),
				'id'                    => 'as_counter_css_icon_wrapper_width',
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
				'label'                 => __('Size ( Icon )', 'dslc_string'),
				'id'                    => 'as_counter_css_icon_width',
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
				'label'   => __('Responsive', 'dslc_string'),
				'id'      => 'css_res_t',
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
				'tab'     => 'tablet',
			),
			array(
				'label'                 => __('Margin Bottom', 'dslc_string'),
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
			/**
			 * Responsive Phone
			 */
			array(
				'label'   => __('Responsive', 'dslc_string'),
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
				'label'                 => __('Margin Bottom', 'dslc_string'),
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
		);

		$dslc_options = array_merge( $dslc_options, $this->shared_options('animation_options') );
		$dslc_options = array_merge( $dslc_options, $this->presets_options() );

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
		<div class="as-counter-box-wrapper as-counter-box-icon-pos-<?php echo $options['as_counter_icon_position']; ?>">
			<?php if (in_array('icon', $elements)) : ?>
				<div class="as-counter-box-image">
					<div class="as-counter-box-image-inner">
						<span class="dslc-icon dslc-icon-<?php echo $options['as_counter_icon_id']; ?> as-init-center"></span>
					</div>
				</div>
			<?php endif; ?>
			<div class="as-counter-content">
				<div class="odometer" data-number="<?php echo $options['as_counter_to_number']; ?>"><?php echo $options['as_counter_from_number']; ?></div>
				<?php if (in_array('title', $elements)) : ?>
					<?php if ($dslc_is_admin) : ?>
						<h2 class="dslca-editable-content as_counter_title" data-id="as_counter_title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?>><?php echo $options['as_counter_title']; ?></h2>
					<?php else : ?>
						<h2 class="as_counter_title"><?php echo $options['as_counter_title']; ?></h2>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
<?php
		// REQUIRED
		$this->module_end($options);
	}
}
