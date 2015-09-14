<?php

class Anna_Social extends DSLC_Module
{

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct()
    {

        $this->module_id       = 'Anna_Social';
        $this->module_title    = 'Custom Social';
        $this->module_icon     = 'share';
        $this->module_category = 'as - Social Icon';
    }

    function options()
    {

        // Get categories
        $cats         = get_categories();
        $cats_choices = array();

        // Generate usable array of categories
        foreach ($cats as $cat)
        {
            $cats_choices[] = array(
                'label' => $cat->name,
                'value' => $cat->cat_ID
            );
        }

        // Options
        $dslc_options = array(
            /**
             * General
             */
            array(
                'label'                 => __('Align', 'dslc_string'),
                'id'                    => 'text_align',
                'std'                   => 'left',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Left', 'dslc_string'),
                        'value' => 'left'
                    ),
                    array(
                        'label' => __('Center', 'dslc_string'),
                        'value' => 'center'
                    ),
                    array(
                        'label' => __('Right', 'dslc_string'),
                        'value' => 'right'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.share-social',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
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
                'affect_on_change_el'   => '.share-social',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'css_border_color',
                'std'                   => '#000000',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.share-social',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'css_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.share-social',
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
                'affect_on_change_el'   => '.share-social',
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
                'affect_on_change_el'   => '.share-social',
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
                'affect_on_change_el'   => '.share-social',
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
                'affect_on_change_el'   => '.share-social',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Width', 'dslc_string'),
                'id'                    => 'css_content_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.share-social',
                'affect_on_change_rule' => 'max-width',
                'section'               => 'styling',
                'ext'                   => '%'
            ), 
			
			/**
             * Title
             */
			array(
				'label' 	=> __('Title Share', 'dslc_string'),
				'id' 		=> 'text_input_social_share',
				'std' 		=> 'Share our portfolio :',
				'type' 		=> 'text',
                'tab'       => 'Title',
				'section'	=> 'styling',
			),
			
			array(
                'label'   => __('Icon', 'dslc_string'),
                'id'      => 'icon_title_share_id',
                'std'     => 'share',
                'type'    => 'icon',
                'section' => 'styling',
                'tab'     => 'Title',
            ),
			
			array(
                'label'                 => __('Margin Right', 'dslc_string'),
                'id'                    => 'icon_title_share_margin_right',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.title-share-social span.dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
			
			array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'css_title_share_color',
                'std'                   => '#797979',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.title-share-social',
                'affect_on_change_rule' => 'color',
                'tab'                   => 'Title',				
                'section'               => 'styling',
            ),
			
			array(
                'label'                 => __('Margin Right', 'dslc_string'),
                'id'                    => 'css_title_share_margin_right',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.title-share-social',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100
            ),
			
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'css_title_share_font_size',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.title-share-social',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => 'Title',				
                'ext'                   => 'px'
            ),

            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'css_title_share_font_weight',
                'std'                   => '300',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.title-share-social',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100

            ),

            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'css_title_share_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.title-share-social',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => 'Title',
            ),

            array(
                'label'                 => __('Line Height', 'dslc_string'),
                'id'                    => 'css_title_share_line_height',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.title-share-social',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => 'Title',
                'ext'                   => 'px'
            ),
			
			// LIST ICON SHARE SOCIAL
            array(
                'label'   => __('Twitter', 'dslc_string'),
                'id'      => 'list_icon_share_social',
                'std'     => "facebook google twitter",
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Facebook', 'dslc_string'),
                        'value' => "facebook",
                    ),
                    array(
                        'label' => __('Google+', 'dslc_string'),
                        'value' => "google",
                    ),
                    array(
                        'label' => __('Twitter', 'dslc_string'),
                        'value' => "twitter",
                    ),
                ),
                'section' => 'styling',
                'tab'     => __( 'icon', 'dslc_string' ),
            ),
			
			array(
				'label' => __( 'Size', 'dslc_string' ),
				'id' => 'css_size_list_icon_share_social',
				'std' => '30',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a',
				'affect_on_change_rule' => 'width,height',
				'section' => 'styling',
				'ext' => 'px',
				'tab'     => __( 'icon', 'dslc_string' ),
			),
			
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_font_size_list_icon_share_social',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'ext' => 'px',
				'tab'     => __( 'icon', 'dslc_string' ),
			),
			
			array(
				'label' => __( 'Line Height', 'dslc_string' ),
				'id' => 'css_line_height_list_icon_share_social',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a span.dslc-icon',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'ext' => 'px',
				'tab'     => __( 'icon', 'dslc_string' ),
			),
			
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_border_color_list_icon_share_social',
				'std' => '#000000',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab'     => __( 'icon', 'dslc_string' ),
			),

			array(
				'label' => __( 'Border Color - Hover', 'dslc_string' ),
				'id' => 'css_border_color_hover_list_icon_share_social',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a:hover',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab'     => __( 'icon', 'dslc_string' ),
			),
			
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_border_width_list_icon_share_social',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab'     => __( 'icon', 'dslc_string' ),
			),

			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_border_trbl_list_icon_share_social',
				'std' => 'top right bottom left',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Top', 'dslc_string' ),
						'value' => 'top'
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right'
					),
					array(
						'label' => __( 'Bottom', 'dslc_string' ),
						'value' => 'bottom'

					),
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab'     => __( 'icon', 'dslc_string' ),
			),

			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_border_radius_list_icon_share_social',
				'std' => '50',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => 'px',
				'tab'     => __( 'icon', 'dslc_string' ),
			),

			array(
				'label' => __( 'Color Twitter', 'dslc_string' ),
				'id' => 'css_bg_color_twitter',
				'std' => '#2c3e50',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a.sb-twitter',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab'     => __( 'icon', 'dslc_string' ),
			),

			array(
				'label' => __( 'Color Twitter - Hover', 'dslc_string' ),
				'id' => 'css_bg_color_twitter_hover',
				'std' => '#40bde6',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a.sb-twitter:hover',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab'     => __( 'icon', 'dslc_string' ),
			),
			
			array(
				'label' => __( 'Color Facebook', 'dslc_string' ),
				'id' => 'css_bg_color_facebook',
				'std' => '#2c3e50',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a.sb-facebook',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab'     => __( 'icon', 'dslc_string' ),
			),

			array(
				'label' => __( 'Color Facebook - Hover', 'dslc_string' ),
				'id' => 'css_bg_color_facebook_hover',
				'std' => '#3b5998',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a.sb-facebook:hover',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab'     => __( 'icon', 'dslc_string' ),
			),

			array(
				'label' => __( 'Color Google Plus', 'dslc_string' ),
				'id' => 'css_bg_color_google',
				'std' => '#2c3e50',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a.sb-google',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab'     => __( 'icon', 'dslc_string' ),
			),

			array(
				'label' => __( 'Color Google Plus - Hover', 'dslc_string' ),
				'id' => 'css_bg_color_google_hover',
				'std' => '#d13f2d',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a.sb-google:hover',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab'     => __( 'icon', 'dslc_string' ),
			),

			
			array(
				'label' => __( 'Spacing', 'dslc_string' ),
				'id' => 'css_spacing_list_icon_share_social',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab'     => __( 'icon', 'dslc_string' ),
			),
			
			/**
			 * Responsive Tablet
			 */
			array(
				'label' => __( 'Responsive', 'dslc_string' ),
				'id' => 'css_res_t',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
				),
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
			),

			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.share-social',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px',
			),

			array(
				'label' => __( 'Size ( Wrapper )', 'dslc_string' ),
				'id' => 'css_res_t_size',
				'std' => '30',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a',
				'affect_on_change_rule' => 'width,height',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),

			array(
				'label' => __( 'Size ( Icon )', 'dslc_string' ),
				'id' => 'css_res_t_icon_font_size',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a span.dslc-icon',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),

			array(
				'label' => __( 'Spacing', 'dslc_string' ),
				'id' => 'css_res_t_spacing',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			
			/**
			 * Responsive Phone
			 */
			array(
				'label' => __( 'Responsive', 'dslc_string' ),
				'id' => 'css_res_p',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Disabled', 'dslc_string' ),

						'value' => 'disabled'
					),
					array(
						'label' => __( 'Enabled', 'dslc_string' ),

						'value' => 'enabled'
					),
				),
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
			),

			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.share-social',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px',
			),

			array(
				'label' => __( 'Size ( Wrapper )', 'dslc_string' ),
				'id' => 'css_res_p_size',
				'std' => '30',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a',
				'affect_on_change_rule' => 'width,height',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),

			array(
				'label' => __( 'Size ( Icon )', 'dslc_string' ),
				'id' => 'css_res_p_icon_font_size',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li a span.dslc-icon',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),

			array(
				'label' => __( 'Spacing', 'dslc_string' ),
				'id' => 'css_res_p_spacing',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.list-social-share li',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
        );
        $dslc_options = array_merge($dslc_options, $this->shared_options('animation_options'));
        $dslc_options = array_merge($dslc_options, $this->presets_options());

        return apply_filters('dslc_module_options', $dslc_options, $this->module_id);
    }

    function output($options)
    {

        global $dslc_active;

        if ($dslc_active && is_user_logged_in() && current_user_can(DS_LIVE_COMPOSER_CAPABILITY))
            $dslc_is_admin = true;
        else
            $dslc_is_admin = false;

        $this->module_start($options);
        ?>
        <div class="share-social">
            <span class="title-share-social">
            	<span class="dslc-icon dslc-icon-<?php echo $options['icon_title_share_id'] ?>"></span><?php echo $options['text_input_social_share'] ?>
            </span>
            <ul class="list-social-share">
                <?php
                if (!empty($options['list_icon_share_social']))
                {
                    $option_social = explode(" ", $options['list_icon_share_social']);
                    if (!empty($option_social))
                    {
                        foreach ($option_social as $social_active)
                        {
                            if ($social_active == "twitter")
                            {
                                ?>
                                <li class="social-twitter">
                                    <a class="sb-twitter" href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;lang=en&amp;text=Check%20out%20this%20awesome%20project:&amp;" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=620');return false;" data-count="none" data-via=" "><span class="dslc-icon dslc-icon-twitter"></span></a>
                                </li>
                            <?php } ?>
                            <?php
                            if ($social_active == "facebook")
                            {
                                ?>
                                <li class="social-facebook">
                                    <a class="sb-facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=660');return false;" target="_blank"><span class="dslc-icon dslc-icon-facebook"></span></a>
                                </li>
                            <?php } ?>
                            <?php
                            if ($social_active == "google")
                            {
                                ?>
                                <li class="social-google">
                                	<a class="sb-google" href="https://plus.google.com/share?url=<?php the_permalink() ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500');return false;"><span class="dslc-icon dslc-icon-google-plus"></span></a>
                                </li>
                                <?php
                            }
                        }
                    }
                }
                ?>
            </ul>   
        </div>
        <?php
        $this->module_end($options);
    }

}
