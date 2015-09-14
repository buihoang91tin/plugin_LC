<?php

class Anna_Google_Map extends DSLC_Module
{
	// Module Attributes
	var $module_id;
	var $module_title;
	var $module_icon;
	var $module_category;

	function __construct() {

		$this->module_id = 'Anna_Google_Map';
		$this->module_title = __( 'Google Map', 'dslc_string' );
		$this->module_icon = 'globe';
		$this->module_category = 'as - Google Map';

	}

    // Module Options
    function options(){
        // The options array
        $dslc_options = array(
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
                'label'      => __('Title', 'dslc_string'),
                'id'         => 'title',
                'std'        => 'CLICK TO EDIT',
                'type'       => 'textarea',
                'visibility' => 'hidden',
                'section'    => 'styling'
            ),

            array(
                'label' =>__('Google Map Scrool Wheel', 'dslc_string'),
                'id' => 'googlemap_scrlwheel',
                'std' => '0',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Disabled', 'dslc_string' ),
                        'value' => '0'
                    ),
                    array(
                        'label' => __( 'Enabled', 'dslc_string' ),
                        'value' => '1'
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
				'label' => __( 'Goole Map Center X', 'dslc_string' ),
				'id' => 'googlemap_x',
				'std' => '12.238791',
				'type' => 'text',
				'section' => 'styling',
			),

			array(
				'label' => __( 'Goole Map Center Y', 'dslc_string' ),
				'id' => 'googlemap_y',
				'std' => '109.196749',
				'type' => 'text',
				'section' => 'styling',
			),
			array(
                'label'                 => __('Goole Map Zoom', 'dslc_string'),
                'id'                    => 'googlemap_zoom',
                'std'                   => '13',
                'type'                  => 'text',
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


            /*For mark
            */
            array(
				'label' => __( 'Goole Map Mark X', 'dslc_string' ),
				'id' => 'googlemap_x_mark',
				'std' => '12.238791',
				'type' => 'text',
				'section' => 'styling',
				'tab'     => 'mark',
			),

			array(
				'label' => __( 'Goole Map Mark Y', 'dslc_string' ),
				'id' => 'googlemap_y_mark',
				'std' => '109.196749',
				'type' => 'text',
				'section' => 'styling',
				'tab'     => 'mark',
			),

			array(
				'label' => __( 'Goole Mark Title', 'dslc_string' ),
				'id' => 'google_title_mark',
				'std' => 'Dong Hoi City',
				'type' => 'text',
				'section' => 'styling',
				'tab'     => 'mark',
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
                'affect_on_change_el'   => '.circle-chart-wrapper',
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
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.circle-chart-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
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
        /* $elements = $options['elements'];
          if ( ! empty( $elements ) )
          $elements = explode( ' ', trim( $elements ) );
          else
          $elements = array(); */

        $elementID = uniqid('as_googlemap_');
        ?>
        <?php if($dslc_active): ?>
			<div class="dslc-notification dslc-red"><?php _e('Map live preview is not available in admin active. Please setting option, after click save changes and disable Live Composer for viewing map.', AS_DOMAIN ); ?><br> <?php _e('Please <a href="http://www.latlong.net/" target="_blank">click here</a> for finding your Latitude and Longitude', AS_DOMAIN ); ?></div>
		<?php else: ?>
        <div class="as_google_map_wrapper">
            <div class="as_googlemap" id="<?php echo $elementID; ?>" value="<?php echo $options['googlemap_x']; ?>,<?php echo $options['googlemap_y']; ?>" scrollwheel="<?php echo $options['googlemap_scrlwheel']; ?>" zoom="<?php echo $options['googlemap_zoom']; ?>" markposition="<?php echo $options['googlemap_x_mark']; ?>,<?php echo $options['googlemap_y_mark']; ?>" marktitle="<?php echo $options['google_title_mark']; ?>"></div>
        </div>
		<?php endif ?>
        <?php
        // REQUIRED
        $this->module_end($options);
    }

}
