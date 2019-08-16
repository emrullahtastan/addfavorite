<?php
add_action('wp_ajax_add_favorite_action_ajax', 'add_favorite_action_ajax');
add_action('wp_ajax_nopriv_add_favorite_action_ajax', 'add_favorite_action_ajax');
function add_favorite_action_ajax()
{
    echo json_encode("1");
    die();
}
