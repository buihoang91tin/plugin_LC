<?php

class AS_Countdown extends as_module {

    // Module Attributes
    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_Countdown';
        $this->module_title    = __('AS - Countdown', 'live-composer-page-builder');
        $this->module_icon     = 'dashboard';
        $this->module_category = 'as - Counter';
    }

    // Module Options
    function options() {
        // The options array
        $dslc_options = array(
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
//             array(
// 				'label' => __( 'Time to Countdown', 'live-composer-page-builder' ),
// 				'id' => 'time_countdown',
// 				'std' => '2016-07-26 00:00:00',
// 				'type' => 'text',
// 			),
            array(
                'label'                 => __('year', 'live-composer-page-builder'),
                'id'                    => 'time_countdown_year',
                'std'                   => '2016',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('2000', 'live-composer-page-builder'),
                        'value' => '2000'
                    ),
                    array(
                        'label' => __('2001', 'live-composer-page-builder'),
                        'value' => '2001'
                    ),
                    array(
                        'label' => __('2002', 'live-composer-page-builder'),
                        'value' => '2002'
                    ),
                    array(
                        'label' => __('2003', 'live-composer-page-builder'),
                        'value' => '2003'
                    ),
                    array(
                        'label' => __('2004', 'live-composer-page-builder'),
                        'value' => '2004'
                    ),
                    array(
                        'label' => __('2005', 'live-composer-page-builder'),
                        'value' => '2005'
                    ),
                    array(
                        'label' => __('2006', 'live-composer-page-builder'),
                        'value' => '2006'
                    ),
                    array(
                        'label' => __('2007', 'live-composer-page-builder'),
                        'value' => '2007'
                    ),
                    array(
                        'label' => __('2008', 'live-composer-page-builder'),
                        'value' => '2008'
                    ),
                    array(
                        'label' => __('2009', 'live-composer-page-builder'),
                        'value' => '2009'
                    ),
                    array(
                        'label' => __('2010', 'live-composer-page-builder'),
                        'value' => '2010'
                    ),
                    array(
                        'label' => __('2011', 'live-composer-page-builder'),
                        'value' => '2011'
                    ),
                    array(
                        'label' => __('2012', 'live-composer-page-builder'),
                        'value' => '2012'
                    ),
                    array(
                        'label' => __('2013', 'live-composer-page-builder'),
                        'value' => '2013'
                    ),
                    array(
                        'label' => __('2014', 'live-composer-page-builder'),
                        'value' => '2014'
                    ),
                    array(
                        'label' => __('2015', 'live-composer-page-builder'),
                        'value' => '2015'
                    ),
                    array(
                        'label' => __('2016', 'live-composer-page-builder'),
                        'value' => '2016'
                    ),
                    array(
                        'label' => __('2017', 'live-composer-page-builder'),
                        'value' => '2017'
                    ),
                    array(
                        'label' => __('2018', 'live-composer-page-builder'),
                        'value' => '2018'
                    ),
                    array(
                        'label' => __('2019', 'live-composer-page-builder'),
                        'value' => '2019'
                    ),
                    array(
                        'label' => __('2020', 'live-composer-page-builder'),
                        'value' => '2020'
                    ),
                    array(
                        'label' => __('2021', 'live-composer-page-builder'),
                        'value' => '2021'
                    ),
                    array(
                        'label' => __('2022', 'live-composer-page-builder'),
                        'value' => '2022'
                    ),
                    array(
                        'label' => __('2023', 'live-composer-page-builder'),
                        'value' => '2023'
                    ),
                    array(
                        'label' => __('2024', 'live-composer-page-builder'),
                        'value' => '2024'
                    ),
                    array(
                        'label' => __('2025', 'live-composer-page-builder'),
                        'value' => '2025'
                    ),
                    array(
                        'label' => __('2026', 'live-composer-page-builder'),
                        'value' => '2026'
                    ),
                    array(
                        'label' => __('2027', 'live-composer-page-builder'),
                        'value' => '2027'
                    ),
                    array(
                        'label' => __('2028', 'live-composer-page-builder'),
                        'value' => '2028'
                    ),
                    array(
                        'label' => __('2029', 'live-composer-page-builder'),
                        'value' => '2029'
                    ),
                    array(
                        'label' => __('2030', 'live-composer-page-builder'),
                        'value' => '2030'
                    ),
                    array(
                        'label' => __('2031', 'live-composer-page-builder'),
                        'value' => '2031'
                    ),
                    array(
                        'label' => __('2032', 'live-composer-page-builder'),
                        'value' => '2032'
                    ),
                    array(
                        'label' => __('2033', 'live-composer-page-builder'),
                        'value' => '2033'
                    ),
                    array(
                        'label' => __('2034', 'live-composer-page-builder'),
                        'value' => '2034'
                    ),
                    array(
                        'label' => __('2035', 'live-composer-page-builder'),
                        'value' => '2035'
                    ),
                    array(
                        'label' => __('2036', 'live-composer-page-builder'),
                        'value' => '2036'
                    ),
                    array(
                        'label' => __('2037', 'live-composer-page-builder'),
                        'value' => '2037'
                    ),
                    array(
                        'label' => __('2038', 'live-composer-page-builder'),
                        'value' => '2038'
                    ),
                    array(
                        'label' => __('2039', 'live-composer-page-builder'),
                        'value' => '2039'
                    ),
                    array(
                        'label' => __('2040', 'live-composer-page-builder'),
                        'value' => '2040'
                    ),
                    array(
                        'label' => __('2041', 'live-composer-page-builder'),
                        'value' => '2041'
                    ),
                    array(
                        'label' => __('2042', 'live-composer-page-builder'),
                        'value' => '2042'
                    ),
                    array(
                        'label' => __('2043', 'live-composer-page-builder'),
                        'value' => '2043'
                    ),
                    array(
                        'label' => __('2044', 'live-composer-page-builder'),
                        'value' => '2044'
                    ),
                    array(
                        'label' => __('2045', 'live-composer-page-builder'),
                        'value' => '2045'
                    ),
                    array(
                        'label' => __('2046', 'live-composer-page-builder'),
                        'value' => '2046'
                    ),
                    array(
                        'label' => __('2047', 'live-composer-page-builder'),
                        'value' => '2047'
                    ),
                    array(
                        'label' => __('2048', 'live-composer-page-builder'),
                        'value' => '2048'
                    ),
                    array(
                        'label' => __('2049', 'live-composer-page-builder'),
                        'value' => '2049'
                    ),
                    array(
                        'label' => __('2050', 'live-composer-page-builder'),
                        'value' => '2050'
                    ),
                ),
                'refresh_on_change'     => true,
                'affect_on_change_rule' => 'time_countdown_year',
            ),
            array(
                'label'                 => __('month', 'live-composer-page-builder'),
                'id'                    => 'time_countdown_month',
                'std'                   => '08',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('January', 'live-composer-page-builder'),
                        'value' => '01'
                    ),
                    array(
                        'label' => __('February', 'live-composer-page-builder'),
                        'value' => '02'
                    ),
                    array(
                        'label' => __('March', 'live-composer-page-builder'),
                        'value' => '03'
                    ),
                    array(
                        'label' => __('April', 'live-composer-page-builder'),
                        'value' => '04'
                    ),
                    array(
                        'label' => __('May', 'live-composer-page-builder'),
                        'value' => '05'
                    ),
                    array(
                        'label' => __('June', 'live-composer-page-builder'),
                        'value' => '06'
                    ),
                    array(
                        'label' => __('July', 'live-composer-page-builder'),
                        'value' => '07'
                    ),
                    array(
                        'label' => __('August', 'live-composer-page-builder'),
                        'value' => '08'
                    ),
                    array(
                        'label' => __('September', 'live-composer-page-builder'),
                        'value' => '09'
                    ),
                    array(
                        'label' => __('October', 'live-composer-page-builder'),
                        'value' => '10'
                    ),
                    array(
                        'label' => __('November', 'live-composer-page-builder'),
                        'value' => '11'
                    ),
                    array(
                        'label' => __('December', 'live-composer-page-builder'),
                        'value' => '12'
                    ),
                ),
                'refresh_on_change'     => true,
                'affect_on_change_rule' => 'time_countdown_daymonth',
            ),
            array(
                'label'                 => __('Day', 'live-composer-page-builder'),
                'id'                    => 'time_countdown_day',
                'std'                   => '01',
                'type'                  => 'text',
                'refresh_on_change'     => true,
                'affect_on_change_rule' => 'time_countdown_day',
            ),
            array(
                'label'             => __('Hours', 'live-composer-page-builder'),
                'id'                => 'time_countdown_hours',
                'std'               => '07',
                'refresh_on_change' => true,
                'type'              => 'text',
            ),
            array(
                'label'             => __('Minutes', 'live-composer-page-builder'),
                'id'                => 'time_countdown_minutes',
                'std'               => '08',
                'refresh_on_change' => true,
                'type'              => 'text',
            ),
            array(
                'label'             => __('Second', 'live-composer-page-builder'),
                'id'                => 'time_countdown_second',
                'std'               => '07',
                'refresh_on_change' => true,
                'type'              => 'text',
            ),
            /*
             * Styling
             */
            array(
                'label'                 => __('Padding Vertical', 'monalisa'),
                'id'                    => 'css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'monalisa'),
                'id'                    => 'css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-accordion',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Top', 'live-composer-page-builder'),
                'id'                    => 'css_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.coming_soon_ctn',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100,
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.coming_soon_ctn',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100,
            ),
            /**
             * Timing
             */
            array(
                'label'                 => __('Date  Color', 'live-composer-page-builder'),
                'id'                    => 'as_timing_date_color',
                'std'                   => '#21c2f8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Hours  Color', 'live-composer-page-builder'),
                'id'                    => 'as_timing_hours_color',
                'std'                   => '#f28776',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Minutes  Color', 'live-composer-page-builder'),
                'id'                    => 'as_timing_minutes_color',
                'std'                   => '#9675ed',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Seconds  Color', 'live-composer-page-builder'),
                'id'                    => 'as_timing_seconds_color',
                'std'                   => '#facc43',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Number Text Color', 'live-composer-page-builder'),
                'id'                    => 'css_number_text_color',
                'std'                   => '#272822',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>span',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_number_font_size',
                'std'                   => '48',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>span',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'css_number_font_weight',
                'std'                   => '300',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>span',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'css_number_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>span',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Line Height', 'live-composer-page-builder'),
                'id'                    => 'css_number_lheight',
                'std'                   => '48',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>span',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Text Color', 'live-composer-page-builder'),
                'id'                    => 'css_text_color',
                'std'                   => '#a1b1bc',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>h4',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size Text', 'live-composer-page-builder'),
                'id'                    => 'css_text_font_size',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight Text', 'live-composer-page-builder'),
                'id'                    => 'css_text_font_weight',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>h4',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family Text', 'live-composer-page-builder'),
                'id'                    => 'css_text_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>h4',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Line Height Text', 'live-composer-page-builder'),
                'id'                    => 'css_text_lheight',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
             /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive', 'live-composer-page-builder'),
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
                'tab'     => 'tablet',
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as_count_down',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_padding_vertical_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as_count_down',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_padding_horizontal_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as_count_down',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            /**
             * Responsive Phone
             */
            array(
                'label'   => __('Responsive', 'live-composer-page-builder'),
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
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as_count_down',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_padding_vertical_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as_count_down',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_padding_horizontal_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as_count_down',
                'affect_on_change_rule' => 'padding-left,padding-right',
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
        if (!is_numeric($options['time_countdown_day'])) {
            $options['time_countdown_day'] = "01";
        }
        if (!is_numeric($options['time_countdown_hours'])) {
            $options['time_countdown_hours'] = "07";
        }
        if (!is_numeric($options['time_countdown_minutes'])) {
            $options['time_countdown_minutes'] = "08";
        }
        if (!is_numeric($options['time_countdown_second'])) {
            $options['time_countdown_second'] = "07";
        }

        $options['time_countdown'] = $options['time_countdown_year'];
        $options['time_countdown'].= "-" . $options['time_countdown_month'];
        $options['time_countdown'].= "-" . $options['time_countdown_day'];
        $options['time_countdown'].= " " . $options['time_countdown_hours'];
        $options['time_countdown'].= ":" . $options['time_countdown_minutes'];
        $options['time_countdown'].= ":" . $options['time_countdown_second'];

        // Module output stars here 

        $elementID = uniqid('as_googlemap_');
        ?>


        <?php if ((empty($options['time_countdown']))): ?>
            <div class="dslc-notification dslc-red"><?php _e('Time CountDown preview is not available in admin active. Please setting option, after click save changes and disable Live Composer for viewing time countdown.', 'monalisa'); ?><br></div>
        <?php else: ?>
            <div class="coming_soon_ctn">
                <div class="timing" style="width:100%;">
                    <div class="as_count_down" id="<?php echo $elementID; ?>" data-date="<?php echo esc_attr($options['time_countdown']); ?>" date-color="<?php echo esc_attr($options['as_timing_date_color']); ?>" hours-color="<?php echo esc_attr($options['as_timing_hours_color']); ?>" minutes-color="<?php echo esc_attr($options['as_timing_minutes_color']); ?>" seconds-color="<?php echo esc_attr($options['as_timing_seconds_color']); ?>" ></div>
                </div>
            </div>   

        <?php endif ?>        

        <?php
        // REQUIRED
        $this->module_end($options);
    }

}
