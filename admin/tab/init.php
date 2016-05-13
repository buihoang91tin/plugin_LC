<style>
    #jstabs .tab{display: none}
</style>
<div class="wrap">
    <h2 id="dslc-main-title">Live Composer <span class="dslc-ver"><?php echo DS_LIVE_COMPOSER_VER; ?></span></h2>

    <form autocomplete="off" class="docs-search-form" id="dslc-headersearch" method="GET" action="//support.alenastudio.com/search-page"  target="_blank">
        Search the knowledge base: &nbsp;
        <input type="text" value="" placeholder="Your question here..." class="search-query" title="search-query" name="q">
        <button type="submit" class="hssearch button button-hero"><span class="dashicons dashicons-search"></span> Search</button>
    </form>

    <?php
    settings_errors();

    $anchor = sanitize_text_field(@$_GET['anchor']);
    $anchor = $anchor != '' ? $anchor : 'dslc_getting_started';
    ?>
    <a name="dslc-top"></a>
    <h2 class="nav-tab-wrapper dslc-settigns-tabs" id="dslc-tabs">
        <a href="#" data-nav-to="dslc_getting_started" class="nav-tab <?php echo $anchor == 'as_getting_started' ? 'nav-tab-active' : ''; ?>"><?php _e('Getting Started', 'live-composer-page-builder') ?></a>
        <a href="#" data-nav-to="tab-settings" class="nav-tab <?php echo $anchor == 'as_settings' ? 'nav-tab-active' : ''; ?>"><?php _e('Settings', 'live-composer-page-builder') ?></a>
        <a href="#" data-nav-to="tab-extensions" class="nav-tab <?php echo $anchor == 'as_extensions' ? 'nav-tab-active' : ''; ?>"><?php _e('Extensions <span class="tag">Free</span>', 'live-composer-page-builder') ?></a>
        <a href="#" data-nav-to="tab-themes" class="nav-tab <?php echo $anchor == 'as_themes' ? 'nav-tab-active' : ''; ?>"><?php _e('Themes <span class="tag">Free</span>', 'live-composer-page-builder') ?></a>
        <a href="#" data-nav-to="tab-docs" class="nav-tab <?php echo $anchor == 'as_docs' ? 'nav-tab-active' : ''; ?>"><?php _e('Docs &amp; Support', 'live-composer-page-builder') ?></a>
        <a href="#" data-nav-to="tab-about" class="nav-tab <?php echo $anchor == 'as_about' ? 'nav-tab-active' : ''; ?>"><?php _e('About', 'live-composer-page-builder') ?></a>
    </h2>


    <div id="jstabs">
        <!-- Getting Started Tab -->
        <div class="tab" <?php
        if ($anchor != 'dslc_settings')
            echo 'style="display:block"';
        ;
        ?> id="tab-for-dslc_getting_started">
             <?php include AS_EXTENSION_ABS . '/admin/tab/tab-getting-started.php'; ?>
        </div>
        <!-- Settings tab -->
        <div class="tab" <?php
        if ($anchor == 'dslc_settings')
            echo 'style="display:block"';
        ;
        ?>  id="tab-for-tab-settings">
             <?php include AS_EXTENSION_ABS . '/admin/tab/tab-settings.php'; ?>
        </div>
        <!-- Themes tab -->
        <div class="tab" id="tab-for-tab-themes">
            <?php include AS_EXTENSION_ABS . '/admin/tab/tab-themes.php'; ?>
        </div>
        <!-- Extensions tab -->
        <div class="tab" id="tab-for-tab-extensions">
            <?php include AS_EXTENSION_ABS . '/admin/tab/tab-extensions.php'; ?>
        </div>
        <!-- Docs & Support tab -->
        <div class="tab" id="tab-for-tab-docs">
            <?php include AS_EXTENSION_ABS . '/admin/tab/tab-docs.php'; ?>
        </div>
        <!-- About  -->
        <div class="tab" id="tab-for-tab-about">
            <?php include AS_EXTENSION_ABS . '/admin/tab/tab-about.php'; ?>
        </div>


    </div>
</div><!-- /.wrap -->
<script>
    jQuery(document).ready(function ($) {
        jQuery(".nav-tab-wrapper > a").on('click', function () {
            if ($(this).data('nav-to') != null) {

                $("#jstabs .tab").hide();
                $(".nav-tab-active").removeClass('nav-tab-active');
                $("#tab-for-" + $(this).data('nav-to')).show();
                $(this).addClass('nav-tab-active')


                var refer = $("#jstabs").find("input[name='_wp_http_referer']");

                refer.val('<?php echo admin_url('admin.php?page=as-extension&anchor=dslc_settings&settings-updated=true'); ?>');

                return false;
            }
        });
    });
</script>