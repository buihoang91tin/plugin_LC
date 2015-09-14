<?php

class Anna_Countdown extends DSLC_Module
{
	// Module Attributes
	var $module_id;
	var $module_title;
	var $module_icon;
	var $module_category;

	function __construct() {

		$this->module_id = 'Anna_Countdown';
		$this->module_title = __( 'Anna Countdown', 'dslc_string' );
		$this->module_icon = 'envelope-alt';
		$this->module_category = 'as - Countdown';

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
				'label' => __( 'Time to Countdown', 'dslc_string' ),
				'id' => 'time_countdown',
				'std' => '2016-07-26 00:00:00',
				'type' => 'text',
			),


			/**
             * Out line Style
             */
            array(
                'label'                 => __( 'Out Line Width', 'dslc_string' ),
                'id'                    => 'as_button_newsletter_out_line_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Out Line Offset', 'dslc_string' ),
                'id'                    => 'as_button_newsletter_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Out Line Color', 'dslc_string' ),
                'id'                    => 'as_button_newsletter_out_line_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Out Line Color Hover', 'dslc_string' ),
                'id'                    => 'as_button_newsletter_out_line_color_hover',
                'std'                   => 'rgb(251, 206, 100)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp:hover',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
            ),
            array(
                'label'   => __( 'Out Line Style', 'dslc_string' ) ,
                'id'      => 'as_button_newsletter_out_line_style',
                'std'     => 'solid',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Invisible', 'dslc_string' ) ,
                        'value' => 'invisible'
                    ),
                    array(
                        'label' => __( 'Solid', 'dslc_string' ) ,
                        'value' => 'solid'
                    ),
                    array(
                        'label' => __( 'Dashed', 'dslc_string' ) ,
                        'value' => 'dashed'
                    ),
                    array(
                        'label' => __( 'Dotted', 'dslc_string' ) ,
                        'value' => 'dotted'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form .as_button_submit_mailchimp',
                'affect_on_change_rule' => 'outline-style',
                'section'               => 'styling',
                'tab'                   => __( 'Out Line Style', 'dslc_string' ),
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
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'tablet',
                'ext'                   => 'px',
            ),
            array(
        		'label'			=>__('Padding Vertical', 'dslc_string'),
        		'id'			=> 'css_res_t_padding_vertical_form',
        		'std'			=> '5',
        		'type'			=> 'slider',
        		'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'					=> 'px'

        	),
        	array(
        		'label'			=>__('Padding Horizontal', 'dslc_string'),
        		'id'			=> 'css_res_t_padding_horizontal_form',
        		'std'			=> '5',
        		'type'			=> 'slider',
        		'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'					=> 'px'

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
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => 'phone',
                'ext'                   => 'px',
            ),
            array(
        		'label'			=>__('Padding Vertical', 'dslc_string'),
        		'id'			=> 'css_res_p_padding_vertical_form',
        		'std'			=> '5',
        		'type'			=> 'slider',
        		'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'					=> 'px'

        	),
        	array(
        		'label'			=>__('Padding Horizontal', 'dslc_string'),
        		'id'			=> 'css_res_p_padding_horizontal_form',
        		'std'			=> '5',
        		'type'			=> 'slider',
        		'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as_mailchimp_form',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'					=> 'px'

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
/*
        $elements = $options['elements'];
          if ( ! empty( $elements ) )
          $elements = explode( ' ', trim( $elements ) );
          else
          $elements = array(); 
*/

      	// Main Elements

      	$elementID = uniqid('as_googlemap_');
		
        ?>

<!--
        <?php if($dslc_active): ?>
			<div class="dslc-notification dslc-red"><?php _e('Time CountDown preview is not available in admin active. Please setting option, after click save changes and disable Live Composer for viewing time countdown.', AS_DOMAIN ); ?><br></div>
		<?php else: ?>
-->
        <div class="coming_soon_ctn">
			<div class="timing" style="width:100%;">
				<div class="as_count_down" id="<?php echo $elementID; ?>" data-date="<?php echo $options['time_countdown']; ?>" ></div>
			</div>
		</div>   
		  
<!-- 		<?php endif ?> -->

        

        <?php
        // REQUIRED
        $this->module_end($options);
    }

}
