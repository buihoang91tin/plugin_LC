<?php

/**
 * Plugin Name: AS Extension For Live Composer
 * Plugin URI: monalisa.alenastudio.com
 * Description: AS Extension - Ultimate live composer extension packs
 * Version: 1.0.0
 * Author: Alena Studio
 * Author URI: monalisa.alenastudio.com
 * License: N/A
 */
/* Don't load me from dark side */
if (!function_exists('add_action'))
{
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

define('ASEX_VERSION', '1.0.0');
define('ASEX_URL', plugin_dir_url(__FILE__));
define('ASEX_DIR', __DIR__);
define('ASEX_DIR_NAME', dirname(plugin_basename(__FILE__)));
define('ASEX_ABS', dirname(__FILE__));
define('ASEX_DEV_MODE', false);

//Core 
require_once (ASEX_DIR . '/load-default.php');
require_once (ASEX_ABS . '/core/asex-main.class.php');
require_once (ASEX_DIR . '/core/asex.class.php');

$asex_extension = new ASEX();
$asex_extension->init();
