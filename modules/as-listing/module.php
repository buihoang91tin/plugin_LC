<?php

class AS_Listing extends DSLC_Module {

	var $module_id;
	var $module_title;
	var $module_icon;
	var $module_category;

	function __construct() {

		$this->module_id = 'AS_Listing';
		$this->module_title = __( 'AS - Listing', 'dslc_string' );
		$this->module_icon = 'info';
		$this->module_category = 'as - element';

	}

	function options() {

		$dslc_options = array(

			array(
				'label' => __( 'Show On', 'dslc_string' ),
				'id' => 'css_show_on',
				'std' => 'desktop tablet phone',
				'type' => 'checkbox',
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
				'label' => __( 'Title Link', 'dslc_string' ),
				'id' => 'as_lis_title_link',
				'std' => '',
				'type' => 'text'
			),
			array(
				'label' => __( 'Title Link - Open in', 'dslc_string' ),
				'id' => 'as_lis_title_link_target',
				'std' => '_self',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Same Tab', 'dslc_string' ),
						'value' => '_self',
					),
					array(
						'label' => __( 'New Tab', 'dslc_string' ),
						'value' => '_blank',
					),
				)
			),
			array(
				'label' => __( 'Icon Link', 'dslc_string' ),
				'id' => 'icon_link',
				'std' => '',
				'type' => 'text'
			),
			array(
				'label' => __( 'Icon Link - Open in', 'dslc_string' ),
				'id' => 'icon_link_target',
				'std' => '_self',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Same Tab', 'dslc_string' ),
						'value' => '_self',
					),
					array(
						'label' => __( 'New Tab', 'dslc_string' ),
						'value' => '_blank',
					),
				)
			),

			
			/**
			 * General
			 */
			


			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'as_lis_bgcolor',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'BG Image', 'dslc_string' ),
				'id' => 'css_bg_img',
				'std' => '',
				'type' => 'image',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'background-image',
				'section' => 'styling',
			),
			array(
				'label' => __( 'BG Image Repeat', 'dslc_string' ),
				'id' => 'css_bg_img_repeat',
				'std' => 'repeat',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Repeat', 'dslc_string' ),
						'value' => 'repeat',
					),
					array(
						'label' => __( 'Repeat Horizontal', 'dslc_string' ),
						'value' => 'repeat-x',
					),
					array(
						'label' => __( 'Repeat Vertical', 'dslc_string' ),
						'value' => 'repeat-y',
					),
					array(
						'label' => __( 'Do NOT Repeat', 'dslc_string' ),
						'value' => 'no-repeat',
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'background-repeat',
				'section' => 'styling',
			),
			array(
				'label' => __( 'BG Image Attachment', 'dslc_string' ),
				'id' => 'css_bg_img_attch',
				'std' => 'scroll',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Scroll', 'dslc_string' ),
						'value' => 'scroll',
					),
					array(
						'label' => __( 'Fixed', 'dslc_string' ),
						'value' => 'fixed',
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'background-attachment',
				'section' => 'styling',
			),
			array(
				'label' => __( 'BG Image Position', 'dslc_string' ),
				'id' => 'css_bg_img_pos',
				'std' => 'top left',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Top Left', 'dslc_string' ),
						'value' => 'left top',
					),
					array(
						'label' => __( 'Top Right', 'dslc_string' ),
						'value' => 'right top',
					),
					array(
						'label' => __( 'Top Center', 'dslc_string' ),
						'value' => 'Center Top',
					),
					array(
						'label' => __( 'Center Left', 'dslc_string' ),
						'value' => 'left center',
					),
					array(
						'label' => __( 'Center Right', 'dslc_string' ),
						'value' => 'right center',
					),
					array(
						'label' => __( 'Center', 'dslc_string' ),
						'value' => 'center center',
					),
					array(
						'label' => __( 'Bottom Left', 'dslc_string' ),
						'value' => 'left bottom',
					),
					array(
						'label' => __( 'Bottom Right', 'dslc_string' ),
						'value' => 'right bottom',
					),
					array(
						'label' => __( 'Bottom Center', 'dslc_string' ),
						'value' => 'center bottom',
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'background-position',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_border_color',
				'std' => '#000000',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_border_trbl',
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
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_border_radius',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'max' => 500,
				'increment' => 1,
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Width', 'dslc_string' ),
				'id' => 'css_content_width',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-info-box-main-wrap',
				'affect_on_change_rule' => 'max-width',
				'section' => 'styling',
				'ext' => '%'
			),

			/**
			 * Icon
			 */
			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_icon_bg_color',
				'std' => '#fff',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-icon',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => __( 'Icon', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_icon_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-icon',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'Icon', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_icon_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-icon',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Icon', 'dslc_string' ),
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_icon_border_trbl',
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
				'affect_on_change_el' => '.as-lis-icon',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => __( 'Icon', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_icon_border_radius',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-icon',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'tab' => __( 'Icon', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_icon_color',
				'std' => '#fda501',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-icon .dslc-icon',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Icon', 'dslc_string' ),
			),
			array(
				'label' => __( 'Icon', 'dslc_string' ),
				'id' => 'icon_id',
				'std' => 'comments',
				'type' => 'icon',
				'section' => 'styling',
				'tab' => __( 'Icon', 'dslc_string' ),
				'include_in_preset' => false
			),
			array(
				'label' => __( 'Margin Top', 'dslc_string' ),
				'id' => 'css_icon_margin_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-icon',
				'affect_on_change_rule' => 'margin-top',
				'section' => 'styling',
				'tab' => __( 'Icon', 'dslc_string' ),
				'ext' => 'px',
				'min' => 0,
				'max' => 100
			),
			array(
				'label' => __( 'Margin Right', 'dslc_string' ),
				'id' => 'css_icon_margin_right',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-icon',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'styling',
				'tab' => __( 'Icon', 'dslc_string' ),
				'ext' => 'px',
				'min' => 0,
				'max' => 100
			),
			array(
				'label' => __( 'Size ( Wrapper )', 'dslc_string' ),
				'id' => 'css_icon_wrapper_width',
				'std' => '53',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-icon',
				'affect_on_change_rule' => 'width,height',
				'section' => 'styling',
				'tab' => __( 'Icon', 'dslc_string' ),
				'ext' => 'px',
				'min' => 0,
				'max' => 300
			),
			array(
				'label' => __( 'Size ( Icon )', 'dslc_string' ),
				'id' => 'css_icon_width',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-icon .dslc-icon',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => __( 'Icon', 'dslc_string' ),
				'ext' => 'px'
			),

			/**
			 * Title
			 */
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_title_color',
				'std' => '#3d3d3d',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-title h4',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_title_font_size',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-title h4',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_title_font_weight',
				'std' => '800',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-title h4',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_title_font_family',
				'std' => 'Lato',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-title h4',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
			),
			array(
				'label' => __( 'Line Height', 'dslc_string' ),
				'id' => 'css_title_line_height',
				'std' => '53',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-title h4',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_title_margin',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-title',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
				'ext' => 'px'
			),
			/**
			 * Content
			 */

			
			/**
			 * Hidden
			 */

			array(
				'label' => __( 'Title', 'dslc_string' ),
				'id' => 'title',
				'std' => 'CLICK TO EDIT',
				'type' => 'textarea',
				'visibility' => 'hidden',
				'section' => 'styling'
			),

			/**
			 * Responsive Tablet
			 */

			array(
				'label' => __( 'Responsive Styling', 'dslc_string' ),
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
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'max' => 500,
				'increment' => 1,
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),

			/**
			 * Responsive Phone
			 */

			array(
				'label' => __( 'Responsive Styling', 'dslc_string' ),
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
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'max' => 500,
				'increment' => 1,
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.as-lis-info-box',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),

		);

		$dslc_options = array_merge( $dslc_options, $this->shared_options('animation_options') );
		$dslc_options = array_merge( $dslc_options, $this->presets_options() );

		return apply_filters( 'dslc_module_options', $dslc_options, $this->module_id );

	}

	function output( $options ) {

		global $dslc_active;

		if ( $dslc_active && is_user_logged_in() && current_user_can( DS_LIVE_COMPOSER_CAPABILITY ) )
			$dslc_is_admin = true;
		else
			$dslc_is_admin = false;

		$this->module_start( $options );

		/* Module output stars here */

		// Main Elements

		?>

			<div class="as-lis-info-box">



				<div class="dslc-info-box-main-wrap dslc-clearfix">


						<div class="dslc-info-box-icon-bellow-title">
							<div class="as-lis-icon as-float-left">
								<span class="dslc-icon dslc-icon-<?php echo $options['icon_id']; ?>"></span>
								<?php if ( ! empty( $options['icon_link'] ) ) : ?>
									<a class="dslc-info-box-image-link" href="<?php echo $options['icon_link']; ?>" target="<?php echo $options['icon_link_target']; ?>"></a>
								<?php endif; ?>
							</div><!-- .dslc-info-box-image-inner -->


							<div class="as-lis-title as-float-left">
								<?php if ( $dslc_is_admin ) : ?>
									<h4 class="dslca-editable-content" data-id="title" data-type="simple" <?php if ( $dslc_is_admin ) echo 'contenteditable'; ?>><?php echo stripslashes( $options['title'] ); ?></h4>
								<?php else : ?>
									<?php if ( $options['as_lis_title_link'] != '' ) : ?>
										<h4><a href="<?php echo $options['as_lis_title_link']; ?>" target="<?php echo $options['as_lis_title_link_target']; ?>"><?php echo stripslashes( $options['title'] ); ?></a></h4>
									<?php else : ?>
										<h4><?php echo stripslashes( $options['title'] ); ?></h4>
									<?php endif; ?>

							</div><!-- .dslc-info-box-title -->
						<?php endif; ?>


						</div><!-- .dslc-info-box-image -->


				</div><!-- .dslc-info-box-main-wrap -->

			</div><!-- .dslc-info-box -->

		<?php

		/* Module output ends here */

		$this->module_end( $options );

	}

}