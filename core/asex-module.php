<?php

class ASEX_MODULE extends DSLC_Module
{

    public function asex_get_next_previous_port_id($post_id, $next_or_prev)
    {
        // Get a global post reference since get_adjacent_post() references it
        global $post;

        // Store the existing post object for later so we don't lose it
        $oldGlobal = $post;

        // Get the post object for the specified post and place it in the global variable
        $post = get_post($post_id);

        // Get the post object for the previous post
        $previous_post = $next_or_prev == "prev" ? get_previous_post() : get_next_post();

        // Reset our global object
        $post = $oldGlobal;

        if ('' == $previous_post)
        {
            $port = get_posts(array(
                'post_type'      => 'dslc_projects',
                'order'          => $next_or_prev == "prev" ? 'DESC' : 'ASC',
                'posts_per_page' => 1,
            ));
            return $port[0]->ID;
        }

        return $previous_post->ID;
    }

}
