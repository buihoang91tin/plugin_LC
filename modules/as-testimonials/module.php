<?php
class AS_Testimonials_Simple extends DSLC_Module {

	var $module_id;
	var $module_title;
	var $module_icon;
	var $module_category;

	function __construct() {

		$this->module_id = 'AS_Testimonials_Simple';
		$this->module_title = __( 'Testimonials Simple', 'dslc_string' );
		$this->module_icon = 'quote-right';
		$this->module_category = 'as - Testimonials';

	}

	function options() {

		$cats = get_terms( 'dslc_testimonials_cats' );
		$cats_choices = array();

		foreach ( $cats as $cat ) {
			$cats_choices[] = array(
				'label' => $cat->name,
				'value' => $cat->slug
			);
		}

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
			array(
				'label' => __( 'Posts Per Page', 'dslc_string' ),
				'id' => 'amount',
				'std' => '8',
				'type' => 'text',
			),
			array(
				'label' => __( 'Order By', 'dslc_string' ),
				'id' => 'orderby',
				'std' => 'date',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Publish Date', 'dslc_string' ),
						'value' => 'date'
					),
					array(
						'label' => __( 'Modified Date', 'dslc_string' ),
						'value' => 'modified'
					),
					array(
						'label' => __( 'Random', 'dslc_string' ),
						'value' => 'rand'
					),
					array(
						'label' => __( 'Alphabetic', 'dslc_string' ),
						'value' => 'title'
					),
					array(
						'label' => __( 'Comment Count', 'dslc_string' ),
						'value' => 'comment_count'
					),
				)
			),
			array(
				'label' => __( 'Order', 'dslc_string' ),
				'id' => 'order',
				'std' => 'DESC',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Ascending', 'dslc_string' ),
						'value' => 'ASC'
					),
					array(
						'label' => __( 'Descending', 'dslc_string' ),
						'value' => 'DESC'
					)
				)
			),
			array(
				'label' => __( 'Offset', 'dslc_string' ),
				'id' => 'offset',
				'std' => '0',
				'type' => 'text',
			),
			array(
				'label' => __( 'Include (IDs)', 'dslc_string' ),
				'id' => 'query_post_in',
				'std' => '',
				'type' => 'text',
			),
			array(
				'label' => __( 'Exclude (IDs)', 'dslc_string' ),
				'id' => 'query_post_not_in',
				'std' => '',
				'type' => 'text',
			),

			/** 
			 * General
			 */
			
			array(
				'label' => __( 'Post Elements', 'dslc_string' ),
				'id' => 'post_elements',
				'std' => 'quote avatar name position arrow pagination',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Quote', 'dslc_string' ),
						'value' => 'quote',
					),
					array(
						'label' => __( 'Avatar', 'dslc_string' ),
						'value' => 'avatar',
					),
					array(
						'label' => __( 'Name', 'dslc_string' ),
						'value' => 'name',
					),
					array(
						'label' => __( 'Position', 'dslc_string' ),
						'value' => 'position',
					),
				),
				'section' => 'styling'
			),

			array(
				'label' => __( 'Carousel Elements', 'dslc_string' ),
				'id' => 'circles_carousel_elements',
				'std' => 'arrows circles',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Arrows', 'dslc_string' ),
						'value' => 'arrows'
					),
					array(
						'label' => __( 'Circles', 'dslc_string' ),
						'value' => 'circles'
					),
				),
				'section' => 'styling'
			),
			array(
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'css_body_carousel_margin_top',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
				'min' => -200,
				'max' => 200,
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_body_carousel_margin_bottom',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Effect Slider', 'dslc_string' ),
				'id' => 'effect_slide_carousel',
				'std' => 'fade',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Fade', 'dslc_string' ),
						'value' => 'fade',
					),
					array(
						'label' => __( 'BackSlide', 'dslc_string' ),
						'value' => 'backSlide',
					),
					array(
						'label' => __( 'goDown', 'dslc_string' ),
						'value' => 'goDown',
					),
				),
				'refresh_on_change' => true,
				'section' => 'styling',
			),
			array(
				'label' => __( 'Time Auto Slide', 'dslc_string' ),
				'id' => 'auto_time_carousel',
				'std' => '3000',
				'type' => 'slider',
				'refresh_on_change' => true,
				'affect_on_change_el' => '',
				'affect_on_change_rule' => '',
				'section' => 'styling',
				'ext' => '',
				'min' => 0,
				'max' => 10000,
				'increment' => 1000
			),
			/**
			 * Main
			 */
			
			array(
				'label' => __( 'Text Align', 'dslc_string' ),
				'id' => 'css_main_text_align',
				'std' => 'center',
				'type' => 'text_align',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'text-align',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
			), 
			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_main_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'BG Image', 'dslc_string' ),
				'id' => 'css_main_bg_img',
				'std' => '',
				'type' => 'image',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'background-image',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'BG Image Repeat', 'dslc_string' ),
				'id' => 'css_main_bg_img_repeat',
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
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'background-repeat',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'BG Image Attachment', 'dslc_string' ),
				'id' => 'css_main_bg_img_attch',
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
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'background-attachment',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'BG Image Position', 'dslc_string' ),
				'id' => 'css_main_bg_img_pos',
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
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'background-position',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_main_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_main_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_main_border_trbl',
				'std' => 'top right bottom left',
				'type' => 'checkbox',
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
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Radius - Top', 'dslc_string' ),
				'id' => 'css_main_border_radius_top',
				'std' => '4',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Border Radius - Bottom', 'dslc_string' ),
				'id' => 'css_main_border_radius_bottom',
				'std' => '4',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_main_padding_vertical',
				'std' => '24',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_main_padding_horizontal',
				'std' => '30',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			
			/**
			 * Quote
			 */

			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_quote_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'quote', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_quote_border_width',
				'std' => '',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'quote', 'dslc_string' ),
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_quote_border_trbl',
				'std' => 'bottom',
				'type' => 'checkbox',
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
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => __( 'quote', 'dslc_string' ),
			),
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_quote_color',
				'std' => '#797979',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'quote', 'dslc_string' ),
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_quote_font_size',
				'std' => '17',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => __( 'quote', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_quote_font_weight',
				'std' => '700',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => __( 'quote', 'dslc_string' ),
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_quote_font_family',
				'std' => 'Roboto',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => __( 'quote', 'dslc_string' ),
			),
			array(
				'label' => __( 'Line Height', 'dslc_string' ),
				'id' => 'css_quote_line_height',
				'std' => '29',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'tab' => __( 'quote', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'css_quote_margin_top',
				'std' => '18',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'quote', 'dslc_string' ),
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_quote_margin_bottom',
				'std' => '18',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'quote', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Bottom', 'dslc_string' ),
				'id' => 'css_quote_padding_bottom',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'quote', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Top', 'dslc_string' ),
				'id' => 'css_quote_padding_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'padding-top',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'quote', 'dslc_string' ),
			),
			array(
				'label' => __( 'Text Align', 'dslc_string' ),
				'id' => 'css_quote_text_align',
				'std' => 'left',
				'type' => 'text_align',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'text-align',
				'section' => 'styling',
				'tab' => __( 'quote', 'dslc_string' ),
			),

			/**
			 * Avatar
			 */
			array(
				'label' => __( 'Position Avatar', 'dslc_string' ),
				'id' => 'css_avatar_position',
				'std' => 'top',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Top', 'dslc_string' ),
						'value' => 'top'
					),
					array(
						'label' => __( 'Bottom', 'dslc_string' ),
						'value' => 'bottom'
					),
					array(
						'label' => __( 'Avatar on top & Text bottom', 'dslc_string' ),
						'value' => 'style_top_bottom'
					)
				),
				'refresh_on_change' => true,
				'section' => 'styling',
				'tab' => __( 'avatar', 'dslc_string' ),
			),
			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_avatar_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-avatar-img',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => __( 'avatar', 'dslc_string' ),
			),	
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_avatar_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-avatar-img img',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'avatar', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_avatar_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-avatar-img img',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'avatar', 'dslc_string' ),
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_avatar_border_trbl',
				'std' => 'top right bottom left',
				'type' => 'checkbox',
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
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-avatar-img img',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => __( 'avatar', 'dslc_string' ),
			),		
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_avatar_border_radius_top',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-avatar-img img, .as-testimonials-simple-avatar-img',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'tab' => __( 'avatar', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Right', 'dslc_string' ),
				'id' => 'css_avatar_margin_right',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-avatar-img',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'styling',
				'tab' => __( 'avatar', 'dslc_string' ),
				'ext' => 'px'
			),
			
			array(
				'label' => __( 'Padding', 'dslc_string' ),
				'id' => 'css_avatar_padding',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-avatar-img',
				'affect_on_change_rule' => 'padding',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'avatar', 'dslc_string' ),
			),
			array(
				'label' => __( 'Size', 'dslc_string' ),
				'id' => 'css_avatar_size',
				'std' => '55',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-avatar-img img',
				'affect_on_change_rule' => 'width',
				'section' => 'styling',
				'tab' => __( 'avatar', 'dslc_string' ),
				'min' => 1,
				'max' => 200,
				'ext' => 'px'
			),

			/**
			 * Title
			 */

			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_name_color',
				'std' => '#797979',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'name', 'dslc_string' ),
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_name_font_size',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => __( 'name', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_name_font_weight',
				'std' => '700',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => __( 'name', 'dslc_string' ),
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_name_font_family',
				'std' => 'Roboto',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => __( 'name', 'dslc_string' ),
			),
			array(
				'label' => __( 'Line Height', 'dslc_string' ),
				'id' => 'css_name_line_height',
				'std' => '2',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'tab' => __( 'name', 'dslc_string' ),
				'ext' => ''
			),
			array(
				'label' => __( 'Font Style', 'dslc_string' ),
				'id' => 'css_name_font_style',
				'std' => 'normal',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'font-style',
				'section' => 'styling',
				'tab' => __( 'name', 'dslc_string' ),
				'choices' => array(
					array(
						'label' => __( 'Normal', 'dslc_string' ),
						'value' => 'normal',
					),
					array(
						'label' => __( 'Italic', 'dslc_string' ),
						'value' => 'italic',
					),
				)
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_name_margin_bottom',
				'std' => '8',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'name', 'dslc_string' ),
			),
			array(
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'css_name_margin_top',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'name', 'dslc_string' ),
			),
			
			/**
			 * Position
			 */

			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_position_color',
				'std' => '#cddef7',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-position',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'position', 'dslc_string' ),
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_position_font_size',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-position',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => __( 'position', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_position_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-position',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => __( 'position', 'dslc_string' ),
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_position_font_family',
				'std' => 'Bitter',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-position',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => __( 'position', 'dslc_string' ),
			),
			array(
				'label' => __( 'Font Style', 'dslc_string' ),
				'id' => 'css_position_font_style',
				'std' => 'normal',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-position',
				'affect_on_change_rule' => 'font-style',
				'section' => 'styling',
				'tab' => __( 'position', 'dslc_string' ),
				'choices' => array(
					array(
						'label' => __( 'Normal', 'dslc_string' ),
						'value' => 'normal',
					),
					array(
						'label' => __( 'Italic', 'dslc_string' ),
						'value' => 'italic',
					),
				)
			),
			
			/**
			 * Circle Pagination
			 */
			array(
				'label' => __( 'Background Circle', 'dslc_string' ),
				'id' => 'css_circle_pagination_background',
				'std' => 'rgb(216, 216, 216)',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-theme .owl-controls .owl-page span',
				'affect_on_change_rule' => 'background',
				'section' => 'styling',
				'tab' => __( 'Circle Pagination', 'dslc_string' ),
			), 
			array(
				'label' => __( 'Size', 'dslc_string' ),
				'id' => 'css_circle_pagination_size',
				'std' => '6',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-theme .owl-controls .owl-page span',
				'affect_on_change_rule' => 'width,height',
				'section' => 'styling',
				'tab' => __( 'Circle Pagination', 'dslc_string' ),
				'ext' => 'px',
				'min' => 5,
				'max' => 100,
			),
			array(
				'label' => __( 'Spacing Circle', 'dslc_string' ),
				'id' => 'css_circle_pagination_spacing',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.owl-theme .owl-controls .owl-page span',
				'affect_on_change_rule' => 'margin-right,margin-left',
				'section' => 'styling',
				'tab' => __( 'Circle Pagination', 'dslc_string' ),
				'ext' => 'px',
				'min' => 0,
				'max' => 100,
			),
			/**
			 * Arrow Slider Carousel
			 */
			array(
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'css_circle_arrow_margin_top',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-next, .as-testimonials-simple-prev',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'tab' => __( 'Arrow Slider', 'dslc_string' ),
				'ext' => '%',
				'min' => 0,
				'max' => 100,
			),
			array(
				'label' => __( 'Background Circle', 'dslc_string' ),
				'id' => 'css_circle_arrow_background',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-next, .as-testimonials-simple-prev',
				'affect_on_change_rule' => 'background',
				'section' => 'styling',
				'tab' => __( 'Arrow Slider', 'dslc_string' ),
			), 
			array(
				'label' => __( 'Size', 'dslc_string' ),
				'id' => 'css_circle_arrow_size',
				'std' => '25',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-next, .as-testimonials-simple-prev',
				'affect_on_change_rule' => 'width,height',
				'section' => 'styling',
				'tab' => __( 'Arrow Slider', 'dslc_string' ),
				'ext' => 'px',
				'min' => 0,
				'max' => 100,
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_circle_arrow_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-next, .as-testimonials-simple-prev',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'Arrow Slider', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_circle_arrow_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-next, .as-testimonials-simple-prev',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Arrow Slider', 'dslc_string' ),
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_circle_arrow_border_trbl',
				'std' => 'top right bottom left',
				'type' => 'checkbox',
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
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-next, .as-testimonials-simple-prev',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => __( 'Arrow Slider', 'dslc_string' ),
			),		
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_circle_arrow_border_radius_top',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-next, .as-testimonials-simple-prev',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'tab' => __( 'Arrow Slider', 'dslc_string' ),
				'ext' => '%'
			),
			array(
				'label' => __( 'Padding', 'dslc_string' ),
				'id' => 'css_circle_arrow_padding',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-next, .as-testimonials-simple-prev',
				'affect_on_change_rule' => 'padding',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Arrow Slider', 'dslc_string' ),
			),
			array(
				'label' => __( 'Color Icon', 'dslc_string' ),
				'id' => 'css_circle_arrow_font_color',
				'std' => '#000000',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-next > span, .as-testimonials-simple-prev > span',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Arrow Slider', 'dslc_string' ),
			),
			array(
				'label' => __( 'Color Icon Hover', 'dslc_string' ),
				'id' => 'css_circle_arrow_font_color_hover',
				'std' => '#000000',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-next > span:hover, .as-testimonials-simple-prev > span:hover',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Arrow Slider', 'dslc_string' ),
			),
			array(
				'label' => __( 'Font Size Icon', 'dslc_string' ),
				'id' => 'css_circle_arrow_font_size',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-next > span, .as-testimonials-simple-prev > span',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => __( 'Arrow Slider', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Icon Margin Top', 'dslc_string' ),
				'id' => 'css_circle_arrow_margin_top_icon',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-next > span, .as-testimonials-simple-prev > span',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'tab' => __( 'Arrow Slider', 'dslc_string' ),
				'ext' => 'px',
				'min' => 0,
				'max' => 100,
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
				'affect_on_change_el' => '.dslc-testimonials',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Separator - Height', 'dslc_string' ),
				'id' => 'css_res_t_sep_height',
				'std' => '32',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-post-separator',
				'affect_on_change_rule' => 'margin-bottom,padding-bottom',
				'ext' => 'px',
				'min' => 1,
				'max' => 300,
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Main - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_main_padding_vertical',
				'std' => '24',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Main - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_main_padding_horizontal',
				'std' => '30',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Quote - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_quote_font_size',
				'std' => '17',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Quote - Line Height', 'dslc_string' ),
				'id' => 'css_res_t_quote_line_height',
				'std' => '29',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Quote - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_quote_margin',
				'std' => '18',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Quote - Padding Bottom', 'dslc_string' ),
				'id' => 'css_res_t_quote_padding_bottom',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Quote - Padding Top', 'dslc_string' ),
				'id' => 'css_res_t_quote_padding_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'padding-top',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Author - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_author_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Author - Margin Top', 'dslc_string' ),
				'id' => 'css_res_t_author_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Author - Margin Left', 'dslc_string' ),
				'id' => 'css_res_t_author_margin_left',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author',
				'affect_on_change_rule' => 'margin-left',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
				'min' => -100
			),
			array(
				'label' => __( 'Author - Margin Right', 'dslc_string' ),
				'id' => 'css_res_t_author_margin_right',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
				'min' => -100
			),
			array(
				'label' => __( 'Avatar - Margin Right', 'dslc_string' ),
				'id' => 'css_res_t_avatar_margin_right',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author-avatar',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Avatar - Padding', 'dslc_string' ),
				'id' => 'css_res_t_avatar_padding',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author-avatar',
				'affect_on_change_rule' => 'padding',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Avatar - Size', 'dslc_string' ),
				'id' => 'css_res_t_avatar_size',
				'std' => '55',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author-avatar img',
				'affect_on_change_rule' => 'width',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'min' => 1,
				'max' => 100,
				'ext' => 'px'
			),
			array(
				'label' => __( 'Name - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_name_font_size',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Name - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_name_margin_bottom',
				'std' => '8',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Name - Margin Top', 'dslc_string' ),
				'id' => 'css_res_t_name_margin_top',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Position - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_position_font_size',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-position',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),

			/**
			 * Responsive Phone
			 */

			array(
				'label' => __( 'Responsive Styling', 'dslc_string' ),
				'id' => 'css_res_p',
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
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonials',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Separator - Height', 'dslc_string' ),
				'id' => 'css_res_p_sep_height',
				'std' => '32',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-post-separator',
				'affect_on_change_rule' => 'margin-bottom,padding-bottom',
				'ext' => 'px',
				'min' => 1,
				'max' => 300,
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Main - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_main_padding_vertical',
				'std' => '24',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Main - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_main_padding_horizontal',
				'std' => '30',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-item',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Quote - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_quote_font_size',
				'std' => '17',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Quote - Line Height', 'dslc_string' ),
				'id' => 'css_res_p_quote_line_height',
				'std' => '29',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Quote - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_quote_margin',
				'std' => '18',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Quote - Padding Bottom', 'dslc_string' ),
				'id' => 'css_res_p_quote_padding_bottom',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Quote - Padding Top', 'dslc_string' ),
				'id' => 'css_res_p_quote_padding_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-quote',
				'affect_on_change_rule' => 'padding-top',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Author - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_author_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Author - Margin Top', 'dslc_string' ),
				'id' => 'css_res_p_author_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Author - Margin Left', 'dslc_string' ),
				'id' => 'css_res_p_author_margin_left',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author',
				'affect_on_change_rule' => 'margin-left',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
				'min' => -100
			),
			array(
				'label' => __( 'Author - Margin Right', 'dslc_string' ),
				'id' => 'css_res_p_author_margin_right',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
				'min' => -100
			),
			array(
				'label' => __( 'Avatar - Margin Right', 'dslc_string' ),
				'id' => 'css_res_p_avatar_margin_right',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author-avatar',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Avatar - Padding', 'dslc_string' ),
				'id' => 'css_res_p_avatar_padding',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author-avatar',
				'affect_on_change_rule' => 'padding',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Avatar - Size', 'dslc_string' ),
				'id' => 'css_res_p_avatar_size',
				'std' => '55',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-testimonial-author-avatar img',
				'affect_on_change_rule' => 'width',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'min' => 1,
				'max' => 100,
				'ext' => 'px'
			),
			array(
				'label' => __( 'Name - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_name_font_size',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Name - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_name_margin_bottom',
				'std' => '8',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Name - Margin Top', 'dslc_string' ),
				'id' => 'css_res_p_name_margin_top',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-name',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Position - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_position_font_size',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-testimonials-simple-position',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),

		);

		$dslc_options = array_merge( $dslc_options, $this->shared_options('animation_options') );
		$dslc_options = array_merge( $dslc_options, $this->presets_options() );

		return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

	}

	function output( $options ) {

		global $dslc_active;
		
		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) )
			$dslc_is_admin = true;
		else
			$dslc_is_admin = false;		

		$this->module_start( $options );

		/* Module output stars here */

		// Main Elements
        $elements = $options['post_elements'];
        if ( ! empty( $elements ) )
            $elements = explode( ' ', trim( $elements ) );
        else
            $elements = array();
          
        // Sub Elements
        $sub_elements = $options['circles_carousel_elements'];
        if ( ! empty( $sub_elements ) )
            $sub_elements = explode( ' ', trim( $sub_elements ) );
        else
            $sub_elements = array();
        
        /**
		 * What is shown
		 */
			$show_carousel_arrows = false;
			if ( in_array( 'arrows', $sub_elements ) )
				$show_carousel_arrows = true;
				    
        // General args
        $args = array(
            'post_type' => 'dslc_testimonials',
            'posts_per_page' => $options['amount'],
            'order' => $options['order'],
            'orderby' => $options['orderby'],
            'offset' => $options['offset']
        );


        // Do the query
        $dslc_query = new WP_Query( $args );

        $elementID = uniqid('testimonialscarousel_');
        if ( $dslc_query->have_posts() ){ ?>
        <?php if ( $show_carousel_arrows ) : ?>
        <!-- Testimonials Navigation -->
        <div class="as-customNavigation">
	        <span class="as-testimonials-simple-next"><span class="dslc-icon dslc-icon-chevron-left"></span></span>
            <span class="as-testimonials-simple-prev"><span class="dslc-icon dslc-icon-chevron-right"></span></span>
        </div>
        <!-- Testimonials Navigation / End -->
        <?php endif; ?>
        <?php 
	        if( in_array( 'circles', $sub_elements ) ) {
		        $pagination_check = true;
	        }else{
		        $pagination_check = false;
	        }
	    ?>
        <!-- Testimonials Starts -->
        <div id="<?php echo $elementID; ?>" class="as-testimonials-simple" data-pagination="<?php echo $pagination_check; ?>" data-effect="<?php echo $options['effect_slide_carousel'] ?>" data-auto="<?php echo $options['auto_time_carousel'] ?>"> 
            <?php while ( $dslc_query->have_posts() ) : $dslc_query->the_post(); ?>
                <div class="as-testimonials-simple-item">
	                <?php if ( $options['css_avatar_position'] == 'top' ) : ?>
	                	<!-- Testimonials Avatar -->
	            		<div class="as-testimonials-simple-avatar">
		            		<?php if( in_array( 'avatar', $elements ) ) : ?>
	                			<span class="as-testimonials-simple-avatar-img"><?php the_post_thumbnail( 'full' ); ?></span>
	                		<?php endif; ?>
	                		<?php if( in_array( 'name', $elements ) || in_array( 'position', $elements ) ) : ?>
		                		<div class="as-testimonials-simple-info">
			                		<?php if( in_array( 'name', $elements ) ) : ?>
			                			<span class="as-testimonials-simple-name"><?php the_title(); ?></span>
			                		<?php endif; ?>
			                		<?php if( in_array( 'position', $elements ) ) : ?>
			                			<span class="as-testimonials-simple-position"><?php echo get_post_meta( get_the_ID(), 'dslc_testimonial_author_pos', true ); ?></span>
			                		<?php endif; ?>
		                		</div>
	                		<?php endif; ?>
	            		</div>
	                	<!-- Testimonials Avatar / End -->
                	<?php endif; ?>
                	<?php if ( $options['css_avatar_position'] == 'style_top_bottom' ) : ?>
                		<!-- Testimonials Avatar Top -->
	            		<div class="as-testimonials-simple-avatar">
		            		<?php if( in_array( 'avatar', $elements ) ) : ?>
	                			<span class="as-testimonials-simple-avatar-img"><?php the_post_thumbnail( 'full' ); ?></span>
	                		<?php endif; ?>
	            		</div>
	                	<!-- Testimonials Avatar Top / End -->
                	<?php endif; ?>
                	<?php if( in_array( 'quote', $elements ) ) : ?>
	                    <div class="as-testimonials-simple-quote"><?php the_content(); ?></div>
	                <?php endif; ?>
	                <?php if ( $options['css_avatar_position'] == 'bottom' ) : ?>
	                	<!-- Testimonials Avatar -->
	            		<div class="as-testimonials-simple-avatar">
		            		<?php if( in_array( 'avatar', $elements ) ) : ?>
	                			<span class="as-testimonials-simple-avatar-img"><?php the_post_thumbnail( 'full' ); ?></span>
	                		<?php endif; ?>
	                		<?php if( in_array( 'name', $elements ) || in_array( 'position', $elements ) ) : ?>
		                		<div class="as-testimonials-simple-info">
			                		<?php if( in_array( 'name', $elements ) ) : ?>
			                			<span class="as-testimonials-simple-name"><?php the_title(); ?></span>
			                		<?php endif; ?>
			                		<?php if( in_array( 'position', $elements ) ) : ?>
			                			<span class="as-testimonials-simple-position"><?php echo get_post_meta( get_the_ID(), 'dslc_testimonial_author_pos', true ); ?></span>
			                		<?php endif; ?>
		                		</div>
	                		<?php endif; ?>
	            		</div>
	                	<!-- Testimonials Avatar / End -->
                	<?php endif; ?>
                	<?php if ( $options['css_avatar_position'] == 'style_top_bottom' ) : ?>
                		<!-- Testimonials Avatar Top -->
	            		<?php if( in_array( 'name', $elements ) || in_array( 'position', $elements ) ) : ?>
	                		<div class="as-testimonials-simple-info">
		                		<?php if( in_array( 'name', $elements ) ) : ?>
		                			<span class="as-testimonials-simple-name" style="display: inline-block;"><?php the_title(); ?>&nbsp;/&nbsp;</span> 
		                		<?php endif; ?>
		                		<?php if( in_array( 'position', $elements ) ) : ?>
		                			<span class="as-testimonials-simple-position" style="display: inline-block;"><?php echo get_post_meta( get_the_ID(), 'dslc_testimonial_author_pos', true ); ?></span>
		                		<?php endif; ?>
	                		</div>
                		<?php endif; ?>
	                	<!-- Testimonials Avatar Top / End -->
                	<?php endif; ?>
                </div>
            <?php endwhile; ?>
             
        </div>
        <!-- Testimonials Starts / End -->
		<?php }else{
            if ( $dslc_is_admin ) : ?>
                <div class="dslc-notification dslc-red"><?php _e( 'You do not have any testimonials at the moment. Go to <strong>WP Admin &rarr; Testimonials</strong> to add some.', 'dslc_string' ); ?> <span class="dslca-refresh-module-hook dslc-icon dslc-icon-refresh"></span></span></div>
            <?php endif;
        }
        /* Module output ends here */
        wp_reset_query();
        $this->module_end( $options );

	}

}