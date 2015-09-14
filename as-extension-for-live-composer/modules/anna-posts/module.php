<?php

class Anna_Posts extends DSLC_Module {

	var $module_id;
	var $module_title;
	var $module_icon;
	var $module_category;

	function __construct() {

		$this->module_id = 'Anna_Posts';
		$this->module_title = __( 'Custom Posts', 'dslc_string' );
		$this->module_icon = 'pencil';
		$this->module_category = 'as - posts';

	}

	function options() {

		// Get registered post types
		$post_types = get_post_types( array( 'public' => true ), 'objects' );
		$post_types_choices = array();
		
		// Generate usable array of post types
		foreach ( $post_types as $post_type_id => $post_type ) {
			$post_types_choices[] = array(
				'label' => $post_type->labels->name,
				'value' => $post_type_id
			);
		}

		// Options
		$dslc_options = array(

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
				'label'   => __( 'Post Type', 'dslc_string' ),
				'id'      => 'post_type',
				'std'     => 'post',
				'type'    => 'select',
				'choices' => $post_types_choices
			),
			array(
				'label' => __( 'Type', 'dslc_string' ),
				'id' => 'type',
				'std' => 'grid',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Grid', 'dslc_string' ),
						'value' => 'grid'
					),
					array(
						'label' => __( 'Masonry Grid', 'dslc_string' ),
						'value' => 'masonry'
					),
					array(
						'label' => __( 'Carousel', 'dslc_string' ),
						'value' => 'carousel'
					)
				)
			),
			array(
				'label' => __( 'Orientation', 'dslc_string' ),
				'id' => 'orientation',
				'std' => 'vertical',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Vertical', 'dslc_string' ),
						'value' => 'vertical'
					),
					array(
						'label' => __( 'Horizontal', 'dslc_string' ),
						'value' => 'horizontal'
					)
				)
			),
			array(
				'label' => __( 'Posts Per Page', 'dslc_string' ),
				'id' => 'amount',
				'std' => '4',
				'type' => 'text',
			),
			array(
				'label' => __( 'Pagination', 'dslc_string' ),
				'id' => 'pagination_type',
				'std' => 'disabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled',
					),
					array(
						'label' => __( 'Numbered', 'dslc_string' ),
						'value' => 'numbered',
					),
					array(
						'label' => __( 'Prev/Next', 'dslc_string' ),
						'value' => 'prevnext',
					)
				),
			),
			array(
				'label' => __( 'Posts Per Row', 'dslc_string' ),
				'id' => 'columns',
				'std' => '3',
				'type' => 'select',
				'choices' => $this->shared_options('posts_per_row_choices'),
			),
			array(
				'label' => __( 'Order By', 'dslc_string' ),
				'id' => 'orderby',
				'std' => 'date',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Publish Date', 'dslc_string' ),
						'value' => 'date'
					),
					array(
						'label' => __( 'Modified Date', 'dslc_string' ),
						'value' => 'modified'
					),
					array(
						'label' => __( 'Random', 'dslc_string' ),
						'value' => 'rand'
					),
					array(
						'label' => __( 'Alphabetic', 'dslc_string' ),
						'value' => 'title'
					),
					array(
						'label' => __( 'Comment Count', 'dslc_string' ),
						'value' => 'comment_count'
					),
				)
			),
			array(
				'label' => __( 'Order', 'dslc_string' ),
				'id' => 'order',
				'std' => 'DESC',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Ascending', 'dslc_string' ),
						'value' => 'ASC'
					),
					array(
						'label' => __( 'Descending', 'dslc_string' ),
						'value' => 'DESC'
					)
				)
			),
			array(
				'label' => __( 'Offset', 'dslc_string' ),
				'id' => 'offset',
				'std' => '0',
				'type' => 'text',
			),
			array(
				'label' => __( 'Include (IDs)', 'dslc_string' ),
				'id' => 'query_post_in',
				'std' => '',
				'type' => 'text',
			),
			array(
				'label' => __( 'Exclude (IDs)', 'dslc_string' ),
				'id' => 'query_post_not_in',
				'std' => '',
				'type' => 'text',
			),

			/* Styling */

			array(
				'label' => __( 'Elements', 'dslc_string' ),
				'id' => 'elements',
				'std' => '',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Heading', 'dslc_string' ),
						'value' => 'main_heading'
					),
					array(
						'label' => __( 'Filters', 'dslc_string' ),
						'value' => 'filters'
					),
				),
				'section' => 'styling'
			),

			array(
				'label' => __( 'Post Elements', 'dslc_string' ),
				'id' => 'post_elements',
				'std' => 'thumbnail meta title excerpt button',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Thumbnail', 'dslc_string' ),
						'value' => 'thumbnail',
					),
					array(
						'label' => __( 'Title', 'dslc_string' ),
						'value' => 'title',
					),
					array(
						'label' => __( 'Meta', 'dslc_string' ),
						'value' => 'meta',
					),
					array(
						'label' => __( 'Excerpt', 'dslc_string' ),
						'value' => 'excerpt',
					),
					array(
						'label' => __( 'Button', 'dslc_string' ),
						'value' => 'button',
					),
				),
				'section' => 'styling'
			),

			array(
				'label' => __( 'Carousel Elements', 'dslc_string' ),
				'id' => 'carousel_elements',
				'std' => 'arrows circles',
				'type' => 'checkbox',
				'choices' => array(
					array(
						'label' => __( 'Arrows', 'dslc_string' ),
						'value' => 'arrows'
					),
					array(
						'label' => __( 'Circles', 'dslc_string' ),
						'value' => 'circles'
					),
				),
				'section' => 'styling'
			),
			array(
				'label'             => __( 'Duration when hover link(ms)', 'dslc_string' ),
				'id'                => 'as_duration_hover',
				'std'               => '300',
				'type'              => 'text',
				'refresh_on_change' => true,
				'section'           => 'styling',
			),
			/**
			 * Wrapper
			 */

			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_wrapper_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-posts',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_wrapper_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-posts',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_wrapper_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-posts',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_wrapper_border_trbl',
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
				'affect_on_change_el' => '.dslc-posts',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
			),
			array(
				'label' => __( 'Border Radius - Top', 'dslc_string' ),
				'id' => 'css_wrapper_border_radius_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-posts',
				'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
				'section' => 'styling',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Border Radius - Bottom', 'dslc_string' ),
				'id' => 'css_wrapper_border_radius_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-posts',
				'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
				'section' => 'styling',
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_wrapper_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-posts',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_wrapper_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-posts',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
			),

			/**
			 * Separator
			 */

			array(
				'label' => __( 'Enable/Disable', 'dslc_string' ),
				'id' => 'separator_enabled',
				'std' => 'enabled',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'dslc_string' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'dslc_string' ),
						'value' => 'disabled'
					),
				),
				'section' => 'styling',
				'tab' => __( 'Row Separator', 'dslc_string' ),
			),
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_sep_border_color',
				'std' => '#ededed',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-post-separator',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'Row Separator', 'dslc_string' ),
			),
			array(
				'label' => __( 'Height', 'dslc_string' ),
				'id' => 'css_sep_height',
				'std' => '32',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-post-separator',
				'affect_on_change_rule' => 'margin-bottom,padding-bottom',
				'ext' => 'px',
				'min' => 0,
				'max' => 300,
				'section' => 'styling',
				'tab' => __( 'Row Separator', 'dslc_string' ),
			),
			array(
				'label' => __( 'Style', 'dslc_string' ),
				'id' => 'css_sep_style',
				'std' => 'dashed',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Invisible', 'dslc_string' ),
						'value' => 'none'
					),
					array(
						'label' => __( 'Solid', 'dslc_string' ),
						'value' => 'solid'
					),
					array(
						'label' => __( 'Dashed', 'dslc_string' ),
						'value' => 'dashed'
					),
					array(
						'label' => __( 'Dotted', 'dslc_string' ),
						'value' => 'dotted'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-post-separator',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => __( 'Row Separator', 'dslc_string' ),
			),

			/**
			 * Thumbnail
			 */

			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_thumb_bg_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => __( 'Thumbnail', 'dslc_string' ),
			),	
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_thumb_border_color',
				'std' => '#e6e6e6',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb-inner',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'Thumbnail', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_thumb_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb-inner',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Thumbnail', 'dslc_string' ),
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_thumb_border_trbl',
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
				'affect_on_change_el' => '.dslc-cpt-post-thumb-inner',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => __( 'Thumbnail', 'dslc_string' ),
			),		
			array(
				'label' => __( 'Border Radius - Top', 'dslc_string' ),
				'id' => 'css_thumb_border_radius_top',
				'std' => '4',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb, .dslc-cpt-post-thumb-inner',
				'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
				'section' => 'styling',
				'tab' => __( 'Thumbnail', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Border Radius - Bottom', 'dslc_string' ),
				'id' => 'css_thumb_border_radius_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb, .dslc-cpt-post-thumb-inner',
				'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
				'section' => 'styling',
				'tab' => __( 'Thumbnail', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'thumb_margin',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'tab' => __( 'Thumbnail', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Right', 'dslc_string' ),
				'id' => 'thumb_margin_right',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'styling',
				'tab' => __( 'Thumbnail', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_thumb_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb-inner',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Thumbnail', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_thumb_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb-inner',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Thumbnail', 'dslc_string' ),
			),
			array(
				'label' => __( 'Resize - Height', 'dslc_string' ),
				'id' => 'thumb_resize_height',
				'std' => '',
				'type' => 'text',
				'section' => 'styling',
				'tab' => __( 'thumbnail', 'dslc_string' ),
			),
			array(
				'label' => __( 'Resize - Width', 'dslc_string' ),
				'id' => 'thumb_resize_width_manual',
				'std' => '',
				'type' => 'text',
				'section' => 'styling',
				'tab' => __( 'thumbnail', 'dslc_string' ),
			),
			array(
				'label' => __( 'Resize - Width', 'dslc_string' ),
				'id' => 'thumb_resize_width',
				'std' => '',
				'type' => 'text',
				'section' => 'styling',
				'tab' => __( 'thumbnail', 'dslc_string' ),
				'visibility' => 'hidden'
			),
			array(
				'label' => __( 'Width', 'dslc_string' ),
				'id' => 'thumb_width',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb',
				'affect_on_change_rule' => 'width',
				'section' => 'styling',
				'tab' => __( 'Thumbnail', 'dslc_string' ),
				'min' => 1,
				'max' => 100,
				'ext' => '%'
			),

			/**
			 * Main
			 */

			array(
				'label' => __( 'Location', 'dslc_string' ),
				'id' => 'main_location',
				'std' => 'bellow',
				'type' => 'select',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
				'choices' => array(
					array(
						'label' => __( 'Bellow Thumbnail', 'dslc_string' ),
						'value' => 'bellow'
					),
					array(
						'label' => __( 'Inside Thumbnail ( hover )', 'dslc_string' ),
						'value' => 'inside'
					),
					array(
						'label' => __( 'Inside Thumbnail ( always visible )', 'dslc_string' ),
						'value' => 'inside_visible'
					),
				),
			),
			array(
				'label' => __( ' BG Color', 'dslc_string' ),
				'id' => 'css_main_bg_color',
				'std' => '#ffffff',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_main_border_color',
				'std' => '#e8e8e8',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_main_border_width',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_main_border_trbl',
				'std' => 'right bottom left',
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
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Radius - Top', 'dslc_string' ),
				'id' => 'css_main_border_radius_top',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Border Radius - Bottom', 'dslc_string' ),
				'id' => 'css_main_border_radius_bottom',
				'std' => '4',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_main_padding_vertical',
				'std' => '25',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_main_padding_horizontal',
				'std' => '25',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'Minimum Height', 'dslc_string' ),
				'id' => 'css_main_min_height',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'min-height',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Main', 'dslc_string' ),
				'min' => 0,
				'max' => 500
			),
			array(
				'label' => __( 'Text Align', 'dslc_string' ),
				'id' => 'css_main_text_align',
				'std' => 'center',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'text-align',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
				'choices' => array(
					array(
						'label' => __( 'Left', 'dslc_string' ),
						'value' => 'left',
					),
					array(
						'label' => __( 'Center', 'dslc_string' ),
						'value' => 'center',
					),
					array(
						'label' => __( 'Right', 'dslc_string' ),
						'value' => 'right',
					),
					array(
						'label' => __( 'Justify', 'dslc_string' ),
						'value' => 'justify',
					),
				)
			),

			/**
			 * Main Inner
			 */

			array(
				'label' => __( 'Position', 'dslc_string' ),
				'id' => 'main_position',
				'std' => 'center',
				'type' => 'select',
				'section' => 'styling',
				'tab' => __( 'Main Inner', 'dslc_string' ),
				'choices' => array(
					array(
						'label' => __( 'Top Left', 'dslc_string' ),
						'value' => 'topleft'
					),
					array(
						'label' => __( 'Top Right', 'dslc_string' ),
						'value' => 'topright'
					),
					array(
						'label' => __( 'Center', 'dslc_string' ),
						'value' => 'center'
					),
					array(
						'label' => __( 'Bottom Left', 'dslc_string' ),
						'value' => 'bottomleft'
					),
					array(
						'label' => __( 'Bottom Right', 'dslc_string' ),
						'value' => 'bottomright'
					),
				)
			),
			array(
				'label' => __( 'Margin', 'dslc_string' ),
				'id' => 'css_main_inner_margin',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main-inner',
				'affect_on_change_rule' => 'margin',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Main Inner', 'dslc_string' ),
			),
			array(
				'label' => __( 'Width', 'dslc_string' ),
				'id' => 'css_main_inner_width',
				'std' => '100',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main-inner',
				'affect_on_change_rule' => 'width',
				'section' => 'styling',
				'ext' => '%',
				'tab' => __( 'Main Inner', 'dslc_string' ),
			),

			/* Title Options */

			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'title_color',
				'std' => '#4d4d4d',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title h2,.dslc-cpt-post-title h2 a',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
			),
			array(
				'label' => __( 'Color - Hover', 'dslc_string' ),
				'id' => 'title_color_hover',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title h2:hover,.dslc-cpt-post-title h2 a:hover',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'title_font_size',
				'std' => '17',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title h2,.dslc-cpt-post-title h2 a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_title_font_weight',
				'std' => '500',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title h2,.dslc-cpt-post-title h2 a',
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
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title h2,.dslc-cpt-post-title h2 a',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
			),
			array(
				'label'   => __( 'Font Style', 'dslc_string' ),
				'id'      => 'css_title_font_style',
				'std'     => 'normal',
				'type'    => 'select',
				'choices' => array(
					array(
						'label' => __( 'Normal', 'dslc_string' ),
						'value' => 'normal'
					),
					array(
						'label' => __( 'Italic', 'dslc_string' ),
						'value' => 'italic'
					),
				),
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-cpt-post-title h2,.dslc-cpt-post-title h2 a',
				'affect_on_change_rule' => 'font-style',
				'section'               => 'styling',
				'tab'                   => __( 'Title', 'dslc_string' ),
			),
			array(
                'label'                 => __( 'Letter Spacing', 'dslc_string' ),
                'id'                    => 'css_title__letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-cpt-post-title h2,.dslc-cpt-post-title h2 a',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __( 'Title', 'dslc_string' ),
                'ext'                   => 'px'
            ),
			array(
				'label' => __( 'Line Height', 'dslc_string' ),
				'id' => 'title_line_height',
				'std' => '29',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title h2,.dslc-cpt-post-title h2 a',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'title_margin',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Text Transform', 'dslc_string' ),
				'id' => 'css_title_text_transform',
				'std' => 'none',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'None', 'dslc_string' ),
						'value' => 'none'
					),
					array(
						'label' => __( 'Capitalize', 'dslc_string' ),
						'value' => 'capitalize'
					),
					array(
						'label' => __( 'Uppercase', 'dslc_string' ),
						'value' => 'uppercase'
					),
					array(
						'label' => __( 'Lowercase', 'dslc_string' ),
						'value' => 'lowercase'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title h2',
				'affect_on_change_rule' => 'text-transform',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_title_text_padding_vertical',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Title', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_title_text_padding_horizontal',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Title', 'dslc_string' ),
			),
			/**
			 * Meta
			 */

			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_meta_border_color',
				'std' => '#e5e5e5',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'Meta', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_meta_border_width',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Meta', 'dslc_string' ),
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_meta_border_trbl',
				'std' => 'top bottom',
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
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => __( 'Meta', 'dslc_string' ),
			),
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_meta_color',
				'std' => '#a8a8a8',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Meta', 'dslc_string' ),
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_meta_font_size',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => __( 'Meta', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_meta_font_family',
				'std' => 'Libre Baskerville',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => __( 'Meta', 'dslc_string' ),
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_meta_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => __( 'Meta', 'dslc_string' ),
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label'   => __( 'Font Style', 'dslc_string' ),
				'id'      => 'css_meta_font_style',
				'std'     => 'normal',
				'type'    => 'select',
				'choices' => array(
					array(
						'label' => __( 'Normal', 'dslc_string' ),
						'value' => 'normal'
					),
					array(
						'label' => __( 'Italic', 'dslc_string' ),
						'value' => 'italic'
					),
				),
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'font-style',
				'section'               => 'styling',
				'tab'                   => __( 'Meta', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Line Height', 'dslc_string' ),
				'id'                    => 'css_meta_line_height',
				'std'                   => '15',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'line-height',
				'section'               => 'styling',
				'tab'                   => __( 'Title', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'                 => __( 'Margin Bottom', 'dslc_string' ),
				'id'                    => 'css_meta_margin_bottom',
				'std'                   => '16',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'margin-bottom',
				'section'               => 'styling',
				'ext'                   => 'px',
				'tab'                   => __( 'Meta', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Padding Vertical', 'dslc_string' ),
				'id'                    => 'css_meta_padding_vertical',
				'std'                   => '16',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section'               => 'styling',
				'ext'                   => 'px',
				'tab'                   => __( 'Meta', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_meta_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Meta', 'dslc_string' ),
			),

			array(
				'label' => __( 'Link - Color', 'dslc_string' ),
				'id' => 'css_meta_link_color',
				'std' => '#5890e5',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta a',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Meta', 'dslc_string' ),
			),
			array(
				'label' => __( 'Link - Hover - Color', 'dslc_string' ),
				'id' => 'css_meta_link_color_hover',
				'std' => '#5890e5',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta a:hover',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Meta', 'dslc_string' ),
			),
			array(
				'label' => __( 'Text Transform', 'dslc_string' ),
				'id' => 'css_meta_transform',
				'std' => 'none',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'None', 'dslc_string' ),
						'value' => 'none'
					),
					array(
						'label' => __( 'Capitalize', 'dslc_string' ),
						'value' => 'capitalize'
					),
					array(
						'label' => __( 'Uppercase', 'dslc_string' ),
						'value' => 'uppercase'
					),
					array(
						'label' => __( 'Lowercase', 'dslc_string' ),
						'value' => 'lowercase'
					),
				),
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'text-transform',
				'section' => 'styling',
				'tab' => __( 'Meta', 'dslc_string' ),
			),
			
			/**
			 * Excerpt
			 */

			array(
				'label' => __( 'Excerpt or Content', 'dslc_string' ),
				'id' => 'excerpt_or_content',
				'std' => 'excerpt',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Excerpt', 'dslc_string' ),
						'value' => 'excerpt'
					),
					array(
						'label' => __( 'Content', 'dslc_string' ),
						'value' => 'content'
					),
				),
				'section' => 'styling',
				'tab' => __( 'Excerpt', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_excerpt_border_color',
				'std' => '#e5e5e5',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'Excerpt', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_excerpt_border_width',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Excerpt', 'dslc_string' ),
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_excerpt_border_trbl',
				'std' => 'top bottom',
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
				'affect_on_change_el' => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => __( 'Excerpt', 'dslc_string' ),
			),
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_excerpt_color',
				'std' => '#a6a6a6',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Excerpt', 'dslc_string' ),
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_excerpt_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => __( 'Excerpt', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label'                 => __( 'Font Weight', 'dslc_string' ),
				'id'                    => 'css_excerpt_font_weight',
				'std'                   => '500',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'font-weight',
				'section'               => 'styling',
				'tab'                   => __( 'Excerpt', 'dslc_string' ),
				'ext'                   => '',
				'min'                   => 100,
				'max'                   => 900,
				'increment'             => 100
			),
			array(
				'label'                 => __( 'Font Family', 'dslc_string' ),
				'id'                    => 'css_excerpt_font_family',
				'std'                   => 'Bitter',
				'type'                  => 'font',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'font-family',
				'section'               => 'styling',
				'tab'                   => __( 'Excerpt', 'dslc_string' ),
			),
			array(
				'label'   => __( 'Font Style', 'dslc_string' ),
				'id'      => 'css_excerpt_font_style',
				'std'     => 'normal',
				'type'    => 'select',
				'choices' => array(
					array(
						'label' => __( 'Normal', 'dslc_string' ),
						'value' => 'normal'
					),
					array(
						'label' => __( 'Italic', 'dslc_string' ),
						'value' => 'italic'
					),
				),
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'font-style',
				'section'               => 'styling',
				'tab'                   => __( 'Excerpt', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Line Height', 'dslc_string' ),
				'id'                    => 'css_excerpt_line_height',
				'std'                   => '23',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-cpt-post-excerpt, .dslc-cpt-post-excerpt p',
				'affect_on_change_rule' => 'line-height',
				'section'               => 'styling',
				'tab'                   => __( 'Excerpt', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'                 => __( 'Margin Bottom', 'dslc_string' ),
				'id'                    => 'excerpt_margin',
				'std'                   => '22',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'margin-bottom',
				'section'               => 'styling',
				'ext'                   => 'px',
				'tab'                   => __( 'excerpt', 'dslc_string' ),
			),
			array(
				'label'   => __( 'Max Length ( amount of words )', 'dslc_string' ),
				'id'      => 'excerpt_length',
				'std'     => '20',
				'type'    => 'text',
				'section' => 'styling',
				'tab'     => __( 'Excerpt', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Padding Vertical', 'dslc_string' ),
				'id'                    => 'css_excerpt_padding_vertical',
				'std'                   => '16',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section'               => 'styling',
				'ext'                   => 'px',
				'tab'                   => __( 'Excerpt', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Padding Horizontal', 'dslc_string' ),
				'id'                    => 'css_excerpt_padding_horizontal',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section'               => 'styling',
				'ext'                   => 'px',
				'tab'                   => __( 'Excerpt', 'dslc_string' ),
			),
			/**
			 * Button
			 */

			array(
				'label' => __( 'Text', 'dslc_string' ),
				'id' => 'button_text',
				'std' => 'CONTINUE READING',
				'type' => 'text',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'BG Color', 'dslc_string' ),
				'id' => 'css_button_bg_color',
				'std' => '#5890e5',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'BG Color - Hover', 'dslc_string' ),
				'id' => 'css_button_bg_color_hover',
				'std' => '#4b7bc2',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more:hover',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Width', 'dslc_string' ),
				'id' => 'css_button_border_width',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Borders', 'dslc_string' ),
				'id' => 'css_button_border_trbl',
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
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'border-style',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_button_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Color - Hover', 'dslc_string' ),
				'id' => 'css_button_border_color_hover',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more:hover',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Radius', 'dslc_string' ),
				'id' => 'css_button_border_radius',
				'std' => '3',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'border-radius',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_button_color',
				'std' => '#ffffff',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'Color - Hover', 'dslc_string' ),
				'id' => 'css_button_color_hover',
				'std' => '#ffffff',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more:hover',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_button_font_size',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_button_font_weight',
				'std' => '800',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_button_font_family',
				'std' => 'Lato',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
                'label'                 => __( 'Letter Spacing', 'dslc_string' ),
                'id'                    => 'css_button_letter_spacing',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-cpt-post-read-more a.as-btn-read-more',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __( 'Button', 'dslc_string' ),
                'ext'                   => 'px'
            ),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_button_padding_vertical',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_button_padding_horizontal',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'Icon', 'dslc_string' ),
				'id' => 'button_icon_id',
				'std' => '',
				'type' => 'icon',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
                'label'   => __( 'Position Icon', 'dslc_string' ),
                'id'      => 'as_button_position_icon',
                'std'     => 'left',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __( 'Left', 'dslc_string' ),
                        'value' => 'left'
                    ),
                    array(
                        'label' => __( 'Right', 'dslc_string' ),
                        'value' => 'right'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __( 'Button', 'dslc_string' ),
            ),
			array(
				'label' => __( 'Icon - Color', 'dslc_string' ),
				'id' => 'css_button_icon_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more .dslc-icon',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'Icon - Hover - Color', 'dslc_string' ),
				'id' => 'css_button_icon_color_hover',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more:hover .dslc-icon',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
/*			array(
				'label' => __( 'Icon - Margin Right', 'dslc_string' ),
				'id' => 'css_button_icon_margin',
				'std' => '5',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a .dslc-icon',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Button', 'dslc_string' ),
			),*/
			array(
                'label'                 => __( 'Margin Right', 'dslc_string' ),
                'id'                    => 'as_button_css_icon_margin_right',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-cpt-post-read-more a.as-btn-read-more .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __( 'Button', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Margin Left', 'dslc_string' ),
                'id'                    => 'as_button_css_icon_margin_left',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-cpt-post-read-more a.as-btn-read-more .dslc-icon',
                'affect_on_change_rule' => 'margin-left',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __( 'Button', 'dslc_string' ),
            ),
            /**
             * Out line Style
             */
            array(
                'label'                 => __( 'Out Line Width', 'dslc_string' ),
                'id'                    => 'as_button_out_line_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-cpt-post-read-more a.as-btn-read-more',
                'affect_on_change_rule' => 'outline-width',
                'section'               => 'styling',
                'tab'                   => __( 'Button', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Out Line Offset', 'dslc_string' ),
                'id'                    => 'as_button_out_line_offset',
                'std'                   => '3',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-cpt-post-read-more a.as-btn-read-more',
                'affect_on_change_rule' => 'outline-offset',
                'section'               => 'styling',
                'tab'                   => __( 'Button', 'dslc_string' ),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __( 'Out Line Color', 'dslc_string' ),
                'id'                    => 'as_button_out_line_color',
                'std'                   => '#5890e5',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-cpt-post-read-more a.as-btn-read-more',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __( 'Button', 'dslc_string' ),
            ),
            array(
                'label'                 => __( 'Out Line Color Hover', 'dslc_string' ),
                'id'                    => 'as_button_out_line_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-cpt-post-read-more a.as-btn-read-more:hover',
                'affect_on_change_rule' => 'outline-color',
                'section'               => 'styling',
                'tab'                   => __( 'Button', 'dslc_string' ),
            ),
            array(
                'label'   => __( 'Out Line Style', 'dslc_string' ) ,
                'id'      => 'as_button_out_line_style',
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
                'affect_on_change_el'   => '.dslc-cpt-post-read-more a.as-btn-read-more',
                'affect_on_change_rule' => 'outline-style',
                'section'               => 'styling',
                'tab'                   => __( 'Button', 'dslc_string' ),
            ),
            array(
				'label' => __( 'Padding Vertical Wrapper', 'dslc_string' ),
				'id' => 'css_button_padding_vertical_wrapper',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Horizontal Wrapper', 'dslc_string' ),
				'id' => 'css_button_padding_horizontal_wrapper',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Button', 'dslc_string' ),
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
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Separator - Height', 'dslc_string' ),
				'id' => 'css_res_t_sep_height',
				'std' => '32',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-post-separator',
				'affect_on_change_rule' => 'margin-bottom,padding-bottom',
				'ext' => 'px',
				'min' => 1,
				'max' => 300,
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Thumbnail - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_thumb_margin',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Thumbnail - Margin Right', 'dslc_string' ),
				'id' => 'css_res_t_thumb_margin_right',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Thumbnail - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_thumb_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb-inner',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Thumbnail - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_thumb_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb-inner',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Main - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_main_padding_vertical',
				'std' => '25',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Main - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_main_padding_horizontal',
				'std' => '25',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Title - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_title_font_size',
				'std' => '17',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title h2,.dslc-cpt-post-title h2 a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Title - Line Height', 'dslc_string' ),
				'id' => 'css_res_t_title_line_height',
				'std' => '29',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title h2, .dslc-cpt-post-title h2 a',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Title - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_title_margin',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Meta - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_meta_font_size',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Meta - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_meta_margin_bottom',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Meta - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_meta_padding_vertical',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Meta - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_meta_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Excerpt - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_excerpt_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Excerpt - Line Height', 'dslc_string' ),
				'id' => 'css_res_t_excerpt_line_height',
				'std' => '23',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-excerpt, .dslc-cpt-post-excerpt p',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Excerpt - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_excerpt_margin',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Button - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_button_font_size',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Button - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_button_padding_vertical',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Button - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_button_padding_horizontal',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Button - Icon - Margin Right', 'dslc_string' ),
				'id' => 'css_res_t_button_icon_margin',
				'std' => '5',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more .dslc-icon',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
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
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px',
			),
			array(
				'label' => __( 'Separator - Height', 'dslc_string' ),
				'id' => 'css_res_p_sep_height',
				'std' => '32',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-post-separator',
				'affect_on_change_rule' => 'margin-bottom,padding-bottom',
				'ext' => 'px',
				'min' => 1,
				'max' => 300,
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Thumbnail - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_thumb_margin',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Thumbnail - Margin Right', 'dslc_string' ),
				'id' => 'css_res_p_thumb_margin_right',
				'std' => '20',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Thumbnail - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_thumb_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb-inner',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Thumbnail - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_thumb_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-thumb-inner',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Main - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_main_padding_vertical',
				'std' => '25',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Main - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_main_padding_horizontal',
				'std' => '25',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-main',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Title - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_title_font_size',
				'std' => '17',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title h2,.dslc-cpt-post-title h2 a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Title - Line Height', 'dslc_string' ),
				'id' => 'css_res_p_title_line_height',
				'std' => '29',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title h2,.dslc-cpt-post-title h2 a',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Title - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_title_margin',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-title',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Meta - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_meta_font_size',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Meta - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_meta_margin_bottom',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Meta - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_meta_padding_vertical',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Meta - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_meta_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-meta',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Excerpt - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_excerpt_font_size',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Excerpt - Line Height', 'dslc_string' ),
				'id' => 'css_res_p_excerpt_line_height',
				'std' => '23',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-excerpt, .dslc-cpt-post-excerpt p',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Excerpt - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_excerpt_margin',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-excerpt',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Button - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_button_font_size',
				'std' => '11',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Button - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_button_padding_vertical',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Button - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_button_padding_horizontal',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Button - Icon - Margin Right', 'dslc_string' ),
				'id' => 'css_res_p_button_icon_margin',
				'std' => '5',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-cpt-post-read-more a.as-btn-read-more .dslc-icon',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),

		);
	
		$dslc_options = array_merge( $dslc_options, $this->shared_options('carousel_options') );
		$dslc_options = array_merge( $dslc_options, $this->shared_options('heading_options') );
		$dslc_options = array_merge( $dslc_options, $this->shared_options('filters_options') );
		$dslc_options = array_merge( $dslc_options, $this->shared_options('carousel_arrows_options') );
		$dslc_options = array_merge( $dslc_options, $this->shared_options('carousel_circles_options') );
		$dslc_options = array_merge( $dslc_options, $this->shared_options('pagination_options') );
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

		/* CUSTOM START */

		if ( ! isset( $options['excerpt_length'] ) ) $options['excerpt_length'] = 20;

		/**
		 * Query
		 */

			// Fix for pagination
			if( is_front_page() ) { $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1; } else { $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; }

			// General args
			$args = array(
				'paged' => $paged, 
				'post_type' => $options['post_type'],
				'posts_per_page' => $options['amount'],
				'order' => $options['order'],
				'orderby' => $options['orderby'],
				'offset' => $options['offset']
			);

			// Category args
			if ( isset( $options['categories'] ) && $options['categories'] != '' ) {
				$cats_array = explode( ' ', $options['categories']);
				$args['category__in'] = $cats_array;
			}

			// Exlcude and Include arrays
			$exclude = array();
			$include = array();

			// Exclude current post
			if ( is_singular( get_post_type() ) )
				$exclude[] = get_the_ID();

			// Exclude posts ( option )
			if ( $options['query_post_not_in'] )
				$exclude = array_merge( $exclude, explode( ' ', $options['query_post_not_in'] ) );

			// Include posts ( option )
			if ( $options['query_post_in'] )
				$include = array_merge( $include, explode( ' ', $options['query_post_in'] ) );
			
			// Include query parameter
			if ( ! empty( $include ) )
				$args['post__in'] = $include;

			// Exclude query parameter
			if ( ! empty( $exclude ) )
				$args['post__not_in'] = $exclude;
			
			// Author archive page
			if ( is_author() ) {
				global $authordata;
				$args['author__in'] = array( $authordata->data->ID );
			}
			
			// No paging
			if ( $options['pagination_type'] == 'disabled' )
				$args['no_found_rows'] = true;
			
			// Do the query
			if ( is_category() || is_tax() || is_search() ) {
				global $wp_query;
				$dslc_query = $wp_query;
			} else {
				$dslc_query = new WP_Query( $args );
			}

		/**
		 * Duration when hover link
		 */
			$duration_hover = '';
			$value_duration = $options['as_duration_hover'];
			if ( $value_duration != '' ){
				$duration_hover = '
					<style>
						#dslc-module-'.$options['module_instance_id'].' .dslc-cpt-post-title h2 a, #dslc-module-'.$options['module_instance_id'].' .dslc-cpt-post-meta a, #dslc-module-'.$options['module_instance_id'].' .dslc-cpt-post-read-more a, #dslc-module-'.$options['module_instance_id'].' a.as-post-like .dslc-icon{
							-webkit-transition: all '. $value_duration .'ms ease;
							-moz-transition: all '. $value_duration .'ms ease;
							-ms-transition: all '. $value_duration .'ms ease;
							-o-transition: all '. $value_duration .'ms ease;
							transition: all '. $value_duration .'ms ease;
					</style>
				';
			}

		/**
		 * Unnamed
		 */

			$columns_class = 'dslc-col dslc-' . $options['columns'] . '-col ';
			$count = 0;
			$real_count = 0;
			$increment = $options['columns'];
			$max_count = 12;

		/**
		 * Elements to show
		 */
			
			// Main Elements
			$elements = $options['elements'];
			if ( ! empty( $elements ) )
				$elements = explode( ' ', trim( $elements ) );
			else
				$elements = array();
			

			// Post Elements
			$post_elements = $options['post_elements'];
			if ( ! empty( $post_elements ) )
				$post_elements = explode( ' ', trim( $post_elements ) );
			else
				$post_elements = 'all';

			// Carousel Elements
			$carousel_elements = $options['carousel_elements'];
			if ( ! empty( $carousel_elements ) )
				$carousel_elements = explode( ' ', trim( $carousel_elements ) );
			else
				$carousel_elements = array();

		/**
		 * Classes generation
		 */

			// Posts container
			$container_class = 'dslc-posts dslc-cpt-posts dslc-clearfix dslc-cpt-posts-type-' . $options['type'] .' dslc-posts-orientation-' . $options['orientation'] . ' ';
			if ( $options['type'] == 'masonry' )
				$container_class .= 'dslc-init-masonry ';
			elseif ( $options['type'] == 'grid' )
				$container_class .= 'dslc-init-grid ';

			// Post
			$element_class = 'dslc-post dslc-cpt-post ';
			if ( $options['type'] == 'masonry' )
				$element_class .= 'dslc-masonry-item ';
			elseif ( $options['type'] == 'carousel' )
				$element_class .= 'dslc-carousel-item ';

		/**
		 * What is shown
		 */

			$show_header = false;
			$show_heading = false;
			$show_filters = false;
			$show_carousel_arrows = false;
			$show_view_all_link = false;

			if ( in_array( 'main_heading', $elements ) )
				$show_heading = true;		

			if ( ( $elements == 'all' || in_array( 'filters', $elements ) ) && $options['type'] !== 'carousel' )
				$show_filters = true;

			if ( $options['type'] == 'carousel' && in_array( 'arrows', $carousel_elements ) )
				$show_carousel_arrows = true;

			if ( $show_heading || $show_filters || $show_carousel_arrows )
				$show_header = true;

		/**
		 * Carousel Items
		 */
		
			switch ( $options['columns'] ) {
				case 12 :
					$carousel_items = 1;
					break;
				case 6 :
					$carousel_items = 2;
					break;
				case 4 :
					$carousel_items = 3;
					break;
				case 3 :
					$carousel_items = 4;
					break;
				case 2 :
					$carousel_items = 6;
					break;
				default:
					$carousel_items = 6;
					break;
			}

		/**
		 * Heading ( output )
		 */

			if ( $show_header ) :
				?>
					<div class="dslc-module-heading">
						
						<!-- Heading -->

						<?php if ( $show_heading ) : ?>

							<h2 class="dslca-editable-content" data-id="main_heading_title" data-type="simple" <?php if ( $dslc_is_admin ) echo 'contenteditable'; ?> ><?php echo $options['main_heading_title']; ?></h2>

							<!-- View all -->

							<?php if ( isset( $options['view_all_link'] ) && $options['view_all_link'] !== '' ) : ?>

								<span class="dslc-module-heading-view-all"><a href="<?php echo $options['view_all_link']; ?>" class="dslca-editable-content" data-id="main_heading_link_title" data-type="simple" <?php if ( $dslc_is_admin ) echo 'contenteditable'; ?> ><?php echo $options['main_heading_link_title']; ?></a></span>

							<?php endif; ?>

						<?php endif; ?>

						<!-- Filters -->

						<?php

							if ( $show_filters ) {

								$cats_array = array();

								if ( $dslc_query->have_posts() ) {

									while ( $dslc_query->have_posts() ) {

										$dslc_query->the_post(); 

										$post_cats = get_the_category( get_the_ID() );
										if ( ! empty( $post_cats ) ) {
											foreach( $post_cats as $post_cat ) {
												$cats_array[$post_cat->slug] = $post_cat->name;
											}
										}

									}

								}

								?>

									<div class="dslc-post-filters">

										<span class="dslc-post-filter dslc-active" data-id=" "><?php _e( 'All', 'Post Filter', 'dslc_string' ); ?></span>

										<?php foreach ( $cats_array as $cat_slug => $cat_name ) : ?>
											<span class="dslc-post-filter dslc-inactive" data-id="<?php echo $cat_slug; ?>"><?php echo $cat_name; ?></span>
										<?php endforeach; ?>

									</div><!-- .dslc-post-filters -->

								<?php

							}

						?>

						<!-- Carousel -->

						<?php if ( $show_carousel_arrows ) : ?>
							<span class="dslc-carousel-nav fr">
								<span class="dslc-carousel-nav-inner">
									<a href="#" class="dslc-carousel-nav-prev"><span class="dslc-icon-chevron-left dslc-init-center"></span></a>
									<a href="#" class="dslc-carousel-nav-next"><span class="dslc-icon-chevron-right dslc-init-center"></span></a>
								</span>
							</span><!-- .carousel-nav -->
						<?php endif; ?>

					</div><!-- .dslc-module-heading -->
				<?php

			endif;

		/**
		 * Posts ( output )
		 */
			global $post;
			if ( $dslc_query->have_posts() ) {

				?>
				<?php echo $duration_hover; ?>
				<div class="as-custom-post-class <?php echo $container_class; ?>"><?php

					?><div class="dslc-posts-inner"><?php

						if ( $options['type'] == 'carousel' ) :

							?><div class="dslc-loader"></div><div class="dslc-carousel" data-stop-on-hover="<?php echo $options['carousel_autoplay_hover']; ?>" data-autoplay="<?php echo $options['carousel_autoplay']; ?>" data-columns="<?php echo $carousel_items; ?>" data-pagination="<?php if ( in_array( 'circles', $carousel_elements ) ) echo 'true'; else echo 'false'; ?>" data-slide-speed="<?php echo $options['arrows_slide_speed']; ?>" data-pagination-speed="<?php echo $options['circles_slide_speed']; ?>"><?php

						endif;

						while ( $dslc_query->have_posts() ) : $dslc_query->the_post(); $count += $increment; $real_count++;

							if ( $count == $max_count ) {
								$count = 0;
								$extra_class = ' dslc-last-col';
							} elseif ( $count == $increment ) {
								$extra_class = ' dslc-first-col';
							} else {
								$extra_class = '';
							}

							if ( ! has_post_thumbnail() )
								$extra_class .= ' dslc-post-no-thumb';

							$post_cats = get_the_category( get_the_ID() );
							$post_cats_data = '';
							if ( ! empty( $post_cats ) ) {
								foreach( $post_cats as $post_cat ) {
									$post_cats_data .= $post_cat->slug . ' ';
								}
							}

							?>

							<div class="<?php echo $element_class . $columns_class . $extra_class; ?>" data-cats="<?php echo $post_cats_data; ?>">

								<?php if ( $post_elements == 'all' || in_array( 'thumbnail', $post_elements ) ) : ?>

									<?php
										/**
										 * Manual Resize
										 */

										$manual_resize = false;
										if ( isset( $options['thumb_resize_height'] ) && ! empty( $options['thumb_resize_height'] ) || isset( $options['thumb_resize_width_manual'] ) && ! empty( $options['thumb_resize_width_manual'] ) ) {

											$manual_resize = true;
											$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); 
											$thumb_url = $thumb_url[0];

											$thumb_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
											if ( ! $thumb_alt ) $thumb_alt = '';
											
											$resize_width = false;
											$resize_height = false;

											if ( isset( $options['thumb_resize_width_manual'] ) && ! empty( $options['thumb_resize_width_manual'] ) ) {
												$resize_width = $options['thumb_resize_width_manual'];
											}

											if ( isset( $options['thumb_resize_height'] ) && ! empty( $options['thumb_resize_height'] ) ) {
												$resize_height = $options['thumb_resize_height'];
											}

										}
									?>

									<?php if ( has_post_thumbnail() ) : ?>

										<div class="dslc-post-thumb dslc-cpt-post-thumb dslc-on-hover-anim">

											<div class="dslc-cpt-post-thumb-inner dslca-post-thumb">
												<?php if ( $manual_resize ) : ?>
													<a href="<?php the_permalink(); ?>"><img src="<?php $res_img = dslc_aq_resize( $thumb_url, $resize_width, $resize_height, true ); echo $res_img; ?>" alt="<?php echo $thumb_alt; ?>" /></a>
												<?php else : ?>
													<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
												<?php endif; ?>
											</div><!-- .dslc-cpt-post-thumb-inner -->

											<?php if ( ( $options['main_location'] == 'inside' || $options['main_location'] == 'inside_visible' ) && ( $post_elements == 'all' || in_array( 'title', $post_elements ) || in_array( 'meta', $post_elements ) || in_array( 'excerpt', $post_elements ) || in_array( 'button', $post_elements ) ) ) : ?>

												<div class="dslc-post-main dslc-cpt-post-main <?php if ( $options['main_location'] == 'inside_visible' ) echo 'dslc-cpt-post-main-visible'; ?> dslc-on-hover-anim-target dslc-anim-<?php echo $options['css_anim_hover']; ?>" data-dslc-anim="<?php echo $options['css_anim_hover'] ?>" data-dslc-anim-speed="<?php echo $options['css_anim_speed']; ?>">
													
													<div class="dslc-cpt-post-main-inner dslc-init-<?php echo $options['main_position']; ?>">

														<?php if ( $post_elements == 'all' || in_array( 'title', $post_elements ) ) : ?>

															<div class="dslc-cpt-post-title">
																<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
															</div><!-- .dslc-cpt-post-title -->

														<?php endif; ?>	

														<?php if ( $post_elements == 'all' || in_array( 'meta', $post_elements ) ) : ?>

															<div class="dslc-cpt-post-meta">

																<div class="dslc-cpt-post-meta-date">
																	<?php the_time( get_option( 'date_format' ) ); ?>
																</div><!-- .dslc-cpt-post-meta-date -->

																<div class="dslc-cpt-post-meta-author">
																	<?php _e( 'By', 'dslc_string'); ?> <?php the_author_posts_link(); ?>
																</div><!-- .dslc-cpt-post-meta-author -->

															</div><!-- .dslc-cpt-post-meta -->

														<?php endif; ?>

														<?php if ( $post_elements == 'all' || in_array( 'excerpt', $post_elements ) ) : ?>

															<div class="dslc-cpt-post-excerpt">
																<?php if ( $options['excerpt_or_content'] == 'content' ) : ?>
																	<?php the_content(); ?>
																<?php else : ?>
																	<?php
																		if ( has_excerpt() )
																			echo do_shortcode( wp_trim_words( get_the_excerpt(), $options['excerpt_length'] ) );
																		else
																			echo do_shortcode( wp_trim_words( get_the_content(), $options['excerpt_length'] ) );
																	?>
																<?php endif; ?>
															</div><!-- .dslc-cpt-post-excerpt -->

														<?php endif; ?>

														<?php if ( $post_elements == 'all' || in_array( 'button', $post_elements ) ) : ?>

															<div class="dslc-cpt-post-read-more">
																<a href="<?php the_permalink(); ?>">
																	<?php if ( $options['as_button_position_icon'] == 'left' ) : ?>
																		<?php if ( isset( $options['button_icon_id'] ) && $options['button_icon_id'] != '' ) : ?>
																			<span class="dslc-icon dslc-icon-<?php echo $options['button_icon_id']; ?>"></span>
																		<?php endif; ?>
																	<?php endif; ?>
																	<?php echo $options['button_text']; ?>
																	<?php if ( $options['as_button_position_icon'] == 'right' ) : ?>
																		<?php if ( isset( $options['button_icon_id'] ) && $options['button_icon_id'] != '' ) : ?>
																			<span class="dslc-icon dslc-icon-<?php echo $options['button_icon_id']; ?>"></span>
																		<?php endif; ?>
																	<?php endif; ?>
																</a>
															</div><!-- .dslc-cpt-post-read-more -->

														<?php endif; ?>

													</div><!-- .dslc-cpt-post-main-inner -->

												</div><!-- .dslc-cpt-post-main -->

											<?php endif; ?>

										</div><!-- .dslc-cpt-post-thumb -->

									<?php endif; ?>

								<?php endif; ?>

								<?php if ( $options['main_location'] == 'bellow' && ( $post_elements == 'all' || in_array( 'title', $post_elements ) || in_array( 'meta', $post_elements ) || in_array( 'excerpt', $post_elements ) || in_array( 'button', $post_elements ) ) ) : ?>

									<div class="dslc-post-main dslc-cpt-post-main">

										<?php if ( $post_elements == 'all' || in_array( 'title', $post_elements ) ) : ?>

											<div class="dslc-cpt-post-title">
												<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											</div><!-- .dslc-cpt-post-title -->

										<?php endif; ?>	

										<?php if ( $post_elements == 'all' || in_array( 'meta', $post_elements ) ) : ?>

											<div class="dslc-cpt-post-meta">	

												<div class="dslc-cpt-post-meta-date">
													<?php the_time( get_option( 'date_format' ) ); ?>
												</div><!-- .dslc-cpt-post-meta-date -->

												<span class="as-circle-line-post"></span>

												<div class="dslc-cpt-post-meta-author">
													<?php _e( 'by', 'dslc_string'); ?> <?php the_author_posts_link(); ?>
												</div><!-- .dslc-cpt-post-meta-author -->

												<span class="as-circle-line-post"></span>

												<div class="dslc-cpt-post-meta-category">
													<?php _e( 'in', 'dslc_string'); ?> <?php the_category(', '); ?>
												</div><!-- .dslc-cpt-post-meta-category -->

											</div><!-- .dslc-cpt-post-meta -->

										<?php endif; ?>

										<?php if ( $post_elements == 'all' || in_array( 'excerpt', $post_elements ) ) : ?>

											<div class="dslc-cpt-post-excerpt">
												<?php if ( $options['excerpt_or_content'] == 'content' ) : ?>
													<?php the_content(); ?>
												<?php else : ?>
													<?php
														if ( has_excerpt() )
															echo do_shortcode( wp_trim_words( get_the_excerpt(), $options['excerpt_length'] ) );
														else
															echo do_shortcode( wp_trim_words( get_the_content(), $options['excerpt_length'] ) );
													?>
												<?php endif; ?>
											</div><!-- .dslc-cpt-post-excerpt -->

										<?php endif; ?>

										<?php if ( $post_elements == 'all' || in_array( 'button', $post_elements ) ) : ?>

											<div class="dslc-cpt-post-read-more">
												<a href="<?php the_permalink(); ?>" class="as-btn-read-more">
													<?php if ( $options['as_button_position_icon'] == 'left' ) : ?>
														<?php if ( isset( $options['button_icon_id'] ) && $options['button_icon_id'] != '' ) : ?>
															<span class="dslc-icon dslc-icon-<?php echo $options['button_icon_id']; ?>"></span>
														<?php endif; ?>
													<?php endif; ?>
													<?php echo $options['button_text']; ?>
													<?php if ( $options['as_button_position_icon'] == 'right' ) : ?>
														<?php if ( isset( $options['button_icon_id'] ) && $options['button_icon_id'] != '' ) : ?>
															<span class="dslc-icon dslc-icon-<?php echo $options['button_icon_id']; ?>"></span>
														<?php endif; ?>
													<?php endif; ?>
												</a>
												<div class="as-post-like-share">
													<div class="as-btn-heart-blog">
														<a href="#" class="as-post-like <?php echo as_is_like_post($post->ID); ?>" data-id="<?php echo $post->ID; ?>">
															<span class="dslc-icon dslc-icon-heart"></span>
															<span class="number-like-heart">
																<?php 
																	echo get_post_meta( $post->ID, 'as_like_count', true ) ? get_post_meta( $post->ID, 'as_like_count', true ) : 0;
																?>
															</span>
														</a>
													</div>
													<!-- <div class="as-btn-share-social-blog">
														<span class="dslc-icon dslc-icon-share"></span>
														<ul class="as-list-icon-share">
															<li>
																<a class="as-share-blog-twitter" href="http://twitter.com/share?url=<?php the_permalink() ?>&amp;lang=en&amp;text=Check out this awesome project:&amp;" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=620');return false;" data-count="none" data-via=" ">
																	<span class="dslc-icon dslc-icon-twitter"></span>
																</a>
																<a class="sb-facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=660');return false;" target="_blank">
																	<span class="dslc-icon dslc-icon-facebook"></span>
																</a>
								                                <a class="sb-google" href="https://plus.google.com/share?url=<?php the_permalink() ?>&amp;title=<?php wp_title('') ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500');return false;">
								                                	<span class="dslc-icon dslc-icon-google-plus"></span>
								                                </a>
															</li>
														</ul>
													</div> -->
												</div>
											</div><!-- .dslc-cpt-post-read-more -->

										<?php endif; ?>

									</div><!-- .dslc-cpt-post-main -->

								<?php endif; ?>

							</div><!-- .dslc-cpt-post -->

							<?php

							// Row Separator
							if ( $options['type'] == 'grid' && $count == 0 && $real_count != $dslc_query->found_posts && $real_count != $options['amount'] && $options['separator_enabled'] == 'enabled' )
								echo '<div class="dslc-post-separator"></div>';

						endwhile;

						if ( $options['type'] == 'carousel' ) :

							?></div><?php

						endif;

					?></div><!--.dslc-posts-inner --><?php

				?></div><!-- .dslc-cpt-posts --><?php

			} else {

				if ( $dslc_is_admin ) :
					?><div class="dslc-notification dslc-red"><?php _e( 'You do not have any posts of that post type at the moment.', 'dslc_string' ); ?> <span class="dslca-refresh-module-hook dslc-icon dslc-icon-refresh"></span></span></div><?php
				endif;

			}

		/**
		 * Pagination
		 */
			
			if ( isset( $options['pagination_type'] ) && $options['pagination_type'] != 'disabled' ) {
				$num_pages = $dslc_query->max_num_pages;
				dslc_post_pagination( array( 'pages' => $num_pages, 'type' => $options['pagination_type'] ) ); 
			}

		
		wp_reset_query();

		$this->module_end( $options );

	}

}