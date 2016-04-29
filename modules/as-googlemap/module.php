<?php

class AS_Google_Map extends DSLC_Module {

    // Module Attributes
    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_Google_Map';
        $this->module_title    = __('AS - Google Map', 'live-composer-page-builder');
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
                'label'      => __('Title', 'live-composer-page-builder'),
                'id'         => 'title',
                'std'        => __('CLICK TO EDIT','monalisa'),
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),
            array(
                'label'   => __('Google Map Scrool Wheel', 'live-composer-page-builder'),
                'id'      => 'googlemap_scrlwheel',
                'std'     => '0',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'live-composer-page-builder'),
                        'value' => '0'
                    ),
                    array(
                        'label' => __('Enabled', 'live-composer-page-builder'),
                        'value' => '1'
                    ),
                ),
                'section' => 'styling',
            ),
            array(
                'label'   => __('Snazzy Maps', 'live-composer-page-builder'),
                'id'      => 'googlemap_snazzy_map',
                'std'     => '1',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('None', 'live-composer-page-builder'),
                        'value' => '1'
                    ),
                    array(
                        'label' => __('Subtle Grayscale', 'live-composer-page-builder'),
                        'value' => '2'
                    ),
                    array(
                        'label' => __('Shades of Grey', 'live-composer-page-builder'),
                        'value' => '3'
                    ),
                    array(
                        'label' => __('Blue water', 'live-composer-page-builder'),
                        'value' => '4'
                    ),
                    array(
                        'label' => __('Pale Dawn', 'live-composer-page-builder'),
                        'value' => '5'
                    ),
                    array(
                        'label' => __('Light Monochrome', 'live-composer-page-builder'),
                        'value' => '6'
                    ),
                    array(
                        'label' => __('Apple Maps-esque', 'live-composer-page-builder'),
                        'value' => '7'
                    ),
                    array(
                        'label' => __('Greyscale', 'live-composer-page-builder'),
                        'value' => '8'
                    ),
                    array(
                        'label' => __('Neutral Blue', 'live-composer-page-builder'),
                        'value' => '9'
                    ),
                    array(
                        'label' => __('Bright & Bubbly', 'live-composer-page-builder'),
                        'value' => '10'
                    ),
                    array(
                        'label' => __('Icy Blue', 'live-composer-page-builder'),
                        'value' => '11'
                    ),
                    array(
                        'label' => __('Blue Gray', 'live-composer-page-builder'),
                        'value' => '12'
                    ),
                    array(
                        'label' => __('Blue Essence', 'live-composer-page-builder'),
                        'value' => '13'
                    ),
                    array(
                        'label' => __('Girly', 'live-composer-page-builder'),
                        'value' => '14'
                    ),
                    array(
                        'label' => __('Retro', 'live-composer-page-builder'),
                        'value' => '15'
                    ),
                ),
                'section' => 'styling',
            ),
            array(
                'label'                 => __('Width Google Map', 'live-composer-page-builder'),
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
                'label'                 => __('Height Google Map', 'live-composer-page-builder'),
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
                'label'   => __('Goole Map Center X', 'live-composer-page-builder'),
                'help'    => __('Please <a href="http://www.latlong.net/" target="_blank">click here</a> for finding your Latitude and Longitude', 'live-composer-page-builder'),
                'id'      => 'googlemap_x',
                'std'     => '12.238791',
                'type'    => 'text',
                'section' => 'styling',
            ),
            array(
                'label'   => __('Goole Map Center Y', 'live-composer-page-builder'),
                'help'    => __('Please <a href="http://www.latlong.net/" target="_blank">click here</a> for finding your Latitude and Longitude', 'live-composer-page-builder'),
                'id'      => 'googlemap_y',
                'std'     => '109.196749',
                'type'    => 'text',
                'section' => 'styling',
            ),
            array(
                'label'   => __('Goole Map Zoom', 'live-composer-page-builder'),
                'id'      => 'googlemap_zoom',
                'std'     => '13',
                'type'    => 'text',
                'section' => 'styling',
            ),
            array(
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'css_border_trbl',
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
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'live-composer-page-builder'),
                'id'                    => 'css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_googlemap',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
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
                'label'                 => __('Border Radius', 'live-composer-page-builder'),
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
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
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
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
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
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
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
                'label'   => __('Goole Map Mark X', 'live-composer-page-builder'),
                'id'      => 'googlemap_x_mark',
                'std'     => '12.238791',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => 'mark',
            ),
            array(
                'label'   => __('Goole Map Mark Y', 'live-composer-page-builder'),
                'id'      => 'googlemap_y_mark',
                'std'     => '109.196749',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => 'mark',
            ),
            array(
                'label'   => __('Goole Mark Title', 'live-composer-page-builder'),
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
                'label'                 => __('Width Google Map ', 'monalisa'),
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
                'label'                 => __('Height Google Map ', 'monalisa'),
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
                'label'                 => __('Border Width ', 'monalisa'),
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
                'label'                 => __('Border Radius ', 'monalisa'),
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
                'label'                 => __('Margin Bottom ', 'monalisa'),
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
                'label'                 => __('Padding Vertical ', 'monalisa'),
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
                'label'                 => __('Padding Horizontal ', 'monalisa'),
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
                'label'                 => __('Width Google Map ', 'monalisa'),
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
                'label'                 => __('Height Google Map ', 'monalisa'),
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
                'label'                 => __('Border Width ', 'monalisa'),
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
                'label'                 => __('Border Radius ', 'monalisa'),
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
                'label'                 => __('Margin Bottom ', 'monalisa'),
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
                'label'                 => __('Padding Vertical ', 'monalisa'),
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
                'label'                 => __('Padding Horizontal ', 'monalisa'),
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
            <!--<div class="dslc-notification dslc-red"><?php _e('Map live preview is not available in admin active. Please setting option, after click save changes and disable Live Composer for viewing map.', 'monalisa'); ?><br> <?php _e('Please <a href="http://www.latlong.net/" target="_blank">click here</a> for finding your Latitude and Longitude', 'monalisa'); ?></div>-->
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
