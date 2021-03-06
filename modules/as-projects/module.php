<?php
if (dslc_is_module_active('asex_Projects'))
    include ASEX_ABS . '/modules/as-projects/functions.php';

class ASEX_Projects extends ASEX_MODULE
{

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct()
    {

        $this->module_id       = 'ASEX_Projects';
        $this->module_title    = __('AS - Projects', 'asex');
        $this->module_icon     = 'th';
        $this->module_category = 'as - posts';
        add_action('wp_ajax_asex_load_project', array($this, 'asex_load_project'));
    }

    public function asex_load_project()
    {
        $data              = $_REQUEST['content'];
        $project           = get_post($data['id']);
        $project_permalink = get_permalink($project->ID);
        $project_url       = get_post_meta($project->ID, 'dslc_project_url', true);
        $project_url_text  = get_post_meta($project->ID, 'dslc_project_url_text', true);
        $project_name      = get_post_meta($project->ID, 'dslc_project_name', true);
        $cats              = array();
        $terms             = get_the_terms($project->ID, 'dslc_projects_cats');
        if (!empty($terms))
        {
            foreach ($terms as $term)
            {
                $cats[] = $term->name;
            }
        }
        $dslc_projects_cats = join(', ', $cats);
        $fb_share           = '<li><a class="as-port-ajax-social-facebook" href="http://www.facebook.com/sharer/sharer.php?u=' . $project_permalink . '" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=660\');return false;" target="_blank"><span class="dslc-icon dslc-icon-facebook"></span></a></li>';
        $twitter_share      = '<li><a class="as-port-ajax-social-twitter" href="http://twitter.com/share?url=' . $project_permalink . '&amp;lang=en&amp;text=Check%20out%20this%20awesome%20project:&amp;" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=620\');return false;" data-count="none" data-via=" "><span class="dslc-icon dslc-icon-twitter"></span></a></li>';
        $google_share       = '<li><a class="as-port-ajax-social-google" href="https://plus.google.com/share?url=' . $project_permalink . '" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=500\');return false;"><span class="dslc-icon dslc-icon-google-plus"></span></a></li>';
        $btn_get            = '<a href="' . $project_url . '" class="as-get-in-touch-prj-ajax">' . __('Visit Project', 'asex') . '</a>';


        $html     = '<div class="as-mask-color-port">
					<svg class="as-preloading-port" width="80" height="80" viewbox="0 0 80 80">
	                    <polygon points="0 0 0 80 80 80 80 0" class="rect" />
	                </svg>
				</div>
				<div class="as-title-port-ajax-wrapper dslc-col dslc-12-col dslc-last-col">
					<h1 class="as-port-ajax-title">' . $project->post_title . '</h1>
					<span class="as-port-ajax-category">' . $dslc_projects_cats . '</span>
				</div>
				<div class="as-port-ajax-data">
					<div class="dslc-col dslc-6-col port-thumb">
						<div class="as-port-ajax-thumbnail-img">
							' . get_the_post_thumbnail($project->ID, 'full') . '
						</div>
					</div>
					<div class="dslc-col dslc-6-col dslc-last-col as-port-ajax-excerpt">
						<div class="as-ajax-info-wrapper">
							' . apply_filters('the_content', $project->post_content) . '
							<div class="clearfix"></div>
							<div class="as-info-project-meta">
								<div class="as-info-client">
									<span class="dslc-icon dslc-icon-user"></span>&nbsp;&nbsp;<span class="as-info-sum">Client:</span>&nbsp; <span>' . $project_name . '</span>
								</div>
								<div class="as-info-url">
									
									<span class="dslc-icon dslc-icon-link"></span>&nbsp;&nbsp;<span class="as-info-sum">URL Project:</span>&nbsp; <a href="' . $project_url . '" target="_blank">' . $project_url_text . '</a>
								</div>
							</div>
							<div class="as-port-ajax-social-share">
								' . $btn_get . '
								<ul class="as-port-ajax-list-social">
									' . $fb_share . '
									' . $twitter_share . '
									' . $google_share . '
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>';
        $response = array(
            'success'   => true,
            'html'      => $html,
            'prev_post' => $this->asex_get_next_previous_port_id($project->ID, 'next'),
            'next_post' => $this->asex_get_next_previous_port_id($project->ID, 'prev'),
        );
        wp_send_json($response);
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
                'label'   => __('Link', 'asex'),
                'id'      => 'link',
                'std'     => 'permalink',
                'type'    => 'select',
                'help'    => __('<strong>Link to project page</strong> links to the project page on this website.<br><strong>Link to custom project URL</strong> links to the URL set in the project options.', 'asex'),
                'choices' => array(
                    array(
                        'label' => __('Link to project page', 'asex'),
                        'value' => 'permalink'
                    ),
                    array(
                        'label' => __('Link to custom project URL', 'asex'),
                        'value' => 'custom'
                    ),
                )
            ),
            array(
                'label'   => __('Link Target', 'asex'),
                'id'      => 'link_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Same tab', 'asex'),
                        'value' => '_self'
                    ),
                    array(
                        'label' => __('New tab', 'asex'),
                        'value' => '_blank'
                    ),
                )
            ),
            array(
                'label'   => __('Type', 'asex'),
                'id'      => 'type',
                'std'     => 'grid',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Grid', 'asex'),
                        'value' => 'grid'
                    ),
                    array(
                        'label' => __('Masonry Grid', 'asex'),
                        'value' => 'masonry'
                    ),
                    array(
                        'label' => __('Carousel', 'asex'),
                        'value' => 'carousel'
                    )
                )
            ),
            array(
                'label' => __('Posts Per Page', 'asex'),
                'id'    => 'amount',
                'std'   => '8',
                'type'  => 'text',
            ),
            array(
                'label'   => __('Pagination', 'asex'),
                'id'      => 'pagination_type',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'asex'),
                        'value' => 'disabled',
                    ),
                    array(
                        'label' => __('Numbered', 'asex'),
                        'value' => 'numbered',
                    ),
                    array(
                        'label' => __('Prev/Next', 'asex'),
                        'value' => 'prevnext',
                    )
                ),
            ),
            array(
                'label'   => __('Posts Per Row', 'asex'),
                'id'      => 'columns',
                'std'     => '3',
                'type'    => 'select',
                'choices' => $this->shared_options('posts_per_row_choices'),
            ),
            array(
                'label'   => __('Categories', 'asex'),
                'id'      => 'categories',
                'std'     => '',
                'type'    => 'checkbox',
                'choices' => $cats_choices
            ),
            array(
                'label'   => __('Categories Operator', 'asex'),
                'id'      => 'categories_operator',
                'std'     => 'IN',
                'help'    => __('<strong>IN</strong> - Posts must be in at least one chosen category.<br><strong>AND</strong> - Posts must be in all chosen categories.<br><strong>NOT IN</strong> Posts must not be in the chosen categories.', 'asex'),
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('IN', 'asex'),
                        'value' => 'IN',
                    ),
                    array(
                        'label' => __('AND', 'asex'),
                        'value' => 'AND',
                    ),
                    array(
                        'label' => __('NOT IN', 'asex'),
                        'value' => 'NOT IN',
                    ),
                )
            ),
            array(
                'label'   => __('Order By', 'asex'),
                'id'      => 'orderby',
                'std'     => 'date',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Publish Date', 'asex'),
                        'value' => 'date'
                    ),
                    array(
                        'label' => __('Modified Date', 'asex'),
                        'value' => 'modified'
                    ),
                    array(
                        'label' => __('Random', 'asex'),
                        'value' => 'rand'
                    ),
                    array(
                        'label' => __('Alphabetic', 'asex'),
                        'value' => 'title'
                    ),
                    array(
                        'label' => __('Comment Count', 'asex'),
                        'value' => 'comment_count'
                    ),
                )
            ),
            array(
                'label'   => __('Order', 'asex'),
                'id'      => 'order',
                'std'     => 'DESC',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Ascending', 'asex'),
                        'value' => 'ASC'
                    ),
                    array(
                        'label' => __('Descending', 'asex'),
                        'value' => 'DESC'
                    )
                )
            ),
            array(
                'label' => __('Offset', 'asex'),
                'id'    => 'offset',
                'std'   => '0',
                'type'  => 'text',
            ),
            array(
                'label' => __('Include (IDs)', 'asex'),
                'id'    => 'query_post_in',
                'std'   => '',
                'type'  => 'text',
            ),
            array(
                'label' => __('Exclude (IDs)', 'asex'),
                'id'    => 'query_post_not_in',
                'std'   => '',
                'type'  => 'text',
            ),
            /**
             * General
             */
            array(
                'label'   => __('Elements', 'asex'),
                'id'      => 'elements',
                'std'     => '',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Heading', 'asex'),
                        'value' => 'main_heading'
                    ),
                    array(
                        'label' => __('Filters', 'asex'),
                        'value' => 'filters'
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'   => __('Post Elements', 'asex'),
                'id'      => 'post_elements',
                'std'     => 'thumbnail categories title icon_link',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Thumbnail', 'asex'),
                        'value' => 'thumbnail',
                    ),
                    array(
                        'label' => __('Title', 'asex'),
                        'value' => 'title',
                    ),
                    array(
                        'label' => __('Categories', 'asex'),
                        'value' => 'categories',
                    ),
                    array(
                        'label' => __('Icon', 'asex'),
                        'value' => 'icon_link',
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'   => __('Carousel Elements', 'asex'),
                'id'      => 'carousel_elements',
                'std'     => 'arrows circles',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Arrows', 'asex'),
                        'value' => 'arrows'
                    ),
                    array(
                        'label' => __('Circles', 'asex'),
                        'value' => 'circles'
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-projects',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'max'                   => 500,
                'increment'             => 1,
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-projects',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
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
                'label'                 => __('Item Margin Bottom', 'asex'),
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
                'label'   => __('Enable/Disable', 'asex'),
                'id'      => 'separator_enabled',
                'std'     => 'enabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Enabled', 'asex'),
                        'value' => 'enabled'
                    ),
                    array(
                        'label' => __('Disabled', 'asex'),
                        'value' => 'disabled'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Row Separator', 'asex'),
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_sep_border_color',
                'std'                   => '#ededed',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-post-separator',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Row Separator', 'asex'),
            ),
            array(
                'label'                 => __('Height', 'asex'),
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
                'tab'                   => __('Row Separator', 'asex'),
            ),
            array(
                'label'                 => __('Style', 'asex'),
                'id'                    => 'css_sep_style',
                'std'                   => 'dashed',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Invisible', 'asex'),
                        'value' => 'none'
                    ),
                    array(
                        'label' => __('Solid', 'asex'),
                        'value' => 'solid'
                    ),
                    array(
                        'label' => __('Dashed', 'asex'),
                        'value' => 'dashed'
                    ),
                    array(
                        'label' => __('Dotted', 'asex'),
                        'value' => 'dotted'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-post-separator',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Row Separator', 'asex'),
            ),
            /**
             * Thumbnail
             */
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'css_thumbnail_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'asex'),
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_thumb_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb-inner',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'asex'),
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_thumb_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb-inner',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Thumbnail', 'asex'),
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'css_thumb_border_trbl',
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
                'affect_on_change_el'   => '.dslc-project-thumb-inner',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'asex'),
            ),
            array(
                'label'                 => __('Border Radius - Top', 'asex'),
                'id'                    => 'css_thumbnail_border_radius_top',
                'std'                   => '',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb-inner, .dslc-project-thumb img',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'asex'),
                'id'                    => 'css_thumbnail_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb-inner, .dslc-project-thumb img',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_thumbnail_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Thumbnail', 'asex'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'asex'),
                'id'                    => 'css_thumbnail_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb-inner',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Thumbnail', 'asex'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'asex'),
                'id'                    => 'css_thumbnail_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb-inner',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Thumbnail', 'asex'),
            ),
            array(
                'label'   => __('Resize - Height', 'asex'),
                'id'      => 'thumb_resize_height',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('thumbnail', 'asex'),
            ),
            array(
                'label'   => __('Resize - Width', 'asex'),
                'id'      => 'thumb_resize_width_manual',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('thumbnail', 'asex'),
            ),
            array(
                'label'      => __('Resize - Width', 'asex'),
                'id'         => 'thumb_resize_width',
                'std'        => '',
                'type'       => 'text',
                'section'    => 'styling',
                'tab'        => __('thumbnail', 'asex'),
                'visibility' => 'hidden'
            ),
            array(
                'label'                 => __('Width', 'asex'),
                'id'                    => 'thumb_width',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-post-thumb',
                'affect_on_change_rule' => 'width',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'asex'),
                'min'                   => 1,
                'max'                   => 100,
                'ext'                   => '%'
            ),
            /**
             * Main
             */
            array(
                'label'                 => __(' BG Color', 'asex'),
                'id'                    => 'css_main_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-main',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Main', 'asex'),
            ),
            array(
                'label'                 => __(' BG Color - Hover', 'asex'),
                'id'                    => 'css_main_bg_color_hover',
                'std'                   => 'rgba(40, 43, 48, 0.8)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-main:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Main', 'asex'),
            ),
            array(
                'label'             => __('Duration when hover(ms)', 'asex'),
                'id'                => 'css_main_bg_color_duration_hover',
                'std'               => '300',
                'type'              => 'text',
                'refresh_on_change' => true,
                'section'           => 'styling',
                'tab'               => __('Main', 'asex'),
            ),
            array(
                'label'                 => __('Border Color', 'asex'),
                'id'                    => 'css_main_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-main',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Main', 'asex'),
            ),
            array(
                'label'                 => __('Border Width', 'asex'),
                'id'                    => 'css_main_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-main',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Main', 'asex'),
            ),
            array(
                'label'                 => __('Borders', 'asex'),
                'id'                    => 'css_main_border_trbl',
                'std'                   => 'right bottom left',
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
                'affect_on_change_el'   => '.dslc-project-main',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Main', 'asex'),
            ),
            array(
                'label'                 => __('Border Radius - Top', 'asex'),
                'id'                    => 'css_main_border_radius_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-main',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'tab'                   => __('Main', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'asex'),
                'id'                    => 'css_main_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-main',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'tab'                   => __('Main', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Minimum Height', 'asex'),
                'id'                    => 'css_main_min_height',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-main',
                'affect_on_change_rule' => 'min-height',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Main', 'asex'),
                'min'                   => 0,
                'max'                   => 500
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_title_color',
                'std'                   => '#fff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title h2 a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
            ),
            array(
                'label'                 => __('Color - Hover', 'asex'),
                'id'                    => 'css_title_color_hover',
                'std'                   => '#00b9cf',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title h2:hover a,.dslc-project-title h2 a:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'css_title_font_size',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title h2,.dslc-project-title h2 a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'css_title_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title h2,.dslc-project-title h2 a',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Weight tag Span', 'asex'),
                'id'                    => 'css_title_font_weight_span',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title h2 span,.dslc-project-title h2 a span',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'css_title_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title h2,.dslc-project-title h2 a',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'css_title_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title h2,.dslc-project-title h2 a',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'css_title_letter_spacing',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title h2,.dslc-project-title h2 a',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Text Transform', 'asex'),
                'id'                    => 'css_title_text_transform',
                'std'                   => 'none',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('None', 'asex'),
                        'value' => 'none'
                    ),
                    array(
                        'label' => __('Capitalize', 'asex'),
                        'value' => 'capitalize'
                    ),
                    array(
                        'label' => __('Uppercase', 'asex'),
                        'value' => 'uppercase'
                    ),
                    array(
                        'label' => __('Lowercase', 'asex'),
                        'value' => 'lowercase'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title h2',
                'affect_on_change_rule' => 'text-transform',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_title_margin_bottom',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Title', 'asex'),
                'ext'                   => 'px'
            ),
            /**
             * Categories
             */
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_cats_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-cats',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Categories', 'asex'),
            ),
            array(
                'label'                 => __('Font Size', 'asex'),
                'id'                    => 'css_cats_font_size',
                'std'                   => '14',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-cats',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Categories', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'asex'),
                'id'                    => 'css_cats_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-cats',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Categories', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'asex'),
                'id'                    => 'css_cats_font_family',
                'std'                   => 'Bitter',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-cats',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Categories', 'asex'),
            ),
            array(
                'label'                 => __('Line Height', 'asex'),
                'id'                    => 'css_cats_line_height',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-cats',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Categories', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_cats_margin-bottom',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-cats',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Categories', 'asex'),
            ),
            /**
             * Icon
             */
            array(
                'label'                 => __('BG Color', 'asex'),
                'id'                    => 'css_button_bg_color',
                'std'                   => '#333333',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-project-custom .as-zoom-img-project,.as-project-custom .as-link-to-project',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('BG Color - Hover', 'asex'),
                'id'                    => 'css_button_bg_color_hover',
                'std'                   => '#00b9cf',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-project-custom .as-zoom-img-project:hover,.as-project-custom .as-link-to-project:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('Border Radius', 'asex'),
                'id'                    => 'css_button_border_radius',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-project-custom .as-zoom-img-project,.as-project-custom .as-link-to-project',
                'affect_on_change_rule' => 'border-radius',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Color', 'asex'),
                'id'                    => 'css_button_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-project-custom .as-zoom-img-project,.as-project-custom .as-link-to-project',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            array(
                'label'                 => __('Color - Hover', 'asex'),
                'id'                    => 'css_button_color_hover',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-project-custom .as-zoom-img-project:hover,.as-project-custom .as-link-to-project:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Icon', 'asex'),
            ),
            /**
             * Ajax Portfolio Style
             */
            array(
                'label'   => __('Ajax Projects', 'asex'),
                'id'      => 'asex_ajax_projects',
                'std'     => 1,
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Use Ajax Portfolio', 'asex'),
                        'value' => 1
                    ),
                    array(
                        'label' => __('Normal Link', 'asex'),
                        'value' => 0
                    )
                ),
                'section' => 'styling',
                'tab'     => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'   => __('Position Ajax Projects', 'asex'),
                'id'      => 'asex_ajax_projects_position',
                'std'     => 'bottom',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Top', 'asex'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Bottom', 'asex'),
                        'value' => 'bottom'
                    )
                ),
                'section' => 'styling',
                'tab'     => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Ajax Content Margin Bottom', 'asex'),
                'id'                    => 'asex_ajax_projects_margin_bottom',
                'std'                   => '35',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#asex_portfolio_content',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            /** Navigation Ajax Style * */
            array(
                'label'                 => __('Color of Navigation', 'asex'),
                'id'                    => 'asex_ajax_projects_nav_color',
                'std'                   => 'rgb(44, 62, 79)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-portfolio-ajax-wrapper .as-port-control span.as-btn-text-ajax-prj',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Font Family of Nav', 'asex'),
                'id'                    => 'asex_ajax_projects_nav_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-portfolio-ajax-wrapper .as-port-control span.as-btn-text-ajax-prj',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Font Weight of Nav', 'asex'),
                'id'                    => 'asex_ajax_projects_nav_font_weight',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-portfolio-ajax-wrapper .as-port-control span.as-btn-text-ajax-prj',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Size of Nav', 'asex'),
                'id'                    => 'asex_ajax_projects_nav_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-portfolio-ajax-wrapper .as-port-control span.as-btn-text-ajax-prj',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Nav Margin Bottom', 'asex'),
                'id'                    => 'asex_ajax_projects_nav_margin_bottom',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-portfolio-ajax-wrapper .as-port-control',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            /** Title Ajax Style * */
            array(
                'label'                 => __('Color of Title', 'asex'),
                'id'                    => 'asex_ajax_projects_title_color',
                'std'                   => 'rgb(89, 89, 89)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Font Family of Title', 'asex'),
                'id'                    => 'asex_ajax_projects_title_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Line Height of Title', 'asex'),
                'id'                    => 'asex_ajax_projects_title_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight of Title', 'asex'),
                'id'                    => 'asex_ajax_projects_title_font_weight',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Size of Title', 'asex'),
                'id'                    => 'asex_ajax_projects_title_font_size',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Text Transform', 'asex'),
                'id'                    => 'asex_ajax_projects_title_text_transform',
                'std'                   => 'uppercase',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('None', 'asex'),
                        'value' => 'none'
                    ),
                    array(
                        'label' => __('Capitalize', 'asex'),
                        'value' => 'capitalize'
                    ),
                    array(
                        'label' => __('Uppercase', 'asex'),
                        'value' => 'uppercase'
                    ),
                    array(
                        'label' => __('Lowercase', 'asex'),
                        'value' => 'lowercase'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
                'affect_on_change_rule' => 'text-transform',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'asex_ajax_projects_title_letter_spacing',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title Margin Bottom', 'asex'),
                'id'                    => 'asex_ajax_projects_title_margin_bottom',
                'std'                   => '35',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title Align', 'asex'),
                'id'                    => 'asex_ajax_projects_title_text_align',
                'std'                   => 'center',
                'type'                  => 'select',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'choices'               => array(
                    array(
                        'label' => __('Left', 'asex'),
                        'value' => 'left',
                    ),
                    array(
                        'label' => __('Center', 'asex'),
                        'value' => 'center',
                    ),
                    array(
                        'label' => __('Right', 'asex'),
                        'value' => 'right',
                    ),
                    array(
                        'label' => __('Justify', 'asex'),
                        'value' => 'justify',
                    ),
                )
            ),
            /** Category Ajax Style * */
            array(
                'label'                 => __('Color of Category', 'asex'),
                'id'                    => 'asex_ajax_projects_category_color',
                'std'                   => 'rgb(131, 131, 131)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Font Family of Category', 'asex'),
                'id'                    => 'asex_ajax_projects_category_font_family',
                'std'                   => 'Bitter',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Line Height of Category', 'asex'),
                'id'                    => 'asex_ajax_projects_category_line_height',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight of Category', 'asex'),
                'id'                    => 'asex_ajax_projects_category_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Size of Category', 'asex'),
                'id'                    => 'asex_ajax_projects_category_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Text Transform', 'asex'),
                'id'                    => 'asex_ajax_projects_category_text_transform',
                'std'                   => 'uppercase',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('None', 'asex'),
                        'value' => 'none'
                    ),
                    array(
                        'label' => __('Capitalize', 'asex'),
                        'value' => 'capitalize'
                    ),
                    array(
                        'label' => __('Uppercase', 'asex'),
                        'value' => 'uppercase'
                    ),
                    array(
                        'label' => __('Lowercase', 'asex'),
                        'value' => 'lowercase'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
                'affect_on_change_rule' => 'text-transform',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Letter Spacing', 'asex'),
                'id'                    => 'asex_ajax_projects_category_letter_spacing',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Category Margin Bottom', 'asex'),
                'id'                    => 'asex_ajax_projects_category_margin_bottom .as-port-ajax-category',
                'std'                   => '35',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-title-port-ajax-wrapper .as-port-ajax-category',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            /** Excerpt Ajax Style * */
            array(
                'label'                 => __('BG Color of Content', 'asex'),
                'id'                    => 'asex_ajax_content_bg_color',
                'std'                   => '#f5f5f5',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-port-ajax-data .as-ajax-info-wrapper',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Padding Content Vertical', 'asex'),
                'id'                    => 'asex_ajax_content_padding_vertical_test',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-port-ajax-data .as-ajax-info-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'ext'                   => 'px',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Padding Content Horizontal', 'asex'),
                'id'                    => 'asex_ajax_content_padding_horizontal',
                'std'                   => '30',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-port-ajax-data .as-ajax-info-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'ext'                   => 'px',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Color of Excerpt', 'asex'),
                'id'                    => 'asex_ajax_projects_excerpt_color',
                'std'                   => 'rgb(76, 76, 76)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Font Family of Excerpt', 'asex'),
                'id'                    => 'asex_ajax_projects_excerpt_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Line Height of Excerpt', 'asex'),
                'id'                    => 'asex_ajax_projects_excerpt_line_height',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight of Excerpt', 'asex'),
                'id'                    => 'asex_ajax_projects_excerpt_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Size of Excerpt', 'asex'),
                'id'                    => 'asex_ajax_projects_excerpt_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Text Transform Excerpt', 'asex'),
                'id'                    => 'asex_ajax_projects_excerpt_text_transform',
                'std'                   => 'none',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('None', 'asex'),
                        'value' => 'none'
                    ),
                    array(
                        'label' => __('Capitalize', 'asex'),
                        'value' => 'capitalize'
                    ),
                    array(
                        'label' => __('Uppercase', 'asex'),
                        'value' => 'uppercase'
                    ),
                    array(
                        'label' => __('Lowercase', 'asex'),
                        'value' => 'lowercase'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
                'affect_on_change_rule' => 'text-transform',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
            ),
            array(
                'label'                 => __('Letter Spacing Excerpt', 'asex'),
                'id'                    => 'asex_ajax_projects_excerpt_letter_spacing',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-port-ajax-data .as-port-ajax-excerpt',
                'affect_on_change_rule' => 'letter-spacing',
                'section'               => 'styling',
                'tab'                   => __('Ajax Portfolio', 'asex'),
                'ext'                   => 'px'
            ),
            /**
             * Filters
             */
            array(
                'label'                 => __('Background Color - Hover', 'asex'),
                'id'                    => 'css_filters_background_color_hover',
                'std'                   => 'rgb(248, 191, 59)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-post-filters .dslc-post-filter:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Filters', 'asex'),
            ),
            array(
                'label'                 => __('Color - Hover', 'asex'),
                'id'                    => 'css_filters_color_hover',
                'std'                   => 'rgb(248, 191, 59)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-post-filters .dslc-post-filter:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Filters', 'asex'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'asex'),
                'id'                    => 'css_filters_border_color_hover',
                'std'                   => 'rgb(248, 191, 59)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-post-filters .dslc-post-filter:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Filters', 'asex'),
            ),
            array(
                'label'             => __('Duration when hover(ms)', 'asex'),
                'id'                => 'css_filters_duration_hover',
                'std'               => '300',
                'type'              => 'text',
                'refresh_on_change' => true,
                'section'           => 'styling',
                'tab'               => __('Filters', 'asex'),
            ),
            array(
                'label'                 => __('Text Transform', 'asex'),
                'id'                    => 'css_filters_text_transform',
                'std'                   => 'none',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('None', 'asex'),
                        'value' => 'none'
                    ),
                    array(
                        'label' => __('Capitalize', 'asex'),
                        'value' => 'capitalize'
                    ),
                    array(
                        'label' => __('Uppercase', 'asex'),
                        'value' => 'uppercase'
                    ),
                    array(
                        'label' => __('Lowercase', 'asex'),
                        'value' => 'lowercase'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-post-filters .dslc-post-filter',
                'affect_on_change_rule' => 'text-transform',
                'section'               => 'styling',
                'tab'                   => __('Filters', 'asex'),
            ),
            /**
             * Responsive tablet
             */
            array(
                'label'   => __('Responsive Styling', 'asex'),
                'id'      => 'css_res_t',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'asex'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'asex'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('tablet', 'asex'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-projects',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Separator - Height', 'asex'),
                'id'                    => 'css_res_t_sep_height',
                'std'                   => '32',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-post-separator',
                'affect_on_change_rule' => 'margin-bottom,padding-bottom',
                'ext'                   => 'px',
                'min'                   => 1,
                'max'                   => 300,
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
            ),
            array(
                'label'                 => __('Thumbnail - Margin Bottom', 'asex'),
                'id'                    => 'css_res_t_thumbnail_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'asex'),
            ),
            array(
                'label'                 => __('Thumbnail - Padding Vertical', 'asex'),
                'id'                    => 'css_res_t_thumbnail_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb-inner',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'asex'),
            ),
            array(
                'label'                 => __('Thumbnail - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_t_thumbnail_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb-inner',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'asex'),
            ),
            array(
                'label'                 => __('Main - Padding Vertical', 'asex'),
                'id'                    => 'css_res_t_main_padding_vertical',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-main',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'asex'),
            ),
            array(
                'label'                 => __('Main - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_t_main_padding_horizontal',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-main',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'asex'),
            ),
            array(
                'label'                 => __('Title - Font Size', 'asex'),
                'id'                    => 'css_res_t_title_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title h2,.dslc-project-title h2 a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'asex'),
                'id'                    => 'css_res_t_title_line_height',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title h2,.dslc-project-title h2 a',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'asex'),
                'id'                    => 'css_res_t_title_margin_bottom',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Categories - Font Size', 'asex'),
                'id'                    => 'css_res_t_cats_font_size',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-cats',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Categories - Line Height', 'asex'),
                'id'                    => 'css_res_t_cats_line_height',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-cats',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Categories - Margin Bottom', 'asex'),
                'id'                    => 'css_res_t_cats_margin-bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-cats',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'asex'),
            ),
            array(
                'label'                 => __('Excerpt - Font Size', 'asex'),
                'id'                    => 'css_res_t_excerpt_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-excerpt',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Excerpt - Line Height', 'asex'),
                'id'                    => 'css_res_t_excerpt_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-excerpt, .dslc-project-excerpt p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Excerpt - Margin Bottom', 'asex'),
                'id'                    => 'css_res_t_excerpt_margin',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-excerpt',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'asex'),
            ),
            array(
                'label'                 => __('Button - Font Size', 'asex'),
                'id'                    => 'css_res_t_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-read-more a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Padding Vertical', 'asex'),
                'id'                    => 'css_res_t_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-read-more a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'asex'),
            ),
            array(
                'label'                 => __('Button - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_t_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-read-more a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'asex'),
            ),
            array(
                'label'                 => __('Button Icon - Margin Right', 'asex'),
                'id'                    => 'css_res_t_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-read-more a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'asex'),
            ),
            /**
             * Responsive Phone
             */
            array(
                'label'   => __('Responsive Styling', 'asex'),
                'id'      => 'css_res_p',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'asex'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'asex'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('phone', 'asex'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'asex'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-projects',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Separator - Height', 'asex'),
                'id'                    => 'css_res_p_sep_height',
                'std'                   => '32',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-post-separator',
                'affect_on_change_rule' => 'margin-bottom,padding-bottom',
                'ext'                   => 'px',
                'min'                   => 1,
                'max'                   => 300,
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
            ),
            array(
                'label'                 => __('Thumbnail - Margin Bottom', 'asex'),
                'id'                    => 'css_res_p_thumbnail_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'asex'),
            ),
            array(
                'label'                 => __('Thumbnail - Padding Vertical', 'asex'),
                'id'                    => 'css_res_p_thumbnail_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb-inner',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'asex'),
            ),
            array(
                'label'                 => __('Thumbnail - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_p_thumbnail_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-thumb-inner',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'asex'),
            ),
            array(
                'label'                 => __('Main - Padding Vertical', 'asex'),
                'id'                    => 'css_res_p_main_padding_vertical',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-main',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'asex'),
            ),
            array(
                'label'                 => __('Main - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_p_main_padding_horizontal',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-main',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'asex'),
            ),
            array(
                'label'                 => __('Title - Font Size', 'asex'),
                'id'                    => 'css_res_p_title_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title h2,.dslc-project-title h2 a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'asex'),
                'id'                    => 'css_res_p_title_line_height',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title h2,.dslc-project-title h2 a',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Margin Bottom', 'asex'),
                'id'                    => 'css_res_p_title_margin_bottom',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Categories - Font Size', 'asex'),
                'id'                    => 'css_res_p_cats_font_size',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-cats',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Categories - Line Height', 'asex'),
                'id'                    => 'css_res_p_cats_line_height',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-cats',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Categories - Margin Bottom', 'asex'),
                'id'                    => 'css_res_p_cats_margin-bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-cats',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'asex'),
            ),
            array(
                'label'                 => __('Excerpt - Font Size', 'asex'),
                'id'                    => 'css_res_p_excerpt_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-excerpt',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Excerpt - Line Height', 'asex'),
                'id'                    => 'css_res_p_excerpt_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-excerpt, .dslc-project-excerpt p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Excerpt - Margin Bottom', 'asex'),
                'id'                    => 'css_res_p_excerpt_margin',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-excerpt',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'asex'),
            ),
            array(
                'label'                 => __('Button - Font Size', 'asex'),
                'id'                    => 'css_res_p_button_font_size',
                'std'                   => '11',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-read-more a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'asex'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Button - Padding Vertical', 'asex'),
                'id'                    => 'css_res_p_button_padding_vertical',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-read-more a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'asex'),
            ),
            array(
                'label'                 => __('Button - Padding Horizontal', 'asex'),
                'id'                    => 'css_res_p_button_padding_horizontal',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-read-more a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'asex'),
            ),
            array(
                'label'                 => __('Button Icon - Margin Right', 'asex'),
                'id'                    => 'css_res_p_button_icon_margin',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-project-read-more a .dslc-icon',
                'affect_on_change_rule' => 'margin-right',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'asex'),
            ),
        );

        $dslc_options = array_merge($dslc_options, $this->shared_options('carousel_options'));
        $dslc_options = array_merge($dslc_options, $this->shared_options('heading_options'));
        $dslc_options = array_merge($dslc_options, $this->shared_options('filters_options'));
        $dslc_options = array_merge($dslc_options, $this->shared_options('carousel_arrows_options'));
        $dslc_options = array_merge($dslc_options, $this->shared_options('carousel_circles_options'));
        $dslc_options = array_merge($dslc_options, $this->shared_options('pagination_options'));
        $dslc_options = array_merge($dslc_options, $this->shared_options('animation_options'));
        $dslc_options = array_merge($dslc_options, $this->presets_options());

        return apply_filters('dslc_module_options', $dslc_options, $this->module_id);
    }

    function output($options)
    {

        global $dslc_active;
        if ($dslc_active && is_user_logged_in() && current_user_can(DS_LIVE_COMPOSER_CAPABILITY))
            $dslc_is_admin        = true;
        else
            $dslc_is_admin        = false;
        $options['module_id'] = $this->module_id;
        $this->module_start($options);
        /* Module output stars here */

        if (!isset($options['excerpt_length']))
            $options['excerpt_length'] = 20;
        if (!isset($options['type']))
            $options['type']           = 'grid';

        if (is_front_page())
        {
            $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
        }
        else
        {
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        }
        // Fix for offset braking pagination
        $query_offset = $options['offset'];
        if ($query_offset > 0 && $paged > 1)
            $query_offset = ( $paged - 1 ) * $options['amount'] + $options['offset'];
        $args         = array(
            'paged'          => $paged,
            'post_type'      => 'dslc_projects',
            'posts_per_page' => $options['amount'],
            'order'          => $options['order'],
            'orderby'        => $options['orderby']
        );
        if ($query_offset > 0)
        {
            $args['offset'] = $query_offset;
        }

        if (isset($options['categories']) && $options['categories'] != '')
        {

            $cats_array = explode(' ', trim($options['categories']));

            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'dslc_projects_cats',
                    'field'    => 'slug',
                    'terms'    => $cats_array,
                    'operator' => $options['categories_operator']
                )
            );
        }
        // Exlcude and Include arrays
        $exclude = array();
        $include = array();

        // Exclude current post
        if (is_singular(get_post_type()))
            $exclude[] = get_the_ID();

        // Exclude posts ( option )
        if ($options['query_post_not_in'])
            $exclude = array_merge($exclude, explode(' ', $options['query_post_not_in']));

        // Include posts ( option )
        if ($options['query_post_in'])
            $include = array_merge($include, explode(' ', $options['query_post_in']));

        // Include query parameter
        if (!empty($include))
            $args['post__in'] = $include;

        // Exclude query parameter
        if (!empty($exclude))
            $args['post__not_in'] = $exclude;

        // Author archive page
        if (is_author())
        {
            global $authordata;
            $args['author__in'] = array(
                $authordata->data->ID);
        }

        // No paging
        if ($options['pagination_type'] == 'disabled')
            $args['no_found_rows'] = true;

        // Do the query
        if (is_category() || is_tax() || is_search())
        {
            global $wp_query;
            $dslc_query = $wp_query;
        }
        else
        {
            $dslc_query = new WP_Query($args);
        }
        $wrapper_class        = '';
        $columns_class        = 'dslc-col dslc-' . $options['columns'] . '-col ';
        $count                = 0;
        $real_count           = 0;
        $increment            = $options['columns'];
        $max_count            = 12;
        /**
         * Elements to show
         */
        // Main Elements
        $elements             = $options['elements'];
        if (!empty($elements))
            $elements             = explode(' ', trim($elements));
        else
            $elements             = array();
        // Post Elements
        $post_elements        = $options['post_elements'];
        if (!empty($post_elements))
            $post_elements        = explode(' ', trim($post_elements));
        else
            $post_elements        = 'all';
        // Carousel Elements
        $carousel_elements    = $options['carousel_elements'];
        if (!empty($carousel_elements))
            $carousel_elements    = explode(' ', trim($carousel_elements));
        else
            $carousel_elements    = array();
        /* Container Class */
        $container_class      = 'dslc-posts dslc-projects dslc-clearfix ';
        if ($options['type'] == 'masonry')
            $container_class .= 'dslc-init-masonry ';
        elseif ($options['type'] == 'grid')
            $container_class .= 'dslc-init-grid ';
        $container_class .= " as-isotope-posts";
        /* Element Class */
        $element_class        = 'dslc-post dslc-project ';
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
            $show_heading         = true;
        if (( $elements == 'all' || in_array('filters', $elements) ) && $options['type'] !== 'carousel')
            $show_filters         = true;
        if ($options['type'] == 'carousel' && in_array('arrows', $carousel_elements))
            $show_carousel_arrows = true;
        if ($show_heading || $show_filters || $show_carousel_arrows)
            $show_header          = true;
        /**
         * Carousel Items
         */
        switch ($options['columns'])
        {
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

        <?php
        if ($options['asex_ajax_projects'] == 1 && $options['asex_ajax_projects_position'] == 'top')
        {
            ?>
            <!-- PRINT PROJECTS DATA -->
            <div id="asex_portfolio_content" style="display:none;">
                <div class="as-wrapper clearfix">
                    <div class="as-portfolio-ajax-wrapper">
                        <div class="as-port-control dslc-col dslc-12-col dslc-last-col">
                            <a href="javascript:void(0);" class="prev" data-ajax="1" data-id="59">
                                <span class="dslc-icon dslc-icon-angle-left"></span><span class="as-btn-text-ajax-prj"><?php _e('Prev', 'asex') ?></span>
                            </a> 
                            <a href="javascript:void(0);" class="close-port">
                                <span class="dslc-icon dslc-icon-remove"></span>
                            </a> 
                            <a href="javascript:void(0);" class="next" data-ajax="1" data-id="57">
                                <span class="as-btn-text-ajax-prj"><?php _e('Next', 'as-custom') ?></span><span class="dslc-icon dslc-icon-angle-right"></span>
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
        if ($show_header) :
            ?>
            <div class="dslc-module-heading">

                <!-- Heading -->

                <?php if ($show_heading) : ?>

                    <h2 class="dslca-editable-content" data-id="main_heading_title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?> ><?php echo esc_html($options['main_heading_title']); ?></h2>

                    <!-- View all -->

                    <?php if (isset($options['view_all_link']) && $options['view_all_link'] !== '') : ?>

                        <span class="dslc-module-heading-view-all"><a href="<?php echo esc_url($options['view_all_link']); ?>" class="dslca-editable-content" data-id="main_heading_link_title" data-type="simple" <?php if ($dslc_is_admin) echo 'contenteditable'; ?> ><?php echo esc_html($options['main_heading_link_title']); ?></a></span>

                    <?php endif; ?>

                <?php endif; ?>

                <!-- Filters -->

                <?php
                if ($show_filters)
                {

                    $cats_array = array();

                    if ($dslc_query->have_posts())
                    {

                        while ($dslc_query->have_posts())
                        {

                            $dslc_query->the_post();

                            $post_cats = get_the_terms(get_the_ID(), 'dslc_projects_cats');
                            if (!empty($post_cats))
                            {
                                foreach ($post_cats as $post_cat)
                                {
                                    $cats_array[$post_cat->slug] = $post_cat->name;
                                }
                            }
                        }
                    }
                    ?>
                    <?php
                    $duration_filter_hover = '';
                    $value_filter_duration = $options['css_filters_duration_hover'];
                    if ($value_filter_duration != '')
                    {
                        $duration_filter_hover = '-webkit-transition: all ' . $value_filter_duration . 'ms ease-out;-moz-transition: all ' . $value_filter_duration . 'ms ease-out;-ms-transition: all ' . $value_filter_duration . 'ms ease-out;-o-transition: all ' . $value_filter_duration . 'ms ease-out;transition: all ' . $value_filter_duration . 'ms ease-out;';
                    }
                    ?>
                    <div class="dslc-post-filters">

                        <span class="dslc-post-filter as-isotope-filter dslc-active" data-id=" " style="<?php echo esc_html($duration_filter_hover); ?>"><?php _e('All', 'Post Filter', 'asex'); ?></span>

                        <?php
                        foreach ($cats_array as $cat_slug => $cat_name) :
                            ?>
                            <span class="dslc-post-filter as-isotope-filter dslc-inactive" data-id="<?php echo esc_attr($cat_slug); ?>" style="<?php echo esc_html($duration_filter_hover); ?>"><?php echo esc_html($cat_name); ?></span>
                        <?php endforeach; ?>

                    </div><!-- .dslc-post-filters -->

                    <?php
                }
                ?>

                <!-- Carousel -->

                <?php if ($show_carousel_arrows) : ?>
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
        if ($dslc_query->have_posts()) :
            ?>

            <div class="<?php echo $container_class; ?>">

                <?php
                if ($options['type'] == 'carousel') :
                    ?><div class="dslc-loader"></div><div class="dslc-carousel" data-stop-on-hover="<?php echo esc_attr($options['carousel_autoplay_hover']); ?>" data-autoplay="<?php echo esc_attr($options['carousel_autoplay']); ?>" data-columns="<?php echo esc_attr($carousel_items); ?>" data-pagination="<?php
                    if (in_array('circles', $carousel_elements))
                        echo 'true';
                    else
                        echo 'false';
                    ?>" data-slide-speed="<?php echo esc_attr($options['arrows_slide_speed']); ?>" data-pagination-speed="<?php echo esc_attr($options['circles_slide_speed']); ?>"><?php
                                                        endif;
                                                        while ($dslc_query->have_posts()) : $dslc_query->the_post();
                                                            $count += $increment;
                                                            $real_count++;

                                                            if ($count == $max_count)
                                                            {
                                                                $count       = 0;
                                                                $extra_class = ' dslc-last-col';
                                                            }
                                                            elseif ($count == $increment)
                                                            {
                                                                $extra_class = ' ';
                                                            }
                                                            else
                                                            {
                                                                $extra_class = '';
                                                            }

                                                            if (!has_post_thumbnail())
                                                                $extra_class .= ' dslc-post-no-thumb';

                                                            $project_cats_count = 0;
                                                            $project_cats       = get_the_terms(get_the_ID(), 'dslc_projects_cats');

                                                            $project_cats_data = '';
                                                            if (!empty($project_cats))
                                                            {
                                                                foreach ($project_cats as $project_cat)
                                                                {
                                                                    $project_cats_data .= $project_cat->slug . ' ';
                                                                }
                                                            }

                                                            // Project URL
                                                            $the_project_url = get_permalink();
                                                            if ($options['link'] == 'custom')
                                                            {
                                                                if (get_post_meta(get_the_ID(), 'dslc_project_url', true))
                                                                    $the_project_url = get_post_meta(get_the_ID(), 'dslc_project_url', true);
                                                                else
                                                                    $the_project_url = '#';
                                                            }
                                                            // Project URL target
                                                            $the_project_url_target = $options['link_target'];
                                                            ?>
                        <div class="<?php echo $element_class . $columns_class . $extra_class; ?> <?php echo $project_cats_data; ?>" data-cats="<?php echo esc_attr($project_cats_data); ?>">

                            <?php
                            /**
                             * Manual Resize
                             */
                            $manual_resize          = false;
                            if (isset($options['thumb_resize_height']) && !empty($options['thumb_resize_height']) || isset($options['thumb_resize_width_manual']) && !empty($options['thumb_resize_width_manual']))
                            {
                                $manual_resize = true;
                                $thumb_url     = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                $thumb_url     = $thumb_url[0];
                                $thumb_alt     = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                                if (!$thumb_alt)
                                    $thumb_alt     = '';

                                $resize_width  = false;
                                $resize_height = false;

                                if (isset($options['thumb_resize_width_manual']) && !empty($options['thumb_resize_width_manual']))
                                {
                                    $resize_width = $options['thumb_resize_width_manual'];
                                }

                                if (isset($options['thumb_resize_height']) && !empty($options['thumb_resize_height']))
                                {
                                    $resize_height = $options['thumb_resize_height'];
                                }
                            }
                            ?>

                            <?php if (has_post_thumbnail()) : ?>

                                <?php
                                $anchor_class   = 'dslc-lightbox-image';
                                $duration_hover = '';
                                $value_duration = $options['css_main_bg_color_duration_hover'];
                                if ($value_duration != '')
                                {
                                    $duration_hover = '-webkit-transition: all ' . $value_duration . 'ms ease-out;-moz-transition: all ' . $value_duration . 'ms ease-out;-ms-transition: all ' . $value_duration . 'ms ease-out;-o-transition: all ' . $value_duration . 'ms ease-out;transition: all ' . $value_duration . 'ms ease-out;';
                                }
                                ?>

                                <div class="dslc-post-thumb dslc-project-thumb dslc-on-hover-anim as-project-custom">
                                    <div class="dslc-project-thumb-inner dslca-post-thumb">
                                        <?php if ($manual_resize) : ?>
                                            <a data-id="<?php echo get_the_ID(); ?>" data-ajax="<?php echo isset($options['asex_ajax_projects']) && $options['asex_ajax_projects'] ? '1' : '0'; ?>" href="<?php echo esc_url($the_project_url); ?>" target="<?php echo esc_attr($the_project_url_target); ?>"><img src="<?php
                                                $res_img = dslc_aq_resize($thumb_url, $resize_width, $resize_height, true);
                                                echo esc_url($res_img);
                                                ?>" alt="<?php echo esc_attr($thumb_alt); ?>" /></a>
                                            <?php else : ?>
                                            <a data-id="<?php echo get_the_ID(); ?>" data-ajax="<?php echo isset($options['asex_ajax_projects']) && $options['asex_ajax_projects'] ? '1' : '0'; ?>" href="<?php echo esc_url($the_project_url); ?>" target="<?php echo esc_attr($the_project_url_target); ?>"><?php the_post_thumbnail('full'); ?></a>
                                        <?php endif; ?>
                                    </div><!-- .dslc-project-thumb-inner -->


                                    <?php if (( $post_elements == 'all' || in_array('title', $post_elements) || in_array('categories', $post_elements) || in_array('excerpt', $post_elements) || in_array('button', $post_elements))) : ?>

                                        <div class="dslc-project-main dslc-on-hover-anim-target" style="<?php echo esc_html($duration_hover); ?>">

                                            <div class="dslc-project-main-inner">
                                                <?php if ($post_elements == 'all' || in_array('title', $post_elements)) : ?>
                                                    <div class="dslc-project-title">
                                                        <h2><a data-ajax="<?php echo isset($options['asex_ajax_projects']) && $options['asex_ajax_projects'] ? '1' : '0'; ?>" data-id="<?php echo get_the_ID(); ?>" href="<?php echo esc_url($the_project_url); ?>" target="<?php echo esc_attr($the_project_url_target); ?>"><?php the_title(); ?></a></h2>
                                                    </div><!-- .dslc-project-title -->
                                                <?php endif; ?>

                                                <?php if ($post_elements == 'all' || in_array('categories', $post_elements)) : ?>

                                                    <?php if (!empty($project_cats)) : ?>
                                                        <div class="dslc-project-cats">
                                                            <?php
                                                            foreach ($project_cats as $project_cat)
                                                            {
                                                                $project_cats_count++;
                                                                if ($project_cats_count > 1)
                                                                {
                                                                    echo ', ';
                                                                }
                                                                echo $project_cat->name;
                                                            }
                                                            ?>
                                                        </div><!-- .dslc-project-cats -->
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <div class="as-project-line"></div>

                                                <?php if ($post_elements == 'all' || in_array('icon_link', $post_elements)) : ?>
                                                    <div class="as-group-icon-project">
                                                        <?php
                                                        $format_check = rwmb_meta('asex_custom_page_metaboxes', 'type=select');
                                                        $format       = get_post_format();
                                                        if (($format == 'video') && ($format_check == 'youtube'))
                                                        {
                                                            $img_link_url = ( rwmb_meta('asex_youtube_link', 'type=select'));
                                                            $format       = 'video';
                                                        }
                                                        else
                                                        {
                                                            $img_link_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                                            $img_link_url = $img_link_url[0];
                                                            $format       = 'normal';
                                                        }
                                                        ?>
                                                        <a class="as-zoom-img-project as-lightbox-gallery" data-project-type="<?php echo esc_attr($format); ?>" href="<?php echo esc_url($img_link_url); ?>"><span class="dslc-icon <?php echo ($format == 'video' ? 'dslc-icon-play-circle' : 'dslc-icon-search' ); ?>"></span></a>
                                                        <a class="as-link-to-project" data-ajax="<?php echo isset($options['asex_ajax_projects']) && $options['asex_ajax_projects'] ? '1' : '0'; ?>" data-id="<?php echo get_the_ID(); ?>" href="<?php echo esc_url($the_project_url); ?>" target="<?php echo esc_attr($the_project_url_target); ?>"><span class="dslc-icon dslc-icon-link"></span></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div><!-- .dslc-init-center -->

                                        </div><!-- .dslc-project-main -->

                                    <?php endif; ?>

                                </div><!-- .dslc-project-thumb -->

                            <?php endif; ?>

                        </div><!-- .dslc-project -->
                        <?php
                        // Row Separator
                        if ($options['type'] == 'grid' && $count == 0 && $real_count != $dslc_query->found_posts && $real_count != $options['amount'] && $options['separator_enabled'] == 'enabled')
                        {
                            echo '<div class="dslc-post-separator"></div>';
                        }
                    endwhile;
                    if ($options['type'] == 'carousel') :
                        ?></div><?php
                endif;
                ?>
            </div><!-- .dslc-projects -->
            <?php
        else :
            if ($dslc_is_admin) :
                ?><div class="dslc-notification dslc-red"><?php _e('You do not have any projects at the moment. Go to <strong>WP Admin &rarr; Projects</strong> to add some.', 'asex'); ?> <span class="dslca-refresh-module-hook dslc-icon dslc-icon-refresh"></span></span></div><?php
            endif;
        endif;
        /**
         * Pagination
         */
        if (isset($options['pagination_type']) && $options['pagination_type'] != 'disabled')
        {
            $num_pages = $dslc_query->max_num_pages;
            dslc_post_pagination(array(
                'pages' => $num_pages,
                'type'  => $options['pagination_type']));
        }
        wp_reset_query();
        ?>
        <?php
        if ($options['asex_ajax_projects'] == 1 && $options['asex_ajax_projects_position'] == 'bottom')
        {
            ?>
            <!-- PRINT PROJECTS DATA -->
            <div id="asex_portfolio_content" style="display:none;">
                <div class="as-wrapper clearfix">
                    <div class="as-portfolio-ajax-wrapper">
                        <div class="as-port-control dslc-col dslc-12-col dslc-last-col">
                            <a href="javascript:void(0);" class="prev" data-ajax="1" data-id="59">
                                <span class="dslc-icon dslc-icon-angle-left"></span><span class="as-btn-text-ajax-prj"><?php _e('Prev', 'as-custom') ?></span>
                            </a> 
                            <a href="javascript:void(0);" class="close-port">
                                <span class="dslc-icon dslc-icon-remove"></span>
                            </a> 
                            <a href="javascript:void(0);" class="next" data-ajax="1" data-id="57">
                                <span class="as-btn-text-ajax-prj"><?php _e('Next', 'as-custom') ?></span><span class="dslc-icon dslc-icon-angle-right"></span>
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
