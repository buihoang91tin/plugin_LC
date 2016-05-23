<?php

return array(
    'menu'         => array(
        'Start' => 'index.php?page=asex_getting_start',
        'About' => 'index.php?page=about',
    ),
    'main_class'   => array(
        'AJAX_PREFIX'        => 'wp_ajax_',
        'AJAX_NOPRIV_PREFIX' => 'wp_ajax_nopriv_',
        'FILTER_SCRIPT'      => 'asex_enqueue_script',
        'FILTER_STYLE'       => 'asex_enqueue_style'
    ),
    'allowed_html' => array(
        //formatting
        'strong' => array(),
        'em'     => array(),
        'b'      => array(),
        'i'      => array(),
        'br'     => array(),
        //links
        'a'      => array(
            'href' => array()
        )
    )
);
