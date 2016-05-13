<div class="wp-clearfix" id="dslc-settings-frame">

	<ul class="nav-subtabs wp-clearfix widget-inside" id="dslc-settings-column">
		<li class="dslc-submenu-section">
			<a href="#general"  data-nav-to="<?php echo 'tab-1' ?>" class="nav-subtab <?php echo $anchor == 'tab-1' ? 'nav-tab-active' : ''; ?>">
				<span class="dashicons dashicons-admin-settings"></span> <?php _e( 'General Options', 'as_extension' ) ?>
			</a>
		</li>
		<li class="dslc-submenu-section">
			<a href="#module-control"  data-nav-to="<?php echo 'tab-1' ?>" class="nav-subtab <?php echo $anchor == 'tab-1' ? 'nav-tab-active' : ''; ?>">
				<span class="dashicons dashicons-dashboard"></span> <?php _e( 'Module controll', 'as_extension' ) ?>
			</a>
		</li>
		
	</ul>

	<div id="dslc-setings-liquid">

		<form method="post" action="options.php" class="dslc-settings-form">
		<?php echo settings_fields( 'dslc_plugin_options' ); ?>

			<!-- <div class="tab" <?php echo $anchor == 'tab-1' ? 'style="display: block"' : ''?> id="tab-for-tab-1"> -->
			<a name="general"></a>
			<div class="dslc-panel">
					<?php do_settings_sections( 'dslc_plugin_options' ); ?>
					<?php submit_button(); ?>
			</div>
			<a name="module-control"></a>
			<a href="#dslc-top" class="dslc-scroll-back"><span class="dashicons dashicons-arrow-up-alt"></span> Top</a>
			<div class="dslc-panel">
					<?php do_settings_sections( 'dslc_plugin_options_performance' ); ?>
					<?php submit_button(); ?>
			</div>
			


		
		</form>
	</div>
</div>