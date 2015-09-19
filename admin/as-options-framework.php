<?php

global $dslc_plugin_options;

?>
<div id="wpbody-content" aria-label="Main content" tabindex="0">
<div class="wrap about-wrap">
	<h1>Welcome to AS Extension</h1>

    <div class="about-text">Manage Features Control AS Extension</div>
    <div class="dslc-badge"><img src="http://hqsolu.com/wp-content/uploads/2015/06/logo-white.png"></div>
    <h2 class="nav-tab-wrapper">
		<a class="nav-tab nav-tab-active" href="javascript:history.go(0)">
			Features Control			</a>
	</h2>
<?php if(!empty($dslc_plugin_options)): ?>

<form method="post" action="options.php">


    <input type="hidden" name="option_page" value="dslc_plugin_options_features">
    <?php settings_fields( 'dslc_plugin_options_features' ); ?>
    <table class="form-table">
        <tbody>
        	<?php
	        	foreach ( $dslc_plugin_options as $section_ID => $section ) {
	        		 $i = 0;
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
							<?php if($i==0):?>
							<tr style=" border-bottom: 1px solid #ddd;">
							<?php endif; ?>
			                <th scope="row"><?php echo($option['label']); ?></th>
			                <td>
								<?php foreach ( $option['choices'] as $choice ) : 
									?>
									<label for="<?php echo esc_attr($section_ID); ?>[<?php echo esc_attr($option_ID); ?>]"><?php if(strpos($choice['label'], 'Enabled')!==false){ echo 'ON';}else{echo 'OFF';} ?>
									<input class="option-input radio" type="radio" name="<?php echo esc_attr($section_ID); ?>[<?php echo $option_ID; ?>]" id="<?php echo esc_attr($option_ID); ?>" value="<?php echo esc_attr($choice['value']); ?>" <?php if ( $choice['value'] == $value ) {echo 'checked="checked"';} ?>>
									</label>
									
									
									<?php 
								endforeach;
								if ( isset( $dslc_plugin_options[$section_ID]['options'][$option_ID]['descr'] ) ) :
									?><p class="description"><?php echo $dslc_plugin_options[$section_ID]['options'][$option_ID]['descr']; ?></p><?php 
								endif;
								?>
							</td>
							<?php $i++; ?>
							<?php if($i==2): $i=0; ?>
				            </tr>
				            <?php endif; ?>
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
</div>
</div>