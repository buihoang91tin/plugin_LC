<?php

global $dslc_var_post_options;

$new_socials =
    array(
        array(
            'label' => 'Social - Dribbble',
            'std' => '',
            'id' => 'dslc_staff_social_dribbble',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - GitHub',
            'std' => '',
            'id' => 'dslc_staff_social_github',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - StackExchange',
            'std' => '',
            'id' => 'dslc_staff_social_stackexchange',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - VK',
            'std' => '',
            'id' => 'dslc_staff_social_vk',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - Weibo',
            'std' => '',
            'id' => 'dslc_staff_social_weibo',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - Xing',
            'std' => '',
            'id' => 'dslc_staff_social_xing',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - RenRen',
            'std' => '',
            'id' => 'dslc_staff_social_renren',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - FourSquare',
            'std' => '',
            'id' => 'dslc_staff_social_foursquare',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - Instagram',
            'std' => '',
            'id' => 'dslc_staff_social_instagram',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - Pinterest',
            'std' => '',
            'id' => 'dslc_staff_social_pinterest',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - Skype',
            'std' => '',
            'id' => 'dslc_staff_social_skype',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - Tumblr',
            'std' => '',
            'id' => 'dslc_staff_social_tumblr',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - Pagelines',
            'std' => '',
            'id' => 'dslc_staff_social_pagelines',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - Youtube',
            'std' => '',
            'id' => 'dslc_staff_social_youtube',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - Flickr',
            'std' => '',
            'id' => 'dslc_staff_social_flickr',
            'type' => 'text',
        ),
        array(
            'label' => 'Social - Vimeo',
            'std' => '',
            'id' => 'dslc_staff_social_vimeo',
            'type' => 'text',
        ),
        array(
            'label' => 'Mail Address',
            'std' => '',
            'id' => 'dslc_staff_social_envelope',
            'type' => 'text',
        ),
        array(
            'label' => 'Phone Number',
            'std' => '',
            'id' => 'dslc_staff_social_phone',
            'type' => 'text',
        ),
    );
$dslc_var_post_options['dslc-staff-post-options']['options'] = array_merge($dslc_var_post_options['dslc-staff-post-options']['options'], $new_socials);