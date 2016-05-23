<?php

class ASEX_Before_After extends ASEX_MODULE
{

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct()
    {

        $this->module_id       = 'ASEX_Before_After';
        $this->module_title    = __('AS - Before After Image', 'asex');
        $this->module_icon     = 'picture';
        $this->module_category = 'as - element';
    }

    function options()
    {

        $dslc_options = array(
            array(
                'label'   => __('Show On', 'asex'),
                'id'      => 'css_show_on',
                'std'     => 'desktop tablet phone',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Desktop', 'asex'),
                        'value' => 'desktop'
                    ),
                    array(
                        'label' => __('Tablet', 'asex'),
                        'value' => 'tablet'
                    ),
                    array(
                        'label' => __('Phone', 'asex'),
                        'value' => 'phone'
                    ),
                ),
            ),
            array(
                'label'      => __('CT', 'asex'),
                'id'         => 'custom_text',
                'std'        => __('BEFORE', 'asex'),
                'type'       => 'textarea',
                'visibility' => 'hidden'
            ),
            array(
                'label'      => __('CT', 'asex'),
                'id'         => 'custom_text_2',
                'std'        => __('MIDDLE', 'asex'),
                'type'       => 'textarea',
                'visibility' => 'hidden'
            ),
            array(
                'label'      => __('CT', 'asex'),
                'id'         => 'custom_text_3',
                'std'        => __('AFTER', 'monalisa'),
                'type'       => 'textarea',
                'visibility' => 'hidden'
            ),
            array(
                'label' => __('Image', 'asex'),
                'id'    => 'image',
                'std'   => '',
                'type'  => 'image',
            ),
            array(
                'label' => __('Image 2', 'asex'),
                'id'    => 'image_2',
                'std'   => '',
                'type'  => 'image',
            ),
            array(
                'label'             => __('Orientation', 'asex'),
                'id'                => 'orientation_img',
                'std'               => 'horizontal',
                'refresh_on_change' => true,
                'type'              => 'select',
                'choices'           => array(
                    array(
                        'label' => __('Horizontal', 'asex'),
                        'value' => 'horizontal'
                    ),
                    array(
                        'label' => __('Vertical', 'asex'),
                        'value' => 'vertical'
                    ),
                ),
            ),
            array(
                'label'                 => __('Offset Image', 'asex'),
                'id'                    => 'offset_img',
                'std'                   => '.5',
                'refresh_on_change'     => true,
                'type'                  => 'slider',
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'ext'                   => '',
                'min'                   => 0,
                'max'                   => 1.01,
                'increment'             => 0.1,
            ),
            /**
             * Styling
             */
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'css_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
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
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'css_border_trbl',
                'std'                   => 'top right bottom left',
                'type'                  => 'checkbox',
                'choices'               => array(
                    array(
                        'label' => __('Top', 'asex'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Right', 'asex'),
                        'value' => 'right'
                    ),
                    array(
                        'label' => __('Bottom', 'asex'),
                        'value' => 'bottom'
                    ),
                    array(
                        'label' => __('Left', 'asex'),
                        'value' => 'left'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
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
                'label'                 => __('Margin Top', 'asex'),
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
                'label'                 => __('Margin Bottom', 'asex'),
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
            array(
                'label'                 => __('Padding Vertical', 'monalisa'),
                'id'                    => 'css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-before-img',
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
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            /**
             * Custom DragBar
             */
            array(
                'label'                 => __('BG Color Bar', 'asex'),
                'id'                    => 'css_drag_bar_bg_color',
                'std'                   => '#f9f9f9',
                'type'                  => 'color',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '.twentytwenty-horizontal .twentytwenty-handle:before, .twentytwenty-horizontal .twentytwenty-handle:after, .twentytwenty-vertical .twentytwenty-handle:before, .twentytwenty-vertical .twentytwenty-handle:after',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'asex'),
            ),
            array(
                'label'                 => __('BG Color Circle', 'asex'),
                'id'                    => 'css_drag_bar_circle_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-handle',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'asex'),
            ),
            array(
                'label'                 => __('Border Color Circle', 'asex'),
                'id'                    => 'css_drag_bar_circle_border_color',
                'std'                   => '#f9f9f9',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-handle',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'asex'),
            ),
            array(
                'label'                 => __('Border Width Circle', 'asex'),
                'id'                    => 'css_drag_bar_circle_border_width',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-handle',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('drag bar', 'asex'),
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'css_drag_bar_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-handle',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('drag bar', 'asex'),
            ),
            array(
                'label'                 => __('Color Icon Right', 'asex'),
                'id'                    => 'css_drag_bar_icon_color_right',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-left-arrow',
                'affect_on_change_rule' => 'border-right-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'asex'),
            ),
            array(
                'label'                 => __('Color Icon Left', 'asex'),
                'id'                    => 'css_drag_bar_icon_color_left',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-right-arrow',
                'affect_on_change_rule' => 'border-left-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'asex'),
            ),
            array(
                'label'                 => __('Color Icon Up', 'asex'),
                'id'                    => 'css_drag_bar_icon_color_down',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-up-arrow',
                'affect_on_change_rule' => 'border-bottom-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'asex'),
            ),
            array(
                'label'                 => __('Color Icon Down', 'asex'),
                'id'                    => 'css_drag_bar_icon_color_up',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.twentytwenty-down-arrow',
                'affect_on_change_rule' => 'border-top-color',
                'section'               => 'styling',
                'tab'                   => __('drag bar', 'asex'),
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
                'label'                 => __('Border Width ', 'monalisa'),
                'id'                    => 'css_res_t_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-before-img',
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
                'affect_on_change_el'   => '.as-before-img, .as-before-img-container img',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Top ', 'monalisa'),
                'id'                    => 'css_res_t_css_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'min'                   => '-100',
                'max'                   => '100',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Margin Bottom ', 'monalisa'),
                'id'                    => 'css_res_t_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'min'                   => '-100',
                'max'                   => '100',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Width Circle( drag bar ) ', 'monalisa'),
                'id'                    => 'css_res_t_css_drag_bar_circle_border_width',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.twentytwenty-handle',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'tab'                   => 'tablet'
            ),
            array
                (
                'label'                 => __('Border Radius( drag bar ) ', 'monalisa'),
                'id'                    => 'css_res_t_css_drag_bar_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.twentytwenty-handle',
                'affect_on_change_rule' => 'border-radius',
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
                'label'                 => __('Border Width ', 'monalisa'),
                'id'                    => 'css_res_p_css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-before-img',
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
                'affect_on_change_el'   => '.as-before-img, .as-before-img-container img',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Top ', 'monalisa'),
                'id'                    => 'css_res_p_css_margin_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'min'                   => '-100',
                'max'                   => '100',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Margin Bottom ', 'monalisa'),
                'id'                    => 'css_res_p_css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.as-before-img',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'min'                   => '-100',
                'max'                   => '100',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Width Circle( drag bar ) ', 'monalisa'),
                'id'                    => 'css_res_p_css_drag_bar_circle_border_width',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.twentytwenty-handle',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'responsive',
                'tab'                   => 'phone'
            ),
            array
                (
                'label'                 => __('Border Radius( drag bar ) ', 'monalisa'),
                'id'                    => 'css_res_p_css_drag_bar_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => '',
                'affect_on_change_el'   => '.twentytwenty-handle',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => 'phone'
            )
                ,
        );
        $dslc_options = array_merge($dslc_options, $this->shared_options('animation_options'));
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
            <?php if (empty($options['image']) || empty($options['image_2'])) : ?>
            <div class="dslc-notification dslc-red"><?php _e('No image has been set yet, edit the module to set one.', 'asex'); ?></div>
            <?php else : ?>		
            <div class="as-before-img">
                <?php
                $orientation_img = '';
                if ($options['orientation_img'] == 'vertical')
                {
                    $orientation_img = 'vertical';
                }
                else
                {
                    $orientation_img = '';
                }
                ?>
                <div class="as-compare-img-container" data-orientation="<?php echo esc_attr($orientation_img); ?>" data-offset="<?php echo esc_attr($options['offset_img']); ?>">
                    <img src="<?php echo esc_url($options['image']); ?>" alt="Fist image"/>
                    <img src="<?php echo esc_url($options['image_2']); ?>" alt="Second image" />
                </div>
            </div>


        <?php endif; ?>
        <!-- end / before after image -->

        <?php
        /* Module output ends here */

        $this->module_end($options);
    }

}
