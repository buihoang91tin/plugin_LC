<?php



	
        function as_option(){
            global $content_width;
        global $dslc_plugin_options;
	$dslc_plugin_options['as_general_options'] = array(
		'title' => __( 'General Options', 'as_extension' ),
		'options' => array(

		   'lc_max_width' => array(

			   'section' => 'as_general_options',
				'label' => __( 'Max Width', 'as_extension' ),
				'std' => '',
				'type' => 'text',
				'descr' => __( 'The width of the modules section when row is set to wrapped. If not set the $content_width variable from theme will be used.', 'as_extension' ),
			),

			'lc_force_important_css' => array(

				'section' => 'as_general_options',
				'label' => __( 'Force !important CSSssss', 'as_extension' ),
				'std' => 'disabled',
				'type' => 'select',
				'descr' => __( 'In case the CSS from the theme is influencing CSS for the modules, enabling this will in most cases fix that.', 'as_extension' ),
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'as_extension' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'as_extension' ),
						'value' => 'disabled'
					)
				)
			),

			'lc_css_position' => array(

				'section' => 'as_general_options',
				'label' => __( 'Dynamic CSS Locationssssss', 'as_extension' ),
				'std' => 'head',
				'type' => 'select',
				'descr' => __( 'Choose where the dynamic CSS is located, at the end of &lt;head&gt; or at the end of the &lt;body&gt;.', 'as_extension' ),
				'choices' => array(
					array(
						'label' => __( 'End of &lt;head&gt;', 'as_extension' ),
						'value' => 'head'
					),
					array(
						'label' => __( 'End of &lt;body&gt;', 'as_extension' ),
						'value' => 'body'
					)
				)
			)
		)
	);
        }
 add_action( 'dslc_hook_register_options', 'as_option' );