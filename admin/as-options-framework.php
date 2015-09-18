<?php

global $dslc_plugin_options;

?>
<?php if(!empty($dslc_plugin_options)): ?>
<form method="post" action="options.php">


    <input type="hidden" name="option_page" value="dslc_plugin_options_features">
    <?php settings_fields( 'dslc_plugin_options_features' ); ?>
    <h3>Features Control</h3>
    <table class="form-table">
        <tbody>
        	<?php
	        	foreach ( $dslc_plugin_options as $section_ID => $section ) {

					foreach ( $section['options'] as $option_ID => $option ) {
						if (strpos($option_ID,'AS_') !== false)
						{

							$options = get_option( $section_ID );
	
							if ( isset( $options[ $option_ID ] ) )
								$value = $options[$option_ID];
							else 
								$value = $dslc_plugin_options[$section_ID]['options'][$option_ID]['std'];

							$option = $dslc_plugin_options[$section_ID]['options'][$option_ID];
								
							?>
							<tr>
			                <th scope="row">"<?php echo($option_ID); ?>" <small>module</small></th>
			                <td>
								<?php foreach ( $option['choices'] as $choice ) : 
									?>
									
									<input type="radio" name="<?php echo $section_ID; ?>[<?php echo $option_ID; ?>]" id="<?php echo $option_ID; ?>" value="<?php echo $choice['value']; ?>" <?php if ( $choice['value'] == $value ) {echo 'checked="checked"';} ?>>
									<label for="<?php echo $section_ID; ?>[<?php echo $option_ID; ?>]"><?php echo $choice['label']; ?></label>
									
									
									<?php 
								endforeach;
								if ( isset( $dslc_plugin_options[$section_ID]['options'][$option_ID]['descr'] ) ) :
									?><p class="description"><?php echo $dslc_plugin_options[$section_ID]['options'][$option_ID]['descr']; ?></p><?php 
								endif;
								?>
							</td>
				            </tr>
				            <?php
						}

					}

				}
			?>
            
        </tbody>
    </table>
    <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
    </p>
</form>
<?php endif; ?>