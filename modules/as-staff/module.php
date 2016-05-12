<?php
if (dslc_is_module_active('DSLC_Staff'))
    include AS_EXTENSION_ABS . '/modules/as-staff/functions.php';

class AS_Staff extends as_module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;

    function __construct() {

        $this->module_id       = 'AS_Staff';
        $this->module_title    = __('Staff Simple', 'live-composer-page-builder');
        $this->module_icon     = 'group';
        $this->module_category = 'as - posts';
    }

    function options() {

        $cats         = get_terms('dslc_staff_cats');
        $cats_choices = array();

        foreach ($cats as
                $cat) {
            $cats_choices[] = array(
                'label' => $cat->name,
                'value' => $cat->slug
            );
        }

        $dslc_options = array(
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
                'label'   => __('Type', 'live-composer-page-builder'),
                'id'      => 'type',
                'std'     => 'grid',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Grid', 'live-composer-page-builder'),
                        'value' => 'grid'
                    ),
                    array(
                        'label' => __('Masonry Grid', 'live-composer-page-builder'),
                        'value' => 'masonry'
                    ),
                    array(
                        'label' => __('Carousel', 'live-composer-page-builder'),
                        'value' => 'carousel'
                    )
                )
            ),
            array(
                'label' => __('Posts Per Page', 'live-composer-page-builder'),
                'id'    => 'amount',
                'std'   => '4',
                'type'  => 'text',
            ),
            array(
                'label'   => __('Pagination', 'live-composer-page-builder'),
                'id'      => 'pagination_type',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'live-composer-page-builder'),
                        'value' => 'disabled',
                    ),
                    array(
                        'label' => __('Numbered', 'live-composer-page-builder'),
                        'value' => 'numbered',
                    ),
                    array(
                        'label' => __('Prev/Next', 'live-composer-page-builder'),
                        'value' => 'prevnext',
                    )
                ),
            ),
            array(
                'label'   => __('Items Per Row', 'live-composer-page-builder'),
                'id'      => 'columns',
                'std'     => '3',
                'type'    => 'select',
                'choices' => $this->shared_options('posts_per_row_choices'),
            ),
            array(
                'label'   => __('Categories', 'live-composer-page-builder'),
                'id'      => 'categories',
                'std'     => '',
                'type'    => 'checkbox',
                'choices' => $cats_choices
            ),
            array(
                'label'   => __('Categories Operator', 'live-composer-page-builder'),
                'id'      => 'categories_operator',
                'std'     => 'IN',
                'help'    => __('<strong>IN</strong> - Posts must be in at least one chosen category.<br><strong>AND</strong> - Posts must be in all chosen categories.<br><strong>NOT IN</strong> Posts must not be in the chosen categories.', 'live-composer-page-builder'),
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('IN', 'live-composer-page-builder'),
                        'value' => 'IN',
                    ),
                    array(
                        'label' => __('AND', 'live-composer-page-builder'),
                        'value' => 'AND',
                    ),
                    array(
                        'label' => __('NOT IN', 'live-composer-page-builder'),
                        'value' => 'NOT IN',
                    ),
                )
            ),
            array(
                'label'   => __('Order By', 'live-composer-page-builder'),
                'id'      => 'orderby',
                'std'     => 'date',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Publish Date', 'live-composer-page-builder'),
                        'value' => 'date'
                    ),
                    array(
                        'label' => __('Modified Date', 'live-composer-page-builder'),
                        'value' => 'modified'
                    ),
                    array(
                        'label' => __('Random', 'live-composer-page-builder'),
                        'value' => 'rand'
                    ),
                    array(
                        'label' => __('Alphabetic', 'live-composer-page-builder'),
                        'value' => 'title'
                    ),
                    array(
                        'label' => __('Comment Count', 'live-composer-page-builder'),
                        'value' => 'comment_count'
                    ),
                )
            ),
            array(
                'label'   => __('Order', 'live-composer-page-builder'),
                'id'      => 'order',
                'std'     => 'DESC',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Ascending', 'live-composer-page-builder'),
                        'value' => 'ASC'
                    ),
                    array(
                        'label' => __('Descending', 'live-composer-page-builder'),
                        'value' => 'DESC'
                    )
                )
            ),
            array(
                'label' => __('Offset', 'live-composer-page-builder'),
                'id'    => 'offset',
                'std'   => '0',
                'type'  => 'text',
            ),
            array(
                'label' => __('Include (IDs)', 'live-composer-page-builder'),
                'id'    => 'query_post_in',
                'std'   => '',
                'type'  => 'text',
            ),
            array(
                'label' => __('Exclude (IDs)', 'live-composer-page-builder'),
                'id'    => 'query_post_not_in',
                'std'   => '',
                'type'  => 'text',
            ),
            array(
                'label'   => __('Social - Link Behaviour', 'live-composer-page-builder'),
                'id'      => 'social_link_target',
                'std'     => '_self',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Open in same tab', 'live-composer-page-builder'),
                        'value' => '_self'
                    ),
                    array(
                        'label' => __('Open in new tab', 'live-composer-page-builder'),
                        'value' => '_blank'
                    )
                ),
                'tab'     => __('Other', 'live-composer-page-builder'),
            ),
            /**
             * General
             */
            array(
                'label'   => __('Post Elements', 'live-composer-page-builder'),
                'id'      => 'post_elements',
                'std'     => 'thumbnail social title position excerpt',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Thumbnail', 'live-composer-page-builder'),
                        'value' => 'thumbnail',
                    ),
                    array(
                        'label' => __('Social Links', 'live-composer-page-builder'),
                        'value' => 'social',
                    ),
                    array(
                        'label' => __('Title', 'live-composer-page-builder'),
                        'value' => 'title',
                    ),
                    array(
                        'label' => __('Position', 'live-composer-page-builder'),
                        'value' => 'position',
                    ),
                    array(
                        'label' => __('Excerpt', 'live-composer-page-builder'),
                        'value' => 'excerpt',
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'   => __('Carousel Elements', 'live-composer-page-builder'),
                'id'      => 'carousel_elements',
                'std'     => 'arrows circles',
                'type'    => 'checkbox',
                'choices' => array(
                    array(
                        'label' => __('Arrows', 'live-composer-page-builder'),
                        'value' => 'arrows'
                    ),
                    array(
                        'label' => __('Circles', 'live-composer-page-builder'),
                        'value' => 'circles'
                    ),
                ),
                'section' => 'styling'
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff',
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
                'affect_on_change_el'   => '.dslc-staff',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
            ),
            /**
             * Separator
             */
            array(
                'label'   => __('Enable/Disable', 'live-composer-page-builder'),
                'id'      => 'separator_enabled',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Enabled', 'live-composer-page-builder'),
                        'value' => 'enabled'
                    ),
                    array(
                        'label' => __('Disabled', 'live-composer-page-builder'),
                        'value' => 'disabled'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Row Separator', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'css_sep_border_color',
                'std'                   => '#ededed',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-post-separator',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Row Separator', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Height', 'live-composer-page-builder'),
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
                'tab'                   => __('Row Separator', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Thickness', 'live-composer-page-builder'),
                'id'                    => 'css_sep_thickness',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-post-separator',
                'affect_on_change_rule' => 'border-bottom-width',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 50,
                'section'               => 'styling',
                'tab'                   => __('Row Separator', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Style', 'live-composer-page-builder'),
                'id'                    => 'css_sep_style',
                'std'                   => 'dashed',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('Invisible', 'live-composer-page-builder'),
                        'value' => 'none'
                    ),
                    array(
                        'label' => __('Solid', 'live-composer-page-builder'),
                        'value' => 'solid'
                    ),
                    array(
                        'label' => __('Dashed', 'live-composer-page-builder'),
                        'value' => 'dashed'
                    ),
                    array(
                        'label' => __('Dotted', 'live-composer-page-builder'),
                        'value' => 'dotted'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-post-separator',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Row Separator', 'live-composer-page-builder'),
            ),
            /**
             * Thumbnail
             */
            array(
                'label'                 => __('Text Align', 'live-composer-page-builder'),
                'id'                    => 'css_thumbnail_text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslca-post-thumb',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'live-composer-page-builder'),
            ),
            array(
                'label'   => __('Effect Thumbnail', 'live-composer-page-builder'),
                'id'      => 'effect_hover_img',
                'std'     => 'normal',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Black & White', 'live-composer-page-builder'),
                        'value' => 'black_white'
                    ),
                    array(
                        'label' => __('Normal', 'live-composer-page-builder'),
                        'value' => 'normal'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Thumbnail', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('BG Color', 'live-composer-page-builder'),
                'id'                    => 'css_thumbnail_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-thumb',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Color', 'live-composer-page-builder'),
                'id'                    => 'css_thumb_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-thumb-inner',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
                'id'                    => 'css_thumb_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-thumb-inner',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Thumbnail', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'css_thumb_border_trbl',
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
                'affect_on_change_el'   => '.dslc-staff-member-thumb-inner',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Radius - Top', 'live-composer-page-builder'),
                'id'                    => 'css_thumbnail_border_radius_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-thumb-inner, .dslc-staff-member-thumb img',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'live-composer-page-builder'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_thumbnail_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-thumb-inner, .dslc-staff-member-thumb img',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'live-composer-page-builder'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_thumbnail_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-thumb',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => '-100',
                'max'                   => '100',
                'tab'                   => __('Thumbnail', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_thumbnail_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-thumb-inner',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Thumbnail', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_thumbnail_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-thumb-inner',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Thumbnail', 'live-composer-page-builder'),
            ),
            array(
                'label'   => __('Resize - Height', 'live-composer-page-builder'),
                'id'      => 'thumb_resize_height',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('thumbnail', 'live-composer-page-builder'),
            ),
            array(
                'label'   => __('Resize - Width', 'live-composer-page-builder'),
                'id'      => 'thumb_resize_width_manual',
                'std'     => '',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('thumbnail', 'live-composer-page-builder'),
            ),
            array(
                'label'      => __('Resize - Width', 'live-composer-page-builder'),
                'id'         => 'thumb_resize_width',
                'std'        => '',
                'type'       => 'text',
                'section'    => 'styling',
                'tab'        => __('thumbnail', 'live-composer-page-builder'),
                'visibility' => 'hidden'
            ),
            /**
             * Social
             */
            array(
                'label'   => __('Position', 'live-composer-page-builder'),
                'id'      => 'css_social_position',
                'std'     => 'bottom',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Inner Thumbnail', 'live-composer-page-builder'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Bottom Thumbnail', 'live-composer-page-builder'),
                        'value' => 'bottom'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Social', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Align', 'live-composer-page-builder'),
                'id'                    => 'css_social_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Social', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('BG Color', 'live-composer-page-builder'),
                'id'                    => 'css_social_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Social', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('BG Color Hover', 'live-composer-page-builder'),
                'id'                    => 'css_social_bg_hover_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a:hover',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Social', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Color', 'live-composer-page-builder'),
                'id'                    => 'css_social_border_color',
                'std'                   => 'rgb(175, 175, 175)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Social', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Hover Color', 'live-composer-page-builder'),
                'id'                    => 'css_social_border_hover_color',
                'std'                   => '#00b9cf',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a:hover',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Social', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
                'id'                    => 'css_social_border_width',
                'std'                   => '2',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Social', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'css_social_border_trbl',
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
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Social', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Radius - Top', 'live-composer-page-builder'),
                'id'                    => 'css_social_border_radius_top',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'tab'                   => __('Social', 'live-composer-page-builder'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_social_border_radius_bottom',
                'std'                   => '100',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'tab'                   => __('Social', 'live-composer-page-builder'),
                'ext'                   => '%'
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_social_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Social', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Size (width, height)', 'live-composer-page-builder'),
                'id'                    => 'css_social_widht_height',
                'std'                   => '40',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a',
                'affect_on_change_rule' => 'width,height',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Social', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Icon - Spacing', 'live-composer-page-builder'),
                'id'                    => 'css_social_spacing',
                'std'                   => '5',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a',
                'affect_on_change_rule' => 'margin-left,margin-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Social', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Icon - Color', 'live-composer-page-builder'),
                'id'                    => 'css_social_color',
                'std'                   => 'rgb(175, 175, 175)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a span',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Social', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Icon - Hover Color', 'live-composer-page-builder'),
                'id'                    => 'css_social_hover_color',
                'std'                   => '#00b9cf',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a:hover span',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Social', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Icon - Size', 'live-composer-page-builder'),
                'id'                    => 'css_social_font_size',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Social', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Icon - Margin Top', 'live-composer-page-builder'),
                'id'                    => 'css_social_margin_top',
                'std'                   => '6',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-social-wrapper .as-staff-list-social a span.dslc-icon',
                'affect_on_change_rule' => 'margin-top',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Social', 'live-composer-page-builder'),
            ),
            /**
             * Main
             */
            array(
                'label'                 => __(' BG Color', 'live-composer-page-builder'),
                'id'                    => 'css_main_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-main',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Main', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Color', 'live-composer-page-builder'),
                'id'                    => 'css_main_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-main',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Main', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
                'id'                    => 'css_main_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-main',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Main', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'css_main_border_trbl',
                'std'                   => 'right bottom left',
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
                'affect_on_change_el'   => '.dslc-staff-member-main',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Main', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Radius - Top', 'live-composer-page-builder'),
                'id'                    => 'css_main_border_radius_top',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-main',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'tab'                   => __('Main', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_main_border_radius_bottom',
                'std'                   => '4',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-main',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'tab'                   => __('Main', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Minimum Height', 'live-composer-page-builder'),
                'id'                    => 'css_main_min_height',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-main',
                'affect_on_change_rule' => 'min-height',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Main', 'live-composer-page-builder'),
                'min'                   => 0,
                'max'                   => 500
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_main_padding_vertical',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-main',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Main', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'css_main_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-main',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Main', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Text Align', 'live-composer-page-builder'),
                'id'                    => 'css_main_text_align',
                'std'                   => 'center',
                'type'                  => 'text_align',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-main',
                'affect_on_change_rule' => 'text-align',
                'section'               => 'styling',
                'tab'                   => __('Main', 'live-composer-page-builder'),
            ),
            /**
             * Main Inner
             */
            array(
                'label'   => __('Content Inner Thumbnail', 'live-composer-page-builder'),
                'id'      => 'content_inner_thumb_enabled',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Enabled', 'live-composer-page-builder'),
                        'value' => 'enabled'
                    ),
                    array(
                        'label' => __('Disabled', 'live-composer-page-builder'),
                        'value' => 'disabled'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Main Inner', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('BG Color', 'live-composer-page-builder'),
                'id'                    => 'content_inner_thumb_bg_color',
                'std'                   => 'rgba(0, 0, 0, 0.45)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-inner-content-thumb-wrapper',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Main Inner', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Color', 'live-composer-page-builder'),
                'id'                    => 'content_inner_thumb_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-inner-content-thumb-wrapper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Main Inner', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Color - Hover', 'live-composer-page-builder'),
                'id'                    => 'content_inner_thumb_border_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-inner-content-thumb-wrapper',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Main Inner', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
                'id'                    => 'content_inner_thumb_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-inner-content-thumb-wrapper',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Main Inner', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'content_inner_thumb_border_trbl',
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
                'affect_on_change_el'   => '.as-staff-inner-content-thumb-wrapper',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Main Inner', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'content_inner_thumb_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-inner-content-thumb-wrapper',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Main Inner', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'live-composer-page-builder'),
                'id'                    => 'content_inner_thumb_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-staff-inner-content-thumb-wrapper',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Main Inner', 'live-composer-page-builder'),
            ),
            /**
             * Title
             */
            array(
                'label'   => __('Position', 'live-composer-page-builder'),
                'id'      => 'css_title_position',
                'std'     => 'bottom',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Inner Thumbnail', 'live-composer-page-builder'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Bottom Thumbnail', 'live-composer-page-builder'),
                        'value' => 'bottom'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Title', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'css_title_color',
                'std'                   => 'rgb(34, 34, 34)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-title h2',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color - Hover', 'live-composer-page-builder'),
                'id'                    => 'css_title_color_hover',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-title h2:hover',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_title_font_size',
                'std'                   => '18',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-title h2',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'css_title_font_weight',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-title h2',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'css_title_font_family',
                'std'                   => 'Raleway',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-title h2',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Line Height', 'live-composer-page-builder'),
                'id'                    => 'css_title_line_height',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-title h2',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_title_margin_bottom',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-title',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Text Transform', 'live-composer-page-builder'),
                'id'                    => 'css_title_text_transform',
                'std'                   => 'none',
                'type'                  => 'select',
                'choices'               => array(
                    array(
                        'label' => __('None', 'live-composer-page-builder'),
                        'value' => 'none'
                    ),
                    array(
                        'label' => __('Capitalize', 'live-composer-page-builder'),
                        'value' => 'capitalize'
                    ),
                    array(
                        'label' => __('Uppercase', 'live-composer-page-builder'),
                        'value' => 'uppercase'
                    ),
                    array(
                        'label' => __('Lowercase', 'live-composer-page-builder'),
                        'value' => 'lowercase'
                    ),
                ),
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-title h2',
                'affect_on_change_rule' => 'text-transform',
                'section'               => 'styling',
                'tab'                   => __('Title', 'live-composer-page-builder'),
            ),
            /**
             * Position
             */
            array(
                'label'   => __('Position', 'live-composer-page-builder'),
                'id'      => 'css_position_position',
                'std'     => 'bottom',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Inner Thumbnail', 'live-composer-page-builder'),
                        'value' => 'top'
                    ),
                    array(
                        'label' => __('Bottom Thumbnail', 'live-composer-page-builder'),
                        'value' => 'bottom'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Position', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Color', 'live-composer-page-builder'),
                'id'                    => 'css_position_border_color',
                'std'                   => '#e5e5e5',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-position',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Position', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Border Width', 'live-composer-page-builder'),
                'id'                    => 'css_position_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-position',
                'affect_on_change_rule' => 'border-top-width,border-bottom-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Position', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Borders', 'live-composer-page-builder'),
                'id'                    => 'css_position_border_trbl',
                'std'                   => 'top bottom',
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
                'affect_on_change_el'   => '.dslc-staff-member-position',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Position', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'css_position_color',
                'std'                   => 'rgb(177, 177, 177)',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-position',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Position', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_position_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-position',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Position', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'css_position_font_weight',
                'std'                   => '600',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-position',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Position', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'css_position_font_family',
                'std'                   => 'Bitter',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-position',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Position', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Style', 'live-composer-page-builder'),
                'id'                    => 'css_position_font_style',
                'std'                   => 'italic',
                'type'                  => 'select',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-position',
                'affect_on_change_rule' => 'font-style',
                'section'               => 'styling',
                'tab'                   => __('Position', 'live-composer-page-builder'),
                'choices'               => array(
                    array(
                        'label' => __('Normal', 'live-composer-page-builder'),
                        'value' => 'normal',
                    ),
                    array(
                        'label' => __('Italic', 'live-composer-page-builder'),
                        'value' => 'italic',
                    ),
                )
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_position_margin_bottom',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-position',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Position', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'live-composer-page-builder'),
                'id'                    => 'css_position_padding_vertical',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-position',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Position', 'live-composer-page-builder'),
            ),
            /**
             * Excerpt
             */
            array(
                'label'   => __('Excerpt or Content', 'live-composer-page-builder'),
                'id'      => 'excerpt_or_content',
                'std'     => 'excerpt',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Excerpt', 'live-composer-page-builder'),
                        'value' => 'excerpt'
                    ),
                    array(
                        'label' => __('Content', 'live-composer-page-builder'),
                        'value' => 'content'
                    ),
                ),
                'section' => 'styling',
                'tab'     => __('Excerpt', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Color', 'live-composer-page-builder'),
                'id'                    => 'css_excerpt_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-excerpt',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('Excerpt', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Font Size', 'live-composer-page-builder'),
                'id'                    => 'css_excerpt_font_size',
                'std'                   => '13',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-excerpt',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('Excerpt', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'live-composer-page-builder'),
                'id'                    => 'css_excerpt_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-excerpt',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('Excerpt', 'live-composer-page-builder'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'live-composer-page-builder'),
                'id'                    => 'css_excerpt_font_family',
                'std'                   => 'Lato',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-excerpt',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('Excerpt', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Line Height', 'live-composer-page-builder'),
                'id'                    => 'css_excerpt_line_height',
                'std'                   => '23',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-excerpt',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('Excerpt', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            array(
                'label'   => __('Max Length ( amount of words )', 'live-composer-page-builder'),
                'id'      => 'excerpt_length',
                'std'     => '20',
                'type'    => 'text',
                'section' => 'styling',
                'tab'     => __('Excerpt', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_excerpt_margin_bottom',
                'std'                   => '20',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-excerpt',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('Position', 'live-composer-page-builder'),
                'ext'                   => 'px'
            ),
            /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive Styling', 'live-composer-page-builder'),
                'id'      => 'css_res_t',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'live-composer-page-builder'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'live-composer-page-builder'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('tablet', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Separator - Height', 'live-composer-page-builder'),
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
                'tab'                   => __('tablet', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Thumbnail - Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_t_thumbnail_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-thumb',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('tablet', 'live-composer-page-builder'),
            ),
            /**
             * Responsive Phone
             */
            array(
                'label'   => __('Responsive Styling', 'live-composer-page-builder'),
                'id'      => 'css_res_p',
                'std'     => 'disabled',
                'type'    => 'select',
                'choices' => array(
                    array(
                        'label' => __('Disabled', 'live-composer-page-builder'),
                        'value' => 'disabled'
                    ),
                    array(
                        'label' => __('Enabled', 'live-composer-page-builder'),
                        'value' => 'enabled'
                    ),
                ),
                'section' => 'responsive',
                'tab'     => __('phone', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'live-composer-page-builder'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Separator - Height', 'live-composer-page-builder'),
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
                'tab'                   => __('phone', 'live-composer-page-builder'),
            ),
            array(
                'label'                 => __('Thumbnail - Margin Bottom', 'live-composer-page-builder'),
                'id'                    => 'css_res_p_thumbnail_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-staff-member-thumb',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'ext'                   => 'px',
                'tab'                   => __('phone', 'live-composer-page-builder'),
            ),
        );

        $dslc_options = array_merge($dslc_options, $this->shared_options('carousel_options'));
        //$dslc_options = array_merge( $dslc_options, $this->shared_options('heading_options') );
        //$dslc_options = array_merge( $dslc_options, $this->shared_options('filters_options') );
        $dslc_options = array_merge($dslc_options, $this->shared_options('carousel_arrows_options'));
        $dslc_options = array_merge($dslc_options, $this->shared_options('carousel_circles_options'));
        $dslc_options = array_merge($dslc_options, $this->shared_options('pagination_options'));
        $dslc_options = array_merge($dslc_options, $this->shared_options('animation_options'));
        $dslc_options = array_merge($dslc_options, $this->presets_options());

        return apply_filters('dslc_module_options', $dslc_options, $this->module_id);
    }

    function output($options) {

        global $dslc_active;

        if ($dslc_active && is_user_logged_in() && current_user_can(DS_LIVE_COMPOSER_CAPABILITY))
            $dslc_is_admin = true;
        else
            $dslc_is_admin = false;

        $this->module_start($options);

        /* Module output stars here */

        if (!isset($options['excerpt_length']))
            $options['excerpt_length'] = 20;

        if (is_front_page()) {
            $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
        }
        else {
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        }

        // Fix for pagination from other modules affecting this one when pag disabled
        if ($options['pagination_type'] == 'disabled')
            $paged = 1;

        // Fix for offset braking pagination
        $query_offset = $options['offset'];
        if ($query_offset > 0 && $paged > 1)
            $query_offset = ( $paged - 1 ) * $options['amount'] + $options['offset'];

        $args = array(
            'paged'          => $paged,
            'post_type'      => 'dslc_staff',
            'posts_per_page' => $options['amount'],
            'order'          => $options['order'],
            'orderby'        => $options['orderby']
        );
if ($query_offset > 0) {
            $args['offset'] = $query_offset;
        }
        if (isset($options['categories']) && $options['categories'] != '') {

            $cats_array = explode(' ', trim($options['categories']));

            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'dslc_staff_cats',
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

        // No paging
        if ($options['pagination_type'] == 'disabled')
            $args['no_found_rows'] = true;

        // Do the query
        if (is_category() || is_tax() || is_search()) {
            global $wp_query;
            $dslc_query = $wp_query;
        }
        else {
            $dslc_query = new WP_Query($args);
        }

        $columns_class = 'dslc-col dslc-' . $options['columns'] . '-col ';
        $count         = 0;
        $real_count    = 0;
        $increment     = $options['columns'];
        $max_count     = 12;

        /**
         * Elements to show
         */
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

        $container_class = 'dslc-posts dslc-staff dslc-clearfix ';

        if ($options['type'] == 'masonry')
            $container_class .= 'dslc-init-masonry ';
        elseif ($options['type'] == 'carousel')
            $container_class .= 'dslc-init-carousel ';
        elseif ($options['type'] == 'grid')
            $container_class .= 'dslc-init-grid ';

        /* Element Class */

        $element_class = 'dslc-post dslc-staff-member ';

        if ($options['type'] == 'masonry')
            $element_class .= 'dslc-masonry-item ';
        elseif ($options['type'] == 'carousel')
            $element_class .= 'dslc-carousel-item ';

        /**
         * Carousel Items
         */
        switch ($options['columns']) {
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
         * Posts ( output )
         */
        if ($dslc_query->have_posts()) :
            ?><div class="<?php echo $container_class; ?>"><?php
                if ($options['type'] == 'carousel') :
                    ?><div class="dslc-loader"></div><div class="dslc-carousel" data-stop-on-hover="<?php echo $options['carousel_autoplay_hover']; ?>" data-autoplay="<?php echo $options['carousel_autoplay']; ?>" data-columns="<?php echo $carousel_items; ?>" data-pagination="<?php
                    if (in_array('circles', $carousel_elements))
                        echo 'true';
                    else
                        echo 'false';
                    ?>" data-slide-speed="<?php echo $options['arrows_slide_speed']; ?>" data-pagination-speed="<?php echo $options['circles_slide_speed']; ?>"><?php
                                                        endif;

                                                        while ($dslc_query->have_posts()) : $dslc_query->the_post();
                                                            $count += $increment;
                                                            $real_count++;

                                                            if ($count == $max_count) {
                                                                $count       = 0;
                                                                $extra_class = ' dslc-last-col';
                                                            }
                                                            elseif ($count == $increment) {
                                                                $extra_class = ' dslc-first-col';
                                                            }
                                                            else {
                                                                $extra_class = '';
                                                            }

                                                            if (!has_post_thumbnail())
                                                                $extra_class .= ' dslc-post-no-thumb';

                                                            $post_cats      = get_the_terms(get_the_ID(), 'dslc_staff_cats');
                                                            $post_cats_data = '';
                                                            if (!empty($post_cats)) {
                                                                foreach ($post_cats as
                                                                        $post_cat) {
                                                                    $post_cats_data .= $post_cat->slug . ' ';
                                                                }
                                                            }
                                                            ?>

                        <?php
                        $social                  = $socials                 = array();
                        $position                = get_post_meta(get_the_ID(), 'dslc_staff_position', true);
                        $social['twitter']       = get_post_meta(get_the_ID(), 'dslc_staff_social_twitter', true);
                        $social['facebook']      = get_post_meta(get_the_ID(), 'dslc_staff_social_facebook', true);
                        $social['google-plus']   = get_post_meta(get_the_ID(), 'dslc_staff_social_googleplus', true);
                        $social['linkedin']      = get_post_meta(get_the_ID(), 'dslc_staff_social_linkedin', true);
                        $social['dribbble']      = get_post_meta(get_the_ID(), 'dslc_staff_social_dribbble', true);
                        $social['github']        = get_post_meta(get_the_ID(), 'dslc_staff_social_github', true);
                        $social['stackexchange'] = get_post_meta(get_the_ID(), 'dslc_staff_social_stackexchange', true);
                        $social['vk']            = get_post_meta(get_the_ID(), 'dslc_staff_social_vk', true);
                        $social['weibo']         = get_post_meta(get_the_ID(), 'dslc_staff_social_weibo', true);
                        $social['xing']          = get_post_meta(get_the_ID(), 'dslc_staff_social_xing', true);
                        $social['renren']        = get_post_meta(get_the_ID(), 'dslc_staff_social_renren', true);
                        $social['foursquare']    = get_post_meta(get_the_ID(), 'dslc_staff_social_foursquare', true);
                        $social['instagram']     = get_post_meta(get_the_ID(), 'dslc_staff_social_instagram', true);
                        $social['pinterest']     = get_post_meta(get_the_ID(), 'dslc_staff_social_pinterest', true);
                        $social['skype']         = get_post_meta(get_the_ID(), 'dslc_staff_social_skype', true);
                        $social['tumblr']        = get_post_meta(get_the_ID(), 'dslc_staff_social_tumblr', true);
                        $social['pagelines']     = get_post_meta(get_the_ID(), 'dslc_staff_social_pagelines', true);
                        $social['youtube']       = get_post_meta(get_the_ID(), 'dslc_staff_social_youtube', true);
                        $social['flickr']        = get_post_meta(get_the_ID(), 'dslc_staff_social_flickr', true);
                        $social['vimeo-square']  = get_post_meta(get_the_ID(), 'dslc_staff_social_vimeo', true);
                        $social['envelope']      = get_post_meta(get_the_ID(), 'dslc_staff_social_envelope', true);

                        foreach ($social as
                                $k =>
                                $v):
                            if (!empty($v)):
                                $socials[$k] = $v;
                            endif;
                        endforeach;
                        ?>

                        <div class="<?php echo $element_class . $columns_class . $extra_class; ?>" data-cats="<?php echo ($post_cats_data); ?>">

                            <?php if ($post_elements == 'all' || in_array('thumbnail', $post_elements)) : ?>

                                <?php
                                /**
                                 * Manual Resize
                                 */
                                $manual_resize = false;
                                if (isset($options['thumb_resize_height']) && !empty($options['thumb_resize_height']) || isset($options['thumb_resize_width_manual']) && !empty($options['thumb_resize_width_manual'])) {

                                    $manual_resize = true;
                                    $thumb_url     = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                    $thumb_url     = $thumb_url[0];

                                    $thumb_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                                    if (!$thumb_alt)
                                        $thumb_alt = '';

                                    $resize_width  = false;
                                    $resize_height = false;

                                    if (isset($options['thumb_resize_width_manual']) && !empty($options['thumb_resize_width_manual'])) {
                                        $resize_width = $options['thumb_resize_width_manual'];
                                    }

                                    if (isset($options['thumb_resize_height']) && !empty($options['thumb_resize_height'])) {
                                        $resize_height = $options['thumb_resize_height'];
                                    }
                                }
                                ?>

                                <?php if (has_post_thumbnail()) : ?>
                                    <?php
                                    $black_white = '';
                                    if ($options['effect_hover_img'] == 'black_white') {
                                        $black_white = ' as-grayscale';
                                    }
                                    ?>
                                    <div class="dslc-post-thumb dslc-staff-member-thumb dslc-on-hover-anim <?php echo esc_attr($black_white); ?>">

                                        <?php if ($options['content_inner_thumb_enabled'] == 'enabled') : ?>
                                            <div class="as-staff-inner-content-thumb-wrapper">
                                                <div class="as-staff-inner-content-thumb">

                                                    <?php if ($options['css_title_position'] == 'top') : ?>
                                                        <?php if ($post_elements == 'all' || in_array('title', $post_elements)) : ?>

                                                            <div class="dslc-staff-member-title">
                                                                <h2><?php the_title(); ?></h2>
                                                            </div><!-- .dslc-staff-member-title -->

                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if ($options['css_position_position'] == 'top') : ?>
                                                        <?php if ($post_elements == 'all' || in_array('position', $post_elements)) : ?>

                                                            <div class="dslc-staff-member-position">
                                                                <?php echo $position; ?>
                                                            </div><!-- .dslc-staff-member-position -->

                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if ($options['css_social_position'] == 'top') : ?>
                                                        <?php if ($post_elements == 'all' || in_array('social', $post_elements)) : ?>

                                                            <div class="as-staff-social-wrapper">
                                                                <div class="as-staff-list-social">
                                                                    <?php
                                                                    foreach ($socials as
                                                                            $k =>
                                                                            $v): if (!empty($v)):
                                                                            ?>
                                                                            <a href="<?php echo esc_url($v); ?>" target="<?php echo esc_attr($options['social_link_target']); ?>"><span class="dslc-icon dslc-icon-<?php echo esc_attr($k); ?>"></span></a>
                                                                            <?php
                                                                        endif;
                                                                    endforeach;
                                                                    ?>
                                                                </div>
                                                            </div>

                                                        <?php endif; ?><!-- .dslc-staff-social -->
                                                    <?php endif; ?>
                                                </div>
                                            </div><!-- .as-staff-inner-content-thumb-wrapper -->
                                        <?php endif; ?>

                                        <div class="dslc-staff-member-thumb-inner dslca-post-thumb">
                                            <?php if ($manual_resize) : ?>
                                                <img src="<?php
                                                $res_img = dslc_aq_resize($thumb_url, $resize_width, $resize_height, true);
                                                echo $res_img;
                                                ?>" alt="<?php echo $thumb_alt; ?>" />

                                            <?php else : ?>
                                                <?php the_post_thumbnail('full'); ?>
                                            <?php endif; ?>
                                        </div>

                                    </div><!-- .dslc-staff-member-thumb -->

                                <?php endif; ?>

                            <?php endif; ?>

                            <?php if ($post_elements == 'all' || in_array('title', $post_elements) || in_array('position', $post_elements) || in_array('excerpt', $post_elements)) : ?>

                                <div class="dslc-staff-member-main">
                                    <?php if ($options['css_title_position'] == 'bottom') : ?>
                                        <?php if ($post_elements == 'all' || in_array('title', $post_elements)) : ?>

                                            <div class="dslc-staff-member-title">
                                                <h2><?php the_title(); ?></h2>
                                            </div><!-- .dslc-staff-member-title -->

                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if ($options['css_position_position'] == 'bottom') : ?>
                                        <?php if ($post_elements == 'all' || in_array('position', $post_elements)) : ?>

                                            <div class="dslc-staff-member-position">
                                                <?php echo $position; ?>
                                            </div><!-- .dslc-staff-member-position -->

                                        <?php endif; ?>
                                    <?php endif; ?>	

                                    <?php if ($post_elements == 'all' || in_array('excerpt', $post_elements)) : ?>

                                        <div class="dslc-staff-member-excerpt">
                                            <?php if ($options['excerpt_or_content'] == 'content') : ?>
                                                <?php the_content(); ?>
                                            <?php else : ?>
                                                <?php
                                                if (has_excerpt())
                                                    echo do_shortcode(wp_trim_words(get_the_excerpt(), $options['excerpt_length']));
                                                else
                                                    echo do_shortcode(wp_trim_words(get_the_content(), $options['excerpt_length']));
                                                ?>
                                            <?php endif; ?>
                                        </div><!-- .dslc-staff-member-excerpt -->

                                    <?php endif; ?>

                                    <?php if ($options['css_social_position'] == 'bottom') : ?>
                                        <?php if ($post_elements == 'all' || in_array('social', $post_elements)) : ?>

                                            <div class="as-staff-social-wrapper">
                                                <div class="as-staff-list-social">
                                                    <?php
                                                    foreach ($socials as
                                                            $k =>
                                                            $v): if (!empty($v)):
                                                            ?>
                                                            <a href="<?php echo esc_url($v); ?>" target="<?php echo esc_attr($options['social_link_target']); ?>"><span class="dslc-icon dslc-icon-<?php echo esc_attr($k); ?>"></span></a>
                                                            <?php
                                                        endif;
                                                    endforeach;
                                                    ?>
                                                </div>
                                            </div>

                                        <?php endif; ?><!-- .dslc-staff-social -->
                                    <?php endif; ?>
                                </div><!-- .dslc-staff-member-main -->

                            <?php endif; ?>



                        </div><!-- .dslc-staff-member -->

                        <?php
                        // Row Separator
                        if ($options['type'] == 'grid' && $count == 0 && $real_count != $dslc_query->found_posts && $real_count != $options['amount'] && $options['separator_enabled'] == 'enabled') {
                            echo '<div class="dslc-post-separator"></div>';
                        }


                    endwhile;

                    if ($options['type'] == 'carousel') :
                        ?></div><?php
                endif;
                ?></div><?php
            else :

                if ($dslc_is_admin) :
                    ?><div class="dslc-notification dslc-red"><?php _e('You do not have staff at the moment. Go to <strong>WP Admin &rarr; Staff</strong> to add some.', 'live-composer-page-builder'); ?> <span class="dslca-refresh-module-hook dslc-icon dslc-icon-refresh"></span></span></div><?php
            endif;

        endif;

        /**
         * Pagination
         */
        if (isset($options['pagination_type']) && $options['pagination_type'] != 'disabled') {
            $num_pages = $dslc_query->max_num_pages;
            if ($options['offset'] > 0) {
                $num_pages = ceil(( $dslc_query->found_posts - $options['offset'] ) / $options['amount']);
            }
            dslc_post_pagination(array(
                'pages' => $num_pages,
                'type'  => $options['pagination_type']));
        }

        wp_reset_postdata();

        /* Module output ends here */

        $this->module_end($options);
    }

}
