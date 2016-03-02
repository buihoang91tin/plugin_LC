<?php

global $as_ex_options;
if (is_array($as_ex_options) && !is_null($as_ex_options)) {
    $as_ex_color_main     = $as_ex_options['as_ex_color_main'];
    $as_ex_color_content  = $as_ex_options['$as_ex_color_content'];
    $as_ex_title_font     = $as_ex_options['as_ex_title_font'];
    $as_ex_sub_title_font = $as_ex_options['as_ex_sub_title_font'];
    $as_ex_content_font   = $as_ex_options['as_ex_content_font'];
}
else {
    $as_ex_color_main     = '';
    $as_ex_color_content  = '';
    $as_ex_title_font     = '';
    $as_ex_sub_title_font = '';
    $as_ex_content_font   = '';
}