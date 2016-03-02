<?php

class AS_SubscriptionBox extends as_module {

    // Module Attributes
    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_SubscriptionBox';
        $this->module_title    = __('AS - Mailchimp Subscription', 'live-composer-page-builder');
        $this->module_icon     = 'envelope-alt';
        $this->module_category = 'as - element';
    }

    // Module Options
    function options() {
        // The options array
        $dslc_options = array(
            /* CLIKC TO EDIT */
            array(
                'label' => __('MailChimp URL', 'live-composer-page-builder'),
                'id'    => 'as_mailchimp_url',
                'std'   => 'http://alenastudio.us10.list-manage.com/subscribe?u=f2e21eb858ed6d4d505e8e877&id=ffdd9414e1',
                'type'  => 'text',
                'help'  => 'Right Click -> Open in new tab: <a href="https://www.screenr.com/kIXN" target="_blank">How to find MailChimp URL?</a>'
            ),
            /**
             * General
             */
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
                'label'                 => __('Align', 'live-composer-page-builder'),
                'id'                    => 'as_css_main_newsletter_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Background', 'live-composer-page-builder'),
                'id'                    => 'as_css_background_form',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'background',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
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
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'as_css_padding_vertical_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'as_css_padding_horizontal_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            /**
             * Button Styling
             */
            array(
                'label'                 => __('Width (%)', 'live-composer-page-builder'),
                'id'                    => 'as_css_input_width',
                'std'                   => '70',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'width',
                'section'               => 'styling',
                'ext'                   => '%',
                'tab'                   => __('Input Form', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'as_css_input_color',
                'std'                   => '#ccc',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Input Form', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Right', 'live-composer-page-builder'),
                'id'                    => 'as_css_input_margin_right',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Input Form', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'as_css_input_margin_bottom',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Input Form', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'as_css_input_padding_vertical_form',
                'std'                   => '9',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Input Form', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'as_css_input_padding_horizontal_form',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Input Form', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('BG Color', 'live-composer-page-builder'),
                'id'                    => 'as_input_css_newsletter_bg_color',
                'std'                   => 'rgb(255, 255, 255)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Input Form', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Color', 'live-composer-page-builder'),
                'id'                    => 'as_input_css_newsletter_border_color',
                'std'                   => '#ccc',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Input Form', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Radius', 'live-composer-page-builder'),
                'id'                    => 'as_input_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Input Form', 'live-composer-page-builder'),
            ),
            /**
             * Button Styling
             */
            array(
                'label'   => __('Button Text', 'live-composer-page-builder'),
                'id'      => 'as_button_text',
                'std'     => 'Subscribe',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Button Style', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Align', 'live-composer-page-builder'),
                'id'                    => 'as_button_newsletter_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Button Style', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('BG Color', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_bg_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Button Style', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_bg_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Button Style', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Color', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_border_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Button Style', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_border_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Button Style', 'live-composer-page-builder'),
            ),
            array(
                'label'             => __('Duration when hover(ms)', 'live-composer-page-builder'),
                'id'                => 'as_button_css_newsletter_duration_hover',
                'std'               => '300',
                'type'              => 'text',
                'refresh_on_change' => true,
                'section'           => 'styling',
                'tab'               => __('Button Style', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Button Style', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_border_trbl',
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
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Button Style', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Radius', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Button Style', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Button Style', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Button Style', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Button Style', 'live-composer-page-builder'),
            ),
            /**
             * Out line Style
             */
            array(
                'label'                 => __('Out Line Width', 'live-composer-page-builder'),
                'id'                    => 'as_button_newsletter_out_line_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Offset', 'live-composer-page-builder'),
                'id'                    => 'as_button_newsletter_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Out Line Color', 'live-composer-page-builder'),
                'id'                    => 'as_button_newsletter_out_line_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Out Line Color Hover', 'live-composer-page-builder'),
                'id'                    => 'as_button_newsletter_out_line_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp:hover',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Out Line Style', 'live-composer-page-builder'),
                'id'                    => 'as_button_newsletter_out_line_style',
                'std'                   => 'solid',
                'type'                  => 'select',
                'choices'               => array(
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
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-style',
                'section'               => 'styling',
                'tab'                   => __('Out Line Style', 'live-composer-page-builder'),
            ),
            /**
             * Typography
             */
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color - Hover', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('typography', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('typography', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('typography', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('typography', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Letter Spacing', 'live-composer-page-builder'),
                'id'                    => 'as_button_css_newsletter_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('typography', 'live-composer-page-builder'),
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
                'label'                 => __('Margin Bottom ', 'alenastudio'),
                'id'                    => 'css_res_t_as_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical ', 'alenastudio'),
                'id'                    => 'css_res_t_as_css_padding_vertical_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal ', 'alenastudio'),
                'id'                    => 'css_res_t_as_css_padding_horizontal_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Width (%)( Input Form ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_css_input_width',
                'std'                   => '70',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'width',
                'section'               => 'responsive',
                'ext'                   => '%',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Right( Input Form ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_css_input_margin_right',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Bottom( Input Form ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_css_input_margin_bottom',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical( Input Form ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_css_input_padding_vertical_form',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( Input Form ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_css_input_padding_horizontal_form',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Radius( Input Form ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_input_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Width( Button Style ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_newsletter_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Radius( Button Style ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Bottom( Button Style ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_newsletter_margin_bottom',
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
                'label'                 => __('Padding Vertical( Button Style ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_newsletter_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( Button Style ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_newsletter_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Out Line Width( Out Line Style ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_newsletter_out_line_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Out Line Offset( Out Line Style ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_newsletter_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( typography ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_newsletter_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( typography ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_newsletter_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
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
                'label'                 => __('Letter Spacing( typography ) ', 'alenastudio'),
                'id'                    => 'css_res_t_as_button_css_newsletter_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
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
                'label'                 => __('Margin Bottom ', 'alenastudio'),
                'id'                    => 'css_res_p_as_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical ', 'alenastudio'),
                'id'                    => 'css_res_p_as_css_padding_vertical_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal ', 'alenastudio'),
                'id'                    => 'css_res_p_as_css_padding_horizontal_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Width (%)( Input Form ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_css_input_width',
                'std'                   => '70',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'width',
                'section'               => 'responsive',
                'ext'                   => '%',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Right( Input Form ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_css_input_margin_right',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Bottom( Input Form ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_css_input_margin_bottom',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical( Input Form ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_css_input_padding_vertical_form',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( Input Form ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_css_input_padding_horizontal_form',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Radius( Input Form ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_input_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_email_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Width( Button Style ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_newsletter_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Radius( Button Style ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_newsletter_border_radius',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Bottom( Button Style ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_newsletter_margin_bottom',
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
                'label'                 => __('Padding Vertical( Button Style ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_newsletter_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal( Button Style ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_newsletter_padding_horizontal',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Out Line Width( Out Line Style ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_newsletter_out_line_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Out Line Offset( Out Line Style ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_newsletter_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Size( typography ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_newsletter_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array
                (
                'label'                 => __('Font Weight( typography ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_newsletter_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
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
                'label'                 => __('Letter Spacing( typography ) ', 'alenastudio'),
                'id'                    => 'css_res_p_as_button_css_newsletter_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
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
        $mailchimp_url   = $options["as_mailchimp_url"];
        $mailchimp_s_url = '';
        $mailchimp_data  = array(
            '',
            '');

        if (!empty($options["as_mailchimp_url"])) {
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
        $value_duration = $options['as_button_css_newsletter_duration_hover'];
        if ($value_duration != '') {
            $duration_hover = 'style="-webkit-transition: all ' . $value_duration . 'ms ease;-moz-transition: all ' . $value_duration . 'ms ease;-ms-transition: all ' . $value_duration . 'ms ease;-o-transition: all ' . $value_duration . 'ms ease;transition: all ' . $value_duration . 'ms ease;"';
        }
        ?>
        <div class="as_mailchimp_form">
            <!-- For subscription Form-->
            <form method="GET" action="<?php echo $mailchimp_s_url ?>" target="_blank">
                <input class="as_email_mailchimp" type="email" required="" placeholder="<?php _e('Email Address', 'alenastudio') ?>" name="EMAIL">
                <input type="hidden" name="u" value="<?php echo $mailchimp_data[0] ?>">
                <input type="hidden" name="id" value="<?php echo $mailchimp_data[1] ?>">
                <button class="as_button_submit_mailchimp" type="submit" <?php echo $duration_hover; ?>><?php echo esc_html($options['as_button_text']); ?></button>
            </form>
        </div>

        <?php
        // REQUIRED
        $this->module_end($options);
    }

}
