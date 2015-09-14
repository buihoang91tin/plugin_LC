<?php

class Anna_SubscriptionBox extends DSLC_Module
{
	// Module Attributes
	var $module_id;
	var $module_title;
	var $module_icon;
	var $module_category;

	function __construct() {

		$this->module_id = 'Anna_SubscriptionBox';
		$this->module_title = __( 'Mailchimp Subscription', 'dslc_string' );
		$this->module_icon = 'envelope-alt';
		$this->module_category = 'as - Subscription';

	}

    // Module Options
    function options(){
        // The options array
        $dslc_options = array(

        	/* CLIKC TO EDIT*/
            array(
                'label' => __( 'MailChimp URL', 'dslc_string' ),
                'id' => 'as_mailchimp_url',
                'std' => 'http://alenastudio.us10.list-manage.com/subscribe?u=f2e21eb858ed6d4d505e8e877&id=ffdd9414e1',
                'type' => 'text',
				'help' => 'Right Click -> Open in new tab: <a href="https://www.screenr.com/kIXN" target="_blank">How to find MailChimp URL?</a>'
            ),

            /**
             * General
             */
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
                'label'                 => __( 'Align', 'dslc_string' ),
                'id'                    => 'as_css_main_newsletter_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
			array(
        		'label'			=>__('Background', 'dslc_string'),
        		'id'			=> 'as_css_background_form',
        		'std'			=> '',
        		'type'			=> 'color',
        		'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'background',
                'section'               => 'styling',

        	),
			array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'as_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
			array(
        		'label'			=>__('Padding Vertical', 'dslc_string'),
        		'id'			=> 'as_css_padding_vertical_form',
        		'std'			=> '5',
        		'type'			=> 'slider',
        		'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'					=> 'px'

        	),
        	array(
        		'label'			=>__('Padding Horizontal', 'dslc_string'),
        		'id'			=> 'as_css_padding_horizontal_form',
        		'std'			=> '5',
        		'type'			=> 'slider',
        		'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'					=> 'px'

        	),
			/**
             * Button Styling
             */
			array(
                'label'                 => __('Width (%)', 'dslc_string'),
                'id'                    => 'as_css_input_width',
                'std'                   => '70',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'width',
                'section'               => 'styling',
                'ext'                   => '%',
                'tab'        => __( 'Input Form', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Color', 'dslc_string' ),
                'id'                    => 'as_css_input_color',
                'std'                   => '#ccc',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __( 'Input Form', 'dslc_string' ),
            ),
			array(
                'label'                 => __('Margin Right', 'dslc_string'),
                'id'                    => 'as_css_input_margin_right',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'        => __( 'Input Form', 'dslc_string' ),
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'as_css_input_margin_bottom',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'        => __( 'Input Form', 'dslc_string' ),
            ),
			array(
        		'label'			=>__('Padding Vertical', 'dslc_string'),
        		'id'			=> 'as_css_input_padding_vertical_form',
        		'std'			=> '10',
        		'type'			=> 'slider',
        		'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'					=> 'px',
                'tab'        => __( 'Input Form', 'dslc_string' ),

        	),
        	array(
        		'label'			=>__('Padding Horizontal', 'dslc_string'),
        		'id'			=> 'as_css_input_padding_horizontal_form',
        		'std'			=> '15',
        		'type'			=> 'slider',
        		'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'					=> 'px',
                'tab'        => __( 'Input Form', 'dslc_string' ),
        	),
			array(
                'label'                 => __( 'BG Color', 'dslc_string' ),
                'id'                    => 'as_input_css_newsletter_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'        => __( 'Input Form', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Border Color', 'dslc_string' ),
                'id'                    => 'as_input_css_newsletter_border_color',
                'std'                   => '#ccc',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'        => __( 'Input Form', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Border Radius', 'dslc_string' ),
                'id'                    => 'as_input_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'        => __( 'Input Form', 'dslc_string' ),
            ),
			/**
             * Button Styling
             */

            array(
                'label'      => __( 'Button Text', 'dslc_string' ),
                'id'         => 'as_button_text',
                'std'        => 'Subscribe',
                'type'       => 'text',
                'section'    => 'styling',
                'tab'        => __( 'Button Style', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Align', 'dslc_string' ),
                'id'                    => 'as_button_newsletter_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'        => __( 'Button Style', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'BG Color', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_bg_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'        => __( 'Button Style', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'BG Color - Hover', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_bg_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'        => __( 'Button Style', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Border Color', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_border_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'        => __( 'Button Style', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Border Color - Hover', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_border_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'        => __( 'Button Style', 'dslc_string' ),
            ),
            array(
                'label'             => __( 'Duration when hover(ms)', 'dslc_string' ),
                'id'                => 'as_button_css_newsletter_duration_hover',
                'std'               => '300',
                'type'              => 'text',
                'refresh_on_change' => true,
                'section'           => 'styling',
                'tab'        => __( 'Button Style', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Border Width', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'        => __( 'Button Style', 'dslc_string' ),
            ),
            array(
                'label'   => __( 'Borders', 'dslc_string' ),
                'id'      => 'as_button_css_newsletter_border_trbl',
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
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'        => __( 'Button Style', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Border Radius', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'        => __( 'Button Style', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Margin Bottom', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'        => __( 'Button Style', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Padding Vertical', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'        => __( 'Button Style', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Padding Horizontal', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'        => __( 'Button Style', 'dslc_string' ),
            ),
			/**
             * Out line Style
             */
            array(
                'label'                 => __( 'Out Line Width', 'dslc_string' ),
                'id'                    => 'as_button_newsletter_out_line_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Out Line Offset', 'dslc_string' ),
                'id'                    => 'as_button_newsletter_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Out Line Color', 'dslc_string' ),
                'id'                    => 'as_button_newsletter_out_line_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Out Line Color Hover', 'dslc_string' ),
                'id'                    => 'as_button_newsletter_out_line_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp:hover',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
            ),
            array(
                'label'   => __( 'Out Line Style', 'dslc_string' ) ,
                'id'      => 'as_button_newsletter_out_line_style',
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
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-style',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
            ),
            /**
             * Typography
             */

            array(
                'label'                 => __( 'Color', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __( 'typography', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Color - Hover', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __( 'typography', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Font Size', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __( 'typography', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Font Weight', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
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
                'id'                    => 'as_button_css_newsletter_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __( 'typography', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Letter Spacing', 'dslc_string' ),
                'id'                    => 'as_button_css_newsletter_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __( 'typography', 'dslc_string' ),
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
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
            ),
            array(
        		'label'			=>__('Padding Vertical', 'dslc_string'),
        		'id'			=> 'css_res_t_padding_vertical_form',
        		'std'			=> '5',
        		'type'			=> 'slider',
        		'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'					=> 'px'

        	),
        	array(
        		'label'			=>__('Padding Horizontal', 'dslc_string'),
        		'id'			=> 'css_res_t_padding_horizontal_form',
        		'std'			=> '5',
        		'type'			=> 'slider',
        		'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'					=> 'px'

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
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
            ),
            array(
        		'label'			=>__('Padding Vertical', 'dslc_string'),
        		'id'			=> 'css_res_p_padding_vertical_form',
        		'std'			=> '5',
        		'type'			=> 'slider',
        		'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'					=> 'px'

        	),
        	array(
        		'label'			=>__('Padding Horizontal', 'dslc_string'),
        		'id'			=> 'css_res_p_padding_horizontal_form',
        		'std'			=> '5',
        		'type'			=> 'slider',
        		'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'					=> 'px'

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
/*
        $elements = $options['elements'];
          if ( ! empty( $elements ) )
          $elements = explode( ' ', trim( $elements ) );
          else
          $elements = array(); 
*/

      	// Main Elements
		$mailchimp_url = $options["as_mailchimp_url"];
		$mailchimp_s_url = '';
		$mailchimp_data = array('','');

		if( !empty( $options["as_mailchimp_url"] ) ){
			$mailchimp_data = explode('?u=', $mailchimp_url);
			if( isset($mailchimp_data[1]) ){
				$mailchimp_s_url = $mailchimp_data[0];
				$mailchimp_data = explode('&id=',$mailchimp_data[1]);
			}else{
				$mailchimp_data = array('','');
			}
		}
            $duration_hover = '';
            $value_duration = $options['as_button_css_newsletter_duration_hover'];
            if ( $value_duration != '' ){
                $duration_hover = 'style="-webkit-transition: all '. $value_duration .'ms ease;-moz-transition: all '. $value_duration .'ms ease;-ms-transition: all '. $value_duration .'ms ease;-o-transition: all '. $value_duration .'ms ease;transition: all '. $value_duration .'ms ease;"';
            }
        ?>
        <div class="as_mailchimp_form">
            <!-- For subscription Form-->
        	<form method="GET" action="<?php echo $mailchimp_s_url ?>" target="_blank">
                <input class="as_email_mailchimp" type="email" required="" placeholder="<?php _e('Email Address', AS_DOMAIN) ?>" name="EMAIL">
				<input type="hidden" name="u" value="<?php echo $mailchimp_data[0] ?>">
				<input type="hidden" name="id" value="<?php echo $mailchimp_data[1] ?>">
                <button class="as_button_submit_mailchimp" type="submit" <?php echo $duration_hover; ?>><?php echo $options['as_button_text'];?></button>
            </form>
        </div>

        <?php
        // REQUIRED
        $this->module_end($options);
    }

}
