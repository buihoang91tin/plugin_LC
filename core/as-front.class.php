<?php

class AS_EX_FRONT {

    public function __construct()
    {
        add_action('wp_head', array(
            $this,
            'as_ex_general_option'));
    }

    public function as_ex_general_option()
    {
        $as_ex_custom_style   = '';
        $as_ex_general_option = get_option('as_general_options');
        if ($as_ex_general_option['as_ex_css'] != '')
        {
            $as_ex_custom_style.= '<style>' . "\n";
            $as_ex_custom_style.= $as_ex_general_option['as_ex_css'] . "\n";
            $as_ex_custom_style.= '</style>' . "\n";
        }
        echo $as_ex_custom_style;
    }

}
