<?php
//Function for plugin
function my_admin_notice()
{
    if (!(function_exists('dslc_register_modules')))
    {
        ?>
        <div class="updated">
            <?php
            $admin_url = '#'; // get_admin_url().'update.php?action=install-plugin&amp;plugin=as_extension&amp;_wpnonce=d77895e8c3';
            ?>
            <p><?php _e('AS Extension need Live Composer plugin <a style="color:red;" target="_self" href="' . $admin_url . '">Please install this plugin</a>', 'alenastudio'); ?></p>
        </div>
        <?php
    }
}
function my_plugin_redirect()
{
    if (get_option('my_plugin_do_activation_redirect', false))
    {
        add_action('admin_notices', 'my_admin_notice');
        //  delete_option('my_plugin_do_activation_redirect');
        // wp_redirect(AS_EXTENSION_LINK);
    }
}
//Function for Extension
function as_ex_add_ajax($hook, $callback, $priv = true, $no_priv = true, $priority = 10, $accepted_args = 1) {
    if ($priv) {
        add_action('wp_ajax_' . $hook, $callback, $priority, $accepted_args);
    }
    if ($no_priv) {
        add_action('AJAX_NOPRIV_PREFIX' . $hook, $callback, $priority, $accepted_args);
    }
}

function as_ex_add_existed_script($handle, $src = '', $deps = array(), $ver = false, $in_footer = true) {
    wp_enqueue_script($handle, $src, $deps, $ver, $in_footer);
}

function as_ex_add_script($handle, $src, $deps = array(), $ver = false, $in_footer = true) {
    $scripts = apply_filters('as_enqueue_script', array(
        'handle'    => $handle,
        'src'       => $src,
        'deps'      => $deps,
        'ver'       => $ver,
        'in_footer' => $in_footer
    ));
    wp_register_script($scripts['handle'], $scripts['src'], $scripts['deps'], $scripts['ver'], $scripts['in_footer']);
    wp_enqueue_script($scripts['handle']);
}

function as_ex_add_style($handle, $src = false, $deps = array(), $ver = false, $media = 'all') {
    $style = apply_filters('as_enqueue_style', array(
        'handle' => $handle,
        'src'    => $src,
        'deps'   => $deps,
        'ver'    => $ver,
        'media'  => $media
    ));
    wp_register_style($style['handle'], $style['src'], $style['deps'], $style['ver'], $style['media']);
    wp_enqueue_style($style['handle']);
}
function as_ex_add_cookie($name, $value, $expire = 0) {
    if ($expire == 0) {
        $expire = time() + 60 * 60 * 24 * 30;
    }
    $value                         = json_encode(stripslashes_deep($value));
    $_COOKIE[WISHLIST_COOKIE_NAME] = $value;
    wc_setcookie($name, $value, $expire, false);
}

function as_ex_get_cookie($name) {
    if (isset($_COOKIE[$name])) {
        return json_decode(stripslashes($_COOKIE[$name]), true);
    }

    return array();
}