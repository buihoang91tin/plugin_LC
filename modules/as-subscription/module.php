<?php

class ASEX_SubscriptionBox extends ASEX_MODULE {

    // Module Attributes
    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'ASEX_SubscriptionBox';
        $this->module_title    = __('AS - Mailchimp Subscription', 'asex');
        $this->module_icon     = 'envelope-alt';
        $this->module_category = 'as - element';
    }

    // Module Options
    function options() {
        // The options array
        $dslc_options = array(
            /* CLIKC TO EDIT */
            array(
                'label' => __('MailChimp URL', 'asex'),
                'id'    => 'asex_mailchimp_url',
                'std'   => 'http://alenastudio.us10.list-manage.com/subscribe?u=f2e21eb858ed6d4d505e8e877&id=ffdd9414e1',
                'type'  => 'text',
                'help'  => 'Right Click -> Open in new tab: <a href="https://www.screenr.com/kIXN" target="_blank">How to find MailChimp URL?</a>'
            ),
            /**
             * General
             */
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
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'asex_css_main_newsletter_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Background', 'asex'),
                'id'                    => 'asex_css_background_form',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form',
                'affect_on_change_rule' => 'background',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'asex_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_css_padding_vertical_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'asex_css_padding_horizontal_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            /**
             * Button Styling
             */
            array(
                'label'                 => __('Width (%)', 'asex'),
                'id'                    => 'asex_css_input_width',
                'std'                   => '70',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'width',
                'section'               => 'styling',
                'ext'                   => '%',
                'tab'                   => __('Input Form', 'asex'),
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'asex_css_input_color',
                'std'                   => '#ccc',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Input Form', 'asex'),
            ),
            array(
                'label'                 => __('Margin Right', 'asex'),
                'id'                    => 'asex_css_input_margin_right',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Input Form', 'asex'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'asex_css_input_margin_bottom',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Input Form', 'asex'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_css_input_padding_vertical_form',
                'std'                   => '9',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Input Form', 'asex'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'asex_css_input_padding_horizontal_form',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Input Form', 'asex'),
            ),
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'asex_input_css_newsletter_bg_color',
                'std'                   => 'rgb(255, 255, 255)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Input Form', 'asex'),
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'asex_input_css_newsletter_border_color',
                'std'                   => '#ccc',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Input Form', 'asex'),
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'asex_input_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Input Form', 'asex'),
            ),
            /**
             * Button Styling
             */
            array(
                'label'   => __('Button Text', 'asex'),
                'id'      => 'asex_button_text',
                'std'     => 'Subscribe',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Button Style', 'asex'),
            ),
            array(
                'label'                 => __('Align', 'asex'),
                'id'                    => 'asex_button_newsletter_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Button Style', 'asex'),
            ),
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'asex_button_css_newsletter_bg_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Button Style', 'asex'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'asex'),
                'id'                    => 'asex_button_css_newsletter_bg_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Button Style', 'asex'),
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'asex_button_css_newsletter_border_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Button Style', 'asex'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'asex'),
                'id'                    => 'asex_button_css_newsletter_border_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Button Style', 'asex'),
            ),
            array(
                'label'             => __('Duration when hover(ms)', 'asex'),
                'id'                => 'asex_button_css_newsletter_duration_hover',
                'std'               => '300',
                'type'              => 'text',
                'refresh_on_change' => true,
                'section'           => 'styling',
                'tab'               => __('Button Style', 'asex'),
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'asex_button_css_newsletter_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Button Style', 'asex'),
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'asex_button_css_newsletter_border_trbl',
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
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Button Style', 'asex'),
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'asex_button_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Button Style', 'asex'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'asex_button_css_newsletter_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Button Style', 'asex'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'asex_button_css_newsletter_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Button Style', 'asex'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'asex_button_css_newsletter_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Button Style', 'asex'),
            ),
            /**
             * Out line Style
             */
            array(
                'label'                 => __('Out Line Width', 'asex'),
                'id'                    => 'asex_button_newsletter_out_line_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Offset', 'asex'),
                'id'                    => 'asex_button_newsletter_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Color', 'asex'),
                'id'                    => 'asex_button_newsletter_out_line_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'asex'),
            ),
            array(
                'label'                 => __('Out Line Color Hover', 'asex'),
                'id'                    => 'asex_button_newsletter_out_line_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp:hover',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'asex'),
            ),
            array(
                'label'                 => __('Out Line Style', 'asex'),
                'id'                    => 'asex_button_newsletter_out_line_style',
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
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-style',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'asex'),
            ),
            /**
             * Typography
             */
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'asex_button_css_newsletter_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography', 'asex'),
            ),
            array(
                'label'                 => __('Color - Hover', 'asex'),
                'id'                    => 'asex_button_css_newsletter_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography', 'asex'),
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'asex_button_css_newsletter_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('typography', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'asex_button_css_newsletter_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
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
                'id'                    => 'asex_button_css_newsletter_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('typography', 'asex'),
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'asex_button_css_newsletter_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('typography', 'asex'),
                'ext'                   => 'px'
            ),
            /**             * Responsive Tablet */
            array
                (
                'label'   => 'Responsive Styling',
                'id'      => 'css_res_t',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array
                    (
                    0 => array
                        (
                        'label' => 'Disabled',
                        'value' => 'disabled'
                    ),
                    1 => array
                        (
                        'label' => 'Enabled',
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => 'tablet',
            ),
            array
                (
                'label'                 => __('Margin Bottom ', 'asex'),
                'id'                    => 'css_res_t_asex_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical ', 'asex'),
                'id'                    => 'css_res_t_asex_css_padding_vertical_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal ', 'asex'),
                'id'                    => 'css_res_t_asex_css_padding_horizontal_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Width (%)( Input Form ) ', 'asex'),
                'id'                    => 'css_res_t_asex_css_input_width',
                'std'                   => '70',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'width',
                'section'               => 'responsive',
                'ext'                   => '%',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Right( Input Form ) ', 'asex'),
                'id'                    => 'css_res_t_asex_css_input_margin_right',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Bottom( Input Form ) ', 'asex'),
                'id'                    => 'css_res_t_asex_css_input_margin_bottom',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical( Input Form ) ', 'asex'),
                'id'                    => 'css_res_t_asex_css_input_padding_vertical_form',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( Input Form ) ', 'asex'),
                'id'                    => 'css_res_t_asex_css_input_padding_horizontal_form',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Radius( Input Form ) ', 'asex'),
                'id'                    => 'css_res_t_asex_input_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Width( Button Style ) ', 'asex'),
                'id'                    => 'css_res_t_asex_button_css_newsletter_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Radius( Button Style ) ', 'asex'),
                'id'                    => 'css_res_t_asex_button_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Bottom( Button Style ) ', 'asex'),
                'id'                    => 'css_res_t_asex_button_css_newsletter_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical( Button Style ) ', 'asex'),
                'id'                    => 'css_res_t_asex_button_css_newsletter_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( Button Style ) ', 'asex'),
                'id'                    => 'css_res_t_asex_button_css_newsletter_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Out Line Width( Out Line Style ) ', 'asex'),
                'id'                    => 'css_res_t_asex_button_newsletter_out_line_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Out Line Offset( Out Line Style ) ', 'asex'),
                'id'                    => 'css_res_t_asex_button_newsletter_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( typography ) ', 'asex'),
                'id'                    => 'css_res_t_asex_button_css_newsletter_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( typography ) ', 'asex'),
                'id'                    => 'css_res_t_asex_button_css_newsletter_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => '',
                'min'                   => '100',
                'max'                   => '900',
                'increment'             => '100'
            ),
            array
                (
                'label'                 => __('Letter Spacing( typography ) ', 'asex'),
                'id'                    => 'css_res_t_asex_button_css_newsletter_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            /**             * Responsive phone */
            array
                (
                'label'   => 'Responsive Styling',
                'id'      => 'css_res_p',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array
                    (
                    0 => array
                        (
                        'label' => 'Disabled',
                        'value' => 'disabled'
                    ),
                    1 => array
                        (
                        'label' => 'Enabled',
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => 'phone',
            ),
            array
                (
                'label'                 => __('Margin Bottom ', 'asex'),
                'id'                    => 'css_res_p_asex_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical ', 'asex'),
                'id'                    => 'css_res_p_asex_css_padding_vertical_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal ', 'asex'),
                'id'                    => 'css_res_p_asex_css_padding_horizontal_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Width (%)( Input Form ) ', 'asex'),
                'id'                    => 'css_res_p_asex_css_input_width',
                'std'                   => '70',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'width',
                'section'               => 'responsive',
                'ext'                   => '%',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Right( Input Form ) ', 'asex'),
                'id'                    => 'css_res_p_asex_css_input_margin_right',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Bottom( Input Form ) ', 'asex'),
                'id'                    => 'css_res_p_asex_css_input_margin_bottom',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical( Input Form ) ', 'asex'),
                'id'                    => 'css_res_p_asex_css_input_padding_vertical_form',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( Input Form ) ', 'asex'),
                'id'                    => 'css_res_p_asex_css_input_padding_horizontal_form',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Radius( Input Form ) ', 'asex'),
                'id'                    => 'css_res_p_asex_input_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_email_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Width( Button Style ) ', 'asex'),
                'id'                    => 'css_res_p_asex_button_css_newsletter_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Radius( Button Style ) ', 'asex'),
                'id'                    => 'css_res_p_asex_button_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Bottom( Button Style ) ', 'asex'),
                'id'                    => 'css_res_p_asex_button_css_newsletter_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-button-lc',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical( Button Style ) ', 'asex'),
                'id'                    => 'css_res_p_asex_button_css_newsletter_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( Button Style ) ', 'asex'),
                'id'                    => 'css_res_p_asex_button_css_newsletter_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Out Line Width( Out Line Style ) ', 'asex'),
                'id'                    => 'css_res_p_asex_button_newsletter_out_line_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Out Line Offset( Out Line Style ) ', 'asex'),
                'id'                    => 'css_res_p_asex_button_newsletter_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( typography ) ', 'asex'),
                'id'                    => 'css_res_p_asex_button_css_newsletter_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( typography ) ', 'asex'),
                'id'                    => 'css_res_p_asex_button_css_newsletter_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => '',
                'min'                   => '100',
                'max'                   => '900',
                'increment'             => '100'
            ),
            array
                (
                'label'                 => __('Letter Spacing( typography ) ', 'asex'),
                'id'                    => 'css_res_p_asex_button_css_newsletter_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.asex_mailchimp_form .asex_button_submit_mailchimp',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
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
        /*
          $elements = $options['elements'];
          if ( ! empty( $elements ) )
          $elements = explode( ' ', trim( $elements ) );
          else
          $elements = array();
         */

        // Main Elements
        $mailchimp_url   = $options["asex_mailchimp_url"];
        $mailchimp_s_url = '';
        $mailchimp_data  = array(
            '',
            '');

        if (!empty($options["asex_mailchimp_url"])) {
            $mailchimp_data = explode('?u=', $mailchimp_url);
            if (isset($mailchimp_data[1])) {
                $mailchimp_s_url = $mailchimp_data[0];
                $mailchimp_data  = explode('&id=', $mailchimp_data[1]);
            }
            else {
                $mailchimp_data = array(
                    '',
                    '');
            }
        }
        $duration_hover = '';
        $value_duration = $options['asex_button_css_newsletter_duration_hover'];
        if ($value_duration != '') {
            $duration_hover = 'style="-webkit-transition: all ' . $value_duration . 'ms ease;-moz-transition: all ' . $value_duration . 'ms ease;-ms-transition: all ' . $value_duration . 'ms ease;-o-transition: all ' . $value_duration . 'ms ease;transition: all ' . $value_duration . 'ms ease;"';
        }
        ?>
        <div class="asex_mailchimp_form">
            <!-- For subscription Form-->
            <form method="GET" action="<?php echo $mailchimp_s_url ?>" target="_blank">
                <input class="asex_email_mailchimp" type="email" required="" placeholder="<?php _e('Email Address', 'asex') ?>" name="EMAIL">
                <input type="hidden" name="u" value="<?php echo $mailchimp_data[0] ?>">
                <input type="hidden" name="id" value="<?php echo $mailchimp_data[1] ?>">
                <button class="asex_button_submit_mailchimp" type="submit" <?php echo $duration_hover; ?>><?php echo esc_html($options['asex_button_text']); ?></button>
            </form>
        </div>

        <?php
        // REQUIRED
        $this->module_end($options);
    }

}
