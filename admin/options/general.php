<?php

function as_option()
{
    global $content_width;
    global $as_plugin_options;
    $as_plugin_options['as_general_options'] = array(
        'title'   => __('General Options', 'as_extension'),
        'options' => array(
            'as_ex_css'           => array(
                'section_id' => 'as_ex_custom_css',
                'label'   => __('Custom CSS', 'as_extension'),
                'std'     => '',
                'type'    => 'textarea',
                'descr'   => __('The width of the modules section when row is set to wrapped. If not set the $content_width variable from theme will be used.', 'as_extension'),
            ),
        )
    );
}
add_action('dslc_hook_register_options', 'as_option');
