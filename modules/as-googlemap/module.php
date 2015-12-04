<?php

class AS_Google_Map extends DSLC_Module {

    // Module Attributes
    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_Google_Map';
        $this->module_title    = __('AS - Google Map', 'dslc_string');
        $this->module_icon     = 'globe';
        $this->module_category = 'as - element';
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
                'label'      => __('Title', 'dslc_string'),
                'id'         => 'title',
                'std'        => 'CLICK TO EDIT',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'   => __('Google Map Scrool Wheel', 'dslc_string'),
                'id'      => 'googlemap_scrlwheel',
                'std'     => '0',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'dslc_string'),
                        'value' => '0'
                    ),
                    array(
                        'label' => __('Enabled', 'dslc_string'),
                        'value' => '1'
                    ),
                ),
                'section' => 'styling',
            ),
            array(
                'label'   => __('Snazzy Maps', 'dslc_string'),
                'id'      => 'googlemap_snazzy_map',
                'std'     => '1',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('None', 'dslc_string'),
                        'value' => '1'
                    ),
                    array(
                        'label' => __('Subtle Grayscale', 'dslc_string'),
                        'value' => '2'
                    ),
                    array(
                        'label' => __('Shades of Grey', 'dslc_string'),
                        'value' => '3'
                    ),
                    array(
                        'label' => __('Blue water', 'dslc_string'),
                        'value' => '4'
                    ),
                    array(
                        'label' => __('Pale Dawn', 'dslc_string'),
                        'value' => '5'
                    ),
                    array(
                        'label' => __('Light Monochrome', 'dslc_string'),
                        'value' => '6'
                    ),
                    array(
                        'label' => __('Apple Maps-esque', 'dslc_string'),
                        'value' => '7'
                    ),
                    array(
                        'label' => __('Greyscale', 'dslc_string'),
                        'value' => '8'
                    ),
                    array(
                        'label' => __('Neutral Blue', 'dslc_string'),
                        'value' => '9'
                    ),
                    array(
                        'label' => __('Bright & Bubbly', 'dslc_string'),
                        'value' => '10'
                    ),
                    array(
                        'label' => __('Icy Blue', 'dslc_string'),
                        'value' => '11'
                    ),
                    array(
                        'label' => __('Blue Gray', 'dslc_string'),
                        'value' => '12'
                    ),
                    array(
                        'label' => __('Blue Essence', 'dslc_string'),
                        'value' => '13'
                    ),
                    array(
                        'label' => __('Girly', 'dslc_string'),
                        'value' => '14'
                    ),
                    array(
                        'label' => __('Retro', 'dslc_string'),
                        'value' => '15'
                    ),
                ),
                'section' => 'styling',
            ),
            array(
                'label'                 => __('Width Google Map', 'dslc_string'),
                'id'                    => 'as_width_googlemap',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'max'                   => 100,
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'width',
                'section'               => 'styling',
                'ext'                   => '%',
            ),
            array(
                'label'                 => __('Height Google Map', 'dslc_string'),
                'id'                    => 'as_height_googlemap',
                'std'                   => '300',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'max'                   => 1500,
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'height',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'   => __('Goole Map Center X', 'dslc_string'),
                'help'    => __('Please <a href="http://www.latlong.net/" target="_blank">click here</a> for finding your Latitude and Longitude', 'dslc_string'),
                'id'      => 'googlemap_x',
                'std'     => '12.238791',
                'type'    => 'text',
                'section' => 'styling',
            ),
            array(
                'label'   => __('Goole Map Center Y', 'dslc_string'),
                'help'    => __('Please <a href="http://www.latlong.net/" target="_blank">click here</a> for finding your Latitude and Longitude', 'dslc_string'),
                'id'      => 'googlemap_y',
                'std'     => '109.196749',
                'type'    => 'text',
                'section' => 'styling',
            ),
            array(
                'label'   => __('Goole Map Zoom', 'dslc_string'),
                'id'      => 'googlemap_zoom',
                'std'     => '13',
                'type'    => 'text',
                'section' => 'styling',
            ),
            array(
                'label'                 => __('Borders', 'dslc_string'),
                'id'                    => 'css_border_trbl',
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
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Border Radius', 'dslc_string'),
                'id'                    => 'css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_google_map_wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_google_map_wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_google_map_wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            /* For mark
             */
            array(
                'label'   => __('Goole Map Mark X', 'dslc_string'),
                'id'      => 'googlemap_x_mark',
                'std'     => '12.238791',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => 'mark',
            ),
            array(
                'label'   => __('Goole Map Mark Y', 'dslc_string'),
                'id'      => 'googlemap_y_mark',
                'std'     => '109.196749',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => 'mark',
            ),
            array(
                'label'   => __('Goole Mark Title', 'dslc_string'),
                'id'      => 'google_title_mark',
                'std'     => 'Dong Hoi City',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => 'mark',
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
                'label'                 => __('Width Google Map ', 'alenastudio'),
                'id'                    => 'css_res_t_as_width_googlemap',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'max'                   => '100',
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'width',
                'section'               => 'responsive',
                'ext'                   => '%',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Height Google Map ', 'alenastudio'),
                'id'                    => 'css_res_t_as_height_googlemap',
                'std'                   => '300',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'max'                   => '1500',
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'height',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Width ', 'alenastudio'),
                'id'                    => 'css_res_t_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Radius ', 'alenastudio'),
                'id'                    => 'css_res_t_css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Bottom ', 'alenastudio'),
                'id'                    => 'css_res_t_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_google_map_wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Vertical ', 'alenastudio'),
                'id'                    => 'css_res_t_css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_google_map_wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'max'                   => '500',
                'increment'             => '1',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Padding Horizontal ', 'alenastudio'),
                'id'                    => 'css_res_t_css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_google_map_wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
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
                'label'                 => __('Width Google Map ', 'alenastudio'),
                'id'                    => 'css_res_p_as_width_googlemap',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'max'                   => '100',
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'width',
                'section'               => 'responsive',
                'ext'                   => '%',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Height Google Map ', 'alenastudio'),
                'id'                    => 'css_res_p_as_height_googlemap',
                'std'                   => '300',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'max'                   => '1500',
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'height',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Width ', 'alenastudio'),
                'id'                    => 'css_res_p_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Radius ', 'alenastudio'),
                'id'                    => 'css_res_p_css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Bottom ', 'alenastudio'),
                'id'                    => 'css_res_p_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_google_map_wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Vertical ', 'alenastudio'),
                'id'                    => 'css_res_p_css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_google_map_wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'max'                   => '500',
                'increment'             => '1',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Padding Horizontal ', 'alenastudio'),
                'id'                    => 'css_res_p_css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as_google_map_wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            )
                ,
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
        /* $elements = $options['elements'];
          if ( ! empty( $elements ) )
          $elements = explode( ' ', trim( $elements ) );
          else
          $elements = array(); */

        $elementID = uniqid('as_googlemap_');
        ?>
        <?php if ($dslc_active): ?>
            <!--<div class="dslc-notification dslc-red"><?php _e('Map live preview is not available in admin active. Please setting option, after click save changes and disable Live Composer for viewing map.', 'alenastudio'); ?><br> <?php _e('Please <a href="http://www.latlong.net/" target="_blank">click here</a> for finding your Latitude and Longitude', 'alenastudio'); ?></div>-->
            <div class="as_google_map_wrapper">
                <div class="as_googlemap" id="<?php echo $elementID; ?>" value="<?php echo esc_attr($options['googlemap_x']); ?>,<?php echo esc_attr($options['googlemap_y']); ?>" scrollwheel="<?php echo esc_attr($options['googlemap_scrlwheel']); ?>" zoom="<?php echo esc_attr($options['googlemap_zoom']); ?>" markposition="<?php echo esc_attr($options['googlemap_x_mark']); ?>,<?php echo esc_attr($options['googlemap_y_mark']); ?>" marktitle="<?php echo esc_attr($options['google_title_mark']); ?>" snapzzymap="<?php echo esc_attr($options['googlemap_snazzy_map']); ?>"></div>
            </div>
        <?php else: ?>
            <div class="as_google_map_wrapper">
                <div class="as_googlemap" id="<?php echo $elementID; ?>" value="<?php echo esc_attr($options['googlemap_x']); ?>,<?php echo esc_attr($options['googlemap_y']); ?>" scrollwheel="<?php echo esc_attr($options['googlemap_scrlwheel']); ?>" zoom="<?php echo esc_attr($options['googlemap_zoom']); ?>" markposition="<?php echo esc_attr($options['googlemap_x_mark']); ?>,<?php echo esc_attr($options['googlemap_y_mark']); ?>" marktitle="<?php echo esc_attr($options['google_title_mark']); ?>" snapzzymap="<?php echo esc_attr($options['googlemap_snazzy_map']); ?>"></div>
            </div>
        <?php endif ?>
        <?php
        // REQUIRED
        $this->module_end($options);
    }

}
