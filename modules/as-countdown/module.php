<?php

class AS_Countdown extends as_module {

    // Module Attributes
    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_Countdown';
        $this->module_title    = __('AS - Countdown', 'as_extension');
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
//             array(
// 				'label' => __( 'Time to Countdown', 'as_extension' ),
// 				'id' => 'time_countdown',
// 				'std' => '2016-07-26 00:00:00',
// 				'type' => 'text',
// 			),
            array(
                'label'                 => __('year', 'as_extension'),
                'id'                    => 'time_countdown_year',
                'std'                   => '2016',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('2000', 'as_extension'),
                        'value' => '2000'
                    ),
                    array(
                        'label' => __('2001', 'as_extension'),
                        'value' => '2001'
                    ),
                    array(
                        'label' => __('2002', 'as_extension'),
                        'value' => '2002'
                    ),
                    array(
                        'label' => __('2003', 'as_extension'),
                        'value' => '2003'
                    ),
                    array(
                        'label' => __('2004', 'as_extension'),
                        'value' => '2004'
                    ),
                    array(
                        'label' => __('2005', 'as_extension'),
                        'value' => '2005'
                    ),
                    array(
                        'label' => __('2006', 'as_extension'),
                        'value' => '2006'
                    ),
                    array(
                        'label' => __('2007', 'as_extension'),
                        'value' => '2007'
                    ),
                    array(
                        'label' => __('2008', 'as_extension'),
                        'value' => '2008'
                    ),
                    array(
                        'label' => __('2009', 'as_extension'),
                        'value' => '2009'
                    ),
                    array(
                        'label' => __('2010', 'as_extension'),
                        'value' => '2010'
                    ),
                    array(
                        'label' => __('2011', 'as_extension'),
                        'value' => '2011'
                    ),
                    array(
                        'label' => __('2012', 'as_extension'),
                        'value' => '2012'
                    ),
                    array(
                        'label' => __('2013', 'as_extension'),
                        'value' => '2013'
                    ),
                    array(
                        'label' => __('2014', 'as_extension'),
                        'value' => '2014'
                    ),
                    array(
                        'label' => __('2015', 'as_extension'),
                        'value' => '2015'
                    ),
                    array(
                        'label' => __('2016', 'as_extension'),
                        'value' => '2016'
                    ),
                    array(
                        'label' => __('2017', 'as_extension'),
                        'value' => '2017'
                    ),
                    array(
                        'label' => __('2018', 'as_extension'),
                        'value' => '2018'
                    ),
                    array(
                        'label' => __('2019', 'as_extension'),
                        'value' => '2019'
                    ),
                    array(
                        'label' => __('2020', 'as_extension'),
                        'value' => '2020'
                    ),
                    array(
                        'label' => __('2021', 'as_extension'),
                        'value' => '2021'
                    ),
                    array(
                        'label' => __('2022', 'as_extension'),
                        'value' => '2022'
                    ),
                    array(
                        'label' => __('2023', 'as_extension'),
                        'value' => '2023'
                    ),
                    array(
                        'label' => __('2024', 'as_extension'),
                        'value' => '2024'
                    ),
                    array(
                        'label' => __('2025', 'as_extension'),
                        'value' => '2025'
                    ),
                    array(
                        'label' => __('2026', 'as_extension'),
                        'value' => '2026'
                    ),
                    array(
                        'label' => __('2027', 'as_extension'),
                        'value' => '2027'
                    ),
                    array(
                        'label' => __('2028', 'as_extension'),
                        'value' => '2028'
                    ),
                    array(
                        'label' => __('2029', 'as_extension'),
                        'value' => '2029'
                    ),
                    array(
                        'label' => __('2030', 'as_extension'),
                        'value' => '2030'
                    ),
                    array(
                        'label' => __('2031', 'as_extension'),
                        'value' => '2031'
                    ),
                    array(
                        'label' => __('2032', 'as_extension'),
                        'value' => '2032'
                    ),
                    array(
                        'label' => __('2033', 'as_extension'),
                        'value' => '2033'
                    ),
                    array(
                        'label' => __('2034', 'as_extension'),
                        'value' => '2034'
                    ),
                    array(
                        'label' => __('2035', 'as_extension'),
                        'value' => '2035'
                    ),
                    array(
                        'label' => __('2036', 'as_extension'),
                        'value' => '2036'
                    ),
                    array(
                        'label' => __('2037', 'as_extension'),
                        'value' => '2037'
                    ),
                    array(
                        'label' => __('2038', 'as_extension'),
                        'value' => '2038'
                    ),
                    array(
                        'label' => __('2039', 'as_extension'),
                        'value' => '2039'
                    ),
                    array(
                        'label' => __('2040', 'as_extension'),
                        'value' => '2040'
                    ),
                    array(
                        'label' => __('2041', 'as_extension'),
                        'value' => '2041'
                    ),
                    array(
                        'label' => __('2042', 'as_extension'),
                        'value' => '2042'
                    ),
                    array(
                        'label' => __('2043', 'as_extension'),
                        'value' => '2043'
                    ),
                    array(
                        'label' => __('2044', 'as_extension'),
                        'value' => '2044'
                    ),
                    array(
                        'label' => __('2045', 'as_extension'),
                        'value' => '2045'
                    ),
                    array(
                        'label' => __('2046', 'as_extension'),
                        'value' => '2046'
                    ),
                    array(
                        'label' => __('2047', 'as_extension'),
                        'value' => '2047'
                    ),
                    array(
                        'label' => __('2048', 'as_extension'),
                        'value' => '2048'
                    ),
                    array(
                        'label' => __('2049', 'as_extension'),
                        'value' => '2049'
                    ),
                    array(
                        'label' => __('2050', 'as_extension'),
                        'value' => '2050'
                    ),
                ),
                'refresh_on_change'     => true,
                'affect_on_change_rule' => 'time_countdown_year',
            ),
            array(
                'label'                 => __('month', 'as_extension'),
                'id'                    => 'time_countdown_month',
                'std'                   => '08',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('January', 'as_extension'),
                        'value' => '01'
                    ),
                    array(
                        'label' => __('February', 'as_extension'),
                        'value' => '02'
                    ),
                    array(
                        'label' => __('March', 'as_extension'),
                        'value' => '03'
                    ),
                    array(
                        'label' => __('April', 'as_extension'),
                        'value' => '04'
                    ),
                    array(
                        'label' => __('May', 'as_extension'),
                        'value' => '05'
                    ),
                    array(
                        'label' => __('June', 'as_extension'),
                        'value' => '06'
                    ),
                    array(
                        'label' => __('July', 'as_extension'),
                        'value' => '07'
                    ),
                    array(
                        'label' => __('August', 'as_extension'),
                        'value' => '08'
                    ),
                    array(
                        'label' => __('September', 'as_extension'),
                        'value' => '09'
                    ),
                    array(
                        'label' => __('October', 'as_extension'),
                        'value' => '10'
                    ),
                    array(
                        'label' => __('November', 'as_extension'),
                        'value' => '11'
                    ),
                    array(
                        'label' => __('December', 'as_extension'),
                        'value' => '12'
                    ),
                ),
                'refresh_on_change'     => true,
                'affect_on_change_rule' => 'time_countdown_daymonth',
            ),
            array(
                'label'                 => __('Day', 'as_extension'),
                'id'                    => 'time_countdown_day',
                'std'                   => '01',
                'type'                  => 'text',
                'refresh_on_change'     => true,
                'affect_on_change_rule' => 'time_countdown_day',
            ),
            array(
                'label'             => __('Hours', 'as_extension'),
                'id'                => 'time_countdown_hours',
                'std'               => '07',
                'refresh_on_change' => true,
                'type'              => 'text',
            ),
            array(
                'label'             => __('Minutes', 'as_extension'),
                'id'                => 'time_countdown_minutes',
                'std'               => '08',
                'refresh_on_change' => true,
                'type'              => 'text',
            ),
            array(
                'label'             => __('Second', 'as_extension'),
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
                'label'                 => __('Margin Top', 'as_extension'),
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
                'label'                 => __('Margin Bottom', 'as_extension'),
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
                'label'                 => __('Date  Color', 'as_extension'),
                'id'                    => 'as_timing_date_color',
                'std'                   => '#21c2f8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
            ),
            array(
                'label'                 => __('Hours  Color', 'as_extension'),
                'id'                    => 'as_timing_hours_color',
                'std'                   => '#f28776',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
            ),
            array(
                'label'                 => __('Minutes  Color', 'as_extension'),
                'id'                    => 'as_timing_minutes_color',
                'std'                   => '#9675ed',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
            ),
            array(
                'label'                 => __('Seconds  Color', 'as_extension'),
                'id'                    => 'as_timing_seconds_color',
                'std'                   => '#facc43',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
            ),
            array(
                'label'                 => __('Number Text Color', 'as_extension'),
                'id'                    => 'css_number_text_color',
                'std'                   => '#272822',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>span',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Size', 'as_extension'),
                'id'                    => 'css_number_font_size',
                'std'                   => '48',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>span',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'as_extension'),
                'id'                    => 'css_number_font_weight',
                'std'                   => '300',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>span',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'as_extension'),
                'id'                    => 'css_number_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>span',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height', 'as_extension'),
                'id'                    => 'css_number_lheight',
                'std'                   => '48',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>span',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Text Color', 'as_extension'),
                'id'                    => 'css_text_color',
                'std'                   => '#a1b1bc',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>h4',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
            ),
            array(
                'label'                 => __('Font Size Text', 'as_extension'),
                'id'                    => 'css_text_font_size',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>h4',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight Text', 'as_extension'),
                'id'                    => 'css_text_font_weight',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>h4',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family Text', 'as_extension'),
                'id'                    => 'css_text_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>h4',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
            ),
            array(
                'label'                 => __('Line Height Text', 'as_extension'),
                'id'                    => 'css_text_lheight',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.time_circles>div>h4',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'as_extension'),
                'ext'                   => 'px'
            ),
             /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive', 'as_extension'),
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
                'tab'     => 'tablet',
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
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
                'label'                 => __('Padding Vertical', 'as_extension'),
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
                'label'                 => __('Padding Horizontal', 'as_extension'),
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
                'label'   => __('Responsive', 'as_extension'),
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
                'tab'     => 'phone',
            ),
            array(
                'label'                 => __('Margin Bottom', 'as_extension'),
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
                'label'                 => __('Padding Vertical', 'as_extension'),
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
                'label'                 => __('Padding Horizontal', 'as_extension'),
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
