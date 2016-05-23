<?php
add_action('dslc_hook_register_options', 'asex_option',50);
function asex_option()
{
    global $asex_plugin_options;
    $asex_plugin_options['asex_general_options'] = array(
        'title'   => __('General Options', 'asex'),
        'options' => array(
            'asex_ex_css' => array(
                'section_id' => 'asex_custom_css',
                'label'      => __('Custom CSS', 'asex'),
                'std'        => '',
                'type'       => 'textarea',
                'descr'      => __('The width of the modules section when row is set to wrapped. If not set the $content_width variable from theme will be used.', 'asex'),
            ),
        )
    );
}
