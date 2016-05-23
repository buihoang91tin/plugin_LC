<?php
if (!function_exists("rwmb_meta"))
{

    function rwmb_meta($id, $default = false)
    {
        $array_default = array(
            "as_custom_page_metaboxes" => array('page_breadcrumb_options'),
            "as_breadcrumb_menu"       => 2,
            "as_header_box"            => 0,
            "as_boxed_choice"          => 0,
            "as_footer_menu"           => 0,
            "as_boxed_choice_width"    => '',
            "as_blog_option"           => 'default',
            "as_html5_audio_file_mp3"  => '',
            "as_url_link"              => '',
            "as_text_link"             => '',
            "as_bg_link"               => '',
            "as_youtube_link"          => '',
            "as_view_img"              => '',
            "as_html5_video_file_mp4"  => '',
            "as_html5_video_file_ogv"  => '',
            "as_html5_video_file_webm" => '',
            "as_html5_media_loop"      => 'loop',
            "as_html5_media_autoplay"  => 'autoplay',
        );
        if (!isset($array_default[$id]))
        {
            return '';
        }
        else
        {
            return $array_default[$id];
        }
    }

}
    