<?php

function getPostViews($postID, $is_single = true)
{
    global $post;
    if (!$postID) $postID = $post->ID;
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if (!$is_single) {
        return '<span class="svl_show_count_only">' . ($count ? $count : 0 ). ' Views</span>';
    }
    $nonce = wp_create_nonce('devvn_count_post');
    if ($count == "0") {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<span class="svl_post_view_count" data-id="' . $postID . '" data-nonce="' . $nonce . '">0 View</span>';
    }
    return '<span class="svl_post_view_count" data-id="' . $postID . '" data-nonce="' . $nonce . '">' . ($count ? $count : 0 ) . ' Views</span>';
}

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == "0" || empty($count) || !isset($count)) {
        add_post_meta($postID, $count_key, 1);
        update_post_meta($postID, $count_key, 1);
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

