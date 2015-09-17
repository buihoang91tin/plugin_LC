<?php

class AS_Before_After extends DSLC_Module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct()
    {

        $this->module_id       = 'AS_Before_After';
        $this->module_title    = __('AS - Before After Image', 'dslc_string');
        $this->module_icon     = 'picture';
        $this->module_category = 'as - Before After';
    }

    function options()
    {

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
                'label'      => __('CT', 'dslc_string'),
                'id'         => 'custom_text',
                'std' 		 => __( 'BEFORE', 'dslc_string' ),
                'type'       => 'textarea',
                'visibility' => 'hidden'
            ),
            array(
                'label'      => __('CT', 'dslc_string'),
                'id'         => 'custom_text_2',
                'std' 		 => __( 'MIDDLE', 'dslc_string' ),
                'type'       => 'textarea',
                'visibility' => 'hidden'
            ),
            array(
                'label'      => __('CT', 'dslc_string'),
                'id'         => 'custom_text_3',
                'std' 		 => __( 'AFTER' ),
                'type'       => 'textarea',
                'visibility' => 'hidden'
            ),
            array(
                'label' => __('Image', 'dslc_string'),
                'id'    => 'image',
                'std'   => '',
                'type'  => 'image',
            ),
            array(
                'label' => __('Image 2', 'dslc_string'),
                'id'    => 'image_2',
                'std'   => '',
                'type'  => 'image',
            ),
            array(
                'label' => __('Orientation', 'dslc_string'),
                'id'    => 'orientation_img',
                'std'   => 'horizontal',
            	'refresh_on_change'=> true,
                'type'  => 'select',
            		'choices' => array(
            				array(
            						'label' => __('Horizontal', 'dslc_string'),
            						'value' => 'horizontal'
            				),
            				array(
            						'label' => __('Vertical', 'dslc_string'),
            						'value' => 'vertical'
            				),
            		),
            ),
            array(
                'label' => __('Offset Image', 'dslc_string'),
                'id'    => 'offset_img',
                'std'   => '.5',
            	'refresh_on_change'=> true,
                'type'  => 'slider',
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'ext'                   => '',
                'min' => 0,
				'max' => 1.01,
				'increment' => 0.1,
            ),
            /**
             * Styling
             */
            array(
                'label'                 => __('BG Color', 'dslc_string'),
                'id'                    => 'css_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'css_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
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
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'dslc_string'),
                'id'                    => 'css_border_radius',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-before-img, .as-before-img-container img',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Margin Top', 'dslc_string'),
                'id'                    => 'css_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 100
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => -100,
                'max'                   => 100
            ),
            
            /**
             * Custom DragBar
             */
            array(
                'label'                 => __('BG Color Bar', 'dslc_string'),
                'id'                    => 'css_drag_bar_bg_color',
                'std'                   => '#f9f9f9',
                'type'                  => 'color',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.twentytwenty-horizontal .twentytwenty-handle:before, .twentytwenty-horizontal .twentytwenty-handle:after, .twentytwenty-vertical .twentytwenty-handle:before, .twentytwenty-vertical .twentytwenty-handle:after',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'dslc_string'),
            ),
            array(
                'label'                 => __('BG Color Circle', 'dslc_string'),
                'id'                    => 'css_drag_bar_circle_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-handle',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'dslc_string'),
            ),
            array(
                'label'                 => __('Border Color Circle', 'dslc_string'),
                'id'                    => 'css_drag_bar_circle_border_color',
                'std'                   => '#f9f9f9',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-handle',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'dslc_string'),
            ),
            array(
                'label'                 => __('Border Width Circle', 'dslc_string'),
                'id'                    => 'css_drag_bar_circle_border_width',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-handle',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'dslc_string'),
            ),
            array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_drag_bar_border_radius',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.twentytwenty-handle',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'drag bar', 'dslc_string' ),
			),
            array(
                'label'                 => __('Color Icon Right', 'dslc_string'),
                'id'                    => 'css_drag_bar_icon_color_right',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-left-arrow',
                'affect_on_change_rule' => 'border-right-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'dslc_string'),
            ),
            array(
                'label'                 => __('Color Icon Left', 'dslc_string'),
                'id'                    => 'css_drag_bar_icon_color_left',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-right-arrow',
                'affect_on_change_rule' => 'border-left-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'dslc_string'),
            ),
            array(
                'label'                 => __('Color Icon Up', 'dslc_string'),
                'id'                    => 'css_drag_bar_icon_color_down',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-up-arrow',
                'affect_on_change_rule' => 'border-bottom-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'dslc_string'),
            ),
            array(
                'label'                 => __('Color Icon Down', 'dslc_string'),
                'id'                    => 'css_drag_bar_icon_color_up',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-down-arrow',
                'affect_on_change_rule' => 'border-top-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'dslc_string'),
            ),
            /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive', 'dslc_string'),
                'id'      => 'css_res_t',
                'std'     => ' ',
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
                'affect_on_change_el'   => '.as-before-after-time',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
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
                'tab'     => __('phone', 'dslc_string'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-before-after-time',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px',
            ),
        );

       // $dslc_options = array_merge($dslc_options, $this->shared_options('animation_options'));
        $dslc_options = array_merge($dslc_options, $this->presets_options());

        return apply_filters('dslc_module_options', $dslc_options, $this->module_id);
    }

    function output($options)
    {

        $this->module_start($options);

        /* Module output starts here */

        global $dslc_active;

        if ($dslc_active && is_user_logged_in() && current_user_can(DS_LIVE_COMPOSER_CAPABILITY))
            $dslc_is_admin = true;
        else
            $dslc_is_admin = false;
        ?>
          	<?php if ( empty($options['image']) || empty($options['image_2']) ) : ?>
        	<div class="dslc-notification dslc-red"><?php _e('No image has been set yet, edit the module to set one.', 'dslc_string'); ?></div>
			<?php else : ?>		
			    <div class="as-before-img">
					<?php  
						$orientation_img = '';
						if ( $options['orientation_img'] == 'vertical'){
							$orientation_img = 'vertical';
						}else{
							$orientation_img = '';
						}
					?>
			        <div class="as-compare-img-container" data-orientation="<?php echo esc_attr( $orientation_img );?>" data-offset="<?php echo esc_attr( $options['offset_img'] );?>">
			        	<img src="<?php echo esc_url($options['image']);?>" />
						<img src="<?php echo esc_url($options['image_2']);?>" />
			        </div>
			    </div>

			 
			<?php endif;?>
	        <!-- end / before after image -->

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
