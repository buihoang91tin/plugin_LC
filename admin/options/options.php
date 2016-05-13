<?php



	
        function as_option(){
            global $content_width;
        global $dslc_plugin_options;
	$dslc_plugin_options['as_general_options'] = array(
		'title' => __( 'General Options', 'live-composer-page-builder' ),
		'options' => array(

		   'lc_max_width' => array(

			   'section' => 'as_general_options',
				'label' => __( 'Max Width', 'live-composer-page-builder' ),
				'std' => '',
				'type' => 'text',
				'descr' => __( 'The width of the modules section when row is set to wrapped. If not set the $content_width variable from theme will be used.', 'live-composer-page-builder' ),
			),

			'lc_force_important_css' => array(

				'section' => 'as_general_options',
				'label' => __( 'Force !important CSSssss', 'live-composer-page-builder' ),
				'std' => 'disabled',
				'type' => 'select',
				'descr' => __( 'In case the CSS from the theme is influencing CSS for the modules, enabling this will in most cases fix that.', 'live-composer-page-builder' ),
				'choices' => array(
					array(
						'label' => __( 'Enabled', 'live-composer-page-builder' ),
						'value' => 'enabled'
					),
					array(
						'label' => __( 'Disabled', 'live-composer-page-builder' ),
						'value' => 'disabled'
					)
				)
			),

			'lc_css_position' => array(

				'section' => 'as_general_options',
				'label' => __( 'Dynamic CSS Locationssssss', 'live-composer-page-builder' ),
				'std' => 'head',
				'type' => 'select',
				'descr' => __( 'Choose where the dynamic CSS is located, at the end of &lt;head&gt; or at the end of the &lt;body&gt;.', 'live-composer-page-builder' ),
				'choices' => array(
					array(
						'label' => __( 'End of &lt;head&gt;', 'live-composer-page-builder' ),
						'value' => 'head'
					),
					array(
						'label' => __( 'End of &lt;body&gt;', 'live-composer-page-builder' ),
						'value' => 'body'
					)
				)
			)
		)
	);
        }
 add_action( 'dslc_hook_register_options', 'as_option' );