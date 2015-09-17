<?php
global $dslc_var_post_options;

$dslc_var_post_options['dslc-tinelines-post-options'] = array(
	'title' => 'Tineline Options',
	'show_on' => 'dslc_tinelines',
	'options' => array(
		array(
			'label' => 'Client Name',
			'std' => '',
			'id' => 'dslc_tineline_name',
			'type' => 'text',
		),
		array(
			'label' => 'Tineline URL',
			'std' => '',
			'id' => 'dslc_tineline_url',
			'type' => 'text',
		),
		array(
			'label' => 'Tineline Text for URL',
			'std' => '',
			'id' => 'dslc_tineline_url_text',
			'type' => 'text',
		),
		array(
			'label' => 'Images',
			'descr' => 'These images can be shown using the "Tineline Images Slider" module.',
			'std' => '',
			'id' => 'dslc_tineline_images',
			'type' => 'files',
		),
	)
);

function dslc_timeline_module_cpt() {

	if ( ! dslc_is_module_active( 'AS_Timeline', true ) )
		return;

	$capability = dslc_get_option( 'lc_min_capability_timeline_m', 'dslc_plugin_options_access_control' );
	if ( ! $capability ) $capability = 'publish_posts';

	// With Front
	$with_front = dslc_get_option( 'with_front', 'dslc_plugin_options_cpt_slugs' );
	if ( empty ( $with_front )  ) $with_front = 'disabled';
	if ( $with_front == 'enabled' ) $with_front = true; else $with_front = false;

	register_post_type( 'dslc_timeline', array(
		'menu_icon' => 'dashicons-feedback',
		'labels' => array(
		'name' => __( 'Timeline', 'dslc_string' ),
		'singular_name' => __( 'Timeline', 'dslc_string' ),
		'add_new' => __( 'Add Timeline', 'dslc_string' ),
		'add_new_item' => __( 'Add Timeline', 'dslc_string' ),
		'edit' => __( 'Edit', 'dslc_string' ),
		'edit_item' => __( 'Edit Timeline', 'dslc_string' ),
		'new_item' => __( 'New Timeline', 'dslc_string' ),
		'view' => __( 'View Timeline', 'dslc_string' ),
		'view_item' => __( 'View Timeline', 'dslc_string' ),
		'search_items' => __( 'Search Timeline', 'dslc_string' ),
		'not_found' => __( 'No Timeline found', 'dslc_string' ),
		'not_found_in_trash' => __( 'No Timeline found in Trash', 'dslc_string' ),
		'parent' => __( 'Parent Timeline', 'dslc_string' ),
	),
	'public' => true,
	'rewrite' => array( 'slug' => dslc_get_option( 'timeline_slug', 'dslc_plugin_options_cpt_slugs' ), 'with_front' => $with_front ),
	'supports' => array( 'title', 'custom-fields', 'excerpt', 'editor', 'author', 'thumbnail', 'comments'  ),
	'capabilities' => array(
		'publish_posts' => $capability,
		'edit_posts' => $capability,
		'edit_others_posts' => $capability,
		'delete_posts' => $capability,
		'delete_others_posts' => $capability,
		'read_private_posts' => $capability,
		'edit_post' => $capability,
		'delete_post' => $capability,
		'read_post' => $capability
	),
	));

	register_taxonomy(
		'dslc_timeline_cats',
		'dslc_timeline',
		array(
			'labels' => array(
			'name' => __( 'Timeline Categories', 'dslc_string' ),
			'singular_name' => __( 'Category', 'dslc_string' ),
			'search_items'  => __( 'Search Categories', 'dslc_string' ),
			'all_items' => __( 'All Categories', 'dslc_string' ),
			'parent_item' => __( 'Parent Category', 'dslc_string' ),
			'parent_item_colon' => __( 'Parent Category:', 'dslc_string' ),
			'edit_item' => __( 'Edit Category', 'dslc_string' ),
			'update_item' => __( 'Update Category', 'dslc_string' ),
			'add_new_item' => __( 'Add New Category', 'dslc_string' ),
			'new_item_name' => __( 'New Category Name', 'dslc_string' ),
			'menu_name' => __( 'Categories', 'dslc_string' ),
		),
		'hierarchical' => true,
		'public' => true,
		'rewrite' => array(
		'slug' => dslc_get_option( 'timeline_cats_slug', 'dslc_plugin_options_cpt_slugs' ),
		'with_front' => $with_front
	),
		'capabilities' => array(
			'manage_terms' => $capability,
			'edit_terms' => $capability,
			'delete_terms' => $capability,
			'assign_terms' => $capability,
		),
	)
	);

}

add_action( 'init', 'dslc_timeline_module_cpt' );