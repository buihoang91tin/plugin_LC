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

function as_plugin_options_init() {

	global $as_plugin_options;
	/**
	 * Add Sections
	 */

	foreach ( $as_plugin_options as $section_ID => $section ) {

		add_settings_section(
			$section_ID,
			$section['title'],
			'as_plugin_options_display_options',
			$section_ID
		);

		register_setting(
			$section_ID,
			$section_ID
		);
	}
       
	/**
	 * Add Fields
	 */

	foreach ( $as_plugin_options as $section_ID => $section ) {

		foreach ( $section['options'] as $option_ID => $option ) {

			$option['id'] = $option_ID;

			if ( ! isset( $option['section'] ) ) {

				$option['section'] = $section_ID;
			}

			$option['name'] = 'as_general_options[' . $option['id'] . ']';

			$value = '';
			$options = get_option( 'as_general_options' );

			if ( isset( $options[$option_ID] ) ) {

				$value = $options[$option_ID];
			}

			/// Prev version struct
			if ( $value == '' ) {

				$options = get_option( $section_ID );

				if ( isset( $options[$option_ID] ) ) {

					$value = $options[$option_ID];
				}

				if ( $value == '' ) {

					$value = $option['std'];
				}
			}

			$option['value'] = $value;

			add_settings_field(
				$option_ID,
				$option['label'],
				function() use ( $option ) {

					$func = 'dslc_plugin_option_display_' . $option['type'];
					$func( $option );
				},
				$section_ID,
				$section_ID
			);
		}

	}
       

} add_action( 'admin_init', 'as_plugin_options_init' );

function as_plugin_options_display_options( $section ) {



}
