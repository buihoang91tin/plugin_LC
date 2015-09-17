<?php
global $dslc_var_post_options;

$dslc_var_post_options['dslc-projects-post-options'] = array(
	'title' => 'Project Options',
	'show_on' => 'dslc_projects',
	'options' => array(
		array(
			'label' => 'Client Name',
			'std' => '',
			'id' => 'dslc_project_name',
			'type' => 'text',
		),
		array(
			'label' => 'Project URL',
			'std' => '',
			'id' => 'dslc_project_url',
			'type' => 'text',
		),
		array(
			'label' => 'Project Text for URL',
			'std' => '',
			'id' => 'dslc_project_url_text',
			'type' => 'text',
		),
		array(
			'label' => 'Images',
			'descr' => 'These images can be shown using the "Project Images Slider" module.',
			'std' => '',
			'id' => 'dslc_project_images',
			'type' => 'files',
		),
	)
);