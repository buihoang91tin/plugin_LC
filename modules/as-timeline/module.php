<?php
if (dslc_is_module_active('AS_timeline'))
    include AS_EXTENSION_ABS . '/modules/as-timeline/functions.php';

class AS_Timeline extends DSLC_Module {

    var $module_id;
    var $module_title;
    var $module_icon;
    var $module_category;
    var $handle_like;

    function __construct() {
        $this->module_id       = 'AS_Timeline';
        $this->module_title    = __('Timeline', 'dslc_string');
        $this->module_icon     = 'history';
        $this->module_category = 'as - posts';
        $this->handle_like     = 'accordion';
    }

    function options() {

        $cats         = get_terms('dslc_timeline_cats');
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
                'label' => __('Open by default', 'dslc_string'),
                'id'    => 'open_by_default',
                'std'   => '1',
                'type'  => 'text',
            ),
            array(
                'label'   => __('Categories', 'dslc_string'),
                'id'      => 'as_categories',
                'std'     => '',
                'type'    => 'checkbox',
                'choices' => $cats_choices
            ),
            array(
                'label'   => __('Order By', 'dslc_string'),
                'id'      => 'as_orderby',
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
                'id'      => 'as_orders',
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
                    ),
                ),
            ),
            /**
             * General
             */
            array(
                'label'   => __('Post Elements', 'dslc_string'),
                'id'      => 'as_post_elements',
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
                'label'                 => __('BG For Dot', 'dslc_string'),
                'id'                    => 'css_thumbnail_bg_dot_color',
                'std'                   => '#ffffff',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-img.as-picture',
                'affect_on_change_rule' => 'background',
                'section'               => 'styling',
            ),
            array(
                'label'                 => __('Padding', 'dslc_string'),
                'id'                    => 'css_padding_timeline',
                'std'                   => '10',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content',
                'affect_on_change_rule' => 'padding',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100,
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'css_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-timeline',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 100,
            ),
            array(
                'label'                 => __('Minimum Height', 'dslc_string'),
                'id'                    => 'css_min_height',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-timeline',
                'affect_on_change_rule' => 'min-height',
                'section'               => 'styling',
                'ext'                   => 'px',
                'min'                   => 0,
                'max'                   => 2000,
                'increment'             => 5
            ),
            array(
                'label'                 => __('BG Color', 'dslc_string'),
                'id'                    => 'css_thumbnail_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-thumb',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'dslc_string'),
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'css_thumb_border_color',
                'std'                   => '#e6e6e6',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-thumb img',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'dslc_string'),
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'css_thumb_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-thumb img ',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Thumbnail', 'dslc_string'),
            ),
            array(
                'label'                 => __('Borders', 'dslc_string'),
                'id'                    => 'css_thumb_border_trbl',
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
                'affect_on_change_el'   => '.as-timeline-thumb, img',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'dslc_string'),
            ),
            array(
                'label'                 => __('Border Radius - Top', 'dslc_string'),
                'id'                    => 'css_thumbnail_border_radius_top',
                'std'                   => '4',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-thumb img',
                'affect_on_change_rule' => 'border-top-left-radius,border-top-right-radius',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Border Radius - Bottom', 'dslc_string'),
                'id'                    => 'css_thumbnail_border_radius_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-thumb img',
                'affect_on_change_rule' => 'border-bottom-left-radius,border-bottom-right-radius',
                'section'               => 'styling',
                'tab'                   => __('Thumbnail', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'css_thumbnail_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-thumb img',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Thumbnail', 'dslc_string'),
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_thumbnail_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-thumb img',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Thumbnail', 'dslc_string'),
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_thumbnail_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-thumb img',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('Thumbnail', 'dslc_string'),
            ),
            /**
             * Title
             */
            array(
                'label'                 => __('BG Color', 'dslc_string'),
                'id'                    => 'css_title_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string')
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'css_title_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string')
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'css_title_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'dslc_string')
            ),
            array(
                'label'                 => __('Borders', 'dslc_string'),
                'id'                    => 'css_title_border_trbl',
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
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string')
            ),
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'css_title_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string')
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'css_title_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'css_title_font_weight',
                'std'                   => '700',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'css_title_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
            ),
            array(
                'label'                 => __('Line Height', 'dslc_string'),
                'id'                    => 'css_title_lheight',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'css_title_margin_bottom',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'styling',
                'tab'                   => __('title', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_title_padding_vertical',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'dslc_string')
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_title_padding_horizontal',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('title', 'dslc_string')
            ),
            /**
             * Content
             */
            array(
                'label'                 => __('Content Stype', 'dslc_string'),
                'id'                    => 'as_timeline_content_style',
                'std'                   => '',
                'type'                  => 'select',
                'refresh_on_change'     => true,
                'affect_on_change_el'   => '',
                'affect_on_change_rule' => '',
                'choices'               => array(
                    array(
                        'label' => __('Excerpt', 'dslc_string'),
                        'value' => 'excerpt'
                    ),
                    array(
                        'label' => __('Content', 'dslc_string'),
                        'value' => 'content'
                    ),
                ),
                'section'               => 'styling',
                'tab'                   => __('content', 'dslc_string')
            ),
            array(
                'label'                 => __('BG Color', 'dslc_string'),
                'id'                    => 'css_content_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('content', 'dslc_string')
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'css_content_border_color',
                'std'                   => '#e8e8e8',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('content', 'dslc_string')
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'css_content_border_width',
                'std'                   => '1',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('content', 'dslc_string')
            ),
            array(
                'label'                 => __('Borders', 'dslc_string'),
                'id'                    => 'css_content_border_trbl',
                'std'                   => 'right bottom left',
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
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('content', 'dslc_string')
            ),
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'css_content_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('content', 'dslc_string')
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'css_content_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('content', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'css_content_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('content', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'css_content_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('content', 'dslc_string'),
            ),
            array(
                'label'                 => __('Line Height', 'dslc_string'),
                'id'                    => 'css_content_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('content', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_content_padding_vertical',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('content', 'dslc_string')
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_content_padding_horizontal',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('content', 'dslc_string')
            ),
            /**
             * Button Readmore
             */
            array(
                'label'                 => __('BG Color', 'dslc_string'),
                'id'                    => 'css_button_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-read-more',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('button', 'dslc_string')
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'css_button_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-read-more',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('button', 'dslc_string')
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'css_button_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-read-more',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('button', 'dslc_string')
            ),
            array(
                'label'                 => __('Borders', 'dslc_string'),
                'id'                    => 'css_button_border_trbl',
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
                'affect_on_change_el'   => '.as-timeline-content .as-read-more',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('button', 'dslc_string')
            ),
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'css_button_color',
                'std'                   => '#f9bf3b',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-read-more',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('button', 'dslc_string')
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'css_button_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-read-more',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('button', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'css_button_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-read-more',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('button', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'css_button_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-read-more',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('button', 'dslc_string'),
            ),
            array(
                'label'                 => __('Line Height', 'dslc_string'),
                'id'                    => 'css_button_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-read-more',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('button', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_button_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-read-more',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('button', 'dslc_string')
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_button_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-read-more',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('button', 'dslc_string')
            ),
            /**
             * Date time
             */
            array(
                'label'                 => __('BG Color', 'dslc_string'),
                'id'                    => 'css_datetime_bg_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-date',
                'affect_on_change_rule' => 'background-color',
                'section'               => 'styling',
                'tab'                   => __('datetime', 'dslc_string')
            ),
            array(
                'label'                 => __('Border Color', 'dslc_string'),
                'id'                    => 'css_datetime_border_color',
                'std'                   => '',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-date',
                'affect_on_change_rule' => 'border-color',
                'section'               => 'styling',
                'tab'                   => __('datetime', 'dslc_string')
            ),
            array(
                'label'                 => __('Border Width', 'dslc_string'),
                'id'                    => 'css_datetime_border_width',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-date',
                'affect_on_change_rule' => 'border-width',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('datetime', 'dslc_string')
            ),
            array(
                'label'                 => __('Borders', 'dslc_string'),
                'id'                    => 'css_datetime_border_trbl',
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
                'affect_on_change_el'   => '.as-timeline-content .as-date',
                'affect_on_change_rule' => 'border-style',
                'section'               => 'styling',
                'tab'                   => __('datetime', 'dslc_string')
            ),
            array(
                'label'                 => __('Color', 'dslc_string'),
                'id'                    => 'css_datetime_color',
                'std'                   => '#8a92a5',
                'type'                  => 'color',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-date',
                'affect_on_change_rule' => 'color',
                'section'               => 'styling',
                'tab'                   => __('datetime', 'dslc_string')
            ),
            array(
                'label'                 => __('Font Size', 'dslc_string'),
                'id'                    => 'css_datetime_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-date',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'styling',
                'tab'                   => __('datetime', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Font Weight', 'dslc_string'),
                'id'                    => 'css_datetime_font_weight',
                'std'                   => '400',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-date',
                'affect_on_change_rule' => 'font-weight',
                'section'               => 'styling',
                'tab'                   => __('datetime', 'dslc_string'),
                'ext'                   => '',
                'min'                   => 100,
                'max'                   => 900,
                'increment'             => 100
            ),
            array(
                'label'                 => __('Font Family', 'dslc_string'),
                'id'                    => 'css_datetime_font_family',
                'std'                   => 'Open Sans',
                'type'                  => 'font',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-date',
                'affect_on_change_rule' => 'font-family',
                'section'               => 'styling',
                'tab'                   => __('datetime', 'dslc_string'),
            ),
            array(
                'label'                 => __('Line Height', 'dslc_string'),
                'id'                    => 'css_datetime_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-date',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'styling',
                'tab'                   => __('datetime', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_datetime_padding_vertical',
                'std'                   => '19',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-date',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('datetime', 'dslc_string')
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_datetime_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content .as-date',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'styling',
                'ext'                   => 'px',
                'tab'                   => __('datetime', 'dslc_string')
            ),
            /**
             * Responsive Tablet
             */
            array(
                'label'   => __('Responsive Styling', 'dslc_string'),
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
                'tab'     => __('tablet', 'dslc_string'),
            ),
            array(
                'label'                 => __('Margin Bottom', 'dslc_string'),
                'id'                    => 'css_res_t_margin_bottom',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-timeline',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_res_t_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-timeline',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_res_t_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-timeline',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Font Size', 'dslc_string'),
                'id'                    => 'css_res_t_title_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'dslc_string'),
                'id'                    => 'css_res_t_title_lheight',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Padding Vertical', 'dslc_string'),
                'id'                    => 'css_res_t_title_padding_vertical',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_res_t_title_padding_horizontal',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Content - Font Size', 'dslc_string'),
                'id'                    => 'css_res_t_content_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner pt',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Line Height', 'dslc_string'),
                'id'                    => 'css_res_t_content_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Padding Vertical', 'dslc_string'),
                'id'                    => 'css_res_t_content_padding_vertical',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Content - Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_res_t_content_padding_horizontal',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('tablet', 'dslc_string'),
                'ext'                   => 'px',
            ),
            /**
             * Responsive phone
             */
            array(
                'label'   => __('Responsive Styling', 'dslc_string'),
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
                'affect_on_change_el'   => '.dslc-timeline',
                'affect_on_change_rule' => 'margin-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Vertical', 'dslc_string'),
                'id'                    => 'css_res_p_padding_vertical',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-timeline',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_res_p_padding_horizontal',
                'std'                   => '0',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.dslc-timeline',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Font Size', 'dslc_string'),
                'id'                    => 'css_res_p_title_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Line Height', 'dslc_string'),
                'id'                    => 'css_res_p_title_lheight',
                'std'                   => '16',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Title - Padding Vertical', 'dslc_string'),
                'id'                    => 'css_res_p_title_padding_vertical',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Title - Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_res_p_title_padding_horizontal',
                'std'                   => '15',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '.as-timeline-content h2 a',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Content - Font Size', 'dslc_string'),
                'id'                    => 'css_res_p_content_font_size',
                'std'                   => '12',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'font-size',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Line Height', 'dslc_string'),
                'id'                    => 'css_res_p_content_line_height',
                'std'                   => '22',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'line-height',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px'
            ),
            array(
                'label'                 => __('Content - Padding Vertical', 'dslc_string'),
                'id'                    => 'css_res_p_content_padding_vertical',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'padding-top,padding-bottom',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px',
            ),
            array(
                'label'                 => __('Content - Padding Horizontal', 'dslc_string'),
                'id'                    => 'css_res_p_content_padding_horizontal',
                'std'                   => '25',
                'type'                  => 'slider',
                'refresh_on_change'     => false,
                'affect_on_change_el'   => '#dslc-theme-content-inner p',
                'affect_on_change_rule' => 'padding-left,padding-right',
                'section'               => 'responsive',
                'tab'                   => __('phone', 'dslc_string'),
                'ext'                   => 'px',
            ),
        );
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

        /* CUSTOM THUMBNAIL CATEGORIES TITLE EXCERPT BUTTON */

        $post_elements = explode(" ", $options['as_post_elements']);

        $args = array(
            'post_type'      => 'dslc_timeline',
            'posts_per_page' => $options['open_by_default'],
            'order'          => $options['as_orders'],
            'orderby'        => $options['as_orderby'],
                //'offset' => $options['offset'],
                //'category_and' => $options['as_categories'],
        );

        // Do the query
        if (is_category() || is_tax() || is_search()) {
            global $wp_query;
            $dslc_query = $wp_query;
        }
        else {
            $dslc_query = new WP_Query($args);
        }
        $wrapper_class = '';
        //$columns_class = 'dslc-col dslc-' . $options['columns'] . '-col ';
        $count         = 0;
        $real_count    = 0;
        //$increment     = $options['columns'];
        $max_count     = 12;
        ?>
        <!-- Module output stars here -->

        <?php if ($dslc_query->have_posts()) : ?>
            <section id="as-timeline" class="as-timeline-container dslc-timeline">
                <div class="first"></div>
                <?php
                while ($dslc_query->have_posts()) : $dslc_query->the_post();
                    //$count += $increment;
                    $real_count++;
                    ?>
                    <div class="as-timeline-block">
                        <div class="as-timeline-img as-picture"></div>
                        <!-- as-timeline-img -->
                        <div class="as-timeline-content"> 
                            <h2>
                                <?php if (in_array('title', $post_elements)): ?>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <?php endif; ?>
                            </h2>
                            <?php if (has_post_thumbnail() && in_array('thumbnail', $post_elements)) : ?>
                                <a class = "as-timeline-thumb" href="<?php the_permalink(); ?>" target="_blank"><?php the_post_thumbnail('full'); ?></a>
                            <?php endif; ?>
                            <?php if (in_array('excerpt', $post_elements)): ?>
                                <?php if ($options['as_timeline_content_style'] == 'excerpt'): ?>
                                    <p><?php the_excerpt(); ?></p>
                                <?php else: ?>
                                    <p><?php the_content(); ?></p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if (in_array('button', $post_elements)): ?>
                                <a href="<?php the_permalink(); ?>" class="as-read-more"> <span class="lc-icon-list-item-icon dslc-icon-double-angle-right"></span> Read more</a>
                            <?php endif; ?>
                            <span class="as-date"><?php the_time('F j, Y'); ?></span>
                        </div>
                        <!-- as-timeline-content -->
                    </div>
                    <!-- as-timeline-block -->
                <?php endwhile; ?>
                <div class="as-timeline-img as-picture last"></div>
            </section>
            <!-- as-timeline -->

            <?php
        else :
            if ($dslc_is_admin) :
                ?>
                <div class="dslc-notification dslc-red">
                    <?php _e('You do not have any timelines at the moment. Go to <strong>WP Admin &rarr; timelines</strong> to add some.', 'dslc_string'); ?>
                    <span class="dslca-refresh-module-hook dslc-icon dslc-icon-refresh"></span>
                </div>
                <?php
            endif;

        endif;
        wp_reset_postdata();

        /* Module output ends here */

        /* Module output ends here */
        $this->module_end($options);
    }

}
