<?php

if (!function_exists('as_custom_icon')) {

    function as_custom_icon() {

        global $dslc_var_icons;
        //List icon font
        $as_var_icons                  = array(
            "as-heart",
            "as-cloud",
            "as-star",
            "as-tv",
            "as-sound",
            "as-video",
            "as-trash",
            "as-user",
            "as-key",
            "as-search",
            "as-settings",
            "as-camera",
            "as-tag",
            "as-lock",
            "as-bulb",
            "as-pen",
            "as-diamond",
            "as-display",
            "as-location",
            "as-eye",
            "as-bubble",
            "as-stack",
            "as-cup",
            "as-phone",
            "as-news",
            "as-mail",
            "as-like",
            "as-photo",
            "as-note",
            "as-clock",
            "as-paperplane",
            "as-params",
            "as-banknote",
            "as-data",
            "as-music",
            "as-megaphone",
            "as-study",
            "as-lab",
            "as-food",
            "as-t-shirt",
            "as-fire",
            "as-clip",
            "as-shop",
            "as-calendar",
            "as-wallet",
            "as-vynil",
            "as-truck",
            "as-world",
            "as-mobile",
            "as-laptop",
            "as-desktop",
            "as-tablet",
            "as-phone2",
            "as-document",
            "as-documents",
            "as-search2",
            "as-clipboard",
            "as-newspaper",
            "as-notebook",
            "as-book-open",
            "as-browser",
            "as-calendar2",
            "as-presentation",
            "as-picture",
            "as-pictures",
            "as-video2",
            "as-camera2",
            "as-printer",
            "as-toolbox",
            "as-briefcase",
            "as-wallet2",
            "as-gift",
            "as-bargraph",
            "as-grid",
            "as-expand",
            "as-focus",
            "as-edit",
            "as-adjustments",
            "as-ribbon",
            "as-hourglass",
            "as-lock2",
            "as-megaphone2",
            "as-shield",
            "as-trophy",
            "as-flag",
            "as-map",
            "as-puzzle",
            "as-basket",
            "as-envelope",
            "as-streetsign",
            "as-telescope",
            "as-gears",
            "as-key2",
            "as-paperclip",
            "as-attachment",
            "as-pricetags",
            "as-lightbulb",
            "as-layers",
            "as-pencil",
            "as-tools",
            "as-tools-2",
            "as-scissors",
            "as-paintbrush",
            "as-magnifying-glass",
            "as-circle-compass",
            "as-linegraph",
            "as-mic",
            "as-strategy",
            "as-beaker",
            "as-caution",
            "as-recycle",
            "as-anchor",
            "as-profile-male",
            "as-profile-female",
            "as-bike",
            "as-wine",
            "as-hotairballoon",
            "as-globe",
            "as-genius",
            "as-map-pin",
            "as-dial",
            "as-chat",
            "as-heart2",
            "as-cloud2",
            "as-upload",
            "as-download",
            "as-target",
            "as-hazardous",
            "as-piechart",
            "as-speedometer",
            "as-global",
            "as-compass",
            "as-lifesaver",
            "as-clock2",
            "as-aperture",
            "as-quote",
            "as-scope",
            "as-alarmclock",
            "as-refresh",
            "as-happy",
            "as-sad",
            "as-facebook",
            "as-twitter",
            "as-googleplus",
            "as-rss",
            "as-tumblr",
            "as-linkedin",
            "as-dribbble"
        );
        $dslc_var_icons["fontawesome"] = array_merge($dslc_var_icons["fontawesome"], $as_var_icons);
        // Allow devs to alter available icons
        $dslc_var_icons                = apply_filters('dslc_available_icons', $dslc_var_icons);
    }

    add_action('init', 'as_custom_icon');
}