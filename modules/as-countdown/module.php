<?php

class AS_Countdown extends DSLC_Module {

    // Module Attributes
    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_Countdown';
        $this->module_title    = __('AS - Countdown', 'dslc_string');
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
                'label'   => __('Show On', 'dslc_string'),
                'id'      => 'css_show_on',
                'std'     => 'desktop tablet phone',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Desktop', 'dslc_string'),
                        'value' => 'desktop'
                    ),
                    array(
                        'label' => __('Tablet', 'dslc_string'),
                        'value' => 'tablet'
                    ),
                    array(
                        'label' => __('Phone', 'dslc_string'),
                        'value' => 'phone'
                    ),
                ),
            ),
            array(
                'label'                 => __('year', 'dslc_string'),
                'id'                    => 'time_countdown_year',
                'std'                   => '2016',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('2000', 'dslc_string'),
                        'value' => '2000'
                    ),
                    array(
                        'label' => __('2001', 'dslc_string'),
                        'value' => '2001'
                    ),
                    array(
                        'label' => __('2002', 'dslc_string'),
                        'value' => '2002'
                    ),
                    array(
                        'label' => __('2003', 'dslc_string'),
                        'value' => '2003'
                    ),
                    array(
                        'label' => __('2004', 'dslc_string'),
                        'value' => '2004'
                    ),
                    array(
                        'label' => __('2005', 'dslc_string'),
                        'value' => '2005'
                    ),
                    array(
                        'label' => __('2006', 'dslc_string'),
                        'value' => '2006'
                    ),
                    array(
                        'label' => __('2007', 'dslc_string'),
                        'value' => '2007'
                    ),
                    array(
                        'label' => __('2008', 'dslc_string'),
                        'value' => '2008'
                    ),
                    array(
                        'label' => __('2009', 'dslc_string'),
                        'value' => '2009'
                    ),
                    array(
                        'label' => __('2010', 'dslc_string'),
                        'value' => '2010'
                    ),
                    array(
                        'label' => __('2011', 'dslc_string'),
                        'value' => '2011'
                    ),
                    array(
                        'label' => __('2012', 'dslc_string'),
                        'value' => '2012'
                    ),
                    array(
                        'label' => __('2013', 'dslc_string'),
                        'value' => '2013'
                    ),
                    array(
                        'label' => __('2014', 'dslc_string'),
                        'value' => '2014'
                    ),
                    array(
                        'label' => __('2015', 'dslc_string'),
                        'value' => '2015'
                    ),
                    array(
                        'label' => __('2016', 'dslc_string'),
                        'value' => '2016'
                    ),
                    array(
                        'label' => __('2017', 'dslc_string'),
                        'value' => '2017'
                    ),
                    array(
                        'label' => __('2018', 'dslc_string'),
                        'value' => '2018'
                    ),
                    array(
                        'label' => __('2019', 'dslc_string'),
                        'value' => '2019'
                    ),
                    array(
                        'label' => __('2020', 'dslc_string'),
                        'value' => '2020'
                    ),
                    array(
                        'label' => __('2021', 'dslc_string'),
                        'value' => '2021'
                    ),
                    array(
                        'label' => __('2022', 'dslc_string'),
                        'value' => '2022'
                    ),
                    array(
                        'label' => __('2023', 'dslc_string'),
                        'value' => '2023'
                    ),
                    array(
                        'label' => __('2024', 'dslc_string'),
                        'value' => '2024'
                    ),
                    array(
                        'label' => __('2025', 'dslc_string'),
                        'value' => '2025'
                    ),
                    array(
                        'label' => __('2026', 'dslc_string'),
                        'value' => '2026'
                    ),
                    array(
                        'label' => __('2027', 'dslc_string'),
                        'value' => '2027'
                    ),
                    array(
                        'label' => __('2028', 'dslc_string'),
                        'value' => '2028'
                    ),
                    array(
                        'label' => __('2029', 'dslc_string'),
                        'value' => '2029'
                    ),
                    array(
                        'label' => __('2030', 'dslc_string'),
                        'value' => '2030'
                    ),
                    array(
                        'label' => __('2031', 'dslc_string'),
                        'value' => '2031'
                    ),
                    array(
                        'label' => __('2032', 'dslc_string'),
                        'value' => '2032'
                    ),
                    array(
                        'label' => __('2033', 'dslc_string'),
                        'value' => '2033'
                    ),
                    array(
                        'label' => __('2034', 'dslc_string'),
                        'value' => '2034'
                    ),
                    array(
                        'label' => __('2035', 'dslc_string'),
                        'value' => '2035'
                    ),
                    array(
                        'label' => __('2036', 'dslc_string'),
                        'value' => '2036'
                    ),
                    array(
                        'label' => __('2037', 'dslc_string'),
                        'value' => '2037'
                    ),
                    array(
                        'label' => __('2038', 'dslc_string'),
                        'value' => '2038'
                    ),
                    array(
                        'label' => __('2039', 'dslc_string'),
                        'value' => '2039'
                    ),
                    array(
                        'label' => __('2040', 'dslc_string'),
                        'value' => '2040'
                    ),
                    array(
                        'label' => __('2041', 'dslc_string'),
                        'value' => '2041'
                    ),
                    array(
                        'label' => __('2042', 'dslc_string'),
                        'value' => '2042'
                    ),
                    array(
                        'label' => __('2043', 'dslc_string'),
                        'value' => '2043'
                    ),
                    array(
                        'label' => __('2044', 'dslc_string'),
                        'value' => '2044'
                    ),
                    array(
                        'label' => __('2045', 'dslc_string'),
                        'value' => '2045'
                    ),
                    array(
                        'label' => __('2046', 'dslc_string'),
                        'value' => '2046'
                    ),
                    array(
                        'label' => __('2047', 'dslc_string'),
                        'value' => '2047'
                    ),
                    array(
                        'label' => __('2048', 'dslc_string'),
                        'value' => '2048'
                    ),
                    array(
                        'label' => __('2049', 'dslc_string'),
                        'value' => '2049'
                    ),
                    array(
                        'label' => __('2050', 'dslc_string'),
                        'value' => '2050'
                    ),
                ),
                'refresh_on_change'     => true,
                'affect_on_change_rule' => 'time_countdown_year',
            ),
            array(
                'label'                 => __('month', 'dslc_string'),
                'id'                    => 'time_countdown_month',
                'std'                   => '08',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('January', 'dslc_string'),
                        'value' => '01'
                    ),
                    array(
                        'label' => __('February', 'dslc_string'),
                        'value' => '02'
                    ),
                    array(
                        'label' => __('March', 'dslc_string'),
                        'value' => '03'
                    ),
                    array(
                        'label' => __('April', 'dslc_string'),
                        'value' => '04'
                    ),
                    array(
                        'label' => __('May', 'dslc_string'),
                        'value' => '05'
                    ),
                    array(
                        'label' => __('June', 'dslc_string'),
                        'value' => '06'
                    ),
                    array(
                        'label' => __('July', 'dslc_string'),
                        'value' => '07'
                    ),
                    array(
                        'label' => __('August', 'dslc_string'),
                        'value' => '08'
                    ),
                    array(
                        'label' => __('September', 'dslc_string'),
                        'value' => '09'
                    ),
                    array(
                        'label' => __('October', 'dslc_string'),
                        'value' => '10'
                    ),
                    array(
                        'label' => __('November', 'dslc_string'),
                        'value' => '11'
                    ),
                    array(
                        'label' => __('December', 'dslc_string'),
                        'value' => '12'
                    ),
                ),
                'refresh_on_change'     => true,
                'affect_on_change_rule' => 'time_countdown_daymonth',
            ),
            array(
                'label'                 => __('Day', 'dslc_string'),
                'id'                    => 'time_countdown_day',
                'std'                   => '01',
                'type'                  => 'text',
                'refresh_on_change'     => true,
                'affect_on_change_rule' => 'time_countdown_day',
            ),
            array(
                'label'             => __('Hours', 'dslc_string'),
                'id'                => 'time_countdown_hours',
                'std'               => '07',
                'refresh_on_change' => true,
                'type'              => 'text',
            ),
            array(
                'label'             => __('Minutes', 'dslc_string'),
                'id'                => 'time_countdown_minutes',
                'std'               => '08',
                'refresh_on_change' => true,
                'type'              => 'text',
            ),
            array(
                'label'             => __('Second', 'dslc_string'),
                'id'                => 'time_countdown_second',
                'std'               => '07',
                'refresh_on_change' => true,
                'type'              => 'text',
            ),
            array(
                'label'                 => __('Margin Top', 'dslc_string'),
                'id'                    => 'css_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-countdown',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100,
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-countdown',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100,
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_res_t_padding_vertical_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as-countdown',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_res_t_padding_horizontal_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as-countdown',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            /**
             * Timing
             */
            array(
                'label'                 => __('Date  Color', 'dslc_string'),
                'id'                    => 'as_timing_date_color',
                'std'                   => '#21c2f8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-canvas-day >.kineticjs-content',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
            ),
            array(
                'label'                 => __('Hours  Color', 'dslc_string'),
                'id'                    => 'as_timing_hours_color',
                'std'                   => '#f28776',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-canvas-hours >.kineticjs-content',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
            ),
            array(
                'label'                 => __('Minutes  Color', 'dslc_string'),
                'id'                    => 'as_timing_minutes_color',
                'std'                   => '#9675ed',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-canvas-minute >.kineticjs-content',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
            ),
            array(
                'label'                 => __('Seconds  Color', 'dslc_string'),
                'id'                    => 'as_timing_seconds_color',
                'std'                   => '#facc43',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-canvas-second >.kineticjs-content',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
            ),
            array(
                'label'                 => __('Number Color', 'dslc_string'),
                'id'                    => 'css_number_text_color',
                'std'                   => '#272822',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-cowntdown-number',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
            ),
            array(
                'label'                 => __('Font Size ( Number )', 'dslc_string'),
                'id'                    => 'css_number_font_size',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-cowntdown-number',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight ( Number)', 'dslc_string'),
                'id'                    => 'css_number_font_weight',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-cowntdown-number',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'css_number_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-cowntdown-number',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
            ),
            array(
                'label'                 => __('Text Color', 'dslc_string'),
                'id'                    => 'css_text_color',
                'std'                   => '#a1b1bc',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-countdown-text',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
            ),
            array(
                'label'                 => __('Font Size Text', 'dslc_string'),
                'id'                    => 'css_text_font_size',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-countdown-text',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight Text', 'dslc_string'),
                'id'                    => 'css_text_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-countdown-text',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family Text', 'dslc_string'),
                'id'                    => 'css_text_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-countdown-text',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
            ),
            array(
                'label'                 => __('Line Height Text', 'dslc_string'),
                'id'                    => 'css_text_lheight',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-countdown-text',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
                'ext'                   => 'px'
            ),
             array(
                'label'                 => __('Margin Top', 'dslc_string'),
                'id'                    => 'css_text_mgtop',
                'std'                   => '76',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text',
                'affect_on_change_rule' => 'top',
                'section'               => 'styling',
                'tab'                   => __('Timing', 'dslc_string'),
                'ext'                   => 'px',
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
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as_countdown',
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
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as_countdown',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_res_p_padding_vertical_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as_countdown',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_res_p_padding_horizontal_form',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.as_countdown',
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


<div class="as-countdown as-countdown-container">
    <div class=" as-cowntdown-data" data-date="<?php echo $options['time_countdown'];?>">
        <div class="as-clock-item clock-days  dslc-col dslc-3-col">
            <div class="as-wrap">
                <div class="inner">
                    <div id="canvas-days" class="as-clock-canvas as-canvas-day"></div>
                    <div class="as-text">
                        <p class="as-cowntdown-number val">0</p>
                        <p class="as-days as-time as-countdown-text">DAYS</p>
                    </div><!-- /.text -->
                </div><!-- /.inner -->
            </div><!-- /.as-wrap -->
        </div><!-- /.as-clock-item -->
        <div class="as-clock-item clock-hours  dslc-col dslc-3-col">
            <div class="as-wrap">
                <div class="inner">
                    <div id="canvas-hours" class="as-clock-canvas as-canvas-hours"></div>
                    <div class="as-text">
                        <p class="as-cowntdown-number val">0</p>
                        <p class="as-hours as-time as-countdown-text">HOURS</p>
                    </div><!-- /.text -->
                </div><!-- /.inner -->
            </div><!-- /.as-wrap -->
        </div><!-- /.as-clock-item -->
        <div class="as-clock-item clock-minutes  dslc-col dslc-3-col">
            <div class="as-wrap">
                <div class="inner">
                    <div id="canvas-minutes" class="as-clock-canvas as-canvas-minute"></div>
                    <div class="as-text">
                        <p class="as-cowntdown-number val">0</p>
                        <p class="as-minutes as-time as-countdown-text">MINUTES</p>
                    </div><!-- /.text -->
                </div><!-- /.inner -->
            </div><!-- /.as-wrap -->
        </div><!-- /.as-clock-item -->
        <div class="as-clock-item clock-seconds  dslc-col dslc-3-col">
            <div class="as-wrap">
                <div class="inner">
                    <div id="canvas-seconds" class="as-clock-canvas as-canvas-second"></div>
                    <div class="as-text">
                        <p class="as-cowntdown-number val">0</p>
                        <p class="as-seconds as-time as-countdown-text">SECONDS</p>
                    </div><!-- /.text -->
                </div><!-- /.inner -->
            </div><!-- /.as-wrap -->
        </div><!-- /.as-as-clock-item -->
    </div><!-- /.clock -->
</div><!-- /.countdown-wrapper -->

        <?php
        // REQUIRED
        $this->module_end($options);
    }

}
