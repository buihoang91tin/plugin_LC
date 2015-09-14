<?php
if (dslc_is_module_active('Anna_Projects'))
	include AS_EXTENSION_ABS . '/modules/anna-projects/functions.php';
class Anna_Projects extends DSLC_Module{
	var $module_id;
	var $module_title;
	var $module_icon;
	var $module_category;

	function __construct() {

		$this->module_id = 'Anna_Projects';
		$this->module_title = __( 'AS - Projects', 'dslc_string' );
		$this->module_icon = 'th';
		$this->module_category = 'as - posts';

	}

	function options()
	{
		$cats         = get_terms('dslc_projects_cats');
		$cats_choices = array();
		foreach ($cats as $cat)
		{
			$cats_choices[] = array(
				'label' => $cat->name,
				'value' => $cat->slug
			);
		}
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
				'label' => __( 'Link', 'dslc_string' ),
				'id' => 'link',
				'std' => 'permalink',
				'type' => 'select',
				'help' => __( '<strong>Link to project page</strong> links to the project page on this website.<br><strong>Link to custom project URL</strong> links to the URL set in the project options.', 'dslc_string' ),
				'choices' => array(
					array(
						'label' => __( 'Link to project page', 'dslc_string' ),
						'value' => 'permalink'
					),
					array(
						'label' => __( 'Link to custom project URL', 'dslc_string' ),
						'value' => 'custom'
					),
				)
			),
			array(
				'label' => __( 'Link Target', 'dslc_string' ),
				'id' => 'link_target',
				'std' => '_self',
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'Same tab', 'dslc_string' ),
						'value' => '_self'
					),
					array(
						'label' => __( 'New tab', 'dslc_string' ),
						'value' => '_blank'
					),
				)
			),
			array(
				'label'   => __('Type', 'dslc_string'),
				'id'      => 'type',
				'std'     => 'grid',
				'type'    => 'select',
				'choices' => array(
					array(
						'label' => __('Grid', 'dslc_string'),
						'value' => 'grid'
					),
					array(
						'label' => __('Masonry Grid', 'dslc_string'),
						'value' => 'masonry'
					),
					array(
						'label' => __('Carousel', 'dslc_string'),
						'value' => 'carousel'
					)
				)
			),
			array(
				'label'   => __('Orientation', 'dslc_string'),
				'id'      => 'orientation',
				'std'     => 'vertical',
				'type'    => 'select',
				'choices' => array(
					array(
						'label' => __('Vertical', 'dslc_string'),
						'value' => 'vertical'
					),
					array(
						'label' => __('Horizontal', 'dslc_string'),
						'value' => 'horizontal'
					)
				)
			),
			array(
				'label' => __('Posts Per Page', 'dslc_string'),
				'id'    => 'amount',
				'std'   => '8',
				'type'  => 'text',
			),
			array(
				'label'   => __('Pagination', 'dslc_string'),
				'id'      => 'pagination_type',
				'std'     => 'disabled',
				'type'    => 'select',
				'choices' => array(
					array(
						'label' => __('Disabled', 'dslc_string'),
						'value' => 'disabled',
					),
					array(
						'label' => __('Numbered', 'dslc_string'),
						'value' => 'numbered',
					),
					array(
						'label' => __('Prev/Next', 'dslc_string'),
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
				'label'   => __('Categories', 'dslc_string'),
				'id'      => 'categories',
				'std'     => '',
				'type'    => 'checkbox',
				'choices' => $cats_choices
			),
			array(
				'label' => __( 'Categories Operator', 'dslc_string' ),
				'id' => 'categories_operator',
				'std' => 'IN',
				'help' => __( '<strong>IN</strong> - Posts must be in at least one chosen category.<br><strong>AND</strong> - Posts must be in all chosen categories.<br><strong>NOT IN</strong> Posts must not be in the chosen categories.', 'dslc_string' ),
				'type' => 'select',
				'choices' => array(
					array(
						'label' => __( 'IN', 'dslc_string' ),
						'value' => 'IN',
					),
					array(
						'label' => __( 'AND', 'dslc_string' ),
						'value' => 'AND',
					),
					array(
						'label' => __( 'NOT IN', 'dslc_string' ),
						'value' => 'NOT IN',
					),
				)
			),
			array(
				'label'   => __('Order By', 'dslc_string'),
				'id'      => 'orderby',
				'std'     => 'date',
				'type'    => 'select',
				'choices' => array(
					array(
						'label' => __('Publish Date', 'dslc_string'),
						'value' => 'date'
					),
					array(
						'label' => __('Modified Date', 'dslc_string'),
						'value' => 'modified'
					),
					array(
						'label' => __('Random', 'dslc_string'),
						'value' => 'rand'
					),
					array(
						'label' => __('Alphabetic', 'dslc_string'),
						'value' => 'title'
					),
					array(
						'label' => __('Comment Count', 'dslc_string'),
						'value' => 'comment_count'
					),
				)
			),
			array(
				'label'   => __('Order', 'dslc_string'),
				'id'      => 'order',
				'std'     => 'DESC',
				'type'    => 'select',
				'choices' => array(
					array(
						'label' => __('Ascending', 'dslc_string'),
						'value' => 'ASC'
					),
					array(
						'label' => __('Descending', 'dslc_string'),
						'value' => 'DESC'
					)
				)
			),
			array(
				'label' => __('Offset', 'dslc_string'),
				'id'    => 'offset',
				'std'   => '0',
				'type'  => 'text',
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
			/**
			 * General
			 */
			array(
				'label'   => __('Elements', 'dslc_string'),
				'id'      => 'elements',
				'std'     => '',
				'type'    => 'checkbox',
				'choices' => array(
					array(
						'label' => __('Heading', 'dslc_string'),
						'value' => 'main_heading'
					),
					array(
						'label' => __('Filters', 'dslc_string'),
						'value' => 'filters'
					),
				),
				'section' => 'styling'
			),
			array(
				'label'   => __('Post Elements', 'dslc_string'),
				'id'      => 'post_elements',
				'std'     => 'thumbnail categories title',
				'type'    => 'checkbox',
				'choices' => array(
					array(
						'label' => __('Thumbnail', 'dslc_string'),
						'value' => 'thumbnail',
					),
					array(
						'label' => __('Title', 'dslc_string'),
						'value' => 'title',
					),
					array(
						'label' => __('Categories', 'dslc_string'),
						'value' => 'categories',
					),
					array(
						'label' => __('Excerpt', 'dslc_string'),
						'value' => 'excerpt',
					),
					array(
						'label' => __('Button', 'dslc_string'),
						'value' => 'button',
					),
				),
				'section' => 'styling'
			),
			array(
				'label'   => __('Carousel Elements', 'dslc_string'),
				'id'      => 'carousel_elements',
				'std'     => 'arrows circles',
				'type'    => 'checkbox',
				'choices' => array(
					array(
						'label' => __('Arrows', 'dslc_string'),
						'value' => 'arrows'
					),
					array(
						'label' => __('Circles', 'dslc_string'),
						'value' => 'circles'
					),
				),
				'section' => 'styling'
			),
			array(
				'label'                 => __('Margin Bottom', 'dslc_string'),
				'id'                    => 'css_margin_bottom',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-projects',
				'affect_on_change_rule' => 'margin-bottom',
				'section'               => 'styling',
				'ext'                   => 'px',
			),

			array(
				'label'                 => __('Item Margin Bottom', 'dslc_string'),
				'id'                    => 'css_margin_bottom_item',
				'std'                   => '30',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project',
				'affect_on_change_rule' => 'margin-bottom',
				'section'               => 'styling',
				'ext'                   => 'px',
			),

			/**
			 * Separator
			 */

			array(
				'label'   => __( 'Enable/Disable', 'dslc_string' ),
				'id'      => 'separator_enabled',
				'std'     => 'enabled',
				'type'    => 'select',
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
				'tab'     => __( 'Row Separator', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Color', 'dslc_string' ),
				'id'                    => 'css_sep_border_color',
				'std'                   => '#ededed',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-post-separator',
				'affect_on_change_rule' => 'border-color',
				'section'               => 'styling',
				'tab'                   => __( 'Row Separator', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Height', 'dslc_string' ),
				'id'                    => 'css_sep_height',
				'std'                   => '32',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-post-separator',
				'affect_on_change_rule' => 'margin-bottom,padding-bottom',
				'ext'                   => 'px',
				'min'                   => 0,
				'max'                   => 300,
				'section'               => 'styling',
				'tab'                   => __( 'Row Separator', 'dslc_string' ),
			),
			array(
				'label'   => __( 'Style', 'dslc_string' ),
				'id'      => 'css_sep_style',
				'std'     => 'dashed',
				'type'    => 'select',
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
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-post-separator',
				'affect_on_change_rule' => 'border-style',
				'section'               => 'styling',
				'tab'                   => __( 'Row Separator', 'dslc_string' ),
			),

			/**
			 * Thumbnail
			 */

			array(
				'label'                 => __( 'BG Color', 'dslc_string' ),
				'id'                    => 'css_thumbnail_bg_color',
				'std'                   => '',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-thumb',
				'affect_on_change_rule' => 'background-color',
				'section'               => 'styling',
				'tab'                   => __( 'Thumbnail', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Border Color', 'dslc_string' ),
				'id'                    => 'css_thumb_border_color',
				'std'                   => '',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-thumb-inner',
				'affect_on_change_rule' => 'border-color',
				'section'               => 'styling',
				'tab'                   => __( 'Thumbnail', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Border Width', 'dslc_string' ),
				'id'                    => 'css_thumb_border_width',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-thumb-inner',
				'affect_on_change_rule' => 'border-width',
				'section'               => 'styling',
				'ext'                   => 'px',
				'tab'                   => __( 'Thumbnail', 'dslc_string' ),
			),
			array(
				'label'   => __( 'Borders', 'dslc_string' ),
				'id'      => 'css_thumb_border_trbl',
				'std'     => 'top right bottom left',
				'type'    => 'checkbox',
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
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-thumb-inner',
				'affect_on_change_rule' => 'border-style',
				'section'               => 'styling',
				'tab'                   => __( 'Thumbnail', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Border Radius - Top', 'dslc_string' ),
				'id'                    => 'css_thumbnail_border_radius_top',
				'std'                   => '',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-thumb-inner, .dslc-project-thumb img',
				'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
				'section'               => 'styling',
				'tab'                   => __( 'Thumbnail', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'                 => __( 'Border Radius - Bottom', 'dslc_string' ),
				'id'                    => 'css_thumbnail_border_radius_bottom',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-thumb-inner, .dslc-project-thumb img',
				'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
				'section'               => 'styling',
				'tab'                   => __( 'Thumbnail', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'                 => __( 'Margin Bottom', 'dslc_string' ),
				'id'                    => 'css_thumbnail_margin_bottom',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-thumb',
				'affect_on_change_rule' => 'margin-bottom',
				'section'               => 'styling',
				'ext'                   => 'px',
				'tab'                   => __( 'Thumbnail', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Padding Vertical', 'dslc_string' ),
				'id'                    => 'css_thumbnail_padding_vertical',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-thumb-inner',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section'               => 'styling',
				'ext'                   => 'px',
				'tab'                   => __( 'Thumbnail', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Padding Horizontal', 'dslc_string' ),
				'id'                    => 'css_thumbnail_padding_horizontal',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-thumb-inner',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section'               => 'styling',
				'ext'                   => 'px',
				'tab'                   => __( 'Thumbnail', 'dslc_string' ),
			),
			array(
				'label'   => __( 'Resize - Height', 'dslc_string' ),
				'id'      => 'thumb_resize_height',
				'std'     => '',
				'type'    => 'text',
				'section' => 'styling',
				'tab'     => __( 'thumbnail', 'dslc_string' ),
			),
			array(
				'label'   => __( 'Resize - Width', 'dslc_string' ),
				'id'      => 'thumb_resize_width_manual',
				'std'     => '',
				'type'    => 'text',
				'section' => 'styling',
				'tab'     => __( 'thumbnail', 'dslc_string' ),
			),
			array(
				'label'      => __( 'Resize - Width', 'dslc_string' ),
				'id'         => 'thumb_resize_width',
				'std'        => '',
				'type'       => 'text',
				'section'    => 'styling',
				'tab'        => __( 'thumbnail', 'dslc_string' ),
				'visibility' => 'hidden'
			),
			array(
				'label'                 => __( 'Width', 'dslc_string' ),
				'id'                    => 'thumb_width',
				'std'                   => '100',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-post-thumb',
				'affect_on_change_rule' => 'width',
				'section'               => 'styling',
				'tab'                   => __( 'Thumbnail', 'dslc_string' ),
				'min'                   => 1,
				'max'                   => 100,
				'ext'                   => '%'
			),

			/**
			 * Main
			 */

			array(
				'label'   => __( 'Location', 'dslc_string' ),
				'id'      => 'main_location',
				'std'     => 'bellow',
				'type'    => 'select',
				'section' => 'styling',
				'tab'     => __( 'Main', 'dslc_string' ),
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
				'label' => __( 'Animation When Hover', 'dslc_string' ),
				'id' => 'main_animation_hover',
				'std' => 'none',
				'type' => 'select',
				'section' => 'styling',
				'tab' => __( 'Main', 'dslc_string' ),
				'choices' => array(
					array(
						'label' => __( 'None', 'dslc_string' ),
						'value' => 'none'
					),
					array(
						'label' => __( 'Lily Effect', 'dslc_string' ),
						'value' => 'effect-lily'
					),
					array(
						'label' => __( 'Sadie Effect', 'dslc_string' ),
						'value' => 'effect-sadie'
					),
					array(
						'label' => __( 'Layla Effect', 'dslc_string' ),
						'value' => 'effect-layla'
					),
					array(
						'label' => __( 'Oscar Effect', 'dslc_string' ),
						'value' => 'effect-oscar'
					),
					array(
						'label' => __( 'Marley Effect', 'dslc_string' ),
						'value' => 'effect-marley'
					),
					array(
						'label' => __( 'Ruby Effect', 'dslc_string' ),
						'value' => 'effect-ruby'
					),
					array(
						'label' => __( 'Roxy Effect', 'dslc_string' ),
						'value' => 'effect-roxy'
					),
					array(
						'label' => __( 'Bubba Effect', 'dslc_string' ),
						'value' => 'effect-bubba'
					),
					array(
						'label' => __( 'Romeo Effect', 'dslc_string' ),
						'value' => 'effect-romeo'
					),
					array(
						'label' => __( 'Sarah Effect', 'dslc_string' ),
						'value' => 'effect-sarah'
					),
					array(
						'label' => __( 'Chico Effect', 'dslc_string' ),
						'value' => 'effect-chico'
					),
				),
			),
			array(
				'label'                 => __( ' BG Color', 'dslc_string' ),
				'id'                    => 'css_main_bg_color',
				'std'                   => '#ffffff',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-main',
				'affect_on_change_rule' => 'background-color',
				'section'               => 'styling',
				'tab'                   => __( 'Main', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Border Color', 'dslc_string' ),
				'id'                    => 'css_main_border_color',
				'std'                   => '#e6e6e6',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-main',
				'affect_on_change_rule' => 'border-color',
				'section'               => 'styling',
				'tab'                   => __( 'Main', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Border Width', 'dslc_string' ),
				'id'                    => 'css_main_border_width',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-main',
				'affect_on_change_rule' => 'border-width',
				'section'               => 'styling',
				'ext'                   => 'px',
				'tab'                   => __( 'Main', 'dslc_string' ),
			),
			array(
				'label'   => __( 'Borders', 'dslc_string' ),
				'id'      => 'css_main_border_trbl',
				'std'     => 'right bottom left',
				'type'    => 'checkbox',
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
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-main',
				'affect_on_change_rule' => 'border-style',
				'section'               => 'styling',
				'tab'                   => __( 'Main', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Border Radius - Top', 'dslc_string' ),
				'id'                    => 'css_main_border_radius_top',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-main',
				'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
				'section'               => 'styling',
				'tab'                   => __( 'Main', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'                 => __( 'Border Radius - Bottom', 'dslc_string' ),
				'id'                    => 'css_main_border_radius_bottom',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-main',
				'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
				'section'               => 'styling',
				'tab'                   => __( 'Main', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'                 => __( 'Minimum Height', 'dslc_string' ),
				'id'                    => 'css_main_min_height',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-main',
				'affect_on_change_rule' => 'min-height',
				'section'               => 'styling',
				'ext'                   => 'px',
				'tab'                   => __( 'Main', 'dslc_string' ),
				'min'                   => 0,
				'max'                   => 500
			),
			array(
				'label'                 => __( 'Padding Vertical', 'dslc_string' ),
				'id'                    => 'css_main_padding_vertical',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.dslc-project-main',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section'               => 'styling',
				'ext'                   => 'px',
				'tab'                   => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_main_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-main',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Main', 'dslc_string' ),
			),
			array(
				'label' => __( 'Text Align', 'dslc_string' ),
				'id' => 'css_main_text_align',
				'std' => 'center',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-main',
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
						'label' => __( 'None', 'dslc_string' ),
						'value' => 'none-position'
					),
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
				'affect_on_change_el' => '.dslc-project-main-inner',
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
				'affect_on_change_el' => '.dslc-project-main-inner',
				'affect_on_change_rule' => 'width',
				'section' => 'styling',
				'ext' => '%',
				'tab' => __( 'Main Inner', 'dslc_string' ),
			),

			/**
			 * Title
			 */

			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_title_color',
				'std' => '#fff',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title h2 a',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
			),
			array(
				'label' => __( 'Color - Hover', 'dslc_string' ),
				'id' => 'css_title_color_hover',
				'std' => 'rgb(248, 191, 59)',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title h2:hover a,.dslc-project-title h2 a:hover',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_title_font_size',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title h2,.dslc-project-title h2 a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_title_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title h2,.dslc-project-title h2 a',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Weight tag Span', 'dslc_string' ),
				'id' => 'css_title_font_weight_span',
				'std' => '700',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title h2 span,.dslc-project-title h2 a span',
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
				'std' => 'Raleway',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title h2,.dslc-project-title h2 a',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
			),
			array(
				'label' => __( 'Line Height', 'dslc_string' ),
				'id' => 'css_title_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title h2,.dslc-project-title h2 a',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Letter Spacing', 'dslc_string' ),
				'id' => 'css_title_letter_spacing',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title h2,.dslc-project-title h2 a',
				'affect_on_change_rule' => 'letter-spacing',
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
				'affect_on_change_el' => '.dslc-project-title h2',
				'affect_on_change_rule' => 'text-transform',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_title_margin_bottom',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'tab' => __( 'Title', 'dslc_string' ),
				'ext' => 'px'
			),
			

			/**
			 * Categories
			 */

			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_cats_color',
				'std' => '#ffffff',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-cats',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Categories', 'dslc_string' ),
			),
			array(
				'label' => __( 'Font Size', 'dslc_string' ),
				'id' => 'css_cats_font_size',
				'std' => '14',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-cats',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => __( 'Categories', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_cats_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-cats',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => __( 'Categories', 'dslc_string' ),
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_cats_font_family',
				'std' => 'Bitter',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-cats',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => __( 'Categories', 'dslc_string' ),
			),
			array(
				'label' => __( 'Line Height', 'dslc_string' ),
				'id' => 'css_cats_line_height',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-cats',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'tab' => __( 'Categories', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'css_cats_margin-bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-cats',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Categories', 'dslc_string' ),
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
				'label' => __( 'Border Top Color', 'dslc_string' ),
				'id' => 'css_excerpt_border_color',
				'std' => '#e6e6e6',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-excerpt',
				'affect_on_change_rule' => 'border-top-color',
				'section' => 'styling',
				'tab' => __( 'excerpt', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Top Width', 'dslc_string' ),
				'id' => 'css_excerpt_border_width',
				'std' => '1',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-excerpt',
				'affect_on_change_rule' => 'border-top-width',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'excerpt', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Top Style', 'dslc_string' ),
				'id' => 'css_excerpt_border_style',
				'std' => 'solid',
				'type' => 'select',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-excerpt',
				'affect_on_change_rule' => 'border-top-style',
				'section' => 'styling',
				'choices' => array(
					array(
						'label' => __( 'Solid', 'dslc_string' ),
						'value' => 'solid',
					),
					array(
						'label' => __( 'Dashed', 'dslc_string' ),
						'value' => 'dashed',
					),
					array(
						'label' => __( 'Dotted', 'dslc_string' ),
						'value' => 'dotted',
					),
				),
				'tab' => __( 'excerpt', 'dslc_string' ),
			),
			array(
				'label' => __( 'Color', 'dslc_string' ),
				'id' => 'css_excerpt_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-excerpt',
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
				'affect_on_change_el' => '.dslc-project-excerpt',
				'affect_on_change_rule' => 'font-size',
				'section' => 'styling',
				'tab' => __( 'Excerpt', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Font Weight', 'dslc_string' ),
				'id' => 'css_excerpt_font_weight',
				'std' => '400',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-excerpt',
				'affect_on_change_rule' => 'font-weight',
				'section' => 'styling',
				'tab' => __( 'Excerpt', 'dslc_string' ),
				'ext' => '',
				'min' => 100,
				'max' => 900,
				'increment' => 100
			),
			array(
				'label' => __( 'Font Family', 'dslc_string' ),
				'id' => 'css_excerpt_font_family',
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-excerpt',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => __( 'Excerpt', 'dslc_string' ),
			),
			array(
				'label' => __( 'Line Height', 'dslc_string' ),
				'id' => 'css_excerpt_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-excerpt, .dslc-project-excerpt p',
				'affect_on_change_rule' => 'line-height',
				'section' => 'styling',
				'tab' => __( 'Excerpt', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Text Transform', 'dslc_string' ),
				'id' => 'css_excerpt_text_transform',
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
				'affect_on_change_el' => '.dslc-project-excerpt, .dslc-project-excerpt p',
				'affect_on_change_rule' => 'text-transform',
				'section' => 'styling',
				'tab' => __( 'Excerpt', 'dslc_string' ),
			),
			array(
				'label' => __( 'Margin Bottom', 'dslc_string' ),
				'id' => 'excerpt_margin',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-excerpt',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'excerpt', 'dslc_string' ),
			),
			array(
				'label' => __( 'Max Length ( amount of words )', 'dslc_string' ),
				'id' => 'excerpt_length',
				'std' => '20',
				'type' => 'text',
				'section' => 'styling',
				'tab' => __( 'Excerpt', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Top', 'dslc_string' ),
				'id' => 'css_excerpt_padding',
				'std' => '15',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-excerpt',
				'affect_on_change_rule' => 'padding-top',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'excerpt', 'dslc_string' ),
			),

			/**
			 * Button
			 */
			array(
				'label' => __( 'Text', 'dslc_string' ),
				'id' => 'button_text',
				'std' => 'VIEW PROJECT',
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
				'affect_on_change_el' => '.dslc-project-read-more a',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'BG Color - Hover', 'dslc_string' ),
				'id' => 'css_button_bg_color_hover',
				'std' => '#477ccc',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-read-more a:hover',
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
				'affect_on_change_el' => '.dslc-project-read-more a',
				'affect_on_change_rule' => 'border-width',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Border Color', 'dslc_string' ),
				'id' => 'css_button_border_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-read-more a',
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
				'affect_on_change_el' => '.dslc-project-read-more a:hover',
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
				'affect_on_change_el' => '.dslc-project-read-more a',
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
				'affect_on_change_el' => '.dslc-project-read-more a',
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
				'affect_on_change_el' => '.dslc-project-read-more a:hover',
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
				'affect_on_change_el' => '.dslc-project-read-more a',
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
				'affect_on_change_el' => '.dslc-project-read-more a',
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
				'std' => 'Open Sans',
				'type' => 'font',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-read-more a',
				'affect_on_change_rule' => 'font-family',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Vertical', 'dslc_string' ),
				'id' => 'css_button_padding_vertical',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-read-more a',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'Padding Horizontal', 'dslc_string' ),
				'id' => 'css_button_padding_horizontal',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-read-more a',
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
				'label' => __( 'Icon - Color', 'dslc_string' ),
				'id' => 'css_button_icon_color',
				'std' => '',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-read-more a .dslc-icon',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Button', 'dslc_string' ),
			),
			array(
				'label' => __( 'Icon - Margin Right', 'dslc_string' ),
				'id' => 'css_button_icon_margin',
				'std' => '5',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-read-more a .dslc-icon',
				'affect_on_change_rule' => 'margin-right',
				'section' => 'styling',
				'ext' => 'px',
				'tab' => __( 'Button', 'dslc_string' ),
			),

			/**
			 * Ajax Portfolio Style
			 */
			array(
				'label'   => __('Ajax Projects', 'dslc_string'),
				'id'      => 'as_ajax_projects',
				'std'     => 1,
				'type'    => 'select',
				'choices' => array(
					array(
						'label' => __('Use Ajax Portfolio', 'dslc_string'),
						'value' => 1
					),
					array(
						'label' => __('Normal Link', 'dslc_string'),
						'value' => 0
					)
				),
				'section' => 'styling',
				'tab'     => __( 'Ajax Portfolio', 'dslc_string' ),
			),
			array(
				'label'   => __('Position Ajax Projects', 'dslc_string'),
				'id'      => 'as_ajax_projects_position',
				'std'     => 'bottom',
				'type'    => 'select',
				'choices' => array(
					array(
						'label' => __('Top', 'dslc_string'),
						'value' => 'top'
					),
					array(
						'label' => __('Bottom', 'dslc_string'),
						'value' => 'bottom'
					)
				),
				'section' => 'styling',
				'tab'     => __( 'Ajax Portfolio', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Ajax Content Margin Bottom', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_margin_bottom',
				'std'                   => '35',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '#as_portfolio_content',
				'affect_on_change_rule' => 'margin-bottom',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			/** Navigation Ajax Style **/ 
			array(
				'label'                 => __( 'Color of Navigation', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_nav_color',
				'std'                   => 'rgb(44, 62, 79)',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-portfolio-ajax-wrapper .as-port-control span.as-btn-text-ajax-prj',
				'affect_on_change_rule' => 'color',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Font Family of Nav', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_nav_font_family',
				'std'                   => 'Raleway',
				'type'                  => 'font',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-portfolio-ajax-wrapper .as-port-control span.as-btn-text-ajax-prj',
				'affect_on_change_rule' => 'font-family',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Font Weight of Nav', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_nav_font_weight',
				'std'                   => '700',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-portfolio-ajax-wrapper .as-port-control span.as-btn-text-ajax-prj',
				'affect_on_change_rule' => 'font-weight',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => '',
				'min'                   => 100,
				'max'                   => 900,
				'increment'             => 100
			),
			array(
				'label'                 => __( 'Font Size of Nav', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_nav_font_size',
				'std'                   => '13',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-portfolio-ajax-wrapper .as-port-control span.as-btn-text-ajax-prj',
				'affect_on_change_rule' => 'font-size',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'                 => __( 'Nav Margin Bottom', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_nav_margin_bottom',
				'std'                   => '30',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-portfolio-ajax-wrapper .as-port-control',
				'affect_on_change_rule' => 'margin-bottom',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			/** Title Ajax Style **/
			array(
				'label'                 => __( 'Color of Title', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_title_color',
				'std'                   => 'rgb(89, 89, 89)',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
				'affect_on_change_rule' => 'color',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Font Family of Title', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_title_font_family',
				'std'                   => 'Raleway',
				'type'                  => 'font',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
				'affect_on_change_rule' => 'font-family',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Line Height of Title', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_title_line_height',
				'std'                   => '22',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
				'affect_on_change_rule' => 'line-height',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'                 => __( 'Font Weight of Title', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_title_font_weight',
				'std'                   => '600',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
				'affect_on_change_rule' => 'font-weight',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => '',
				'min'                   => 100,
				'max'                   => 900,
				'increment'             => 100
			),
			array(
				'label'                 => __( 'Font Size of Title', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_title_font_size',
				'std'                   => '30',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
				'affect_on_change_rule' => 'font-size',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'   => __( 'Text Transform', 'dslc_string' ),
				'id'      => 'as_ajax_projects_title_text_transform',
				'std'     => 'uppercase',
				'type'    => 'select',
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
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
				'affect_on_change_rule' => 'text-transform',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Letter Spacing', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_title_letter_spacing',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
				'affect_on_change_rule' => 'letter-spacing',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'                 => __( 'Title Margin Bottom', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_title_margin_bottom',
				'std'                   => '35',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
				'affect_on_change_rule' => 'margin-bottom',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'                 => __( 'Title Align', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_title_text_align',
				'std'                   => 'center',
				'type'                  => 'select',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper',
				'affect_on_change_rule' => 'text-align',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'choices'               => array(
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
			/** Category Ajax Style **/
			array(
				'label'                 => __( 'Color of Category', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_category_color',
				'std'                   => 'rgb(131, 131, 131)',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
				'affect_on_change_rule' => 'color',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Font Family of Category', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_category_font_family',
				'std'                   => 'Bitter',
				'type'                  => 'font',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
				'affect_on_change_rule' => 'font-family',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Line Height of Category', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_category_line_height',
				'std'                   => '12',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
				'affect_on_change_rule' => 'line-height',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'                 => __( 'Font Weight of Category', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_category_font_weight',
				'std'                   => '400',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
				'affect_on_change_rule' => 'font-weight',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => '',
				'min'                   => 100,
				'max'                   => 900,
				'increment'             => 100
			),
			array(
				'label'                 => __( 'Font Size of Category', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_category_font_size',
				'std'                   => '13',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
				'affect_on_change_rule' => 'font-size',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'   => __( 'Text Transform', 'dslc_string' ),
				'id'      => 'as_ajax_projects_category_text_transform',
				'std'     => 'uppercase',
				'type'    => 'select',
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
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
				'affect_on_change_rule' => 'text-transform',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Letter Spacing', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_category_letter_spacing',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
				'affect_on_change_rule' => 'letter-spacing',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'                 => __( 'Category Margin Bottom', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_category_margin_bottom .as-port-ajax-category',
				'std'                   => '35',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
				'affect_on_change_rule' => 'margin-bottom',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			/** Excerpt Ajax Style **/
			array(
				'label'                 => __( 'Color of Excerpt', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_excerpt_color',
				'std'                   => 'rgb(76, 76, 76)',
				'type'                  => 'color',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
				'affect_on_change_rule' => 'color',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Font Family of Excerpt', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_excerpt_font_family',
				'std'                   => 'Raleway',
				'type'                  => 'font',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
				'affect_on_change_rule' => 'font-family',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Line Height of Excerpt', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_excerpt_line_height',
				'std'                   => '25',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
				'affect_on_change_rule' => 'line-height',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'                 => __( 'Font Weight of Excerpt', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_excerpt_font_weight',
				'std'                   => '400',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
				'affect_on_change_rule' => 'font-weight',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => '',
				'min'                   => 100,
				'max'                   => 900,
				'increment'             => 100
			),
			array(
				'label'                 => __( 'Font Size of Excerpt', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_excerpt_font_size',
				'std'                   => '12',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
				'affect_on_change_rule' => 'font-size',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			array(
				'label'   => __( 'Text Transform Excerpt', 'dslc_string' ),
				'id'      => 'as_ajax_projects_excerpt_text_transform',
				'std'     => 'none',
				'type'    => 'select',
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
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
				'affect_on_change_rule' => 'text-transform',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
			),
			array(
				'label'                 => __( 'Letter Spacing Excerpt', 'dslc_string' ),
				'id'                    => 'as_ajax_projects_excerpt_letter_spacing',
				'std'                   => '0',
				'type'                  => 'slider',
				'refresh_on_change'     => false,
				'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
				'affect_on_change_rule' => 'letter-spacing',
				'section'               => 'styling',
				'tab'                   => __( 'Ajax Portfolio', 'dslc_string' ),
				'ext'                   => 'px'
			),
			/**
			 * Filters
			 */
			array(
				'label' => __( 'Background Color - Hover', 'dslc_string' ),
				'id' => 'css_filters_background_color_hover',
				'std' => 'rgb(248, 191, 59)',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-post-filters .dslc-post-filter:hover',
				'affect_on_change_rule' => 'background-color',
				'section' => 'styling',
				'tab' => __( 'Filters', 'dslc_string' ),
			),
			array(
				'label' => __( 'Color - Hover', 'dslc_string' ),
				'id' => 'css_filters_color_hover',
				'std' => 'rgb(248, 191, 59)',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-post-filters .dslc-post-filter:hover',
				'affect_on_change_rule' => 'color',
				'section' => 'styling',
				'tab' => __( 'Filters', 'dslc_string' ),
			),
			array(
				'label' => __( 'Border Color - Hover', 'dslc_string' ),
				'id' => 'css_filters_border_color_hover',
				'std' => 'rgb(248, 191, 59)',
				'type' => 'color',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-post-filters .dslc-post-filter:hover',
				'affect_on_change_rule' => 'border-color',
				'section' => 'styling',
				'tab' => __( 'Filters', 'dslc_string' ),
			),
			array(
                'label'             => __( 'Duration when hover(ms)', 'dslc_string' ),
                'id'                => 'css_filters_duration_hover',
                'std'               => '300',
                'type'              => 'text',
                'refresh_on_change' => true,
                'section'           => 'styling',
                'tab' => __( 'Filters', 'dslc_string' ),
            ),
			array(
				'label' => __( 'Text Transform', 'dslc_string' ),
				'id' => 'css_filters_text_transform',
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
				'affect_on_change_el' => '.dslc-post-filters .dslc-post-filter',
				'affect_on_change_rule' => 'text-transform',
				'section' => 'styling',
				'tab' => __( 'Filters', 'dslc_string' ),
			),
			
			/**
			 * Responsive tablet
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
				'affect_on_change_el' => '.dslc-projects',
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
				'id' => 'css_res_t_thumbnail_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-thumb',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Thumbnail - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_thumbnail_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-thumb-inner',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Thumbnail - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_thumbnail_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-thumb-inner',
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
				'affect_on_change_el' => '.dslc-project-main',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Main - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_main_padding_horizontal',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-main',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Title - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_title_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title h2,.dslc-project-title h2 a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Title - Line Height', 'dslc_string' ),
				'id' => 'css_res_t_title_line_height',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title h2,.dslc-project-title h2 a',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Title - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_title_margin_bottom',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Categories - Font Size', 'dslc_string' ),
				'id' => 'css_res_t_cats_font_size',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-cats',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Categories - Line Height', 'dslc_string' ),
				'id' => 'css_res_t_cats_line_height',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-cats',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Categories - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_t_cats_margin-bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-cats',
				'affect_on_change_rule' => 'margin-bottom',
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
				'affect_on_change_el' => '.dslc-project-excerpt',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Excerpt - Line Height', 'dslc_string' ),
				'id' => 'css_res_t_excerpt_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-excerpt, .dslc-project-excerpt p',
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
				'affect_on_change_el' => '.dslc-project-excerpt',
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
				'affect_on_change_el' => '.dslc-project-read-more a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'tablet', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Button - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_t_button_padding_vertical',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-read-more a',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Button - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_t_button_padding_horizontal',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-read-more a',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'tablet', 'dslc_string' ),
			),
			array(
				'label' => __( 'Button Icon - Margin Right', 'dslc_string' ),
				'id' => 'css_res_t_button_icon_margin',
				'std' => '5',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-read-more a .dslc-icon',
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
				'affect_on_change_el' => '.dslc-projects',
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
				'id' => 'css_res_p_thumbnail_margin_bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-thumb',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Thumbnail - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_thumbnail_padding_vertical',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-thumb-inner',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Thumbnail - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_thumbnail_padding_horizontal',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-thumb-inner',
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
				'affect_on_change_el' => '.dslc-project-main',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Main - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_main_padding_horizontal',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-main',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Title - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_title_font_size',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title h2,.dslc-project-title h2 a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Title - Line Height', 'dslc_string' ),
				'id' => 'css_res_p_title_line_height',
				'std' => '12',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title h2,.dslc-project-title h2 a',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Title - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_title_margin_bottom',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-title',
				'affect_on_change_rule' => 'margin-bottom',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Categories - Font Size', 'dslc_string' ),
				'id' => 'css_res_p_cats_font_size',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-cats',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Categories - Line Height', 'dslc_string' ),
				'id' => 'css_res_p_cats_line_height',
				'std' => '10',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-cats',
				'affect_on_change_rule' => 'line-height',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Categories - Margin Bottom', 'dslc_string' ),
				'id' => 'css_res_p_cats_margin-bottom',
				'std' => '0',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-cats',
				'affect_on_change_rule' => 'margin-bottom',
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
				'affect_on_change_el' => '.dslc-project-excerpt',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Excerpt - Line Height', 'dslc_string' ),
				'id' => 'css_res_p_excerpt_line_height',
				'std' => '22',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-excerpt, .dslc-project-excerpt p',
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
				'affect_on_change_el' => '.dslc-project-excerpt',
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
				'affect_on_change_el' => '.dslc-project-read-more a',
				'affect_on_change_rule' => 'font-size',
				'section' => 'responsive',
				'tab' => __( 'phone', 'dslc_string' ),
				'ext' => 'px'
			),
			array(
				'label' => __( 'Button - Padding Vertical', 'dslc_string' ),
				'id' => 'css_res_p_button_padding_vertical',
				'std' => '13',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-read-more a',
				'affect_on_change_rule' => 'padding-top,padding-bottom',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Button - Padding Horizontal', 'dslc_string' ),
				'id' => 'css_res_p_button_padding_horizontal',
				'std' => '16',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-read-more a',
				'affect_on_change_rule' => 'padding-left,padding-right',
				'section' => 'responsive',
				'ext' => 'px',
				'tab' => __( 'phone', 'dslc_string' ),
			),
			array(
				'label' => __( 'Button Icon - Margin Right', 'dslc_string' ),
				'id' => 'css_res_p_button_icon_margin',
				'std' => '5',
				'type' => 'slider',
				'refresh_on_change' => false,
				'affect_on_change_el' => '.dslc-project-read-more a .dslc-icon',
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
		if ($dslc_active && is_user_logged_in() && current_user_can(DS_LIVE_COMPOSER_CAPABILITY))
			$dslc_is_admin = true;
		else
			$dslc_is_admin = false;
		$options['module_id'] = $this->module_id;
		$this->module_start($options);
		/* Module output stars here */

			if ( ! isset( $options['excerpt_length'] ) ) $options['excerpt_length'] = 20;
			if ( ! isset( $options['type'] ) ) $options['type'] = 'grid';

			if( is_front_page() ) { $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1; } else { $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; }
			$args = array(
				'paged' => $paged, 
				'post_type' => 'dslc_projects',
				'posts_per_page' => $options['amount'],
				'order' => $options['order'],
				'orderby' => $options['orderby'],
				'offset' => $options['offset']
			);

			if ( isset( $options['categories'] ) && $options['categories'] != '' ) {
				
				$cats_array = explode( ' ', trim( $options['categories'] ));

				$args['tax_query'] = array(
					array(
						'taxonomy' => 'dslc_projects_cats',
						'field' => 'slug',
						'terms' => $cats_array,
						'operator' => $options['categories_operator']
				)
			);
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
		$wrapper_class = '';
		$columns_class = 'dslc-col dslc-' . $options['columns'] . '-col ';
		$count         = 0;
		$real_count    = 0;
		$increment     = $options['columns'];
		$max_count     = 12;
		/**
		 * Elements to show
		 */
		// Main Elements
		$elements = $options['elements'];
		if (!empty($elements))
			$elements = explode(' ', trim($elements));
		else
			$elements = array();
		// Post Elements
		$post_elements = $options['post_elements'];
		if (!empty($post_elements))
			$post_elements = explode(' ', trim($post_elements));
		else
			$post_elements = 'all';
		// Carousel Elements
		$carousel_elements = $options['carousel_elements'];
		if (!empty($carousel_elements))
			$carousel_elements = explode(' ', trim($carousel_elements));
		else
			$carousel_elements = array();
		/* Container Class */
		$container_class = 'dslc-posts dslc-projects dslc-clearfix dslc-posts-orientation-' . $options['orientation'] . ' ';
		if ($options['type'] == 'masonry')
			$container_class .= 'dslc-init-masonry ';
		elseif ($options['type'] == 'grid')
			$container_class .= 'dslc-init-grid ';
			$container_class .= " as-isotope-posts";
		/* Element Class */
		$element_class = 'dslc-post dslc-project ';
		if ($options['type'] == 'masonry')
			$element_class .= 'dslc-masonry-item ';
		elseif ($options['type'] == 'carousel')
			$element_class .= 'dslc-carousel-item ';
		/**
		 * What is shown
		 */
		$show_header          = false;
		$show_heading         = false;
		$show_filters         = false;
		$show_carousel_arrows = false;
		$show_view_all_link   = false;
		if (in_array('main_heading', $elements))
			$show_heading = true;
		if (( $elements == 'all' || in_array('filters', $elements) ) && $options['type'] !== 'carousel')
			$show_filters = true;
		if ($options['type'] == 'carousel' && in_array('arrows', $carousel_elements))
			$show_carousel_arrows = true;
		if ($show_heading || $show_filters || $show_carousel_arrows)
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
		
		?>
		
		<?php if( $options['as_ajax_projects'] == 1 && $options['as_ajax_projects_position'] == 'top' ){ ?>
			<!-- PRINT PROJECTS DATA -->
			<div id="as_portfolio_content" style="display:none;">
				<div class="as-wrapper clearfix">
					<div class="as-portfolio-ajax-wrapper">
						<div class="as-port-control dslc-col dslc-12-col dslc-last-col">
							<a href="javascript:void(0);" class="prev" data-ajax="1" data-id="59">
								<span class="dslc-icon dslc-icon-angle-left"></span><span class="as-btn-text-ajax-prj"><?php _e('Prev','as')?></span>
							</a> 
							<a href="javascript:void(0);" class="close-port">
								<span class="dslc-icon dslc-icon-remove"></span>
							</a> 
							<a href="javascript:void(0);" class="next" data-ajax="1" data-id="57">
								<span class="as-btn-text-ajax-prj"><?php _e('Next','as')?></span><span class="dslc-icon dslc-icon-angle-right"></span>
							</a>
						</div>
					</div>
					<div class="as-port-content">
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<!-- PRINT PROJECTS DATA / END -->
		<?php } ?>
		
		<?php
		
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

										$post_cats = get_the_terms( get_the_ID(), 'dslc_projects_cats' );
										if ( ! empty( $post_cats ) ) {
											foreach( $post_cats as $post_cat ) {
												$cats_array[$post_cat->slug] = $post_cat->name;
											}
										}

									}

								}
								$duration_hover = '';
				                $value_duration = $options['css_filters_duration_hover'];
				                if ( $value_duration != '' ){
				                    $duration_hover = 'style="-webkit-transition: all '. $value_duration .'ms ease;-moz-transition: all '. $value_duration .'ms ease;-ms-transition: all '. $value_duration .'ms ease;-o-transition: all '. $value_duration .'ms ease;transition: all '. $value_duration .'ms ease;"';
				                }
								?>

									<div class="dslc-post-filters">

										<span class="dslc-post-filter as-isotope-filter dslc-active" data-id=" " <?php echo $duration_hover; ?>><?php _e( 'All', 'Post Filter', 'dslc_string' ); ?></span>

										<?php foreach ( $cats_array as $cat_slug => $cat_name ) : ?>
											<span class="dslc-post-filter as-isotope-filter dslc-inactive" data-id="<?php echo $cat_slug; ?>" <?php echo $duration_hover; ?>><?php echo $cat_name; ?></span>
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
		 	
			if ( $dslc_query->have_posts() ) :

				?>
				
				<div class="<?php echo $container_class; ?>">
				
				<?php

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

						$project_cats_count = 0;
						$project_cats = get_the_terms( get_the_ID(), 'dslc_projects_cats' );

						$project_cats_data = '';
						if ( ! empty( $project_cats ) ) {
							foreach( $project_cats as $project_cat ) {
								$project_cats_data .= $project_cat->slug . ' ';
							}
						}

						// Project URL
						$the_project_url = get_permalink();
						if ( $options['link'] == 'custom' ) {
							if ( get_post_meta( get_the_ID(), 'dslc_project_url', true ) )
								$the_project_url = get_post_meta( get_the_ID(), 'dslc_project_url', true );
							else
								$the_project_url = '#';
						}
						// Project URL target
						$the_project_url_target = $options['link_target'];	
															?>
						<div class="<?php echo $element_class . $columns_class . $extra_class; ?> <?php echo $project_cats_data; ?>" data-cats="<?php echo $project_cats_data; ?>">
							<?php if ($post_elements == 'all' || in_array('thumbnail', $post_elements)) : ?>
								<?php
								/**
								 * Manual Resize
								 */
								$manual_resize = false;
								if (isset($options['thumb_resize_height']) && !empty($options['thumb_resize_height']) || isset($options['thumb_resize_width_manual']) && !empty($options['thumb_resize_width_manual']))
								{
									$manual_resize = true;
									$thumb_url     = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
									$thumb_url     = $thumb_url[0];
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

									<?php 
										$animation_hover_option = ''; 
										if ( $options['main_animation_hover'] != 'none' ) {
											$animation_hover_option = $options['main_animation_hover'];
										}else{
											$animation_hover_option = '';
										}

									?>

									<div class="dslc-post-thumb dslc-project-thumb dslc-on-hover-anim <?php echo $animation_hover_option;?>">
										<div class="dslc-project-thumb-inner dslca-post-thumb">
											<?php if ( $manual_resize ) : ?>
												<a data-id="<?php echo get_the_ID(); ?>" data-ajax="<?php echo isset($options['as_ajax_projects']) && $options['as_ajax_projects'] ? '1' : '0'; ?>" href="<?php echo $the_project_url; ?>" target="<?php echo $the_project_url_target; ?>"><img src="<?php $res_img = dslc_aq_resize( $thumb_url, $resize_width, $resize_height, true ); echo $res_img; ?>" alt="<?php echo $thumb_alt; ?>" /></a>
											<?php else : ?>
												<a data-id="<?php echo get_the_ID(); ?>" data-ajax="<?php echo isset($options['as_ajax_projects']) && $options['as_ajax_projects'] ? '1' : '0'; ?>" href="<?php echo $the_project_url; ?>" target="<?php echo $the_project_url_target; ?>"><?php the_post_thumbnail( 'full' ); ?></a>
											<?php endif; ?>
										</div><!-- .dslc-project-thumb-inner -->

										<?php if ( ( $options['main_location'] == 'inside' || $options['main_location'] == 'inside_visible' ) && ( $post_elements == 'all' || in_array( 'title', $post_elements ) || in_array( 'categories', $post_elements ) || in_array( 'excerpt', $post_elements ) || in_array( 'button', $post_elements ) ) ) : ?>

											<div class="dslc-project-main <?php if ( $options['main_location'] == 'inside_visible' ) echo 'dslc-project-main-visible'; ?> dslc-on-hover-anim-target">

												<div class="dslc-project-main-inner dslc-init-<?php echo $options['main_position']; ?>">
													<?php if ($post_elements == 'all' || in_array('title', $post_elements)) : ?>
														<div class="dslc-project-title">
															<h2><a data-ajax="<?php echo isset($options['as_ajax_projects']) && $options['as_ajax_projects'] ? '1' : '0'; ?>" data-id="<?php echo get_the_ID(); ?>" href="<?php echo $the_project_url; ?>" target="<?php echo $the_project_url_target; ?>"><?php the_title(); ?></a></h2>
														</div><!-- .dslc-project-title -->
													<?php endif; ?>

													<?php if ( $post_elements == 'all' || in_array( 'categories', $post_elements ) ) : ?>

														<?php if ( ! empty( $project_cats ) ) : ?>
															<div class="dslc-project-cats">
																<?php
																	foreach ( $project_cats as $project_cat ) {
																		$project_cats_count++;
																		if ( $project_cats_count > 1 ) { echo ', '; }
																		echo $project_cat->name;
																	}
																?>
															</div><!-- .dslc-project-cats -->
														<?php endif; ?>
														<?php endif; ?>
														<?php if ($post_elements == 'all' || in_array('excerpt', $post_elements)) : ?>
														<div class="dslc-project-excerpt">
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
														</div><!-- .dslc-project-excerpt -->
							<?php endif; ?>
															<?php if ($post_elements == 'all' || in_array('button', $post_elements)) : ?>
														<div class="dslc-project-read-more">
															<a data-ajax="<?php echo isset($options['as_ajax_projects']) && $options['as_ajax_projects'] ? '1' : '0'; ?>" href="<?php echo $the_project_url; ?>" target="<?php echo $the_project_url_target; ?>">
																<?php if ( isset( $options['button_icon_id'] ) && $options['button_icon_id'] != '' ) : ?>
																	<span class="dslc-icon dslc-icon-<?php echo $options['button_icon_id']; ?>"></span>
																<?php endif; ?>
																<?php echo $options['button_text']; ?>
															</a>
														</div><!-- .dslc-project-read-more -->

													<?php endif; ?>

												</div><!-- .dslc-init-center -->

											</div><!-- .dslc-project-main -->

										<?php endif; ?>

									</div><!-- .dslc-project-thumb -->

								<?php endif; ?>

							<?php endif; ?>

							<?php if ( $options['main_location'] == 'bellow' && ( $post_elements == 'all' || in_array( 'title', $post_elements ) || in_array( 'categories', $post_elements ) || in_array( 'excerpt', $post_elements ) || in_array( 'button', $post_elements ) ) ) : ?>

								<div class="dslc-post-main dslc-project-main">

									<?php if ( $post_elements == 'all' || in_array( 'title', $post_elements ) ) : ?>

										<div class="dslc-project-title">
											<h2><a data-id="<?php echo get_the_ID(); ?>" href="<?php echo $the_project_url; ?>" data-ajax="<?php echo isset($options['as_ajax_projects']) && $options['as_ajax_projects'] ? '1' : '0'; ?>"  target="<?php echo $the_project_url_target; ?>"><?php the_title(); ?></a></h2>
										</div><!-- .dslc-project-title -->

									<?php endif; ?>

									<?php if ( $post_elements == 'all' || in_array( 'categories', $post_elements ) ) : ?>

										<?php if ( ! empty( $project_cats ) ) : ?>
											<div class="dslc-project-cats">
												<?php
													foreach ( $project_cats as $project_cat ) {
														$project_cats_count++;
														if ( $project_cats_count > 1 ) { echo ', '; }
														echo $project_cat->name;
													}
												?>
											</div><!-- .dslc-project-cats -->
										<?php endif; ?>

									<?php endif; ?>

									<?php if ( $post_elements == 'all' || in_array( 'excerpt', $post_elements ) ) : ?>

										<div class="dslc-project-excerpt">
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
										</div><!-- .dslc-project-excerpt -->

									<?php endif; ?>

									<?php if ( $post_elements == 'all' || in_array( 'button', $post_elements ) ) : ?>

										<div class="dslc-project-read-more">
											<a href="<?php echo $the_project_url; ?>" data-ajax="<?php echo isset($options['as_ajax_projects']) && $options['as_ajax_projects'] ? '1' : '0'; ?>" target="<?php echo $the_project_url_target; ?>">
												<?php if ( isset( $options['button_icon_id'] ) && $options['button_icon_id'] != '' ) : ?>
													<span class="dslc-icon dslc-icon-<?php echo $options['button_icon_id']; ?>"></span>
												<?php endif; ?>
												<?php echo $options['button_text']; ?>
											</a>
										</div><!-- .dslc-project-read-more -->

									<?php endif; ?>

								</div><!-- .dslc-project-main -->

							<?php endif; ?>

						</div><!-- .dslc-project -->
						<?php
						// Row Separator
						/*if ($options['type'] == 'grid' && $count == 0 && $real_count != $dslc_query->found_posts && $real_count != $options['amount'] && $options['separator_enabled'] == 'enabled')
						{
							echo '<div class="dslc-post-separator"></div>';
						}*/
					endwhile;
					if ($options['type'] == 'carousel') :
						?></div><?php
					endif;
					?>
			</div><!-- .dslc-projects -->
			<?php
		else :
			if ($dslc_is_admin) :
					?><div class="dslc-notification dslc-red"><?php _e( 'You do not have any projects at the moment. Go to <strong>WP Admin &rarr; Projects</strong> to add some.', 'dslc_string' ); ?> <span class="dslca-refresh-module-hook dslc-icon dslc-icon-refresh"></span></span></div><?php
			endif;
		endif;
		/**
		 * Pagination
		 */
		if (isset($options['pagination_type']) && $options['pagination_type'] != 'disabled')
		{
			$num_pages = $dslc_query->max_num_pages;
			dslc_post_pagination(array('pages' => $num_pages, 'type' => $options['pagination_type']));
		}
		wp_reset_query();
			
		?>
		<?php if( $options['as_ajax_projects'] == 1 && $options['as_ajax_projects_position'] == 'bottom' ){ ?>
			<!-- PRINT PROJECTS DATA -->
			<div id="as_portfolio_content" style="display:none;">
				<div class="as-wrapper clearfix">
					<div class="as-portfolio-ajax-wrapper">
						<div class="as-port-control dslc-col dslc-12-col dslc-last-col">
							<a href="javascript:void(0);" class="prev" data-ajax="1" data-id="59">
								<span class="dslc-icon dslc-icon-angle-left"></span><span class="as-btn-text-ajax-prj"><?php _e('Prev','as')?></span>
							</a> 
							<a href="javascript:void(0);" class="close-port">
								<span class="dslc-icon dslc-icon-remove"></span>
							</a> 
							<a href="javascript:void(0);" class="next" data-ajax="1" data-id="57">
								<span class="as-btn-text-ajax-prj"><?php _e('Next','as')?></span><span class="dslc-icon dslc-icon-angle-right"></span>
							</a>
						</div>
					</div>
					<div class="as-port-content">
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<!-- PRINT PROJECTS DATA / END -->
		<?php } ?>
		<?php
			
		/* Module output ends here */
		$this->module_end($options);
	}
}
