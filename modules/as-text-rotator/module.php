<?php

class AS_text_rotator extends DSLC_Module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_text_rotator';
        $this->module_title    = __('AS - Text Rotator', 'dslc_string');
        $this->module_icon     = 'quote-right';
        $this->module_category = 'as - element';
    }

    function options() {

        $dslc_options = array(
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
                'label'             => __('TEXT I', 'dslc_string'),
                'id'                => 'as_rotator_1',
                'std'               => 'Super',
                'type'              => 'text',
                'refresh_on_change' => true,
            ),
            array(
                'label'             => __('TEXT II', 'dslc_string'),
                'id'                => 'as_rotator_2',
                'std'               => 'Easy, Simple, Customizable',
                'type'              => 'text',
                'refresh_on_change' => true,
            ),
            array(
                'label'             => __('TEXT III', 'dslc_string'),
                'id'                => 'as_rotator_3',
                'std'               => 'Text Rotator with Style',
                'type'              => 'text',
                'refresh_on_change' => true,
            ),
            array(
                'label'   => __('Style', 'dslc_string'),
                'id'      => 'as_rotator_style',
                'std'     => 'spin',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Fade', 'dslc_string'),
                        'value' => 'fade',
                    ),
                    array(
                        'label' => __('Flip', 'dslc_string'),
                        'value' => 'flip',
                    ),
                    array(
                        'label' => __('FlipCube', 'dslc_string'),
                        'value' => 'flipCube',
                    ),
                    array(
                        'label' => __('FlipUp', 'dslc_string'),
                        'value' => 'flipUp',
                    ),
                    array(
                        'label' => __('Spin', 'dslc_string'),
                        'value' => 'spin',
                    ),
                ),
            ),
            array(
                'label'             => __('Speed', 'dslc_string'),
                'id'                => 'as_rotator_speed',
                'std'               => '500',
                'type'              => 'text',
                'refresh_on_change' => true,
                'help'              => __('Just only type numper. Ex: 1 -> 5000', 'dslc_string'),
            ),
            /**
             * General
             */
            array(
                'label'                 => __('BG Color', 'dslc_string'),
                'id'                    => 'as_rotator_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('General', 'dslc_string'),
            ),
            array(
                'label'                 => __('BORDER COLOR', 'dslc_string'),
                'id'                    => 'as_rotator_boder_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('General', 'dslc_string'),
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'as_rotator_boder_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('General', 'dslc_string'),
            ),
            array(
                'label'                 => __('Borders', 'dslc_string'),
                'id'                    => 'as_rotator_boder',
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
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('General', 'dslc_string'),
            ),
            array(
                'label'                 => __('Border Radius', 'dslc_string'),
                'id'                    => 'as_rotator_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('General', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'as_rotator_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('General', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'as_rotator_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-body',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'tab'                   => __('General', 'dslc_string'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'as_rotator_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-body',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'tab'                   => __('General', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'dslc_string'),
                'id'                    => 'as_rotator_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'styling',
                'tab'                   => __('General', 'dslc_string'),
                'ext'                   => '%'
            ),
            /**
             * TEXT
             */
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'as_rotator_title_color',
                'std'                   => 'rgb(61, 61, 61)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-row-1,as-text-row-1 span',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('TEXT', 'dslc_string'),
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'as_rotator_title_font_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-row-1,as-text-row-1 span',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('TEXT', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'as_rotator_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-row-1,as-text-row-1 span',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('TEXT', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'as_rotator_title_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-row-1,as-text-row-1 span',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('TEXT', 'dslc_string'),
            ),
            array(
                'label'                 => __('Line Height', 'dslc_string'),
                'id'                    => 'as_rotator_title_line_height',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-row-1,as-text-row-1 span',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('TEXT', 'dslc_string'),
                'ext'                   => 'px'
            ),
            /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive Styling', 'dslc_string'),
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
                'tab'     => __('tablet', 'dslc_string'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_res_t_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_res_t_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'css_res_t_font_size',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-row-1,as-text-row-1 span',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px'
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
                'tab'     => __('phone', 'dslc_string'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_res_p_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_res_p_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'css_res_p_font_size',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-row-1,as-text-row-1 span',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px'
            ),
        );



        return apply_filters('dslc_module_options', $dslc_options, $this->module_id);
    }

    function output($options) {
        global $dslc_active;

        if ($dslc_active && is_user_logged_in() && current_user_can(DS_LIVE_COMPOSER_CAPABILITY))
            $dslc_is_admin = true;
        else
            $dslc_is_admin = false;

        $this->module_start($options);

        /* CUSTOM SPEED NUMBER */
        global $as_speed_text;
        $as_speed_text = $options['as_rotator_speed'];
        if (is_numeric($as_speed_text)) {
            switch ($as_speed_text) {
                case $as_speed_text > 5000:
                    $as_speed_text = 5000;
                    break;
                case $as_speed_text < 1:
                    $as_speed_text = 10;
                    break;
            }
        }
        else {
            $as_speed_text = 100;
        }
        /* END CUSTOM SPEED NUMBER */
        ?>

        <!-- Module output stars here -->
        <div class="as-text-body">
            <div class="as-text-wraper">

                <div class="as-text-main">
                    <h1 class="as-text-row-1"><?php echo esc_attr($options['as_rotator_1']); ?> <span class="rotate" data-anim-text="<?php echo esc_attr($options['as_rotator_style']); ?>"data-speed-text = "<?php echo esc_attr($as_speed_text); ?>"><?php echo esc_attr($options['as_rotator_2']); ?></span> <?php echo esc_attr($options['as_rotator_3']); ?></h1>
                </div>
            </div>
        </div>	

        <?php
        wp_reset_postdata();

        /* Module output ends here */

        /* Module output ends here */
        $this->module_end($options);
    }

}
