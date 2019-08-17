<?php
add_action('wp_ajax_get_labels_for_user', 'get_labels_for_user');
add_action('wp_ajax_nopriv_get_labels_for_user', 'get_labels_for_user');


function get_labels_for_user()
{
    require_once ADD_FAVORITE_PLUGIN_PATH."inc/class/GetLabelsForUser.class.php";
    $get_labels_cl = new GetLabelsForUser();
    $get_labels_cl->post_id = url_to_postid(wp_get_referer());
    $get_labels_cl->user_id=get_current_user_id();
    $result=$get_labels_cl->get_labels_for_user();
    echo json_encode($result);
    die();
}
