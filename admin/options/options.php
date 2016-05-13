<?php

function as_option()
{
    global $content_width;
    global $dslc_plugin_options;
    $dslc_plugin_options['dslc_plugin_options'] = array(
        'title'   => __('General Options', 'as_extension'),
        'options' => array(
            'as_max_width'           => array(
                'section_id' => 'as_custom_css',
                'label'   => __('Custom CSS', 'as_extension'),
                'std'     => '',
                'type'    => 'text',
                'descr'   => __('The width of the modules section when row is set to wrapped. If not set the $content_width variable from theme will be used.', 'as_extension'),
            ),
        )
    );
}
add_action('dslc_hook_register_options', 'as_option');
