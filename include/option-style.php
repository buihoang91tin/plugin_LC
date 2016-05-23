<form method="post" action="as-options-default.php">

    <?php if ($tab == 'dslc_plugin_options_cpt_slugs') : ?>

        <div class="dslca-plugin-opts-notification">
            <?php _e('<strong>Important:</strong> After changing slugs you need to visit the <strong>Settings &rarr; Permalinks</strong> page. Otherwise you will get 404 errors.', 'asex'); ?>
        </div>

    <?php elseif ($tab == 'dslc_plugin_options_widgets_m') : ?>

        <div class="dslca-plugin-opts-notification">
            <?php _e('Sidebars created here will be available in <strong>WP Admin > Appearance > Widgets</strong> and in the <strong>Widgets</strong> module.', 'asex'); ?>
        </div>

    <?php elseif ($tab == 'dslc_plugin_options_navigation_m') : ?>

        <div class="dslca-plugin-opts-notification">
            <?php _e('Menus locations created here will be available in <strong>WP Admin > Appearance > Menus</strong> and in the <strong>Navigation</strong> module.', 'asex'); ?>
        </div>

    <?php endif; ?>

    <?php
    settings_fields($tab);

    if ($tab == '')
        do_settings_sections('dslc_plugin_options');
    else
        do_settings_sections($tab);

    submit_button();
    ?>

</form>