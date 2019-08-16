<?php
add_action('wp_ajax_add_favorite_action_ajax', 'add_favorite_action_ajax');
add_action('wp_ajax_nopriv_add_favorite_action_ajax', 'add_favorite_action_ajax');
function add_favorite_action_ajax()
{
    echo json_encode("1");
    die();
}

add_action('wp_ajax_get_labels_for_user', 'get_labels_for_user');
add_action('wp_ajax_nopriv_get_labels_for_user', 'get_labels_for_user');
function get_labels_for_user()
{
    $result=false;

    $result=get_current_user_id();


    echo json_encode($result);
    die();
}
