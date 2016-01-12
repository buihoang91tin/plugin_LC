<?php

global $dslc_var_post_options;

$dslc_var_post_options['dslc-tinelines-post-options'] = array(
    'title'   => 'Tineline Options',
    'show_on' => 'dslc_tinelines',
    'options' => array(
        array(
            'label' => 'Client Name',
            'std'   => '',
            'id'    => 'dslc_tineline_name',
            'type'  => 'text',
        ),
        array(
            'label' => 'Tineline URL',
            'std'   => '',
            'id'    => 'dslc_tineline_url',
            'type'  => 'text',
        ),
        array(
            'label' => 'Tineline Text for URL',
            'std'   => '',
            'id'    => 'dslc_tineline_url_text',
            'type'  => 'text',
        ),
        array(
            'label' => 'Images',
            'descr' => 'These images can be shown using the "Tineline Images Slider" module.',
            'std'   => '',
            'id'    => 'dslc_tineline_images',
            'type'  => 'files',
        ),
    )
);

function dslc_timeline_module_cpt() {

    if (!dslc_is_module_active('AS_Timeline', true))
        return;

    $capability = dslc_get_option('lc_min_capability_timeline_m', 'dslc_plugin_options_access_control');
    if (!$capability)
        $capability = 'publish_posts';

    // With Front
    $with_front = dslc_get_option('with_front', 'dslc_plugin_options_cpt_slugs');
    if (empty($with_front))
        $with_front = 'disabled';
    if ($with_front == 'enabled')
        $with_front = true;
    else
        $with_front = false;

    register_post_type('dslc_timeline', array(
        'menu_icon'    => 'dashicons-feedback',
        'labels'       => array(
            'name'               => __('Timeline', 'alenastudio_plugin'),
            'singular_name'      => __('Timeline', 'alenastudio_plugin'),
            'add_new'            => __('Add Timeline', 'alenastudio_plugin'),
            'add_new_item'       => __('Add Timeline', 'alenastudio_plugin'),
            'edit'               => __('Edit', 'alenastudio_plugin'),
            'edit_item'          => __('Edit Timeline', 'alenastudio_plugin'),
            'new_item'           => __('New Timeline', 'alenastudio_plugin'),
            'view'               => __('View Timeline', 'alenastudio_plugin'),
            'view_item'          => __('View Timeline', 'alenastudio_plugin'),
            'search_items'       => __('Search Timeline', 'alenastudio_plugin'),
            'not_found'          => __('No Timeline found', 'alenastudio_plugin'),
            'not_found_in_trash' => __('No Timeline found in Trash', 'alenastudio_plugin'),
            'parent'             => __('Parent Timeline', 'alenastudio_plugin'),
        ),
        'public'       => true,
        'rewrite'      => array(
            'slug'       => dslc_get_option('timeline_slug', 'dslc_plugin_options_cpt_slugs'),
            'with_front' => $with_front),
        'supports'     => array(
            'title',
            'custom-fields',
            'excerpt',
            'editor',
            'author',
            'thumbnail',
            'comments'),
        'capabilities' => array(
            'publish_posts'       => $capability,
            'edit_posts'          => $capability,
            'edit_others_posts'   => $capability,
            'delete_posts'        => $capability,
            'delete_others_posts' => $capability,
            'read_private_posts'  => $capability,
            'edit_post'           => $capability,
            'delete_post'         => $capability,
            'read_post'           => $capability
        ),
    ));

    register_taxonomy(
            'dslc_timeline_cats', 'dslc_timeline', array(
        'labels'       => array(
            'name'              => __('Timeline Categories', 'alenastudio_plugin'),
            'singular_name'     => __('Category', 'alenastudio_plugin'),
            'search_items'      => __('Search Categories', 'alenastudio_plugin'),
            'all_items'         => __('All Categories', 'alenastudio_plugin'),
            'parent_item'       => __('Parent Category', 'alenastudio_plugin'),
            'parent_item_colon' => __('Parent Category:', 'alenastudio_plugin'),
            'edit_item'         => __('Edit Category', 'alenastudio_plugin'),
            'update_item'       => __('Update Category', 'alenastudio_plugin'),
            'add_new_item'      => __('Add New Category', 'alenastudio_plugin'),
            'new_item_name'     => __('New Category Name', 'alenastudio_plugin'),
            'menu_name'         => __('Categories', 'alenastudio_plugin'),
        ),
        'hierarchical' => true,
        'public'       => true,
        'rewrite'      => array(
            'slug'       => dslc_get_option('timeline_cats_slug', 'dslc_plugin_options_cpt_slugs'),
            'with_front' => $with_front
        ),
        'capabilities' => array(
            'manage_terms' => $capability,
            'edit_terms'   => $capability,
            'delete_terms' => $capability,
            'assign_terms' => $capability,
        ),
            )
    );
}

add_action('init', 'dslc_timeline_module_cpt');
