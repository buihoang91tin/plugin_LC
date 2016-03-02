<?php

class AS_text_rotator extends as_module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_text_rotator';
        $this->module_title    = __('AS - Text Rotator', 'live-composer-page-builder');
        $this->module_icon     = 'quote-right';
        $this->module_category = 'as - element';
    }

    function options() {

        $dslc_options = array(
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
                'label'             => __('Text before', 'live-composer-page-builder'),
                'id'                => 'as_rotator_1',
                'std'               => 'Super',
                'type'              => 'text',
                'refresh_on_change' => true,
            ),
            array(
                'label'             => __('Text rotate', 'live-composer-page-builder'),
                'id'                => 'as_rotator_2',
                'std'               => 'Easy, Simple, Customizable',
                'type'              => 'text',
                'refresh_on_change' => true,
                'help'              => __('Words separated by ","', 'live-composer-page-builder'),
            ),
            array(
                'label'             => __('Text after', 'live-composer-page-builder'),
                'id'                => 'as_rotator_3',
                'std'               => 'Text Rotator with Style',
                'type'              => 'text',
                'refresh_on_change' => true,
            ),
            array(
                'label'   => __('Effect Word', 'live-composer-page-builder'),
                'id'      => 'as_rotator_style',
                'std'     => 'spin',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Fade', 'live-composer-page-builder'),
                        'value' => 'fade',
                    ),
                    array(
                        'label' => __('Flip', 'live-composer-page-builder'),
                        'value' => 'flip',
                    ),
                    array(
                        'label' => __('FlipCube', 'live-composer-page-builder'),
                        'value' => 'flipCube',
                    ),
                    array(
                        'label' => __('FlipUp', 'live-composer-page-builder'),
                        'value' => 'flipUp',
                    ),
                    array(
                        'label' => __('Spin', 'live-composer-page-builder'),
                        'value' => 'spin',
                    ),
                ),
            ),
            array(
                'label'             => __('Speed', 'live-composer-page-builder'),
                'id'                => 'as_rotator_speed',
                'std'               => '1500',
                'type'              => 'text',
                'refresh_on_change' => true,
                'help'              => __('Just only type numper. Ex: 1 -> 5000', 'live-composer-page-builder'),
            ),
            /**
             * General
             */
            array(
                'label'                 => __('BG Color', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('BORDER COLOR', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_boder_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_boder_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('General', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_boder',
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
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Radius', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-body',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-body',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'styling',
                'tab'                   => __('General', 'live-composer-page-builder'),
                'ext'                   => '%'
            ),
            /**
             * TEXT
             */
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'as_title_color',
                'std'                   => 'rgb(61, 61, 61)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('text', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'as_title_font_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('text', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'as_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('text', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'as_title_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper,as-text-rotate-wrapper span',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('text', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Line Height', 'live-composer-page-builder'),
                'id'                    => 'as_title_line_height',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper,as-text-rotate-wrapper span',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('text', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            /**
             * Text Rotate
             */

            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_title_color',
                'std'                   => 'rgb(61, 61, 61)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper span',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_title_font_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper span',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_title_font_weight',
                'std'                   => '800',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper span',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_title_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper span',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Line Height', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_title_line_height',
                'std'                   => '53',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper span',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper span',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'as_rotator_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper span',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'tab'                   => __('text rotator', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive Styling', 'live-composer-page-builder'),
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
                'tab'     => __('tablet', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_font_size',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper,as-text-rotate-wrapper span',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            /**
             * Responsive Phone
             */
            array(
                'label'   => __('Responsive Styling', 'live-composer-page-builder'),
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
                'tab'     => __('phone', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-wraper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_font_size',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-text-rotate-wrapper,as-text-rotate-wrapper span',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
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
                    <div class="as-text-rotate-wrapper">
	                    <?php echo esc_attr($options['as_rotator_1']); ?> 
	                    <span class="as-rotate" data-anim-text="<?php echo esc_attr($options['as_rotator_style']); ?>"data-speed-text = "<?php echo esc_attr($as_speed_text); ?>"><?php echo esc_attr($options['as_rotator_2']); ?></span> 
	                    <?php echo esc_attr($options['as_rotator_3']); ?>
	                </div>
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
